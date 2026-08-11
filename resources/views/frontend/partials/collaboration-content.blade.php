@verbatim
<main id="main" tabindex="-1" class="libinner">

  <!-- ────────────────────────────────────────────
       SIDE INDEX — sticky left column
       ──────────────────────────────────────────── -->
  <!-- ────────────────────────────────────────────
       SIDENAV-001 — Unified Side Nav
       Active section: kontakt-libraries (LIBINNER default)
       ──────────────────────────────────────────── -->
  <aside class="sidenav" id="sidenav" data-active-section="collaborate" aria-label="Site navigation">

    <!-- Mobile pull tab · grip pulses when closed; sticky + close button when open -->
    <div class="sidenav__pull" id="sidenav-pull" role="button" tabindex="0" aria-label="Open navigation" aria-expanded="false">
      <div class="sidenav__pull-grip"></div>
      <span class="sidenav__pull-label" id="sidenav-pull-label">Navigate</span>
      <span class="sidenav__pull-meta">14 · 8</span>
      <button class="sidenav__pull-close" id="sidenav-pull-close" type="button" aria-label="Close navigation">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>

    <!-- ─── SECTION 1: KONTAKT LIBRARIES (locked-open) ─── -->
    <section class="sidenav__section expanded locked-open" data-section="kontakt-libraries">
      <button class="sidenav__section-head" aria-expanded="true" aria-controls="sec-libs">
        <span class="sidenav__section-label">
          <span class="sidenav__section-label-text">Virtual Instruments</span>
          <span class="sidenav__section-count">14 instruments</span>
        </span>
        <span class="sidenav__section-arrow">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
        </span>
      </button>
      <div class="sidenav__section-body" id="sec-libs">
        <div class="sidenav__section-body-inner">
          <div class="sidenav__section-body-pad">
            <ul class="sidenav__list sidenav__list--libs">
              <li><a href="/instruments/voices-of-ancient-india" class="sidenav__item"><span class="sidenav__item-name">Voices of Ancient India</span></a></li>
              <li><a href="/instruments/solo-tabla" class="sidenav__item"><span class="sidenav__item-name">Solo Tabla</span></a></li>
              <li><a href="/instruments/bollywood-harmonium" class="sidenav__item"><span class="sidenav__item-name">Bollywood Harmonium</span></a></li>
              <li><a href="/instruments/solo-dholak" class="sidenav__item"><span class="sidenav__item-name">Solo Dholak</span></a></li>
              <li><a href="/instruments/voices-of-ragas-vol-1" class="sidenav__item"><span class="sidenav__item-name">Voices of Ragas Vol 1</span></a></li>
              <li><a href="/instruments/voices-of-ragas-vol-2" class="sidenav__item"><span class="sidenav__item-name">Voices of Ragas Vol 2</span></a></li>
              <li><a href="/instruments/tabla-tarang" class="sidenav__item"><span class="sidenav__item-name">Tabla Tarang</span></a></li>
              <li><a href="/instruments/tabla-loops" class="sidenav__item"><span class="sidenav__item-name">Tabla Loops</span></a></li>
              <li><a href="/instruments/dholak-loops" class="sidenav__item"><span class="sidenav__item-name">Dholak Loops</span></a></li>
              <li><a href="/instruments/swarmandal" class="sidenav__item"><span class="sidenav__item-name">Swarmandal</span></a></li>
              <li><a href="/instruments/tarangs" class="sidenav__item"><span class="sidenav__item-name">Tarangs</span></a></li>
              <li><a href="/instruments/tongue-drum" class="sidenav__item"><span class="sidenav__item-name">Tongue Drum</span></a></li>
              <li><a href="/instruments/bol-tabla-mouth-percussion" class="sidenav__item"><span class="sidenav__item-name">BOL — Tabla Mouth Perc.</span></a></li>
              <li><a href="/instruments/terry-and-bells" class="sidenav__item"><span class="sidenav__item-name">Terry &amp; Bells</span></a></li>
            </ul>
            <a href="/instruments" class="sidenav__footer-link">View all instruments <span class="sidenav__footer-link-arrow">→</span></a>
          </div>
        </div>
      </div>
    </section>

    <!-- ─── SECTION 2: RECORDING SERVICES (single CTA · no expand · no artists) ─── -->
    <section class="sidenav__section sidenav__section--cta" data-section="recording-services">
      <a href="/recording-services" class="sidenav__cta-link" aria-label="View Recording Services">
        <span class="sidenav__cta-label">
          <span class="sidenav__cta-label-text">Recording Services</span>
          <span class="sidenav__cta-label-desc">Custom Indian instrument sessions</span>
        </span>
        <span class="sidenav__cta-arrow" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </span>
      </a>
    </section>

    <!-- ─── SECTION 3: HERITAGE FILMS (single CTA · no expand · no list) ─── -->
    <section class="sidenav__section sidenav__section--cta" data-section="heritage-films">
      <a href="/heritage" class="sidenav__cta-link" aria-label="View Heritage Films">
        <span class="sidenav__cta-label">
          <span class="sidenav__cta-label-text">Heritage Films</span>
          <span class="sidenav__cta-label-desc">Behind-the-scenes from the studio</span>
        </span>
        <span class="sidenav__cta-arrow" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </span>
      </a>
    </section>

  </aside>




  <!-- ────────────────────────────────────────────
       MAIN COLUMN
       ──────────────────────────────────────────── -->
<div class="main-col">

    <!-- ════════════════════════════════════════════════════════════
         §1 HERO · Open Call manifesto · dual invitation
         ──────────────────────────────────────────── -->
    <section class="collab-hero" id="hero" aria-labelledby="hero-title">
      <div class="collab-hero__section-head">
        <span class="collab-hero__section-rule"></span>
        <span class="collab-hero__section-label">A few programmes are open</span>
      </div>

      <h1 class="collab-hero__title" id="hero-title" data-reveal-hero data-reveal-delay="0">
        We don't fuse datasets. <em>People make it.</em>
      </h1>

      <p class="collab-hero__tagline" data-reveal-hero data-reveal-delay="160">
        If you've put years into your craft and the work has a voice that's yours, this is a place for it to be heard — in libraries composers and studios use worldwide.
      </p>

      <div class="collab-hero__actions" data-reveal-hero data-reveal-delay="320">
        <a href="#roles" class="collab-hero__cta-primary">
          <span>See what's open</span>
          <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><polyline points="19 12 12 19 5 12"/></svg>
        </a>
        <a href="#how" class="collab-hero__cta-secondary">
          <span>How to apply</span>
        </a>
      </div>
    </section>

    <!-- ════════════════════════════════════════════════════════════
         §2 WHY THIS EXISTS · 3 outcome pillars
         ──────────────────────────────────────────── -->


    <!-- ════════════════════════════════════════════════════════════
         §3 ROLES · 3 categories — Creative · Technical · Growth
         ──────────────────────────────────────────── -->
    <section class="collab-roles" id="roles" aria-labelledby="roles-title">
      <div class="collab-section-head">
        <span class="collab-section-head__rule"></span>
        <span class="collab-section-head__label">Open roles</span>
      </div>
      <h2 class="collab-section-head__title" id="roles-title">What's open right now.</h2>
      <p class="collab-section-head__sub">A few programmes run at a time. The work is the filter — apply with something real, and getting in is the achievement.</p>

      <!-- ─── CREATIVE ─── -->
      <div class="collab-roles__category" data-reveal>
        <div class="collab-roles__cat-head">
          <span class="collab-roles__cat-num">01</span>
          <div class="collab-roles__cat-info">
            <h3 class="collab-roles__cat-title">Creative</h3>
            <p class="collab-roles__cat-bar">Real makers · show us your work</p>
          </div>
        </div>
        <div class="collab-roles__grid">
          <article class="collab-role-card">
            <div class="collab-role-card__head">
              <span class="collab-role-card__tag">Creative</span>
              <h4 class="collab-role-card__title">Artists</h4>
            </div>
            <p class="collab-role-card__body">You play, with a voice of your own. Turn your signature into a library composers worldwide will reach for.</p>
            <a class="collab-role-card__apply" href="#apply">
              <span>Apply</span>
              <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
          </article>
          <article class="collab-role-card">
            <div class="collab-role-card__head">
              <span class="collab-role-card__tag">Creative</span>
              <h4 class="collab-role-card__title">Composers</h4>
            </div>
            <p class="collab-role-card__body">Produce with our libraries, get your demos heard worldwide, and earn a seat on the team that builds the next ones. Apply with real work.</p>
            <a class="collab-role-card__apply" href="#apply">
              <span>Apply</span>
              <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
          </article>
          <article class="collab-role-card">
            <div class="collab-role-card__head">
              <span class="collab-role-card__tag">Creative</span>
              <h4 class="collab-role-card__title">Sound Designers</h4>
            </div>
            <p class="collab-role-card__body">Build a loop library in your own style — the kind composers reach for by name. Come with your sound.</p>
            <a class="collab-role-card__apply" href="#apply">
              <span>Apply</span>
              <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
          </article>
          <article class="collab-role-card">
            <div class="collab-role-card__head">
              <span class="collab-role-card__tag">Creative</span>
              <h4 class="collab-role-card__title">Content Creators</h4>
            </div>
            <p class="collab-role-card__body">Producer or composer first. Turn our libraries into video demos and audio tricks people can't scroll past. Show us your reels.</p>
            <a class="collab-role-card__apply" href="#apply">
              <span>Apply</span>
              <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
          </article>
        </div>
      </div>

      <!-- ─── TECHNICAL ─── -->
      <div class="collab-roles__category" data-reveal>
        <div class="collab-roles__cat-head">
          <span class="collab-roles__cat-num">02</span>
          <div class="collab-roles__cat-info">
            <h3 class="collab-roles__cat-title">Technical</h3>
            <p class="collab-roles__cat-bar">Proven builders · show us what you've shipped</p>
          </div>
        </div>
        <div class="collab-roles__grid">
          <article class="collab-role-card">
            <div class="collab-role-card__head">
              <span class="collab-role-card__tag">Technical</span>
              <h4 class="collab-role-card__title">Producers</h4>
            </div>
            <p class="collab-role-card__body">Bring sound the world hasn't heard. Make composers remember your name — on the official Crypto Cipher producer roster.</p>
            <a class="collab-role-card__apply" href="#apply">
              <span>Apply</span>
              <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
          </article>
          <article class="collab-role-card">
            <div class="collab-role-card__head">
              <span class="collab-role-card__tag">Technical</span>
              <h4 class="collab-role-card__title">Kontakt Script Programmers</h4>
            </div>
            <p class="collab-role-card__body">Script the engines behind modern Kontakt libraries — true legato, deep articulation. Show us what you've built.</p>
            <a class="collab-role-card__apply" href="#apply">
              <span>Apply</span>
              <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
          </article>
          <article class="collab-role-card collab-role-card--closed">
            <div class="collab-role-card__head">
              <span class="collab-role-card__tag">Closed</span>
              <h4 class="collab-role-card__title">Web / Platform</h4>
            </div>
            <p class="collab-role-card__body">Web Audio, not just web. Build the tools that make sound run in the browser. Show us something you've shipped.</p>
          </article>
          <article class="collab-role-card collab-role-card--closed">
            <div class="collab-role-card__head">
              <span class="collab-role-card__tag">Closed</span>
              <h4 class="collab-role-card__title">UI / Graphic</h4>
            </div>
            <p class="collab-role-card__body">Instrument UI, not general design — Kontakt panels, audio interfaces. Solve the hard layout and comfort problems. Show us a screen you've made.</p>
          </article>
        </div>
      </div>

      <!-- ─── REACH ─── -->
      <div class="collab-roles__category" data-reveal>
        <div class="collab-roles__cat-head">
          <span class="collab-roles__cat-num">03</span>
          <div class="collab-roles__cat-info">
            <h3 class="collab-roles__cat-title">Reach</h3>
            <p class="collab-roles__cat-bar">A real network, not a follower count</p>
          </div>
        </div>
        <div class="collab-roles__grid">
          <article class="collab-role-card">
            <div class="collab-role-card__head">
              <span class="collab-role-card__tag">Reach</span>
              <h4 class="collab-role-card__title">Affiliates</h4>
            </div>
            <p class="collab-role-card__body">A real network, not a follower count. Put our libraries in front of people who trust your taste — and earn from it. Show us your reach.</p>
            <a class="collab-role-card__apply" href="#apply">
              <span>Apply</span>
              <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
          </article>
        </div>
      </div>

      <p class="collab-roles__partner" data-reveal>
        Not a maker? If you want to partner, refer, or teach with our libraries, <a href="11_contact.php">get in touch →</a>.
      </p>
    </section>

    <!-- ════════════════════════════════════════════════════════════
         §4 HOW IT WORKS · 4-step process
         ──────────────────────────────────────────── -->
    <section class="collab-how" id="how" aria-labelledby="how-title">
      <div class="collab-section-head">
        <span class="collab-section-head__rule"></span>
        <span class="collab-section-head__label">How to apply</span>
      </div>
      <h2 class="collab-section-head__title" id="how-title">A real review, a real reply.</h2>

      <ol class="collab-how__steps">
        <li class="collab-how__step" data-reveal>
          <div class="collab-how__step-num">01</div>
          <div class="collab-how__step-body">
            <h3 class="collab-how__step-title">Apply</h3>
            <p class="collab-how__step-text">Pick the programme that fits and send real work — a portfolio, a track, a library, a reel. The work is the application.</p>
          </div>
        </li>
        <li class="collab-how__step" data-reveal>
          <div class="collab-how__step-num">02</div>
          <div class="collab-how__step-body">
            <h3 class="collab-how__step-title">We review</h3>
            <p class="collab-how__step-text">Real people read everything. You'll hear back within 14 days — and if you don't, it just means the timing or fit isn't right now, not a verdict on your work.</p>
          </div>
        </li>
        <li class="collab-how__step" data-reveal>
          <div class="collab-how__step-num">03</div>
          <div class="collab-how__step-body">
            <h3 class="collab-how__step-title">If you're in</h3>
            <p class="collab-how__step-text">Terms are set by Crypto Cipher and shared in full on acceptance — no negotiation, no surprises. You make the work; we handle distribution, licensing, and payment.</p>
          </div>
        </li>
      </ol>
    </section>

    <!-- ════════════════════════════════════════════════════════════
         §5 WHAT WE LOOK FOR · standards
         ──────────────────────────────────────────── -->


    <!-- ═══════════════════════════════════════════════════════════════
         CC-ENQUIRY-HUB · inline mount (collaborate surface)
         Engine renders the config-driven form here. Edit the form via
         cc-enquiry-hub.config.js — never this markup.
         Per-surface heading/eyebrow via data-attrs (override config).
         ═══════════════════════════════════════════════════════════════ -->
    <section class="collab-enquiry" id="apply" aria-label="Apply to collaborate">
      <div data-cc-enquiry-hub
           data-types="collaborator"
           data-eyebrow="Open Call"
           data-heading="Make something the world hasn't heard."></div>
    </section>

    <!-- ════════════════════════════════════════════════════════════
         FAQ · rec-faq component (matched to recording-services) · deflect + searchable
         ──────────────────────────────────────────── -->
    <section class="rec-faq" id="faq" aria-labelledby="faq-title">
      <header class="rec-faq__head" data-reveal>
        <span class="rec-faq__eyebrow">Frequently asked</span>
        <h2 class="rec-faq__title" id="faq-title">Before you <em>apply</em></h2>
        <p class="rec-faq__sub">The questions people ask before applying. If yours isn't here, write to us — we'll answer directly.</p>
      </header>

      <div class="rec-faq__list">
        <article class="rec-faq__item" data-reveal>
          <button class="rec-faq__q" aria-expanded="false">
            <span>Do I need to be based in India?</span>
            <span class="rec-faq__q-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></span>
          </button>
          <div class="rec-faq__a"><div class="rec-faq__a-inner"><div class="rec-faq__a-pad">
            No. We work with people anywhere — the only bar is the work, not where you're from.
          </div></div></div>
        </article>

        <article class="rec-faq__item" data-reveal>
          <button class="rec-faq__q" aria-expanded="false">
            <span>What should I send when I apply?</span>
            <span class="rec-faq__q-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></span>
          </button>
          <div class="rec-faq__a"><div class="rec-faq__a-inner"><div class="rec-faq__a-pad">
            Real work, not a résumé — a portfolio, track, library, reel, or repo. One strong piece beats a long CV. Send an https link, no shorteners.
          </div></div></div>
        </article>

        <article class="rec-faq__item" data-reveal>
          <button class="rec-faq__q" aria-expanded="false">
            <span>How long until I hear back?</span>
            <span class="rec-faq__q-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></span>
          </button>
          <div class="rec-faq__a"><div class="rec-faq__a-inner"><div class="rec-faq__a-pad">
            Within 14 days. If you don't hear back, the timing or fit isn't right for what we're building now — not a verdict on your work, and you're welcome to apply again.
          </div></div></div>
        </article>

        <article class="rec-faq__item" data-reveal>
          <button class="rec-faq__q" aria-expanded="false">
            <span>How does payment work?</span>
            <span class="rec-faq__q-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></span>
          </button>
          <div class="rec-faq__a"><div class="rec-faq__a-inner"><div class="rec-faq__a-pad">
            Terms are set per programme by Crypto Cipher and shared in full once you're accepted — nothing to negotiate, no surprises.
          </div></div></div>
        </article>

        <article class="rec-faq__item" data-reveal>
          <button class="rec-faq__q" aria-expanded="false">
            <span>A role I want says "Closed" — what do I do?</span>
            <span class="rec-faq__q-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></span>
          </button>
          <div class="rec-faq__a"><div class="rec-faq__a-inner"><div class="rec-faq__a-pad">
            Programmes open in rotation. Check back, or use the partner line under the roles to introduce yourself for when it reopens.
          </div></div></div>
        </article>

        <article class="rec-faq__item" data-reveal>
          <button class="rec-faq__q" aria-expanded="false">
            <span>My work doesn't fit a listed role.</span>
            <span class="rec-faq__q-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></span>
          </button>
          <div class="rec-faq__a"><div class="rec-faq__a-inner"><div class="rec-faq__a-pad">
            Pick the closest programme and explain in your note, or use the partner line. We read everything.
          </div></div></div>
        </article>
      </div>
    </section>

    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Do I need to be based in India?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "No. We work with people anywhere — the only bar is the work, not where you're from."
      }
    },
    {
      "@type": "Question",
      "name": "What should I send when I apply?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Real work, not a résumé — a portfolio, track, library, reel, or repo. One strong piece beats a long CV. Send an https link, no shorteners."
      }
    },
    {
      "@type": "Question",
      "name": "How long until I hear back?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Within 14 days. If you don't hear back, the timing or fit isn't right for what we're building now — not a verdict on your work, and you're welcome to apply again."
      }
    },
    {
      "@type": "Question",
      "name": "How does payment work?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Terms are set per programme by Crypto Cipher and shared in full once you're accepted — nothing to negotiate, no surprises."
      }
    },
    {
      "@type": "Question",
      "name": "A role I want says "Closed" — what do I do?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Programmes open in rotation. Check back, or use the partner line under the roles to introduce yourself for when it reopens."
      }
    },
    {
      "@type": "Question",
      "name": "My work doesn't fit a listed role.",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Pick the closest programme and explain in your note, or use the partner line. We read everything."
      }
    }
  ]
}
    </script>


    <!-- ════════════════════════════════════════════════════════════
         FAQ · deflect email + searchable · collapsed accordion
         (after the form; questions match the FAQPage schema below)
         ──────────────────────────────────────────── -->
    

    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Do I need to be based in India?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "No. We work with people anywhere — the only bar is the work, not where you're from."
      }
    },
    {
      "@type": "Question",
      "name": "What should I send when I apply?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Real work, not a résumé — a portfolio, track, library, reel, or repo. One strong piece beats a long CV. Send an https link, no shorteners."
      }
    },
    {
      "@type": "Question",
      "name": "How long until I hear back?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Within 14 days. If you don't hear back, the timing or fit isn't right for what we're building now — not a verdict on your work, and you're welcome to apply again."
      }
    },
    {
      "@type": "Question",
      "name": "How does payment work?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Terms are set per programme by Crypto Cipher and shared in full once you're accepted — nothing to negotiate, no surprises."
      }
    },
    {
      "@type": "Question",
      "name": "A role I want says "Closed" — what do I do?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Programmes open in rotation. Check back, or use the partner line under the roles to introduce yourself for when it reopens."
      }
    },
    {
      "@type": "Question",
      "name": "My work doesn't fit a listed role.",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Pick the closest programme and explain in your note, or use the partner line. We read everything."
      }
    }
  ]
}
    </script>


    <!-- ════════════════════════════════════════════════════════════
         §7 FAQ · 8 questions
         ──────────────────────────────────────────── -->


    <!-- ════════════════════════════════════════════════════════════
         §8 CLOSING · final nudge
         ──────────────────────────────────────────── -->


  </div><!-- /.main-col -->
</main>

<!-- ═══════════════════════════════════════════════════════════════
     HERITAGE LIGHTBOX · Premium fullscreen YouTube player · Netflix-style
     Black canvas + max 16:9 video + minimal top chrome bar.
     Fade in/out 400ms; click backdrop / × / ESC to close.
     ═══════════════════════════════════════════════════════════════ -->


<!-- ═══════════════════════════════════════════════════════════════
     LICENSE TERMS MODAL — opens from buy-bar "License terms" button
     ═══════════════════════════════════════════════════════════════ -->
<div class="modal" id="license-modal" role="dialog" aria-modal="true" aria-labelledby="license-modal-title" aria-hidden="true">
  <div class="modal__backdrop" data-modal-close></div>
  <div class="modal__panel" role="document">
    <button class="modal__close" data-modal-close aria-label="Close license terms">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="6" y1="6" x2="18" y2="18"/><line x1="6" y1="18" x2="18" y2="6"/></svg>
    </button>

    <div class="modal__head">
      <span class="eyebrow">License Terms</span>
      <h2 class="modal__title" id="license-modal-title">One license. Clear use rights.</h2>
      <p class="modal__sub">What you can and can't do with Voices of Ancient India once you own it.</p>
    </div>

    <div class="modal__body">

      <div class="modal__row modal__row--allow">
        <div class="modal__row-label">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          You can
        </div>
        <ul class="modal__row-list">
          <li>Use in unlimited commercial projects — film, OTT, broadcast, advertising, sync, games</li>
          <li>Use across multiple clients and productions, royalty-free, in perpetuity</li>
          <li>Install on up to 2 active machines (Native Access authorization)</li>
          <li>Reinstall on replacement hardware as needed</li>
          <li>Use in productions with team members under your contract</li>
        </ul>
      </div>

      <div class="modal__row modal__row--deny">
        <div class="modal__row-label">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="6" y1="6" x2="18" y2="18"/><line x1="6" y1="18" x2="18" y2="6"/></svg>
          You can't
        </div>
        <ul class="modal__row-list">
          <li>Resell, redistribute, or share the library files with anyone</li>
          <li>Use the samples to train AI/ML models — declared AI-training-free at performance contract level</li>
          <li>Repackage the samples into another sample library or competing product</li>
          <li>Sell or distribute isolated, unprocessed samples (loops/one-shots) as standalone content</li>
          <li>Transfer the license to another person without contacting Crypto Cipher</li>
        </ul>
      </div>

      <div class="modal__foot">
        <p>For full legal text, see <a href="/license/full" class="modal__link">our complete EULA</a>. For sync clearance documentation, see <a href="/license/sync" class="modal__link">sync clearance terms</a>. Custom enterprise licensing available — <a href="/contact" class="modal__link">contact us</a>.</p>
      </div>

    </div>
  </div>
</div>



<!-- ═══════════════════════════════════════════════════════════════
     SIDENAV-001 mobile clearance · relocated from old FOOTER block
     The fixed 64px sidenav pull-tab on mobile needs body padding-bottom
     so it does not overlap page content. This rule belongs to the
     sidenav layout, not the footer — relocated during FOOTER-001 sync
     from homepage_148.html.
     ═══════════════════════════════════════════════════════════════ -->
<style>
/* body padding-bottom:64px removed — sidenav pull-tab is position:relative
   inside the sidenav, not a fixed bottom bar, so the clearance was dead
   space showing below the footer. Page-local; other pages untouched. */
</style>

<!-- ═══════════════════════════════════════════════════════════════
     SCRIPTS — Nav · Side Index · Tabs · Buy · Audio · Reveal
     ═══════════════════════════════════════════════════════════════ -->
<script>
(function(){
  'use strict';
  /* TODO · KNOWN ISSUE · 2026-05 (deferred from FOOTER-001 sync):
     This inline IIFE duplicates SIDENAV section/instrument click handlers
     and NAV social dropdown bindings that are ALSO bound by the inlined
     cc-components.js block further down. Currently every click on those
     elements fires its handler twice. Out of scope for footer sync;
     needs its own audit pass to either gut this IIFE down to page-only
     concerns or remove cc-components.js's overlapping sections. */
  /* ════════════════════════════
     SIDENAV-001 — unified nav interactions
     · Section collapse/expand (independent)
     · Recording Services accordion (one instrument at a time)
     · Mobile bottom-sheet toggle
     · "centered when fully collapsed" via .has-expanded class
     ════════════════════════════ */
  const sidenav     = document.getElementById('sidenav');
  const sidenavPull = document.getElementById('sidenav-pull');

  function syncCenterState() {
    if (!sidenav) return;
    const anyExpanded = !!sidenav.querySelector('.sidenav__section.expanded');
    sidenav.classList.toggle('has-expanded', anyExpanded);
  }

  if (sidenav) {
    // Top-level section collapse/expand · skip .locked-open sections (always open)
    sidenav.querySelectorAll('.sidenav__section > .sidenav__section-head').forEach(head => {
      const section = head.parentElement;
      if (section.classList.contains('locked-open')) return;
      head.addEventListener('click', () => {
        const isOpen = section.classList.toggle('expanded');
        head.setAttribute('aria-expanded', isOpen);
        syncCenterState();
      });
    });

    // Recording Services — accordion: only one instrument expanded at a time
    const recSection = sidenav.querySelector('[data-section="recording-services"]');
    if (recSection) {
      recSection.querySelectorAll('.sidenav__instr > .sidenav__instr-head').forEach(head => {
        head.addEventListener('click', () => {
          const instr = head.parentElement;
          const wasOpen = instr.classList.contains('expanded');
          // Collapse all siblings first
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

    // Keyboard: Esc collapses non-locked sections only
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

    // Initial state sync (active section is already .expanded in markup)
    syncCenterState();
  }

  // Mobile bottom-sheet toggle handled by cc-components.js · removed dup to avoid double-toggle


  /* ════════════════════════════
     HERO VIDEO — mouse-follow highlight (heritage signature)
     ════════════════════════════ */
  const heroFrame = document.getElementById('hero-video-frame');
  const heroHighlight = document.getElementById('hero-video-highlight');
  if (heroFrame && heroHighlight && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
    heroFrame.addEventListener('mousemove', e => {
      const r = heroFrame.getBoundingClientRect();
      heroHighlight.style.left = (e.clientX - r.left) + 'px';
      heroHighlight.style.top  = (e.clientY - r.top) + 'px';
    });
  }

  /* §4 Videos panels — same mouse-follow highlight (heritage aesthetic) */
  if (window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
    document.querySelectorAll('.videos__panel').forEach(panel => {
      const hl = panel.querySelector('.videos__panel-highlight');
      if (!hl) return;
      panel.addEventListener('mousemove', e => {
        const r = panel.getBoundingClientRect();
        hl.style.left = (e.clientX - r.left) + 'px';
        hl.style.top  = (e.clientY - r.top)  + 'px';
      });
    });
  }

  /* ════════════════════════════
     BUY BAR — REMOVED in v4.3 (price card moved to top of hero, no sticky)
     ════════════════════════════ */

  /* ════════════════════════════
     SHORTLIST — buy bar button (in-memory · Phase 1)
     ════════════════════════════ */
  const shortlistBtn   = document.getElementById('shortlist-btn');
  const shortlistLabel = document.getElementById('shortlist-label');
  let shortlisted = false;
  if (shortlistBtn) {
    shortlistBtn.addEventListener('click', () => {
      shortlisted = !shortlisted;
      shortlistBtn.classList.toggle('active', shortlisted);
      shortlistBtn.setAttribute('aria-pressed', shortlisted);
      if (shortlistLabel) shortlistLabel.textContent = shortlisted ? 'Saved' : 'Save for later';
    });
  }

  /* ════════════════════════════
     LICENSE MODAL — open from buy bar · close on backdrop/close/Esc
     ════════════════════════════ */
  const licenseBtn   = document.getElementById('license-btn');
  const licenseModal = document.getElementById('license-modal');
  const openLicense = () => {
    if (!licenseModal) return;
    licenseModal.classList.add('is-open');
    licenseModal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  };
  const closeLicense = () => {
    if (!licenseModal) return;
    licenseModal.classList.remove('is-open');
    licenseModal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  };
  if (licenseBtn) licenseBtn.addEventListener('click', openLicense);
  if (licenseModal) {
    licenseModal.querySelectorAll('[data-modal-close]').forEach(el => {
      el.addEventListener('click', closeLicense);
    });
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape' && licenseModal.classList.contains('is-open')) closeLicense();
    });
  }

  /* ════════════════════════════
     VIDEO TABS (desktop)
     ════════════════════════════ */
  const tabs   = document.querySelectorAll('.videos__tab');
  const panels = document.querySelectorAll('.videos__panel');
  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const target = tab.dataset.video;
      tabs.forEach(t => {
        t.classList.toggle('active', t === tab);
        t.setAttribute('aria-selected', t === tab);
      });
      panels.forEach(p => p.classList.toggle('active', p.dataset.panel === target));
    });
  });

  /* ════════════════════════════
     AUDIO PREVIEW — single source of truth
     Stops other previews when one starts (Phase 1: visual only)
     ════════════════════════════ */
  let activePreview = null;
  function stopActive() {
    if (!activePreview) return;
    activePreview.classList.remove('playing');
    activePreview = null;
  }

  // SoundCloud-style player rows
  document.querySelectorAll('.player__row').forEach(row => {
    const playBtn = row.querySelector('.player__play');
    const wave = row.querySelector('.player__wave');
    const togglePlay = (e) => {
      e.preventDefault();
      if (activePreview === row) { stopActive(); return; }
      stopActive();
      row.classList.add('playing');
      activePreview = row;
      // Auto-stop after demo duration (placeholder — real audio replaces this)
      setTimeout(() => { if (activePreview === row) stopActive(); }, 8000);
    };
    if (playBtn) playBtn.addEventListener('click', togglePlay);
    if (wave) wave.addEventListener('click', togglePlay);
  });

  // Patch previews
  document.querySelectorAll('[data-patch-preview]').forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();
      if (activePreview === btn) { stopActive(); return; }
      stopActive();
      btn.classList.add('playing');
      activePreview = btn;
      setTimeout(() => { if (activePreview === btn) stopActive(); }, 5000);
    });
  });

  /* ════════════════════════════
     SCROLL REVEAL
     ════════════════════════════ */
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const isDesktop = window.matchMedia('(min-width: 1025px)').matches;
  const heroEl = document.querySelector('.lib-hero');

  // Hero choreography (desktop only, no reduced-motion)
  // Add .choreographed on next frame so animations run from initial state
  if (heroEl && isDesktop && !prefersReduced) {
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        heroEl.classList.add('choreographed');
      });
    });
  }

  if (prefersReduced) {
    document.querySelectorAll('[data-reveal]').forEach(el => el.classList.add('visible'));
  } else {
    const io = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.classList.add('visible');
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
    // Hero on desktop runs choreography (not the generic reveal),
    // so skip observing hero data-reveal elements there.
    document.querySelectorAll('[data-reveal]').forEach(el => {
      if (isDesktop && heroEl && heroEl.contains(el)) return; // hero handled by choreography
      io.observe(el);
    });
    // Fallback — anything still hidden after 1.8s gets revealed
    setTimeout(() => {
      document.querySelectorAll('[data-reveal]:not(.visible)').forEach(el => {
        if (isDesktop && heroEl && heroEl.contains(el)) return;
        el.classList.add('visible');
      });
    }, 1800);
  }

})();
</script>
<!-- ═══════════════════════════════════════════════════════════════
     BOOKING MODAL · opens from "Book a session" CTA · esc/backdrop close
     ═══════════════════════════════════════════════════════════════ -->


<!-- Crypto Cipher · components JS -->
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

  /* ════════════════════════════
     Generic [data-reveal] IO observer
     ════════════════════════════ */
  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });
    document.querySelectorAll('[data-reveal]').forEach(el => io.observe(el));
  } else {
    document.querySelectorAll('[data-reveal]').forEach(el => el.classList.add('visible'));
  }


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

    // Heritage page uses its own dedicated lightbox — skip this handler for
    // any heritage video cards (cinehero, feature, highlight, archive).
    if (e.target.closest('.heritage-cinehero__card, .heritage-feature-card, .heritage-card')) return;

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
    // Skip heritage video cards — handled by dedicated lightbox
    if (e.target.closest('.heritage-cinehero__card, .heritage-feature-card, .heritage-card')) return;
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
