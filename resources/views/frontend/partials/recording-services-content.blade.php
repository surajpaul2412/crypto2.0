<main id="main" tabindex="-1" class="recsvc">
  @include('frontend.partials.sidenav', ['activeSection' => 'recording-services'])




  <div class="recsvc__main">

    <!-- ═════════════════════════════════════════════════════════
         § 1 · HERO
         ═════════════════════════════════════════════════════════ -->
    <section class="rec-hero" id="hero">
      <div class="rec-hero__ambient" aria-hidden="true"></div>

      <nav class="rec-hero__breadcrumb" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span class="sep">/</span>
        <span class="current">Recording Services</span>
      </nav>

      <h1 class="rec-hero__title">
        <span class="rec-hero__title-word" style="--w:0">Custom</span>
        <span class="rec-hero__title-word" style="--w:1">recordings</span>
        <span class="rec-hero__title-word rec-hero__title-divider" style="--w:2">·</span>
        <span class="rec-hero__title-word rec-hero__title-word--accent" style="--w:3">Indian</span>
        <span class="rec-hero__title-word rec-hero__title-word--accent" style="--w:4">master</span>
        <span class="rec-hero__title-word rec-hero__title-word--accent" style="--w:5">musicians</span>
      </h1>

      <p class="rec-hero__tagline">
        Sessions tracked in our studio with India's master classical and folk musicians — delivered worldwide as stems and license, in three to four days.
      </p>

      <div class="rec-hero__ctas">
        <button class="rec-hero__cta rec-hero__cta--primary" data-action="open-form" data-open-booking data-magnetic>
          Request a session
        </button>
        <a href="#booking-process" class="rec-hero__cta rec-hero__cta--ghost" data-magnetic>
          See process
        </a>
      </div>

      <div class="rec-hero__marquee" aria-label="Recent work">
        <div class="rec-hero__marquee-track">
          <!-- Set 1 -->
          <div class="rec-hero__marquee-item"><span class="rec-hero__marquee-label">Recent Work</span></div>
          <div class="rec-hero__marquee-item"><span class="rec-hero__marquee-text">The Good Karma Hospital</span><span class="rec-hero__marquee-meta">ITV · 2017–2022</span></div>
          <div class="rec-hero__marquee-sep">·</div>
          <div class="rec-hero__marquee-item"><span class="rec-hero__marquee-text">On Yoga: The Architecture of Peace</span><span class="rec-hero__marquee-meta">Netflix · 2017</span></div>
          <div class="rec-hero__marquee-sep">·</div>
          <div class="rec-hero__marquee-item"><span class="rec-hero__marquee-text">Joseph Curiale</span><span class="rec-hero__marquee-meta">Emmy-nominated · Royal Philharmonic</span></div>
          <div class="rec-hero__marquee-sep">·</div>
          <div class="rec-hero__marquee-item"><span class="rec-hero__marquee-text">Martin Bezzola</span><span class="rec-hero__marquee-meta">Independent composer</span></div>
          <div class="rec-hero__marquee-sep">·</div>
          <!-- Set 2 (loop) -->
          <div class="rec-hero__marquee-item"><span class="rec-hero__marquee-label">Recent Work</span></div>
          <div class="rec-hero__marquee-item"><span class="rec-hero__marquee-text">The Good Karma Hospital</span><span class="rec-hero__marquee-meta">ITV · 2017–2022</span></div>
          <div class="rec-hero__marquee-sep">·</div>
          <div class="rec-hero__marquee-item"><span class="rec-hero__marquee-text">On Yoga: The Architecture of Peace</span><span class="rec-hero__marquee-meta">Netflix · 2017</span></div>
          <div class="rec-hero__marquee-sep">·</div>
          <div class="rec-hero__marquee-item"><span class="rec-hero__marquee-text">Joseph Curiale</span><span class="rec-hero__marquee-meta">Emmy-nominated · Royal Philharmonic</span></div>
          <div class="rec-hero__marquee-sep">·</div>
          <div class="rec-hero__marquee-item"><span class="rec-hero__marquee-text">Martin Bezzola</span><span class="rec-hero__marquee-meta">Independent composer</span></div>
          <div class="rec-hero__marquee-sep">·</div>
        </div>
      </div>
    </section>

    <!-- ═════════════════════════════════════════════════════════
         § 1B · CONDITIONAL DISCOUNT BAND
         Toggle: data-discount-active="true"
         ═════════════════════════════════════════════════════════ -->
    <section class="rec-discount" data-discount-active="false" data-reveal>
      <div class="rec-discount__label">Studio Anniversary</div>
      <span class="rec-discount__pipe">|</span>
      <div class="rec-discount__years">15+ Years</div>
      <div class="rec-discount__text">
        15% off all custom sessions through May
        <span class="rec-discount__text-quiet">Auto-applied at booking · individual instrument badges hidden while this is active</span>
      </div>
    </section>

    <!-- ═════════════════════════════════════════════════════════
         § 2 · HOW IT WORKS · 4-step process
         ═════════════════════════════════════════════════════════ -->
    <section class="instr-process" id="booking-process" aria-labelledby="process-title">

      <div class="instr-process__head">
        <span class="instr-process__eyebrow" data-reveal>How it works</span>
        <h2 class="instr-process__title" id="process-title" data-reveal>
          Directed Indian classical sessions for composers who <span class="instr-process__title-accent">can't afford a wrong take</span>
        </h2>
        <p class="instr-process__sub" data-reveal>
          Real studio. Gharana artists. A session director in the room shaping every performance to your brief. Multi-mic stems delivered clean. Built for film, OTT, and high-stakes scoring work — where the recording has to land the first time.
        </p>
      </div>

      <ol class="instr-process__grid" aria-label="Sitar recording session process">

        <!-- 01 -->
        <li class="process-step" data-reveal>
          <span class="process-step__num">01</span>
          <h3 class="process-step__title">Submit your brief</h3>
          <p class="process-step__body">
            Tell us what your composition needs. Instrument, tempo, raga or scale, mood, reference track, length, deadline, and the project the recording is intended for. The more honest your brief, the sharper the take.
          </p>
          <div class="process-step__meta">
            <span class="process-step__meta-dot" aria-hidden="true"></span>
            <span>One form · 5 minutes</span>
          </div>
        </li>

        <!-- 02 -->
        <li class="process-step" data-reveal>
          <span class="process-step__num">02</span>
          <h3 class="process-step__title">Receive your plan</h3>
          <p class="process-step__body">
            Within 24 hours: confirmed instrument, assigned artist profile, session director, studio date, delivery timeline, and total cost. Each project quoted around instrument, artist, and brief complexity.
          </p>
          <div class="process-step__meta">
            <span class="process-step__meta-dot" aria-hidden="true"></span>
            <span>Within 24 hours</span>
          </div>
        </li>

        <!-- 03 -->
        <li class="process-step" data-reveal>
          <span class="process-step__num">03</span>
          <h3 class="process-step__title">Lock the slot</h3>
          <p class="process-step__body">
            Studio reserved, artist scheduled, session director briefed in advance with your reference and creative direction. Your project enters our calendar — no overlap, no shared focus.
          </p>
          <div class="process-step__meta">
            <span class="process-step__meta-dot" aria-hidden="true"></span>
            <span>Calendar locked</span>
          </div>
        </li>

        <!-- 04 -->
        <li class="process-step" data-reveal>
          <span class="process-step__num">04</span>
          <h3 class="process-step__title">The directed recording</h3>
          <p class="process-step__body">
            Artist plays in our studio. A session director sits in the room — reading your brief, communicating in classical music vocabulary, shaping the performance live. Slow takes, fast takes. Sparse and dense. Melodic alternates. Rhythmic options. Ornamentation choices.
          </p>
          <div class="process-step__meta">
            <span class="process-step__meta-dot" aria-hidden="true"></span>
            <span>Built around your composition</span>
          </div>
        </li>

        <!-- 05 -->
        <li class="process-step" data-reveal>
          <span class="process-step__num">05</span>
          <h3 class="process-step__title">Multi-mic engineering</h3>
          <p class="process-step__body">
            Recorded across multiple microphone positions — close, room, character mics — by an engineer who understands how Indian instruments breathe. Takes reviewed, cleaned, organized, labeled. Packaged for your DAW.
          </p>
          <div class="process-step__meta">
            <span class="process-step__meta-dot" aria-hidden="true"></span>
            <span>Full multi-mic stem set</span>
          </div>
        </li>

        <!-- 06 -->
        <li class="process-step process-step--last" data-reveal>
          <span class="process-step__num">06</span>
          <h3 class="process-step__title">Delivery</h3>
          <p class="process-step__body">
            Raw multi-track WAV stems, 24-bit / 48 kHz. Multiple takes. Multiple mic positions. Organized folders. Secure download link. Licensed for use in the project specified in your brief.
          </p>
          <div class="process-step__meta">
            <span class="process-step__meta-dot" aria-hidden="true"></span>
            <span>24-bit / 48 kHz · sync-licensed</span>
          </div>
        </li>

      </ol>

    </section>

    <!-- ═════════════════════════════════════════════════════════
         § 3 · INSTRUMENTS & PRICING — Two-Tier Grid
         15 instruments · family filter · 3-level discount system
         ═════════════════════════════════════════════════════════ -->
    <section class="rec-instr" id="instruments">
      <header class="rec-instr__head" data-reveal>
        <span class="rec-instr__eyebrow">The instruments</span>
        <h2 class="rec-instr__title">Recorded live in our <span class="instr-process__title-accent">studio in India</span></h2>
        <p class="rec-instr__lede">Every cue tracked by master classical and folk musicians, directed live to your brief. Pick an instrument to see the artist, sound, and how it plays inside a score.</p>
      </header>

      <!-- Family tabs (filter) -->
      <div class="rec-instr__tabs" data-reveal role="tablist" aria-label="Filter by family">
        <button class="rec-instr__tab active" data-family="all" role="tab" aria-selected="true">All <span class="rec-instr__tab-count">{{ $recordingInstruments->count() }}</span></button>
        @foreach ($instrumentCategories as $instrumentCategory)
        <button class="rec-instr__tab" data-family="{{ $instrumentCategory->slug }}" role="tab" aria-selected="false">{{ $instrumentCategory->label }} <span class="rec-instr__tab-count">{{ $instrumentCategory->instruments_count }}</span></button>
        @endforeach
      </div>

      <!-- Instruments grid · 15 cards · order matches sidenav -->
      <div class="rec-instr__grid" id="instr-grid">

        @foreach ($recordingInstruments as $recordingInstrument)
        @if ($recordingInstrument->detailUrl())
        <a href="{{ $recordingInstrument->detailUrl() }}" class="rec-instr__card" data-family="{{ $recordingInstrument->category->slug }}" data-reveal>
          <div class="rec-instr__media">
            <div class="rec-instr__media-art" aria-hidden="true">
              <img src="{{ $recordingInstrument->imageUrl() }}" alt="{{ $recordingInstrument->name }}" loading="lazy" style="width:100%;height:100%;object-fit:contain;">
            </div>
          </div>
          <div class="rec-instr__body">
            <span class="rec-instr__cat">{{ $recordingInstrument->category->label }}</span>
            <h3 class="rec-instr__name">{{ $recordingInstrument->name }}</h3>
            <p class="rec-instr__desc">{{ $recordingInstrument->subtitle }}</p>
          </div>
        </a>
        @else
        <div class="rec-instr__card" data-family="{{ $recordingInstrument->category->slug }}" data-reveal>
          <div class="rec-instr__media">
            <div class="rec-instr__media-art" aria-hidden="true">
              <img src="{{ $recordingInstrument->imageUrl() }}" alt="{{ $recordingInstrument->name }}" loading="lazy" style="width:100%;height:100%;object-fit:contain;">
            </div>
          </div>
          <div class="rec-instr__body">
            <span class="rec-instr__cat">{{ $recordingInstrument->category->label }}</span>
            <h3 class="rec-instr__name">{{ $recordingInstrument->name }}</h3>
            <p class="rec-instr__desc">{{ $recordingInstrument->subtitle }}</p>
          </div>
        </div>
        @endif
        @endforeach

      </div>
    </section>

    <!-- ═════════════════════════════════════════════════════════
         § 4 · TRUST · Principles + Proof
         ═════════════════════════════════════════════════════════ -->
    <section class="rec-trust" id="trust">
      <header class="rec-trust__head" data-reveal>
        <span class="rec-trust__eyebrow">A studio standard, end to end</span>
        <h2 class="rec-trust__title">15+ years of process — backed by composers and studios worldwide.</h2>
        <p class="rec-trust__lede">Active since 2010. Every session run on the same paper trail, the same artists, the same room.</p>
      </header>

      <!-- 8 principles · 4-col grid -->
      <div class="rec-trust__principles" data-reveal>
        <div class="rec-trust__principle">
          <div class="rec-trust__principle-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 12l2 2 4-4"/><path d="M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9c2.39 0 4.68.94 6.36 2.64"/></svg></div>
          <div class="rec-trust__principle-name">Quality control</div>
          <div class="rec-trust__principle-desc">Every take reviewed before it leaves the studio.</div>
        </div>
        <div class="rec-trust__principle">
          <div class="rec-trust__principle-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v6m0 0l-4-4m4 4l4-4"/><path d="M3 13h18v8H3z"/></svg></div>
          <div class="rec-trust__principle-name">Reliable delivery</div>
          <div class="rec-trust__principle-desc">3–4 days, every time. Tracked, timestamped, signed.</div>
        </div>
        <div class="rec-trust__principle">
          <div class="rec-trust__principle-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></div>
          <div class="rec-trust__principle-name">Clear licensing</div>
          <div class="rec-trust__principle-desc">Sync, buyout, or custom — written in plain language.</div>
        </div>
        <div class="rec-trust__principle">
          <div class="rec-trust__principle-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg></div>
          <div class="rec-trust__principle-name">AI-free guarantee</div>
          <div class="rec-trust__principle-desc">No AI training. No AI synthesis. Real players, real takes.</div>
        </div>
        <div class="rec-trust__principle">
          <div class="rec-trust__principle-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 11l-3-3m0 0l-3 3m3-3v8"/></svg></div>
          <div class="rec-trust__principle-name">Hand-selected artists</div>
          <div class="rec-trust__principle-desc">Vetted by reputation, lineage, and recorded output.</div>
        </div>
        <div class="rec-trust__principle">
          <div class="rec-trust__principle-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
          <div class="rec-trust__principle-name">NDA-friendly</div>
          <div class="rec-trust__principle-desc">Signed before brief is shared. Standard or yours.</div>
        </div>
        <div class="rec-trust__principle">
          <div class="rec-trust__principle-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></div>
          <div class="rec-trust__principle-name">Brief-first</div>
          <div class="rec-trust__principle-desc">Brief locked before tracking · one-shot session done right.</div>
        </div>
        <div class="rec-trust__principle">
          <div class="rec-trust__principle-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
          <div class="rec-trust__principle-name">Active since 2010</div>
          <div class="rec-trust__principle-desc">15+ years of session work, no breaks, no rebrands.</div>
        </div>
      </div>

    </section>

    <!-- ═════════════════════════════════════════════════════════
         § 5 · CONVERSION BAND
         ═════════════════════════════════════════════════════════ -->
    <section class="rec-conversion" data-reveal id="request">
      <h2 class="rec-conversion__title">Ready to start your session?</h2>
      <p class="rec-conversion__subtitle">Confirmation within 24 hours · NDA-friendly · Async-friendly across US, EU, Asia time zones.</p>
      <div class="rec-conversion__ctas">
        <button class="rec-hero__cta rec-hero__cta--primary" data-action="open-form" data-open-booking>
          Request a session
          <span class="rec-hero__cta-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></span>
        </button>
      </div>
    </section>

    <!-- ═════════════════════════════════════════════════════════
         § 6 · FAQ
         ═════════════════════════════════════════════════════════ -->
    <section class="rec-faq" id="faq">
      <header class="rec-faq__head" data-reveal>
        <span class="rec-faq__eyebrow">Frequently asked</span>
        <h2 class="rec-faq__title">Before you <span class="instr-process__title-accent">book</span></h2>
        <p class="rec-faq__sub">The questions composers and producers ask before commissioning a recording. If yours isn't here, write to us — we'll answer directly.</p>
      </header>

      <div class="rec-faq__list">
        @foreach ($faqs as $faq)
        <article class="rec-faq__item" data-reveal>
          <button class="rec-faq__q" aria-expanded="false">
            <span>{{ $faq->question }}</span>
            <span class="rec-faq__q-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></span>
          </button>
          <div class="rec-faq__a"><div class="rec-faq__a-inner"><div class="rec-faq__a-pad">
            {!! $faq->answer !!}
          </div></div></div>
        </article>
        @endforeach
      </div>
    </section>

  </div>
</main>
