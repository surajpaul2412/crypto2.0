<script>
  window.__SUCCESS_STORIES__ = @json($storiesJson);
</script>
@verbatim

<!-- ═══ END FOOTER-001 ═══ -->

<!-- ═══ Shared polish layer · DO NOT inline · loads last in body ═══ -->
<script>
/* ═══════════════════════════════════════════════════════════════
   PAGE-04 · Success Stories · modal controller
   Paste in a script block just before polish.js (which stays
   LAST per the lockfile). Self-contained IIFE, no deps.

   What it does:
   - Opens the detail modal from any .story-card
   - Lazy-injects the YouTube iframe ONLY on open (17 eager iframes
     would be a perf disaster) and destroys it on close
   - Locks body scroll the same way page 03 / homepage do
   - Esc + backdrop close, focus return to the triggering card
   - Monogram fallback wiring (img onerror sets .is-mono)

   Data lives here so the markup stays clean. Swap `img` paths to
   your local filenames at content-edit stage. `video:''` = no clip
   (text-only testimonial → video block hidden). `note` only set
   on softened-attribution entries (Rahman).
   ═══════════════════════════════════════════════════════════════ */
(function () {
  'use strict';

  var STORIES = window.__SUCCESS_STORIES__ || [];

  var grid = document.getElementById('stories-grid');
  if (!grid) return;

  var modal      = document.getElementById('story-modal');
  var elPortrait = document.getElementById('story-modal-portrait');
  var elMono     = document.getElementById('story-modal-mono');
  var elImg      = document.getElementById('story-modal-img');
  var elRole     = document.getElementById('story-modal-role');
  var elName     = document.getElementById('story-modal-name');
  var elQuote    = document.getElementById('story-modal-quote');
  var elVideoBox = document.getElementById('story-modal-video');
  var elVideoBtn = document.getElementById('story-modal-video-play');
  var elCredits  = document.getElementById('story-modal-credits');
  var elNote     = document.getElementById('story-modal-note');
  var byId = {};
  STORIES.forEach(function (s) { byId[s.id] = s; });

  var savedScroll = 0;
  var lastTrigger = null;

  function monogram(name) {
    var parts = name.replace(/[^A-Za-z. ]/g, '').split(/[ .]+/).filter(Boolean);
    if (!parts.length) return '\u2014';
    var first = parts[0][0] || '';
    var last  = parts.length > 1 ? parts[parts.length - 1][0] : '';
    return (first + last).toUpperCase();
  }

  function injectVideo(ytId) {
    if (!ytId) return;
    if (elVideoBox.querySelector('iframe')) return;
    /* Wrap in .video-embed — the proven clip layer from the library-inner
       demo players (border-radius:inherit + overflow clip survives Safari). */
    var wrap = document.createElement('div');
    wrap.className = 'video-embed is-active';
    var iframe = document.createElement('iframe');
    iframe.src = 'https://www.youtube.com/embed/' + ytId +
      '?autoplay=1&rel=0&modestbranding=1&color=white&iv_load_policy=3&playsinline=1';
    iframe.title = 'Composer feature';
    iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
    iframe.setAttribute('allowfullscreen', '');
    wrap.appendChild(iframe);
    elVideoBox.appendChild(wrap);
    if (elVideoBtn) elVideoBtn.style.display = 'none';
  }
  function destroyVideo() {
    var iframe = elVideoBox.querySelector('iframe');
    if (iframe) { iframe.src = ''; }
    elVideoBox.innerHTML = '';
  }

  function openModal(id, trigger) {
    var s = byId[id];
    if (!s || !modal) return;
    lastTrigger = trigger || null;

    elName.textContent  = s.name;
    elRole.textContent  = s.role;
    elQuote.textContent = s.quote;

    // Portrait + monogram fallback
    elPortrait.classList.remove('is-mono');
    elMono.textContent = monogram(s.name);
    elImg.alt = s.name;
    elImg.onerror = function () { elPortrait.classList.add('is-mono'); };
    elImg.src = s.img;

    // Credits
    elCredits.innerHTML = '';
    (s.credits || []).forEach(function (c) {
      var span = document.createElement('span');
      span.className = 'story-modal__credit';
      span.textContent = c;
      elCredits.appendChild(span);
    });

    // Note (softened attribution)
    if (s.note) { elNote.textContent = s.note; elNote.style.display = ''; }
    else { elNote.textContent = ''; elNote.style.display = 'none'; }

    // Video block — rebuild play button, lazy-inject only on click
    destroyVideo();
    if (s.video) {
      elVideoBox.style.display = '';
      var btn = document.createElement('button');
      btn.className = 'story-modal__video-play';
      btn.type = 'button';
      btn.setAttribute('aria-label', 'Play ' + s.name + ' feature');
      // Thumbnail: preload on a detached image, then set the background ONCE.
      // (The old hqdefault→maxres swap repainted a visible element → mobile flash.)
      var thumbMax = 'https://i.ytimg.com/vi/' + s.video + '/maxresdefault.jpg';
      var thumbHq  = 'https://i.ytimg.com/vi/' + s.video + '/hqdefault.jpg';
      btn.style.backgroundSize = 'cover';
      btn.style.backgroundPosition = 'center';
      (function (b, max, hq) {
        var probe = new Image();
        probe.onload  = function () { b.style.backgroundImage = 'url("' + (probe.naturalWidth > 120 ? max : hq) + '")'; };
        probe.onerror = function () { b.style.backgroundImage = 'url("' + hq + '")'; };
        probe.src = max;
      })(btn, thumbMax, thumbHq);
      btn.innerHTML = '<span class="story-modal__video-badge"><svg viewBox="0 0 24 24" aria-hidden="true"><polygon points="6 3 20 12 6 21 6 3"/></svg>Watch the feature</span>';
      btn.addEventListener('click', function () { injectVideo(s.video); });
      elVideoBox.appendChild(btn);
    } else {
      elVideoBox.style.display = 'none';
    }

    // Open + lock scroll (same mechanism as page 03 / homepage)
    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    savedScroll = window.scrollY;
    document.body.style.position = 'fixed';
    document.body.style.top   = -savedScroll + 'px';
    document.body.style.left  = '0';
    document.body.style.right = '0';
    document.body.style.width = '100%';

    var closeBtn = modal.querySelector('.story-modal__close');
    if (closeBtn) closeBtn.focus();
  }

  function closeModal() {
    if (!modal || !modal.classList.contains('is-open')) return;
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    destroyVideo();

    var html = document.documentElement;
    var prev = html.style.scrollBehavior;
    html.style.scrollBehavior = 'auto';
    document.body.style.position = '';
    document.body.style.top = '';
    document.body.style.left = '';
    document.body.style.right = '';
    document.body.style.width = '';
    window.scrollTo(0, savedScroll);
    requestAnimationFrame(function () { html.style.scrollBehavior = prev; });

    if (lastTrigger && lastTrigger.focus) lastTrigger.focus();
    lastTrigger = null;
  }

  // Card clicks (event delegation)
  grid.addEventListener('click', function (e) {
    var card = e.target.closest('.story-card');
    if (!card) return;
    openModal(card.dataset.story, card);
  });
  grid.addEventListener('keydown', function (e) {
    if (e.key !== 'Enter' && e.key !== ' ') return;
    var card = e.target.closest('.story-card');
    if (!card) return;
    e.preventDefault();
    openModal(card.dataset.story, card);
  });

  // Card portrait monogram fallback (set on load, before any modal)
  grid.querySelectorAll('.story-card').forEach(function (card) {
    var img = card.querySelector('.story-card__img');
    if (!img) return;
    img.addEventListener('error', function () { card.classList.add('is-mono'); });
    if (img.complete && img.naturalWidth === 0) card.classList.add('is-mono');
  });

  /* fitCredits — clamp film chips to exactly 2 rows; overflow collapses into a
     single "+more" chip. Measures real layout so it never clips or overlaps,
     and all cards stay identical height (the row zone is fixed in CSS). The
     full filmography is in the modal. Idempotent: re-run on resize. */
  function fitCredits() {
    grid.querySelectorAll('.story-card__credits').forEach(function (row) {
      var films = [].slice.call(row.querySelectorAll('.story-card__credit:not(.story-card__credit--more)'));
      var more  = row.querySelector('.story-card__credit--more');
      if (!films.length) { if (more) more.hidden = true; return; }
      // reset: all films visible, +more visible (every composer has more work)
      films.forEach(function (c) { c.hidden = false; });
      if (more) more.hidden = false;
      // distinct row tops → row 2 boundary
      var rowTops = [];
      films.forEach(function (c) { if (rowTops.indexOf(c.offsetTop) === -1) rowTops.push(c.offsetTop); });
      var twoRowMax = rowTops.length >= 2 ? rowTops[1] : rowTops[0];
      // hide any film past row 2
      films.forEach(function (c) { if (c.offsetTop > twoRowMax) c.hidden = true; });
      // ensure +more sits within 2 rows; if it spilled, hide trailing films until it fits
      if (more) {
        var guard = films.length;
        while (more.offsetTop > twoRowMax && guard-- > 0) {
          var lastVisible = null;
          for (var i = films.length - 1; i >= 0; i--) { if (!films[i].hidden) { lastVisible = films[i]; break; } }
          if (!lastVisible) break;
          lastVisible.hidden = true;
        }
      }
    });
  }
  var fitRAF = null;
  function scheduleFit() { if (fitRAF) cancelAnimationFrame(fitRAF); fitRAF = requestAnimationFrame(fitCredits); }
  if (document.readyState === 'complete') scheduleFit();
  else window.addEventListener('load', scheduleFit);
  scheduleFit();
  window.addEventListener('resize', scheduleFit, { passive: true });

  // Close interactions
  if (modal) {
    modal.addEventListener('click', function (e) {
      if (e.target.closest('[data-story-close]') ||
          e.target.classList.contains('story-modal__backdrop')) {
        closeModal();
      }
    });
  }
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeModal();
  });
})();
</script>

<script>
/* ─── Footer reveal safety [R2] ───────────────────────────────────────
   polish.js §3 reveals [data-reveal] at threshold:0.18 + rootMargin
   bottom -50px. The footer (~1084px at 360w) is taller than the mobile
   viewport, so it can never reach 18% inside the trigger zone before the
   page bottom → stays opacity:0. This low-threshold (0.01) page-local
   observer guarantees it reveals. Idempotent with polish.js's .is-revealed
   (whichever fires first wins; the class is only added once). Does NOT
   touch the shared polish.js threshold (would affect all 15 pages). */
(function () {
  function initFooterReveal() {
    var ft = document.querySelector('footer.ft[data-reveal], #footer[data-reveal]');
    if (!ft || ft.classList.contains('is-revealed')) return;
    if (!('IntersectionObserver' in window)) { ft.classList.add('is-revealed'); return; }
    var io = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (en) {
        if (en.isIntersecting) { en.target.classList.add('is-revealed'); obs.unobserve(en.target); }
      });
    }, { threshold: 0.01 });
    io.observe(ft);
  }
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initFooterReveal);
  } else {
    initFooterReveal();
  }
})();
</script>

@endverbatim
