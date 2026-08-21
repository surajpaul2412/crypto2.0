@verbatim


<!-- ─── JSON-LD: Svantra brand schema · upcoming Crypto Cipher property ─── -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Brand",
  "name": "Svantra",
  "url": "https://svantra.in",
  "description": "A new chapter in Indian sonic discovery. Built by Crypto Cipher. Currently in development.",
  "parentOrganization": {
    "@type": "Organization",
    "name": "Crypto Cipher Audio Lab",
    "url": "https://cryptocipher.in"
  }
}
</script>
<!-- ═══ END FOOTER-001 ═══ -->


<script>

(function () {
  'use strict';

  /* ── Reduced motion: show everything instantly ── */
  var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (prefersReduced) {
    document.querySelectorAll('#featured-libraries [data-libs-animate]').forEach(function (el) {
      el.style.opacity = '1';
      el.style.transform = 'none';
    });
  }

  /* ══════════════════════════════════════
     ICON BUTTONS — heart + cart toggle
     ══════════════════════════════════════ */
  document.querySelectorAll('#featured-libraries .libs__icon-btn').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      btn.classList.toggle('is-active');

      var card = btn.closest('.libs__card');
      var action = btn.dataset.action;
      var libName = card ? card.querySelector('.libs__card-name').textContent.trim() : '';
      var ev = new CustomEvent('libs:icon-toggle', {
        bubbles: true,
        detail: { action: action, library: libName, active: btn.classList.contains('is-active') }
      });
      btn.dispatchEvent(ev);
    });
  });

  /* ══════════════════════════════════════
     DRAG-TO-SCROLL CAROUSEL (desktop)
     Mobile uses native touch swipe.
     ══════════════════════════════════════ */
  var track = document.getElementById('libs-grid');
  if (track) {
    var dragging = false, sx = 0, sl = 0, dragMoved = 0;
    track.addEventListener('mousedown', function (e) {
      dragging = true;
      dragMoved = 0;
      sx = e.pageX - track.offsetLeft;
      sl = track.scrollLeft;
      track.style.cursor = 'grabbing';
    });
    track.addEventListener('mouseleave', function () {
      dragging = false;
      track.style.cursor = 'grab';
    });
    track.addEventListener('mouseup', function () {
      dragging = false;
      track.style.cursor = 'grab';
    });
    track.addEventListener('mousemove', function (e) {
      if (!dragging) return;
      e.preventDefault();
      var delta = (e.pageX - track.offsetLeft - sx);
      dragMoved = Math.max(dragMoved, Math.abs(delta));
      track.scrollLeft = sl - delta * 1.2;
    });
    /* Cards are real <a> links now (click-through to the product page) —
       a drag gesture that moved the track shouldn't also fire the click
       on whatever card the cursor lands on at mouseup. Capture phase so
       this runs before the link's own navigation. */
    track.addEventListener('click', function (e) {
      if (dragMoved > 6) {
        e.preventDefault();
        e.stopPropagation();
      }
      dragMoved = 0;
    }, true);
  }

  /* ══════════════════════════════════════
     GSAP — only if loaded and motion allowed
     ══════════════════════════════════════ */
  function runEntrance() {
    if (typeof ScrollTrigger !== 'undefined') gsap.registerPlugin(ScrollTrigger);

    var ease = 'power4.out';

    /* Section header — staggered reveal */
    var headerTL = gsap.timeline({
      scrollTrigger: typeof ScrollTrigger !== 'undefined' ? {
        trigger: '#featured-libraries .libs__header',
        start: 'top 85%',
        once: true
      } : null
    });

    headerTL
      .to('#featured-libraries .libs__eyebrow',  { opacity: 1, y: 0, duration: 0.9, ease: ease })
      .to('#featured-libraries .libs__title',    { opacity: 1, y: 0, duration: 1.0, ease: ease }, '-=0.65')
      .to('#featured-libraries .libs__subtitle', { opacity: 1, y: 0, duration: 0.85, ease: ease }, '-=0.6');

    /* Cards — batch reveal as they scroll into view */
    var cards = gsap.utils.toArray('#featured-libraries .libs__card');

    if (typeof ScrollTrigger !== 'undefined') {
      ScrollTrigger.batch(cards, {
        start: 'top 90%',
        once: true,
        onEnter: function (batch) {
          gsap.to(batch, {
            opacity: 1,
            y: 0,
            duration: 0.9,
            stagger: 0.06,
            ease: ease,
            overwrite: true
          });
        }
      });
    } else {
      gsap.to(cards, { opacity: 1, y: 0, duration: 0.9, stagger: 0.06, ease: ease });
    }

    /* Footer CTA reveal */
    if (typeof ScrollTrigger !== 'undefined') {
      gsap.to('#featured-libraries .libs__view-all', {
        opacity: 1, y: 0, duration: 0.8, ease: ease,
        scrollTrigger: { trigger: '#featured-libraries .libs__view-all', start: 'top 92%', once: true }
      });
    } else {
      gsap.to('#featured-libraries .libs__view-all', { opacity: 1, y: 0, duration: 0.8, ease: ease, delay: 0.4 });
    }
  }

  function bootFeaturedLibrariesMotion(attempt) {
    if (prefersReduced) return;

    if (typeof window.gsap === 'undefined') {
      if ((attempt || 0) < 80) {
        window.setTimeout(function () {
          bootFeaturedLibrariesMotion((attempt || 0) + 1);
        }, 50);
      }
      return;
    }

    document.body.classList.add('js-libs-ready');
    runEntrance();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () {
      bootFeaturedLibrariesMotion(0);
    });
  } else {
    bootFeaturedLibrariesMotion(0);
  }
})();

</script>


<!-- ═══ NAV behavior ═══ -->
<script>

/* ═══════════════════════════════════════════════════════════════
   CRYPTO CIPHER® · COMPONENT JS · v1.0
   Floating nav · sidenav drawer · footer accordion · reveal observer
   Wrap in IIFE so multiple page scripts can coexist.
   ═══════════════════════════════════════════════════════════════ */
(function(){
  'use strict';

  /* ════════════════════════════
     NAV · scroll + hamburger
     ════════════════════════════ */
  const nav = document.getElementById('cc-nav');
  const hamburger = nav && nav.querySelector('.cc-nav__hamburger');
  const mobilePanel = document.getElementById('cc-nav-mobile');
  let scrollTick = false;

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
    hamburger.addEventListener('click', () => {
      const open = mobilePanel.classList.toggle('open');
      hamburger.classList.toggle('open', open);
      hamburger.setAttribute('aria-expanded', open);
      document.body.style.overflow = open ? 'hidden' : '';
    });
    mobilePanel.querySelectorAll('a').forEach(a => {
      a.addEventListener('click', () => {
        mobilePanel.classList.remove('open');
        hamburger.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });
  }

  /* ════════════════════════════
     NAV · Social dropdown (desktop)
     - Click toggles · click outside closes · Escape closes
     - aria-expanded + aria-hidden kept in sync
     ════════════════════════════ */
  /* NAV dropdowns (Social + Account) · click-toggle, outside-click + Escape close, mutually exclusive */
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

  /* CC · cart/wishlist count stub — Laravel overrides getCounts() then calls refreshBadges(). Badges hidden at 0. */
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
     - Mouse approach within button bounds shifts button toward cursor
     - Strength capped at 4px in any direction
     - Resets smoothly when cursor leaves
     - Disabled on touch/coarse pointers + reduced-motion
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

  /* FOOTER accordion: removed — polish.js mountFooter() is the single
     owner (MASTER-CONTINUITY §4). Two bindings toggled .expanded twice
     per tap = footer frozen. */

  /* ════════════════════════════
     SIDENAV-001 — unified nav interactions
     ════════════════════════════ */
  const sidenav     = document.getElementById('sidenav');
  const sidenavPull = document.getElementById('sidenav-pull');

  function syncCenterState() {
    if (!sidenav) return;
    const anyExpanded = !!sidenav.querySelector('.sidenav__section.expanded');
    sidenav.classList.toggle('has-expanded', anyExpanded);
  }

  if (sidenav) {
    /* Top-level section collapse/expand · skip .locked-open sections */
    sidenav.querySelectorAll('.sidenav__section > .sidenav__section-head').forEach(head => {
      const section = head.parentElement;
      if (section.classList.contains('locked-open')) return;
      head.addEventListener('click', () => {
        const isOpen = section.classList.toggle('expanded');
        head.setAttribute('aria-expanded', isOpen);
        syncCenterState();
      });
    });

    /* Recording Services — accordion: only one instrument expanded at a time */
    const recSection = sidenav.querySelector('[data-section="recording-services"]');
    if (recSection) {
      recSection.querySelectorAll('.sidenav__instr > .sidenav__instr-head').forEach(head => {
        head.addEventListener('click', () => {
          const instr = head.parentElement;
          const wasOpen = instr.classList.contains('expanded');
          recSection.querySelectorAll('.sidenav__instr.expanded').forEach(other => {
            if (other !== instr) {
              other.classList.remove('expanded');
              const otherHead = other.querySelector('.sidenav__instr-head');
              if (otherHead) otherHead.setAttribute('aria-expanded', 'false');
            }
          });
          instr.classList.toggle('expanded', !wasOpen);
          head.setAttribute('aria-expanded', !wasOpen);
        });
      });
    }

    /* Esc collapses non-locked sections */
    sidenav.addEventListener('keydown', e => {
      if (e.key === 'Escape') {
        sidenav.querySelectorAll('.sidenav__section.expanded:not(.locked-open)').forEach(s => {
          s.classList.remove('expanded');
          const h = s.querySelector('.sidenav__section-head');
          if (h) h.setAttribute('aria-expanded', 'false');
        });
        syncCenterState();
      }
    });

    syncCenterState();
  }

  if (sidenavPull && sidenav) {
    const pullLabel = document.getElementById('sidenav-pull-label');
    const pullClose = document.getElementById('sidenav-pull-close');

    function setDrawerState(isOpen) {
      sidenav.classList.toggle('open', isOpen);
      sidenavPull.setAttribute('aria-expanded', isOpen);
      sidenavPull.setAttribute('aria-label', isOpen ? 'Close navigation' : 'Open navigation');
      if (pullLabel) pullLabel.textContent = isOpen ? 'Close' : 'Navigate';
    }

    /* Tap pull-tab itself: toggle open/close.
       Tap close button: always closes (stopPropagation prevents double-toggle). */
    sidenavPull.addEventListener('click', (e) => {
      // If the click came from the close button, the close handler runs;
      // skip the parent toggle so it doesn't immediately re-open.
      if (e.target.closest('.sidenav__pull-close')) return;
      setDrawerState(!sidenav.classList.contains('open'));
    });
    /* Keyboard support: Enter/Space on pull-tab toggles drawer */
    sidenavPull.addEventListener('keydown', (e) => {
      if (e.target.closest('.sidenav__pull-close')) return;
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        setDrawerState(!sidenav.classList.contains('open'));
      }
    });
    if (pullClose) {
      pullClose.addEventListener('click', (e) => {
        e.stopPropagation();
        setDrawerState(false);
      });
    }

    /* Auto-close drawer when a navigation link is tapped (mobile only) */
    sidenav.querySelectorAll('a').forEach(a => {
      a.addEventListener('click', () => {
        if (window.matchMedia('(max-width: 1024px)').matches) {
          setTimeout(() => setDrawerState(false), 200);
        }
      });
    });

    /* Esc closes the mobile drawer */
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && sidenav.classList.contains('open') &&
          window.matchMedia('(max-width: 1024px)').matches) {
        setDrawerState(false);
      }
    });
  }

  /* ════════════════════════════
     Generic [data-reveal] IO observer
     Threshold 0.18 + rootMargin -50px = elements fire only when ~25% into
     viewport; feels less twitchy on long scrolls, more cinematic.
     ════════════════════════════ */
  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.18, rootMargin: '0px 0px -50px 0px' });
    document.querySelectorAll('[data-reveal]').forEach(el => io.observe(el));
  } else {
    document.querySelectorAll('[data-reveal]').forEach(el => el.classList.add('visible'));
  }


})();



(function () {
  var nav = document.getElementById('cc-nav');
  if (!nav) return;
  var ticking = false;

  function update() {
    nav.classList.toggle('scrolled', window.scrollY > 80);

    /* Show nav once user has scrolled 80% of the hero */
    var hero = document.querySelector('.hero');
    if (!hero) {
      nav.classList.add('cc-nav--visible');
      ticking = false;
      return;
    }
    var heroHeight = hero.offsetHeight;
    if (window.scrollY > heroHeight * 0.8) {
      nav.classList.add('cc-nav--visible');
    } else {
      nav.classList.remove('cc-nav--visible');
    }
    ticking = false;
  }

  function onScroll() {
    if (!ticking) {
      requestAnimationFrame(update);
      ticking = true;
    }
  }

  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', onScroll);
  update();
})();

/* Popup body fade-mask toggle */
(function () {
  document.querySelectorAll('.popup-body').forEach(function (body) {
    function updateFade() {
      var atEnd = body.scrollTop + body.clientHeight >= body.scrollHeight - 4;
      body.classList.toggle('is-at-end', atEnd);
    }
    body.addEventListener('scroll', updateFade, { passive: true });
    var popup = body.closest('.state-popup');
    if (popup) {
      new MutationObserver(updateFade).observe(popup, { attributes: true, attributeFilter: ['class'] });
    }
    updateFade();
  });
})();

/* Card tagline scroll-end toggle — hides hint chevron when scrolled to bottom */
(function () {
  document.querySelectorAll('.libs__card-tagline').forEach(function (tag) {
    var body = tag.closest('.libs__card-body');
    if (!body) return;
    function update() {
      var atEnd = tag.scrollTop + tag.clientHeight >= tag.scrollHeight - 2;
      var hasOverflow = tag.scrollHeight > tag.clientHeight + 1;
      body.classList.toggle('is-tagline-end', atEnd || !hasOverflow);
    }
    tag.addEventListener('scroll', update, { passive: true });
    update();
  });
})();

/* Popup wheel/touch guard — page must NOT scroll when popup is being scrolled.
   Blocks bubbling for both wheel (desktop) and touchmove (mobile). */
(function () {
  document.querySelectorAll('.state-popup').forEach(function (popup) {
    var body = popup.querySelector('.popup-body');
    if (!body) return;

    popup.addEventListener('wheel', function (e) {
      var deltaY = e.deltaY;
      var atTop = body.scrollTop <= 0;
      var atBottom = body.scrollTop + body.clientHeight >= body.scrollHeight - 1;
      var canScrollUp = deltaY < 0 && !atTop;
      var canScrollDown = deltaY > 0 && !atBottom;
      var hasOverflow = body.scrollHeight > body.clientHeight + 1;

      if (hasOverflow && (canScrollUp || canScrollDown)) {
        /* Popup will absorb this scroll — let it bubble naturally to popup-body */
      } else {
        /* No room to scroll in this direction — prevent page scroll entirely */
        e.preventDefault();
      }
    }, { passive: false });

    /* Touch: track start Y, block touchmove that would scroll page */
    var touchStartY = 0;
    popup.addEventListener('touchstart', function (e) {
      touchStartY = e.touches[0].clientY;
    }, { passive: true });

    popup.addEventListener('touchmove', function (e) {
      var deltaY = touchStartY - e.touches[0].clientY;  /* positive = scrolling down */
      var atTop = body.scrollTop <= 0;
      var atBottom = body.scrollTop + body.clientHeight >= body.scrollHeight - 1;
      var hasOverflow = body.scrollHeight > body.clientHeight + 1;
      var wouldEscape = (!hasOverflow) ||
                       (deltaY < 0 && atTop) ||
                       (deltaY > 0 && atBottom);
      if (wouldEscape) e.preventDefault();
    }, { passive: false });
  });
})();

/* ══════════════════════════════════════════════════════════
   CARD ACTION BUTTONS — wishlist / cart toggle
   Delegated handler. Prevents card-link navigation when an
   action button is clicked. Toggles .is-active locally so
   the user gets instant feedback; real persistence will be
   wired to the cart/wishlist store when backend lands.
   Targets both new (.cc-card-action-btn) and legacy
   (.libs__icon-btn) buttons for transition compatibility.
   ══════════════════════════════════════════════════════════ */
(function () {
  document.addEventListener('click', function (e) {
    var btn = e.target.closest('.cc-card-action-btn, .libs__icon-btn');
    if (!btn) return;
    // Block the parent card <a> from navigating
    e.preventDefault();
    e.stopPropagation();
    var action = btn.getAttribute('data-action');
    btn.classList.toggle('is-active');
    // Hook point: dispatch to global store
    document.dispatchEvent(new CustomEvent('cc:card-action', {
      detail: {
        action: action,
        active: btn.classList.contains('is-active'),
        button: btn,
        card: btn.closest('.libs__card, .lib-card, .rec-card')
      }
    }));
  }, true); // capture phase — beat the card-link click
})();

</script>
<style id="cc-finalize-01">
/* testimonials: STRUCTURAL fix — the reveal zone is fixed-height by
   design (keyline <-> credits cross-fade). Chips are now capped at
   2 + "+N" in the builder, and the zone breathes enough for two clean
   rows. Nothing clips, nothing hides, no masks. */
/* ── DESKTOP testimonial text · one symmetrical geometry across all 5 ──
   Fixed-height slots so every card's text block is identical height;
   refined type scale; no conflict with the keyline<->credits cross-fade. */
@media (min-width: 769px) {
  .story-card__caption { gap: 0 !important; padding: 2.4rem 1.2rem 1.2rem !important; }
  .story-card__role {
    -webkit-line-clamp: 2; -webkit-box-orient: vertical;
    overflow: hidden; height: 2.3em !important;
    margin: 0 !important;                     /* flush against the name */
    font-size: 0.6rem !important; font-weight: 800 !important;
    letter-spacing: 0.16em !important; line-height: 1.2 !important;
    display: flex !important; align-items: flex-end !important;
  }
  /* name follows immediately — role + name read as one locked pair */
  .story-card__name { margin-top: 0 !important; }
  .story-card__name {
    font-size: 1.25rem !important; line-height: 1.15 !important;
    margin: 0 0 0.55rem !important;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    display: block; min-width: 0;
  }
  /* the cross-fade zone: keyline (rest) <-> credits (hover) occupy one
     fixed slot — two text lines tall, identical on every card */
  .story-card__reveal { height: 3.4em !important; margin-top: 0 !important; position: relative; } /* two chip rows */
  .story-card__credits {
    position: static !important; opacity: 1 !important;
    display: flex !important; flex-wrap: wrap !important;
    row-gap: 0.34rem; column-gap: 0.34rem; align-content: flex-start;
    overflow: hidden;
  }
  /* permanent boxy chips — no hover cross-fade */
  .story-card:hover .story-card__credits { opacity: 1 !important; }
  /* no hover swap — the films list stays visible at rest */
  .story-card__credit { max-width: 100%; overflow: hidden; text-overflow: ellipsis; }
}
/* footer: no scroll-reveal — present the moment it's reached */
.ft[data-reveal], footer.ft {
  opacity: 1 !important; transform: none !important; transition: none !important;
}

/* the wave container carried decorative bars from the page design —
   they rendered UNDER every real waveform (the recurring "fake layer").
   Once the real canvas mounts, only the canvas exists. */
.player__wave.cc-wave-ready > *:not(canvas.cc-lw) { display: none !important; }
.player__wave {
  border-radius: 4px; overflow: hidden;
  position: relative; height: 34px; min-height: 34px; max-height: none !important;
  display: flex; align-items: center;
}
.player__wave canvas.cc-lw { position: absolute; inset: 0; width: 100%; height: 100%; display: block; }
/* desktop focus: no browser blue ring — brand focus only when keyboard */
.player__play:focus { outline: none; }
.player__play:focus-visible { outline: none; box-shadow: 0 0 0 2px rgba(117, 194, 73, 0.5) !important; }

@media (max-width: 768px) {
  /* mobile testimonials: no hover exists, so no cross-fade zone — the
     films keyline becomes normal flow text. Clean ladder: role, name,
     films; everything clamped, nothing absolute. */
  .story-card__reveal { display: block !important; height: auto !important; min-height: 0 !important; margin-top: 0.55rem !important; } /* block so the top margin actually applies (inline ignored it) */
  /* mobile chips: permanent two-row chips on a narrow (~200px) card need
     smaller type + breathing room so they don't crowd/overlap the edges */
  .story-card__credits {
    position: static !important; opacity: 1 !important;
    display: flex !important; flex-wrap: wrap !important;
    row-gap: 0.3rem !important; column-gap: 0.3rem !important;
    align-content: flex-start; overflow: hidden;
  }
  .story-card__credit {
    padding: 0.18rem 0.42rem !important; font-size: 0.55rem !important;
    border-radius: 5px !important; max-width: 100%;
    overflow: hidden; text-overflow: ellipsis;
  }
  .story-card__credit--more { padding: 0.18rem 0.4rem !important; gap: 0.22rem !important; }
  .story-card__credit--more svg { width: 11px !important; height: 11px !important; }
  .story-card__credit--more span { font-size: 0.92em !important; }
  .story-card__role {
    font-size: 0.55rem !important; letter-spacing: 0.16em !important;
    font-weight: 800 !important; margin: 0 !important;  /* flush to name, matches desktop */
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    display: block; min-width: 0;
  }
  .story-card__name {
    font-size: 1.05rem !important; line-height: 1.2 !important;
    margin-bottom: 0 !important;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    display: block; min-width: 0;
  }
  .story-card p, .story-card blockquote, .story-card .story-card__caption {
    display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;
    overflow: hidden;
  }
}
</style>


<!-- ═══ v2 Polish Layer · shared across all 14 pages ═══ -->

@endverbatim

