@verbatim
<!-- ═══════════════════════════════════════════════════════════════
     SCRIPTS — Nav · Sidenav · Footer accordion · Reveal IO
     ═══════════════════════════════════════════════════════════════ -->
<script>
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
     · DELETED — owned by polish.js (single source of truth).
     · The shared engine adds .is-revealed; polish.css §3 reads it.
     · Hero choreography below still works — it overrides [data-reveal]
       scoped to .instr-hero and uses its own .choreographed cascade.
     ════════════════════════════ */

  /* ════════════════════════════
     §1 HERO — choreography trigger (desktop · reduced-motion respected)
     ════════════════════════════ */
  const hero = document.querySelector('.instr-hero');
  if (hero) {
    const supportsHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const desktop = window.matchMedia('(min-width: 1025px)').matches;

    if (desktop && !reducedMotion) {
      // Trigger on next frame so animations start cleanly
      requestAnimationFrame(() => hero.classList.add('choreographed'));
    } else {
      // Mobile / reduced-motion · simple visible state
      // (canonical .is-revealed class, owned by polish.css §3)
      hero.querySelectorAll('[data-reveal]').forEach(el => el.classList.add('is-revealed'));
    }

    /* Cursor-aware highlight on video frame · desktop only */
    const video = document.getElementById('hero-video');
    const highlight = document.getElementById('hero-video-highlight');
    if (video && highlight && supportsHover) {
      video.addEventListener('mousemove', (e) => {
        const r = video.getBoundingClientRect();
        highlight.style.left = (e.clientX - r.left) + 'px';
        highlight.style.top = (e.clientY - r.top) + 'px';
      }, { passive: true });
    }

    /* YouTube facade + multi-video tab switcher.
       - Click main frame: load iframe for current data-yt-id
       - Click thumbnail: switch active video (kills iframe if playing, resets to facade for new video)
       - Keyboard: arrow keys navigate thumbnails (rail = role="tablist")
       - autoplay+mute is the only autoplay pattern Chrome reliably allows */
    if (video) {
      const captionEl = document.getElementById('hero-video-caption');
      const rail = document.querySelector('.instr-hero__rail');
      const thumbs = rail ? rail.querySelectorAll('.instr-hero__rail-thumb') : [];

      /* If only 1 video exists, hide the rail entirely — no point in a picker.
         If 0 thumbs, also hide. The main frame still works as a single-video facade. */
      if (rail && thumbs.length <= 1) {
        rail.style.display = 'none';
      }

      // ── KEEP-ALIVE helpers: keep ONE iframe; pause/hide instead of destroying.
      // Destroying tore down YouTube's audio session → cold restart → mobile glitch.
      var ytLoadedId = null;                         // id currently loaded in the live player
      function ytFrame() { return video.querySelector('iframe'); }
      function ytCmd(func, args) {
        var fr = ytFrame();
        if (!fr || !fr.contentWindow) return;
        try { fr.contentWindow.postMessage(JSON.stringify({ event: 'command', func: func, args: args || [] }), 'https://www.youtube.com'); } catch (e) {}
      }
      function ytListen() {
        var fr = ytFrame();
        if (!fr || !fr.contentWindow) return;
        try { fr.contentWindow.postMessage(JSON.stringify({ event: 'listening', channel: 'widget' }), 'https://www.youtube.com'); } catch (e) {}
      }
      function showFacade(show) {
        video.querySelectorAll('.instr-hero__video-poster, .instr-hero__video-overlay, .instr-hero__video-play, .instr-hero__video-caption, .instr-hero__video-highlight')
          .forEach(function (el) { el.style.display = show ? '' : 'none'; });
        if (show) { video.setAttribute('role', 'button'); video.setAttribute('tabindex', '0'); video.style.cursor = 'pointer'; }
        else { video.removeAttribute('role'); video.removeAttribute('tabindex'); video.style.cursor = 'default'; }
      }

      /* Reset main frame to facade state for a given video id — KEEP the iframe alive */
      function resetFrame(ytId, posterUrl, captionText) {
        var fr = ytFrame();
        if (fr) { ytCmd('pauseVideo'); fr.style.visibility = 'hidden'; } // warm session preserved
        video.dataset.loaded = 'false';
        video.dataset.ytId = ytId;
        showFacade(true);
        const poster = video.querySelector('.instr-hero__video-poster');
        if (poster && posterUrl) {
          poster.src = posterUrl;
          poster.alt = captionText || 'Video poster';
        }
        if (captionEl && captionText) captionEl.textContent = captionText;
      }

      /* Play the active video — keep ONE persistent iframe (no per-play teardown) */
      function loadYouTube() {
        const id = video.dataset.ytId;
        if (!id) return;
        // One-media-at-a-time (shared coordinator): announce video as active so
        // any playing audio demo stops.
        document.dispatchEvent(new CustomEvent('cc:media-start', { detail: { source: video } }));
        var fr = ytFrame();
        if (!fr) {
          // FIRST EVER play: create the iframe once (one cold start — already clean).
          fr = document.createElement('iframe');
          fr.src = 'https://www.youtube.com/embed/' + id +
                   '?autoplay=1&rel=0&modestbranding=1&playsinline=1&iv_load_policy=3&enablejsapi=1';
          fr.title = 'Sitar instrument film';
          fr.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share';
          fr.allowFullscreen = true;
          fr.style.cssText = 'position:absolute;inset:0;width:100%;height:100%;border:0;z-index:4;';
          fr.addEventListener('error', () => {
            window.open('https://www.youtube.com/watch?v=' + id, '_blank', 'noopener');
          });
          video.appendChild(fr);
          ytLoadedId = id;
          // Handshake so postMessage commands work on subsequent plays/switches.
          var n = 0, iv = setInterval(function () { ytListen(); if (++n >= 8) clearInterval(iv); }, 350);
          fr.addEventListener('load', ytListen, { once: true });
        } else if (id === ytLoadedId) {
          fr.style.visibility = 'visible';
          ytCmd('playVideo');              // same video, warm session → resume, no glitch
        } else {
          fr.style.visibility = 'visible';
          ytCmd('loadVideoById', [id]);    // switch in the SAME warm player (no reload)
          ytLoadedId = id;
        }
        video.dataset.loaded = 'true';
        showFacade(false);
      }

      /* Tab switcher: clicking a thumb resets the main frame to that video's facade.
         User then clicks the big play button to load the iframe — same gesture
         pattern as before (one click = facade reset, second click = iframe load). */
      function switchToThumb(thumb, autoplay) {
        if (!thumb || thumb.classList.contains('is-active') && video.dataset.loaded !== 'true') return;
        const ytId = thumb.dataset.ytId;
        const caption = thumb.dataset.caption || thumb.dataset.role || '';
        const posterImg = thumb.querySelector('.instr-hero__rail-thumb-img');
        const posterUrl = posterImg ? posterImg.src.replace('hqdefault', 'maxresdefault') : '';

        // Update active state on rail
        thumbs.forEach(t => {
          const isActive = t === thumb;
          t.classList.toggle('is-active', isActive);
          t.setAttribute('aria-selected', isActive);
        });

        // Reset frame to new facade
        resetFrame(ytId, posterUrl, caption);

        // If user explicitly chose to autoplay (e.g. clicked thumb of currently-playing video — refresh)
        if (autoplay) loadYouTube();
      }

      /* Wire main frame click: load iframe for current video */
      video.addEventListener('click', loadYouTube);
      video.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); loadYouTube(); }
      });

      /* Wire thumbnails */
      thumbs.forEach((thumb, idx) => {
        thumb.addEventListener('click', () => switchToThumb(thumb, false));

        /* Arrow key navigation between thumbs */
        thumb.addEventListener('keydown', (e) => {
          let target = null;
          if (e.key === 'ArrowRight') target = thumbs[idx + 1] || thumbs[0];
          else if (e.key === 'ArrowLeft') target = thumbs[idx - 1] || thumbs[thumbs.length - 1];
          else if (e.key === 'Home') target = thumbs[0];
          else if (e.key === 'End') target = thumbs[thumbs.length - 1];
          if (target) {
            e.preventDefault();
            target.focus();
            switchToThumb(target, false);
          }
        });
      });

      // One-media-at-a-time (shared): when other media starts, tear down a
      // playing video back to its facade. (05's video is a bespoke iframe, not
      // the .is-playing/.video-embed pattern the coordinator auto-observes, so
      // it opts in explicitly here.)
      document.addEventListener('cc:media-stop', function (e) {
        var except = e && e.detail ? e.detail.except : null;
        if (video === except) return;
        var fr = ytFrame();
        if (fr && video.dataset.loaded === 'true') {
          ytCmd('pauseVideo'); fr.style.visibility = 'hidden';   // keep alive, just pause+hide
          video.dataset.loaded = 'false';
          showFacade(true);
        }
      });
    }
  }


  /* ════════════════════════════
     §3 ANATOMY — hotspot ↔ legend sync
     Hover/focus shows tooltip (CSS only). Click on hotspot OR legend item adds
     `is-active` class to BOTH (sync), so user can click to "pin" the focus.
     Click outside or click the same item again removes pin.
     ════════════════════════════ */
  (function initAnatomy() {
    const photo = document.getElementById('anatomy-photo');
    if (!photo) return;
    const hotspots = document.querySelectorAll('.anatomy-hotspot[data-anatomy-id]');
    const legendItems = document.querySelectorAll('.anatomy-legend__item[data-anatomy-id]');
    if (!hotspots.length || !legendItems.length) return;

    /* Mobile reveal panel — populated when a pill is tapped */
    const reveal = document.getElementById('anatomy-reveal');
    const revealLabel = reveal ? reveal.querySelector('[data-reveal-label]') : null;
    const revealText = reveal ? reveal.querySelector('[data-reveal-text]') : null;

    /* Pull display data from each legend item once · cache for fast reveal updates */
    const partsById = {};
    legendItems.forEach(l => {
      const id = l.dataset.anatomyId;
      const name = l.querySelector('.anatomy-legend__name');
      const role = l.querySelector('.anatomy-legend__role');
      partsById[id] = {
        // Use existing innerHTML to preserve <em> tags
        label: id.padStart(2, '0') + ' · ' + (name ? name.textContent.trim().toUpperCase() : ''),
        text: role ? role.innerHTML : ''
      };
    });

    function clearActive() {
      hotspots.forEach(h => h.classList.remove('is-active'));
      legendItems.forEach(l => l.classList.remove('is-active'));
      if (reveal) {
        reveal.removeAttribute('data-active');
        if (revealLabel) revealLabel.textContent = '';
        if (revealText) revealText.innerHTML = '';
      }
    }
    function activate(id) {
      hotspots.forEach(h => h.classList.toggle('is-active', h.dataset.anatomyId === id));
      legendItems.forEach(l => l.classList.toggle('is-active', l.dataset.anatomyId === id));
      if (reveal && partsById[id]) {
        reveal.setAttribute('data-active', id);
        if (revealLabel) revealLabel.textContent = partsById[id].label;
        if (revealText) revealText.innerHTML = partsById[id].text;
      }
    }

    function toggle(id) {
      const isCurrentlyActive = document.querySelector(
        '.anatomy-hotspot[data-anatomy-id="' + id + '"].is-active'
      );
      if (isCurrentlyActive) {
        clearActive();
      } else {
        activate(id);
      }
    }

    hotspots.forEach(h => {
      h.addEventListener('click', (e) => {
        e.stopPropagation();
        toggle(h.dataset.anatomyId);
      });
    });
    legendItems.forEach(l => {
      l.addEventListener('click', (e) => {
        e.stopPropagation();
        toggle(l.dataset.anatomyId);
      });
    });

    // Click outside the photo or legend clears active state
    document.addEventListener('click', (e) => {
      if (!e.target.closest('.anatomy-stage')) clearActive();
    });

    // Esc clears active state
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') clearActive();
    });
  })();


})();
</script>

<!-- Footer scripts (extracted from footer.html) -->


<!-- ═══════════════════════════════════════════════════════════════
     BOOKING MODAL · opens from "Book a session" CTA · esc/backdrop close
     ═══════════════════════════════════════════════════════════════ -->
@verbatim
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

    /* Multi-add rows · instrument + reference. Clones the first row,
       clears its value, shows the remove button. Remove deletes the row. */
    form.querySelectorAll('[data-multi-add]').forEach(function(addBtn){
      const key = addBtn.getAttribute('data-multi-add');
      const wrap = form.querySelector('[data-multi="' + key + '"]');
      if (!wrap) return;
      addBtn.addEventListener('click', function(){
        const rows = wrap.querySelectorAll('.booking-form__multi-row');
        const clone = rows[0].cloneNode(true);
        const field = clone.querySelector('select, input');
        if (field) {
          field.value = '';
          if (field.tagName === 'SELECT') field.selectedIndex = 0;
          field.removeAttribute('required');  // only the first row is required
        }
        const rm = clone.querySelector('[data-multi-remove]');
        if (rm) rm.hidden = false;
        wrap.appendChild(clone);
      });
    });
    form.addEventListener('click', function(e){
      const rm = e.target.closest('[data-multi-remove]');
      if (rm) { const row = rm.closest('.booking-form__multi-row'); if (row) row.remove(); }
    });

    /* Acknowledgement gating · single tick lives inside How-we-work.
       Send is click-THROUGH (not native-disabled) so a blocked click can
       teach: open the accordion, scroll the tick in, one-shot flash, message. */
    const ackEls  = Array.prototype.slice.call(form.querySelectorAll('[data-ack]'));
    const submitBtn = form.querySelector('[data-submit]');
    const how     = form.querySelector('.booking-form__how');
    const gateMsg = form.querySelector('[data-gate]');
    function allAcked(){ return ackEls.every(function(a){ return a.checked; }); }
    function syncGate(){
      if (!submitBtn) return;
      const ok = allAcked();
      submitBtn.setAttribute('aria-disabled', ok ? 'false' : 'true');
      if (ok && gateMsg) gateMsg.hidden = true;
    }
    ackEls.forEach(function(a){ a.addEventListener('change', syncGate); });
    syncGate();

    function teachGate(){
      if (gateMsg) gateMsg.hidden = false;             // show message
      // first unticked acknowledgement
      const firstMissing = ackEls.filter(function(a){ return !a.checked; })[0];
      const inHow = firstMissing && how && how.contains(firstMissing);
      if (inHow && !how.open) how.open = true;          // expand only if the missing tick is inside
      if (inHow && how) {                               // one-shot flash on the accordion
        how.classList.remove('is-flash');
        void how.offsetWidth;                           // reflow to restart anim
        how.classList.add('is-flash');
        how.addEventListener('animationend', function handler(){
          how.classList.remove('is-flash');
          how.removeEventListener('animationend', handler);
        });
      }
      const target = firstMissing ? firstMissing.closest('[data-ack-row]') : null;
      if (target && target.scrollIntoView) {
        target.scrollIntoView({ block: 'center', behavior: 'smooth' });
      }
    }

    const sheetHead = modal ? modal.querySelector('.booking-modal__head') : null;
    const confirmPanel = form.parentNode.querySelector('[data-confirm]');
    const confirmDone  = confirmPanel ? confirmPanel.querySelector('[data-confirm-done]') : null;

    function resetFormState(){
      form.reset();
      form.querySelectorAll('[data-multi]').forEach(function(w){
        const rows = w.querySelectorAll('.booking-form__multi-row');
        for (let i = rows.length - 1; i >= 1; i--) rows[i].remove();
      });
      syncGate();
    }
    function showForm(){
      if (confirmPanel) { confirmPanel.hidden = true; confirmPanel.removeAttribute('data-shown'); }
      form.hidden = false;
      if (sheetHead) sheetHead.hidden = false;
    }
    function showConfirm(){
      form.hidden = true;
      if (sheetHead) sheetHead.hidden = true;
      if (confirmPanel) {
        confirmPanel.hidden = false;
        void confirmPanel.offsetWidth;          // reflow so the one-shot draw runs
        confirmPanel.setAttribute('data-shown', '');
      }
    }
    if (confirmDone) {
      confirmDone.addEventListener('click', function(){
        closeModal();
        setTimeout(showForm, 450);   // restore form after close transition, ready for next open
      });
    }
    // If user dismisses via X / backdrop / Esc while on the confirmation, restore too.
    if (modal) {
      modal.addEventListener('click', function(e){
        if (e.target.closest('[data-close-booking]') && confirmPanel && !confirmPanel.hidden) {
          setTimeout(showForm, 450);
        }
      });
    }

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      if (!allAcked()) { teachGate(); return; }
      // TODO: backend POST handler · for now just log; UI-only confirmation
      const data = Object.fromEntries(new FormData(form).entries());
      console.log('[Booking] Brief submitted:', data);
      resetFormState();
      showConfirm();
    });
  }
})();

</script>



<!-- ═══════════════════════════════════════════════════════════
     FOOTER-001 · synced from homepage_148.html (canonical source)
     Self-contained: styles, markup, behavior, and JSON-LD all here.
     Sidenav clearance (body padding-bottom:64px) preserved
     separately in SIDENAV CSS region — see top of file.
     ═══════════════════════════════════════════════════════════ -->
<!-- ═══════════════════════════════════════════════════════════
     FOOTER-001 · canonical · v-final (Svantra strip + whisper trust cards)
     Self-contained: styles, markup, behavior all here.
     ═══════════════════════════════════════════════════════════ -->
@endverbatim
