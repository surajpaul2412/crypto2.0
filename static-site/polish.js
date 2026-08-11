/* ═══════════════════════════════════════════════════════════════
   polish.js · v2 final polish layer
   Shared across all 14 pages. Load AFTER Lenis + GSAP + ScrollTrigger.
   Implements exactly 3 motion patterns per REFINEMENT-BRIEF §5.
   ═══════════════════════════════════════════════════════════════ */
(function () {
  'use strict';

  // ─── Browser detection for the blur-jitter workaround ──────
  // Safari & Firefox re-rasterize backdrop-filter blur on every Lenis
  // transform frame, dropping frames (confirmed via Timelines profiler +
  // live test: disabling blur removes the jitter). Chrome composites it
  // cheaply. We tag <html> so CSS can drop blur on Safari/FF ONLY, keeping
  // the frosted glass on Chrome. To revert: delete this block + the
  // matching `.no-glass-blur` rule in polish.css.
  (function tagBrowser() {
    var ua = navigator.userAgent;
    var isSafari = /^((?!chrome|android|crios|fxios).)*safari/i.test(ua);
    var isFirefox = /firefox|fxios/i.test(ua);
    if (isSafari || isFirefox) {
      document.documentElement.classList.add('no-glass-blur');
    }
  })();

  // ─── Environment gates ─────────────────────────────────────
  var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var isMobile       = window.matchMedia('(max-width: 768px)').matches;
  var isTouch        = window.matchMedia('(hover: none), (pointer: coarse)').matches;
  // Stricter check for the SMOOTH-SCROLL gate only. `isTouch` above matches if
  // EITHER (hover:none) OR (pointer:coarse) is true — on some desktop Safari /
  // Mac trackpad configs `pointer:coarse` reports true, so isTouch wrongly
  // excludes desktop Safari and Lenis never starts (no smooth scroll there).
  // A genuine phone/tablet satisfies BOTH no-hover AND coarse-pointer AND
  // exposes a touch API. Desktops do not. We keep the loose `isTouch` for the
  // magnetic-cursor gate (where over-excluding is harmless).
  var isRealTouchDevice =
    window.matchMedia('(hover: none) and (pointer: coarse)').matches &&
    (('ontouchstart' in window) || (navigator.maxTouchPoints > 0));

  // ─── Modal focus trap (a11y · runs in ALL motion modes) ────
  // The brief assumed a dev trapFocus() already shipped — it does not
  // exist in any of the 15 files. This IS that backstop.
  //
  // Constraint: each page's openModal()/closeModal() live inside a
  // closure (the `modal` var is private), so we cannot hook them. We
  // instead watch the ONE public signal they all set — body.booking-locked
  // — and trap Tab within whatever .booking-modal.is-open is on the page.
  //
  // What we deliberately DO NOT do (the inline script already owns these,
  // duplicating them would double-fire and steal focus):
  //   · autofocus first field   · Escape-to-close   · restore lastFocused
  // We ONLY contain Tab/Shift+Tab inside the dialog while it is open.
  function mountModalFocusTrap() {
    var FOCUSABLE = [
      'a[href]', 'button:not([disabled])', 'input:not([disabled])',
      'select:not([disabled])', 'textarea:not([disabled])', '[tabindex]:not([tabindex="-1"])'
    ].join(',');

    var activeModal = null;
    var keyHandler  = null;

    function visibleFocusables(container) {
      return Array.prototype.filter.call(
        container.querySelectorAll(FOCUSABLE),
        function (el) {
          // skip zero-size / display:none (e.g. the backdrop is a div, not focusable anyway)
          return el.offsetWidth > 0 || el.offsetHeight > 0 || el === document.activeElement;
        }
      );
    }

    function engage(modal) {
      if (activeModal === modal) return;
      activeModal = modal;

      keyHandler = function (e) {
        if (e.key !== 'Tab') return;
        var f = visibleFocusables(modal);
        if (!f.length) return;
        var first = f[0];
        var last  = f[f.length - 1];

        if (e.shiftKey) {
          if (document.activeElement === first || !modal.contains(document.activeElement)) {
            e.preventDefault(); last.focus();
          }
        } else {
          if (document.activeElement === last || !modal.contains(document.activeElement)) {
            e.preventDefault(); first.focus();
          }
        }
      };
      document.addEventListener('keydown', keyHandler, true);
    }

    function release() {
      if (keyHandler) document.removeEventListener('keydown', keyHandler, true);
      keyHandler  = null;
      activeModal = null;
    }

    // Watch ONLY body class changes, and cheaply no-op unless the
    // booking-lock state actually flipped — page 01 toggles hero-locked /
    // js-ready on body, and we must not do work on those.
    var wasLocked = document.body.classList.contains('booking-locked');
    var obs = new MutationObserver(function () {
      var isLocked = document.body.classList.contains('booking-locked');
      if (isLocked === wasLocked) return;
      wasLocked = isLocked;
      if (isLocked) {
        var modal = document.querySelector('.booking-modal.is-open') ||
                    document.querySelector('.booking-modal');
        if (modal) engage(modal);
      } else {
        release();
      }
    });
    obs.observe(document.body, { attributes: true, attributeFilter: ['class'] });
  }

  // If reduced motion → reveal everything immediately, skip animation work,
  // but STILL mount the focus trap (accessibility is not motion).
  if (prefersReduced) {
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('[data-reveal], [data-reveal-hero]').forEach(function (el) {
        el.classList.add('is-revealed');
      });
      mountModalFocusTrap();
      mountFooter();
    });
    return;
  }

  // ─── Pattern #1: Hero entrance (deliberate, once) ──────────
  function runHeroEntrance() {
    var heroEls = document.querySelectorAll('[data-reveal-hero]');
    if (!heroEls.length) return;

    heroEls.forEach(function (el, i) {
      var delay = (el.dataset.revealDelay) ? parseInt(el.dataset.revealDelay, 10) : i * 80;
      setTimeout(function () { el.classList.add('is-revealed'); }, 80 + delay);
    });
  }

  // ─── Pattern #2: Section reveals on scroll (subtle, staggered) ──
  function runScrollReveals() {
    var targets = document.querySelectorAll('[data-reveal]');
    if (!targets.length) return;

    if (!('IntersectionObserver' in window)) {
      targets.forEach(function (el) { el.classList.add('is-revealed'); });
      return;
    }

    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        var el = entry.target;
        var group = el.dataset.revealGroup;

        // Fire-once: reveal on first intersection, then stop observing.
        // (Previously the else-branch removed is-revealed on exit, so every
        //  element re-animated each time it crossed the viewport edge —
        //  this caused cards/text to flicker/jump as they scrolled behind
        //  the fixed nav. Reveals are now permanent once triggered.)
        if (!entry.isIntersecting) return;

        if (group) {
          // Stagger siblings in same group by 60ms on entry, then unobserve each
          var siblings = document.querySelectorAll('[data-reveal-group="' + group + '"]');
          siblings.forEach(function (sib, i) {
            setTimeout(function () { sib.classList.add('is-revealed'); }, i * 60);
            io.unobserve(sib);
          });
        } else {
          el.classList.add('is-revealed');
          io.unobserve(el);
        }
      });
    }, { threshold: 0.18, rootMargin: '0px 0px -50px 0px' });

    targets.forEach(function (el) { io.observe(el); });
  }

  // ─── Pattern #3: Magnetic CTA (desktop only, 4px pull) ─────
  function runMagnetic() {
    if (isMobile || isTouch) return;

    var els = document.querySelectorAll('[data-magnetic]');
    if (!els.length) return;

    var PULL = 4; // pixels

    els.forEach(function (el) {
      var rect, rafId;

      function onMove(e) {
        if (!rect) rect = el.getBoundingClientRect();
        var dx = e.clientX - (rect.left + rect.width  / 2);
        var dy = e.clientY - (rect.top  + rect.height / 2);
        var dist = Math.sqrt(dx * dx + dy * dy);
        var max = Math.max(rect.width, rect.height) * 0.8;
        if (dist > max) { onLeave(); return; }
        var strength = 1 - (dist / max);
        var tx = (dx / max) * PULL * strength;
        var ty = (dy / max) * PULL * strength;
        cancelAnimationFrame(rafId);
        rafId = requestAnimationFrame(function () {
          el.style.transform = 'translate(' + tx.toFixed(2) + 'px, ' + ty.toFixed(2) + 'px)';
        });
      }

      function onLeave() {
        rect = null;
        cancelAnimationFrame(rafId);
        el.style.transform = '';
      }

      function onEnter() { rect = el.getBoundingClientRect(); }

      el.addEventListener('mouseenter', onEnter);
      el.addEventListener('mousemove',  onMove);
      el.addEventListener('mouseleave', onLeave);
    });
  }

  // ─── Legal-page anchor permalinks (no-op if not a legal page) ───
  // Click any <h2 class="legal-section__title"> to copy its deep link.
  // Fires only if .legal-section__title exists. Zero cost elsewhere.
  function runAnchorPermalinks() {
    var titles = document.querySelectorAll('.legal-section__title');
    if (!titles.length) return;

    titles.forEach(function (title) {
      var section = title.closest('.legal-section');
      if (!section || !section.id) return;

      title.setAttribute('role', 'button');
      title.setAttribute('tabindex', '0');
      title.setAttribute('aria-label', 'Copy link to this section');
      title.style.cursor = 'pointer';

      function copy() {
        var url = window.location.origin + window.location.pathname + '#' + section.id;
        var done = function () {
          title.classList.add('is-copied');
          setTimeout(function () { title.classList.remove('is-copied'); }, 1400);
        };
        if (navigator.clipboard && navigator.clipboard.writeText) {
          navigator.clipboard.writeText(url).then(done).catch(done);
        } else {
          var ta = document.createElement('textarea');
          ta.value = url;
          ta.style.position = 'fixed';
          ta.style.opacity = '0';
          document.body.appendChild(ta);
          ta.select();
          try { document.execCommand('copy'); } catch (e) {}
          document.body.removeChild(ta);
          done();
        }
        if (history.replaceState) {
          history.replaceState(null, '', '#' + section.id);
        }
      }

      title.addEventListener('click', copy);
      title.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); copy(); }
      });
    });
  }

  // ─── Init ──────────────────────────────────────────────────
  // ─── Premium smooth scroll (Lenis · desktop / fine-pointer only) ──
  // Touch devices are deliberately EXCLUDED: native momentum scrolling on
  // iOS/Android is GPU-smooth on its own and fighting it with JS reintroduces
  // jank, breaks fling physics, and conflicts with the URL-bar show/hide.
  // Mobile smoothness is handled instead by disabling backdrop-filter <=768px
  // (see polish/inline CSS), which removes the real per-frame repaint cost.
  function runSmoothScroll() {
    if (prefersReduced || isMobile || isRealTouchDevice) return;     // gate
    if (typeof Lenis === 'undefined') return;              // CDN missing -> native scroll (safe)

    // ─── Lenis on Chrome/Chromium only ─────────────────────────
    // On heavy pages, Lenis overshoots near scroll boundaries on Safari/Firefox,
    // causing a jump (e.g. back-scrolling into the hero). Confirmed live: with
    // Lenis destroyed those browsers scroll jump-free (just not "buttery"). So we
    // keep Lenis's premium glide on Chrome (which handles it cleanly) and let
    // Safari/Firefox use native scroll — smooth and jump-free there.
    // POST-LAUNCH: replace Lenis entirely with CSS scroll-driven animations
    // (animation-timeline) so all browsers get native-smooth scroll without the
    // library. See developer guide "Replace Lenis with CSS scroll-driven animations".
    // To revert (Lenis on all desktop browsers): delete this block.
    var ua = navigator.userAgent;
    var isChromium = /chrome|chromium|crios|edg/i.test(ua) && !/(?:firefox|fxios)/i.test(ua);
    var isSafari = /^((?!chrome|android|crios|fxios).)*safari/i.test(ua);
    if (!isChromium || isSafari) return;   // Safari/Firefox -> native scroll

    var lenis = new Lenis({
      // Use lerp ONLY (frame-rate-independent). Do NOT also set duration/easing —
      // Lenis treats lerp and duration as mutually exclusive; setting both breaks
      // the scroll physics (the jitter introduced last round). 0.1 = smooth, responsive.
      lerp: 0.1,
      smoothWheel: true,
      wheelMultiplier: 1,
      touchMultiplier: 1,
      gestureOrientation: 'vertical'
    });
    window.__lenis = lenis;

    // ─── Stop Lenis whenever ANY modal/overlay locks body scroll ──────────
    // Every overlay on the site (booking-modal, license modal, story/rec/cmodal,
    // lightboxes) locks the page by setting body { overflow:hidden } or adding a
    // lock class (*-locked / *-open). But Lenis runs its own scroll loop and
    // IGNORES body overflow, so the page scrolls BEHIND the open modal on desktop.
    // Rather than edit every per-page open/close handler, watch <body> for the
    // lock signal and stop/start Lenis centrally — covers all current and future
    // modals on all 15 pages. (data-lenis-prevent on the modal's own scroll area
    // is still the right complement; this handles the page-behind leak.)
    (function watchBodyLockForLenis() {
      var body = document.body;
      function isLocked() {
        if (getComputedStyle(body).overflow === 'hidden') return true;
        // any class ending in -locked or -open signals an open overlay
        return /(^|\s)[a-z-]*(-locked|-open)(\s|$)/.test(body.className);
      }
      var wasLocked = false;
      function sync() {
        var locked = isLocked();
        if (locked === wasLocked) return;
        wasLocked = locked;
        if (locked) { lenis.stop(); } else { lenis.start(); }
      }
      var mo = new MutationObserver(sync);
      mo.observe(body, { attributes: true, attributeFilter: ['style', 'class'] });
      sync(); // initial state
    })();

    // ─── Let inner scroll areas scroll natively (don't let Lenis hijack them) ──
    // Lenis intercepts the wheel globally; without this, scrolling inside the
    // sidenav, demo-player lists, or modals scrolls the PAGE instead of the
    // element. data-lenis-prevent is Lenis's built-in opt-out — it lets native
    // scroll happen inside the tagged element. (Confirmed cause via diagnostic:
    // inner list could scroll programmatically but wheel was being intercepted.)
    (function preventLenisOnScrollables() {
      var selectors = [
        '.sidenav',            // side panel / mobile bottom-sheet
        '.sidenav__list',      // inner instrument/film lists
        '.player__list',       // library-inner demo player list
        '.newrel__player-list',// New Release player list
        '.newrel__panels-scroll', // New Release inner panel scroll
        '.cmodal__body',       // contact modal scroll
        '.popup-body',         // map popup scroll
        '.cc-nav__mobile-panel',// mobile nav menu overlay
        '.modal__panel',       // license / generic modal scroll panel
        '.booking-modal__sheet',// booking modal scroll sheet
        '.story-modal',        // testimonials story modal scroll
        '.rec-modal',          // recording-services modal outer
        '.rec-modal__body'     // recording-services modal scroller (inside rounded clip)
      ];
      document.querySelectorAll(selectors.join(',')).forEach(function (el) {
        el.setAttribute('data-lenis-prevent', '');
      });
    })();

    // Keep GSAP ScrollTrigger in sync with Lenis' virtual scroll position.
    if (window.ScrollTrigger) {
      lenis.on('scroll', window.ScrollTrigger.update);
    }

    // Single rAF drives Lenis (and GSAP ticker if present, to avoid two loops).
    if (window.gsap && window.gsap.ticker) {
      window.gsap.ticker.add(function (time) { lenis.raf(time * 1000); });
      window.gsap.ticker.lagSmoothing(0);
    } else {
      var raf = function (t) { lenis.raf(t); requestAnimationFrame(raf); };
      requestAnimationFrame(raf);
    }

    // Anchor links: route through Lenis so in-page jumps are smooth too.
    document.querySelectorAll('a[href^="#"]').forEach(function (a) {
      a.addEventListener('click', function (e) {
        var id = a.getAttribute('href');
        if (id.length < 2) return;
        var target = document.querySelector(id);
        if (!target) return;
        e.preventDefault();
        lenis.scrollTo(target, { offset: -90 });           // clear the fixed nav
      });
    });
  }

  // ─── Footer behavior (shared · runs on every page) ────────
  // Reveal is handled by runScrollReveals() — the <footer> carries
  // data-reveal, so .ft receives .is-revealed (canonical system).
  // This kills the old per-page inline .visible IntersectionObserver
  // dual-system (MASTER-CONTINUITY §4). Here we add only the
  // behavior that isn't pure CSS: the mobile column accordion.
  function mountFooter() {
    var footer = document.getElementById('footer');
    if (!footer || !footer.classList.contains('ft')) return;

    // Mobile column accordion (<=768px). Scoped to .ft__col only —
    // the shared .expanded class is also used by nav/sidenav, so we
    // must never toggle it on anything but footer columns here.
    footer.querySelectorAll('.ft__col').forEach(function (col) {
      var head = col.querySelector('.ft__col-head');
      if (!head) return;
      head.setAttribute('role', 'button');
      head.setAttribute('tabindex', '0');
      head.setAttribute('aria-expanded', 'false');
      function toggle() {
        if (window.matchMedia('(max-width: 768px)').matches) {
          var expanded = col.classList.toggle('expanded');
          head.setAttribute('aria-expanded', expanded ? 'true' : 'false');
        }
      }
      head.addEventListener('click', toggle);
      head.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); toggle(); }
      });
    });
    // (Logo 3D tilt removed — static glass platform, no mouse tracking.)
  }

  /* ─── Media coordinator · ONE media at a time, site-wide ──────────
     Goal: only one audio OR video plays at a time, regardless of source
     or page. Lives here (shared layer) so every page inherits it.

     Catches three media categories generically — no per-page lists:
       1. Native <audio>/<video> — caught via a capture-phase 'play'
          listener on document. ANY element playing anywhere auto-claims.
       2. YouTube embeds — the site injects a `.video-embed` into a carrier
          and marks the carrier `.is-playing`. A MutationObserver detects
          that and treats it as a claim; stopping = remove embed + class.
       3. Custom JS audio players (fake-mode toggle players that don't use a
          real <audio>) — they emit `cc:media-start` when they begin and
          listen for `cc:media-stop` to stop themselves.

     Contract for page JS (only needed for category 3):
       • On start:  document.dispatchEvent(new CustomEvent('cc:media-start',
                      { detail: { source: <yourEl>, stop: fn } }))
       • To be stopped: provide detail.stop, OR listen for 'cc:media-stop'
         and halt yourself when e.detail.except !== you.
  */
  function mountMediaCoordinator() {
    var current = null; // { type, el, stop }

    function stopCurrent(except) {
      if (!current || current === except) return;
      var c = current;
      current = null;
      try {
        if (c.type === 'native' && c.el && typeof c.el.pause === 'function') {
          if (!c.el.paused) c.el.pause();
        } else if (c.type === 'embed' && c.el) {
          // c.el is the carrier with .is-playing + injected .video-embed
          var wrap = c.el.querySelector('.video-embed');
          if (wrap) {
            wrap.classList.remove('is-active');
            setTimeout(function () { if (wrap.parentNode) wrap.remove(); }, 400);
          }
          c.el.classList.remove('is-playing');
        } else if (typeof c.stop === 'function') {
          c.stop();
        }
      } catch (_) {}
      // Tell custom players to stop (category 3), excepting the new claimant.
      document.dispatchEvent(new CustomEvent('cc:media-stop', { detail: { except: except ? except.el : null } }));
    }

    function claim(entry) {
      if (current && current.el === entry.el) { current = entry; return; }
      stopCurrent(entry);
      current = entry;
    }

    // 1. Native <audio>/<video> — capture phase so we see every play event.
    document.addEventListener('play', function (e) {
      var el = e.target;
      if (!el || (el.tagName !== 'AUDIO' && el.tagName !== 'VIDEO')) return;
      claim({ type: 'native', el: el });
    }, true);

    // 2. YouTube embeds — watch for a carrier gaining .is-playing (the site's
    //    own play path adds it when it injects the iframe).
    var moTargets = document.querySelectorAll('[data-yt-id], .videos__panel, .videos__thumb, .lib-hero__video, .story-modal__video');
    var obs = new MutationObserver(function (muts) {
      muts.forEach(function (m) {
        if (m.type !== 'attributes' || m.attributeName !== 'class') return;
        var t = m.target;
        if (t.classList && t.classList.contains('is-playing') && t.querySelector && t.querySelector('.video-embed')) {
          claim({ type: 'embed', el: t });
        }
      });
    });
    // Observe broadly (class changes anywhere) — cheap, attribute-filtered.
    obs.observe(document.body, { subtree: true, attributes: true, attributeFilter: ['class'] });

    // 3. Custom JS players announce themselves.
    document.addEventListener('cc:media-start', function (e) {
      var d = (e && e.detail) || {};
      claim({ type: 'custom', el: d.source || null, stop: d.stop || null });
    });
  }

  // ─── On-phone audit hook (DEV ONLY · remove at Stage C) ──────────
  // Inert unless the URL carries ?probe=1. Loads cc-probe.js from the
  // same origin, which renders a copyable Tier 0 / Tier 2 report overlay.
  // No bookmarklet, no console. Works on every page incl. 404/500.
  function mountProbeHook() {
    if (!/[?&]probe=1(\b|&|$)/.test(location.search)) return;
    var s = document.createElement('script');
    s.src = 'cc-probe.js?' + Date.now();   // cache-bust so edits always load
    s.onerror = function () {
      // surface a hint if the file isn't deployed next to the page
      var d = document.createElement('div');
      d.textContent = 'cc-probe.js not found at site root — place it next to the HTML pages.';
      d.setAttribute('style', 'position:fixed;left:0;right:0;bottom:0;z-index:2147483647;background:#5a1111;color:#fff;font:13px/1.4 monospace;padding:10px;text-align:center');
      document.body.appendChild(d);
    };
    document.body.appendChild(s);
  }

  function init() {
    mountProbeHook();
    runSmoothScroll();
    runHeroEntrance();
    runScrollReveals();
    runMagnetic();
    runAnchorPermalinks();
    mountModalFocusTrap();
    mountFooter();
    mountMediaCoordinator();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
