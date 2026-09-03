<main id="main" tabindex="-1" class="instr">

  <!-- ────────────────────────────────────────────
       SIDENAV-001 — Unified Side Nav
       Active section: recording-services
       Sitar instrument expanded inline with artist tiers
       ──────────────────────────────────────────── -->
  @include('frontend.partials.sidenav', ['activeSection' => 'recording-services'])


  <!-- ────────────────────────────────────────────
       MAIN COLUMN — sections inserted from §1 onward
       ──────────────────────────────────────────── -->
  <div class="main-col">

    <!-- ═══════════════════════════════════════════════════════════════
         §1 HERO — Title + Cinematic video + Pricing + Top CTA
         Order: breadcrumb → H1 → SEO H2 → tagline → VIDEO → (pricing | action card)
         ═══════════════════════════════════════════════════════════════ -->
    <section class="instr-hero" id="hero" aria-labelledby="hero-title">
      <div class="instr-hero__ambient" aria-hidden="true"></div>

      <!-- LEAD: title block, full-width above video -->
      <div class="instr-hero__lead">
        <div class="instr-hero__breadcrumb" data-reveal>
          <a href="{{ route('recording-services') }}">Recording Services</a>
          @if ($instrument->category)
          <span class="instr-hero__breadcrumb-sep">·</span>
          <span>{{ $instrument->category->label }}</span>
          @endif
        </div>

        <h1 class="instr-hero__title" id="hero-title">
          <span class="instr-hero__title-word">{{ $instrument->name }}</span>
        </h1>

        @if ($instrument->subhead_accent || $instrument->subhead_body)
        <h2 class="instr-hero__subhead" data-reveal>
          @if ($instrument->subhead_accent)
          <span class="instr-hero__subhead-accent">{{ $instrument->subhead_accent }}</span>
          @endif
          {{ $instrument->subhead_body }}
        </h2>
        @endif

        @if ($instrument->tagline)
        <p class="instr-hero__tagline" data-reveal>
          {{ $instrument->tagline }}
        </p>
        @endif
      </div>

      <!-- VIDEO STAGE: main 16:9 frame + thumbnail rail · multi-video tab switcher -->
      @if ($instrument->videos->isNotEmpty())
      @php $firstVideo = $instrument->videos->first(); @endphp
      <div class="instr-hero__stage" data-reveal>
        <!-- ─── Main video frame · src swaps on thumbnail click ─── -->
        <div class="instr-hero__video"
             id="hero-video"
             role="button"
             tabindex="0"
             aria-label="Play active video"
             data-yt-id="{{ $firstVideo->yt_id }}">
          <img class="instr-hero__video-poster"
               src="https://i.ytimg.com/vi/{{ $firstVideo->yt_id }}/maxresdefault.jpg"
               onerror="this.onerror=null;this.src='https://i.ytimg.com/vi/{{ $firstVideo->yt_id }}/hqdefault.jpg';"
               alt="{{ $instrument->name }} performance video poster"
               loading="lazy"
               width="1280"
               height="720">
          <div class="instr-hero__video-overlay" aria-hidden="true"></div>
          <div class="instr-hero__video-highlight" id="hero-video-highlight" aria-hidden="true"></div>
          <div class="instr-hero__video-play" aria-hidden="true">
            <svg viewBox="0 0 24 24" aria-hidden="true"><polygon points="6 4 20 12 6 20 6 4"/></svg>
          </div>
          <div class="instr-hero__video-caption" aria-hidden="true">
            <span class="instr-hero__video-caption-title" id="hero-video-caption">{{ $firstVideo->caption }}</span>
            <span class="instr-hero__video-caption-meta">▶ Watch film</span>
          </div>
        </div>

        <!-- ─── Thumbnail rail · scroll-snap on mobile ─── -->
        <div class="instr-hero__rail" role="tablist" aria-label="{{ $instrument->name }} video selection">

          @foreach ($instrument->videos as $video)
          <button class="instr-hero__rail-thumb @if($loop->first) is-active @endif"
                  type="button"
                  role="tab"
                  aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                  data-yt-id="{{ $video->yt_id }}"
                  data-role="{{ $video->role_label }}"
                  data-caption="{{ $video->caption }}"
                  aria-label="{{ $video->role_label }}@if($video->duration_label) · {{ $video->duration_label }}@endif">
            <span class="instr-hero__rail-thumb-img-wrap">
              <img class="instr-hero__rail-thumb-img"
                   src="https://i.ytimg.com/vi/{{ $video->yt_id }}/hqdefault.jpg"
                   onerror="this.onerror=null;this.src='https://i.ytimg.com/vi/{{ $video->yt_id }}/mqdefault.jpg';"
                   alt=""
                   loading="lazy">
            </span>
            <span class="instr-hero__rail-thumb-overlay" aria-hidden="true"></span>
            <span class="instr-hero__rail-thumb-active-dot" aria-hidden="true"></span>
            @if ($video->duration_label)
            <span class="instr-hero__rail-thumb-duration">{{ $video->duration_label }}</span>
            @endif
            <span class="instr-hero__rail-thumb-play" aria-hidden="true">
              <svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20"/></svg>
            </span>
            <span class="instr-hero__rail-thumb-role">{{ $video->role_label }}</span>
          </button>
          @endforeach

        </div>
      </div>
      @endif

      <!-- BOOKING ACTION ROW: full-width · CTA + credits scroll + trust badges -->
      <div class="instr-hero__decision">

        <aside class="instr-hero__action" data-reveal aria-label="Book a {{ $instrument->name }} session">

          <!-- LEAD COLUMN: eyebrow → CTA → meta -->
          <div class="instr-hero__action-lead">
            <span class="instr-hero__action-eyebrow">Book a session</span>

            <button type="button" class="instr-hero__cta instr-hero__cta--primary" data-open-booking>
              <span>Book a session</span>
              <span class="instr-hero__cta-arrow" aria-hidden="true">→</span>
            </button>

            <div class="instr-hero__action-meta">
              <span class="instr-hero__action-meta-dot" aria-hidden="true"></span>
              <span>24-hour confirmation</span>
              <span aria-hidden="true">·</span>
              <span>NDA-friendly</span>
            </div>
          </div>

          <!-- Previous works featured on · scrollable credit strip -->
          <div class="instr-hero__credits" aria-label="Previous works featured on">
            <span class="instr-hero__credits-eyebrow">Previous works featured on</span>
            <div class="instr-hero__credits-strip" role="list">

              <!-- Card 1 · ITV show -->
              <div class="credit-card" role="listitem">
                <span class="credit-card__network">
                  <svg viewBox="0 0 60 22" xmlns="http://www.w3.org/2000/svg" aria-label="ITV">
                    <text x="30" y="17" text-anchor="middle" font-family="Outfit, sans-serif" font-weight="900" font-size="16" letter-spacing="1" fill="currentColor">ITV</text>
                  </svg>
                </span>
                <span class="credit-card__title">The Good Karma Hospital</span>
                <span class="credit-card__meta">Drama series · 2017–22</span>
              </div>

              <!-- Card 2 · Netflix doc -->
              <div class="credit-card" role="listitem">
                <span class="credit-card__network">
                  <svg viewBox="0 0 80 22" xmlns="http://www.w3.org/2000/svg" aria-label="Netflix">
                    <text x="40" y="17" text-anchor="middle" font-family="Outfit, sans-serif" font-weight="800" font-size="13" letter-spacing="0.5" fill="currentColor">NETFLIX</text>
                  </svg>
                </span>
                <span class="credit-card__title">On Yoga: The Architecture of Peace</span>
                <span class="credit-card__meta">Documentary · 2017</span>
              </div>

              <!-- Card 3 · Composer · Joseph Curiale -->
              <div class="credit-card credit-card--composer" role="listitem">
                <span class="credit-card__role">Composer</span>
                <span class="credit-card__title">Joseph Curiale</span>
                <span class="credit-card__meta">Emmy-nominated · Royal Philharmonic</span>
              </div>

              <!-- Card 4 · Composer · Martin Bezzola -->
              <div class="credit-card credit-card--composer" role="listitem">
                <span class="credit-card__role">Composer</span>
                <span class="credit-card__title">Martin Bezzola</span>
                <span class="credit-card__meta">Independent · feature film scores</span>
              </div>

              <!-- Card 5 · Indie composers (collective) -->
              <div class="credit-card credit-card--collective" role="listitem">
                <span class="credit-card__role">Worldwide</span>
                <span class="credit-card__title">+ Indie composers</span>
                <span class="credit-card__meta">Film · OTT · games · ads</span>
              </div>

            </div>
          </div>

        </aside>

      </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════
         §1.5 BOOKING PROCESS — 4-step transparent flow · INSTR-PROCESS-001
         Replaces tier-based pricing UI · clean conversion path
         ═══════════════════════════════════════════════════════════════ -->
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

      <ol class="instr-process__grid" aria-label="{{ $instrument->name }} recording session process">

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

    <!-- ═══════════════════════════════════════════════════════════════
         §1B AUDIO DEMOS — "What sitar sounds like"
         3 demo cards · cc-demo-player engine v7 · MediaElement backend
         Variable count: add/remove .track-card blocks freely.
         ═══════════════════════════════════════════════════════════════ -->
    @php $demoTracks = $instrument->tracks->where('type', 'demo'); @endphp
    @if ($demoTracks->isNotEmpty())
    <section class="instr-demos" id="demos" aria-labelledby="demos-title">

      <div class="instr-demos__head">
        <span class="instr-demos__eyebrow" data-reveal>Listen</span>
        <h2 class="instr-demos__title" id="demos-title" data-reveal>
          What <span class="instr-demos__title-accent">{{ Str::lower($instrument->name) }}</span> sounds like
        </h2>
        <p class="instr-demos__sub" data-reveal>
          Short cues — each cherry-picked to show a different facet of the instrument.
          Click any card to play. Only one plays at a time.
        </p>
      </div>

      <div class="instr-demos__grid player" id="demos-grid">
        @foreach ($demoTracks as $track)
        @include('frontend.partials.recording-services-inner-track-card', ['track' => $track])
        @endforeach
      </div>
    </section>
    @endif

    <!-- ═══════════════════════════════════════════════════════════════
         §2 WHAT THIS INSTRUMENT BRINGS
         2×2 glass card grid · 4 angles: emotional, cinematic, iconic, cultural
         Real Crypto Cipher® copy · composer-aware · grounded in lineage
         ═══════════════════════════════════════════════════════════════ -->
    @php $bringsCards = $instrument->brings ?? []; @endphp
    @if (!empty($bringsCards))
    <section class="instr-brings" id="brings" aria-labelledby="brings-title">

      <div class="instr-brings__head">
        <span class="instr-brings__eyebrow" data-reveal>What it brings</span>
        <h2 class="instr-brings__title" id="brings-title" data-reveal>
          The case for <span class="instr-brings__title-accent">{{ Str::lower($instrument->name) }}</span>
        </h2>
        <p class="instr-brings__sub" data-reveal>
          Angles a film, game, or OTT composer needs before booking — what it feels like, where it fits, where you've heard it, and where it comes from.
        </p>
      </div>

      <div class="instr-brings__grid">
        @php
          $bringsIcons = [
            '<path d="M3 12h3l2-4 3 8 2-6 2 4 2-2 4 0"/>',
            '<rect x="3" y="5" width="18" height="14" rx="1.5"/><path d="M3 9h3M3 13h3M3 17h3M18 9h3M18 13h3M18 17h3"/>',
            '<polygon points="12 3 14.5 9 21 9.5 16 14 17.5 21 12 17.5 6.5 21 8 14 3 9.5 9.5 9"/>',
            '<path d="M5 4h11l3 3v13H5z"/><path d="M16 4v3h3"/><path d="M8 11h8M8 14h8M8 17h5"/>',
          ];
        @endphp
        @foreach ($bringsCards as $index => $card)
        <article class="brings-card" data-reveal>
          <div class="brings-card__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24">{!! $bringsIcons[$index % count($bringsIcons)] !!}</svg>
          </div>
          <span class="brings-card__eyebrow">{{ $card['eyebrow'] ?? '' }}</span>
          <h3 class="brings-card__title">{{ $card['title'] ?? '' }}</h3>
          <p class="brings-card__body">
            {!! $card['body'] ?? '' !!}
          </p>
        </article>
        @endforeach
      </div>
    </section>
    @endif

    <!-- ═══════════════════════════════════════════════════════════════
         §3 THE INSTRUMENT UP CLOSE
         Part A: anatomy photo + hotspots + always-visible legend
         Part B: variants 3-card (which sitar to book)
         ═══════════════════════════════════════════════════════════════ -->
    @if ($instrument->anatomyParts->isNotEmpty() || $instrument->variants->isNotEmpty())
    <section class="instr-anatomy" id="anatomy" aria-labelledby="anatomy-title">

      @if ($instrument->anatomyParts->isNotEmpty())
      <div class="instr-anatomy__head">
        <span class="instr-anatomy__eyebrow" data-reveal>Up close</span>
        <h2 class="instr-anatomy__title" id="anatomy-title" data-reveal>
          The <span class="instr-anatomy__title-accent">anatomy</span> of {{ Str::lower($instrument->name) }}
        </h2>
        <p class="instr-anatomy__sub" data-reveal>
          {{ $instrument->anatomyParts->count() }} parts that shape what you hear in the recording. Hover or tap any number to focus on a part.
        </p>
      </div>

      <!-- ─── PART A: Anatomy stage (photo + legend side-by-side) ─── -->
      <div class="anatomy-stage" data-reveal>

        <div class="anatomy-photo anatomy-photo--tall" id="anatomy-photo" style="--photo-aspect: {{ $instrument->anatomy_photo_aspect }};">
          <!-- Inner frame · clipped with rounded edges · holds the instrument photo -->
          <div class="anatomy-photo__frame" aria-hidden="true">
            @if ($instrument->anatomyImageUrl())
            <img class="anatomy-photo__img" src="{{ $instrument->anatomyImageUrl() }}" alt="{{ $instrument->name }} anatomy photo" loading="lazy">
            @endif
          </div>

          <!-- Hotspots: positioned via inline --x, --y CSS vars (% of photo), driven by RecordingInstrumentAnatomyPart rows -->
          <div class="anatomy-photo__hotspots" role="group" aria-label="Anatomy hotspots">
            @foreach ($instrument->anatomyParts as $part)
            <button class="anatomy-hotspot" type="button" data-anatomy-id="{{ $loop->iteration }}" data-anchor="{{ $part->anchor }}"
                    style="--x: {{ $part->hotspot_x_pct }}%; --y: {{ $part->hotspot_y_pct }}%;"
                    aria-label="{{ $part->name }}@if($part->sub_label) — {{ $part->sub_label }}@endif">
              {{ $loop->iteration }}
              <span class="anatomy-hotspot__tooltip" role="tooltip">
                <span class="anatomy-hotspot__tooltip-label">{{ sprintf('%02d', $loop->iteration) }} · {{ $part->name }}</span>
                <span class="anatomy-hotspot__tooltip-text">{!! $part->tooltip_text !!}</span>
              </span>
            </button>
            @endforeach
          </div>
        </div>

        <!-- ─── INFO CARD · pill column + active part description ─── -->
        <div class="anatomy-info">

          <!-- Card header (idle state copy) -->
          <div class="anatomy-info__head">
            <span class="anatomy-info__eyebrow">Anatomy</span>
            <h3 class="anatomy-info__title">{{ $instrument->anatomyParts->count() }} parts.<br/>One {{ Str::lower($instrument->name) }} voice.</h3>
            <p class="anatomy-info__sub">Tap any number on the photo or in the list — see what each part contributes to the cue.</p>
          </div>

          <!-- Pill column (vertical on desktop, scales to any count) -->
          <div class="anatomy-legend" role="list">
          @foreach ($instrument->anatomyParts as $part)
          <button class="anatomy-legend__item" type="button" data-anatomy-id="{{ $loop->iteration }}" role="listitem">
            <span class="anatomy-legend__num">{{ $loop->iteration }}</span>
            <span class="anatomy-legend__body">
              <span class="anatomy-legend__name">{{ $part->name }}@if($part->sub_label) <em>· {{ $part->sub_label }}</em>@endif</span>
              <span class="anatomy-legend__role">{!! $part->legend_role !!}</span>
            </span>
          </button>
          @endforeach
        </div>

        <!-- Active-part description · always visible on desktop, mobile only when active -->
        <div class="anatomy-reveal" id="anatomy-reveal" aria-live="polite">
          <span class="anatomy-reveal__label" data-reveal-label></span>
          <span class="anatomy-reveal__text" data-reveal-text></span>
        </div>

        </div>
      </div>
      @endif

      <!-- ─── PART B: Variants 3-card row ─── -->
      @if ($instrument->variants->isNotEmpty())
      <div class="instr-variants">

        <div class="instr-variants__head">
          <span class="instr-variants__eyebrow" data-reveal>Variants</span>
          <h3 class="instr-variants__title" data-reveal>Different flavors. Different cues, different schools.</h3>
          <p class="instr-variants__sub" data-reveal>
            {{ $instrument->name }} isn't one thing. The school of playing and the tuning shape the character. Pick the one that suits your cue.
          </p>
        </div>

        <div class="instr-variants__grid">
          @foreach ($instrument->variants as $variant)
          <article class="variant-card" data-reveal>
            <span class="variant-card__chip">
              <span class="variant-card__chip-dot" aria-hidden="true"></span>
              {{ $variant->chip_label }}
            </span>
            <h4 class="variant-card__name">
              {{ $variant->name }}
              @if ($variant->style_label)
              <em>{{ $variant->style_label }}</em>
              @endif
            </h4>
            <p class="variant-card__character">
              {!! $variant->character_body !!}
            </p>
            <div class="variant-card__when">
              <span class="variant-card__when-label">When to book</span>
              <span class="variant-card__when-text">{{ $variant->when_text }}</span>
            </div>
          </article>
          @endforeach
        </div>
      </div>
      @endif

    </section>
    @endif

    <!-- ═══════════════════════════════════════════════════════════════
         §4 · ARTICULATIONS · Phrase Precision · ARTS-001 · v1
         What the player can do for your cue. Universal scaffold:
         each card has play button + name + italic sub + 1-2 line description.
         Card count varies per instrument. Auto-fit grid handles any number.
         Audio loads on first play (deferred · zero network on page load).
         ═══════════════════════════════════════════════════════════════ -->
    @php $articulationTracks = $instrument->tracks->where('type', 'articulation'); @endphp
    @if ($articulationTracks->isNotEmpty())
    <section class="instr-arts" id="articulations" aria-labelledby="arts-title" data-reveal-stagger>

      <div class="instr-arts__head">
        <span class="instr-arts__eyebrow" data-reveal>Phrase precision</span>
        <h2 class="instr-arts__title" id="arts-title" data-reveal>
          The <span class="instr-arts__title-accent">articulations</span> a {{ Str::lower($instrument->name) }} player can deliver
        </h2>
        <p class="instr-arts__sub" data-reveal>
          What you can specify in the brief. Tap any name to hear a short demo. These are the moves that turn a melody into a phrase.
        </p>
      </div>

      <div class="instr-arts__grid player" data-reveal>
        @foreach ($articulationTracks as $track)
        @include('frontend.partials.recording-services-inner-track-card', ['track' => $track])
        @endforeach
      </div>
    </section>
    @endif


    <!-- ═══════════════════════════════════════════════════════════════
         §5 · SONIC PROFILE · Mix Fit · SONIC-001 · v1
         How the instrument behaves in a mix · written for the engineer.
         Single comprehensive card, no comparison. Crypto Cipher recommends
         per project — this section gives the data to make that decision.
         Universal scaffold · per-instrument variables filled inline.
         ═══════════════════════════════════════════════════════════════ -->
    @if (!is_null($instrument->sonic_range_start_pct))
    <section class="instr-sonic" id="sonic-profile" aria-labelledby="sonic-title" data-reveal-stagger>

      <div class="instr-sonic__head">
        <span class="instr-sonic__eyebrow" data-reveal>Sonic profile</span>
        <h2 class="instr-sonic__title" id="sonic-title" data-reveal>
          Where the <span class="instr-sonic__title-accent">{{ Str::lower($instrument->name) }}</span> sits in your mix
        </h2>
        <p class="instr-sonic__sub" data-reveal>
          The technical brief for engineers. Frequency, dynamics, stereo behavior, and what to watch for when you place {{ Str::lower($instrument->name) }} against the rest of your arrangement.
        </p>
      </div>

      <article class="sonic-card" data-reveal>

        <!-- ─── Frequency profile bar ─── -->
        <div class="sonic-block sonic-freq">
          <span class="sonic-block__label">Frequency range</span>

          <div class="sonic-freq__bar" style="--range-start: {{ $instrument->sonic_range_start_pct }}%; --range-end: {{ $instrument->sonic_range_end_pct }}%; --sweet: {{ $instrument->sonic_sweet_pct }}%;">
            <div class="sonic-freq__range"></div>
            <div class="sonic-freq__sweet" data-label="{{ $instrument->sonic_sweet_label }}"></div>
          </div>

          <div class="sonic-freq__scale">
            <span>20Hz</span>
            <span>200</span>
            <span>2kHz</span>
            <span>20kHz</span>
          </div>

          @if ($instrument->sonic_range_caption)
          <p class="sonic-freq__caption">
            {!! $instrument->sonic_range_caption !!}
          </p>
          @endif
        </div>

        <!-- ─── 3-up engineering specs ─── -->
        <div class="sonic-specs">
          @if ($instrument->sonic_dynamic_range_value)
          <div class="sonic-spec">
            <span class="sonic-spec__label">Dynamic range</span>
            <span class="sonic-spec__value">{{ $instrument->sonic_dynamic_range_value }}</span>
            <span class="sonic-spec__detail">{!! $instrument->sonic_dynamic_range_detail !!}</span>
          </div>
          @endif
          @if ($instrument->sonic_stereo_value)
          <div class="sonic-spec">
            <span class="sonic-spec__label">Stereo behavior</span>
            <span class="sonic-spec__value">{{ $instrument->sonic_stereo_value }}</span>
            <span class="sonic-spec__detail">{!! $instrument->sonic_stereo_detail !!}</span>
          </div>
          @endif
          @if ($instrument->sonic_mic_value)
          <div class="sonic-spec">
            <span class="sonic-spec__label">Mic technique</span>
            <span class="sonic-spec__value">{{ $instrument->sonic_mic_value }}</span>
            <span class="sonic-spec__detail">{!! $instrument->sonic_mic_detail !!}</span>
          </div>
          @endif
        </div>

      </article>

    </section>
    @endif

    <!-- ═══════════════════════════════════════════════════════════════
         §6 · PAIRS WELL WITH · Cross-sell · PAIRS-001 · v1
         3 cards (variable per instrument). Universal scaffold.
         For sitar: Tabla (rhythmic) · Tanpura (drone) · Bansuri (melodic)
         Per-instrument changes: card count, icons, copy, hrefs.
         ═══════════════════════════════════════════════════════════════ -->
    @if ($instrument->pairs->isNotEmpty())
    <section class="instr-pairs" id="pairs-well-with" aria-labelledby="pairs-title" data-reveal-stagger>

      <div class="instr-pairs__head">
        <span class="instr-pairs__eyebrow" data-reveal>Pairs well with</span>
        <h2 class="instr-pairs__title" id="pairs-title" data-reveal>
          Build the full <span class="instr-pairs__title-accent">cue</span> with these
        </h2>
        <p class="instr-pairs__sub" data-reveal>
          {{ $instrument->name }} rarely sits alone in a recording. These are the instruments that lock with it most often — book together for cohesive sessions.
        </p>
      </div>

      <div class="instr-pairs__grid" data-reveal>
        @foreach ($instrument->pairs as $pair)
        @continue (!$pair->pairedInstrument)
        <a class="pair-card" href="{{ $pair->pairedInstrument->detailUrl() }}" aria-label="Explore {{ $pair->pairedInstrument->name }}">
          <div class="pair-card__icon" aria-hidden="true">
            @if ($pair->pairedInstrument->hasCustomIcon())
            <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">{!! $pair->pairedInstrument->icon_svg !!}</svg>
            @else
            <span style="display:flex;align-items:center;justify-content:center;width:100%;height:100%;font-weight:700;font-size:1.1rem;">{{ $pair->pairedInstrument->iconSvgOrMonogram() }}</span>
            @endif
          </div>
          <div class="pair-card__title-block">
            <h3 class="pair-card__name">{{ $pair->pairedInstrument->name }}</h3>
            <span class="pair-card__sub">{{ $pair->relationship_label }}</span>
          </div>
          <p class="pair-card__desc">
            {{ $pair->description }}
          </p>
          @if (!empty($pair->why_bullets))
          <div class="pair-card__why">
            <span class="pair-card__why-label">Why pair</span>
            <ul class="pair-card__why-list">
              @foreach ($pair->why_bullets as $bullet)
              <li class="pair-card__why-item">{!! $bullet !!}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <span class="pair-card__cta">
            Explore {{ Str::lower($pair->pairedInstrument->name) }}
            <span class="pair-card__cta-arrow" aria-hidden="true">→</span>
          </span>
        </a>
        @endforeach
      </div>

    </section>
    @endif

    <!-- ═══════════════════════════════════════════════════════════════
         §7 · KONTAKT INSTRUMENTS CROSS-SELL STRIP · INSTANT-001 · v2
         Single horizontal strip · cross-sells the broader Kontakt range
         to composers booking a sitar session. Honest framing — no
         pretending sitar exists in the library yet.
         Per-instrument: title language adapts (e.g. "...your tabla session"),
         href stays /libraries (browse the full range).
         ═══════════════════════════════════════════════════════════════ -->
    <a class="instant-strip" href="{{ route('shop') }}" data-reveal aria-label="Browse Crypto Cipher Kontakt instruments">
      <div class="instant-strip__icon" aria-hidden="true">
        <!-- Layered stack icon — "layer them under your session" cue -->
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 3 L21 8 L12 13 L3 8 Z"/>
          <path d="M3 12 L12 17 L21 12" fill="none"/>
          <path d="M3 16 L12 21 L21 16" fill="none"/>
        </svg>
      </div>
      <div class="instant-strip__body">
        <span class="instant-strip__label">Kontakt instruments</span>
        <span class="instant-strip__title">The full Crypto Cipher palette — <em>tabla, harmonium, ancient voices</em> — ready to play in your DAW today.</span>
        <span class="instant-strip__sub">Layer them under your {{ Str::lower($instrument->name) }} session, or build the entire cue in Kontakt while you wait for the recording.</span>
      </div>
      <span class="instant-strip__cta">
        Browse the range
        <span class="instant-strip__cta-arrow" aria-hidden="true">→</span>
      </span>
    </a>

    <!-- ═══════════════════════════════════════════════════════════════
         §8 · FAQ · Booking blockers · FAQ-001 · v1
         6 questions covering custom asks, turnaround, takes/edits,
         notation/references, pricing, revisions.
         Native <details>/<summary> for accessibility (no JS needed).
         ═══════════════════════════════════════════════════════════════ -->
    @if ($instrument->faqs->isNotEmpty())
    <section class="instr-faq" id="faq" aria-labelledby="faq-title" data-reveal-stagger>

      <div class="instr-faq__head">
        <span class="instr-faq__eyebrow" data-reveal>Frequently asked</span>
        <h2 class="instr-faq__title" id="faq-title" data-reveal>
          Before you <span class="instr-faq__title-accent">book</span>
        </h2>
        <p class="instr-faq__sub" data-reveal>
          The questions composers and producers ask before commissioning a {{ Str::lower($instrument->name) }} recording. If yours isn't here, write to us — we'll answer directly.
        </p>
      </div>

      <div class="instr-faq__list" data-reveal>
        @foreach ($instrument->faqs as $faq)
        <details class="faq-item">
          <summary class="faq-item__summary">
            <h3 class="faq-item__q">{{ $faq->question }}</h3>
            <span class="faq-item__icon" aria-hidden="true"></span>
          </summary>
          <div class="faq-item__body">
            <p class="faq-item__a">
              {!! $faq->answer !!}
            </p>
          </div>
        </details>
        @endforeach

      </div>

      <!-- Closing CTA below the FAQ — routes to the booking form (not off-form contact) -->
      <div class="faq-still-stuck" data-reveal>
        <p class="faq-still-stuck__text">
          <strong>Ready to brief your session?</strong> Send us the details and we usually reply within one working day with a clear yes, no, or proposal.
        </p>
        <button type="button" class="faq-still-stuck__cta" data-open-booking>
          Book a session
          <span class="faq-still-stuck__cta-arrow" aria-hidden="true">→</span>
        </button>
      </div>

    </section>
    @endif

  </div>

</main>
