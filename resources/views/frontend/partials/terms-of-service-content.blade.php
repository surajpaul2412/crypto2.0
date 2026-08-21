@php
echo <<<'TERMS_CONTENT'
<!-- ═══════════════════════════════════════════════════════════════
     TERMS-001 v2 · Terms of Service
     Canon-aligned DOM matching .libinner / .instr / .recsvc
     ═══════════════════════════════════════════════════════════════ -->
<main id="main" tabindex="-1" class="libinner" role="main">
TERMS_CONTENT;
@endphp
@include('frontend.partials.sidenav', ['activeSection' => 'recording-services'])
@php
echo <<<'TERMS_CONTENT'

  <!-- ─── LEFT COLUMN · Per-page TOC ─── -->
<!-- ─── RIGHT COLUMN · Hero + sections ─── -->
  <div class="main-col legal-col">

    <!-- HERO -->
    <section class="legal-hero" aria-labelledby="legal-title">
      <span class="legal-hero__eyebrow" data-reveal>Legal · Terms</span>
      <h1 class="legal-hero__title" id="legal-title" data-reveal>
        Terms of <em>Service</em>
      </h1>
      <p class="legal-hero__sub d1" data-reveal>
        The agreement between you and Crypto Cipher Audio Lab when you use this website, purchase a virtual instrument library, subscribe to our loops service, commission a recording session, or license any of our audio assets. Please read it before you transact.
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
          <strong>Working draft.</strong> Pending final review by qualified Indian legal counsel before launch. The binding version is whichever is in force on the date of your transaction.
        </div>
      </div>
    </section>
<!-- ═══ 01 · Acceptance ═══ -->
    <article class="legal-section" id="sec-1" data-reveal>
      <span class="legal-section__num">01</span>
      <h2 class="legal-section__title">Acceptance of these terms</h2>
      <div class="legal-prose">
        <p>These Terms of Service ("<strong>Terms</strong>") form a binding agreement between you ("<strong>you</strong>", "<strong>your</strong>", "<strong>Customer</strong>") and <strong>Crypto Cipher Audio Lab</strong>, of Delhi, India ("<strong>Crypto Cipher</strong>", "<strong>we</strong>", "<strong>us</strong>", "<strong>our</strong>").</p>
        <p>By using cryptocipher.in, creating an account, downloading our software, purchasing a library, subscribing to our loops service, commissioning a recording session, or licensing any of our audio assets, you confirm that you have read, understood, and agreed to be bound by these Terms and by our <a href="/privacy-policy">Privacy Policy</a> and <a href="/cookie-policy">Cookie Policy</a>, each of which is incorporated by reference.</p>
        <p>If you are entering into these Terms on behalf of a company or other legal entity, you represent that you have authority to bind that entity, in which case "you" refers to that entity.</p>
        <p>If you do not agree, do not use our services.</p>
      </div>
    </article>

    <!-- ═══ 02 · Definitions ═══ -->
    <article class="legal-section" id="sec-2" data-reveal>
      <span class="legal-section__num">02</span>
      <h2 class="legal-section__title">Definitions</h2>
      <div class="legal-prose">
        <div class="legal-table-wrap">
          <table class="legal-table">
            <thead><tr><th>Term</th><th>Meaning</th></tr></thead>
            <tbody>
              <tr><td><strong>Library</strong></td><td>Any virtual instrument, sample library, Kontakt instrument, loop pack, or similar audio product we sell under the Crypto Cipher name, in any format.</td></tr>
              <tr><td><strong>Licensed Material</strong></td><td>Any audio, MIDI, scripting, presets, artwork, documentation, or other content delivered to you as part of a Library, a loops subscription, a recording session, or a sync license.</td></tr>
              <tr><td><strong>Derivative Work</strong></td><td>Any musical composition, sound design element, recording, or audio production that incorporates Licensed Material in a transformed and combined way as part of a larger work.</td></tr>
              <tr><td><strong>End User</strong></td><td>The single natural person who has been granted a license under these Terms — that is, you.</td></tr>
              <tr><td><strong>Order Confirmation</strong></td><td>The email or on-screen confirmation we send after we accept your order. This is the document that creates the contract.</td></tr>
              <tr><td><strong>Site</strong></td><td>cryptocipher.in and any subdomain operated by Crypto Cipher.</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </article>

    <!-- ═══ 03 · Eligibility & accounts ═══ -->
    <article class="legal-section" id="sec-3" data-reveal>
      <span class="legal-section__num">03</span>
      <h2 class="legal-section__title">Eligibility &amp; accounts</h2>
      <div class="legal-prose">
        <p>You must be <strong>18 years of age or older</strong> to use our services or to enter into these Terms.</p>
        <p>To purchase, you must create an account or check out as a guest. If you create an account, you agree to:</p>
        <ul>
          <li>Provide accurate, current, and complete information.</li>
          <li>Keep your password confidential. You are responsible for everything that happens under your account.</li>
          <li>Notify us promptly if you suspect unauthorised access.</li>
        </ul>
        <p>We may suspend or terminate any account that we reasonably believe is being used to violate these Terms (see Section 16).</p>
      </div>
    </article>

    <!-- ═══ 04 · Orders, pricing, taxes ═══ -->
    <article class="legal-section" id="sec-4" data-reveal>
      <span class="legal-section__num">04</span>
      <h2 class="legal-section__title">Orders, pricing, and taxes</h2>
      <div class="legal-prose">
        <h3>How a contract is formed</h3>
        <p>Products listed on the Site are an <em>invitation to treat</em>, not an offer. When you place an order, you make an offer to buy. The contract is formed only when we send you an Order Confirmation. We may refuse any order, including for reasons of suspected fraud, payment failure, geographic restriction, or pricing error.</p>

        <h3>Pricing and currency</h3>
        <p>Prices are displayed in the currency selected at checkout (typically INR for Indian customers, USD for international). We may adjust prices at any time, but published prices apply to any order accepted before the change.</p>

        <h3>Pricing errors</h3>
        <p>If a price is obviously wrong (for example, a Library listed at 1% of its usual price), we are not bound to honour it. We will contact you, offer to fulfil at the correct price, or cancel and refund.</p>

        <h3>Taxes</h3>
        <ul>
          <li><strong>Indian customers:</strong> GST is included or added at checkout as applicable. We issue GST-compliant invoices.</li>
          <li><strong>EU/UK customers:</strong> Where required, VAT may be added at the rate of your country of residence. You are responsible for any reverse-charge obligations applicable to your business.</li>
          <li><strong>Other jurisdictions:</strong> You are responsible for any local sales, use, or import taxes, duties, or levies that may apply to your purchase. These are not included in our listed prices unless explicitly stated.</li>
        </ul>
      </div>
    </article>

    <!-- ═══ 05 · Payment ═══ -->
    <article class="legal-section" id="sec-5" data-reveal>
      <span class="legal-section__num">05</span>
      <h2 class="legal-section__title">Payment &amp; processors</h2>
      <div class="legal-prose">
        <p>Payment is processed by our payment service providers (PSPs):</p>
        <ul>
          <li><strong>Razorpay</strong> — Indian customers, INR.</li>
          <li><strong>Stripe</strong> — international customers, USD/EUR/GBP.</li>
          <li><strong>PayPal</strong> — international customers preferring PayPal.</li>
        </ul>
        <p>We do not see, store, or process your card number, CVV, or full bank account number. Those are handled directly by the relevant PSP under their own terms and PCI-DSS controls.</p>
        <p>By making a payment you agree to the PSP's terms in addition to ours. If a payment fails, we may cancel the order without further notice.</p>
        <p>Chargebacks initiated without first contacting us are considered a breach of these Terms and may result in account suspension and disabling of any licenses tied to the disputed transaction.</p>
      </div>
    </article>

    <!-- ═══ 06 · Refunds ═══ -->
    <article class="legal-section" id="sec-6" data-reveal>
      <span class="legal-section__num">06</span>
      <h2 class="legal-section__title">Refunds</h2>
      <div class="legal-prose">

        <div class="legal-callout">
          <span class="legal-callout__label">Digital goods — no general right of withdrawal</span>
          <div class="legal-callout__body">
            Once a Library has been delivered (download link issued or licence key activated), it is no longer eligible for refund. By initiating a download or activation, you expressly consent to the immediate performance of the contract and acknowledge that you waive any statutory right of withdrawal for digital content that would otherwise apply, to the maximum extent permitted by law in your jurisdiction.
          </div>
        </div>

        <h3>When we will refund</h3>
        <ul>
          <li><strong>Duplicate purchase</strong> caused by a technical fault on our side — full refund.</li>
          <li><strong>Library that does not work as described</strong> due to a defect attributable to us, where the defect cannot be remediated within a reasonable time — full refund.</li>
          <li><strong>Order cancelled before download</strong> — full refund, provided no download link or licence key has been activated.</li>
          <li><strong>Mandatory consumer-protection rights</strong> — nothing in this Section limits any non-waivable refund or cancellation right you may have under your local consumer-protection law.</li>
        </ul>

        <h3>When we will not refund</h3>
        <ul>
          <li>Change of mind, taste, or workflow fit after download.</li>
          <li>Incompatibility with software you did not check before purchase — system requirements are listed on every Library page.</li>
          <li>"I bought the wrong one" — please write to us before downloading; we may be able to swap.</li>
        </ul>

        <h3>How to request a refund</h3>
        <p>Email <strong>admin@cryptocipher.in</strong> within <strong>14 days</strong> of purchase, with your order ID and the reason. We respond within 7 working days. Approved refunds are issued to the original payment method.</p>
      </div>
    </article>

    <!-- ═══ 07 · License grant ═══ -->
    <article class="legal-section" id="sec-7" data-reveal>
      <span class="legal-section__num">07</span>
      <h2 class="legal-section__title">License grant</h2>
      <div class="legal-prose">

        <div class="legal-callout">
          <span class="legal-callout__label">The license in one paragraph</span>
          <div class="legal-callout__body">
            Subject to your full payment and continuing compliance with these Terms, we grant you a <strong>non-exclusive, non-transferable, non-sublicensable, perpetual, worldwide, single-user license</strong> to use the Licensed Material to create your own original music and sound design, in commercial and non-commercial projects, royalty-free for the resulting Derivative Work.
          </div>
        </div>

        <h3>What this license allows</h3>
        <ul>
          <li>Use Licensed Material in your own original musical compositions, sound design, film scores, game soundtracks, advertising, podcasts, theatre, dance, installation art, and similar Derivative Works.</li>
          <li>Distribute, sell, stream, broadcast, and license those Derivative Works without owing us any royalty, performance share, or mechanical share.</li>
          <li>Use the libraries in unlimited projects, for unlimited clients, in perpetuity.</li>
          <li>Make backup copies for your own use.</li>
          <li>Install on up to <strong>two computers you personally own or control</strong>, provided only one is used at a time, and provided the Licensed Material is not made simultaneously accessible to anyone other than you.</li>
        </ul>

        <h3>What it does not</h3>
        <p>The license does not transfer ownership. We remain the owner of all rights in the Licensed Material itself. You only own the Derivative Works that you author using it.</p>
        <p>The license is <em>personal to you</em>. You cannot transfer it, gift it, resell it, sublicense it, or assign it to anyone else, including your employer or your clients, except as a sale of the Derivative Work itself.</p>
      </div>
    </article>

    <!-- ═══ 08 · Prohibited uses ═══ -->
    <article class="legal-section" id="sec-8" data-reveal>
      <span class="legal-section__num">08</span>
      <h2 class="legal-section__title">Prohibited uses</h2>
      <div class="legal-prose">
        <p>You may not, and you may not permit any third party to:</p>
        <ol>
          <li><strong>Redistribute the Licensed Material itself.</strong> You may not share, gift, resell, repackage, mirror, host, or upload any Library files, samples, MIDI patterns, scripts, or presets in their original or substantially original form. This is the single hardest rule.</li>
          <li><strong>Distribute samples as samples.</strong> You may not include isolated samples, loops, one-shots, or MIDI patterns from our Libraries in any other sample library, sound pack, preset pack, or competing product.</li>
          <li><strong>Use Licensed Material as training data</strong> for any artificial intelligence, machine-learning, generative audio, or voice-cloning system, whether commercial or research, without our prior written consent.</li>
          <li><strong>Reverse-engineer, decompile, or disassemble</strong> any software, scripting, or copy-protection mechanism in the Licensed Material, except to the extent that applicable law expressly permits despite this restriction.</li>
          <li><strong>Remove or alter</strong> any copyright notice, watermark, licence-key embedding, or attribution mark.</li>
          <li><strong>Use the Licensed Material in any way that infringes</strong> third-party rights, including any musical composition that knowingly imitates a copyrighted recording in a manner amounting to infringement under the Indian Copyright Act 1957 or its foreign equivalents.</li>
          <li><strong>Use Crypto Cipher branding</strong>, logos, or trade marks to imply endorsement of your Derivative Work without our prior written consent. Crediting us as the source of the Library is welcome and not restricted.</li>
          <li><strong>Use the Licensed Material in content</strong> that is unlawful in the jurisdiction of its primary distribution, including content that infringes intellectual property, defames, harasses, sexualises minors, or is created for the purpose of inciting violence.</li>
        </ol>
        <p>Breach of paragraphs 1–3 is a material breach and may result in immediate termination of all licenses (Section 16), without refund, and is enforceable by injunction.</p>
      </div>
    </article>

    <!-- ═══ 09 · Loops subscription ═══ -->
    <article class="legal-section" id="sec-9" data-reveal>
      <span class="legal-section__num">09</span>
      <h2 class="legal-section__title">Loops subscription</h2>
      <div class="legal-prose">
        <p>Our loops subscription gives you ongoing access to a curated catalogue of loops, one-shots, and MIDI patterns under these additional terms:</p>
        <ul>
          <li><strong>Term and billing.</strong> Subscriptions renew automatically at the interval you selected (monthly or annual) until cancelled. You may cancel at any time from your account; cancellation takes effect at the end of the current billing period.</li>
          <li><strong>Download window.</strong> Loops you download while your subscription is active are licensed to you perpetually under the same terms as Section 7, even after the subscription ends.</li>
          <li><strong>Catalogue access.</strong> Browsing, streaming previews, and downloading newly-added content require an active subscription. We do not promise that any particular loop or pack will remain in the catalogue indefinitely.</li>
          <li><strong>No general right of withdrawal</strong> applies to amounts paid for billing periods during which you accessed the catalogue, to the maximum extent permitted by law.</li>
          <li><strong>Price changes</strong> to renewals are notified by email at least 30 days in advance. Continued subscription after a notified price change is your acceptance of the new price.</li>
        </ul>
      </div>
    </article>

    <!-- ═══ 10 · Recording services ═══ -->
    <article class="legal-section" id="sec-10" data-reveal>
      <span class="legal-section__num">10</span>
      <h2 class="legal-section__title">Recording services</h2>
      <div class="legal-prose">
        <p>When you commission a remote recording session — sitar, tabla, bansuri, vocal, ensemble, or any other service we offer:</p>
        <ul>
          <li><strong>Scope and fee</strong> are agreed in writing before work begins, in a session brief we both confirm.</li>
          <li><strong>Deposit</strong> of 50% (or as otherwise agreed) is payable upfront. The balance is due on delivery of stems.</li>
          <li><strong>Deliverables.</strong> We deliver edited, tuned, and timing-corrected stems in the format specified in the brief. One round of minor revisions is included; additional revisions are billed at our then-current hourly rate.</li>
          <li><strong>Performer rights and ownership.</strong> On payment in full, we assign to you the copyright in the sound recording delivered, on a worldwide, perpetual basis, for use in your specified project and in any reasonable derivative or promotional use of that project. <em>Performers' moral rights and any neighbouring rights are reserved to the extent applicable law makes them non-assignable.</em></li>
          <li><strong>Re-licensing the stems</strong> as samples in a third-party sample library, AI training set, or competing product requires a separate written license from us.</li>
          <li><strong>Cancellation</strong> by you after work has commenced: deposit is non-refundable; any work completed is invoiced pro-rata.</li>
          <li><strong>Force majeure</strong> (illness of performer, equipment failure, infrastructure outage, civil unrest, government order, act of nature). We will reschedule at no additional fee. Where rescheduling is impossible we will refund the unearned portion of the deposit.</li>
        </ul>
      </div>
    </article>

    <!-- ═══ 11 · Sync licensing ═══ -->
    <article class="legal-section" id="sec-11" data-reveal>
      <span class="legal-section__num">11</span>
      <h2 class="legal-section__title">Sync licensing</h2>
      <div class="legal-prose">
        <p>Sync licenses for our pre-cleared catalogue tracks are issued on a per-project basis, on terms negotiated and confirmed in writing before delivery of the master.</p>
        <ul>
          <li>The license is bespoke and overrides the general Library license in Section 7 to the extent of any inconsistency.</li>
          <li>Indian Copyright Act 1957 sections 17–19 governing assignment and license formalities apply.</li>
          <li>Performance, mechanical, and synchronisation rights are granted only to the extent expressly stated in the sync license.</li>
          <li>You are responsible for any cue-sheet filings, performance-society notifications, and metadata accuracy in the relevant collecting society.</li>
        </ul>
        <p>Contact <strong>admin@cryptocipher.in</strong> to enquire.</p>
      </div>
    </article>

    <!-- ═══ 12 · Collaboration ═══ -->
    <article class="legal-section" id="sec-12" data-reveal>
      <span class="legal-section__num">12</span>
      <h2 class="legal-section__title">Collaboration &amp; revenue share</h2>
      <div class="legal-prose">
        <p>From time to time we partner with artists, producers, recording engineers, and sound designers to co-produce Libraries or contribute to our loops catalogue. Where you are such a collaborator:</p>
        <ul>
          <li>Your participation is governed by a separate <strong>Collaboration Agreement</strong>, which prevails over these Terms to the extent of any inconsistency.</li>
          <li>Revenue share, royalty rate, attribution, scope of contribution, and term are defined in that Agreement.</li>
          <li>Payouts are processed through Razorpay Route (for Indian collaborators) or Stripe Connect / equivalent (for international collaborators), each subject to its own onboarding, KYC, and tax-form requirements.</li>
          <li>Tax-deduction-at-source (TDS), 1099, W-8BEN or other withholding obligations are applied as required by law.</li>
          <li>Audit rights, termination, and dispute resolution for the collaboration are governed by the Collaboration Agreement.</li>
        </ul>
        <p>This section does not create a partnership, agency, or joint venture between you and us in the absence of such an Agreement.</p>
      </div>
    </article>

    <!-- ═══ 13 · IP & ownership ═══ -->
    <article class="legal-section" id="sec-13" data-reveal>
      <span class="legal-section__num">13</span>
      <h2 class="legal-section__title">IP &amp; ownership</h2>
      <div class="legal-prose">
        <p>All right, title, and interest in and to the Site, the Licensed Material, the Crypto Cipher name, logo, and trade marks, and any goodwill associated with them, remain at all times the property of Crypto Cipher Audio Lab or its licensors. Nothing in these Terms transfers ownership of any of the foregoing to you.</p>
        <p>You retain all right, title, and interest in your own Derivative Works, subject to the underlying license in the Licensed Material described in Section 7.</p>
        <p>If you submit feedback, ideas, or suggestions to us, you grant us a perpetual, worldwide, royalty-free, non-exclusive license to use them, without obligation to credit or compensate you.</p>
        <p>We respect third-party intellectual property and expect you to do the same. If you believe content on the Site infringes your copyright, write to <strong>admin@cryptocipher.in</strong> with a takedown notice complying with Section 52A of the Indian Copyright Act 1957, and the equivalent of US DMCA § 512(c)(3) where applicable.</p>
      </div>
    </article>

    <!-- ═══ 14 · Warranties ═══ -->
    <article class="legal-section" id="sec-14" data-reveal>
      <span class="legal-section__num">14</span>
      <h2 class="legal-section__title">Warranties &amp; disclaimers</h2>
      <div class="legal-prose">
        <p>We warrant that the Licensed Material we deliver to you, on the date of delivery:</p>
        <ul>
          <li>Is the genuine work of Crypto Cipher Audio Lab or our duly-authorised contributors.</li>
          <li>Is licensed to you under the terms set out here, with all necessary underlying rights.</li>
          <li>Is, to our knowledge, free of any third-party intellectual-property claim that would prevent your use of it within the scope of the license granted.</li>
        </ul>

        <p>Beyond the above and to the maximum extent permitted by applicable law:</p>

        <div class="legal-callout">
          <span class="legal-callout__label">Disclaimer</span>
          <div class="legal-callout__body">
            The Site and the Licensed Material are provided <strong>"as is" and "as available"</strong>, without warranty of any kind, express, implied, statutory, or otherwise — including, without limitation, any implied warranty of merchantability, fitness for a particular purpose, accuracy, non-infringement, or uninterrupted operation. We do not warrant that the Site will be error-free, that defects will be corrected, or that the Site is free of viruses or other harmful components.
          </div>
        </div>

        <p><strong>Compatibility.</strong> Our Libraries are designed to run in the host software named in the product listing (typically Native Instruments Kontakt, Kontakt Player, or the equivalent). System requirements are published on every product page. We do not warrant compatibility with software, plug-ins, hardware, or operating systems not listed.</p>
        <p><strong>Nothing in this Section limits</strong> any liability of ours that, under applicable law (including the Consumer Protection Act 2019 in India and equivalent statutes elsewhere), cannot be excluded or limited.</p>
      </div>
    </article>

    <!-- ═══ 15 · Liability cap ═══ -->
    <article class="legal-section" id="sec-15" data-reveal>
      <span class="legal-section__num">15</span>
      <h2 class="legal-section__title">Limitation of liability</h2>
      <div class="legal-prose">

        <div class="legal-callout">
          <span class="legal-callout__label">Cap</span>
          <div class="legal-callout__body">
            To the maximum extent permitted by law, our total aggregate liability to you under or in connection with these Terms, however caused and on any theory of liability, shall not exceed <strong>the greater of (a) the amount you paid us in the twelve months preceding the event giving rise to the claim, or (b) INR 5,000 (or its equivalent in your billing currency)</strong>.
          </div>
        </div>

        <p>To the maximum extent permitted by law, in no event will Crypto Cipher Audio Lab, its directors, employees, contractors, or agents be liable for any:</p>
        <ul>
          <li>Indirect, incidental, special, consequential, exemplary, or punitive damages;</li>
          <li>Loss of profits, revenue, business, anticipated savings, goodwill, or reputation;</li>
          <li>Loss or corruption of data, even where the possibility was foreseeable.</li>
        </ul>

        <p><strong>Nothing in this Section excludes or limits liability</strong> for:</p>
        <ul>
          <li>Death or personal injury caused by our negligence;</li>
          <li>Fraud or fraudulent misrepresentation;</li>
          <li>Any other liability that, under applicable law, cannot be excluded or limited (this is especially relevant for EU/UK consumers and Indian consumers under the Consumer Protection Act 2019).</li>
        </ul>

        <p>You acknowledge that the prices charged reflect the allocation of risk in this Section and that we would not enter into this contract on the same commercial basis without this allocation.</p>
      </div>
    </article>

    <!-- ═══ 16 · Termination ═══ -->
    <article class="legal-section" id="sec-16" data-reveal>
      <span class="legal-section__num">16</span>
      <h2 class="legal-section__title">Termination</h2>
      <div class="legal-prose">
        <p>You may stop using our services and close your account at any time.</p>
        <p>We may suspend or terminate your account and any or all licenses granted under these Terms, with or without notice, if we reasonably believe you have:</p>
        <ul>
          <li>Breached Section 8 (Prohibited uses), in particular paragraphs 1–3;</li>
          <li>Initiated a chargeback in bad faith;</li>
          <li>Provided false information at signup or checkout;</li>
          <li>Used our services to infringe third-party rights;</li>
          <li>Failed to pay any amount when due.</li>
        </ul>
        <p>On termination for material breach of Section 8: all licenses immediately cease, you must destroy all copies of the Licensed Material in your possession, and no refund is due. We may pursue any remedy available in law or equity, including damages and injunctive relief.</p>
        <p>Sections that by their nature should survive (Definitions, License of Derivative Works already created in compliance, IP, Disclaimers, Liability, Disputes, General) survive termination.</p>
      </div>
    </article>

    <!-- ═══ 17 · Disputes ═══ -->
    <article class="legal-section" id="sec-17" data-reveal>
      <span class="legal-section__num">17</span>
      <h2 class="legal-section__title">Governing law &amp; disputes</h2>
      <div class="legal-prose">
        <h3>Governing law</h3>
        <p>These Terms are governed by the laws of the Republic of India, without regard to its conflict-of-law principles.</p>

        <h3>Jurisdiction</h3>
        <p>The courts at <strong>Delhi, India</strong> have exclusive jurisdiction over any dispute arising out of or in connection with these Terms — <em>without prejudice to any mandatory right you may have under the consumer-protection law of your country of residence to bring proceedings in the courts of that country</em>.</p>

        <h3>Informal resolution first</h3>
        <p>Before commencing any formal proceeding, you agree to contact us at <strong>admin@cryptocipher.in</strong> and give us 30 days to resolve the matter in good faith.</p>

        <h3>Class-action waiver</h3>
        <p>To the extent permitted by law, all disputes are resolved on an individual basis. You agree not to bring or participate in a class action, collective action, or representative action against us.</p>

        <h3>Limitation period</h3>
        <p>Any claim arising under these Terms must be commenced within <strong>two (2) years</strong> of the cause of action accruing, or such longer period as is non-waivable under the Indian Limitation Act 1963 or the limitation law applicable to a consumer in their country of residence.</p>
      </div>
    </article>

    <!-- ═══ 18 · General ═══ -->
    <article class="legal-section" id="sec-18" data-reveal>
      <span class="legal-section__num">18</span>
      <h2 class="legal-section__title">General</h2>
      <div class="legal-prose">

        <h3>Entire agreement</h3>
        <p>These Terms, the Privacy Policy, the Cookie Policy, and any Order Confirmation or Collaboration Agreement we send you constitute the entire agreement between us regarding the subject matter and supersede all prior communications.</p>

        <h3>Changes</h3>
        <p>We may amend these Terms from time to time. Material changes are notified to account holders by email at least 30 days in advance. Your continued use of the Site or our services after a change takes effect is your acceptance of the amended Terms. The version applicable to a given purchase is the version in force on the date of the Order Confirmation.</p>

        <h3>Severability</h3>
        <p>If any provision of these Terms is held unenforceable, the remaining provisions remain in full force. A court may modify the unenforceable provision to the minimum extent needed to make it enforceable while preserving the parties' original intent.</p>

        <h3>No waiver</h3>
        <p>Our failure to enforce any right is not a waiver of that right.</p>

        <h3>Assignment</h3>
        <p>You may not assign or transfer any rights or obligations under these Terms without our written consent. We may assign these Terms in connection with a merger, acquisition, or sale of substantially all our assets, with notice to you.</p>

        <h3>Force majeure</h3>
        <p>Neither party is liable for failure to perform due to events beyond reasonable control, including natural disaster, war, civil unrest, government action, internet outage, or pandemic, except for payment obligations already accrued.</p>

        <h3>Notices</h3>
        <p>Notices to us must be sent to <strong>admin@cryptocipher.in</strong>, copied to our registered address. Notices to you are sent to the email address on file with your account.</p>

        <h3>Language</h3>
        <p>These Terms are concluded in the English language. If any translation is provided for convenience, the English version prevails in case of conflict.</p>

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
              <div class="legal-doc-footer__cell-label">Contact for legal queries</div>
              <div class="legal-doc-footer__cell-body">
                <strong>admin@cryptocipher.in</strong><br>
                Response within 7 working days.
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
            <a href="/privacy-policy" class="legal-cross-nav__link">← Privacy Policy</a>
            <a href="/terms-of-service" class="legal-cross-nav__link legal-cross-nav__link--current">Terms of Service</a>
            <a href="/cookie-policy" class="legal-cross-nav__link">Cookie Policy →</a>
          </div>
        </div>
      </div>
    </article>

  </div><!-- /legal-col -->
</main>
TERMS_CONTENT;
@endphp
