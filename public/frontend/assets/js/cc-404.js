/* ═══ 404 page — auto-suggest + site search ═══
   Ported from static-site/06_404.html. The original hardcoded a fake
   product catalogue with /instruments/* URLs that don't exist in this
   app — those are replaced with real route()-generated URLs, injected
   server-side as `window.CC404_INDEX` by errors/404.blade.php, so this
   file stays pure logic (no route data baked into a cached JS asset). */
(function () {
  'use strict';

  var INDEX = window.CC404_INDEX || [];

  var STOP_WORDS = new Set(['a','an','the','to','of','for','in','on','at','by','and','or','with','it','is','this','that','php','html','htm','asp','aspx','jsp','index','page','default','main','file','files','docs','doc','wp','wp-content','wp-admin','category','cat','tag','tags','post','posts','article','articles','product','products','item','items','www','com','net','co','org']);

  function extractKeywords(path) {
    if (!path) return [];
    var clean = path.toLowerCase()
      .replace(/^https?:\/\/[^/]+/, '')
      .replace(/\.(php|html|htm|asp|aspx|jsp)$/i, '')
      .replace(/[?#].*$/, '')
      .replace(/[/_\-.+%]/g, ' ')
      .replace(/[^a-z0-9 ]/g, ' ')
      .replace(/\s+/g, ' ').trim();
    return clean.split(' ').filter(function (w) { return w.length >= 2 && !STOP_WORDS.has(w); });
  }

  function scoreMatch(item, keywords) {
    if (!keywords.length) return 0;
    var score = 0;
    var itemKws = (item.keywords || []).map(function (k) { return k.toLowerCase(); });
    var nameTokens = item.name.toLowerCase().split(/\s+/);
    keywords.forEach(function (kw) {
      if (itemKws.indexOf(kw) !== -1) score += 5;
      if (nameTokens.indexOf(kw) !== -1) score += 3;
      itemKws.forEach(function (ik) {
        if (kw.length >= 4 && ik.length >= 4 && (ik.indexOf(kw) !== -1 || kw.indexOf(ik) !== -1)) score += 1;
      });
    });
    return score;
  }

  function topMatches(keywords, limit) {
    if (!keywords.length) return [];
    return INDEX
      .map(function (item) { return { item: item, score: scoreMatch(item, keywords) }; })
      .filter(function (m) { return m.score >= 3; })
      .sort(function (a, b) { return b.score - a.score; })
      .slice(0, limit || 3)
      .map(function (m) { return m.item; });
  }

  /* Hero: show broken URL */
  var brokenPath = window.location.pathname + window.location.search;
  if (brokenPath === '/' || /\/404\/?$/.test(brokenPath)) brokenPath = '';
  var brokenEl = document.getElementById('brokenUrl');
  var brokenPathEl = document.getElementById('brokenUrlPath');
  if (brokenPath && brokenEl && brokenPathEl) {
    brokenPathEl.textContent = brokenPath.length > 80 ? brokenPath.slice(0, 77) + '…' : brokenPath;
  } else if (brokenEl) {
    brokenEl.style.display = 'none';
  }

  /* Layer 1: auto-suggest */
  var keywords = extractKeywords(brokenPath);
  var suggestions = topMatches(keywords, 3);
  var suggestGrid = document.getElementById('suggestGrid');
  var suggestSub = document.getElementById('suggestSub');
  var layerSuggest = document.getElementById('layerSuggest');
  var TILE_GRADIENTS = [
    'linear-gradient(135deg, #1a2540 0%, #3a4060 100%)',
    'linear-gradient(135deg, #2a1a35 0%, #4a3060 100%)',
    'linear-gradient(135deg, #1a3a3a 0%, #305060 100%)'
  ];
  if (suggestions.length && suggestGrid) {
    if (suggestSub) suggestSub.textContent = 'Best matches from "' + brokenPath.slice(0, 40) + (brokenPath.length > 40 ? '…' : '') + '"';
    suggestions.forEach(function (item, i) {
      var card = document.createElement('a');
      card.href = item.url;
      card.className = 'suggest__card';
      if (/^https?:/i.test(item.url)) { card.target = '_blank'; card.rel = 'noopener noreferrer'; }
      card.innerHTML =
        '<div class="suggest__thumb" style="background:' + TILE_GRADIENTS[i % TILE_GRADIENTS.length] + '" aria-hidden="true"></div>' +
        '<div class="suggest__info"><span class="suggest__type">' + item.type + '</span><span class="suggest__name">' + item.name + '</span></div>' +
        '<svg class="suggest__arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:14px;height:14px"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>';
      suggestGrid.appendChild(card);
    });
  } else if (layerSuggest) {
    layerSuggest.style.display = 'none';
  }

  /* Layer 3: search + browse */
  var searchInput = document.getElementById('searchInput');
  var searchResults = document.getElementById('searchResults');
  function escapeHtml(s) {
    return s.replace(/[&<>"']/g, function (c) {
      return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
    });
  }
  function runSearch(query) {
    if (!searchResults) return;
    var kws = extractKeywords(query);
    if (!kws.length) {
      searchResults.classList.remove('active');
      searchResults.innerHTML = '';
      return;
    }
    var matches = INDEX
      .map(function (item) { return { item: item, score: scoreMatch(item, kws) }; })
      .filter(function (m) { return m.score >= 1; })
      .sort(function (a, b) { return b.score - a.score; })
      .slice(0, 6)
      .map(function (m) { return m.item; });
    searchResults.classList.add('active');
    if (!matches.length) {
      searchResults.innerHTML = '<div class="search-empty">No matches for "' + escapeHtml(query) + '". Try broader words like "shop", "recording", or "heritage".</div>';
      return;
    }
    searchResults.innerHTML = matches.map(function (item) {
      var ext = /^https?:/i.test(item.url) ? ' target="_blank" rel="noopener noreferrer"' : '';
      return '<a href="' + item.url + '" class="search-result"' + ext + '><span class="search-result-type">' + item.type + '</span><span>' + item.name + '</span></a>';
    }).join('');
  }
  var searchDebounce;
  if (searchInput) {
    searchInput.addEventListener('input', function () {
      clearTimeout(searchDebounce);
      var q = this.value.trim();
      searchDebounce = setTimeout(function () { runSearch(q); }, 120);
    });
  }

  /* Browse grid — all real sections as a fallback visual grid */
  var browseGrid = document.getElementById('browseGrid');
  if (browseGrid) {
    INDEX.forEach(function (item) {
      var tile = document.createElement('a');
      tile.href = item.url;
      tile.className = 'browse-tile';
      if (/^https?:/i.test(item.url)) { tile.target = '_blank'; tile.rel = 'noopener noreferrer'; }
      tile.innerHTML = '<span>' + item.name + '</span><span class="browse-tile__arrow" aria-hidden="true">→</span>';
      browseGrid.appendChild(tile);
    });
  }

})();
