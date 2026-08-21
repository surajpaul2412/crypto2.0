@verbatim
<main id="main" tabindex="-1" class="libinner">

  <!-- ────────────────────────────────────────────
       SIDE INDEX — sticky left column
       ──────────────────────────────────────────── -->
  <!-- ────────────────────────────────────────────
       SIDENAV-001 — Unified Side Nav
       Active section: kontakt-libraries (LIBINNER default)
       ──────────────────────────────────────────── -->




  <!-- ────────────────────────────────────────────
       MAIN COLUMN
       ──────────────────────────────────────────── -->
  <div class="main-col">
    <section class="section stories-hero" id="stories-hero">
      <div class="section__head">
        <span class="eyebrow" data-reveal-hero data-reveal-delay="0">Few Words From The Pros</span>
        <h1 class="section__title" data-reveal-hero data-reveal-delay="80">Success <em>Stories.</em></h1>
        <em class="stories-hero__eyebrow--italic" data-reveal-hero data-reveal-delay="160">Endorsed across Hollywood, Bollywood &amp; beyond — since&nbsp;2010.</em>
        <p class="section__sub stories-hero__sub" data-reveal-hero data-reveal-delay="240">
          Oscar, BAFTA and Grammy-winning composers reach for our instruments on real productions. These are their words — not ours.
        </p>
      </div>
    </section>

    <section class="section stories" id="stories" aria-label="Composer testimonials">
      <div class="stories-grid" id="stories-grid">
@endverbatim
@foreach ($stories as $story)
        <button class="story-card" data-story="{{ $story->id }}" data-reveal data-reveal-group="stories" type="button" aria-label="Read {{ $story->name }}'s story">
          <img class="story-card__img" src="{{ $story->imageUrl() ?? '' }}" alt="{{ $story->name }}" loading="lazy" onerror="this.closest('.story-card').classList.add('is-mono')">
          <span class="story-card__mono" aria-hidden="true">{{ $story->monogram() }}</span>
          <span class="story-card__sheen" aria-hidden="true"></span>
          @if ($story->hasVideo())
          <span class="story-card__flag" aria-hidden="true"><svg viewBox="0 0 24 24"><polygon points="6 3 20 12 6 21 6 3"/></svg>Video</span>
          @endif
          <div class="story-card__caption"><span class="story-card__role">{{ $story->role }}</span><span class="story-card__name">{{ $story->name }}</span><span class="story-card__quote">{{ $story->cardQuote() }}</span><div class="story-card__credits">@foreach ($story->credits ?? [] as $credit)<span class="story-card__credit">{{ $credit }}</span>@endforeach @if (!empty($story->credits))<span class="story-card__credit story-card__credit--more">+more</span>@endif</div></div>
        </button>
@endforeach
@verbatim
      </div>
    </section>


  </div><!-- /.main-col -->
</main>

<div class="story-modal" id="story-modal" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="story-modal-name">
  <div class="story-modal__backdrop" data-story-close></div>
  <div class="story-modal__panel" role="document">
    <div class="story-modal__portrait" id="story-modal-portrait">
      <img id="story-modal-img" alt="">
      <span class="story-modal__portrait-mono" id="story-modal-mono" aria-hidden="true"></span>
    </div>
    <div class="story-modal__content">
      <button class="story-modal__close" data-story-close type="button" aria-label="Close">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><line x1="6" y1="6" x2="18" y2="18"/><line x1="6" y1="18" x2="18" y2="6"/></svg>
      </button>
      <p class="story-modal__role" id="story-modal-role"></p>
      <h2 class="story-modal__name" id="story-modal-name"></h2>
      <blockquote class="story-modal__quote" id="story-modal-quote"></blockquote>
      <div class="story-modal__video" id="story-modal-video"></div>
      <div class="story-modal__credits" id="story-modal-credits"></div>
      <p class="story-modal__note" id="story-modal-note" style="display:none"></p>
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
/* sidenav pull-tab removed on this page */
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

  /* ════════════════════════════════════════════════════════════════
     PLAYER · SoundCloud/Spotify-style inline preview player
     ────────────────────────────────────────────────────────────────
     • One <audio> element per row, lazily created from data-src
     • Resume from last position when toggled (audio.currentTime persists)
     • Live waveform fill driven by timeupdate events
     • Click anywhere on waveform → seek to that point
     • Live elapsed-time counter (mm:ss / mm:ss)
     • Only one row plays at a time (auto-pause others)
     • Continuous play: when track ends, jump to next (toggleable)
     • Keyboard: Space = play/pause, ←/→ = seek ±5s
     • Loading + error states with visual feedback
     • FAKE-MODE FALLBACK: if data-src is empty (audio not yet wired by
       dev), the row falls back to a 5s timer that fills the waveform
       visually. The page works as a demo before real audio lands.

     DEVELOPER INTEGRATION:
     1. On each <article class="player__row" data-track="..." data-src="">,
        fill data-src with the actual audio URL. Done.
     2. Optional: change preload strategy below if bandwidth matters.
     ════════════════════════════════════════════════════════════════ */

  const playerRows = Array.from(document.querySelectorAll('.player__row'));
  const autoplayToggle = document.getElementById('player-autoplay-toggle');
  const FAKE_DURATION_MS = 5000; // fallback timer when no real src
  const SEEK_STEP = 5;            // keyboard arrow seek seconds

  // Per-row state Map
  const rowState = new Map(); // row -> { audio, fakeTimer, fakeStart, fakePaused, hasRealSrc, durationCached }
  let currentRow = null;
  let autoplayEnabled = autoplayToggle ? autoplayToggle.checked : true;
  if (autoplayToggle) {
    autoplayToggle.addEventListener('change', () => {
      autoplayEnabled = autoplayToggle.checked;
    });
  }

  function fmtTime(seconds) {
    if (!isFinite(seconds) || seconds < 0) seconds = 0;
    const m = Math.floor(seconds / 60);
    const s = Math.floor(seconds % 60);
    return m + ' : ' + (s < 10 ? '0' + s : s);
  }

  function getOrCreateAudio(row) {
    let state = rowState.get(row);
    if (state) return state;

    const src = (row.dataset.src || '').trim();
    const hasRealSrc = src.length > 0;
    let audio = null;

    if (hasRealSrc) {
      audio = new Audio();
      audio.preload = 'metadata'; // dev: change to 'none' for stricter mobile budget
      audio.src = src;

      audio.addEventListener('loadedmetadata', () => {
        const dur = audio.duration;
        // Update display duration with real value
        const durEl = row.querySelector('.player__duration');
        const timeEl = row.querySelector('.player__time');
        if (durEl) durEl.textContent = fmtTime(dur);
        if (timeEl) {
          const elapsedSpan = timeEl.querySelector('.player__elapsed');
          if (elapsedSpan) {
            // Rebuild "0 : 00 / m : ss"
            timeEl.innerHTML = '<span class="player__elapsed">0 : 00</span> / ' + fmtTime(dur);
          }
        }
      });

      audio.addEventListener('timeupdate', () => {
        if (currentRow !== row) return;
        const dur = audio.duration || 0;
        const pct = dur > 0 ? (audio.currentTime / dur) * 100 : 0;
        setWaveProgress(row, pct);
        const elapsedEl = row.querySelector('.player__elapsed');
        if (elapsedEl) elapsedEl.textContent = fmtTime(audio.currentTime);
      });

      audio.addEventListener('ended', () => {
        // Stop UI on this row
        row.classList.remove('playing');
        setWaveProgress(row, 0);
        const elapsedEl = row.querySelector('.player__elapsed');
        if (elapsedEl) elapsedEl.textContent = '0 : 00';
        audio.currentTime = 0; // reset for next replay
        if (autoplayEnabled) {
          const idx = playerRows.indexOf(row);
          const next = playerRows[(idx + 1) % playerRows.length];
          if (next) playRow(next);
        } else {
          currentRow = null;
        }
      });

      audio.addEventListener('waiting', () => row.classList.add('is-loading'));
      audio.addEventListener('canplay',  () => row.classList.remove('is-loading'));
      audio.addEventListener('playing',  () => row.classList.remove('is-loading'));

      audio.addEventListener('error', () => {
        row.classList.add('is-error');
        row.classList.remove('is-loading');
        row.classList.remove('playing');
        if (currentRow === row) currentRow = null;
        console.warn('[player] audio failed to load:', src);
      });
    }

    state = {
      audio: audio,
      hasRealSrc: hasRealSrc,
      fakeTimer: null,
      fakeStart: 0,      // ms timestamp when fake playback (re)started
      fakeElapsed: 0,    // ms elapsed before last pause
      fakeRaf: null      // requestAnimationFrame id for fake progress
    };
    rowState.set(row, state);
    return state;
  }

  function setWaveProgress(row, pct) {
    const waveAfter = row.querySelector('.player__wave');
    if (!waveAfter) return;
    // Drive the ::after pseudo via inline CSS variable on the wave element
    waveAfter.style.setProperty('--player-progress', pct + '%');
  }

  function pauseRow(row) {
    if (!row) return;
    const state = rowState.get(row);
    if (!state) return;
    row.classList.remove('playing');
    if (state.hasRealSrc && state.audio) {
      state.audio.pause();
    } else {
      // FAKE MODE: freeze progress at current point
      if (state.fakeTimer) { clearTimeout(state.fakeTimer); state.fakeTimer = null; }
      if (state.fakeRaf) { cancelAnimationFrame(state.fakeRaf); state.fakeRaf = null; }
      // Record elapsed at pause moment for resume
      if (state.fakeStart > 0) {
        state.fakeElapsed += (performance.now() - state.fakeStart);
        state.fakeStart = 0;
      }
    }
  }

  function playRow(row) {
    if (!row) return;
    const state = getOrCreateAudio(row);

    // Toggle: clicking the currently-playing row pauses it
    if (currentRow === row) {
      const isPlaying = state.hasRealSrc
        ? state.audio && !state.audio.paused
        : (state.fakeStart > 0);
      if (isPlaying) {
        pauseRow(row);
        return;
      }
      // Was paused → fall through to resume
    } else {
      // Switching rows: pause the previous (preserves its position)
      if (currentRow) pauseRow(currentRow);
    }

    currentRow = row;
    row.classList.add('playing');
    row.classList.remove('is-error');
    row.classList.remove('is-blocked'); // user tapped → clear autoplay-block hint

    if (state.hasRealSrc && state.audio) {
      // REAL MODE · resume from audio.currentTime (which persists)
      const playPromise = state.audio.play();
      if (playPromise && typeof playPromise.catch === 'function') {
        playPromise.catch(err => {
          // Autoplay was blocked (common on mobile after track 1 of a chain)
          // OR the audio source failed. Distinguish via err.name.
          row.classList.remove('playing');
          if (currentRow === row) currentRow = null;
          if (err && err.name === 'NotAllowedError') {
            // Browser autoplay policy. Show user-facing hint so they can tap.
            row.classList.add('is-blocked');
            console.info('[player] autoplay blocked — user tap required');
          } else {
            console.warn('[player] play() failed:', err && err.message);
          }
        });
      }
    } else {
      // FAKE MODE · setTimeout-driven progress, resumes from fakeElapsed
      const remaining = FAKE_DURATION_MS - state.fakeElapsed;
      state.fakeStart = performance.now();

      // Update wave fill via rAF for smooth progress
      const tick = () => {
        if (currentRow !== row || state.fakeStart === 0) return;
        const totalElapsed = state.fakeElapsed + (performance.now() - state.fakeStart);
        const pct = Math.min(100, (totalElapsed / FAKE_DURATION_MS) * 100);
        setWaveProgress(row, pct);
        const elapsedEl = row.querySelector('.player__elapsed');
        if (elapsedEl) elapsedEl.textContent = fmtTime(totalElapsed / 1000);
        if (pct < 100) state.fakeRaf = requestAnimationFrame(tick);
      };
      state.fakeRaf = requestAnimationFrame(tick);

      // End of fake track
      state.fakeTimer = setTimeout(() => {
        if (currentRow !== row) return;
        row.classList.remove('playing');
        setWaveProgress(row, 0);
        const elapsedEl = row.querySelector('.player__elapsed');
        if (elapsedEl) elapsedEl.textContent = '0 : 00';
        state.fakeElapsed = 0;
        state.fakeStart = 0;
        if (autoplayEnabled) {
          const idx = playerRows.indexOf(row);
          const next = playerRows[(idx + 1) % playerRows.length];
          if (next) playRow(next);
        } else {
          currentRow = null;
        }
      }, remaining);
    }
  }

  function seekRow(row, pct) {
    const state = getOrCreateAudio(row);
    pct = Math.max(0, Math.min(100, pct));

    if (state.hasRealSrc && state.audio) {
      const dur = state.audio.duration;
      if (isFinite(dur) && dur > 0) {
        state.audio.currentTime = (pct / 100) * dur;
        setWaveProgress(row, pct);
      }
    } else {
      // FAKE MODE: rewrite fakeElapsed to the chosen position
      const wasPlaying = (currentRow === row && state.fakeStart > 0);
      if (wasPlaying) pauseRow(row);
      state.fakeElapsed = (pct / 100) * FAKE_DURATION_MS;
      setWaveProgress(row, pct);
      const elapsedEl = row.querySelector('.player__elapsed');
      if (elapsedEl) elapsedEl.textContent = fmtTime(state.fakeElapsed / 1000);
      if (wasPlaying) playRow(row);
    }
  }

  // Wire each row
  playerRows.forEach(row => {
    const playBtn = row.querySelector('.player__play');
    const wave = row.querySelector('.player__wave');

    if (playBtn) {
      playBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        playRow(row);
      });
    }

    if (wave) {
      // Unified pointer events: works for mouse, touch, and stylus.
      // Tap = seek to that point. Hold + drag = scrub live (drag-to-scrub).
      // touch-action: none on .player__wave (in CSS) prevents the
      // browser from stealing horizontal drags as page scroll.
      let isScrubbing = false;
      let wasPlayingBeforeScrub = false;

      const seekFromPointer = (e) => {
        const rect = wave.getBoundingClientRect();
        const pct = ((e.clientX - rect.left) / rect.width) * 100;
        seekRow(row, pct);
      };

      wave.addEventListener('pointerdown', (e) => {
        e.preventDefault();

        // Standard-player behaviour:
        //  • Click the ACTIVE track's waveform → seek/scrub within it.
        //  • Click an INACTIVE track's waveform → stop the current track and
        //    start THIS one from 0 (do NOT seek to the click point). The
        //    waveform only becomes seekable once the track is the active one.
        const isActiveRow = (currentRow === row);

        if (!isActiveRow) {
          if (currentRow) stopResetRow(currentRow);
          currentRow = row;
          playRow(row);            // starts from 0
          return;                  // no scrub, no seek-to-click
        }

        // ── Active row: existing seek/scrub path ──
        isScrubbing = true;
        wave.setPointerCapture(e.pointerId);

        // Track whether audio was playing so we can resume after drag-release
        const state = rowState.get(row);
        wasPlayingBeforeScrub = state && (
          (state.hasRealSrc && state.audio && !state.audio.paused) ||
          (!state.hasRealSrc && state.fakeStart > 0)
        );

        row.classList.add('playing'); // visual hint during scrub
        seekFromPointer(e);
      });

      wave.addEventListener('pointermove', (e) => {
        if (!isScrubbing) return;
        seekFromPointer(e);
      });

      const endScrub = (e) => {
        if (!isScrubbing) return;
        isScrubbing = false;
        try { wave.releasePointerCapture(e.pointerId); } catch (_) {}
        // If this was a fresh tap on a paused/different row, start playback
        // from the new position. If it was a drag during playback, resume.
        if (!wasPlayingBeforeScrub) {
          playRow(row);
        } else {
          // Was playing → ensure it's still playing (real audio may have
          // paused implicitly while we set currentTime mid-buffer)
          const state = rowState.get(row);
          if (state && state.hasRealSrc && state.audio && state.audio.paused) {
            const p = state.audio.play();
            if (p && p.catch) p.catch(() => {});
          }
        }
      };
      wave.addEventListener('pointerup', endScrub);
      wave.addEventListener('pointercancel', endScrub);
    }

    // Keyboard nav · row must be focusable
    row.setAttribute('tabindex', '0');
    row.addEventListener('keydown', (e) => {
      if (e.target.closest('button')) return; // let button handle its own keys
      if (e.key === ' ' || e.key === 'Enter') {
        e.preventDefault();
        playRow(row);
      } else if (e.key === 'ArrowRight') {
        e.preventDefault();
        const state = getOrCreateAudio(row);
        if (state.hasRealSrc && state.audio && isFinite(state.audio.duration)) {
          const newTime = Math.min(state.audio.duration, state.audio.currentTime + SEEK_STEP);
          state.audio.currentTime = newTime;
        } else {
          state.fakeElapsed = Math.min(FAKE_DURATION_MS, state.fakeElapsed + SEEK_STEP * 1000);
          setWaveProgress(row, (state.fakeElapsed / FAKE_DURATION_MS) * 100);
        }
      } else if (e.key === 'ArrowLeft') {
        e.preventDefault();
        const state = getOrCreateAudio(row);
        if (state.hasRealSrc && state.audio) {
          state.audio.currentTime = Math.max(0, state.audio.currentTime - SEEK_STEP);
        } else {
          state.fakeElapsed = Math.max(0, state.fakeElapsed - SEEK_STEP * 1000);
          setWaveProgress(row, (state.fakeElapsed / FAKE_DURATION_MS) * 100);
        }
      }
    });
  });

  // Clean up audio when leaving the page
  window.addEventListener('beforeunload', () => {
    rowState.forEach(state => {
      if (state.audio) { state.audio.pause(); state.audio.src = ''; }
      if (state.fakeTimer) clearTimeout(state.fakeTimer);
      if (state.fakeRaf) cancelAnimationFrame(state.fakeRaf);
    });
  });

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
  /* PAGE-04: rogue inline [data-reveal] IO removed — polish.js owns reveals (.is-revealed). */


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
