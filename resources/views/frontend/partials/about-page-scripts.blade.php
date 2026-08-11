@verbatim



<script>
/* ═══════════════════════════════════════════════════════════════
   CRYPTO CIPHER® · ABOUT · COMPONENT JS
   Nav scroll + hamburger + mobile panel + social dropdown + svantra magnetic.
   Reveals are owned by polish.js (.is-revealed) — NO duplicate .visible IO here
   (closes the HANDOFF #16 trap that the canonical page still ships).
   ═══════════════════════════════════════════════════════════════ */
(function(){
  'use strict';

  var nav        = document.getElementById('cc-nav');
  var hamburger  = nav && nav.querySelector('.cc-nav__hamburger');
  var mobilePanel= document.getElementById('cc-nav-mobile');
  var scrollTick = false;

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
    hamburger.addEventListener('click', function(){
      var open = mobilePanel.classList.toggle('open');
      hamburger.classList.toggle('open', open);
      hamburger.setAttribute('aria-expanded', open);
      document.body.style.overflow = open ? 'hidden' : '';
    });
    mobilePanel.querySelectorAll('a').forEach(function(a){
      a.addEventListener('click', function(){
        mobilePanel.classList.remove('open');
        hamburger.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });
  }

  /* Social dropdown */
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

  /* Svantra magnetic (nav) — desktop/fine-pointer only */
  (function initSvantraMagnetic(){
    var btn = nav && nav.querySelector('.cc-nav__svantra[data-magnetic]');
    if (!btn) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    if (window.matchMedia('(pointer: coarse)').matches) return;
    var STRENGTH = 0.18, MAX = 4;
    btn.addEventListener('mousemove', function(e){
      var r = btn.getBoundingClientRect();
      var dx = Math.max(-MAX, Math.min(MAX, (e.clientX - (r.left + r.width/2)) * STRENGTH));
      var dy = Math.max(-MAX, Math.min(MAX, (e.clientY - (r.top + r.height/2)) * STRENGTH));
      btn.style.setProperty('--mx', dx + 'px');
      btn.style.setProperty('--my', dy + 'px');
    });
    function reset(){ btn.style.setProperty('--mx','0px'); btn.style.setProperty('--my','0px'); }
    btn.addEventListener('mouseleave', reset);
    btn.addEventListener('blur', reset);
  })();

  /* ════════════════════════════
     ORBITAL · pillar card activation
     Hover or focus a node disc → show its card; leave/blur → hide.
     Desktop only (mobile uses the stacked fallback).
     ════════════════════════════ */
  (function initOrbital(){
    var orbital = document.getElementById('abtOrbital');
    if (!orbital) return;
    if (window.matchMedia('(max-width: 968px)').matches) return;

    var cards = {};
    orbital.querySelectorAll('.abt-orbital__card').forEach(function(c){
      cards[c.getAttribute('data-card')] = c;
    });
    var discs = orbital.querySelectorAll('.abt-orbital__node-disc[data-pillar]');

    function show(id){
      Object.keys(cards).forEach(function(k){ cards[k].classList.toggle('is-active', k === id); });
    }
    function clear(){ Object.keys(cards).forEach(function(k){ cards[k].classList.remove('is-active'); }); }

    discs.forEach(function(disc){
      var id = disc.getAttribute('data-pillar');
      disc.addEventListener('mouseenter', function(){ show(id); });
      disc.addEventListener('focus',      function(){ show(id); });
      disc.addEventListener('click',      function(){ show(id); });
    });
    orbital.addEventListener('mouseleave', clear);
    /* focus leaving the orbital clears */
    orbital.addEventListener('focusout', function(e){
      if (!orbital.contains(e.relatedTarget)) clear();
    });
  })();

})();
</script>


<!-- footer reveal + accordion handled by shared polish.js (canonical) -->


<script>
/* Gallery lightbox · page-local (not in shared polish.js).
   Click/Enter a tile → fullscreen view; arrows / swipe to move; Esc / backdrop to close. */
(function(){
  'use strict';
  var grid = document.querySelector('.abt-gallery');
  var box  = document.getElementById('abtLightbox');
  if (!grid || !box) return;
  if (box.parentElement !== document.body) document.body.appendChild(box); // escape page stacking context -> above nav
  var imgEl = document.getElementById('abtLightboxImg');
  var capEl = document.getElementById('abtLightboxCap');
  var btnClose = box.querySelector('.abt-lightbox__close');
  var btnPrev  = box.querySelector('.abt-lightbox__nav--prev');
  var btnNext  = box.querySelector('.abt-lightbox__nav--next');
  var tiles = [].slice.call(grid.querySelectorAll('.abt-gallery__item'));
  var idx = 0, lastFocus = null;

  function dataFor(tile){
    var img = tile.querySelector('img');
    var ph  = tile.querySelector('.abt-gallery__ph');
    var cap = tile.querySelector('.abt-gallery__cap');
    return {
      src: img ? img.currentSrc || img.src : '',
      alt: img ? (img.alt || '') : (ph ? ph.textContent.trim() : ''),
      cap: cap ? cap.textContent.trim() : (img ? img.alt : (ph ? ph.textContent.trim() : ''))
    };
  }
  function render(){
    var d = dataFor(tiles[idx]);
    if (d.src){ imgEl.src = d.src; imgEl.alt = d.alt; imgEl.style.display=''; }
    else { imgEl.removeAttribute('src'); imgEl.style.display='none'; }   // placeholder stage: caption only
    capEl.textContent = d.cap || '';
  }
  function open(i){
    idx = i; lastFocus = document.activeElement; render();
    box.hidden = false;
    requestAnimationFrame(function(){ box.classList.add('is-open'); });
    document.body.style.overflow = 'hidden';
    btnClose.focus();
  }
  function close(){
    box.classList.remove('is-open');
    document.body.style.overflow = '';
    setTimeout(function(){ box.hidden = true; }, 280);
    if (lastFocus) lastFocus.focus();
  }
  function step(n){ idx = (idx + n + tiles.length) % tiles.length; render(); }

  tiles.forEach(function(t, i){
    t.setAttribute('tabindex','0');
    t.setAttribute('role','button');
    t.setAttribute('aria-label','View image ' + (i+1));
    t.addEventListener('click', function(){ open(i); });
    t.addEventListener('keydown', function(e){
      if (e.key === 'Enter' || e.key === ' '){ e.preventDefault(); open(i); }
    });
  });
  btnClose.addEventListener('click', close);
  btnPrev.addEventListener('click', function(){ step(-1); });
  btnNext.addEventListener('click', function(){ step(1); });
  box.addEventListener('click', function(e){ if (e.target === box) close(); });
  document.addEventListener('keydown', function(e){
    if (box.hidden) return;
    if (e.key === 'Escape') close();
    else if (e.key === 'ArrowLeft') step(-1);
    else if (e.key === 'ArrowRight') step(1);
  });
  // touch swipe
  var x0 = null;
  box.addEventListener('touchstart', function(e){ x0 = e.touches[0].clientX; }, {passive:true});
  box.addEventListener('touchend', function(e){
    if (x0 === null) return;
    var dx = e.changedTouches[0].clientX - x0;
    if (Math.abs(dx) > 50) step(dx < 0 ? 1 : -1);
    x0 = null;
  }, {passive:true});
})();
</script>


<script>
/* §7 collaborators · pointer drag + arrow paging + progress (touch swipe is native).
   Horizontal only — does not touch Lenis (vertical). No momentum, no infinite. */
(function () {
  var track = document.getElementById('abtCreditTrack');
  if (!track) return;
  var bar = document.getElementById('abtCreditBar');
  var arrows = document.querySelectorAll('.abt-credit-arrow');

  function maxScroll(){ return track.scrollWidth - track.clientWidth; }
  function update(){
    var max = maxScroll();
    if (bar) bar.style.width = (max <= 1 ? 100 : (track.scrollLeft / max) * 100) + '%';
    arrows.forEach(function(a){
      var dir = +a.getAttribute('data-dir');
      var atEnd = dir > 0 ? track.scrollLeft >= max - 1 : track.scrollLeft <= 1;
      if (atEnd) a.setAttribute('disabled',''); else a.removeAttribute('disabled');
    });
  }
  // arrow paging — scroll by ~80% of viewport width
  arrows.forEach(function(a){
    a.addEventListener('click', function(){
      track.scrollBy({ left: (+a.getAttribute('data-dir')) * track.clientWidth * 0.8, behavior: 'smooth' });
    });
  });
  // desktop pointer drag (touch handled natively)
  var down = false, startX = 0, startScroll = 0, moved = 0;
  track.addEventListener('pointerdown', function (e) {
    if (e.pointerType === 'touch') return;
    down = true; moved = 0; startX = e.clientX; startScroll = track.scrollLeft;
    track.classList.add('is-dragging'); track.setPointerCapture(e.pointerId);
  });
  track.addEventListener('pointermove', function (e) {
    if (!down) return;
    var dx = e.clientX - startX; moved = Math.abs(dx);
    track.scrollLeft = startScroll - dx;
  });
  function end(){ down = false; track.classList.remove('is-dragging'); }
  track.addEventListener('pointerup', end);
  track.addEventListener('pointercancel', end);
  track.addEventListener('click', function (e) { if (moved > 6) { e.preventDefault(); e.stopPropagation(); } }, true);
  track.addEventListener('scroll', update, { passive: true });
  window.addEventListener('resize', update);
  update();
})();
</script>


<script>
/* §6 team · draggable node field (desktop ≥969 only).
   Reads the roster (.abt-team__person) as the single data source, builds nodes,
   drag-to-arrange (session only), tap/click reveals photo+name+role. No infinite
   motion — nodes are static until the user drags. Mobile shows the roster instead. */
(function () {
  var field = document.getElementById('abtTeamField');
  if (!field) return;
  var mq = window.matchMedia('(min-width: 360px)');
  var svg = document.getElementById('abtTeamLinks');
  var built = false, nodes = [], panel = null;

  function readRoster() {
    return [].slice.call(document.querySelectorAll('.abt-team__grid .abt-team__person')).map(function (p) {
      var img = p.querySelector('img');
      return {
        name: (p.querySelector('.abt-team__name') || {}).textContent || '',
        role: (p.querySelector('.abt-team__desig') || {}).textContent || '',
        img: img ? img.getAttribute('src') : '',
        focusY: p.style.getPropertyValue('--focus-y') || '50%',
        bio: p.getAttribute('data-bio') || ''
      };
    });
  }
  // Geometry that fits ANY roster size (8 or 50+) without cram/overlap/break.
  //   small N (<=16): organic random scatter (looks alive)
  //   large N:        grid-jitter packing (proven 0-overlap up to 60+ at 360px)
  // Field height auto-grows from row count either way. Input N -> area -> height.
  function fieldMetrics() {
    var W = field.clientWidth || 1, narrow = W < 520;
    var nodePx = narrow ? 46 : 78, gap = narrow ? 16 : 28, cell = nodePx + gap;
    return { W: W, narrow: narrow, nodePx: nodePx, gap: gap, cell: cell };
  }
  function scatter(people) {
    var m = fieldMetrics(), n = people.length, floor = m.narrow ? 460 : 540;
    if (n <= 16) {
      // organic scatter into an area sized for n
      var rowsApprox = Math.ceil(n / Math.max(1, Math.floor((m.W * 0.76) / m.cell)));
      var H = Math.max(floor, rowsApprox * m.cell + m.cell);
      field.style.height = H + 'px';
      var R = m.narrow ? 58 : 86, tries;
      people.forEach(function (p) {
        tries = 0;
        do {
          p.x = (0.12 + Math.random() * 0.76) * m.W;
          p.y = (0.10 + Math.random() * 0.80) * H;
          tries++;
        } while (tries < 80 && people.some(function (q) {
          return q !== p && q.x != null && Math.hypot(p.x - q.x, p.y - q.y) < R;
        }));
      });
    } else {
      // grid-jitter — guaranteed no overlap at scale
      var usableW = m.W * 0.84;
      var cols = Math.max(1, Math.floor(usableW / m.cell));
      var rows = Math.ceil(n / cols);
      var H2 = Math.max(floor, rows * m.cell + m.cell);
      field.style.height = H2 + 'px';
      var insetX = (m.W - cols * m.cell) / 2 + m.cell / 2;
      var insetY = m.cell * 0.8;
      var jit = Math.max(0, (m.cell - m.nodePx) * 0.5 - 2);
      people.forEach(function (p, k) {
        var c = k % cols, r = Math.floor(k / cols);
        p.x = insetX + c * m.cell + (Math.random() * 2 - 1) * jit;
        p.y = insetY + r * m.cell + (Math.random() * 2 - 1) * jit;
      });
    }
  }
  function drawLinks() {
    var W = field.clientWidth, H = field.clientHeight;
    svg.setAttribute('viewBox', '0 0 ' + W + ' ' + H);
    svg.innerHTML = '';
    if (nodes.length < 2) return;
    var seen = {};
    function addLine(a, b) {
      var key = a.i < b.i ? a.i + '-' + b.i : b.i + '-' + a.i;
      if (seen[key]) return; seen[key] = 1;
      var l = document.createElementNS('http://www.w3.org/2000/svg', 'line');
      l.setAttribute('x1', a.x); l.setAttribute('y1', a.y);
      l.setAttribute('x2', b.x); l.setAttribute('y2', b.y);
      svg.appendChild(l);
    }
    // 1) CLOSED RING — order nodes by angle around the centroid so the loop
    //    never self-crosses, then join each to the next AND last back to first.
    //    Result: one unbroken circle, every member on it -> reads as family.
    var cx = 0, cy = 0;
    nodes.forEach(function (n) { cx += n.x; cy += n.y; });
    cx /= nodes.length; cy /= nodes.length;
    var ring = nodes.slice().sort(function (a, b) {
      return Math.atan2(a.y - cy, a.x - cx) - Math.atan2(b.y - cy, b.x - cx);
    });
    for (var r = 0; r < ring.length; r++) {
      addLine(ring[r], ring[(r + 1) % ring.length]);   // %length closes the loop
    }
    // 2) INNER CROSS-LINKS — short interior strands for the constellation web.
    var deg = {};
    nodes.forEach(function (n) { deg[n.i] = 0; });
    // recount degree from the ring already drawn
    Object.keys(seen).forEach(function (k) { var p = k.split('-'); deg[p[0]]++; deg[p[1]]++; });
    function link(a, b) {
      var key = a.i < b.i ? a.i + '-' + b.i : b.i + '-' + a.i;
      if (seen[key]) return false;
      addLine(a, b); deg[a.i]++; deg[b.i]++; return true;
    }
    nodes.forEach(function (a) {
      nodes.filter(function (b) { return b !== a; })
        .map(function (b) { return { b: b, d: Math.hypot(a.x - b.x, a.y - b.y) }; })
        .sort(function (m, n) { return m.d - n.d; })
        .slice(0, 2)
        .forEach(function (o) { link(a, o.b); });
    });
    // 3) GUARANTEE no node feels isolated — every node gets >=3 total strands.
    //    If any ended with fewer (sparse corner), wire its nearest neighbours
    //    until it reaches 3. Closed ring already prevents true islands; this
    //    ensures each node is VISIBLY woven in, not loosely dangling.
    var MIN = Math.min(3, nodes.length - 1);   // can't exceed available neighbours (tiny rosters)
    nodes.forEach(function (a) {
      if (deg[a.i] >= MIN) return;
      var cands = nodes.filter(function (b) { return b !== a; })
        .map(function (b) { return { b: b, d: Math.hypot(a.x - b.x, a.y - b.y) }; })
        .sort(function (m, n) { return m.d - n.d; });
      for (var k = 0; k < cands.length && deg[a.i] < MIN; k++) link(a, cands[k].b);
    });
  }
  var scrim = null;
  function makePanel() {
    scrim = document.createElement('div');
    scrim.className = 'abt-team__scrim';
    document.body.appendChild(scrim);
    scrim.addEventListener('click', closePanel);
    panel = document.createElement('div');
    panel.className = 'abt-team__reveal';
    panel.innerHTML = '<button class="abt-team__reveal-close" aria-label="Close">&times;</button>' +
      '<div class="abt-team__reveal-pic"></div><div class="abt-team__reveal-name"></div>' +
      '<div class="abt-team__reveal-role"></div><div class="abt-team__reveal-bio"></div>';
    document.body.appendChild(panel);
    panel.querySelector('.abt-team__reveal-close').addEventListener('click', function (e) {
      e.stopPropagation(); closePanel();
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && panel.classList.contains('is-open')) closePanel();
    });
  }
  var activeEl = null;
  function openPanel(p) {
    if (activeEl) activeEl.classList.remove('is-active');
    panel.querySelector('.abt-team__reveal-pic').innerHTML = p.img ? '<img src="' + p.img + '" style="object-position:50% ' + p.focusY + '" alt="">' : '';
    panel.querySelector('.abt-team__reveal-name').textContent = p.name;
    panel.querySelector('.abt-team__reveal-role').textContent = p.role;
    panel.querySelector('.abt-team__reveal-bio').textContent = p.bio;
    if (window.matchMedia('(max-width: 768px)').matches) {
      // mobile: centred sheet near the bottom — easy thumb reach, premium feel
      panel.classList.add('abt-team__reveal--sheet');
      panel.classList.remove('abt-team__reveal--modal');
      panel.style.left = ''; panel.style.top = '';
    } else {
      // desktop: screen-centred modal — consistent at any roster size, never below the field
      panel.classList.remove('abt-team__reveal--sheet');
      panel.classList.add('abt-team__reveal--modal');
      panel.style.left = ''; panel.style.top = '';
    }
    if (scrim) scrim.classList.add('is-open');
    panel.classList.add('is-open');
    p.el.classList.add('is-active'); activeEl = p.el;
  }
  function closePanel() {
    panel.classList.remove('is-open');
    if (scrim) scrim.classList.remove('is-open');
    if (activeEl) { activeEl.classList.remove('is-active'); activeEl = null; }
  }
  function wire(el, p) {
    var fine = window.matchMedia('(hover:hover) and (pointer:fine)').matches;
    var down = false, moved = 0, sx, sy, ox, oy, pid;
    el.addEventListener('pointerdown', function (e) {
      if (activeEl && activeEl !== el) closePanel();   // only dismiss another node's panel, not the one we're opening
      if (!fine) return;                 // touch: no drag, page keeps scrolling
      down = true; moved = 0; sx = e.clientX; sy = e.clientY; ox = p.x; oy = p.y; pid = e.pointerId;
      el.setPointerCapture(pid); el.classList.add('is-dragging');
    });
    el.addEventListener('pointermove', function (e) {
      if (!down) return;
      var dx = e.clientX - sx, dy = e.clientY - sy; moved = Math.hypot(dx, dy);
      var W = field.clientWidth, H = field.clientHeight;
      p.x = Math.min(Math.max(ox + dx, 40), W - 40);
      p.y = Math.min(Math.max(oy + dy, 40), H - 40);
      el.style.left = p.x + 'px'; el.style.top = p.y + 'px';
      drawLinks();
    });
    function up() {
      if (!fine) return;                 // touch: opening handled by click (pan-y can steal pointerup)
      if (!down) return; down = false; el.classList.remove('is-dragging'); if (moved < 10) openPanel(p);
    }
    el.addEventListener('pointerup', up);
    el.addEventListener('click', function () { if (!fine) openPanel(p); });   // touch tap — click survives pan-y, fires only on a real tap
    el.addEventListener('pointercancel', function () { down = false; el.classList.remove('is-dragging'); });
    el.addEventListener('keydown', function (e) { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openPanel(p); } });
  }
  function build() {
    if (built) return;
    var people = readRoster();
    if (!people.length) return;
    nodes = people;
    scatter(nodes);
    nodes.forEach(function (p, i) {
      p.i = i;
      var el = document.createElement('div');
      el.className = 'abt-team__node'; el.setAttribute('role', 'button'); el.tabIndex = 0;
      el.setAttribute('aria-label', p.name + ' — ' + p.role);
      el.innerHTML = '<div class="abt-team__node-ph" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 3.6-6 8-6s8 2 8 6"/></svg></div>';
      if (p.img) { var im = new Image(); im.decoding = 'async'; im.onload = function () { el.innerHTML = ''; im.style.objectPosition = '50% ' + p.focusY; el.appendChild(im); }; im.src = p.img; }
      el.style.left = p.x + 'px'; el.style.top = p.y + 'px';
      field.appendChild(el); p.el = el; wire(el, p);
    });
    makePanel();
    drawLinks();
    field.addEventListener('pointerdown', function (e) { if (e.target === field || e.target === svg) closePanel(); });
    built = true;
  }
  function check() { if (mq.matches) build(); }
  check();
  if (mq.addEventListener) mq.addEventListener('change', check); else mq.addListener(check);
  var lastW = window.innerWidth, rT;
  window.addEventListener('resize', function () {
    if (window.innerWidth === lastW) return;   // height-only (mobile URL bar) -> ignore
    lastW = window.innerWidth;
    clearTimeout(rT); rT = setTimeout(function () {
      if (!built) return;
      // width changed -> field height + positions must recompute so nodes still fit
      scatter(nodes);
      nodes.forEach(function (p) { p.el.style.left = p.x + 'px'; p.el.style.top = p.y + 'px'; });
      drawLinks();
    }, 150);
  });
})();

/* ─── §HUE · whisper section-glow observer ─────────────────────────────
   Maps each section to a meaning-coded hue (accepted map). One fixed layer
   crossfades hue as sections enter the upper viewport. Whisper alpha (~6%).
   prefers-reduced-motion: layer stays neutral/off. */
(function () {
  var layer = document.querySelector('.abt-huelayer');
  if (!layer) return;
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  // hue per section aria id — alpha kept whisper-low for premium restraint
  var MAP = {
    'abt-hero-title':    null,                         /* neutral — flag begins after the hero */
    'abt-story-title':   'rgba(255,153,51,0.08)',      /* saffron — tiranga top */
    'abt-pillars-title': 'rgba(255,153,51,0.08)',      /* saffron */
    'abt-founder-title': null,                         /* neutral — the "white" reads as a calm dark breath (glow off) */
    'abt-team-title':    null,                         /* neutral */
    'abt-collab-title':  'rgba(117,194,73,0.10)',      /* green — tiranga bottom */
    'abt-gallery-title': 'rgba(117,194,73,0.10)'       /* green */
  };
  // heritage closer uses aria-label (no aria-labelledby) — key by class
  function hueFor(sec) {
    var id = sec.getAttribute('aria-labelledby');
    if (id && (id in MAP)) return MAP[id];
    if (sec.classList.contains('abt-mv-sec')) return 'rgba(255,153,51,0.08)'; /* saffron — top band (mv sits high) */
    if (sec.classList.contains('abt-heritage')) return 'rgba(117,194,73,0.10)'; /* green — closing band */
    return undefined;
  }
  var secs = document.querySelectorAll('main.abt-main > .abt-sec');
  var io = new IntersectionObserver(function (entries) {
    // pick the most-visible intersecting section, set its hue
    var best = null, bestRatio = 0;
    entries.forEach(function (e) {
      if (e.isIntersecting && e.intersectionRatio > bestRatio) { best = e.target; bestRatio = e.intersectionRatio; }
    });
    if (!best) return;
    var hue = hueFor(best);
    if (hue === null || hue === undefined) {
      layer.classList.remove('is-on');        /* neutral section — fade glow out */
      return;
    }
    layer.style.setProperty('--glow', hue);
    layer.classList.add('is-on');
  }, { threshold: [0.25, 0.5, 0.75], rootMargin: '-10% 0px -40% 0px' });
  secs.forEach(function (sec) { io.observe(sec); });
})();
</script>


<style id="cc-about-overflow-fix">
/* cosmic glow orbs (position:fixed) escaped overflow clipping and pushed
   the page +5/+25px on narrow screens. Hard-clip at the document root. */
html, body { max-width: 100%; overflow-x: clip; overflow-anchor: none; }
.cosmic-bg { max-width: 100vw; }
.cosmic-bg__glow { max-width: 100vw; }
@media (max-width: 768px) {
  /* keep the orbs inside the viewport box on mobile */
  .cosmic-bg__glow { right: auto !important; }
}
</style>


@endverbatim

