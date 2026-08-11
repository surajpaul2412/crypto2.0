@verbatim
<main id="main" tabindex="-1" class="libinner" role="main">

  <!-- ─── SIDENAV-001 · Canonical site lateral nav (extracted from library-inner.html) ─── -->
  <!-- COMPONENT: sidenav START -->
  <aside class="sidenav" id="sidenav" data-active-section="recording-services" aria-label="Site navigation">

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
              <li><a href="/instruments/voices-of-ancient-india" class="sidenav__item current" aria-current="page"><span class="sidenav__item-name">Voices of Ancient India</span></a></li>
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
  <!-- COMPONENT: sidenav END -->

  <!-- ─── LEFT COLUMN · Per-page TOC ─── -->
<!-- ─── RIGHT COLUMN · Hero + sections ─── -->
  <div class="main-col legal-col">

    <!-- HERO -->
    <section class="legal-hero" aria-labelledby="legal-title">
      <span class="legal-hero__eyebrow" data-reveal>Legal · Privacy</span>
      <h1 class="legal-hero__title" id="legal-title" data-reveal>
        Privacy <em>Policy</em>
      </h1>
      <p class="legal-hero__sub d1" data-reveal>
        How Crypto Cipher Audio Lab collects, uses, stores, and protects personal data, in plain language and in legal detail — written to satisfy the Digital Personal Data Protection Act, 2023 (India), the General Data Protection Regulation (EU/UK), and the California Consumer Privacy Act, as applicable to you.
      </p>

      <div class="legal-hero__meta d2" data-reveal>
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
        <span class="legal-meta-chip legal-meta-chip--draft">
          <span class="legal-meta-chip__label">Status</span>
          <span class="legal-meta-chip__value">Pending legal review</span>
        </span>
      </div>

      <div class="legal-draft-banner d3" data-reveal role="note">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M12 9v4"/><path d="M12 17h.01"/>
          <path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
        </svg>
        <div class="legal-draft-banner__text">
          <strong>Working draft.</strong> This document is published in draft form for transparency during the build of cryptocipher.in. It is pending final review by qualified Indian legal counsel before launch. Until the "Effective" date is set, the binding version is whichever supersedes this on the date of your transaction.
        </div>
      </div>
    </section>
<!-- ═══ 01 · Who we are ═══ -->
    <article class="legal-section" id="sec-1" data-reveal>
      <span class="legal-section__num">01</span>
      <h2 class="legal-section__title">Who we are</h2>
      <div class="legal-prose">
        <p>This policy is published by <strong>Crypto Cipher Audio Lab</strong> ("Crypto Cipher", "we", "us", "our"), an audio technology and music production business operating from Delhi, India, established in 2010.</p>
        <p>For the purposes of the Digital Personal Data Protection Act, 2023 (the <strong>"DPDP Act"</strong>) we act as a <em>Data Fiduciary</em>. For the purposes of the EU/UK General Data Protection Regulation (the <strong>"GDPR"</strong>) we act as a <em>Data Controller</em>. For the purposes of the California Consumer Privacy Act as amended by the CPRA (the <strong>"CCPA"</strong>) we act as a <em>Business</em>.</p>
        <p>When you visit cryptocipher.in, create an account, purchase a virtual instrument library, subscribe to our loops service, commission a recording session, license a track, or contact us, you provide certain personal data to us. This policy explains what we do with that data and what rights you have over it.</p>
        <p>If you do not agree with any part of this policy, please do not use our services. By using our services, you confirm you have read and understood this policy.</p>
      </div>
    </article>

    <!-- ═══ 02 · What data we collect ═══ -->
    <article class="legal-section" id="sec-2" data-reveal>
      <span class="legal-section__num">02</span>
      <h2 class="legal-section__title">What data we collect</h2>
      <div class="legal-prose">
        <p>We collect only the data we need to run our business, fulfil your orders, and comply with the law. We do not collect data speculatively or for resale.</p>

        <div class="legal-table-wrap">
          <table class="legal-table">
            <thead>
              <tr>
                <th>Category</th>
                <th>What's in it</th>
                <th>When we collect it</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>Identity</strong></td>
                <td>Name, billing address, country, email, phone (optional)</td>
                <td>Account signup, checkout, contact form</td>
              </tr>
              <tr>
                <td><strong>Transaction</strong></td>
                <td>Order history, invoices, license keys issued. <em>Card numbers are never seen or stored by us</em> — they're handled directly by Razorpay, Stripe, or PayPal.</td>
                <td>At purchase</td>
              </tr>
              <tr>
                <td><strong>Account</strong></td>
                <td>Hashed password, login timestamps, download history of your purchased libraries</td>
                <td>Account creation and use</td>
              </tr>
              <tr>
                <td><strong>Communications</strong></td>
                <td>Emails, support tickets, recording-services briefs, collaboration enquiries</td>
                <td>When you contact us</td>
              </tr>
              <tr>
                <td><strong>Technical</strong></td>
                <td>IP address, device type, browser, OS, referring URL, pages viewed, session timestamps</td>
                <td>Automatically on every visit</td>
              </tr>
              <tr>
                <td><strong>Marketing</strong> (only with consent)</td>
                <td>Email subscription status, newsletter engagement (opens, clicks)</td>
                <td>When you subscribe</td>
              </tr>
            </tbody>
          </table>
        </div>

        <h3>Data we explicitly do not collect</h3>
        <ul>
          <li>Government identifiers (Aadhaar, PAN, SSN, passport numbers) — we never ask for these.</li>
          <li>Biometric data, health data, racial/ethnic origin, sexual orientation, religious or political beliefs, trade union membership, criminal history.</li>
          <li>Children's data (see Section 10).</li>
          <li>Card numbers, CVVs, or full bank account numbers — these go directly to our payment processors.</li>
        </ul>
      </div>
    </article>

    <!-- ═══ 03 · How we use it ═══ -->
    <article class="legal-section" id="sec-3" data-reveal>
      <span class="legal-section__num">03</span>
      <h2 class="legal-section__title">How we use your data</h2>
      <div class="legal-prose">
        <p>We use your data for the following specified purposes and no others without your further consent:</p>
        <ol>
          <li><strong>To fulfil your order.</strong> Process payment, issue licence keys, deliver downloads, send invoices and receipts.</li>
          <li><strong>To run your account.</strong> Authenticate logins, show you your purchases, let you re-download libraries you've bought.</li>
          <li><strong>To support you.</strong> Respond to your emails, tickets, recording briefs, and collaboration enquiries.</li>
          <li><strong>To improve our products.</strong> Aggregate, anonymous analytics about which libraries are downloaded most, which pages convert, which checkout steps drop off. We do not profile individuals.</li>
          <li><strong>To protect against fraud and abuse.</strong> Detect chargebacks, repeat refund abuse, unauthorised redistribution of licensed files, scraping, and similar threats.</li>
          <li><strong>To comply with the law.</strong> Tax records (8 years under Indian law), GST filings, accounting, responses to lawful government requests.</li>
          <li><strong>To send marketing</strong> — but only if you've opted in, and you can opt out any time with one click in any email we send.</li>
        </ol>

        <h3>What we will never do</h3>
        <ul>
          <li>Sell your personal data to anyone.</li>
          <li>Share your data with advertising networks for re-targeting outside our own site.</li>
          <li>Use your music, recordings, or briefs to train AI systems without your explicit, separate written consent.</li>
          <li>Profile you for automated decisions that have legal or similarly significant effects on you, without notifying you and giving you a right to object.</li>
        </ul>
      </div>
    </article>

    <!-- ═══ 04 · Legal basis ═══ -->
    <article class="legal-section" id="sec-4" data-reveal>
      <span class="legal-section__num">04</span>
      <h2 class="legal-section__title">Legal basis for processing</h2>
      <div class="legal-prose">
        <p>We need a lawful basis for every act of processing personal data. Under the DPDP Act we rely primarily on <em>consent</em> and on <em>certain legitimate uses</em> specified in the statute. Under the GDPR we rely on the bases mapped below.</p>

        <div class="legal-table-wrap">
          <table class="legal-table">
            <thead>
              <tr>
                <th>Purpose</th>
                <th>DPDP basis</th>
                <th>GDPR basis (Art. 6)</th>
              </tr>
            </thead>
            <tbody>
              <tr><td>Fulfilling your order</td><td>Certain legitimate use — performance of a contract</td><td>Art. 6(1)(b) Contract</td></tr>
              <tr><td>Running your account</td><td>Performance of a contract</td><td>Art. 6(1)(b) Contract</td></tr>
              <tr><td>Support and communication</td><td>Performance of a contract</td><td>Art. 6(1)(b) Contract</td></tr>
              <tr><td>Fraud prevention, security</td><td>Certain legitimate use</td><td>Art. 6(1)(f) Legitimate interests</td></tr>
              <tr><td>Tax, accounting, legal compliance</td><td>Legal obligation</td><td>Art. 6(1)(c) Legal obligation</td></tr>
              <tr><td>Analytics (aggregated)</td><td>Certain legitimate use</td><td>Art. 6(1)(f) Legitimate interests</td></tr>
              <tr><td>Marketing emails</td><td>Consent</td><td>Art. 6(1)(a) Consent</td></tr>
              <tr><td>Non-essential cookies</td><td>Consent</td><td>Art. 6(1)(a) Consent</td></tr>
            </tbody>
          </table>
        </div>

        <p>Where we rely on your consent, you have the right to withdraw that consent at any time, in a manner as easy as the way you gave it. Withdrawing consent does not affect the lawfulness of processing carried out before withdrawal.</p>
      </div>
    </article>

    <!-- ═══ 05 · Sub-processors ═══ -->
    <article class="legal-section" id="sec-5" data-reveal>
      <span class="legal-section__num">05</span>
      <h2 class="legal-section__title">Sub-processors</h2>
      <div class="legal-prose">
        <p>To deliver our services, we share necessary data with a small number of trusted third-party providers ("Sub-processors"). Each one is bound by a written Data Processing Agreement that limits their use of your data to what we instruct.</p>

        <div class="legal-table-wrap">
          <table class="legal-table">
            <thead>
              <tr><th>Vendor</th><th>Purpose</th><th>Location</th></tr>
            </thead>
            <tbody>
              <tr><td><strong>Razorpay Software Pvt Ltd</strong></td><td>Payment processing — Indian customers (INR)</td><td>India</td></tr>
              <tr><td><strong>Stripe Inc.</strong> / Stripe Payments Europe Ltd</td><td>Payment processing — international cards</td><td>USA / Ireland (EU)</td></tr>
              <tr><td><strong>PayPal Holdings, Inc.</strong></td><td>Payment processing — PayPal accounts</td><td>USA / Luxembourg (EU)</td></tr>
              <tr><td><strong>Cloudways Ltd.</strong> (DigitalOcean infra)</td><td>Application hosting</td><td>Malta / data centres globally</td></tr>
              <tr><td><strong>Cloudflare, Inc.</strong></td><td>CDN, DNS, DDoS protection, edge security</td><td>USA / global edge</td></tr>
              <tr><td><strong>Cloudflare R2</strong></td><td>Object storage — preview audio, library files, images</td><td>USA / global</td></tr>
              <tr><td><strong>Postmark</strong> (ActiveCampaign Inc.)</td><td>Transactional email — receipts, licence keys, password resets</td><td>USA</td></tr>
              <tr><td><strong>MailerLite UAB</strong></td><td>Marketing email — newsletter, library announcements</td><td>Lithuania (EU)</td></tr>
              <tr><td><strong>Plausible Insights OÜ</strong></td><td>Privacy-first website analytics — no cookies, no personal data</td><td>Estonia (EU)</td></tr>
              <tr><td><strong>Functional Software, Inc.</strong> (Sentry)</td><td>Error tracking — diagnostic logs of application crashes</td><td>USA</td></tr>
              <tr><td><strong>Meilisearch</strong> (self-hosted)</td><td>On-site search — runs on our own Cloudways infrastructure; no third-party transfer</td><td>India (with our hosting)</td></tr>
            </tbody>
          </table>
        </div>

        <p>We review this list quarterly. If we add or change a sub-processor, we update this page. Material changes (e.g. a new processor in a new jurisdiction) are notified to account holders by email at least 30 days in advance.</p>
      </div>
    </article>

    <!-- ═══ 06 · International transfers ═══ -->
    <article class="legal-section" id="sec-6" data-reveal>
      <span class="legal-section__num">06</span>
      <h2 class="legal-section__title">International transfers</h2>
      <div class="legal-prose">
        <p>Crypto Cipher is established in India. If you are outside India, your personal data will be transferred to and processed in India. If you are in India, some of our sub-processors (e.g. Stripe, Cloudflare, Sentry) are based outside India and your data may be transferred to them.</p>

        <h3>For EU/UK users</h3>
        <p>When data is transferred outside the European Economic Area or the United Kingdom, we rely on the European Commission's <strong>Standard Contractual Clauses</strong> (2021/914 module 1 or 2 as applicable) and on additional safeguards including data minimisation, pseudonymisation where feasible, encryption in transit and at rest, and contractual restrictions on government access requests. You may request a copy of the relevant SCCs by writing to the contact in Section 12.</p>

        <h3>For Indian users</h3>
        <p>The DPDP Act permits transfers of personal data outside India except to jurisdictions the Central Government may notify as restricted. As of the effective date of this policy, no such restriction applies to the jurisdictions we transfer to.</p>

        <h3>For California users</h3>
        <p>The CCPA does not restrict international transfer; we disclose it here for completeness.</p>
      </div>
    </article>

    <!-- ═══ 07 · Retention ═══ -->
    <article class="legal-section" id="sec-7" data-reveal>
      <span class="legal-section__num">07</span>
      <h2 class="legal-section__title">Retention</h2>
      <div class="legal-prose">
        <p>We keep personal data only as long as we need it. After that, we delete or anonymise it. Specific periods:</p>

        <div class="legal-table-wrap">
          <table class="legal-table">
            <thead>
              <tr><th>Data</th><th>Kept for</th><th>Why</th></tr>
            </thead>
            <tbody>
              <tr><td>Account profile</td><td>While your account is active + 24 months after inactivity</td><td>So you can return and re-download your licences</td></tr>
              <tr><td>Order records, invoices</td><td>8 years from the financial year of the transaction</td><td>Mandatory under Indian Income Tax and GST laws</td></tr>
              <tr><td>Licence-key issuance log</td><td>Permanent (kept for as long as the licence is valid, which is perpetual)</td><td>Audit trail for licence enforcement</td></tr>
              <tr><td>Support tickets, emails</td><td>5 years from last activity</td><td>Defending against claims; service quality</td></tr>
              <tr><td>Marketing list</td><td>Until you unsubscribe</td><td>Consent-based; immediately removed on opt-out</td></tr>
              <tr><td>Server logs (IP, timestamps)</td><td>90 days</td><td>Security, abuse detection</td></tr>
              <tr><td>Analytics (aggregated, no PII)</td><td>24 months</td><td>Trend analysis</td></tr>
            </tbody>
          </table>
        </div>

        <p>If you close your account, we delete identifying personal data within 30 days, except where retention is required by law (invoices, licence logs).</p>
      </div>
    </article>

    <!-- ═══ 08 · Your rights ═══ -->
    <article class="legal-section" id="sec-8" data-reveal>
      <span class="legal-section__num">08</span>
      <h2 class="legal-section__title">Your rights</h2>
      <div class="legal-prose">
        <p>Your rights depend on which law applies to you. We grant the strongest of the applicable sets to every user where operationally feasible.</p>

        <h3>For all users (DPDP Act, India)</h3>
        <ul>
          <li><strong>Right to access</strong> — a summary of the personal data we hold about you.</li>
          <li><strong>Right to correction and erasure</strong> — to fix inaccurate data or have it erased where retention is no longer needed.</li>
          <li><strong>Right to grievance redressal</strong> — to escalate any concern to our Grievance Officer (Section 12).</li>
          <li><strong>Right to nominate</strong> — to designate another person to exercise your rights in the event of your death or incapacity.</li>
          <li><strong>Right to withdraw consent</strong> — at any time, for any processing that relied on your consent.</li>
        </ul>

        <h3>Additional rights for EU/UK users (GDPR)</h3>
        <ul>
          <li><strong>Right to data portability</strong> — to receive your data in a structured, machine-readable format and transmit it to another controller.</li>
          <li><strong>Right to object</strong> — to processing based on legitimate interests, including profiling.</li>
          <li><strong>Right to restriction</strong> — to ask us to pause processing while a dispute is resolved.</li>
          <li><strong>Right not to be subject to solely automated decisions</strong> with legal or similarly significant effects.</li>
          <li><strong>Right to lodge a complaint</strong> with your local Data Protection Authority.</li>
        </ul>

        <h3>Additional rights for California users (CCPA / CPRA)</h3>
        <ul>
          <li><strong>Right to know</strong> the categories of personal information we have collected, the sources, purposes, and recipients.</li>
          <li><strong>Right to delete</strong> personal information we have collected (subject to legal retention exceptions).</li>
          <li><strong>Right to correct</strong> inaccurate personal information.</li>
          <li><strong>Right to opt out of sale or sharing.</strong> <em>We do not sell personal information and have not sold or shared personal information in the preceding 12 months.</em> No "Do Not Sell" link is required, but if you wish to confirm this in writing, contact us.</li>
          <li><strong>Right to limit use of sensitive personal information.</strong> We do not use sensitive personal information for any purpose beyond what is necessary to provide the service.</li>
          <li><strong>Right to non-discrimination</strong> for exercising any of these rights.</li>
        </ul>

        <h3>How to exercise your rights</h3>
        <p>Send an email to <strong>admin@cryptocipher.in</strong> with the right you wish to exercise and enough information for us to identify your account. We will respond within <strong>30 days</strong> (DPDP and GDPR standard). For complex requests we may extend by a further 60 days and will tell you. We may need to verify your identity before acting on certain requests.</p>

        <p>If we deny a request, we will explain why and tell you how to appeal — through our Grievance Officer first, then to your local data protection authority.</p>
      </div>
    </article>

    <!-- ═══ 09 · Cookies ═══ -->
    <article class="legal-section" id="sec-9" data-reveal>
      <span class="legal-section__num">09</span>
      <h2 class="legal-section__title">Cookies &amp; tracking</h2>
      <div class="legal-prose">
        <p>We use a deliberately minimal set of cookies. Most of the site loads without any cookies at all. We use:</p>
        <ul>
          <li><strong>Strictly necessary cookies</strong> — for login sessions, CSRF protection, cart persistence. These are exempt from consent under both GDPR and DPDP.</li>
          <li><strong>Preference cookies</strong> — to remember your currency and language choice. Set only when you change them.</li>
          <li><strong>Analytics</strong> — via Plausible, which uses no cookies and collects no personal data.</li>
        </ul>
        <p>We <strong>do not</strong> use advertising cookies, re-targeting pixels, social-media tracking pixels, or any third-party cookies for marketing purposes.</p>
        <p>Full details are in our <a href="/cookie-policy">Cookie Policy</a>.</p>
      </div>
    </article>

    <!-- ═══ 10 · Children ═══ -->
    <article class="legal-section" id="sec-10" data-reveal>
      <span class="legal-section__num">10</span>
      <h2 class="legal-section__title">Children &amp; minors</h2>
      <div class="legal-prose">
        <p>Our services are intended for users aged <strong>18 and over</strong>. We do not knowingly collect personal data from anyone under 18.</p>
        <p>Under the DPDP Act, any user under 18 in India is a "child" and processing requires verifiable parental consent. We do not provide a parental-consent mechanism, and we therefore do not permit users under 18 to create accounts or transact.</p>
        <p>If we learn that we have collected personal data from a child, we will delete it within 30 days. If you believe a child has provided us data, please write to <strong>admin@cryptocipher.in</strong>.</p>
      </div>
    </article>

    <!-- ═══ 11 · Security & breach ═══ -->
    <article class="legal-section" id="sec-11" data-reveal>
      <span class="legal-section__num">11</span>
      <h2 class="legal-section__title">Security &amp; breaches</h2>
      <div class="legal-prose">
        <p>We apply industry-standard technical and organisational measures to protect personal data: TLS in transit, encryption at rest for sensitive fields, password hashing (bcrypt), least-privilege access controls, periodic backups, and segregated production environments.</p>
        <p>No system is perfectly secure. If we become aware of a personal data breach that is likely to cause harm:</p>
        <ul>
          <li>We will notify the Data Protection Board of India under the DPDP Act, and the relevant supervisory authority under the GDPR, within the timelines required by each law (72 hours under GDPR).</li>
          <li>We will notify affected users without undue delay, by email to the address on file, explaining what happened, what data was involved, and what we and you can do.</li>
          <li>We will publish a breach summary on this site where appropriate.</li>
        </ul>
      </div>
    </article>

    <!-- ═══ 12 · Grievance & contact ═══ -->
    <article class="legal-section" id="sec-12" data-reveal>
      <span class="legal-section__num">12</span>
      <h2 class="legal-section__title">Grievance &amp; contact</h2>
      <div class="legal-prose">

        <div class="legal-callout">
          <span class="legal-callout__label">DPDP Act — Grievance Officer</span>
          <div class="legal-callout__body">
            In accordance with Section 8(10) of the DPDP Act, 2023, the following officer is designated to respond to complaints from Indian users about the processing of their personal data:<br><br>
            <strong>[Grievance Officer Name — to be appointed]</strong><br>
            Crypto Cipher Audio Lab<br>
            Space No-1, Second Floor, DA - Block Market,<br>
            (Ramji Lal Commercial Shopping Complex)<br>
            Shalimar Bagh, New Delhi - 110088, India<br>
            Email: <strong>admin@cryptocipher.in</strong><br>
            Response timeline: within 7 working days of receipt.
          </div>
        </div>

        <h3>General privacy queries</h3>
        <p>Email <strong>admin@cryptocipher.in</strong>. We aim to respond within 7 working days and resolve within 30 days.</p>

        <h3>Right of appeal</h3>
        <p>If you are not satisfied with our response, Indian users may approach the Data Protection Board of India once it is operational; EU/UK users may approach their local Data Protection Authority; California users may complain to the California Privacy Protection Agency.</p>

        <h3>Updates to this policy</h3>
        <p>We may update this policy from time to time. Material changes will be communicated to account holders by email at least 30 days before they take effect, and a version history will be maintained at the bottom of this page once the policy is finalised.</p>

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
              <div class="legal-doc-footer__cell-label">Governing law</div>
              <div class="legal-doc-footer__cell-body">
                Republic of India.<br>
                Courts at <strong>Delhi</strong> shall have exclusive jurisdiction, without prejudice to mandatory consumer-protection rights you may have under your local law.
              </div>
            </div>
            <div class="legal-doc-footer__cell">
              <div class="legal-doc-footer__cell-label">Version log</div>
              <div class="legal-doc-footer__cell-body">
                v0.9 · Draft · pending legal review<br>
                <em>Finalised version log appears here after launch.</em>
              </div>
            </div>
          </div>

          <div class="legal-cross-nav">
            <a href="/privacy-policy" class="legal-cross-nav__link legal-cross-nav__link--current">Privacy Policy</a>
            <a href="/terms-of-service" class="legal-cross-nav__link">Terms of Service →</a>
            <a href="/cookie-policy" class="legal-cross-nav__link">Cookie Policy →</a>
          </div>
        </div>
      </div>
    </article>

  </div><!-- /legal-col -->
</main>

<!-- ═══════════════════════════════════════════════════════════════
     PRIVACY-001 · Page JS
     Reveal observer REMOVED · OWNED BY polish.js scroll-reveal pattern.
     HANDOFF #16 trap closed (was: page IO added .is-visible alongside
     polish.js .is-revealed and inline CSS .visible — 3 systems collapsed to 1).
     ═══════════════════════════════════════════════════════════════ -->

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

<!-- [dead-code purge] Card actions (wishlist/cart) handler removed — no .cc-card-action-btn markup on legal page. -->

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
<!-- COMPONENT: footer START -->
@endverbatim
