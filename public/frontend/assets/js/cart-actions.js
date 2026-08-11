/* ═══════════════════════════════════════════════════════════════
   CART ACTIONS — shared, site-wide.
   Owns every [data-action="cart"][data-slug] button (add, stays on
   page) and [data-action="buy-now"][data-slug] button (add, then
   goes straight to checkout). Persists via /cart/add/{slug} and
   keeps [data-cart-count]/[data-cart-total] badges in sync.
   ═══════════════════════════════════════════════════════════════ */
(function () {
  window.__CART_COUNT__ = window.__CART_COUNT__ || 0;

  function csrfToken() {
    var meta = document.querySelector('meta[name="csrf-token"]');
    return meta ? meta.getAttribute('content') : '';
  }

  function updateBadges(count) {
    document.querySelectorAll('[data-cart-count], [data-cart-total]').forEach(function (el) {
      el.textContent = count;
      el.hidden = !(count > 0);
    });
  }

  function addUrl(slug) {
    var tpl = (window.__CART_URLS__ && window.__CART_URLS__.add) || '/cart/add/__SLUG__';
    return tpl.replace('__SLUG__', encodeURIComponent(slug));
  }

  function addToCart(btn, redirectAfter) {
    var slug = btn.getAttribute('data-slug');
    if (!slug || btn.disabled) return;

    var label = btn.querySelector('[data-cart-label]');
    var originalLabel = label ? label.textContent : null;

    btn.disabled = true;
    btn.classList.add('is-loading');
    if (label) label.textContent = redirectAfter ? 'Adding…' : 'Added ✓';

    fetch(addUrl(slug), {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': csrfToken(),
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json',
      },
    })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        if (typeof data.cartCount === 'number') {
          window.__CART_COUNT__ = data.cartCount;
          updateBadges(data.cartCount);
        }
        document.dispatchEvent(new CustomEvent('cc:cart-updated', { detail: data }));

        if (redirectAfter) {
          window.location.href = redirectAfter;
          return;
        }

        btn.classList.remove('is-loading');
        btn.classList.add('is-added');
        document.querySelectorAll('[data-action="cart"][data-slug="' + slug + '"]').forEach(function (b) {
          b.classList.add('is-added');
        });
        setTimeout(function () {
          btn.classList.remove('is-added');
          btn.disabled = false;
          if (label && originalLabel) label.textContent = originalLabel;
          document.querySelectorAll('[data-action="cart"][data-slug="' + slug + '"]').forEach(function (b) {
            b.classList.remove('is-added');
          });
        }, 1600);
      })
      .catch(function () {
        btn.classList.remove('is-loading');
        btn.disabled = false;
        if (label && originalLabel) label.textContent = originalLabel;
      });
  }

  document.addEventListener('click', function (e) {
    var buyBtn = e.target.closest('[data-action="buy-now"][data-slug]');
    if (buyBtn) {
      e.preventDefault();
      e.stopImmediatePropagation();
      var checkoutUrl = (window.__CART_URLS__ && window.__CART_URLS__.checkout) || '/checkout';
      addToCart(buyBtn, checkoutUrl);
      return;
    }
    var cartBtn = e.target.closest('[data-action="cart"][data-slug]');
    if (cartBtn) {
      e.preventDefault();
      e.stopImmediatePropagation();
      addToCart(cartBtn, null);
    }
  }, true);

  function ready(fn) {
    if (document.readyState !== 'loading') fn();
    else document.addEventListener('DOMContentLoaded', fn);
  }

  ready(function () {
    updateBadges(window.__CART_COUNT__);
  });
})();
