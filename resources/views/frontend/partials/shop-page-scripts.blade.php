<script>
  window.__SHOP_CATALOGUE__ = @json($catalogueJson);
  window.__SHOP_FAMILY_LABELS__ = @json($families->pluck('label', 'slug'));
  window.__SHOP_TAG_LABELS__ = @json($tags->pluck('label', 'slug'));
</script>
@verbatim
<!-- ═══════════════════════════════════════════════════════════════
     SCRIPTS — Nav · Filter · Catalogue Render · Audio Preview · Reveal
     ═══════════════════════════════════════════════════════════════ -->
<script>
(function(){
  'use strict';

  /* ═════════════════════════════════════
     CATALOGUE DATA · single source of truth — server-rendered from DB
     (window.__SHOP_CATALOGUE__ injected above, outside @verbatim)
     ═════════════════════════════════════ */
  const CATALOGUE = window.__SHOP_CATALOGUE__;

  // Human-readable labels for chip display — family/tag come from the DB
  // (window.__SHOP_*_LABELS__ injected above, outside @verbatim). Declared
  // early (before cardHTML/renderGrid run) so nothing hits it before init.
  const LABELS = {
    family: window.__SHOP_FAMILY_LABELS__ || {},
    tag:    window.__SHOP_TAG_LABELS__ || {},
    format: { kontakt:'For Kontakt', 'kontakt-player':'For Kontakt Player', standalone:'Standalone App', plugin:'Plugin (VST3·AU)' }
  };

  /* ═════════════════════════════════════
     CARD RENDER
     ═════════════════════════════════════ */
  function badgeHTML(lib){
    if (lib.tags.includes('free')) return '<span class="lib-card__badge lib-card__badge--free">Free</span>';
    if (lib.tags.includes('new'))  return '<span class="lib-card__badge lib-card__badge--new">New</span>';
    if (lib.flagship)              return '<span class="lib-card__badge lib-card__badge--flagship">Flagship</span>';
    if (lib.tags.includes('bundle')) return '<span class="lib-card__badge lib-card__badge--bundle">In a suite</span>';
    return '';
  }

  function priceHTML(lib){
    if (lib.price === 0) return '<span class="lib-card__price lib-card__price--free">Free</span>';
    return '<span class="lib-card__price">' + lib.priceDisplay + '</span>';
  }

  // Card badge text for a product's format. Uses the curated LABELS.format
  // map (declared below) when the format is known; any new format value an
  // admin adds (e.g. "battery", "wav-loops") still gets a readable badge
  // instead of silently falling back to a wrong/hardcoded label.
  function formatChipLabel(format){
    if (!format) return '';
    if (LABELS.format[format]) return LABELS.format[format];
    var titled = format.split('-').map(function (w) { return w.charAt(0).toUpperCase() + w.slice(1); }).join(' ');
    return 'For ' + titled;
  }

  function cardHTML(lib){
    // Escape for HTML attribute use
    const esc = s => String(s).replace(/"/g, '&quot;').replace(/'/g, '&#39;');
    const dataset = [
      'data-family="' + lib.family + '"',
      'data-region="' + lib.region + '"',
      'data-moods="' + lib.moods.join(' ') + '"',
      'data-usecases="' + lib.usecases.join(' ') + '"',
      'data-tags="' + (lib.flagship ? 'flagship ' : '') + lib.tags.join(' ') + '"',
      'data-format="' + (lib.format || '') + '"',
      'data-slug="' + lib.slug + '"',
      'data-name="' + esc(lib.name) + '"',
      'data-tagline="' + esc(lib.tagline) + '"'
    ].join(' ');

    return '<a href="/shop/' + lib.slug + '" class="lib-card" ' + dataset + ' data-reveal>' +
      '<div class="lib-card__art">' +
        '<img class="lib-card__art-bg" src="' + lib.image + '" alt="" loading="lazy" style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;">' +
        badgeHTML(lib) +
        priceHTML(lib) +
        '<div class="cc-card-actions" aria-label="Card actions">' +
          '<button type="button" class="cc-card-action-btn" aria-label="Add ' + esc(lib.name) + ' to wishlist" data-action="wishlist" data-slug="' + lib.slug + '">' +
            '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>' +
          '</button>' +
          '<button type="button" class="cc-card-action-btn" aria-label="Add ' + esc(lib.name) + ' to cart" data-action="cart" data-slug="' + lib.slug + '">' +
            '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>' +
          '</button>' +
        '</div>' +
      '</div>' +
      '<div class="lib-card__body">' +
        '<div class="lib-card__meta">' +
          '<span>' + lib.familyLabel + '</span>' +
          '<span class="lib-card__meta-divider"></span>' +
          '<span class="lib-card__meta-region">' + lib.regionLabel + '</span>' +
        '</div>' +
        '<div class="cc-card-title-row">' +
          '<h3 class="lib-card__name">' + lib.name + '</h3>' +
        '</div>' +
        '<span class="cc-format-chip">' + formatChipLabel(lib.format) + '</span>' +
        '<span class="lib-card__artist">' + lib.artist + '</span>' +
      '</div>' +
    '</a>';
  }

  /* ═════════════════════════════════════
     POPULATE GRID
     ═════════════════════════════════════ */
  const fullGrid = document.getElementById('full-grid');
  const filterEmpty = document.getElementById('filter-empty');

  // Sort: newest first by default (presence of 'new' tag → top, then catalogue order)
  function sortCatalogue(mode) {
    const sorted = CATALOGUE.slice();
    switch(mode){
      case 'price-asc':  sorted.sort((a,b) => a.price - b.price); break;
      case 'price-desc': sorted.sort((a,b) => b.price - a.price); break;
      case 'name-asc':   sorted.sort((a,b) => a.name.localeCompare(b.name)); break;
      case 'newest':
      default:
        // 'new' tagged → top; flagships next; then natural order
        sorted.sort((a,b) => {
          const aN = a.tags.includes('new') ? 0 : 1;
          const bN = b.tags.includes('new') ? 0 : 1;
          if (aN !== bN) return aN - bN;
          if (a.flagship !== b.flagship) return a.flagship ? -1 : 1;
          return 0;
        });
    }
    return sorted;
  }

  function renderGrid(mode) {
    const sorted = sortCatalogue(mode || 'newest');
    // Hide grid during injection so the bare art-strips don't flash, then
    // fade the fully-built grid back in on the next frame (after layout settles).
    fullGrid.classList.add('is-loading');
    fullGrid.innerHTML = sorted.map(cardHTML).join('');
    // Wait for the injected cards to actually lay out + paint one frame before
    // fading in, so the art-gradient half never flashes ahead of the card body.
    requestAnimationFrame(function () {
      requestAnimationFrame(function () {
        // force layout read so the browser has measured the new cards
        void fullGrid.offsetHeight;
        requestAnimationFrame(function () { fullGrid.classList.remove('is-loading'); });
      });
    });
    // After re-render, attach reveal + tilt to new cards
    if (window.__revealIO) {
      fullGrid.querySelectorAll('[data-reveal]:not(.visible)').forEach(el => window.__revealIO.observe(el));
    } else {
      // First render: cards will be picked up by the main reveal observer below
      fullGrid.querySelectorAll('[data-reveal]').forEach(el => el.classList.add('visible'));
    }
    if (window.__attachTilt) window.__attachTilt(fullGrid);
  }
  renderGrid('newest');
  document.querySelector('#catalogue-count').textContent = CATALOGUE.length;




  /* ═════════════════════════════════════
     NAV — scroll solidify + mobile panel
     (extracted behavior, same as featured-libraries.html)
     ═════════════════════════════════════ */
  const nav = document.getElementById('cc-nav');
  const hamburger = nav && nav.querySelector('.cc-nav__hamburger');
  const panel = document.getElementById('cc-nav-mobile');
  let scrollTick = false;

  if (nav) {
    window.addEventListener('scroll', function(){
      if (scrollTick) return;
      scrollTick = true;
      requestAnimationFrame(function(){
        nav.classList.toggle('scrolled', window.scrollY > 80);
        scrollTick = false;
      });
    }, {passive: true});
  }

  if (hamburger && panel) {
    hamburger.addEventListener('click', function(){
      const open = panel.classList.toggle('open');
      hamburger.classList.toggle('open', open);
      hamburger.setAttribute('aria-expanded', open);
      document.body.style.overflow = open ? 'hidden' : '';
    });
    panel.querySelectorAll('a').forEach(function(a){
      a.addEventListener('click', function(){
        panel.classList.remove('open');
        hamburger.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });
  }

  /* ════════════════════════════
     NAV · Social dropdown (desktop)
     - Click toggles · click outside closes · Escape closes
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
    function closeAll(except) {
      pairs.forEach(function (p) { if (p !== except) setOpen(p, false); });
    }
    pairs.forEach(function (pair) {
      pair.trigger.addEventListener('click', function (e) {
        e.stopPropagation();
        var willOpen = !pair.dropdown.classList.contains('open');
        closeAll(pair);
        setOpen(pair, willOpen);
      });
      pair.dropdown.querySelectorAll('a').forEach(function (a) {
        a.addEventListener('click', function () { setOpen(pair, false); });
      });
    });
    document.addEventListener('click', function (e) {
      pairs.forEach(function (pair) {
        if (!pair.dropdown.contains(e.target) && !pair.trigger.contains(e.target)) {
          setOpen(pair, false);
        }
      });
    });
    document.addEventListener('keydown', function (e) {
      if (e.key !== 'Escape') return;
      pairs.forEach(function (pair) {
        if (pair.dropdown.classList.contains('open')) {
          setOpen(pair, false);
          pair.trigger.focus();
        }
      });
    });
  })();

  /* CC · cart/wishlist count stub — Laravel overrides getCounts() then calls refreshBadges(). */
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

  /* ═════════════════════════════════════
     V5 — TOOLBAR / FILTER PANEL / SEARCH / SORT / STICKY
     ═════════════════════════════════════ */
  const toolbarWrap = document.getElementById('toolbar');
  const filtersBtn  = document.getElementById('filters-btn');
  const filterPanel = document.getElementById('filter-panel');
  const filtersCount = document.getElementById('filters-count');
  const panelActiveCount = document.getElementById('panel-active-count');
  const panelPlural = document.getElementById('panel-plural');
  const panelClear  = document.getElementById('panel-clear');
  const panelApply  = document.getElementById('panel-apply');
  const statusClear = document.getElementById('status-clear');
  const activeChips = document.getElementById('active-chips');
  const catalogueCount = document.getElementById('catalogue-count');
  const searchInput = document.getElementById('search-input');
  const searchClear = document.getElementById('search-clear');
  const sortBtn     = document.getElementById('sort-btn');
  const sortMenu    = document.getElementById('sort-menu');
  const sortCurrent = document.getElementById('sort-current');

  const activeFilters = { family: [], tag: [], format: [] };
  let activeSort = 'newest';
  let activeQuery = '';

  /* ─────────────────────────────────────
     DYNAMIC FORMAT OPTIONS — driven by data
     Renders one option button per unique format found in CATALOGUE.
     Adding a new format value to a lib entry surfaces here automatically.
     ───────────────────────────────────── */
  (function renderFormatOptions () {
    const group = document.getElementById('format-filter-group');
    if (!group) return;
    const formats = Array.from(new Set(
      CATALOGUE.map(l => l.format).filter(Boolean)
    )).sort();
    const checkSvg = '<span class="lib-panel__option-check"><svg viewBox="0 0 24 24" fill="none" stroke="#0d1117" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>';
    const html = formats.map(f => {
      const label = (LABELS.format[f]) || f;
      return '<button class="lib-panel__option" data-axis="format" data-value="' + f + '">' + checkSvg + label + '</button>';
    }).join('');
    group.insertAdjacentHTML('beforeend', html);
  })();

  /* Toggle the filter panel open/closed.
     On mobile this is a fixed sheet; body.booking-locked engages the
     shared sitewide scroll-lock (polish.css) so the page behind holds. */
  let panelBackdrop = null;
  function ensureBackdrop() {
    if (panelBackdrop) return panelBackdrop;
    panelBackdrop = document.createElement('div');
    panelBackdrop.className = 'lib-panel__backdrop';
    panelBackdrop.addEventListener('click', closePanel);
    filterPanel.parentNode.insertBefore(panelBackdrop, filterPanel);
    return panelBackdrop;
  }
  function isSheet() { return window.matchMedia('(max-width: 768px)').matches; }
  function openPanel() {
    ensureBackdrop().classList.add('open');
    filterPanel.classList.add('open');
    filtersBtn.setAttribute('aria-expanded', 'true');
    filterPanel.setAttribute('aria-hidden', 'false');
    if (isSheet()) document.body.classList.add('booking-locked');
  }
  function closePanel() {
    if (panelBackdrop) panelBackdrop.classList.remove('open');
    filterPanel.classList.remove('open');
    filtersBtn.setAttribute('aria-expanded', 'false');
    filterPanel.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('booking-locked');
  }
  filtersBtn.addEventListener('click', () => {
    if (filterPanel.classList.contains('open')) closePanel(); else openPanel();
  });

  /* Sort dropdown */
  // Body-mount the sort menu so it escapes the toolbar's backdrop-filter
  // stacking context (cards were intercepting clicks on the lower options).
  function positionSortMenu() {
    const r = sortBtn.getBoundingClientRect();
    sortMenu.style.position = 'fixed';
    sortMenu.style.left = 'auto';
    sortMenu.style.right = (window.innerWidth - r.right) + 'px';
    // Flip up when there isn't enough room below the button.
    const menuH = sortMenu.offsetHeight || 220;   // measured once mounted; fallback est.
    const spaceBelow = window.innerHeight - r.bottom;
    if (spaceBelow < menuH + 16 && r.top > menuH + 16) {
      sortMenu.style.top = (r.top - menuH - 8) + 'px';   // open upward
    } else {
      sortMenu.style.top = (r.bottom + 8) + 'px';        // open downward
    }
  }
  function openSortMenu() {
    if (sortMenu.parentNode !== document.body) document.body.appendChild(sortMenu);
    sortMenu.classList.add('open');     // display first so offsetHeight is real
    positionSortMenu();                 // then measure + place (handles flip-up)
    sortBtn.setAttribute('aria-expanded', 'true');
  }
  function closeSortMenu() {
    sortMenu.classList.remove('open');
    sortBtn.setAttribute('aria-expanded', 'false');
  }
  sortBtn.addEventListener('click', e => {
    e.stopPropagation();
    if (sortMenu.classList.contains('open')) closeSortMenu(); else openSortMenu();
  });
  window.addEventListener('resize', () => { if (sortMenu.classList.contains('open')) positionSortMenu(); });
  window.addEventListener('scroll', () => { if (sortMenu.classList.contains('open')) positionSortMenu(); }, true);
  document.querySelectorAll('.lib-toolbar__sort-option').forEach(opt => {
    opt.addEventListener('click', () => {
      document.querySelectorAll('.lib-toolbar__sort-option').forEach(o => o.classList.remove('active'));
      opt.classList.add('active');
      activeSort = opt.dataset.sort;
      sortCurrent.textContent = opt.textContent;
      closeSortMenu();
      renderGrid(activeSort);
      applyFilters();
    });
  });
  document.addEventListener('click', e => {
    if (!e.target.closest('#sort-menu') && e.target !== sortBtn && !sortBtn.contains(e.target)) {
      closeSortMenu();
    }
  });

  /* Filter panel option toggle */
  document.querySelectorAll('.lib-panel__option').forEach(opt => {
    opt.addEventListener('click', () => {
      const axis = opt.dataset.axis;
      const value = opt.dataset.value;
      const arr = activeFilters[axis];
      const idx = arr.indexOf(value);
      if (idx > -1) { arr.splice(idx, 1); opt.classList.remove('active'); }
      else { arr.push(value); opt.classList.add('active'); }
      updateFilterUI();
      applyFilters();
    });
  });

  /* Clear / Done buttons inside panel */
  panelClear.addEventListener('click', () => {
    Object.keys(activeFilters).forEach(axis => activeFilters[axis] = []);
    document.querySelectorAll('.lib-panel__option').forEach(o => o.classList.remove('active'));
    updateFilterUI();
    applyFilters();
  });
  panelApply.addEventListener('click', () => {
    closePanel();
  });

  /* Status-row clear-all */
  statusClear.addEventListener('click', () => {
    Object.keys(activeFilters).forEach(axis => activeFilters[axis] = []);
    activeQuery = '';
    searchInput.value = '';
    searchClear.classList.remove('visible');
    document.querySelectorAll('.lib-panel__option').forEach(o => o.classList.remove('active'));
    updateFilterUI();
    applyFilters();
  });

  /* Search */
  searchInput.addEventListener('input', () => {
    activeQuery = searchInput.value.trim().toLowerCase();
    searchClear.classList.toggle('visible', activeQuery.length > 0);
    applyFilters();
  });
  searchClear.addEventListener('click', () => {
    searchInput.value = '';
    activeQuery = '';
    searchClear.classList.remove('visible');
    searchInput.focus();
    applyFilters();
  });

  /* Render active filter chips + counts */
  function updateFilterUI() {
    let total = 0;
    Object.keys(activeFilters).forEach(axis => total += activeFilters[axis].length);

    // Filters button badge
    if (total > 0) { filtersCount.textContent = total; filtersCount.hidden = false; }
    else { filtersCount.hidden = true; }

    // Panel summary
    panelActiveCount.textContent = total;
    panelPlural.textContent = total === 1 ? '' : 's';

    // Chip strip + clear-all
    const hasFilters = total > 0 || activeQuery.length > 0;
    statusClear.hidden = !hasFilters;
    activeChips.innerHTML = '';
    Object.keys(activeFilters).forEach(axis => {
      activeFilters[axis].forEach(value => {
        const label = (LABELS[axis] && LABELS[axis][value]) || value;
        const chip = document.createElement('span');
        chip.className = 'lib-status__chip';
        chip.innerHTML = label + '<button class="lib-status__chip-x" aria-label="Remove" data-axis="' + axis + '" data-value="' + value + '" type="button"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="6" y1="6" x2="18" y2="18"/><line x1="6" y1="18" x2="18" y2="6"/></svg></button>';
        activeChips.appendChild(chip);
      });
    });

    // Wire chip-x clicks
    activeChips.querySelectorAll('.lib-status__chip-x').forEach(x => {
      x.addEventListener('click', () => {
        const axis = x.dataset.axis;
        const value = x.dataset.value;
        const arr = activeFilters[axis];
        const idx = arr.indexOf(value);
        if (idx > -1) arr.splice(idx, 1);
        const opt = document.querySelector('.lib-panel__option[data-axis="' + axis + '"][data-value="' + value + '"]');
        if (opt) opt.classList.remove('active');
        updateFilterUI();
        applyFilters();
      });
    });
  }

  /* Filter logic — applies search + axes */
  function applyFilters() {
    const cards = fullGrid.querySelectorAll('.lib-card');
    let visible = 0;

    cards.forEach(card => {
      const cardFamily = card.dataset.family;
      const cardRegion = card.dataset.region;
      const cardMoods = (card.dataset.moods || '').split(' ');
      const cardUsecases = (card.dataset.usecases || '').split(' ');
      const cardTags = (card.dataset.tags || '').split(' ');
      const cardFormat = card.dataset.format || '';
      const cardName = (card.dataset.name || '').toLowerCase();
      const cardTagline = (card.dataset.tagline || '').toLowerCase();

      let pass = true;
      if (activeFilters.family.length && !activeFilters.family.includes(cardFamily)) pass = false;
      if (activeFilters.tag.length && !activeFilters.tag.some(t => cardTags.includes(t))) pass = false;
      if (activeFilters.format.length && !activeFilters.format.includes(cardFormat)) pass = false;
      if (activeQuery && !cardName.includes(activeQuery) && !cardTagline.includes(activeQuery)) pass = false;

      card.classList.toggle('is-hidden', !pass);
      if (pass) visible++;
    });

    catalogueCount.textContent = visible;
    filterEmpty.hidden = visible !== 0;
  }

  /* Toolbar docking · when the toolbar's natural position scrolls above the
     menu bar, float it at the bottom (fade in). Scroll back up → fade out and
     return to flow. Desktop only — mobile keeps sticky (handled in CSS). */
  // Placeholder keeps the toolbar's space in flow while it's docked (no jump).
  const toolbarPlaceholder = document.createElement('div');
  toolbarPlaceholder.setAttribute('aria-hidden', 'true');
  toolbarPlaceholder.style.display = 'none';
  toolbarWrap.parentNode.insertBefore(toolbarPlaceholder, toolbarWrap.nextSibling);

  let toolbarStuckThreshold = 0;
  function recalcStickyThreshold() {
    const navOffset = 5.5 * 16; // 5.5rem in px
    // Anchor on the placeholder if it's holding space (docked); else the wrap.
    const anchor = (toolbarPlaceholder.style.display !== 'none')
      ? toolbarPlaceholder : toolbarWrap;
    toolbarStuckThreshold = anchor.getBoundingClientRect().top + window.scrollY - navOffset;
  }
  const isDesktop = () => window.matchMedia('(min-width: 769px)').matches;
  const faqSection = document.getElementById('shop-faq');
  recalcStickyThreshold();
  window.addEventListener('resize', recalcStickyThreshold, { passive: true });

  let stickyTicking = false;
  function checkSticky() {
    if (isDesktop()) {
      recalcStickyThreshold();   // keep threshold fresh (placeholder vs wrap)
      const pastToolbar = window.scrollY >= toolbarStuckThreshold - 2;
      // Lower bound: once the FAQ section scrolls up to roughly where the docked
      // bar floats, hide the bar so it doesn't hover over the FAQ.
      let beforeFaq = true;
      if (faqSection) {
        const faqTop = faqSection.getBoundingClientRect().top;
        // bar floats ~1.5rem from the bottom and is ~70px tall → its top edge is
        // ~ (viewportH - 24 - 70). Fade out once FAQ rises above that line.
        const barLine = window.innerHeight - (24 + 80);
        beforeFaq = faqTop > barLine;
      }
      const shouldDock = pastToolbar && beforeFaq;
      const docked = toolbarWrap.classList.contains('is-docked');
      if (shouldDock && !docked) {
        toolbarPlaceholder.style.height = toolbarWrap.offsetHeight + 'px';
        toolbarPlaceholder.style.display = 'block';
        toolbarWrap.classList.remove('is-docking-out');
        toolbarWrap.classList.add('is-docked');
      } else if (!shouldDock && docked) {
        toolbarWrap.classList.add('is-docking-out');
        toolbarWrap.classList.remove('is-docked');
        toolbarPlaceholder.style.display = 'none';   // return space immediately
        setTimeout(() => {
          if (!toolbarWrap.classList.contains('is-docked')) {
            toolbarWrap.classList.remove('is-docking-out');
          }
        }, 340);
      }
    } else {
      toolbarWrap.classList.remove('is-docked', 'is-docking-out');
      toolbarPlaceholder.style.display = 'none';
    }
    stickyTicking = false;
  }
  window.addEventListener('scroll', () => {
    if (!stickyTicking) {
      requestAnimationFrame(checkSticky);
      stickyTicking = true;
    }
  }, { passive: true });
  checkSticky();

  /* First-scroll attention pulse on Filters button */
  let pulseTriggered = false;
  const pulseIO = new IntersectionObserver(entries => {
    if (entries[0].isIntersecting && !pulseTriggered) {
      pulseTriggered = true;
      filtersBtn.classList.add('pulse');
      setTimeout(() => filtersBtn.classList.remove('pulse'), 3000);
    }
  }, { threshold: 0.6 });
  pulseIO.observe(toolbarWrap);


  /* ═════════════════════════════════════
     SCROLL REVEAL + 3D TILT
     ═════════════════════════════════════ */
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const supportsHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

  // 3D tilt attach helper (used at init + after sort re-render)
  function attachTilt(scope) {
    if (prefersReduced || !supportsHover) return;
    const cards = (scope || document).querySelectorAll('.lib-card');
    cards.forEach(card => {
      if (card.__tiltAttached) return;
      card.__tiltAttached = true;
      card.addEventListener('mousemove', e => {
        const r = card.getBoundingClientRect();
        const x = (e.clientX - r.left) / r.width - 0.5;
        const y = (e.clientY - r.top) / r.height - 0.5;
        card.style.transform = 'perspective(900px) rotateX(' + (-y * 4) + 'deg) rotateY(' + (x * 4) + 'deg) translateY(-3px)';
      });
      card.addEventListener('mouseleave', () => { card.style.transform = ''; });
    });
    const hero = (scope || document).querySelector('[data-bundle-tilt]');
    if (hero && !hero.__tiltAttached) {
      hero.__tiltAttached = true;
      hero.addEventListener('mousemove', e => {
        const r = hero.getBoundingClientRect();
        const x = (e.clientX - r.left) / r.width - 0.5;
        const y = (e.clientY - r.top) / r.height - 0.5;
        hero.style.transform = 'perspective(1100px) rotateX(' + (-y * 3) + 'deg) rotateY(' + (x * 3) + 'deg)';
      });
      hero.addEventListener('mouseleave', () => { hero.style.transform = ''; });
    }
  }
  window.__attachTilt = attachTilt;

  if (prefersReduced) {
    document.querySelectorAll('[data-reveal]').forEach(el => el.classList.add('visible'));
  } else {
    const revealIO = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          revealIO.unobserve(entry.target);
        }
      });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
    window.__revealIO = revealIO;

    document.querySelectorAll('[data-reveal]').forEach(el => revealIO.observe(el));

    // Fallback after 1.5s
    setTimeout(() => {
      document.querySelectorAll('[data-reveal]:not(.visible)').forEach(el => el.classList.add('visible'));
    }, 1500);

    // Initial tilt attach
    attachTilt(document);
  }

})();
</script>


<!-- Footer scripts (extracted from footer.html) -->


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
        card: btn.closest('.lib-card')
      }
    }));
  }, true);
})();
</script>



@endverbatim

