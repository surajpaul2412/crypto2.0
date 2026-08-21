@verbatim
<main id="main" tabindex="-1" class="libinner" role="main">
@endverbatim
@include('frontend.partials.sidenav', ['activeSection' => 'recording-services'])
@verbatim

<div class="main-col legal-col">

    <section class="legal-hero" aria-labelledby="legal-title">
      <span class="legal-hero__eyebrow" data-reveal-hero>Legal · Cookies</span>
      <h1 class="legal-hero__title" id="legal-title" data-reveal-hero>
        Cookie <em>Policy</em>
      </h1>
      <p class="legal-hero__sub" data-reveal-hero>
        A plain-language explanation of every cookie and tracking technology cryptocipher.in uses, why we use it, and how you can control it. We've kept this list deliberately short.
      </p>

      <div class="legal-hero__meta" data-reveal-hero>
        <span class="legal-meta-chip">
          <span class="legal-meta-chip__label">Effective</span>
          <span class="legal-meta-chip__value">TBD — pending finalisation</span>
        </span>
        <span class="legal-meta-chip">
          <span class="legal-meta-chip__label">Version</span>
          <span class="legal-meta-chip__value">0.9 · Draft</span>
        </span>
        <span class="legal-meta-chip">
          <span class="legal-meta-chip__label">Jurisdiction</span>
          <span class="legal-meta-chip__value">Delhi, India</span>
        </span>
      </div>

      <div class="legal-draft-banner" data-reveal-hero role="note">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M12 9v4"/><path d="M12 17h.01"/>
          <path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
        </svg>
        <div class="legal-draft-banner__text">
          <strong>Working draft.</strong> Pending final review by qualified Indian legal counsel before launch.
        </div>
      </div>
    </section>
<!-- ═══ 01 · What cookies are ═══ -->
    <article class="legal-section" id="sec-1" data-reveal>
      <span class="legal-section__num">01</span>
      <h2 class="legal-section__title">What cookies <em>are</em></h2>
      <div class="legal-prose">
        <p>A <strong>cookie</strong> is a small text file that a website places on your device when you visit, so the site can remember things across page loads or visits — like that you're logged in, or that you've selected a particular currency.</p>
        <p>This page also covers <strong>similar technologies</strong> that don't technically use the cookie file format but serve the same purpose: localStorage, sessionStorage, IndexedDB, web beacons, and similar device-storage mechanisms.</p>
        <p>We use as few of these as possible. Most of cryptocipher.in loads without storing anything on your device.</p>
      </div>
    </article>

    <!-- ═══ 02 · Cookies we use ═══ -->
    <article class="legal-section" id="sec-2" data-reveal>
      <span class="legal-section__num">02</span>
      <h2 class="legal-section__title">Cookies we <em>use</em></h2>
      <div class="legal-prose">
        <p>The complete list:</p>

        <div class="legal-table-wrap">
          <table class="legal-table">
            <thead>
              <tr>
                <th>Cookie</th>
                <th>Purpose</th>
                <th>Type</th>
                <th>Duration</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>cc_session</strong></td>
                <td>Keeps you logged in across page loads</td>
                <td>Strictly necessary</td>
                <td>Session</td>
              </tr>
              <tr>
                <td><strong>XSRF-TOKEN</strong></td>
                <td>Cross-site request forgery protection (Laravel default)</td>
                <td>Strictly necessary</td>
                <td>Session</td>
              </tr>
              <tr>
                <td><strong>cc_cart</strong></td>
                <td>Remembers items in your cart between visits</td>
                <td>Strictly necessary</td>
                <td>30 days</td>
              </tr>
              <tr>
                <td><strong>cc_currency</strong></td>
                <td>Remembers your preferred display currency (INR / USD / EUR / GBP)</td>
                <td>Preference</td>
                <td>1 year</td>
              </tr>
              <tr>
                <td><strong>cc_consent</strong></td>
                <td>Remembers your cookie preferences so we don't ask again</td>
                <td>Strictly necessary</td>
                <td>1 year</td>
              </tr>
            </tbody>
          </table>
        </div>

        <p>That's the full list. We don't add cookies without listing them here.</p>
      </div>
    </article>

    <!-- ═══ 03 · Cookies we do not use ═══ -->
    <article class="legal-section" id="sec-3" data-reveal>
      <span class="legal-section__num">03</span>
      <h2 class="legal-section__title">Cookies we <em>do not</em> use</h2>
      <div class="legal-prose">
        <p>We deliberately do <strong>not</strong> use:</p>
        <ul>
          <li><strong>Advertising cookies</strong> — no Google Ads, Meta Pixel, TikTok Pixel, LinkedIn Insight Tag, Twitter conversion tracking, or any equivalent.</li>
          <li><strong>Re-targeting / behavioural tracking cookies</strong> — we don't follow you around the internet after you leave.</li>
          <li><strong>Social-media tracking pixels</strong> embedded in our pages.</li>
          <li><strong>Cross-site cookies</strong> for marketing attribution.</li>
          <li><strong>Fingerprinting</strong> — we don't profile you by device characteristics.</li>
          <li><strong>Cookieless tracking</strong> via IP-based attribution networks.</li>
        </ul>
        <p>Our analytics provider (Plausible) explicitly does not use cookies of any kind.</p>
      </div>
    </article>

    <!-- ═══ 04 · Third-party scripts ═══ -->
    <article class="legal-section" id="sec-4" data-reveal>
      <span class="legal-section__num">04</span>
      <h2 class="legal-section__title">Third-party <em>scripts</em></h2>
      <div class="legal-prose">
        <p>A small number of third parties load scripts on our pages strictly to deliver the service. They are subject to their own privacy policies, linked below.</p>

        <div class="legal-table-wrap">
          <table class="legal-table">
            <thead>
              <tr><th>Service</th><th>Where it loads</th><th>What it does</th></tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>Razorpay Checkout</strong></td>
                <td>Checkout page only</td>
                <td>Processes Indian (INR) payments. Loads only when you reach payment.</td>
              </tr>
              <tr>
                <td><strong>Stripe Elements</strong></td>
                <td>Checkout page only</td>
                <td>Processes international card payments. Loads only at payment.</td>
              </tr>
              <tr>
                <td><strong>PayPal JS SDK</strong></td>
                <td>Checkout page only</td>
                <td>Processes PayPal account payments. Loads only at payment.</td>
              </tr>
              <tr>
                <td><strong>Plausible Analytics</strong></td>
                <td>All pages</td>
                <td>Anonymous page-view counts. No cookies, no personal data, no cross-site tracking.</td>
              </tr>
              <tr>
                <td><strong>Cloudflare</strong></td>
                <td>All requests</td>
                <td>CDN, DDoS protection, edge caching. Uses one cookie (<code>__cf_bm</code>) for bot detection on a 30-minute rolling basis. Strictly necessary.</td>
              </tr>
            </tbody>
          </table>
        </div>

        <p>Each provider's privacy policy: <a href="https://razorpay.com/privacy/" target="_blank" rel="noopener">Razorpay</a> · <a href="https://stripe.com/privacy" target="_blank" rel="noopener">Stripe</a> · <a href="https://www.paypal.com/in/legalhub/privacy-full" target="_blank" rel="noopener">PayPal</a> · <a href="https://plausible.io/privacy" target="_blank" rel="noopener">Plausible</a> · <a href="https://www.cloudflare.com/privacypolicy/" target="_blank" rel="noopener">Cloudflare</a>.</p>
      </div>
    </article>

    <!-- ═══ 05 · Managing cookies ═══ -->
    <article class="legal-section" id="sec-5" data-reveal>
      <span class="legal-section__num">05</span>
      <h2 class="legal-section__title">Managing <em>cookies</em></h2>
      <div class="legal-prose">
        <h3>On this site</h3>
        <p>Because we only use strictly-necessary and preference cookies, there is no cookie banner that gates entry to the site. You can clear the <code>cc_currency</code> preference cookie at any time from your browser settings or by clicking <strong>Reset preferences</strong> in your account settings.</p>

        <h3>In your browser</h3>
        <p>You can block or delete cookies for any site, including ours, from your browser settings:</p>
        <ul>
          <li><strong>Chrome:</strong> Settings → Privacy and security → Cookies and other site data</li>
          <li><strong>Firefox:</strong> Settings → Privacy &amp; Security → Cookies and Site Data</li>
          <li><strong>Safari:</strong> Preferences → Privacy → Manage Website Data</li>
          <li><strong>Edge:</strong> Settings → Cookies and site permissions → Cookies and site data</li>
        </ul>
        <p>If you block strictly-necessary cookies (session, CSRF, cart), the site will still load but you won't be able to log in, complete checkout, or maintain a cart between page loads.</p>
      </div>
    </article>

    <!-- ═══ 06 · Consent ═══ -->
    <article class="legal-section" id="sec-6" data-reveal>
      <span class="legal-section__num">06</span>
      <h2 class="legal-section__title">Consent &amp; <em>legal basis</em></h2>
      <div class="legal-prose">
        <p>Our cookie use is structured to minimise the need for explicit consent.</p>
        <ul>
          <li><strong>Strictly necessary cookies</strong> (<code>cc_session</code>, <code>XSRF-TOKEN</code>, <code>cc_cart</code>, <code>cc_consent</code>, Cloudflare <code>__cf_bm</code>) — exempt from consent under both GDPR Article 5(3) of the ePrivacy Directive and equivalent provisions of the DPDP Act, because they are necessary for the service you requested.</li>
          <li><strong>Preference cookies</strong> (<code>cc_currency</code>) — set only when you actively change a preference. By making that change, you consent to the cookie's storage.</li>
        </ul>
        <p>If we ever add any non-essential cookie (e.g. for new features or analytics changes), we will request consent through a banner before storing it.</p>
      </div>
    </article>

    <!-- ═══ 07 · Updates ═══ -->
    <article class="legal-section" id="sec-7" data-reveal>
      <span class="legal-section__num">07</span>
      <h2 class="legal-section__title">Updates &amp; <em>contact</em></h2>
      <div class="legal-prose">
        <p>We may update this policy from time to time as we add or remove cookies. Material changes are notified to account holders by email at least 30 days in advance.</p>
        <p>Questions or concerns: <strong>admin@cryptocipher.in</strong>.</p>

        <div class="legal-doc-footer">
          <div class="legal-doc-footer__row">
            <div class="legal-doc-footer__cell">
              <div class="legal-doc-footer__cell-label">Operating entity</div>
              <div class="legal-doc-footer__cell-body">
                <strong>Crypto Cipher Audio Lab</strong><br>
                Delhi, India · Established 2010
              </div>
            </div>
            <div class="legal-doc-footer__cell">
              <div class="legal-doc-footer__cell-label">Privacy contact</div>
              <div class="legal-doc-footer__cell-body">
                <strong>admin@cryptocipher.in</strong><br>
                Response within 7 working days.
              </div>
            </div>
            <div class="legal-doc-footer__cell">
              <div class="legal-doc-footer__cell-label">Version log</div>
              <div class="legal-doc-footer__cell-body">
                v0.9 · Draft · pending legal review
              </div>
            </div>
          </div>

          <div class="legal-cross-nav">
            <a href="/privacy-policy" class="legal-cross-nav__link">← Privacy Policy</a>
            <a href="/terms-of-service" class="legal-cross-nav__link">Terms of Service</a>
            <a href="/cookie-policy" class="legal-cross-nav__link legal-cross-nav__link--current">Cookie Policy</a>
          </div>
        </div>
      </div>
    </article>

  </div><!-- /legal-col -->
</main>

<!-- Reveal observer: owned by shared polish.js -->

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

  /* Generic [data-reveal] reveal · REMOVED · OWNED BY polish.js → .is-revealed (ISSUE 5A: one reveal system only) */

})();

</script>

<!-- Crypto Cipher · inline video play · YouTube iframe inside the video card -->
<script>
(function(){
  /* Click on any element with data-yt-id (or its descendants) → play YouTube
     iframe INSIDE that container. Close button restores the poster. */
  function buildEmbed(carrier, ytId) {
    const wrap = document.createElement('div');
    wrap.className = 'video-embed';
    wrap.innerHTML = `
      <button type="button" class="video-embed__close" aria-label="Close video">
        <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6" fill="none" stroke-linecap="round"><line x1="6" y1="6" x2="18" y2="18"/><line x1="6" y1="18" x2="18" y2="6"/></svg>
      </button>
      <iframe
        title="Library video"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin"
        allowfullscreen
        src="https://www.youtube.com/embed/${ytId}?autoplay=1&rel=0&modestbranding=1&playsinline=1"></iframe>
    `;
    carrier.appendChild(wrap);
    // Force reflow then activate transition
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        wrap.classList.add('is-active');
        carrier.classList.add('is-playing');
      });
    });
    // Close handler
    wrap.querySelector('.video-embed__close').addEventListener('click', (e) => {
      e.stopPropagation();
      closeEmbed(carrier);
    });
  }

  function closeEmbed(carrier) {
    const wrap = carrier.querySelector('.video-embed');
    if (!wrap) return;
    wrap.classList.remove('is-active');
    carrier.classList.remove('is-playing');
    setTimeout(() => wrap.remove(), 400);
  }

  document.addEventListener('click', (e) => {
    const closeBtn = e.target.closest('.video-embed__close');
    if (closeBtn) return;  // handled in its own listener

    const carrier = e.target.closest('[data-yt-id]');
    if (!carrier) return;
    if (carrier.classList.contains('is-playing')) return;  // already playing
    const ytId = carrier.getAttribute('data-yt-id');
    if (ytId) {
      e.preventDefault();
      buildEmbed(carrier, ytId);
    }
  });

  // Keyboard accessibility (carriers with role="button")
  document.addEventListener('keydown', (e) => {
    if (e.key !== 'Enter' && e.key !== ' ') return;
    const carrier = e.target.closest('[data-yt-id]');
    if (!carrier || carrier.classList.contains('is-playing')) return;
    const ytId = carrier.getAttribute('data-yt-id');
    if (ytId) {
      e.preventDefault();
      buildEmbed(carrier, ytId);
    }
  });

  // Walkthrough tab switching · close any active embed when switching tabs
  document.querySelectorAll('.videos__tab').forEach(tab => {
    tab.addEventListener('click', () => {
      document.querySelectorAll('.videos__panel.is-playing').forEach(p => closeEmbed(p));
    });
  });
})();
</script>

<!-- Crypto Cipher · booking modal JS -->
<script>
/* Booking modal · open/close · esc · backdrop · focus return */
(function(){
  const modal = document.getElementById('bookingModal');
  if (!modal) return;
  const openers = document.querySelectorAll('[data-open-booking]');
  const closers = modal.querySelectorAll('[data-close-booking]');
  let lastFocused = null;

  function openModal() {
    lastFocused = document.activeElement;
    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.classList.add('booking-locked');
    // Focus first input
    setTimeout(() => {
      const firstInput = modal.querySelector('input, select, textarea, button');
      if (firstInput) firstInput.focus();
    }, 100);
  }
  function closeModal() {
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('booking-locked');
    if (lastFocused && lastFocused.focus) lastFocused.focus();
  }

  openers.forEach(el => el.addEventListener('click', (e) => { e.preventDefault(); openModal(); }));
  closers.forEach(el => el.addEventListener('click', closeModal));

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('is-open')) closeModal();
  });

  // Form submit · placeholder for backend wire-up
  const form = document.getElementById('bookingForm');
  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      // TODO: backend POST handler · for now just close + log
      const data = Object.fromEntries(new FormData(form).entries());
      console.log('[Booking] Brief submitted:', data);
      // Simple feedback
      const btn = form.querySelector('.booking-form__submit span');
      if (btn) {
        const orig = btn.textContent;
        btn.textContent = 'Brief sent ✓';
        setTimeout(() => { btn.textContent = orig; closeModal(); form.reset(); }, 1400);
      }
    });
  }
})();

</script>

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
        card: btn.closest('.rec-card, .lib-card, .libs__card')
      }
    }));
  }, true);
})();
</script>

<!-- ═══════════════════════════════════════════════════════════
     FOOTER-001 · synced from homepage_148.html (canonical source)
     Self-contained: styles, markup, behavior, and JSON-LD all here.
     Sidenav clearance (body padding-bottom:64px) preserved
     separately in SIDENAV CSS region — see top of file.
     ═══════════════════════════════════════════════════════════ -->
<!-- ═══════════════════════════════════════════════════════════
     FOOTER-001 · canonical · v-final (Svantra strip + whisper trust cards)
     Self-contained: styles, markup, behavior all here.
     ═══════════════════════════════════════════════════════════ -->
@endverbatim
