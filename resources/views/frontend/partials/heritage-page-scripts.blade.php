@verbatim

<!-- ═══════════════════════════════════════════════════════════════
     HERITAGE LIGHTBOX · Premium fullscreen YouTube player · Netflix-style
     Black canvas + max 16:9 video + minimal top chrome bar.
     Fade in/out 400ms; click backdrop / × / ESC to close.
     ═══════════════════════════════════════════════════════════════ -->
<div class="heritage-lightbox" id="heritage-lightbox" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="heritage-lightbox-title">
  <div class="heritage-lightbox__inner">
    <iframe class="heritage-lightbox__iframe" id="heritage-lightbox-iframe" src="about:blank" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <button class="heritage-lightbox__close" id="heritage-lightbox-close" type="button" aria-label="Close video">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="6" y1="6" x2="18" y2="18"/><line x1="6" y1="18" x2="18" y2="6"/></svg>
    </button>
    <h2 class="heritage-lightbox__title" id="heritage-lightbox-title"></h2>
  </div>
</div>

<!-- Heritage page behavior · filter chips + lightbox -->
<script>
(function () {
  'use strict';

  // ─── Lightbox open / close · YouTube embed with autoplay
  // ─── Preserves scroll position via body.top trick (prevents page jump on close)
  var lightbox = document.getElementById('heritage-lightbox');
  var lightboxIframe = document.getElementById('heritage-lightbox-iframe');
  var lightboxTitle = document.getElementById('heritage-lightbox-title');
  var lightboxInner = lightbox && lightbox.querySelector('.heritage-lightbox__inner');
  var lightboxClose = document.getElementById('heritage-lightbox-close');
  var scrollLockY = 0;
  var loaded = false;   // iframe has loaded a video at least once (audio session warm)
  var currentId = null;

  // ─── Auto-close on video END, WITHOUT constructing a YT.Player on the live
  // iframe (that reloads the frame and breaks autoplay, esp. on archive cards).
  // Instead we passively listen to the postMessage events the embed emits when
  // enablejsapi=1 is set, and (a) send a 'listening' handshake so YouTube starts
  // posting state, (b) watch for onStateChange data === 0 (ENDED) → close.
  function ytPostListening() {
    try {
      if (lightboxIframe && lightboxIframe.contentWindow) {
        lightboxIframe.contentWindow.postMessage(
          JSON.stringify({ event: 'listening', id: 'heritage-lightbox-iframe', channel: 'widget' }),
          'https://www.youtube.com'
        );
      }
    } catch (e) {}
  }
  // postMessage command protocol — drives the live embed WITHOUT reloading it (no
  // YT.Player construction → no autoplay breakage). Keeps the audio session warm.
  function ytCmd(func, args) {
    try {
      if (lightboxIframe && lightboxIframe.contentWindow) {
        lightboxIframe.contentWindow.postMessage(
          JSON.stringify({ event: 'command', func: func, args: args || [] }),
          'https://www.youtube.com'
        );
      }
    } catch (e) {}
  }
  function attachEndWatcher() {
    // Handshake a few times as the iframe finishes loading so YouTube registers us.
    var tries = 0;
    var iv = setInterval(function () {
      ytPostListening();
      if (++tries >= 8) clearInterval(iv);
    }, 350);
    // Also handshake on iframe load.
    lightboxIframe.addEventListener('load', ytPostListening, { once: true });
  }
  // Single global message listener: parse YouTube's state events; ENDED (0) closes.
  window.addEventListener('message', function (e) {
    if (typeof e.origin === 'string' && e.origin.indexOf('youtube.com') === -1) return;
    if (!lightbox.classList.contains('is-active')) return;
    var data = e.data;
    try { if (typeof data === 'string') data = JSON.parse(data); } catch (err) { return; }
    if (!data) return;
    // YouTube posts {event:'onStateChange', info: <number>} (or info.playerState)
    var state;
    if (data.event === 'onStateChange') {
      state = (typeof data.info === 'number') ? data.info
            : (data.info && typeof data.info.playerState === 'number' ? data.info.playerState : undefined);
    } else if (data.event === 'infoDelivery' && data.info && typeof data.info.playerState === 'number') {
      state = data.info.playerState;
    }
    if (state === 0) { // ENDED → reset to start (dismisses end-screen grid) + close
      ytCmd('seekTo', [0, true]);
      ytCmd('pauseVideo');
      closeLightbox();
    }
  });

  function openLightbox(ytId, title) {
    if (!ytId) return;
    // Capture current scroll position before locking
    scrollLockY = window.scrollY || window.pageYOffset || 0;
    lightboxTitle.textContent = title || '';
    lightbox.classList.add('is-active');
    lightbox.setAttribute('aria-hidden', 'false');
    // Lock body scroll without losing position
    document.body.style.top = '-' + scrollLockY + 'px';
    document.body.style.position = 'fixed';
    document.body.style.width = '100%';
    document.body.classList.add('heritage-lightbox-open');
    // Freeze background scroll while the modal is open (Lenis owns scroll; pausing it
    // keeps the fixed-body scroll-lock from desyncing on close).
    if (window.__lenis && window.__lenis.stop) window.__lenis.stop();
    // Start playback immediately. Keep-alive (below) is the real glitch fix — proven
    // sufficient on pages 03/05 with no deferral — so the old idle/timeout staging
    // that delayed open by ~0.6s has been removed.
    if (!loaded) {
      // FIRST EVER play: one cold session start (already glitch-free per testing).
      lightboxIframe.src = 'https://www.youtube.com/embed/' + ytId +
        '?autoplay=1&rel=0&modestbranding=1&iv_load_policy=3&cc_load_policy=0' +
        '&playsinline=1&fs=0&disablekb=0&enablejsapi=1&color=white';
      loaded = true; currentId = ytId;
      attachEndWatcher();
    } else if (ytId === currentId) {
      ytCmd('playVideo');               // same video, warm session → resume, no glitch
    } else {
      ytCmd('loadVideoById', [ytId]);   // different video → load into the SAME warm player
      currentId = ytId;
    }
  }

  function closeLightbox() {
    lightbox.classList.remove('is-active');
    lightbox.setAttribute('aria-hidden', 'true');
    // Restore body scroll position
    document.body.style.position = '';
    document.body.style.top = '';
    document.body.style.width = '';
    document.body.classList.remove('heritage-lightbox-open');
    window.scrollTo(0, scrollLockY);
    if (window.__lenis && window.__lenis.start) window.__lenis.start();
    // KEEP-ALIVE: do NOT destroy the iframe. Tearing it down killed YouTube's audio
    // session, so every reopen cold-started it → the mobile replay glitch. Instead we
    // pause the live player; the lightbox is fully hidden (opacity/visibility/pointer-
    // events) so nothing shows behind it, and the warm session gives clean replays.
    if (loaded) ytCmd('pauseVideo');
  }

  // Close on backdrop click — but only when target IS the backdrop (not children)
  lightbox.addEventListener('click', function (e) {
    if (e.target === lightbox || e.target === lightbox.querySelector('.heritage-lightbox__inner')) {
      closeLightbox();
    }
  });

  // Close button — stopPropagation so click doesn't bubble to backdrop or anywhere else
  lightboxClose.addEventListener('click', function (e) {
    e.stopPropagation();
    closeLightbox();
  });

  // ESC key
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && lightbox.classList.contains('is-active')) closeLightbox();
  });

  // Wire all heritage cards (cinehero + feature + highlight + archive) to lightbox
  function wireCard(card) {
    var ytId = card.getAttribute('data-yt-id');
    var ytTitle = card.getAttribute('data-yt-title') || '';
    if (!ytId) return;
    card.setAttribute('role', 'button');
    card.setAttribute('tabindex', '0');
    card.addEventListener('click', function (e) {
      // Allow secondary-btn (Browse archive link) to navigate without lightbox
      var anchor = e.target.closest('a.heritage-cinehero__secondary-btn');
      if (anchor) return;
      openLightbox(ytId, ytTitle);
    });
    card.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') {
        // Only trigger if focus is on the card itself, not an inner control
        if (e.target === card) {
          e.preventDefault();
          openLightbox(ytId, ytTitle);
        }
      }
    });
  }
  document.querySelectorAll('.heritage-cinehero__card, .heritage-feature-card, .heritage-card').forEach(wireCard);

  // ─── Filter chips ───
  var chips = document.querySelectorAll('.heritage-chip');
  var archiveCards = document.querySelectorAll('#archive-grid .heritage-card');
  chips.forEach(function (chip) {
    chip.addEventListener('click', function () {
      var filter = chip.getAttribute('data-filter');
      chips.forEach(function (c) {
        c.classList.toggle('is-active', c === chip);
        c.setAttribute('aria-selected', c === chip ? 'true' : 'false');
      });
      archiveCards.forEach(function (card) {
        var inst = card.getAttribute('data-instrument');
        var show = filter === 'all' || inst === filter;
        card.classList.toggle('is-hidden', !show);
      });
    });
  });
})();
</script>

<!-- ═══════════════════════════════════════════════════════════════
     LICENSE TERMS MODAL — opens from buy-bar "License terms" button
     ═══════════════════════════════════════════════════════════════ -->
<div class="modal" id="license-modal" role="dialog" aria-modal="true" aria-labelledby="license-modal-title" aria-hidden="true">
  <div class="modal__backdrop" data-modal-close></div>
  <div class="modal__panel" role="document">
    <button class="modal__close" data-modal-close aria-label="Close license terms">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="6" y1="6" x2="18" y2="18"/><line x1="6" y1="18" x2="18" y2="6"/></svg>
    </button>

    <div class="modal__head">
      <span class="eyebrow">License Terms</span>
      <h2 class="modal__title" id="license-modal-title">One license. Clear use rights.</h2>
      <p class="modal__sub">What you can and can't do with Voices of Ancient India once you own it.</p>
    </div>

    <div class="modal__body">

      <div class="modal__row modal__row--allow">
        <div class="modal__row-label">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          You can
        </div>
        <ul class="modal__row-list">
          <li>Use in unlimited commercial projects — film, OTT, broadcast, advertising, sync, games</li>
          <li>Use across multiple clients and productions, royalty-free, in perpetuity</li>
          <li>Install on up to 2 active machines (Native Access authorization)</li>
          <li>Reinstall on replacement hardware as needed</li>
          <li>Use in productions with team members under your contract</li>
        </ul>
      </div>

      <div class="modal__row modal__row--deny">
        <div class="modal__row-label">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="6" y1="6" x2="18" y2="18"/><line x1="6" y1="18" x2="18" y2="6"/></svg>
          You can't
        </div>
        <ul class="modal__row-list">
          <li>Resell, redistribute, or share the library files with anyone</li>
          <li>Use the samples to train AI/ML models — declared AI-training-free at performance contract level</li>
          <li>Repackage the samples into another sample library or competing product</li>
          <li>Sell or distribute isolated, unprocessed samples (loops/one-shots) as standalone content</li>
          <li>Transfer the license to another person without contacting Crypto Cipher</li>
        </ul>
      </div>

      <div class="modal__foot">
        <p>For full legal text, see <a href="/license/full" class="modal__link">our complete EULA</a>. For sync clearance documentation, see <a href="/license/sync" class="modal__link">sync clearance terms</a>. Custom enterprise licensing available — <a href="/contact" class="modal__link">contact us</a>.</p>
      </div>

    </div>
  </div>
</div>



<!-- ═══════════════════════════════════════════════════════════════
     SIDENAV-001 mobile clearance · relocated from old FOOTER block
     The fixed 64px sidenav pull-tab on mobile needs body padding-bottom
     so it does not overlap page content. This rule belongs to the
     sidenav layout, not the footer — relocated during FOOTER-001 sync
     from homepage_148.html.
     ═══════════════════════════════════════════════════════════════ -->
<style>
@media (max-width: 768px) {
  body { padding-bottom: 64px; }
}
</style>

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

  /* ════════════════════════════
     SHORTLIST — buy bar button (in-memory · Phase 1)
     ════════════════════════════ */
  const shortlistBtn   = document.getElementById('shortlist-btn');
  const shortlistLabel = document.getElementById('shortlist-label');
  let shortlisted = false;
  if (shortlistBtn) {
    shortlistBtn.addEventListener('click', () => {
      shortlisted = !shortlisted;
      shortlistBtn.classList.toggle('active', shortlisted);
      shortlistBtn.setAttribute('aria-pressed', shortlisted);
      if (shortlistLabel) shortlistLabel.textContent = shortlisted ? 'Saved' : 'Save for later';
    });
  }

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
  };
  const closeLicense = () => {
    if (!licenseModal) return;
    licenseModal.classList.remove('is-open');
    licenseModal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
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
  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const target = tab.dataset.video;
      tabs.forEach(t => {
        t.classList.toggle('active', t === tab);
        t.setAttribute('aria-selected', t === tab);
      });
      panels.forEach(p => p.classList.toggle('active', p.dataset.panel === target));
    });
  });

  /* ════════════════════════════
     AUDIO PREVIEW — single source of truth
     Stops other previews when one starts (Phase 1: visual only)
     ════════════════════════════ */
  let activePreview = null;
  function stopActive() {
    if (!activePreview) return;
    activePreview.classList.remove('playing');
    activePreview = null;
  }

  // SoundCloud-style player rows
  document.querySelectorAll('.player__row').forEach(row => {
    const playBtn = row.querySelector('.player__play');
    const wave = row.querySelector('.player__wave');
    const togglePlay = (e) => {
      e.preventDefault();
      if (activePreview === row) { stopActive(); return; }
      stopActive();
      row.classList.add('playing');
      activePreview = row;
      // Auto-stop after demo duration (placeholder — real audio replaces this)
      setTimeout(() => { if (activePreview === row) stopActive(); }, 8000);
    };
    if (playBtn) playBtn.addEventListener('click', togglePlay);
    if (wave) wave.addEventListener('click', togglePlay);
  });

  // Patch previews
  document.querySelectorAll('[data-patch-preview]').forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();
      if (activePreview === btn) { stopActive(); return; }
      stopActive();
      btn.classList.add('playing');
      activePreview = btn;
      setTimeout(() => { if (activePreview === btn) stopActive(); }, 5000);
    });
  });

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

  if (prefersReduced) {
    /* E2 · reveal engine handed to polish.js · was racing two systems.
       polish.js handles prefers-reduced-motion globally; no work needed here. */
  } else {
    /* E2 · reveal engine handed to polish.js (single .is-revealed system).
       The hero-choreography exception was dead code (selectors target
       .lib-hero* but markup uses .heritage-cinehero*); no preservation needed. */
  }

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
     Generic [data-reveal] IO observer · REMOVED in E2.
     polish.js §3 owns the single-system reveal pipeline via .is-revealed.
     ════════════════════════════ */

  /* Footer reveal safety net. The footer is taller than the viewport, so
     polish.js's threshold:0.18 reveal can fail to trigger before the page
     bottom is reached (esp. with Lenis easing) — leaving the footer stuck
     at opacity:0. This footer-only observer fires at the first sliver
     (threshold 0.01) and is idempotent with polish.js's .is-revealed. */
  (function () {
    // Lenis-prevent is correct for the mobile horizontal sliders (highlights grid
    // + filter row need native horizontal wheel/touch), but WRONG on desktop where
    // they are static grids — leaving it on made Lenis ignore the wheel over those
    // areas, stalling fast vertical scroll when the pointer was over a card.
    // Toggle the attribute by viewport so Lenis owns the wheel on desktop.
    var sliders = [document.querySelector('.heritage-highlights__grid'),
                   document.querySelector('.heritage-filters')].filter(Boolean);
    var mq = window.matchMedia('(max-width: 640px)');
    function syncLenisPrevent() {
      sliders.forEach(function (el) {
        if (mq.matches) el.setAttribute('data-lenis-prevent', '');
        else el.removeAttribute('data-lenis-prevent');
      });
    }
    syncLenisPrevent();
    if (mq.addEventListener) mq.addEventListener('change', syncLenisPrevent);
    else if (mq.addListener) mq.addListener(syncLenisPrevent);
  })();

  (function () {
    function initFooterReveal() {
      var ft = document.querySelector('footer.ft[data-reveal]');
      if (!ft) return;
      if (!('IntersectionObserver' in window)) { ft.classList.add('is-revealed'); return; }
      var fio = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) { ft.classList.add('is-revealed'); fio.unobserve(ft); }
        });
      }, { threshold: 0.01, rootMargin: '0px 0px 80px 0px' });
      fio.observe(ft);
    }
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initFooterReveal);
    } else {
      initFooterReveal();
    }
  })();


})();

</script>

<!-- Crypto Cipher · inline video play · YouTube iframe inside the video card -->
<script>
(function(){
  /* Click on any element with data-yt-id (or its descendants) → play YouTube
     iframe INSIDE that container. Close button restores the poster. */
  function buildEmbed(carrier, ytId) {
    const wrap = document.createElement('div');
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
        src="https://www.youtube.com/embed/${ytId}?autoplay=1&rel=0&modestbranding=1&playsinline=1"></iframe>
    `;
    carrier.appendChild(wrap);
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
    wrap.classList.remove('is-active');
    carrier.classList.remove('is-playing');
    setTimeout(() => wrap.remove(), 400);
  }

  document.addEventListener('click', (e) => {
    const closeBtn = e.target.closest('.video-embed__close');
    if (closeBtn) return;  // handled in its own listener

    // Heritage page uses its own dedicated lightbox — skip this handler for
    // any heritage video cards (cinehero, feature, highlight, archive).
    if (e.target.closest('.heritage-cinehero__card, .heritage-feature-card, .heritage-card')) return;

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
    // Skip heritage video cards — handled by dedicated lightbox
    if (e.target.closest('.heritage-cinehero__card, .heritage-feature-card, .heritage-card')) return;
    const carrier = e.target.closest('[data-yt-id]');
    if (!carrier || carrier.classList.contains('is-playing')) return;
    const ytId = carrier.getAttribute('data-yt-id');
    if (ytId) {
      e.preventDefault();
      buildEmbed(carrier, ytId);
    }
  });

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
