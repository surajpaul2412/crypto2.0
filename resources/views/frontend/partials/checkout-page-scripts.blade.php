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
     CHECKOUT — payment method selection + submit guard
     ═════════════════════════════════════ */
  var methodsWrap = document.getElementById('payment-methods');
  if (methodsWrap) {
    var options = methodsWrap.querySelectorAll('[data-payment-method]');
    options.forEach(function (label) {
      var input = label.querySelector('input[type="radio"]');
      label.addEventListener('click', function () {
        options.forEach(function (l) { l.classList.remove('is-selected'); });
        label.classList.add('is-selected');
      });
      input.addEventListener('change', function () {
        options.forEach(function (l) { l.classList.remove('is-selected'); });
        label.classList.add('is-selected');
      });
    });
  }

  var form = document.getElementById('checkout-form');
  var submitBtn = document.getElementById('checkout-submit-btn');
  if (form && submitBtn) {
    form.addEventListener('submit', function () {
      submitBtn.disabled = true;
      var label = submitBtn.querySelector('span');
      if (label) label.textContent = 'Placing order…';
    });
  }
})();
</script>
