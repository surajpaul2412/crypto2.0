/* ═══════════════════════════════════════════════════════════════════════
   cc-demo-player.js · Crypto Cipher · single site-wide audio engine

   Two cooperating parts on the shared cc:media bus:
     1 · Audio controller — lazy <audio>, tap-to-play, seek / scrub.
     2 · cc-wave          — in-house <canvas> peaks renderer.

   DEPENDS ON polish.js (loaded first): it owns the one-source-at-a-time
   coordinator. This engine dispatches cc:media-start and obeys cc:media-stop.

   MARKUP CONTRACT (one track per row):
     <article class="player__row" data-track="…" data-src="…(wav|m4a)"
              data-peaks="…peaks.json" [data-duration="SECONDS"]>
       <button class="player__play"></button>
       <div    class="player__wave"></div>        needs a height in page CSS
       <span   class="player__elapsed"></span>    optional · live current time
       <span   class="player__duration"></span>   optional · auto-filled length
     </article>
     - data-duration is SECONDS only (numeric); anything else is ignored and
       the length is derived from the peaks file.
     - empty data-src  -> row gets .is-error (never fake-played).
     - data-peaks 404  -> waveform blank, audio still plays.

   BEHAVIOUR: every track STOPS when it ends. A player that should play through
   its list opts in with data-advance="on" on its .player container.

   AUDIO PHILOSOPHY: zero content processing. Preview streams the raw file; the
   only signal touch is a sub-perceptual de-click volume ramp on start / stop.
   No normalization, no Web Audio graph — dynamics as delivered.
   ═══════════════════════════════════════════════════════════════════════ */

/* ── 1 · component CSS · functional only (layout, height & colour stay in page design) ── */
(function () {
  'use strict';
  if (document.getElementById('cc-demo-player-css')) return;
  var s = document.createElement('style');
  s.id = 'cc-demo-player-css';
  s.textContent =
    '.player__wave{position:relative;overflow:hidden}' +
    '.player__wave canvas.cc-lw{position:absolute;inset:0;width:100%;height:100%;display:block}' +
    '.player__wave.cc-wave-ready > *:not(canvas.cc-lw){display:none !important}' +
    '.player__wave.cc-wave-ready::before,.player__wave.cc-wave-ready::after{display:none !important}';
  (document.head || document.documentElement).appendChild(s);
})();

/* ── 2 · AUDIO CONTROLLER · lifted verbatim from 03 (device-locked reference) ── */
(function () {
  'use strict';
  const playerRows = Array.from(document.querySelectorAll('.player__row'));
  const SEEK_STEP = 5;            // keyboard arrow seek seconds

  // Per-row state Map
  const rowState = new Map(); // row -> { audio, hasRealSrc }
  let currentRow = null;

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

    // Stage C contract: every rendered row MUST carry a real data-src. A row
    // without one is a backend bug — omit the row or render a disabled state.
    // We mark it errored rather than faking playback of audio that isn't there.
    if (!hasRealSrc) {
      row.classList.add('is-error');
      console.warn('[player] row has no data-src — not playable:', row.dataset.track || row);
    }

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
        /* Component rule: ONE behaviour everywhere — each track STOPS when it
           ends. Auto-advance is OPT-IN per player via data-advance="on", which
           advances to the next track within this .player (wrapping after the
           last). No flag = stop. Keeps every page + the backend consistent. */
        const videoActive = document.querySelector('.is-playing');
        if (videoActive) { currentRow = null; return; } // don't chain over a playing video
        const player = row.closest('.player');
        if (!player || player.getAttribute('data-advance') !== 'on') { currentRow = null; return; }
        const rows = Array.from(player.querySelectorAll('.player__row'));
        const idx = rows.indexOf(row);
        const next = rows[(idx + 1) % rows.length];
        if (next) playRow(next);
      });
      /* honest UI on EXTERNAL pause: the shared coordinator pauses this
         element directly when other media claims — sync row state */
      audio.addEventListener('pause', () => {
        /* UI only — never mutate currentRow here: clearing it broke the
           play->pause->resume cycle (3rd click re-claimed the coordinator
           as a fresh play and raced its own stop()). */
        row.classList.remove('playing');
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
      hasRealSrc: hasRealSrc
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
    if (state.audio) fadeOutAudio(state.audio); /* de-click helper — was a hard cut (audible click) */
  }

  /* De-click helpers (below). A hard cut at non-zero amplitude clicks; a short
     volume ramp removes it. Out-ramp ~6ms — only the stopping track, so it can
     never mask the next track's attack; in-ramp ~80ms on start / resume. Not a
     musical fade, just the join. */
  function fadeInAudio(audio) {
    /* de-click the START/RESUME side too: first frames at zero, ~80ms ramp.
       (Pause/switch already fade out; resuming at full volume mid-waveform
       was the remaining click.) */
    if (!audio) return;
    try {
      if (audio.__fadeIv) { clearInterval(audio.__fadeIv); audio.__fadeIv = null; }
      var target = 1, steps = 6, i = 0;
      audio.volume = 0;
      audio.__fadeIv = setInterval(function () {
        i++;
        var v = target * (i / steps);
        audio.volume = v > target ? target : v;
        if (i >= steps) { clearInterval(audio.__fadeIv); audio.__fadeIv = null; }
      }, 14);
    } catch (e) { try { audio.volume = 1; } catch (_) {} }
  }
  function fadeOutAudio(audio, done) {
    if (!audio || audio.paused) { if (done) done(); return; }
    if (audio.__fadeIv) { clearInterval(audio.__fadeIv); audio.__fadeIv = null; }
    var steps = 3, i = 0;            // 3 × 2ms ≈ 6ms — sub-perceptual de-click
    var startVol = audio.volume;
    audio.__fadeIv = setInterval(function () {
      i++;
      var v = startVol * (1 - i / steps);
      audio.volume = v < 0 ? 0 : v;
      if (i >= steps) {
        clearInterval(audio.__fadeIv);
        audio.__fadeIv = null;
        audio.pause();
        audio.volume = startVol; // restore for next play
        if (done) done();
      }
    }, 2);
  }

  function stopResetRow(row) {
    if (!row) return;
    const state = rowState.get(row);
    if (!state) return;
    row.classList.remove('playing');
    if (state.audio) {
      const a = state.audio;
      fadeOutAudio(a, function () { a.currentTime = 0; });
    }
    setWaveProgress(row, 0);
    const elapsedEl = row.querySelector('.player__elapsed');
    if (elapsedEl) elapsedEl.textContent = '0 : 00';
  }

  function playRow(row) {
    if (!row) return;
    const state = getOrCreateAudio(row);
    if (!state.audio) { row.classList.add('is-error'); return; } // no real src → not playable

    // One-media-at-a-time (shared coordinator in polish.js). Announce this
    // audio as the active media; the coordinator stops any other audio/video.
    document.dispatchEvent(new CustomEvent('cc:media-start', { detail: {
      source: row,
      /* the engine's Audio() is DETACHED from the DOM, so native 'play'
         events never reach document listeners — hand the element to
         listeners (cc-wave) explicitly, and give the coordinator a real
         stop() so other media can silence this row (contract-complete). */
      media: (state && state.audio) ? state.audio : null,
      stop: function () {
        /* coordinator stops fade too — a raw pause() here was the last
           remaining click source (video claiming the floor) */
        try { if (state && state.audio) fadeOutAudio(state.audio); } catch (e) {}
        row.classList.remove('playing');
      }
    } }));

    // Toggle: clicking the currently-playing row pauses it
    if (currentRow === row) {
      const isPlaying = state.audio && !state.audio.paused;
      if (isPlaying) {
        pauseRow(row);
        return;
      }
      // Was paused → fall through to resume
    } else {
      // Switching rows: fully reset the previous (SoundCloud-style — empties its
      // waveform + time so only the active demo shows progress).
      if (currentRow) stopResetRow(currentRow);
    }

    currentRow = row;
    row.classList.add('playing');
    row.classList.remove('is-error');
    row.classList.remove('is-blocked'); // user tapped → clear autoplay-block hint

    // resume from audio.currentTime (which persists)
    if (state.audio.__fadeIv) { clearInterval(state.audio.__fadeIv); state.audio.__fadeIv = null; }
    const playPromise = state.audio.play();
    fadeInAudio(state.audio); // de-click: ramp in, never slam to full volume
    if (playPromise && typeof playPromise.catch === 'function') {
      playPromise.catch(err => {
        // Autoplay blocked (common on mobile after track 1 of a chain) OR source failed.
        row.classList.remove('playing');
        if (currentRow === row) currentRow = null;
        if (err && err.name === 'NotAllowedError') {
          row.classList.add('is-blocked');
          console.info('[player] autoplay blocked — user tap required');
        } else {
          console.warn('[player] play() failed:', err && err.message);
        }
      });
    }
  }

  function seekRow(row, pct) {
    const state = getOrCreateAudio(row);
    pct = Math.max(0, Math.min(100, pct));

    if (!state.audio) return;
    const dur = state.audio.duration;
    if (isFinite(dur) && dur > 0) {
      state.audio.currentTime = (pct / 100) * dur;
      setWaveProgress(row, pct);
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
      let downX = 0, downY = 0, moved = false;
      const TAP_SLOP = 10; // px of movement before it counts as a scroll, not a tap

      const seekFromPointer = (e) => {
        const rect = wave.getBoundingClientRect();
        const pct = ((e.clientX - rect.left) / rect.width) * 100;
        seekRow(row, pct);
      };

      wave.addEventListener('pointerdown', (e) => {
        downX = e.clientX; downY = e.clientY; moved = false;

        const isActiveRow = (currentRow === row);

        if (!isActiveRow) {
          // INACTIVE row: do NOT play on pointerdown. Wait for pointerup to
          // confirm a TAP (not the start of a vertical scroll). touch-action:
          // pan-y lets the page scroll; if the browser takes over the gesture,
          // pointercancel fires and we never play. No preventDefault here so
          // scrolling works normally.
          return;
        }

        // ACTIVE row: seek/scrub. preventDefault to own the horizontal drag.
        e.preventDefault();
        isScrubbing = true;
        wave.setPointerCapture(e.pointerId);
        const state = rowState.get(row);
        wasPlayingBeforeScrub = state && state.audio && !state.audio.paused;
        row.classList.add('playing');
        seekFromPointer(e);
      });

      wave.addEventListener('pointermove', (e) => {
        if (Math.abs(e.clientX - downX) > TAP_SLOP || Math.abs(e.clientY - downY) > TAP_SLOP) {
          moved = true;
        }
        if (!isScrubbing) return;
        seekFromPointer(e);
      });

      const endScrub = (e) => {
        // INACTIVE-row tap confirmation: if we didn't enter scrub mode, this
        // was a tap (or scroll) on a non-active row. Only PLAY if it was a
        // genuine tap — not moved (scroll) — so an accidental scroll-touch
        // never fires the demo.
        if (!isScrubbing) {
          if (e.type === 'pointerup' && !moved && currentRow !== row) {
            if (currentRow) stopResetRow(currentRow);
            currentRow = row;
            playRow(row); // start from 0
          }
          return;
        }
        // ACTIVE-row scrub end
        isScrubbing = false;
        try { wave.releasePointerCapture(e.pointerId); } catch (_) {}
        if (!wasPlayingBeforeScrub) {
          playRow(row);
        } else {
          const state = rowState.get(row);
          if (state && state.hasRealSrc && state.audio && state.audio.paused) {
            const p = state.audio.play();
            fadeInAudio(state.audio); // de-click resume
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
        if (state.audio && isFinite(state.audio.duration)) {
          state.audio.currentTime = Math.min(state.audio.duration, state.audio.currentTime + SEEK_STEP);
        }
      } else if (e.key === 'ArrowLeft') {
        e.preventDefault();
        const state = getOrCreateAudio(row);
        if (state.audio) {
          state.audio.currentTime = Math.max(0, state.audio.currentTime - SEEK_STEP);
        }
      }
    });
  });

  // Clean up audio when leaving the page
  window.addEventListener('beforeunload', () => {
    rowState.forEach(state => {
      if (state.audio) { state.audio.pause(); state.audio.src = ''; }
    });
  });
  // One-media-at-a-time (shared): stop our audio when any OTHER media starts.
  document.addEventListener('cc:media-stop', function (e) {
    var except = e && e.detail ? e.detail.except : null;
    if (currentRow && currentRow !== except) {
      stopResetRow(currentRow);
      currentRow = null;
    }
  });
})();

/* ── 3 · cc-wave · in-house <canvas> peaks renderer ──────────────────────
   We own the peaks data, so we own the renderer: one canvas, identical bars,
   played bars repaint green — deterministic, no library / CDN. Click or drag
   to seek. (Replaced WaveSurfer, whose progress layer mis-scaled the green.) */
(function () {
  'use strict';
  var GREY = 'rgba(255,255,255,0.30)', GREEN = '#BBD67A';
  var R = new Map(); /* row -> state */

  function fit(st) {
    var box = st.wave.getBoundingClientRect();
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    st.dpr = dpr;
    st.W = Math.max(1, Math.round(box.width * dpr));
    st.H = Math.max(1, Math.round(box.height * dpr));
    st.canvas.width = st.W; st.canvas.height = st.H;
  }

  function draw(st, sec) {
    var g = st.g, W = st.W, H = st.H, d = st.data, n = d.length;
    var bw = 2 * st.dpr, gap = 1 * st.dpr, step = bw + gap;
    var bars = Math.max(1, Math.floor(W / step));
    var playedX = st.dur ? Math.min(W, (sec / st.dur) * W) : 0;
    g.clearRect(0, 0, W, H);
    for (var b = 0; b < bars; b++) {
      var v = d[Math.min(n - 1, Math.floor((b / bars) * n))] || 0;
      var h = Math.max(2 * st.dpr, v * H * 0.94);
      var x = b * step, y = (H - h) / 2;
      g.fillStyle = (x + bw / 2) <= playedX ? GREEN : GREY;
      g.fillRect(x, y, bw, h);
    }
  }

  function eagerInit() {
    var rows = document.querySelectorAll('.player__row[data-peaks]');
    Array.prototype.forEach.call(rows, function (row) {
      if (R.has(row)) return;
      var wave = row.querySelector('.player__wave');
      var pk = row.getAttribute('data-peaks');
      if (!wave || !pk) return;
      fetch(pk).then(function (r) {
        if (!r.ok) throw new Error('peaks ' + r.status);
        return r.json();
      }).then(function (j) {
        var data = j.data || j.peaks || j;
        if (!data || !data.map) return;
        /* Peaks are raw ints (audiowaveform min/max), NOT 0..1 — draw() does
           v*H*0.94 expecting 0..1, so without this every bar blew past full
           height into a solid block. Normalize to the loudest peak, THEN shape. */
        var _maxAbs = 0;
        for (var _i = 0; _i < data.length; _i++) { var _a = Math.abs(parseFloat(data[_i]) || 0); if (_a > _maxAbs) _maxAbs = _a; }
        var _norm = _maxAbs > 0 ? _maxAbs : 1;
        /* realism shaping: lift dynamics out of the peak block */
        data = data.map(function (v) {
          v = (Math.abs(parseFloat(v) || 0)) / _norm;
          return Math.pow(v, 1.6);
        });
        var canvas = document.createElement('canvas');
        canvas.className = 'cc-lw';
        wave.appendChild(canvas);
        var st = {
          wave: wave, canvas: canvas, g: canvas.getContext('2d'),
          data: data, raf: null, el: null,
          dur: (/^[0-9.]+$/.test((row.getAttribute('data-duration')||'').trim()) ? parseFloat(row.getAttribute('data-duration')) : 0) || j.duration ||
               (j.length && j.sample_rate && j.samples_per_pixel ? (j.length * j.samples_per_pixel / j.sample_rate) : 0)
        };
        R.set(row, st);
        // Reflect real duration in the chip on load (was hardcoded). The engine's
        // loadedmetadata refines it to exact audio.duration on first play. No-op if unknown.
        if (st.dur > 0) {
          var dEl = row.querySelector('.player__duration');
          if (dEl) { var _m = Math.floor(st.dur / 60), _s = Math.floor(st.dur % 60); dEl.textContent = _m + ' : ' + (_s < 10 ? '0' + _s : _s); }
        }
        fit(st); draw(st, 0);
        wave.classList.add('cc-wave-ready');
        requestAnimationFrame(function(){ fit(st); draw(st, 0); });
        setTimeout(function(){ fit(st); draw(st, st.el?st.el.currentTime:0); }, 250);
        /* tap / drag to seek */
        function seek(ev) {
          if (!st.el || !st.dur) return;
          var box = wave.getBoundingClientRect();
          var cx = (ev.touches ? ev.touches[0].clientX : ev.clientX) - box.left;
          var t = Math.max(0, Math.min(1, cx / box.width)) * st.dur;
          try { st.el.currentTime = t; } catch (_) {}
          draw(st, t);
        }
        canvas.addEventListener('click', seek);
        canvas.addEventListener('touchstart', seek, { passive: true });
      }).catch(function () { /* sidecar missing — wave stays empty, audio unaffected */ });
    });
    var deb = null;
    window.addEventListener('resize', function () {
      clearTimeout(deb);
      deb = setTimeout(function () {
        R.forEach(function (st) {
          fit(st);
          draw(st, st.el && st.dur ? st.el.currentTime : 0);
        });
      }, 150);
    });
  }
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', eagerInit);
  } else { eagerInit(); }

  /* engine hands us its detached Audio() via cc:media-start */
  document.addEventListener('cc:media-start', function (e) {
    var d = e.detail || {};
    var el = d.media, row = d.source;
    if (!el || typeof el.play !== 'function') return;
    if (!row || !row.classList || !row.classList.contains('player__row')) return;
    var st = R.get(row);
    if (!st) return;
    if (!st.el) {
      st.el = el;
      if (!st.dur) {
        el.addEventListener('loadedmetadata', function () {
          if (isFinite(el.duration)) st.dur = el.duration;
        });
        if (isFinite(el.duration) && el.duration) st.dur = el.duration;
      }
      el.addEventListener('ended', function () { draw(st, 0); });
      el.addEventListener('pause', function () { draw(st, el.currentTime || 0); });
    }
    if (!st.raf) {
      var sweep = function () {
        if (!st.el || st.el.paused || st.el.ended) { st.raf = null; return; }
        draw(st, st.el.currentTime || 0);
        st.raf = requestAnimationFrame(sweep);
      };
      st.raf = requestAnimationFrame(sweep);
    }
  });
})();
