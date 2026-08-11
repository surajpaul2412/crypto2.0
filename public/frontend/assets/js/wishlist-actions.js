/* ═══════════════════════════════════════════════════════════════
   WISHLIST ACTIONS — shared, site-wide.
   Owns every [data-action="wishlist"][data-slug] button: syncs its
   active state from window.__WISHLIST_SLUGS__ (server-rendered),
   persists add/remove to /wishlist/add|remove/{slug} via fetch, and
   keeps [data-wishlist-count] badges + newly-rendered cards in sync.
   ═══════════════════════════════════════════════════════════════ */
(function () {
  window.__WISHLIST_SLUGS__ = window.__WISHLIST_SLUGS__ || [];

  function csrfToken() {
    var meta = document.querySelector('meta[name="csrf-token"]');
    return meta ? meta.getAttribute('content') : '';
  }

  function isInWishlist(slug) {
    return window.__WISHLIST_SLUGS__.indexOf(slug) !== -1;
  }

  function syncButton(btn) {
    var slug = btn.getAttribute('data-slug');
    if (!slug) return;
    var active = isInWishlist(slug);
    btn.classList.toggle('is-active', active);
    btn.classList.toggle('active', active);
    btn.setAttribute('aria-pressed', active ? 'true' : 'false');
    var label = btn.querySelector('[data-wishlist-label]');
    if (label) label.textContent = active ? 'Saved' : 'Save for later';
  }

  function syncAll(root) {
    (root || document).querySelectorAll('[data-action="wishlist"][data-slug]').forEach(syncButton);
  }

  function updateBadges(count) {
    document.querySelectorAll('[data-wishlist-count]').forEach(function (el) {
      el.textContent = count;
      el.hidden = !(count > 0);
    });
  }

  function toggleWishlist(btn) {
    var slug = btn.getAttribute('data-slug');
    if (!slug || btn.disabled) return;

    var wasIn = isInWishlist(slug);
    var templates = window.__WISHLIST_URLS__ || { add: '/wishlist/add/__SLUG__', remove: '/wishlist/remove/__SLUG__' };
    var url = templates[wasIn ? 'remove' : 'add'].replace('__SLUG__', encodeURIComponent(slug));

    btn.disabled = true;
    fetch(url, {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': csrfToken(),
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json',
      },
    })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        var slugs = window.__WISHLIST_SLUGS__;
        var idx = slugs.indexOf(slug);
        if (data.inWishlist && idx === -1) slugs.push(slug);
        if (!data.inWishlist && idx !== -1) slugs.splice(idx, 1);

        document.querySelectorAll('[data-action="wishlist"][data-slug="' + slug + '"]').forEach(syncButton);
        if (typeof data.wishlistCount === 'number') updateBadges(data.wishlistCount);
        document.dispatchEvent(new CustomEvent('cc:wishlist-updated', { detail: data }));
      })
      .catch(function () {})
      .finally(function () { btn.disabled = false; });
  }

  // Capture phase + stopImmediatePropagation so the older generic
  // "card actions" toggle-only handler (cart + wishlist, per-page)
  // never double-handles a wishlist click. Cart clicks pass through.
  document.addEventListener('click', function (e) {
    var btn = e.target.closest('[data-action="wishlist"][data-slug]');
    if (!btn) return;
    e.preventDefault();
    e.stopImmediatePropagation();
    toggleWishlist(btn);
  }, true);

  function ready(fn) {
    if (document.readyState !== 'loading') fn();
    else document.addEventListener('DOMContentLoaded', fn);
  }

  ready(function () {
    syncAll();
    updateBadges(window.__WISHLIST_SLUGS__.length);
    // Shop grid (and similar) render product cards client-side after
    // this script runs — keep newly-added wishlist buttons in sync.
    new MutationObserver(function (mutations) {
      mutations.forEach(function (m) {
        m.addedNodes.forEach(function (node) {
          if (node.nodeType !== 1) return;
          if (node.matches && node.matches('[data-action="wishlist"][data-slug]')) syncButton(node);
          if (node.querySelectorAll) syncAll(node);
        });
      });
    }).observe(document.body, { childList: true, subtree: true });
  });
})();
