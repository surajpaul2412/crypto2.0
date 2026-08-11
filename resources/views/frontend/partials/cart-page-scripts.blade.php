<script>
(function () {
  /* ═════════════════════════════════════
     NAV — scroll solidify + mobile panel + dropdowns
     ═════════════════════════════════════ */
  var nav = document.getElementById('cc-nav');
  var hamburger = nav && nav.querySelector('.cc-nav__hamburger');
  var panel = document.getElementById('cc-nav-mobile');
  var scrollTick = false;

  if (nav) {
    window.addEventListener('scroll', function () {
      if (scrollTick) return;
      scrollTick = true;
      requestAnimationFrame(function () {
        nav.classList.toggle('scrolled', window.scrollY > 80);
        scrollTick = false;
      });
    }, { passive: true });
  }

  if (hamburger && panel) {
    hamburger.addEventListener('click', function () {
      var open = panel.classList.toggle('open');
      hamburger.classList.toggle('open', open);
      hamburger.setAttribute('aria-expanded', open);
      document.body.style.overflow = open ? 'hidden' : '';
    });
    panel.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () {
        panel.classList.remove('open');
        hamburger.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });
  }

  (function initNavDropdowns() {
    var pairs = [
      ['.cc-nav__link--social', 'cc-nav-social-dropdown'],
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

  /* ═════════════════════════════════════
     CART — quantity stepper + remove, live totals
     ═════════════════════════════════════ */
  function csrfToken() {
    var meta = document.querySelector('meta[name="csrf-token"]');
    return meta ? meta.getAttribute('content') : '';
  }
  function money(n) {
    return '$' + Number(n).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
  }
  function updateUrl(slug) {
    var tpl = (window.__CART_URLS__ && window.__CART_URLS__.update) || '/cart/update/__SLUG__';
    return tpl.replace('__SLUG__', encodeURIComponent(slug));
  }
  function removeUrl(slug) {
    var tpl = (window.__CART_URLS__ && window.__CART_URLS__.remove) || '/cart/remove/__SLUG__';
    return tpl.replace('__SLUG__', encodeURIComponent(slug));
  }
  function refreshSummary(subtotal) {
    var subtotalEl = document.getElementById('cart-subtotal-display');
    var totalEl = document.getElementById('cart-total-display');
    if (subtotalEl) subtotalEl.textContent = money(subtotal);
    if (totalEl) totalEl.textContent = money(subtotal);
  }
  function refreshItemCountLabel() {
    var label = document.getElementById('cart-item-count-label');
    var remaining = document.querySelectorAll('#cart-list .cart-item').length;
    if (label) label.textContent = remaining + (remaining === 1 ? ' item' : ' items');
  }

  var list = document.getElementById('cart-list');
  if (!list) return;

  function setQty(row, qty) {
    var slug = row.getAttribute('data-slug');
    var unitPrice = parseFloat(row.getAttribute('data-unit-price')) || 0;
    var input = row.querySelector('[data-qty-input]');
    qty = Math.max(1, Math.min(99, qty));
    if (input) input.value = qty;

    fetch(updateUrl(slug), {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': csrfToken(),
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json',
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ quantity: qty }),
    })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        if (!data.ok) return;
        var lineTotalEl = row.querySelector('[data-line-total]');
        if (lineTotalEl) lineTotalEl.textContent = data.lineTotalDisplay || money(unitPrice * qty);
        refreshSummary(data.subtotal != null ? data.subtotal : 0);
        if (typeof data.cartCount === 'number') {
          document.querySelectorAll('[data-cart-count], [data-cart-total]').forEach(function (el) {
            el.textContent = data.cartCount;
            el.hidden = !(data.cartCount > 0);
          });
        }
      })
      .catch(function () {});
  }

  list.addEventListener('click', function (e) {
    var incBtn = e.target.closest('[data-qty-increase]');
    var decBtn = e.target.closest('[data-qty-decrease]');
    var removeBtn = e.target.closest('[data-cart-remove]');

    if (incBtn || decBtn) {
      var row = (incBtn || decBtn).closest('.cart-item');
      var input = row.querySelector('[data-qty-input]');
      var current = parseInt(input.value, 10) || 1;
      setQty(row, incBtn ? current + 1 : current - 1);
      return;
    }

    if (removeBtn) {
      var removeRow = removeBtn.closest('.cart-item');
      var slug = removeRow.getAttribute('data-slug');

      fetch(removeUrl(slug), {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': csrfToken(),
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'application/json',
        },
      })
        .then(function (res) { return res.json(); })
        .then(function (data) {
          removeRow.classList.add('is-removing');
          setTimeout(function () {
            removeRow.remove();
            var remaining = document.querySelectorAll('#cart-list .cart-item').length;
            if (remaining === 0) {
              window.location.reload();
              return;
            }
            refreshItemCountLabel();
            refreshSummary(data.subtotal != null ? data.subtotal : 0);
          }, 320);
          if (typeof data.cartCount === 'number') {
            document.querySelectorAll('[data-cart-count], [data-cart-total]').forEach(function (el) {
              el.textContent = data.cartCount;
              el.hidden = !(data.cartCount > 0);
            });
          }
        })
        .catch(function () {});
    }
  });

  list.addEventListener('change', function (e) {
    var input = e.target.closest('[data-qty-input]');
    if (!input) return;
    var row = input.closest('.cart-item');
    setQty(row, parseInt(input.value, 10) || 1);
  });
})();
</script>
