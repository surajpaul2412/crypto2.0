<script>
(function () {
  /* ═════════════════════════════════════
     NAV — scroll solidify + mobile panel + dropdowns
     (same behavior as every other page's nav script)
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

  // On this page every wishlist heart click is a removal. Listen for the
  // click, then once wishlist-actions.js confirms the removal via its
  // cc:wishlist-updated event, animate the card out and drop it from the DOM.
  document.addEventListener('click', function (e) {
    var btn = e.target.closest('#wishlist-grid [data-action="wishlist"]');
    if (!btn) return;

    var card = btn.closest('.rec-card');
    if (!card) return;

    var onUpdate = function (ev) {
      document.removeEventListener('cc:wishlist-updated', onUpdate);
      if (!ev.detail || ev.detail.inWishlist !== false) return;

      card.classList.add('is-removing');
      setTimeout(function () {
        card.remove();
        var remaining = document.querySelectorAll('#wishlist-grid .rec-card').length;
        if (remaining === 0) {
          window.location.reload();
          return;
        }
        var countEl = document.getElementById('wishlist-count');
        if (countEl) countEl.textContent = remaining + (remaining === 1 ? ' item saved' : ' items saved');
      }, 320);
    };
    document.addEventListener('cc:wishlist-updated', onUpdate);
  }, true); // capture phase, registered before wishlist-actions.js's own
            // capture listener runs (this partial loads first in the DOM) —
            // that handler calls stopImmediatePropagation() on wishlist
            // clicks, which would otherwise stop this listener from ever
            // seeing the click if it were bubble-phase.
})();
</script>
