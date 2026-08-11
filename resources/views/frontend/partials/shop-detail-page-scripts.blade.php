@verbatim

<!-- ═══════════════════════════════════════════════════════════════
     SCRIPTS — Nav · Side Index · Tabs · Buy · Audio · Reveal
     ═══════════════════════════════════════════════════════════════ -->
<script>
(function(){
  'use strict';
  /* TODO · KNOWN ISSUE · 2026-05 (deferred from FOOTER-001 sync):
     This inline IIFE duplicates SIDENAV section/instrument click handlers
     and NAV social dropdown bindings that are ALSO bound by the inlined
     cc-components.js block further down. Currently every click on those
     elements fires its handler twice. Out of scope for footer sync;
     needs its own audit pass to either gut this IIFE down to page-only
     concerns or remove cc-components.js's overlapping sections. */
  /* ════════════════════════════
     SIDENAV-001 — unified nav interactions
     · Section collapse/expand (independent)
     · Recording Services accordion (one instrument at a time)
     · Mobile bottom-sheet toggle
     · "centered when fully collapsed" via .has-expanded class
     ════════════════════════════ */
  const sidenav     = document.getElementById('sidenav');
  const sidenavPull = document.getElementById('sidenav-pull');

  function syncCenterState() {
    if (!sidenav) return;
    const anyExpanded = !!sidenav.querySelector('.sidenav__section.expanded');
    sidenav.classList.toggle('has-expanded', anyExpanded);
  }

  if (sidenav) {
    // Top-level section collapse/expand · skip .locked-open sections (always open)
    sidenav.querySelectorAll('.sidenav__section > .sidenav__section-head').forEach(head => {
      const section = head.parentElement;
      if (section.classList.contains('locked-open')) return;
      head.addEventListener('click', () => {
        const isOpen = section.classList.toggle('expanded');
        head.setAttribute('aria-expanded', isOpen);
        syncCenterState();
      });
    });

    // Recording Services — accordion: only one instrument expanded at a time
    const recSection = sidenav.querySelector('[data-section="recording-services"]');
    if (recSection) {
      recSection.querySelectorAll('.sidenav__instr > .sidenav__instr-head').forEach(head => {
        head.addEventListener('click', () => {
          const instr = head.parentElement;
          const wasOpen = instr.classList.contains('expanded');
          // Collapse all siblings first
          recSection.querySelectorAll('.sidenav__instr.expanded').forEach(other => {
            if (other !== instr) {
              other.classList.remove('expanded');
              const otherHead = other.querySelector('.sidenav__instr-head');
              if (otherHead) otherHead.setAttribute('aria-expanded', 'false');
            }
          });
          instr.classList.toggle('expanded', !wasOpen);
          head.setAttribute('aria-expanded', !wasOpen);
        });
      });
    }

    // Keyboard: Esc collapses non-locked sections only
    sidenav.addEventListener('keydown', e => {
      if (e.key === 'Escape') {
        sidenav.querySelectorAll('.sidenav__section.expanded:not(.locked-open)').forEach(s => {
          s.classList.remove('expanded');
          const h = s.querySelector('.sidenav__section-head');
          if (h) h.setAttribute('aria-expanded', 'false');
        });
        syncCenterState();
      }
    });

    // Initial state sync (active section is already .expanded in markup)
    syncCenterState();
  }

  // Mobile bottom-sheet toggle handled by cc-components.js · removed dup to avoid double-toggle


  /* ════════════════════════════
     HERO VIDEO — mouse-follow highlight (heritage signature)
     ════════════════════════════ */
  const heroFrame = document.getElementById('hero-video-frame');
  const heroHighlight = document.getElementById('hero-video-highlight');
  if (heroFrame && heroHighlight && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
    heroFrame.addEventListener('mousemove', e => {
      const r = heroFrame.getBoundingClientRect();
      heroHighlight.style.left = (e.clientX - r.left) + 'px';
      heroHighlight.style.top  = (e.clientY - r.top) + 'px';
    });
  }

  /* §4 Videos panels — same mouse-follow highlight (heritage aesthetic) */
  if (window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
    document.querySelectorAll('.videos__panel').forEach(panel => {
      const hl = panel.querySelector('.videos__panel-highlight');
      if (!hl) return;
      panel.addEventListener('mousemove', e => {
        const r = panel.getBoundingClientRect();
        hl.style.left = (e.clientX - r.left) + 'px';
        hl.style.top  = (e.clientY - r.top)  + 'px';
      });
    });
  }

  /* ════════════════════════════
     BUY BAR — REMOVED in v4.3 (price card moved to top of hero, no sticky)
     ════════════════════════════ */

  /* SHORTLIST button (#shortlist-btn) is now owned by the shared
     wishlist-actions.js delegated handler (data-action="wishlist") —
     it persists to the server instead of an in-memory toggle. */

  /* ════════════════════════════
     LICENSE MODAL — open from buy bar · close on backdrop/close/Esc
     ════════════════════════════ */
  const licenseBtn   = document.getElementById('license-btn');
  const licenseModal = document.getElementById('license-modal');
  const openLicense = () => {
    if (!licenseModal) return;
    licenseModal.classList.add('is-open');
    licenseModal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    // Desktop: Lenis runs its own scroll loop and ignores body overflow:hidden,
    // so without this the PAGE scrolls behind the modal. Stop Lenis while open.
    if (window.__lenis) window.__lenis.stop();
  };
  const closeLicense = () => {
    if (!licenseModal) return;
    licenseModal.classList.remove('is-open');
    licenseModal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
    if (window.__lenis) window.__lenis.start();
  };
  if (licenseBtn) licenseBtn.addEventListener('click', openLicense);
  if (licenseModal) {
    licenseModal.querySelectorAll('[data-modal-close]').forEach(el => {
      el.addEventListener('click', closeLicense);
    });
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape' && licenseModal.classList.contains('is-open')) closeLicense();
    });
  }

  /* ════════════════════════════
     VIDEO TABS (desktop)
     ════════════════════════════ */
  const tabs   = document.querySelectorAll('.videos__tab');
  const panels = document.querySelectorAll('.videos__panel');
  // ─── Video carousel ───────────────────────────────────────────────
  (function videoCarousel(){
    var stage = document.querySelector('.videos__panel-stage');
    var track = document.querySelector('.videos__panel-track');
    if (!stage || !track || !panels.length) return;
    var tabList = Array.prototype.slice.call(tabs);
    var panelList = Array.prototype.slice.call(panels);
    var count = panelList.length;
    var index = 0;
    var prevBtn = stage.querySelector('.videos__arrow--prev');
    var nextBtn = stage.querySelector('.videos__arrow--next');

    /* Self-contained — the page's closeEmbed() lives in a different scope and
       isn't reliably reachable here, so the carousel closes playing videos
       itself (remove embed + is-playing). This is what makes drag/arrow/tab
       all actually stop a playing video. */
    function closePlaying(){
      document.querySelectorAll('.videos__panel.is-playing').forEach(function(p){
        var wrap = p.querySelector('.video-embed');
        if (wrap) {
          var fr = wrap.querySelector('iframe');
          if (fr && fr.contentWindow) { try { fr.contentWindow.postMessage(JSON.stringify({ event:'command', func:'pauseVideo', args:[] }), 'https://www.youtube.com'); } catch(e){} }
          wrap.classList.remove('is-active');   // KEEP the iframe alive (warm session) — no teardown
        }
        p.classList.remove('is-playing');
      });
    }

    function setTrack(px, animate){
      track.style.transition = animate ? '' : 'none';
      track.style.transform = 'translateX(' + px + 'px)';
    }
    function go(i, animate){
      var prevIndex = index;
      index = Math.max(0, Math.min(count - 1, i));
      setTrack(-index * stage.clientWidth, animate !== false);
      // sync tabs
      tabList.forEach(function(t, k){
        var on = k === index;
        t.classList.toggle('active', on);
        t.setAttribute('aria-selected', on);
      });
      if (prevBtn) prevBtn.disabled = index === 0;
      if (nextBtn) nextBtn.disabled = index === count - 1;
      // Close a playing embed only when the panel actually changes (not on a
      // snap-back to the same panel, which shouldn't interrupt playback).
      if (index !== prevIndex) {
        closePlaying();
      }
    }

    // Tabs
    tabList.forEach(function(tab, k){ tab.addEventListener('click', function(){ go(k); }); });
    // Arrows
    if (prevBtn) prevBtn.addEventListener('click', function(){ go(index - 1); });
    if (nextBtn) nextBtn.addEventListener('click', function(){ go(index + 1); });

    // Drag / swipe
    var dragging = false, startX = 0, startOffset = 0, moved = 0;
    function pointerDown(e){
      dragging = true; moved = 0;
      startX = (e.touches ? e.touches[0].clientX : e.clientX);
      startOffset = -index * stage.clientWidth;
      track.classList.add('is-dragging');
    }
    function pointerMove(e){
      if (!dragging) return;
      var x = (e.touches ? e.touches[0].clientX : e.clientX);
      moved = x - startX;
      /* Once the drag passes a small movement threshold, stop any playing video
         immediately — you're sliding away from it, so it shouldn't keep playing
         (audio/video) while the carousel moves. Guarded so a click doesn't trip it. */
      if (Math.abs(moved) > 8) {
        closePlaying();
      }
      setTrack(startOffset + moved, false);
    }
    function pointerUp(){
      if (!dragging) return;
      dragging = false;
      track.classList.remove('is-dragging');
      var threshold = stage.clientWidth * 0.18;   // 18% drag to advance
      if (moved < -threshold) go(index + 1);
      else if (moved > threshold) go(index - 1);
      else go(index);   // snap back
    }
    stage.addEventListener('mousedown', pointerDown);
    window.addEventListener('mousemove', pointerMove);
    window.addEventListener('mouseup', pointerUp);
    stage.addEventListener('touchstart', pointerDown, { passive: true });
    stage.addEventListener('touchmove', pointerMove, { passive: true });
    stage.addEventListener('touchend', pointerUp);

    // Keep offset correct on resize
    window.addEventListener('resize', function(){ setTrack(-index * stage.clientWidth, false); });
    // init
    go(0, false);
  })();



  // Patch previews · REMOVED. Patches are description-only cards now.

  /* ════════════════════════════
     SCROLL REVEAL
     ════════════════════════════ */
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const isDesktop = window.matchMedia('(min-width: 1025px)').matches;
  const heroEl = document.querySelector('.lib-hero');

  // Hero choreography (desktop only, no reduced-motion)
  // Add .choreographed on next frame so animations run from initial state
  if (heroEl && isDesktop && !prefersReduced) {
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        heroEl.classList.add('choreographed');
      });
    });
  }

  // Generic [data-reveal] reveals are now owned by polish.js (adds .is-revealed).
  // Hero choreography above is independent — runs via .choreographed class.
  // Removed: inline IO that added .visible (HANDOFF-NOTES #16, dual-system trap).


})();
</script>
<!-- ═══════════════════════════════════════════════════════════════
     BOOKING MODAL · opens from "Book a session" CTA · esc/backdrop close
     ═══════════════════════════════════════════════════════════════ -->
<div class="booking-modal" id="bookingModal" role="dialog" aria-modal="true" aria-labelledby="bookingModalTitle" aria-hidden="true">
  <div class="booking-modal__backdrop" data-close-booking aria-hidden="true"></div>

  <div class="booking-modal__sheet" role="document">

    <button type="button" class="booking-modal__close" data-close-booking aria-label="Close booking form">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>

    <header class="booking-modal__head">
      <span class="booking-modal__eyebrow">Book a session</span>
      <h2 class="booking-modal__title" id="bookingModalTitle">
        Tell us about your <span class="booking-modal__title-accent">cue</span>
      </h2>
      <p class="booking-modal__sub">
        Five minutes. Honest brief. We confirm artist, studio date, and price within 24 hours.
      </p>
    </header>

    <form class="booking-form" id="bookingForm" autocomplete="on">

      <div class="booking-form__row">
        <label class="booking-form__field">
          <span class="booking-form__label">Your name</span>
          <input type="text" name="name" class="booking-form__input" placeholder="Composer name" required>
        </label>
        <label class="booking-form__field">
          <span class="booking-form__label">Email</span>
          <input type="email" name="email" class="booking-form__input" placeholder="you@studio.com" required>
        </label>
      </div>

      <div class="booking-form__row">
        <label class="booking-form__field">
          <span class="booking-form__label">Project type</span>
          <select name="project_type" class="booking-form__input booking-form__input--select" required>
            <option value="" disabled selected>Select project type</option>
            <option>Film score</option>
            <option>OTT / TV series</option>
            <option>Game audio</option>
            <option>Advertisement</option>
            <option>Album / single</option>
            <option>Trailer</option>
            <option>Documentary</option>
            <option>Other</option>
          </select>
        </label>
        <label class="booking-form__field">
          <span class="booking-form__label">Instrument</span>
          <input type="text" name="instrument" class="booking-form__input" value="Sitar" required>
        </label>
      </div>

      <div class="booking-form__row">
        <label class="booking-form__field">
          <span class="booking-form__label">Tempo / BPM</span>
          <input type="text" name="bpm" class="booking-form__input" placeholder="e.g. 90 BPM, free time, rubato">
        </label>
        <label class="booking-form__field">
          <span class="booking-form__label">Raga / scale / key</span>
          <input type="text" name="raga" class="booking-form__input" placeholder="e.g. Yaman, D minor, Phrygian">
        </label>
      </div>

      <label class="booking-form__field booking-form__field--full">
        <span class="booking-form__label">Brief · mood, role of the cue, what it must do</span>
        <textarea name="brief" class="booking-form__input booking-form__input--textarea" rows="4" placeholder="Tell us what your composition needs. Length, mood, dramatic role, any references."></textarea>
      </label>

      <div class="booking-form__row">
        <label class="booking-form__field">
          <span class="booking-form__label">Reference link</span>
          <input type="url" name="reference" class="booking-form__input" placeholder="Dropbox · Drive · YouTube">
        </label>
        <label class="booking-form__field">
          <span class="booking-form__label">Deadline</span>
          <input type="date" name="deadline" class="booking-form__input">
        </label>
      </div>

      <label class="booking-form__nda">
        <input type="checkbox" name="nda" class="booking-form__nda-input">
        <span class="booking-form__nda-box" aria-hidden="true"></span>
        <span class="booking-form__nda-label">NDA required for this project</span>
      </label>

      <div class="booking-form__footer">
        <p class="booking-form__note">
          We reply within 24 hours with a complete plan: artist, session director, studio date, delivery timeline, total cost.
        </p>
        <button type="submit" class="booking-form__submit">
          <span>Send brief</span>
          <span aria-hidden="true">→</span>
        </button>
      </div>

    </form>

  </div>
</div>


<!-- Crypto Cipher · components JS -->
<script>
/* ═══════════════════════════════════════════════════════════════
   CRYPTO CIPHER® · COMPONENT JS · v1.0
   Floating nav · sidenav drawer · footer accordion · reveal observer
   Wrap in IIFE so multiple page scripts can coexist.
   ═══════════════════════════════════════════════════════════════ */
(function(){
  'use strict';

  /* ════════════════════════════
     NAV · scroll + hamburger
     ════════════════════════════ */
  const nav = document.getElementById('cc-nav');
  const hamburger = nav && nav.querySelector('.cc-nav__hamburger');
  const mobilePanel = document.getElementById('cc-nav-mobile');
  let scrollTick = false;

  if (nav) {
    window.addEventListener('scroll', function(){
      if (scrollTick) return;
      scrollTick = true;
      requestAnimationFrame(function(){
        nav.classList.toggle('scrolled', window.scrollY > 80);
        scrollTick = false;
      });
    }, { passive: true });
  }

  if (hamburger && mobilePanel) {
    hamburger.addEventListener('click', () => {
      const open = mobilePanel.classList.toggle('open');
      hamburger.classList.toggle('open', open);
      hamburger.setAttribute('aria-expanded', open);
      document.body.style.overflow = open ? 'hidden' : '';
    });
    mobilePanel.querySelectorAll('a').forEach(a => {
      a.addEventListener('click', () => {
        mobilePanel.classList.remove('open');
        hamburger.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });
  }

  /* ════════════════════════════
     NAV · Social dropdown (desktop)
     - Click toggles · click outside closes · Escape closes
     - aria-expanded + aria-hidden kept in sync
     ════════════════════════════ */
  (function initNavDropdowns(){
    var pairs = [
      ['.cc-nav__link--social',  'cc-nav-social-dropdown'],
      ['.cc-nav__link--account', 'cc-nav-account-dropdown']
    ].map(function (p) {
      var trigger = nav && nav.querySelector(p[0]);
      var dropdown = document.getElementById(p[1]);
      return (trigger && dropdown) ? { trigger: trigger, dropdown: dropdown } : null;
    }).filter(Boolean);
    if (!pairs.length) return;
    function setOpen(pair, open) {
      pair.dropdown.classList.toggle('open', open);
      pair.trigger.setAttribute('aria-expanded', open ? 'true' : 'false');
      pair.dropdown.setAttribute('aria-hidden', open ? 'false' : 'true');
    }
    function closeAll(except) { pairs.forEach(function (p) { if (p !== except) setOpen(p, false); }); }
    pairs.forEach(function (pair) {
      pair.trigger.addEventListener('click', function (e) {
        e.stopPropagation();
        var willOpen = !pair.dropdown.classList.contains('open');
        closeAll(pair); setOpen(pair, willOpen);
      });
      pair.dropdown.querySelectorAll('a').forEach(function (a) {
        a.addEventListener('click', function () { setOpen(pair, false); });
      });
    });
    document.addEventListener('click', function (e) {
      pairs.forEach(function (pair) {
        if (!pair.dropdown.contains(e.target) && !pair.trigger.contains(e.target)) setOpen(pair, false);
      });
    });
    document.addEventListener('keydown', function (e) {
      if (e.key !== 'Escape') return;
      pairs.forEach(function (pair) {
        if (pair.dropdown.classList.contains('open')) { setOpen(pair, false); pair.trigger.focus(); }
      });
    });
  })();

  /* CC · cart/wishlist count stub */
  window.CC = window.CC || {};
  window.CC.getCounts = window.CC.getCounts || function () { return { cart: 0, wishlist: 0 }; };
  window.CC.refreshBadges = function () {
    var c = window.CC.getCounts();
    document.querySelectorAll('[data-cart-count]').forEach(function (el) { el.textContent = c.cart; el.hidden = !(c.cart > 0); });
    document.querySelectorAll('[data-wishlist-count]').forEach(function (el) { el.textContent = c.wishlist; el.hidden = !(c.wishlist > 0); });
    document.querySelectorAll('[data-cart-total]').forEach(function (el) { el.textContent = c.cart; el.hidden = !(c.cart > 0); });
  };
  window.CC.refreshBadges();

  /* ════════════════════════════
     SVANTRA · magnetic hover
     - Mouse approach within button bounds shifts button toward cursor
     - Strength capped at 4px in any direction
     - Resets smoothly when cursor leaves
     - Disabled on touch/coarse pointers + reduced-motion
     ════════════════════════════ */
  (function initSvantraMagnetic(){
    const btn = nav && nav.querySelector('[data-magnetic]');
    if (!btn) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    if (window.matchMedia('(pointer: coarse)').matches) return;

    const STRENGTH = 0.18;
    const MAX = 4;

    function onMove(e) {
      const r = btn.getBoundingClientRect();
      const cx = r.left + r.width / 2;
      const cy = r.top + r.height / 2;
      let dx = (e.clientX - cx) * STRENGTH;
      let dy = (e.clientY - cy) * STRENGTH;
      dx = Math.max(-MAX, Math.min(MAX, dx));
      dy = Math.max(-MAX, Math.min(MAX, dy));
      btn.style.setProperty('--mx', dx + 'px');
      btn.style.setProperty('--my', dy + 'px');
    }
    function reset() {
      btn.style.setProperty('--mx', '0px');
      btn.style.setProperty('--my', '0px');
    }
    btn.addEventListener('mousemove', onMove);
    btn.addEventListener('mouseleave', reset);
    btn.addEventListener('blur', reset);
  })();
  /* ════════════════════════════
     SIDENAV-001 — unified nav interactions
     ════════════════════════════ */
  const sidenav     = document.getElementById('sidenav');
  const sidenavPull = document.getElementById('sidenav-pull');

  function syncCenterState() {
    if (!sidenav) return;
    const anyExpanded = !!sidenav.querySelector('.sidenav__section.expanded');
    sidenav.classList.toggle('has-expanded', anyExpanded);
  }

  if (sidenav) {
    /* Top-level section collapse/expand · skip .locked-open sections */
    sidenav.querySelectorAll('.sidenav__section > .sidenav__section-head').forEach(head => {
      const section = head.parentElement;
      if (section.classList.contains('locked-open')) return;
      head.addEventListener('click', () => {
        const isOpen = section.classList.toggle('expanded');
        head.setAttribute('aria-expanded', isOpen);
        syncCenterState();
      });
    });

    /* Recording Services — accordion: only one instrument expanded at a time */
    const recSection = sidenav.querySelector('[data-section="recording-services"]');
    if (recSection) {
      recSection.querySelectorAll('.sidenav__instr > .sidenav__instr-head').forEach(head => {
        head.addEventListener('click', () => {
          const instr = head.parentElement;
          const wasOpen = instr.classList.contains('expanded');
          recSection.querySelectorAll('.sidenav__instr.expanded').forEach(other => {
            if (other !== instr) {
              other.classList.remove('expanded');
              const otherHead = other.querySelector('.sidenav__instr-head');
              if (otherHead) otherHead.setAttribute('aria-expanded', 'false');
            }
          });
          instr.classList.toggle('expanded', !wasOpen);
          head.setAttribute('aria-expanded', !wasOpen);
        });
      });
    }

    /* Esc collapses non-locked sections */
    sidenav.addEventListener('keydown', e => {
      if (e.key === 'Escape') {
        sidenav.querySelectorAll('.sidenav__section.expanded:not(.locked-open)').forEach(s => {
          s.classList.remove('expanded');
          const h = s.querySelector('.sidenav__section-head');
          if (h) h.setAttribute('aria-expanded', 'false');
        });
        syncCenterState();
      }
    });

    syncCenterState();
  }

  if (sidenavPull && sidenav) {
    const pullLabel = document.getElementById('sidenav-pull-label');
    const pullClose = document.getElementById('sidenav-pull-close');

    function setDrawerState(isOpen) {
      sidenav.classList.toggle('open', isOpen);
      sidenavPull.setAttribute('aria-expanded', isOpen);
      sidenavPull.setAttribute('aria-label', isOpen ? 'Close navigation' : 'Open navigation');
      if (pullLabel) pullLabel.textContent = isOpen ? 'Close' : 'Navigate';
    }

    /* Tap pull-tab itself: toggle open/close.
       Tap close button: always closes (stopPropagation prevents double-toggle). */
    sidenavPull.addEventListener('click', (e) => {
      // If the click came from the close button, the close handler runs;
      // skip the parent toggle so it doesn't immediately re-open.
      if (e.target.closest('.sidenav__pull-close')) return;
      setDrawerState(!sidenav.classList.contains('open'));
    });
    /* Keyboard support: Enter/Space on pull-tab toggles drawer */
    sidenavPull.addEventListener('keydown', (e) => {
      if (e.target.closest('.sidenav__pull-close')) return;
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        setDrawerState(!sidenav.classList.contains('open'));
      }
    });
    if (pullClose) {
      pullClose.addEventListener('click', (e) => {
        e.stopPropagation();
        setDrawerState(false);
      });
    }

    /* Auto-close drawer when a navigation link is tapped (mobile only) */
    sidenav.querySelectorAll('a').forEach(a => {
      a.addEventListener('click', () => {
        if (window.matchMedia('(max-width: 1024px)').matches) {
          setTimeout(() => setDrawerState(false), 200);
        }
      });
    });

    /* Esc closes the mobile drawer */
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && sidenav.classList.contains('open') &&
          window.matchMedia('(max-width: 1024px)').matches) {
        setDrawerState(false);
      }
    });
  }

  /* ════════════════════════════
     Generic [data-reveal] IO observer
     ════════════════════════════ */
  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });
    document.querySelectorAll('[data-reveal]').forEach(el => io.observe(el));
  } else {
    document.querySelectorAll('[data-reveal]').forEach(el => el.classList.add('visible'));
  }


})();

</script>

<!-- Crypto Cipher · inline video play · YouTube iframe inside the video card -->
<script>
(function(){
  /* Click on any element with data-yt-id (or its descendants) → play YouTube
     iframe INSIDE that container. Close button hides it (kept alive). */
  function ytEmbedCmd(wrap, func, args) {
    var fr = wrap && wrap.querySelector('iframe');
    if (!fr || !fr.contentWindow) return;
    try { fr.contentWindow.postMessage(JSON.stringify({ event: 'command', func: func, args: args || [] }), 'https://www.youtube.com'); } catch (e) {}
  }
  function ytEmbedListen(fr) {
    if (!fr || !fr.contentWindow) return;
    try { fr.contentWindow.postMessage(JSON.stringify({ event: 'listening', channel: 'widget' }), 'https://www.youtube.com'); } catch (e) {}
  }
  function pauseEmbed(carrier) {
    var wrap = carrier.querySelector('.video-embed');
    if (wrap) { ytEmbedCmd(wrap, 'pauseVideo'); wrap.classList.remove('is-active'); }
    carrier.classList.remove('is-playing');
  }

  function buildEmbed(carrier, ytId) {
    // One-source-at-a-time: pause any other playing embed (keep it warm, don't destroy).
    document.querySelectorAll('[data-yt-id].is-playing').forEach(function (other) {
      if (other !== carrier) pauseEmbed(other);
    });
    var wrap = carrier.querySelector('.video-embed');
    if (wrap) {
      // KEEP-ALIVE: re-show the existing warm player → no teardown, no glitch.
      ytEmbedCmd(wrap, 'playVideo');
      requestAnimationFrame(() => { requestAnimationFrame(() => {
        wrap.classList.add('is-active'); carrier.classList.add('is-playing');
      }); });
      return;
    }
    // FIRST build for this carrier (the one clean cold start).
    wrap = document.createElement('div');
    wrap.className = 'video-embed';
    wrap.innerHTML = `
      <button type="button" class="video-embed__close" aria-label="Close video">
        <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6" fill="none" stroke-linecap="round"><line x1="6" y1="6" x2="18" y2="18"/><line x1="6" y1="18" x2="18" y2="6"/></svg>
      </button>
      <iframe
        title="Library video"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin"
        allowfullscreen
        src="https://www.youtube.com/embed/${ytId}?autoplay=1&rel=0&modestbranding=1&playsinline=1&enablejsapi=1"></iframe>
    `;
    carrier.appendChild(wrap);
    var fr = wrap.querySelector('iframe');
    var n = 0, iv = setInterval(function () { ytEmbedListen(fr); if (++n >= 8) clearInterval(iv); }, 350);
    fr.addEventListener('load', function () { ytEmbedListen(fr); }, { once: true });
    // Force reflow then activate transition
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        wrap.classList.add('is-active');
        carrier.classList.add('is-playing');
      });
    });
    // Close handler
    wrap.querySelector('.video-embed__close').addEventListener('click', (e) => {
      e.stopPropagation();
      closeEmbed(carrier);
    });
  }

  function closeEmbed(carrier) {
    const wrap = carrier.querySelector('.video-embed');
    if (!wrap) return;
    ytEmbedCmd(wrap, 'pauseVideo');     // KEEP-ALIVE: pause, don't remove → warm replay (no glitch)
    wrap.classList.remove('is-active');
    carrier.classList.remove('is-playing');
  }

  document.addEventListener('click', (e) => {
    const closeBtn = e.target.closest('.video-embed__close');
    if (closeBtn) return;  // handled in its own listener

    const carrier = e.target.closest('[data-yt-id]');
    if (!carrier) return;
    if (carrier.classList.contains('is-playing')) return;  // already playing
    const ytId = carrier.getAttribute('data-yt-id');
    if (ytId) {
      e.preventDefault();
      buildEmbed(carrier, ytId);
    }
  });

  // Keyboard accessibility (carriers with role="button")
  document.addEventListener('keydown', (e) => {
    if (e.key !== 'Enter' && e.key !== ' ') return;
    const carrier = e.target.closest('[data-yt-id]');
    if (!carrier || carrier.classList.contains('is-playing')) return;
    const ytId = carrier.getAttribute('data-yt-id');
    if (ytId) {
      e.preventDefault();
      buildEmbed(carrier, ytId);
    }
  });

  /* ─── Video thumbnails ───────────────────────────────────────────
     Paint the real YouTube thumbnail behind every video carrier that has a
     data-yt-id (hero + any video panel). Mirrors the homepage loadPosterThumb:
     try maxresdefault, fall back to hqdefault if it doesn't exist (detected by
     natural width). No API key — i.ytimg.com is the public CDN. Painted as a
     background UNDER the existing highlight/vignette/play overlays, with a soft
     site-tone gradient so it matches the design. Needs internet (real device/
     server) — won't appear in offline/file:// tests. Carriers without a
     data-yt-id keep their gradient placeholder; add an id later and this
     auto-loads their thumbnail too. */
  (function loadVideoThumbs(){
    var carriers = document.querySelectorAll('[data-yt-id]');
    carriers.forEach(function(carrier){
      var ytId = carrier.getAttribute('data-yt-id');
      if (!ytId) return;
      function paint(url){
        var bg = [
          'linear-gradient(160deg, rgba(10,14,20,0.20) 0%, rgba(10,14,20,0.10) 100%)',
          'url("' + url + '")'
        ].join(', ');
        /* Prefer a dedicated poster layer (hero) so the image sits above the
           frame's opaque ::after base; fall back to the frame background for
           panels/thumbs that have no poster child. */
        var poster = carrier.querySelector('.lib-hero__poster');
        if (poster) {
          poster.style.backgroundImage = bg;
          poster.classList.add('has-thumb');
        } else {
          carrier.style.backgroundImage = bg;
          carrier.style.backgroundSize = 'cover';
          carrier.style.backgroundPosition = 'center';
          carrier.style.backgroundRepeat = 'no-repeat';
        }
        /* Mark the carrier so CSS can apply the glass scrim / play-button. */
        carrier.classList.add('has-thumb');
      }
      var hi = 'https://i.ytimg.com/vi/' + ytId + '/maxresdefault.jpg';
      var lo = 'https://i.ytimg.com/vi/' + ytId + '/hqdefault.jpg';
      var probe = new Image();
      probe.onload  = function(){ paint(probe.naturalWidth > 120 ? hi : lo); };
      probe.onerror = function(){ paint(lo); };
      probe.src = hi;
    });
  })();

  // Walkthrough tab switching · close any active embed when switching tabs
  document.querySelectorAll('.videos__tab').forEach(tab => {
    tab.addEventListener('click', () => {
      document.querySelectorAll('.videos__panel.is-playing').forEach(p => closeEmbed(p));
    });
  });
})();
</script>

<!-- Crypto Cipher · booking modal JS -->
<script>
/* Booking modal · open/close · esc · backdrop · focus return */
(function(){
  const modal = document.getElementById('bookingModal');
  if (!modal) return;
  const openers = document.querySelectorAll('[data-open-booking]');
  const closers = modal.querySelectorAll('[data-close-booking]');
  let lastFocused = null;

  function openModal() {
    lastFocused = document.activeElement;
    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.classList.add('booking-locked');
    // Focus first input
    setTimeout(() => {
      const firstInput = modal.querySelector('input, select, textarea, button');
      if (firstInput) firstInput.focus();
    }, 100);
  }
  function closeModal() {
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('booking-locked');
    if (lastFocused && lastFocused.focus) lastFocused.focus();
  }

  openers.forEach(el => el.addEventListener('click', (e) => { e.preventDefault(); openModal(); }));
  closers.forEach(el => el.addEventListener('click', closeModal));

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('is-open')) closeModal();
  });

  // Form submit · placeholder for backend wire-up
  const form = document.getElementById('bookingForm');
  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      // TODO: backend POST handler · for now just close + log
      const data = Object.fromEntries(new FormData(form).entries());
      console.log('[Booking] Brief submitted:', data);
      // Simple feedback
      const btn = form.querySelector('.booking-form__submit span');
      if (btn) {
        const orig = btn.textContent;
        btn.textContent = 'Brief sent ✓';
        setTimeout(() => { btn.textContent = orig; closeModal(); form.reset(); }, 1400);
      }
    });
  }
})();

</script>

<!-- Card actions: wishlist + cart delegated handler -->
<script>
(function () {
  document.addEventListener('click', function (e) {
    var btn = e.target.closest('.cc-card-action-btn');
    if (!btn) return;
    e.preventDefault();
    e.stopPropagation();
    var action = btn.getAttribute('data-action');
    btn.classList.toggle('is-active');
    document.dispatchEvent(new CustomEvent('cc:card-action', {
      detail: {
        action: action,
        active: btn.classList.contains('is-active'),
        button: btn,
        card: btn.closest('.rec-card, .lib-card, .libs__card')
      }
    }));
  }, true);
})();
</script>



<!-- ═══ Shared polish layer · DO NOT inline · loads last in body ═══ -->

<style>
/* Video fill layers nest at the frame radius. The frame now has NO border, so
   it clips children at a true 28px (mobile 20px) — fill layers inherit cleanly.
   `.video-embed` carries `overflow:hidden` so the YouTube iframe's square
   corners are clipped to the radius (the real corner-leak fix). */
.lib-hero__poster,
.video-embed,
.video-embed iframe {
  border-radius: inherit;
}
</style>
<style>
/* ── Tier 1/3 mobile fixes (03) ── */
/* Tier 2 · tap targets — primary actions ≥44px (pragmatic standard).
   Close buttons intentionally left small: every modal has backdrop-tap to
   close as a large secondary dismiss target. */
@media (max-width: 768px) {
  /* video thumbnail play buttons were 38px → bump to 44 (primary: plays video) */
  .videos__thumb-play { width: 44px !important; height: 44px !important; }
  /* video tabs ~40px tall → add vertical padding to clear 44 */
  .videos__tab { padding-top: 0.7rem !important; padding-bottom: 0.7rem !important; }
}
/* Section title→content spacing: 2rem reads as a desktop gap on mobile.
   Tighten to 1.5rem for app-grade rhythm. */
@media (max-width: 640px) {
  .section__head { margin-bottom: 1.5rem; }
}
/* Breadcrumb: hide on mobile to reclaim top space. Kept in DOM for SEO/JSON-LD. */
@media (max-width: 768px) {
  .lib-hero__breadcrumb { display: none !important; }
}
</style>
<script>
/* Scoped (03 only): reveal the demo player-box EARLIER on mobile.
   The shared reveal IO (polish.js) triggers at 18% visibility + a -50px bottom
   margin, so on a phone the player appeared late ("unexpected"). This adds a
   second, earlier-triggering observer for THIS element only — generous
   rootMargin fires it before you scroll to it. Idempotent: adds the same
   .is-revealed class the shared system uses; whichever fires first wins, and
   we unobserve after. Does NOT touch the global system or other elements. */
(function () {
  if (!window.matchMedia('(max-width: 768px)').matches) return;       // mobile only
  if (!('IntersectionObserver' in window)) return;
  var box = document.querySelector('.player-box[data-reveal]');
  if (!box) return;
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (en) {
      if (en.isIntersecting) {
        box.classList.add('is-revealed');   // same class the shared system uses
        io.unobserve(box);
      }
    });
  }, { threshold: 0.01, rootMargin: '0px 0px 250px 0px' });           // fire ~250px early
  io.observe(box);
})();
</script>
<style id="cc-video-time-removal">
/* Per direction (2026-06-11): video duration badges show wrong, hardcoded
   times and are not needed - removed on hero video, tutorial tabs,
   panels and strip thumbs. Markup retained for a future backend value. */
.lib-hero__video-duration,
.videos__tab-duration,
.videos__thumb-duration {
  display: none !important;
}
</style>
<script id="cc-video-thumbs-bus">
/* AUDIO/VIDEO v2 - YouTube poster thumbnails + one-source bus for embeds.
   Carriers marked data-yt-placeholder="1" still need their REAL ids. */
(function () {
  'use strict';
  document.querySelectorAll('[data-yt-id]').forEach(function (el) {
    var id = el.getAttribute('data-yt-id');
    if (!id) return;
    el.style.backgroundImage =
      'linear-gradient(135deg, rgba(13,17,23,0.30), rgba(13,17,23,0.55)), ' +
      'url("https://i.ytimg.com/vi/' + id + '/hqdefault.jpg")';
    el.style.backgroundSize = 'cover';
    el.style.backgroundPosition = 'center';
  });
  function pauseAllEmbeds() {
    document.querySelectorAll('.video-embed iframe').forEach(function (f) {
      try { f.contentWindow.postMessage(JSON.stringify({ event: 'command', func: 'pauseVideo', args: [] }), '*'); } catch (e) {}
    });
  }
  document.addEventListener('cc:media-start', function (e) {
    var d = e && e.detail || {};
    if (d.owner !== 'yt-embed') pauseAllEmbeds();
  });
  new MutationObserver(function (muts) {
    muts.forEach(function (mu) {
      Array.prototype.forEach.call(mu.addedNodes, function (n) {
        if (n.nodeType === 1 && n.classList && n.classList.contains('video-embed')) {
          var f = n.querySelector('iframe');
          if (f && f.src.indexOf('enablejsapi=1') < 0) f.src += '&enablejsapi=1';
          document.dispatchEvent(new CustomEvent('cc:media-start', { detail: { owner: 'yt-embed' } }));
        }
      });
    });
  }).observe(document.body, { childList: true, subtree: true });
})();
</script>
<!-- demo audio doctrine (owner decision 2026-06-12): NO loudness
     processing - composers deliver mastered audio, levels untouched.
     ONE shared engine sitewide: cc-demo-player.js (audio controller +
     cc-wave renderer); one media source via cc:media-start ->
     polish.js coordinator. Continuous play is per-player: each .player
     loops within its own track list (last track -> first). -->

<style>
  /* live waveform slot: a real allocated section in each track */
  .newrel__player-list .player__wave,
  .player__row .player__wave {
    position: relative; flex: 1 1 auto; min-width: 60px;
    height: 20px; align-self: center; overflow: hidden;
  }
  .player__wave canvas.cc-lw {
    position: absolute; inset: 0; width: 100%; height: 100%; display: block;
  }
</style>
<style id="cc-finalize-03">
@media (max-width: 768px) {
  /* one cosmos: the hero ambient glow's soft arc read as a broken
     rounded layer at the card's corner — gone */
  .lib-hero__ambient { display: none !important; }
  /* one geometry on the hero video card: every layer follows one radius */
  .lib-hero__video { border-radius: 20px !important; }
  .lib-hero__video::before, .lib-hero__video::after { border-radius: 20px !important; }

  /* patches: text yields, the card never does */
  .patch { min-height: 92px; }
  .patch__name {
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    min-width: 0;
  }
  .patch__desc {
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;
    overflow: hidden;
  }

  /* hero meta: a single STAT BAR — Format · Size · License — hairline
     framed, columns divided, tight. The cut row's space is reclaimed:
     bar margins tightened and the warning pulled up. */
  .lib-hero__meta-item:nth-child(3),
  .lib-hero__meta-item:nth-child(4),
  .lib-hero__meta-item:nth-child(5) { display: none !important; }
  .lib-hero__meta {
    display: grid !important; grid-template-columns: repeat(3, 1fr) !important;
    gap: 0 !important; margin: 1.1rem 0 1rem !important;
    padding: 0.75rem 0 !important;
    border-top: 1px solid rgba(255, 255, 255, 0.07);
    border-bottom: 1px solid rgba(255, 255, 255, 0.07);
  }
  .lib-hero__meta-item {
    display: flex !important; flex-direction: column; gap: 3px;
    align-items: flex-start; min-width: 0;
    padding: 0 0.8rem !important; margin: 0 !important;
    border-left: 1px solid rgba(255, 255, 255, 0.06);
  }
  .lib-hero__meta-item:first-child { border-left: none; padding-left: 0 !important; }
  .lib-hero__meta-label {
    font-size: 0.46rem !important; letter-spacing: 0.2em !important;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
  }
  .lib-hero__meta-value {
    font-size: 0.68rem !important; font-weight: 600 !important; line-height: 1.35 !important;
    white-space: normal !important; /* "Sync-Cleared · AI-Free" was clipping */
    display: -webkit-box !important; -webkit-line-clamp: 2; -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .lib-hero__warning { margin-top: 1.1rem !important; }
  #pricing-card, .buybox { margin-top: 1.2rem !important; } /* balanced video->price on mobile */
  /* (value clamp rules live in the stat-bar block below) */

  /* ── top-to-bottom harmonization (site metronome) ── */
  /* one title rank across the page (matches homepage system) */
  .section__title { font-size: clamp(1.5rem, 6vw, 1.9rem) !important; }
  .lib-hero__title { font-size: clamp(1.7rem, 7vw, 2.2rem) !important; }
  section.section { padding-top: 2.75rem !important; padding-bottom: 1.25rem !important; }
  /* FAQ at site scale, same as homepage */
  .faq__q { font-size: 0.8rem !important; line-height: 1.4 !important; }
  .faq__q { padding-top: 0.8rem !important; padding-bottom: 0.8rem !important; }
  .faq__a { font-size: 0.72rem !important; line-height: 1.6 !important; }
  .faq__icon { width: 14px !important; height: 14px !important; }

  /* description stats + credit cards: same law */
  .description__stat, .credit-card { min-height: 0; }
  .description__stat *, .credit-card * { min-width: 0; }
  .description__stat [class*="value"], .description__stat [class*="label"],
  .credit-card [class*="name"], .credit-card [class*="role"] {
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
  }
  /* footer: no scroll-reveal — present the moment it's reached */
  .ft[data-reveal], footer.ft { opacity: 1 !important; transform: none !important; transition: none !important; }
}

/* the wave container carried decorative bars from the page design —
   they rendered UNDER every real waveform (the recurring "fake layer").
   Once the real canvas mounts, only the canvas exists. */
.player__wave.cc-wave-ready > *:not(canvas.cc-lw) { display: none !important; }
.player__wave { border-radius: 4px; overflow: hidden; }
/* desktop focus: no browser blue ring — brand focus only when keyboard */
.player__play:focus { outline: none; }
.player__play:focus-visible { outline: none; box-shadow: 0 0 0 2px rgba(117, 194, 73, 0.5) !important; }
</style>

@endverbatim

