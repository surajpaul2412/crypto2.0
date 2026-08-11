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

  var STORIES = [
    {
      id: 'rahman', name: 'A.R. Rahman', img: 'assets/img/ar_rehman.png',
      role: 'Oscar · BAFTA · Golden Globe · Slumdog Millionaire',
      teaser: 'Has publicly noted his support for our mission to bring rare Indian virtual instruments to composers worldwide.',
      quote: 'Very intrigued by this — wishing you the best.',
      video: '',
      credits: ['Slumdog Millionaire', 'Roja', '127 Hours', 'Rang De Basanti'],
      note: 'Support noted publicly. Crypto Cipher instruments have featured across a number of productions in this circle.'
    },
    {
      id: 'huttner', name: 'Jörg Hüttner', img: 'assets/img/JORG_HUTTNER.png',
      role: 'The Dark Knight Rises · Fifty Shades of Grey · White House Down',
      teaser: 'Trying out Crypto Cipher sample libraries which I really like — great sounding and super useful across productions.',
      quote: "I'm trying out Crypto Cipher sample libraries which I really like. They are really great sounding and super useful in various productions, with a simple but really useful interface in Kontakt. My favourites here are the Tongue Drum, Swarmandal and Tabla. Pretty much all of it is genuinely useful — go ahead and check them out, they're worth it.",
      video: 'bKdvio9KrH4',
      credits: ['The Dark Knight Rises', 'The Girl on the Train', 'Independence Day: Resurgence', 'Vantage Point']
    },
    {
      id: 'desai', name: 'Nainita Desai', img: 'assets/img/NAINITA_DESAI.png',
      role: 'BAFTA · Emmy · Oscar winning & nominated film and TV',
      teaser: 'Using great Indian talent from all over the country — no other company is doing quite what you do.',
      quote: 'Crypto Cipher is using great Indian talent from all over the country. There is no other company out there doing quite what you do. Please keep up the good work producing more unusual libraries that are so inspiring to us — film and television composers, especially out here in the West.',
      video: 'k73ufpnk1Sw',
      credits: ['For Sama', 'The Reason I Jump', 'American Murder', 'BBC Proms']
    },
    {
      id: 'swihart', name: 'John Swihart', img: 'composers/john-swihart.jpg',
      role: 'Grammy nominated · How I Met Your Mother · Napoleon Dynamite',
      teaser: 'Loving these new libraries — the Tabla is very playable, Swarmandal sounds amazing, Dholak is amazing.',
      quote: "I'm sitting with some Crypto Cipher samples and really loving these new libraries. The Tabla is very playable, Swarmandal sounds amazing — just a beautiful sound — and the Dholak is amazing. The loops are great. I'm just loving working with them; they come with great options. Very happy, and I hope you enjoy them too.",
      video: 'g3mPqE9T8H4',
      credits: ['How I Met Your Mother', 'Napoleon Dynamite', 'Youth in Revolt', 'Employee of the Month']
    },
    {
      id: 'bt', name: 'BT', img: 'composers/bt.jpg',
      role: 'Grammy nominated producer · Fast & Furious · Monster',
      teaser: 'Absolutely freaking out on these sample libraries. If you\u2019re looking for unusual Kontakt libraries — check them.',
      quote: "Absolutely freaking out on these sample libraries. If you're looking for unusual Kontakt libraries, check out Crypto Cipher.",
      video: '',
      credits: ['Fast & Furious', 'Partysaurus Rex', 'Go', 'Stealth', 'Monster']
    },
    {
      id: 'tucker', name: 'Shankar Tucker', img: 'composers/shankar-tucker.jpg',
      role: 'Music producer · artist · 140k+ YouTube subscribers',
      teaser: 'Please keep making cool libraries — especially loop libraries at the quality you used for Dholak Loops.',
      quote: "Good job, Crypto Cipher. Please keep making cool libraries, especially loop libraries at the level of quality you used for the Dholak Loops. I'll definitely be getting the next one.",
      video: 'Pv4nrDuL-Sk',
      credits: ['The ShrutiBox', 'Filmi Collaborations', 'YouTube Originals']
    },
    {
      id: 'balhara', name: 'Sanchit Balhara', img: 'composers/sanchit-balhara.jpg',
      role: 'Bollywood composer · Bajirao Mastani · Ram-Leela',
      teaser: 'Doing really a great job bringing the revolution at world level — I wish them all the best.',
      quote: 'Crypto Cipher is doing really, really a great job in bringing the revolution at world level, and I wish them all the best.',
      video: 'wPSymhkP5a0',
      credits: ['Bajirao Mastani', 'Goliyon Ki Raasleela Ram-Leela']
    },
    {
      id: 'maas', name: 'Michael Maas', img: 'assets/img/MICHEAL_MAAS.png',
      role: 'Trailer music · The Amazing Spider-Man 2 · Maze Runner',
      teaser: 'Hired Crypto Cipher for live sitar recordings from India — sound quality and performance beyond what I imagined.',
      quote: 'Crypto Cipher is a really great company. In 2014 I had to record and organise a world-music album for a production library in France, with live solo performances from across the world. For three tracks we needed live sitar from a real, gifted Indian player. I hired Crypto Cipher directly from India and they did a really great job — I never imagined a sound quality and performance like the one they gave us. I highly recommend the company\u2019s services and plugins.',
      video: 'g3mPqE9T8H4',
      credits: ['The Amazing Spider-Man 2', 'Chappie', 'Maze Runner', 'The Walking Dead S5']
    },
    {
      id: 'johnson', name: 'Tim Johnson', img: 'composers/tim-johnson.jpg',
      role: 'Sound design · Red Bull Air Race · Project CARS',
      teaser: 'Crypto Cipher action walkthrough — a sound designer\u2019s look at the libraries in use.',
      quote: 'A Crypto Cipher action walkthrough video by Tim Johnson — a working sound designer\u2019s look at the libraries in real use.',
      video: '7mHg-vGcP5s',
      credits: ['Red Bull Air Race (Oculus Rift)', 'Xbox One Release', 'Project CARS']
    },
    {
      id: 'lockett', name: 'Pete Lockett', img: 'assets/img/pete_lockett.png',
      role: 'Ethnic percussion · last five James Bond films',
      teaser: 'Quite a versatile set of instruments — definitely worth checking out. Bringing them into my own productions.',
      quote: "It's quite a versatile set of instruments — definitely worth checking out Crypto Cipher. I'm sure they've got new stuff coming soon as well. I'm going to bring them into some of my own productions.",
      video: 'xSt5fZ9QBB8',
      credits: ['James Bond (×5)', 'Björk', 'Peter Gabriel', 'Robert Plant', 'Jeff Beck']
    },
    {
      id: 'clemente', name: 'Adriano Clemente', img: 'composers/adriano-clemente.jpg',
      role: 'Dubspot director',
      teaser: 'Interesting to see what solutions people can come up with using these libraries — get out of your usual set of tools.',
      quote: "One thing I never get tired of reminding students is the idea of trying to get out of your usual set of tools and sounds. It's really interesting to see what kind of solutions people can come up with using these libraries.",
      video: 'yzggNxA5jX8',
      credits: ['Dubspot', 'Sound Design Education']
    },
    {
      id: 'zillani', name: 'Laurent Zillani', img: 'composers/laurent-zillani.jpg',
      role: 'Resident Evil 6 · Priest · Sinister',
      teaser: 'A great collection of Indian instruments and sound design — Solo Tabla and Solo Dholak are beautifully recorded.',
      quote: "It's a great collection of Indian instruments and sound design. I particularly like the Solo Tabla and Solo Dholak, which I think are beautifully recorded and give you a lot of options.",
      video: 'UvyzjeBK-es',
      credits: ['Resident Evil 6', 'Priest', 'Drag Me to Hell', 'Sinister']
    },
    {
      id: 'kjsingh', name: 'K.J. Singh', img: 'composers/kj-singh.jpg',
      role: 'Sound engineer · A.R. Rahman · Vishal Bhardwaj · Amit Trivedi',
      teaser: 'Great pains taken to record high-quality sounds with very talented musicians and deep, authentic programming.',
      quote: 'The team at Crypto Cipher has taken great pains to record some high-quality sounds. They\u2019ve got very talented musicians playing these instruments, and some deep programming has gone into making them playable and as authentic as possible.',
      video: '3Iq6vH5Q7zw',
      credits: ['Rang De Basanti', 'Guru', 'Omkara', 'Delhi-6', 'Robot']
    },
    {
      id: 'buckley', name: 'David Buckley', img: 'composers/david-buckley.jpg',
      role: 'The Town · Batman: Arkham Knight · Call of Duty: Ghosts',
      teaser: 'Recorded and programmed with such care — a different league to most other ethnic sample libraries.',
      quote: 'I love the samples from Crypto Cipher. They have been recorded and programmed with such care and attention to detail. They stand in a different league to most other ethnic sample libraries because they offer something authentic. Whenever I delve into music from India — or many other places — I instinctively start clicking through the Crypto Cipher folder to see what treasures can be added to my music.',
      video: '',
      credits: ['The Town', 'Batman: Arkham Knight', 'Call of Duty: Ghosts', 'The Good Wife']
    }
  ];

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
