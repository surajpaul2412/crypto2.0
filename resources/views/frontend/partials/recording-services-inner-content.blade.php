<main id="main" tabindex="-1" class="instr">

  <!-- ────────────────────────────────────────────
       SIDENAV-001 — Unified Side Nav
       Active section: recording-services
       Sitar instrument expanded inline with artist tiers
       ──────────────────────────────────────────── -->
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
              <li><a href="/library/voices-of-ancient-india" class="sidenav__item"><span class="sidenav__item-name">Voices of Ancient India</span></a></li>
              <li><a href="/library/solo-tabla" class="sidenav__item"><span class="sidenav__item-name">Solo Tabla</span></a></li>
              <li><a href="/library/bollywood-harmonium" class="sidenav__item"><span class="sidenav__item-name">Bollywood Harmonium</span></a></li>
              <li><a href="/library/solo-dholak" class="sidenav__item"><span class="sidenav__item-name">Solo Dholak</span></a></li>
              <li><a href="/library/voices-of-ragas-vol-1" class="sidenav__item"><span class="sidenav__item-name">Voices of Ragas Vol 1</span></a></li>
              <li><a href="/library/voices-of-ragas-vol-2" class="sidenav__item"><span class="sidenav__item-name">Voices of Ragas Vol 2</span></a></li>
              <li><a href="/library/tabla-tarang" class="sidenav__item"><span class="sidenav__item-name">Tabla Tarang</span></a></li>
              <li><a href="/library/tabla-loops" class="sidenav__item"><span class="sidenav__item-name">Tabla Loops</span></a></li>
              <li><a href="/library/dholak-loops" class="sidenav__item"><span class="sidenav__item-name">Dholak Loops</span></a></li>
              <li><a href="/library/swarmandal" class="sidenav__item"><span class="sidenav__item-name">Swarmandal</span></a></li>
              <li><a href="/library/tarangs" class="sidenav__item"><span class="sidenav__item-name">Tarangs</span></a></li>
              <li><a href="/library/tongue-drum" class="sidenav__item"><span class="sidenav__item-name">Tongue Drum</span></a></li>
              <li><a href="/library/bol-tabla-mouth-percussion" class="sidenav__item"><span class="sidenav__item-name">BOL — Tabla Mouth Perc.</span></a></li>
              <li><a href="/library/terry-and-bells" class="sidenav__item"><span class="sidenav__item-name">Terry &amp; Bells</span></a></li>
            </ul>
            <a href="/libraries" class="sidenav__footer-link">View all libraries <span class="sidenav__footer-link-arrow">→</span></a>
          </div>
        </div>
      </div>
    </section>

    <!-- ─── SECTION 2: RECORDING SERVICES (single CTA · no expand · no artists) ─── -->
    <section class="sidenav__section sidenav__section--cta" data-section="recording-services">
        <a href="{{ route('recording-services') }}" class="sidenav__cta-link" aria-label="View Recording Services">
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
        <a href="{{ route('heritage-performances') }}" class="sidenav__cta-link" aria-label="View Heritage Films">
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
          <span class="instr-hero__breadcrumb-sep">·</span>
          <span>Strings</span>
        </div>

        <h1 class="instr-hero__title" id="hero-title">
          <span class="instr-hero__title-word">Sitar</span>
        </h1>

        <h2 class="instr-hero__subhead" data-reveal>
          <span class="instr-hero__subhead-accent">Indian Sitar Recording Sessions</span>
          — custom live recordings for film, game &amp; OTT composers, performed by master Hindustani sitarists.
        </h2>

        <p class="instr-hero__tagline" data-reveal>
          India's voice of longing — bent notes, sympathetic resonance, the sound that tells the West it's hearing the East.
        </p>
      </div>

      <!-- VIDEO STAGE: main 16:9 frame + thumbnail rail · multi-video tab switcher -->
      <div class="instr-hero__stage" data-reveal>
        <!-- ─── Main video frame · src swaps on thumbnail click ─── -->
        <div class="instr-hero__video"
             id="hero-video"
             role="button"
             tabindex="0"
             aria-label="Play active video"
             data-yt-id="3gs_d_QgpUY">
          <img class="instr-hero__video-poster"
               src="https://i.ytimg.com/vi/3gs_d_QgpUY/maxresdefault.jpg"
               onerror="this.onerror=null;this.src='https://i.ytimg.com/vi/3gs_d_QgpUY/hqdefault.jpg';"
               alt="Sitar performance video poster"
               loading="lazy"
               width="1280"
               height="720">
          <div class="instr-hero__video-overlay" aria-hidden="true"></div>
          <div class="instr-hero__video-highlight" id="hero-video-highlight" aria-hidden="true"></div>
          <div class="instr-hero__video-play" aria-hidden="true">
            <svg viewBox="0 0 24 24" aria-hidden="true"><polygon points="6 4 20 12 6 20 6 4"/></svg>
          </div>
          <div class="instr-hero__video-caption" aria-hidden="true">
            <span class="instr-hero__video-caption-title" id="hero-video-caption">Performance — sitar in cinematic context</span>
            <span class="instr-hero__video-caption-meta">▶ Watch film</span>
          </div>
        </div>

        <!-- ─── Thumbnail rail · 4 videos · scroll-snap on mobile ─── -->
        <div class="instr-hero__rail" role="tablist" aria-label="Sitar video selection">

          <button class="instr-hero__rail-thumb is-active"
                  type="button"
                  role="tab"
                  aria-selected="true"
                  data-yt-id="3gs_d_QgpUY"
                  data-role="Performance"
                  data-caption="Performance — sitar in cinematic context"
                  aria-label="Performance · 2:14">
            <span class="instr-hero__rail-thumb-img-wrap">
              <img class="instr-hero__rail-thumb-img"
                   src="https://i.ytimg.com/vi/3gs_d_QgpUY/hqdefault.jpg"
                   onerror="this.onerror=null;this.src='https://i.ytimg.com/vi/3gs_d_QgpUY/mqdefault.jpg';"
                   alt=""
                   loading="lazy">
            </span>
            <span class="instr-hero__rail-thumb-overlay" aria-hidden="true"></span>
            <span class="instr-hero__rail-thumb-active-dot" aria-hidden="true"></span>
            <span class="instr-hero__rail-thumb-duration">2:14</span>
            <span class="instr-hero__rail-thumb-play" aria-hidden="true">
              <svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20"/></svg>
            </span>
            <span class="instr-hero__rail-thumb-role">Performance</span>
          </button>

          <button class="instr-hero__rail-thumb"
                  type="button"
                  role="tab"
                  aria-selected="false"
                  data-yt-id="OQAoEcZ7-JM"
                  data-role="Studio Session"
                  data-caption="Studio Session — recording the take"
                  aria-label="Studio Session · 5:32">
            <span class="instr-hero__rail-thumb-img-wrap">
              <img class="instr-hero__rail-thumb-img"
                   src="https://i.ytimg.com/vi/OQAoEcZ7-JM/hqdefault.jpg"
                   onerror="this.onerror=null;this.src='https://i.ytimg.com/vi/OQAoEcZ7-JM/mqdefault.jpg';"
                   alt=""
                   loading="lazy">
            </span>
            <span class="instr-hero__rail-thumb-overlay" aria-hidden="true"></span>
            <span class="instr-hero__rail-thumb-active-dot" aria-hidden="true"></span>
            <span class="instr-hero__rail-thumb-duration">5:32</span>
            <span class="instr-hero__rail-thumb-play" aria-hidden="true">
              <svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20"/></svg>
            </span>
            <span class="instr-hero__rail-thumb-role">Studio Session</span>
          </button>

          <!-- NOTE: thumbnail #3 reuses YT id OQAoEcZ7-JM (per user direction).
               Swap data-yt-id when a unique third video is available. -->
          <button class="instr-hero__rail-thumb"
                  type="button"
                  role="tab"
                  aria-selected="false"
                  data-yt-id="OQAoEcZ7-JM"
                  data-role="Heritage Story"
                  data-caption="Heritage Story — the lineage of sitar"
                  aria-label="Heritage Story · 12:01">
            <span class="instr-hero__rail-thumb-img-wrap">
              <img class="instr-hero__rail-thumb-img"
                   src="https://i.ytimg.com/vi/OQAoEcZ7-JM/hqdefault.jpg"
                   onerror="this.onerror=null;this.src='https://i.ytimg.com/vi/OQAoEcZ7-JM/mqdefault.jpg';"
                   alt=""
                   loading="lazy">
            </span>
            <span class="instr-hero__rail-thumb-overlay" aria-hidden="true"></span>
            <span class="instr-hero__rail-thumb-active-dot" aria-hidden="true"></span>
            <span class="instr-hero__rail-thumb-duration">12:01</span>
            <span class="instr-hero__rail-thumb-play" aria-hidden="true">
              <svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20"/></svg>
            </span>
            <span class="instr-hero__rail-thumb-role">Heritage Story</span>
          </button>

          <button class="instr-hero__rail-thumb"
                  type="button"
                  role="tab"
                  aria-selected="false"
                  data-yt-id="VYRK4jERXns"
                  data-role="Solo Showcase"
                  data-caption="Solo Showcase — pure musicianship"
                  aria-label="Solo Showcase · 1:48">
            <span class="instr-hero__rail-thumb-img-wrap">
              <img class="instr-hero__rail-thumb-img"
                   src="https://i.ytimg.com/vi/VYRK4jERXns/hqdefault.jpg"
                   onerror="this.onerror=null;this.src='https://i.ytimg.com/vi/VYRK4jERXns/mqdefault.jpg';"
                   alt=""
                   loading="lazy">
            </span>
            <span class="instr-hero__rail-thumb-overlay" aria-hidden="true"></span>
            <span class="instr-hero__rail-thumb-active-dot" aria-hidden="true"></span>
            <span class="instr-hero__rail-thumb-duration">1:48</span>
            <span class="instr-hero__rail-thumb-play" aria-hidden="true">
              <svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20"/></svg>
            </span>
            <span class="instr-hero__rail-thumb-role">Solo Showcase</span>
          </button>

        </div>
      </div>

      <!-- BOOKING ACTION ROW: full-width · CTA + credits scroll + trust badges -->
      <div class="instr-hero__decision">

        <aside class="instr-hero__action" data-reveal aria-label="Book a sitar session">

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

    <!-- ═══════════════════════════════════════════════════════════════
         §1B AUDIO DEMOS — "What sitar sounds like"
         3 demo cards · cc-demo-player engine v7 · MediaElement backend
         Variable count: add/remove .track-card blocks freely.
         ═══════════════════════════════════════════════════════════════ -->
    <section class="instr-demos" id="demos" aria-labelledby="demos-title">

      <div class="instr-demos__head">
        <span class="instr-demos__eyebrow" data-reveal>Listen</span>
        <h2 class="instr-demos__title" id="demos-title" data-reveal>
          What <span class="instr-demos__title-accent">sitar</span> sounds like
        </h2>
        <p class="instr-demos__sub" data-reveal>
          Three short cues — each cherry-picked to show a different facet of the instrument.
          Click any card to play. Only one plays at a time.
        </p>
      </div>

      <div class="instr-demos__grid player" id="demos-grid">

        <!-- ─── Demo 1: Slow Alaap (Cinematic) ─── -->
        <article class="track-card player__row"
                 data-track="vocal00001_1.2" data-src="audio/vocal00001_1.2.wav" data-peaks="audio/peaks/vocal00001_1.2.json"
                 data-reveal>
          <div class="track-card__top">
            <span class="track-card__tag">
              <span class="track-card__tag-dot" aria-hidden="true"></span>
              Cinematic
            </span>
          </div>

          <h3 class="track-card__title">Slow Alaap</h3>
          <p class="track-card__desc">
            Free-time exposition · meend, andolan, no rhythm — pure emotional wash. For opening cues, intros, and sacred moments.
          </p>

          <div class="track-card__player">
            <button class="track-card__play player__play" type="button" aria-label="Play Slow Alaap demo">
              <svg class="track-card__icon-play" viewBox="0 0 24 24" aria-hidden="true">
                <polygon points="6 4 20 12 6 20"/>
              </svg>
              <svg class="track-card__icon-pause" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="6" y="4" width="4" height="16" rx="1"/>
                <rect x="14" y="4" width="4" height="16" rx="1"/>
              </svg>
              <svg class="track-card__icon-loading" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true">
                <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
              </svg>
            </button>
            <div class="track-card__wave player__wave">
              <div class="track-card__wave-skeleton" aria-hidden="true"></div>
            </div>
          </div>

          <div class="track-card__time" aria-hidden="true">
            <span class="track-card__time-current player__elapsed" data-time-current>0:00</span>
            <span class="track-card__time-total player__duration" data-time-total></span>
          </div>
        </article>

        <!-- ─── Demo 2: Mid-Tempo Jod (Groove) ─── -->
        <article class="track-card player__row"
                 data-track="vocal00002_1.1" data-src="audio/vocal00002_1.1.wav" data-peaks="audio/peaks/vocal00002_1.1.json"
                 data-reveal>
          <div class="track-card__top">
            <span class="track-card__tag">
              <span class="track-card__tag-dot" aria-hidden="true"></span>
              Groove
            </span>
          </div>

          <h3 class="track-card__title">Mid-Tempo Jod</h3>
          <p class="track-card__desc">
            Pulsed mid-tempo with chikari drone strums — perfect for chase scenes, journey cues, and rising tension.
          </p>

          <div class="track-card__player">
            <button class="track-card__play player__play" type="button" aria-label="Play Mid-Tempo Jod demo">
              <svg class="track-card__icon-play" viewBox="0 0 24 24" aria-hidden="true">
                <polygon points="6 4 20 12 6 20"/>
              </svg>
              <svg class="track-card__icon-pause" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="6" y="4" width="4" height="16" rx="1"/>
                <rect x="14" y="4" width="4" height="16" rx="1"/>
              </svg>
              <svg class="track-card__icon-loading" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true">
                <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
              </svg>
            </button>
            <div class="track-card__wave player__wave">
              <div class="track-card__wave-skeleton" aria-hidden="true"></div>
            </div>
          </div>

          <div class="track-card__time" aria-hidden="true">
            <span class="track-card__time-current player__elapsed" data-time-current>0:00</span>
            <span class="track-card__time-total player__duration" data-time-total></span>
          </div>
        </article>

        <!-- ─── Demo 3: Fast Jhala (Virtuosic) ─── -->
        <article class="track-card player__row"
                 data-track="vocal00003_1.1" data-src="audio/vocal00003_1.1.wav" data-peaks="audio/peaks/vocal00003_1.1.json"
                 data-reveal>
          <div class="track-card__top">
            <span class="track-card__tag">
              <span class="track-card__tag-dot" aria-hidden="true"></span>
              Virtuosic
            </span>
          </div>

          <h3 class="track-card__title">Fast Jhala</h3>
          <p class="track-card__desc">
            Rapid drone strumming with virtuosic taans — climactic, ecstatic, the sound of full devotional release.
          </p>

          <div class="track-card__player">
            <button class="track-card__play player__play" type="button" aria-label="Play Fast Jhala demo">
              <svg class="track-card__icon-play" viewBox="0 0 24 24" aria-hidden="true">
                <polygon points="6 4 20 12 6 20"/>
              </svg>
              <svg class="track-card__icon-pause" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="6" y="4" width="4" height="16" rx="1"/>
                <rect x="14" y="4" width="4" height="16" rx="1"/>
              </svg>
              <svg class="track-card__icon-loading" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true">
                <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
              </svg>
            </button>
            <div class="track-card__wave player__wave">
              <div class="track-card__wave-skeleton" aria-hidden="true"></div>
            </div>
          </div>

          <div class="track-card__time" aria-hidden="true">
            <span class="track-card__time-current player__elapsed" data-time-current>0:00</span>
            <span class="track-card__time-total player__duration" data-time-total></span>
          </div>
        </article>

      </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════
         §2 WHAT THIS INSTRUMENT BRINGS
         2×2 glass card grid · 4 angles: emotional, cinematic, iconic, cultural
         Real Crypto Cipher® copy · composer-aware · grounded in lineage
         ═══════════════════════════════════════════════════════════════ -->
    <section class="instr-brings" id="brings" aria-labelledby="brings-title">

      <div class="instr-brings__head">
        <span class="instr-brings__eyebrow" data-reveal>What it brings</span>
        <h2 class="instr-brings__title" id="brings-title" data-reveal>
          The case for <span class="instr-brings__title-accent">sitar</span>
        </h2>
        <p class="instr-brings__sub" data-reveal>
          Four angles a film, game, or OTT composer needs before booking — what it feels like, where it fits, where you've heard it, and where it comes from.
        </p>
      </div>

      <div class="instr-brings__grid">

        <!-- ─── Card 1: Emotional role ─── -->
        <article class="brings-card" data-reveal>
          <div class="brings-card__icon" aria-hidden="true">
            <!-- Heart-wave: emotional resonance -->
            <svg viewBox="0 0 24 24">
              <path d="M3 12h3l2-4 3 8 2-6 2 4 2-2 4 0"/>
            </svg>
          </div>
          <span class="brings-card__eyebrow">Emotional role</span>
          <h3 class="brings-card__title">The voice of longing.</h3>
          <p class="brings-card__body">
            Sitar speaks in <em>meend</em> — pitch bent across frets like a vocalist sliding between syllables. Sympathetic strings ring underneath without being struck, creating the sound of a memory replying to itself. It carries yearning, devotion, and the ache of distance better than any other South Asian instrument.
          </p>
        </article>

        <!-- ─── Card 2: Cinematic fit ─── -->
        <article class="brings-card" data-reveal>
          <div class="brings-card__icon" aria-hidden="true">
            <!-- Film frame: cinematic fit -->
            <svg viewBox="0 0 24 24">
              <rect x="3" y="5" width="18" height="14" rx="1.5"/>
              <path d="M3 9h3M3 13h3M3 17h3M18 9h3M18 13h3M18 17h3"/>
            </svg>
          </div>
          <span class="brings-card__eyebrow">Cinematic fit</span>
          <h3 class="brings-card__title">Where it earns its place.</h3>
          <p class="brings-card__body">
            Opening cues that set a world apart from the West. Transitions where memory enters a scene. Sacred or contemplative moments. Pairs cleanly with cello, low strings, ambient pads, and processed textures. Not for chase cues, action stings, or anything requiring rhythmic aggression — for those, choose tabla or sarod.
          </p>
        </article>

        <!-- ─── Card 3: Iconic uses ─── -->
        <article class="brings-card" data-reveal>
          <div class="brings-card__icon" aria-hidden="true">
            <!-- Award/star: iconic uses -->
            <svg viewBox="0 0 24 24">
              <polygon points="12 3 14.5 9 21 9.5 16 14 17.5 21 12 17.5 6.5 21 8 14 3 9.5 9.5 9"/>
            </svg>
          </div>
          <span class="brings-card__eyebrow">Iconic uses</span>
          <h3 class="brings-card__title">Where you've already heard it.</h3>
          <p class="brings-card__body">
            Ravi Shankar's <em>Pather Panchali</em> score (1955) wrote the playbook. The Beatles' <em>Norwegian Wood</em> (1965) put it in pop. <em>Slumdog Millionaire</em>, <em>Life of Pi</em>, <em>Inception</em>'s Mumbai sequences, <em>The Best Exotic Marigold Hotel</em> — the vocabulary is established. Composers reach for sitar when a cue needs to feel both intimate and elsewhere.
          </p>
        </article>

        <!-- ─── Card 4: Cultural context ─── -->
        <article class="brings-card" data-reveal>
          <div class="brings-card__icon" aria-hidden="true">
            <!-- Lineage/scroll: cultural context -->
            <svg viewBox="0 0 24 24">
              <path d="M5 4h11l3 3v13H5z"/>
              <path d="M16 4v3h3"/>
              <path d="M8 11h8M8 14h8M8 17h5"/>
            </svg>
          </div>
          <span class="brings-card__eyebrow">Cultural context</span>
          <h3 class="brings-card__title">Where it comes from.</h3>
          <p class="brings-card__body">
            Hindustani classical music — refined over seven centuries in the courts of North India. The instrument as known today was shaped in the 18th century from the older <em>veena</em> family. Played sitting cross-legged, tuned per <em>raga</em>, performed in concert lengths from minutes to hours. Crypto Cipher's sitar sessions are recorded with master Hindustani performers — not session players approximating the style.
          </p>
        </article>

      </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════
         §3 THE INSTRUMENT UP CLOSE
         Part A: anatomy photo + hotspots + always-visible legend
         Part B: variants 3-card (which sitar to book)
         ═══════════════════════════════════════════════════════════════ -->
    <section class="instr-anatomy" id="anatomy" aria-labelledby="anatomy-title">

      <div class="instr-anatomy__head">
        <span class="instr-anatomy__eyebrow" data-reveal>Up close</span>
        <h2 class="instr-anatomy__title" id="anatomy-title" data-reveal>
          The <span class="instr-anatomy__title-accent">anatomy</span> of sitar
        </h2>
        <p class="instr-anatomy__sub" data-reveal>
          Five parts that shape what you hear in the recording. Hover or tap any number to focus on a part.
        </p>
      </div>

      <!-- ─── PART A: Anatomy stage (photo + legend side-by-side) ─── -->
      <div class="anatomy-stage" data-reveal>

        <div class="anatomy-photo anatomy-photo--tall" id="anatomy-photo" style="--photo-aspect: 1/2;">
          <!-- Inner frame · clipped with rounded edges · holds the SVG illustration -->
          <div class="anatomy-photo__frame" aria-hidden="true">
            <!-- Inline SVG sitar · proper proportions: large round gourd (35cm) + long thin neck (~85cm) + carved pegbox.
               viewBox 300×800 = 1:2.67 ratio matching real sitar. Dimensional shading via radial gradients. -->
          <svg class="anatomy-photo__svg" viewBox="0 0 400 800" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid meet">
            <defs>
              <!-- Main gourd · spherical with light from upper-left -->
              <radialGradient id="tumbuGrad" cx="38%" cy="32%" r="65%">
                <stop offset="0%"   stop-color="rgba(187,214,122,0.32)"/>
                <stop offset="35%"  stop-color="rgba(117,194,73,0.16)"/>
                <stop offset="100%" stop-color="rgba(8,12,18,0.95)"/>
              </radialGradient>
              <!-- Top tumba (smaller decorative gourd) -->
              <radialGradient id="topTumbaGrad" cx="38%" cy="35%" r="65%">
                <stop offset="0%"   stop-color="rgba(187,214,122,0.3)"/>
                <stop offset="40%"  stop-color="rgba(117,194,73,0.14)"/>
                <stop offset="100%" stop-color="rgba(8,12,18,0.9)"/>
              </radialGradient>
              <!-- Neck wood with cylindrical depth (light center, dark edges) -->
              <linearGradient id="neckGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%"   stop-color="rgba(0,0,0,0.65)"/>
                <stop offset="15%"  stop-color="rgba(117,194,73,0.08)"/>
                <stop offset="40%"  stop-color="rgba(187,214,122,0.18)"/>
                <stop offset="55%"  stop-color="rgba(187,214,122,0.16)"/>
                <stop offset="80%"  stop-color="rgba(117,194,73,0.06)"/>
                <stop offset="100%" stop-color="rgba(0,0,0,0.7)"/>
              </linearGradient>
              <!-- Pegbox gradient -->
              <linearGradient id="pegboxGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                <stop offset="0%"   stop-color="rgba(187,214,122,0.32)"/>
                <stop offset="100%" stop-color="rgba(117,194,73,0.12)"/>
              </linearGradient>
              <!-- Soundboard radial -->
              <radialGradient id="soundboardGrad" cx="50%" cy="40%" r="55%">
                <stop offset="0%"   stop-color="rgba(255,255,255,0.14)"/>
                <stop offset="100%" stop-color="rgba(187,214,122,0.04)"/>
              </radialGradient>
              <!-- Gourd inner shadow for sphere depth -->
              <radialGradient id="gourdShadow" cx="62%" cy="68%" r="55%">
                <stop offset="0%"   stop-color="rgba(0,0,0,0)"/>
                <stop offset="60%"  stop-color="rgba(0,0,0,0.3)"/>
                <stop offset="100%" stop-color="rgba(0,0,0,0.7)"/>
              </radialGradient>
            </defs>

            <!-- ════════════════════════════════════════════════════
                 TOP TUMBA · iconic sitar marker (smaller decorative gourd above pegbox)
                 The visual "tell" that distinguishes sitar from sarod.
                 ════════════════════════════════════════════════════ -->
            <g id="svg-top-tumba">
              <!-- Stem connecting top tumba to pegbox -->
              <rect x="195" y="44" width="10" height="14" fill="rgba(117,194,73,0.4)" stroke="rgba(187,214,122,0.5)" stroke-width="0.6"/>
              <!-- Top tumba body (smaller pumpkin shape) -->
              <path d="M 200 44 C 175 44, 158 28, 168 12 C 178 0, 222 0, 232 12 C 242 28, 225 44, 200 44 Z"
                    fill="url(#topTumbaGrad)" stroke="rgba(187,214,122,0.7)" stroke-width="1.2"/>
              <!-- Top tumba highlight -->
              <ellipse cx="186" cy="18" rx="14" ry="10" fill="rgba(255,255,255,0.06)"/>
              <!-- Top tumba inner shadow -->
              <path d="M 200 44 C 175 44, 158 28, 168 12 C 178 0, 222 0, 232 12 C 242 28, 225 44, 200 44 Z"
                    fill="url(#gourdShadow)" opacity="0.5"/>
            </g>

            <!-- ════════════════════════════════════════════════════
                 PEGBOX · long carved scroll with main tuning pegs
                 ════════════════════════════════════════════════════ -->
            <g id="svg-pegbox">
              <!-- Pegbox body — elongated, slightly tapered -->
              <path d="M 184 60 L 178 130 L 222 130 L 216 60 Q 210 52, 200 52 Q 190 52, 184 60 Z"
                    fill="url(#pegboxGrad)" stroke="rgba(187,214,122,0.85)" stroke-width="1.4"/>
              <!-- Pegbox depth shadow on right side -->
              <path d="M 222 130 L 216 60 Q 210 52, 200 52 L 200 130 Z" fill="rgba(0,0,0,0.3)"/>
              <!-- Decorative seam down center of pegbox -->
              <line x1="200" y1="58" x2="200" y2="130" stroke="rgba(255,255,255,0.06)" stroke-width="0.5"/>
              <!-- Tuning pegs · 6 carved pegs (3 each side) -->
              <g fill="rgba(187,214,122,0.7)" stroke="rgba(255,255,255,0.3)" stroke-width="0.5">
                <rect x="156" y="70" width="28" height="5" rx="2.5"/>
                <rect x="156" y="84" width="28" height="5" rx="2.5"/>
                <rect x="156" y="98" width="28" height="5" rx="2.5"/>
                <rect x="216" y="70" width="28" height="5" rx="2.5"/>
                <rect x="216" y="84" width="28" height="5" rx="2.5"/>
                <rect x="216" y="98" width="28" height="5" rx="2.5"/>
              </g>
              <g fill="rgba(187,214,122,0.6)" stroke="rgba(255,255,255,0.4)" stroke-width="0.5">
                <ellipse cx="155" cy="72.5" rx="4" ry="3"/>
                <ellipse cx="155" cy="86.5" rx="4" ry="3"/>
                <ellipse cx="155" cy="100.5" rx="4" ry="3"/>
                <ellipse cx="245" cy="72.5" rx="4" ry="3"/>
                <ellipse cx="245" cy="86.5" rx="4" ry="3"/>
                <ellipse cx="245" cy="100.5" rx="4" ry="3"/>
              </g>
            </g>

            <!-- ════════════════════════════════════════════════════
                 NECK · long fingerboard (3× gourd diameter — sitar's defining proportion)
                 Cylindrical depth via gradient (light center, dark edges)
                 ════════════════════════════════════════════════════ -->
            <g id="svg-neck">
              <path d="M 178 130 L 174 600 L 226 600 L 222 130 Z"
                    fill="url(#neckGrad)" stroke="rgba(255,255,255,0.22)" stroke-width="1.2"/>
              <!-- Right cylindrical shadow -->
              <path d="M 215 130 L 213 600 L 226 600 L 222 130 Z" fill="rgba(0,0,0,0.35)"/>
              <!-- Left cylindrical shadow -->
              <path d="M 178 130 L 174 600 L 187 600 L 185 130 Z" fill="rgba(0,0,0,0.2)"/>
              <!-- Center highlight strip (round suggestion) -->
              <line x1="200" y1="135" x2="200" y2="595" stroke="rgba(255,255,255,0.08)" stroke-width="1.2"/>
            </g>

            <!-- ════════════════════════════════════════════════════
                 PARDAS · curved movable frets (signature sitar element)
                 ════════════════════════════════════════════════════ -->
            <g id="svg-pardas">
              <!-- Shadow layer (raised effect) -->
              <g stroke="rgba(0,0,0,0.5)" stroke-width="2" fill="none" stroke-linecap="round" transform="translate(0, 1.5)">
                <path d="M 176 160 Q 200 154, 224 160"/>
                <path d="M 176 188 Q 200 182, 224 188"/>
                <path d="M 176 215 Q 200 209, 224 215"/>
                <path d="M 177 240 Q 200 234, 223 240"/>
                <path d="M 177 263 Q 200 257, 223 263"/>
                <path d="M 178 285 Q 200 279, 222 285"/>
                <path d="M 178 305 Q 200 299, 222 305"/>
                <path d="M 179 324 Q 200 318, 221 324"/>
                <path d="M 179 342 Q 200 336, 221 342"/>
                <path d="M 180 359 Q 200 353, 220 359"/>
                <path d="M 180 374 Q 200 368, 220 374"/>
                <path d="M 181 388 Q 200 382, 219 388"/>
                <path d="M 181 401 Q 200 395, 219 401"/>
                <path d="M 182 413 Q 200 407, 218 413"/>
                <path d="M 182 425 Q 200 419, 218 425"/>
                <path d="M 183 436 Q 200 430, 217 436"/>
                <path d="M 183 446 Q 200 440, 217 446"/>
                <path d="M 184 456 Q 200 450, 216 456"/>
                <path d="M 184 466 Q 200 460, 216 466"/>
              </g>
              <g stroke="rgba(187,214,122,0.85)" stroke-width="1.5" fill="none" stroke-linecap="round">
                <path d="M 176 160 Q 200 154, 224 160"/>
                <path d="M 176 188 Q 200 182, 224 188"/>
                <path d="M 176 215 Q 200 209, 224 215"/>
                <path d="M 177 240 Q 200 234, 223 240"/>
                <path d="M 177 263 Q 200 257, 223 263"/>
                <path d="M 178 285 Q 200 279, 222 285"/>
                <path d="M 178 305 Q 200 299, 222 305"/>
                <path d="M 179 324 Q 200 318, 221 324"/>
                <path d="M 179 342 Q 200 336, 221 342"/>
                <path d="M 180 359 Q 200 353, 220 359"/>
                <path d="M 180 374 Q 200 368, 220 374"/>
                <path d="M 181 388 Q 200 382, 219 388"/>
                <path d="M 181 401 Q 200 395, 219 401"/>
                <path d="M 182 413 Q 200 407, 218 413"/>
                <path d="M 182 425 Q 200 419, 218 425"/>
                <path d="M 183 436 Q 200 430, 217 436"/>
                <path d="M 183 446 Q 200 440, 217 446"/>
                <path d="M 184 456 Q 200 450, 216 456"/>
                <path d="M 184 466 Q 200 460, 216 466"/>
              </g>
            </g>

            <!-- ════════════════════════════════════════════════════
                 BAAJ TAR · main playing strings
                 ════════════════════════════════════════════════════ -->
            <g id="svg-baaj" stroke="rgba(255,255,255,0.85)" stroke-width="1" stroke-linecap="round">
              <line x1="190" y1="135" x2="186" y2="595"/>
              <line x1="195" y1="135" x2="193" y2="595"/>
              <line x1="200" y1="135" x2="200" y2="595"/>
              <line x1="205" y1="135" x2="207" y2="595"/>
              <line x1="210" y1="135" x2="214" y2="595"/>
            </g>

            <!-- ════════════════════════════════════════════════════
                 TARAB · sympathetic strings + side pegs
                 ════════════════════════════════════════════════════ -->
            <g id="svg-tarab">
              <g stroke="rgba(117,194,73,0.65)" stroke-width="0.65" stroke-linecap="round">
                <line x1="172" y1="280" x2="180" y2="595"/>
                <line x1="172" y1="298" x2="181" y2="595"/>
                <line x1="172" y1="316" x2="183" y2="595"/>
                <line x1="172" y1="332" x2="184" y2="595"/>
                <line x1="172" y1="346" x2="186" y2="595"/>
                <line x1="172" y1="360" x2="187" y2="595"/>
                <line x1="172" y1="372" x2="189" y2="595"/>
              </g>
              <g fill="rgba(187,214,122,0.95)" stroke="rgba(255,255,255,0.4)" stroke-width="0.5">
                <circle cx="166" cy="280" r="2.6"/>
                <circle cx="166" cy="298" r="2.6"/>
                <circle cx="166" cy="316" r="2.6"/>
                <circle cx="166" cy="332" r="2.6"/>
                <circle cx="166" cy="346" r="2.6"/>
                <circle cx="166" cy="360" r="2.6"/>
                <circle cx="166" cy="372" r="2.6"/>
              </g>
            </g>

            <!-- ════════════════════════════════════════════════════
                 TUMBU · main gourd resonator (tear-drop shape with 3D depth)
                 ════════════════════════════════════════════════════ -->
            <g id="svg-tumbu">
              <!-- Floor shadow -->
              <ellipse cx="200" cy="775" rx="115" ry="9" fill="rgba(0,0,0,0.6)" opacity="0.7"/>
              <!-- Tear-drop gourd (narrows at top, widest below middle) -->
              <path d="M 200 600 C 132 600, 80 645, 80 695 C 80 745, 130 775, 200 775 C 270 775, 320 745, 320 695 C 320 645, 268 600, 200 600 Z"
                    fill="url(#tumbuGrad)" stroke="rgba(187,214,122,0.75)" stroke-width="1.6"/>
              <!-- Inner shadow for sphere depth -->
              <path d="M 200 600 C 132 600, 80 645, 80 695 C 80 745, 130 775, 200 775 C 270 745, 320 745, 320 695 C 320 645, 268 600, 200 600 Z"
                    fill="url(#gourdShadow)" opacity="0.7"/>
              <!-- Specular highlight on upper-left -->
              <ellipse cx="155" cy="650" rx="35" ry="22" fill="rgba(255,255,255,0.06)" transform="rotate(-25 155 650)"/>
              <!-- Soundboard -->
              <ellipse cx="200" cy="612" rx="100" ry="14" fill="url(#soundboardGrad)" stroke="rgba(187,214,122,0.6)" stroke-width="1.3"/>
              <!-- Bridge -->
              <rect x="180" y="603" width="40" height="14" rx="2" fill="rgba(255,255,255,0.22)" stroke="rgba(187,214,122,0.85)" stroke-width="1"/>
              <line x1="183" y1="606" x2="217" y2="606" stroke="rgba(255,255,255,0.5)" stroke-width="0.5"/>
              <!-- Decorative inlay rings -->
              <ellipse cx="200" cy="612" rx="80" ry="11" fill="none" stroke="rgba(187,214,122,0.2)" stroke-width="0.7"/>
              <ellipse cx="200" cy="612" rx="55" ry="8" fill="none" stroke="rgba(187,214,122,0.16)" stroke-width="0.7"/>
              <!-- Vertical seam -->
              <path d="M 200 626 Q 198 700, 200 770" fill="none" stroke="rgba(255,255,255,0.07)" stroke-width="0.6"/>
              <!-- String attachment notches -->
              <g stroke="rgba(255,255,255,0.45)" stroke-width="0.7">
                <line x1="186" y1="617" x2="186" y2="624"/>
                <line x1="192" y1="617" x2="192" y2="624"/>
                <line x1="198" y1="617" x2="198" y2="624"/>
                <line x1="204" y1="617" x2="204" y2="624"/>
                <line x1="210" y1="617" x2="210" y2="624"/>
                <line x1="216" y1="617" x2="216" y2="624"/>
              </g>
              <!-- Tail-piece -->
              <rect x="190" y="755" width="20" height="8" rx="1" fill="rgba(187,214,122,0.4)" stroke="rgba(255,255,255,0.3)" stroke-width="0.5"/>
            </g>
          </svg>
          </div>

          <!-- Hotspots: positioned via inline --x, --y CSS vars (% of photo).
               Tuned to land on the SVG sitar parts:
               1. Pegbox  (top center)
               2. Pardas  (mid neck)
               3. Baaj tar (lower neck — main strings)
               4. Tarab    (side of neck — sympathetic strings)
               5. Tumbu    (gourd body) -->
          <div class="anatomy-photo__hotspots" role="group" aria-label="Anatomy hotspots">

            <button class="anatomy-hotspot" type="button" data-anatomy-id="1" data-anchor="below"
                    style="--x: 50%; --y: 12%;"
                    aria-label="Pegbox &amp; tuning pegs · stable tuning across ragas">
              1
              <span class="anatomy-hotspot__tooltip" role="tooltip">
                <span class="anatomy-hotspot__tooltip-label">01 · Pegbox</span>
                <span class="anatomy-hotspot__tooltip-text">Carved tuning pegs hold pitch through long takes — essential for studio work.</span>
              </span>
            </button>

            <button class="anatomy-hotspot" type="button" data-anatomy-id="2" data-anchor="right"
                    style="--x: 60%; --y: 37%;"
                    aria-label="Movable frets — pardas · enable meend, the signature pitch bend">
              2
              <span class="anatomy-hotspot__tooltip" role="tooltip">
                <span class="anatomy-hotspot__tooltip-label">02 · Pardas</span>
                <span class="anatomy-hotspot__tooltip-text">Curved metal frets that move along the neck — enable <em>meend</em>, the vocal pitch bend that defines sitar.</span>
              </span>
            </button>

            <button class="anatomy-hotspot" type="button" data-anatomy-id="3" data-anchor="right"
                    style="--x: 60%; --y: 65%;"
                    aria-label="Main playing strings — baaj tar · the melody line">
              3
              <span class="anatomy-hotspot__tooltip" role="tooltip">
                <span class="anatomy-hotspot__tooltip-label">03 · Baaj tar</span>
                <span class="anatomy-hotspot__tooltip-text">The main playing strings — what your audience hears as the melody line in the cue.</span>
              </span>
            </button>

            <button class="anatomy-hotspot" type="button" data-anatomy-id="4" data-anchor="left"
                    style="--x: 41%; --y: 41%;"
                    aria-label="Sympathetic strings — tarab · the spectral halo under every note">
              4
              <span class="anatomy-hotspot__tooltip" role="tooltip">
                <span class="anatomy-hotspot__tooltip-label">04 · Tarab</span>
                <span class="anatomy-hotspot__tooltip-text">11–13 sympathetic strings ring underneath without being struck — the halo that makes sitar sound spectral and alive.</span>
              </span>
            </button>

            <button class="anatomy-hotspot" type="button" data-anatomy-id="5" data-anchor="above"
                    style="--x: 50%; --y: 87%;"
                    aria-label="Gourd resonator — tumbu · the full-bodied low-mid resonance">
              5
              <span class="anatomy-hotspot__tooltip" role="tooltip">
                <span class="anatomy-hotspot__tooltip-label">05 · Tumbu</span>
                <span class="anatomy-hotspot__tooltip-text">The gourd body — gives sitar its full-bodied mid-low resonance. Carved from a single dried pumpkin.</span>
              </span>
            </button>

          </div>
        </div>

        <!-- ─── INFO CARD · pill column + active part description ─── -->
        <div class="anatomy-info">

          <!-- Card header (idle state copy) -->
          <div class="anatomy-info__head">
            <span class="anatomy-info__eyebrow">Anatomy</span>
            <h3 class="anatomy-info__title">Five parts.<br/>One sitar voice.</h3>
            <p class="anatomy-info__sub">Tap any number on the photo or in the list — see what each part contributes to the cue.</p>
          </div>

          <!-- Pill column (vertical on desktop, scales to any count) -->
          <div class="anatomy-legend" role="list">

          <button class="anatomy-legend__item" type="button" data-anatomy-id="1" role="listitem">
            <span class="anatomy-legend__num">1</span>
            <span class="anatomy-legend__body">
              <span class="anatomy-legend__name">Pegbox</span>
              <span class="anatomy-legend__role">Carved tuning pegs · stable across long takes.</span>
            </span>
          </button>

          <button class="anatomy-legend__item" type="button" data-anatomy-id="2" role="listitem">
            <span class="anatomy-legend__num">2</span>
            <span class="anatomy-legend__body">
              <span class="anatomy-legend__name">Pardas <em>· movable frets</em></span>
              <span class="anatomy-legend__role">Curved metal · enable <em>meend</em>, the vocal pitch bend.</span>
            </span>
          </button>

          <button class="anatomy-legend__item" type="button" data-anatomy-id="3" role="listitem">
            <span class="anatomy-legend__num">3</span>
            <span class="anatomy-legend__body">
              <span class="anatomy-legend__name">Baaj tar <em>· main strings</em></span>
              <span class="anatomy-legend__role">The melody line — what audiences hear up front.</span>
            </span>
          </button>

          <button class="anatomy-legend__item" type="button" data-anatomy-id="4" role="listitem">
            <span class="anatomy-legend__num">4</span>
            <span class="anatomy-legend__body">
              <span class="anatomy-legend__name">Tarab <em>· sympathetic strings</em></span>
              <span class="anatomy-legend__role">11–13 strings ring underneath · spectral halo on every note.</span>
            </span>
          </button>

          <button class="anatomy-legend__item" type="button" data-anatomy-id="5" role="listitem">
            <span class="anatomy-legend__num">5</span>
            <span class="anatomy-legend__body">
              <span class="anatomy-legend__name">Tumbu <em>· gourd resonator</em></span>
              <span class="anatomy-legend__role">Carved from dried pumpkin · the full-bodied low-mid voice.</span>
            </span>
          </button>

        </div>

        <!-- Active-part description · always visible on desktop, mobile only when active -->
        <div class="anatomy-reveal" id="anatomy-reveal" aria-live="polite">
          <span class="anatomy-reveal__label" data-reveal-label></span>
          <span class="anatomy-reveal__text" data-reveal-text></span>
        </div>

        </div>
      </div>

      <!-- ─── PART B: Variants 3-card row ─── -->
      <div class="instr-variants">

        <div class="instr-variants__head">
          <span class="instr-variants__eyebrow" data-reveal>Variants</span>
          <h3 class="instr-variants__title" data-reveal>Three flavors. Different cues, different schools.</h3>
          <p class="instr-variants__sub" data-reveal>
            Sitar isn't one thing. The school of playing and the tuning shape the character. Pick the one that suits your cue.
          </p>
        </div>

        <div class="instr-variants__grid">

          <article class="variant-card" data-reveal>
            <span class="variant-card__chip">
              <span class="variant-card__chip-dot" aria-hidden="true"></span>
              Maihar Gharana
            </span>
            <h4 class="variant-card__name">
              Gandhar-pancham
              <em>Ravi Shankar style</em>
            </h4>
            <p class="variant-card__character">
              Bright, projecting, virtuosic. 7 main strings + 13 sympathetic. Built for solo concert work — the sound most non-Indian audiences associate with "sitar."
            </p>
            <div class="variant-card__when">
              <span class="variant-card__when-label">When to book</span>
              <span class="variant-card__when-text">Cinematic leads, fusion crossover, world-music scoring, anywhere the sitar needs to carry the melody.</span>
            </div>
          </article>

          <article class="variant-card" data-reveal>
            <span class="variant-card__chip">
              <span class="variant-card__chip-dot" aria-hidden="true"></span>
              Imdadkhani Gharana
            </span>
            <h4 class="variant-card__name">
              Kharaj-pancham
              <em>Vilayat Khan style</em>
            </h4>
            <p class="variant-card__character">
              Warm, vocal, intimate. 6–7 main + 11–13 sympathetic, retuned for vocal-style melody (<em>gayaki ang</em>). Designed to imitate the human voice.
            </p>
            <div class="variant-card__when">
              <span class="variant-card__when-label">When to book</span>
              <span class="variant-card__when-text">Slow contemplative cues, intimate dialogue scenes, ballads, anything needing emotional restraint over virtuosity.</span>
            </div>
          </article>

          <article class="variant-card" data-reveal>
            <span class="variant-card__chip">
              <span class="variant-card__chip-dot" aria-hidden="true"></span>
              Recording-ready
            </span>
            <h4 class="variant-card__name">
              Studio sitar
              <em>custom-prepared</em>
            </h4>
            <p class="variant-card__character">
              Tuning and dampening adjusted for studio capture. Lower sympathetic ring (cleaner stems), tighter transients, predictable behavior under processing and pitch-shifting.
            </p>
            <div class="variant-card__when">
              <span class="variant-card__when-label">When to book</span>
              <span class="variant-card__when-text">Hybrid scoring, electronic-acoustic blends, layered productions where stem clarity matters more than concert dynamics.</span>
            </div>
          </article>

        </div>
      </div>

    </section>

    <!-- ═══════════════════════════════════════════════════════════════
         §4 · ARTICULATIONS · Phrase Precision · ARTS-001 · v1
         What the player can do for your cue. Universal scaffold:
         each card has play button + name + italic sub + 1-2 line description.
         Card count varies per instrument. Auto-fit grid handles any number.
         Audio loads on first play (deferred · zero network on page load).
         ═══════════════════════════════════════════════════════════════ -->
    <section class="instr-arts" id="articulations" aria-labelledby="arts-title" data-reveal-stagger>

      <div class="instr-arts__head">
        <span class="instr-arts__eyebrow" data-reveal>Phrase precision</span>
        <h2 class="instr-arts__title" id="arts-title" data-reveal>
          The <span class="instr-arts__title-accent">articulations</span> a sitarist can deliver
        </h2>
        <p class="instr-arts__sub" data-reveal>
          What you can specify in the brief. Tap any name to hear a short demo. These are the moves that turn a melody into a sitar phrase.
        </p>
      </div>

      <div class="instr-arts__grid player" data-reveal>

        <!-- 01 · Meend -->
        <article class="track-card player__row" data-track="vocal00004_1.1" data-art-id="meend" data-src="audio/vocal00004_1.1.wav" data-peaks="audio/peaks/vocal00004_1.1.json" data-reveal>
          <div class="track-card__top">
            <span class="track-card__tag"><span class="track-card__tag-dot" aria-hidden="true"></span> pitch glide</span>
          </div>
          <h3 class="track-card__title">Meend</h3>
          <p class="track-card__desc">The signature vocal-style pitch bend across multiple notes — sitar's emotional core.</p>
          <div class="track-card__player">
            <button class="track-card__play player__play" type="button" aria-label="Play Meend demo">
              <svg class="track-card__icon-play" viewBox="0 0 24 24" aria-hidden="true">
                <polygon points="6 4 20 12 6 20"/>
              </svg>
              <svg class="track-card__icon-pause" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="6" y="4" width="4" height="16" rx="1"/>
                <rect x="14" y="4" width="4" height="16" rx="1"/>
              </svg>
              <svg class="track-card__icon-loading" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true">
                <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
              </svg>
            </button>
            <div class="track-card__wave player__wave"><div class="track-card__wave-skeleton" aria-hidden="true"></div></div>
          </div>
          <div class="track-card__time" aria-hidden="true">
            <span class="track-card__time-current player__elapsed">0:00</span>
            <span class="track-card__time-total player__duration"></span>
          </div>
        </article>

        <!-- 02 · Gamak -->
        <article class="track-card player__row" data-track="vocal00005_1.1" data-art-id="gamak" data-src="audio/vocal00005_1.1.wav" data-peaks="audio/peaks/vocal00005_1.1.json" data-reveal>
          <div class="track-card__top">
            <span class="track-card__tag"><span class="track-card__tag-dot" aria-hidden="true"></span> heavy oscillation</span>
          </div>
          <h3 class="track-card__title">Gamak</h3>
          <p class="track-card__desc">Forceful note-to-note shake. Adds weight and intensity to phrases.</p>
          <div class="track-card__player">
            <button class="track-card__play player__play" type="button" aria-label="Play Gamak demo">
              <svg class="track-card__icon-play" viewBox="0 0 24 24" aria-hidden="true">
                <polygon points="6 4 20 12 6 20"/>
              </svg>
              <svg class="track-card__icon-pause" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="6" y="4" width="4" height="16" rx="1"/>
                <rect x="14" y="4" width="4" height="16" rx="1"/>
              </svg>
              <svg class="track-card__icon-loading" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true">
                <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
              </svg>
            </button>
            <div class="track-card__wave player__wave"><div class="track-card__wave-skeleton" aria-hidden="true"></div></div>
          </div>
          <div class="track-card__time" aria-hidden="true">
            <span class="track-card__time-current player__elapsed">0:00</span>
            <span class="track-card__time-total player__duration"></span>
          </div>
        </article>

        <!-- 03 · Krintan -->
        <article class="track-card player__row" data-track="vocal00006_1.1" data-art-id="krintan" data-src="audio/vocal00006_1.1.wav" data-peaks="audio/peaks/vocal00006_1.1.json" data-reveal>
          <div class="track-card__top">
            <span class="track-card__tag"><span class="track-card__tag-dot" aria-hidden="true"></span> grace flick</span>
          </div>
          <h3 class="track-card__title">Krintan</h3>
          <p class="track-card__desc">Light ornamental flick onto the target note — gives phrases their delicate filigree.</p>
          <div class="track-card__player">
            <button class="track-card__play player__play" type="button" aria-label="Play Krintan demo">
              <svg class="track-card__icon-play" viewBox="0 0 24 24" aria-hidden="true">
                <polygon points="6 4 20 12 6 20"/>
              </svg>
              <svg class="track-card__icon-pause" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="6" y="4" width="4" height="16" rx="1"/>
                <rect x="14" y="4" width="4" height="16" rx="1"/>
              </svg>
              <svg class="track-card__icon-loading" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true">
                <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
              </svg>
            </button>
            <div class="track-card__wave player__wave"><div class="track-card__wave-skeleton" aria-hidden="true"></div></div>
          </div>
          <div class="track-card__time" aria-hidden="true">
            <span class="track-card__time-current player__elapsed">0:00</span>
            <span class="track-card__time-total player__duration"></span>
          </div>
        </article>

        <!-- 04 · Andolan -->
        <article class="track-card player__row" data-track="vocal00007_1.1" data-art-id="andolan" data-src="audio/vocal00007_1.1.wav" data-peaks="audio/peaks/vocal00007_1.1.json" data-reveal>
          <div class="track-card__top">
            <span class="track-card__tag"><span class="track-card__tag-dot" aria-hidden="true"></span> slow sway</span>
          </div>
          <h3 class="track-card__title">Andolan</h3>
          <p class="track-card__desc">Gentle controlled wavering on a sustained note. Creates suspense and patience.</p>
          <div class="track-card__player">
            <button class="track-card__play player__play" type="button" aria-label="Play Andolan demo">
              <svg class="track-card__icon-play" viewBox="0 0 24 24" aria-hidden="true">
                <polygon points="6 4 20 12 6 20"/>
              </svg>
              <svg class="track-card__icon-pause" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="6" y="4" width="4" height="16" rx="1"/>
                <rect x="14" y="4" width="4" height="16" rx="1"/>
              </svg>
              <svg class="track-card__icon-loading" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true">
                <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
              </svg>
            </button>
            <div class="track-card__wave player__wave"><div class="track-card__wave-skeleton" aria-hidden="true"></div></div>
          </div>
          <div class="track-card__time" aria-hidden="true">
            <span class="track-card__time-current player__elapsed">0:00</span>
            <span class="track-card__time-total player__duration"></span>
          </div>
        </article>

        <!-- 05 · Jhala -->
        <article class="track-card player__row" data-track="vocal00008_1.1" data-art-id="jhala" data-src="audio/vocal00008_1.1.wav" data-peaks="audio/peaks/vocal00008_1.1.json" data-reveal>
          <div class="track-card__top">
            <span class="track-card__tag"><span class="track-card__tag-dot" aria-hidden="true"></span> fast rhythmic strum</span>
          </div>
          <h3 class="track-card__title">Jhala</h3>
          <p class="track-card__desc">High-tempo strumming on chikari strings. The climactic close of any sitar piece.</p>
          <div class="track-card__player">
            <button class="track-card__play player__play" type="button" aria-label="Play Jhala demo">
              <svg class="track-card__icon-play" viewBox="0 0 24 24" aria-hidden="true">
                <polygon points="6 4 20 12 6 20"/>
              </svg>
              <svg class="track-card__icon-pause" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="6" y="4" width="4" height="16" rx="1"/>
                <rect x="14" y="4" width="4" height="16" rx="1"/>
              </svg>
              <svg class="track-card__icon-loading" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true">
                <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
              </svg>
            </button>
            <div class="track-card__wave player__wave"><div class="track-card__wave-skeleton" aria-hidden="true"></div></div>
          </div>
          <div class="track-card__time" aria-hidden="true">
            <span class="track-card__time-current player__elapsed">0:00</span>
            <span class="track-card__time-total player__duration"></span>
          </div>
        </article>

        <!-- 06 · Jod -->
        <article class="track-card player__row" data-track="vocal00009_1.1" data-art-id="jod" data-src="audio/vocal00009_1.1.wav" data-peaks="audio/peaks/vocal00009_1.1.json" data-reveal>
          <div class="track-card__top">
            <span class="track-card__tag"><span class="track-card__tag-dot" aria-hidden="true"></span> steady pulse</span>
          </div>
          <h3 class="track-card__title">Jod</h3>
          <p class="track-card__desc">Mid-tempo rhythmic section with tabla-like pulse. Momentum without melody.</p>
          <div class="track-card__player">
            <button class="track-card__play player__play" type="button" aria-label="Play Jod demo">
              <svg class="track-card__icon-play" viewBox="0 0 24 24" aria-hidden="true">
                <polygon points="6 4 20 12 6 20"/>
              </svg>
              <svg class="track-card__icon-pause" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="6" y="4" width="4" height="16" rx="1"/>
                <rect x="14" y="4" width="4" height="16" rx="1"/>
              </svg>
              <svg class="track-card__icon-loading" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true">
                <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
              </svg>
            </button>
            <div class="track-card__wave player__wave"><div class="track-card__wave-skeleton" aria-hidden="true"></div></div>
          </div>
          <div class="track-card__time" aria-hidden="true">
            <span class="track-card__time-current player__elapsed">0:00</span>
            <span class="track-card__time-total player__duration"></span>
          </div>
        </article>

        <!-- 07 · Chikari -->
        <article class="track-card player__row" data-track="vocal00010_1.1" data-art-id="chikari" data-src="audio/vocal00010_1.1.wav" data-peaks="audio/peaks/vocal00010_1.1.json" data-reveal>
          <div class="track-card__top">
            <span class="track-card__tag"><span class="track-card__tag-dot" aria-hidden="true"></span> drone strum</span>
          </div>
          <h3 class="track-card__title">Chikari</h3>
          <p class="track-card__desc">Open-string punctuation between melody phrases. The rhythmic glue.</p>
          <div class="track-card__player">
            <button class="track-card__play player__play" type="button" aria-label="Play Chikari demo">
              <svg class="track-card__icon-play" viewBox="0 0 24 24" aria-hidden="true">
                <polygon points="6 4 20 12 6 20"/>
              </svg>
              <svg class="track-card__icon-pause" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="6" y="4" width="4" height="16" rx="1"/>
                <rect x="14" y="4" width="4" height="16" rx="1"/>
              </svg>
              <svg class="track-card__icon-loading" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true">
                <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
              </svg>
            </button>
            <div class="track-card__wave player__wave"><div class="track-card__wave-skeleton" aria-hidden="true"></div></div>
          </div>
          <div class="track-card__time" aria-hidden="true">
            <span class="track-card__time-current player__elapsed">0:00</span>
            <span class="track-card__time-total player__duration"></span>
          </div>
        </article>

        <!-- 08 · Alaap -->
        <article class="track-card player__row" data-track="vocal00011_1.1" data-art-id="alaap" data-src="audio/vocal00011_1.1.wav" data-peaks="audio/peaks/vocal00011_1.1.json" data-reveal>
          <div class="track-card__top">
            <span class="track-card__tag"><span class="track-card__tag-dot" aria-hidden="true"></span> unmetered exposition</span>
          </div>
          <h3 class="track-card__title">Alaap</h3>
          <p class="track-card__desc">Slow rubato exploration of the raga. No rhythm, all atmosphere.</p>
          <div class="track-card__player">
            <button class="track-card__play player__play" type="button" aria-label="Play Alaap demo">
              <svg class="track-card__icon-play" viewBox="0 0 24 24" aria-hidden="true">
                <polygon points="6 4 20 12 6 20"/>
              </svg>
              <svg class="track-card__icon-pause" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="6" y="4" width="4" height="16" rx="1"/>
                <rect x="14" y="4" width="4" height="16" rx="1"/>
              </svg>
              <svg class="track-card__icon-loading" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true">
                <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
              </svg>
            </button>
            <div class="track-card__wave player__wave"><div class="track-card__wave-skeleton" aria-hidden="true"></div></div>
          </div>
          <div class="track-card__time" aria-hidden="true">
            <span class="track-card__time-current player__elapsed">0:00</span>
            <span class="track-card__time-total player__duration"></span>
          </div>
        </article>

        <!-- 09 · Bandish -->
        <article class="track-card player__row" data-track="vocal00012_1.1" data-art-id="bandish" data-src="audio/vocal00012_1.1.wav" data-peaks="audio/peaks/vocal00012_1.1.json" data-reveal>
          <div class="track-card__top">
            <span class="track-card__tag"><span class="track-card__tag-dot" aria-hidden="true"></span> composed melody</span>
          </div>
          <h3 class="track-card__title">Bandish</h3>
          <p class="track-card__desc">Fixed compositional theme. The "song" within the raga.</p>
          <div class="track-card__player">
            <button class="track-card__play player__play" type="button" aria-label="Play Bandish demo">
              <svg class="track-card__icon-play" viewBox="0 0 24 24" aria-hidden="true">
                <polygon points="6 4 20 12 6 20"/>
              </svg>
              <svg class="track-card__icon-pause" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="6" y="4" width="4" height="16" rx="1"/>
                <rect x="14" y="4" width="4" height="16" rx="1"/>
              </svg>
              <svg class="track-card__icon-loading" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true">
                <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
              </svg>
            </button>
            <div class="track-card__wave player__wave"><div class="track-card__wave-skeleton" aria-hidden="true"></div></div>
          </div>
          <div class="track-card__time" aria-hidden="true">
            <span class="track-card__time-current player__elapsed">0:00</span>
            <span class="track-card__time-total player__duration"></span>
          </div>
        </article>

        <!-- 10 · Taan -->
        <article class="track-card player__row" data-track="vocal00013_1.1" data-art-id="taan" data-src="audio/vocal00013_1.1.wav" data-peaks="audio/peaks/vocal00013_1.1.json" data-reveal>
          <div class="track-card__top">
            <span class="track-card__tag"><span class="track-card__tag-dot" aria-hidden="true"></span> rapid runs</span>
          </div>
          <h3 class="track-card__title">Taan</h3>
          <p class="track-card__desc">Fast melodic passages woven through the raga. Virtuosic display.</p>
          <div class="track-card__player">
            <button class="track-card__play player__play" type="button" aria-label="Play Taan demo">
              <svg class="track-card__icon-play" viewBox="0 0 24 24" aria-hidden="true">
                <polygon points="6 4 20 12 6 20"/>
              </svg>
              <svg class="track-card__icon-pause" viewBox="0 0 24 24" aria-hidden="true">
                <rect x="6" y="4" width="4" height="16" rx="1"/>
                <rect x="14" y="4" width="4" height="16" rx="1"/>
              </svg>
              <svg class="track-card__icon-loading" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true">
                <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
              </svg>
            </button>
            <div class="track-card__wave player__wave"><div class="track-card__wave-skeleton" aria-hidden="true"></div></div>
          </div>
          <div class="track-card__time" aria-hidden="true">
            <span class="track-card__time-current player__elapsed">0:00</span>
            <span class="track-card__time-total player__duration"></span>
          </div>
        </article>

      </div>

    </section>

    <!-- ═══════════════════════════════════════════════════════════════
         §5 · SONIC PROFILE · Mix Fit · SONIC-001 · v1
         How the instrument behaves in a mix · written for the engineer.
         Single comprehensive card, no comparison. Crypto Cipher recommends
         per project — this section gives the data to make that decision.
         Universal scaffold · per-instrument variables filled inline.
         ═══════════════════════════════════════════════════════════════ -->
    <section class="instr-sonic" id="sonic-profile" aria-labelledby="sonic-title" data-reveal-stagger>

      <div class="instr-sonic__head">
        <span class="instr-sonic__eyebrow" data-reveal>Sonic profile</span>
        <h2 class="instr-sonic__title" id="sonic-title" data-reveal>
          Where the <span class="instr-sonic__title-accent">sitar</span> sits in your mix
        </h2>
        <p class="instr-sonic__sub" data-reveal>
          The technical brief for engineers. Frequency, dynamics, stereo behavior, and what to watch for when you place sitar against the rest of your arrangement.
        </p>
      </div>

      <article class="sonic-card" data-reveal>

        <!-- ─── Frequency profile bar ───
             Per-instrument values:
             --range-start: where the active range begins (% of bar, log-mapped 20Hz–20kHz)
             --range-end:   where the active range ends
             --sweet:       sweet-spot vertical line position
             For sitar: ~80Hz to ~8kHz, sweet spot ~3kHz
             Log mapping (20Hz=0%, 20kHz=100%):
                80Hz   → ~20%
                3kHz   → ~71%
                8kHz   → ~85%       -->
        <div class="sonic-block sonic-freq">
          <span class="sonic-block__label">Frequency range</span>

          <div class="sonic-freq__bar" style="--range-start: 20%; --range-end: 85%; --sweet: 71%;">
            <div class="sonic-freq__range"></div>
            <div class="sonic-freq__sweet" data-label="sweet · 3kHz"></div>
          </div>

          <div class="sonic-freq__scale">
            <span>20Hz</span>
            <span>200</span>
            <span>2kHz</span>
            <span>20kHz</span>
          </div>

          <p class="sonic-freq__caption">
            Active range <em>~80Hz–8kHz</em> — fundamental notes sit in the lower mids, the harmonic shimmer of <em>tarab</em> reaches into the high mids. Sweet spot for presence around <em>3kHz</em>.
          </p>
        </div>

        <!-- ─── 3-up engineering specs ─── -->
        <div class="sonic-specs">
          <div class="sonic-spec">
            <span class="sonic-spec__label">Dynamic range</span>
            <span class="sonic-spec__value">Wide · 30 dB+</span>
            <span class="sonic-spec__detail">From whispered <em>alaap</em> to fast <em>jhala</em>. Plan for moderate compression to keep quiet passages present.</span>
          </div>
          <div class="sonic-spec">
            <span class="sonic-spec__label">Stereo behavior</span>
            <span class="sonic-spec__value">Mono source · stereo'd</span>
            <span class="sonic-spec__detail">Captured mono at the bridge, stereo image built from room mics. Pan slightly off-center for ensemble fit.</span>
          </div>
          <div class="sonic-spec">
            <span class="sonic-spec__label">Mic technique</span>
            <span class="sonic-spec__value">Bridge close + 6ft room</span>
            <span class="sonic-spec__detail">Close mic captures transient detail and fret articulation. Room mic adds decay and air. Both stems delivered.</span>
          </div>
        </div>

      </article>

    </section>

    <!-- ═══════════════════════════════════════════════════════════════
         §6 · PAIRS WELL WITH · Cross-sell · PAIRS-001 · v1
         3 cards (variable per instrument). Universal scaffold.
         For sitar: Tabla (rhythmic) · Tanpura (drone) · Bansuri (melodic)
         Per-instrument changes: card count, icons, copy, hrefs.
         ═══════════════════════════════════════════════════════════════ -->
    <section class="instr-pairs" id="pairs-well-with" aria-labelledby="pairs-title" data-reveal-stagger>

      <div class="instr-pairs__head">
        <span class="instr-pairs__eyebrow" data-reveal>Pairs well with</span>
        <h2 class="instr-pairs__title" id="pairs-title" data-reveal>
          Build the full <span class="instr-pairs__title-accent">cue</span> with these
        </h2>
        <p class="instr-pairs__sub" data-reveal>
          Sitar rarely sits alone in a recording. These are the instruments that lock with it most often — book together for cohesive sessions.
        </p>
      </div>

      <div class="instr-pairs__grid" data-reveal>

        <!-- ─── Pair 1 · Tabla (rhythmic counterpart) ─── -->
          <a class="pair-card" href="{{ route('recording-services.show', ['slug' => 'tabla']) }}" aria-label="Explore tabla">
          <div class="pair-card__icon" aria-hidden="true">
            <!-- Tabla pair silhouette: two drums, the larger bayan on left, smaller dayan on right -->
            <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
              <!-- Bayan (larger, left) -->
              <ellipse cx="14" cy="32" rx="9" ry="3.5"/>
              <path d="M5 32 Q5 22, 14 22 Q23 22, 23 32"/>
              <ellipse cx="14" cy="22" rx="9" ry="2.8"/>
              <!-- Dayan (smaller, right) -->
              <ellipse cx="34" cy="34" rx="7" ry="2.8"/>
              <path d="M27 34 Q27 26, 34 26 Q41 26, 41 34"/>
              <ellipse cx="34" cy="26" rx="7" ry="2.2"/>
              <!-- Syahi dots (the black tuning paste) -->
              <circle cx="14" cy="22" r="2" fill="currentColor" stroke="none" opacity="0.4"/>
              <circle cx="34" cy="26" r="1.5" fill="currentColor" stroke="none" opacity="0.4"/>
            </svg>
          </div>
          <div class="pair-card__title-block">
            <h3 class="pair-card__name">Tabla</h3>
            <span class="pair-card__sub">rhythmic counterpart</span>
          </div>
          <p class="pair-card__desc">
            The percussive partner of sitar in nearly every Hindustani cue — from devotional to film score.
          </p>
          <div class="pair-card__why">
            <span class="pair-card__why-label">Why pair</span>
            <ul class="pair-card__why-list">
              <li class="pair-card__why-item">Tabla and sitar lock together in <em>jod</em> and <em>jhala</em> sections.</li>
              <li class="pair-card__why-item">Adds rhythmic anchor — replaces a need for kit drums in cinematic cues.</li>
            </ul>
          </div>
          <span class="pair-card__cta">
            Explore tabla
            <span class="pair-card__cta-arrow" aria-hidden="true">→</span>
          </span>
        </a>

        <!-- ─── Pair 2 · Tanpura (drone foundation) ─── -->
          <a class="pair-card" href="{{ route('recording-services.show', ['slug' => 'tanpura']) }}" aria-label="Explore tanpura">
          <div class="pair-card__icon" aria-hidden="true">
            <!-- Tanpura silhouette: large round gourd, very long thin neck, small pegbox at top -->
            <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
              <!-- Pegbox -->
              <path d="M21 4 L21 8 L27 8 L27 4 Q24 2, 21 4 Z"/>
              <!-- Pegs -->
              <line x1="19" y1="6" x2="21" y2="6"/>
              <line x1="27" y1="6" x2="29" y2="6"/>
              <!-- Long thin neck -->
              <path d="M22 8 L22 32 L26 32 L26 8 Z"/>
              <!-- Strings on neck -->
              <line x1="23" y1="9" x2="23" y2="32"/>
              <line x1="25" y1="9" x2="25" y2="32"/>
              <!-- Large round gourd -->
              <circle cx="24" cy="38" r="7"/>
              <!-- Bridge -->
              <line x1="22" y1="33" x2="26" y2="33"/>
              <!-- Decorative ring on gourd face -->
              <ellipse cx="24" cy="38" rx="4" ry="1.2"/>
            </svg>
          </div>
          <div class="pair-card__title-block">
            <h3 class="pair-card__name">Tanpura</h3>
            <span class="pair-card__sub">drone foundation</span>
          </div>
          <p class="pair-card__desc">
            The sustained tonic drone every sitar performance floats on. The bed that gives raga its tonal gravity.
          </p>
          <div class="pair-card__why">
            <span class="pair-card__why-label">Why pair</span>
            <ul class="pair-card__why-list">
              <li class="pair-card__why-item">Defines the tonal home — sitar phrases land relative to tanpura's <em>sa</em>.</li>
              <li class="pair-card__why-item">Adds shimmering harmonic bed without competing for melodic space.</li>
            </ul>
          </div>
          <span class="pair-card__cta">
            Explore tanpura
            <span class="pair-card__cta-arrow" aria-hidden="true">→</span>
          </span>
        </a>

        <!-- ─── Pair 3 · Bansuri (melodic counterpart) ─── -->
          <a class="pair-card" href="{{ route('recording-services.show', ['slug' => 'bansuri']) }}" aria-label="Explore bansuri">
          <div class="pair-card__icon" aria-hidden="true">
            <!-- Bansuri silhouette: long horizontal flute with finger holes -->
            <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
              <!-- Flute body (horizontal) -->
              <rect x="4" y="22" width="40" height="6" rx="3"/>
              <!-- Mouthpiece hole (left) -->
              <circle cx="9" cy="25" r="1.5" fill="currentColor" stroke="none" opacity="0.5"/>
              <!-- Finger holes -->
              <circle cx="18" cy="25" r="1.2" fill="currentColor" stroke="none" opacity="0.5"/>
              <circle cx="23" cy="25" r="1.2" fill="currentColor" stroke="none" opacity="0.5"/>
              <circle cx="28" cy="25" r="1.2" fill="currentColor" stroke="none" opacity="0.5"/>
              <circle cx="33" cy="25" r="1.2" fill="currentColor" stroke="none" opacity="0.5"/>
              <circle cx="38" cy="25" r="1.2" fill="currentColor" stroke="none" opacity="0.5"/>
              <!-- Decorative end caps -->
              <line x1="6" y1="20" x2="6" y2="30"/>
              <line x1="42" y1="20" x2="42" y2="30"/>
            </svg>
          </div>
          <div class="pair-card__title-block">
            <h3 class="pair-card__name">Bansuri</h3>
            <span class="pair-card__sub">melodic counterpart</span>
          </div>
          <p class="pair-card__desc">
            Bamboo flute with breathy, pastoral character. Adds lyrical lift to phrases sitar holds underneath.
          </p>
          <div class="pair-card__why">
            <span class="pair-card__why-label">Why pair</span>
            <ul class="pair-card__why-list">
              <li class="pair-card__why-item">Different timbre family — no masking with sitar's harmonic profile.</li>
              <li class="pair-card__why-item">Carries call-and-response melodic dialogue beautifully on screen.</li>
            </ul>
          </div>
          <span class="pair-card__cta">
            Explore bansuri
            <span class="pair-card__cta-arrow" aria-hidden="true">→</span>
          </span>
        </a>

      </div>

    </section>

    <!-- ═══════════════════════════════════════════════════════════════
         §7 · KONTAKT INSTRUMENTS CROSS-SELL STRIP · INSTANT-001 · v2
         Single horizontal strip · cross-sells the broader Kontakt range
         to composers booking a sitar session. Honest framing — no
         pretending sitar exists in the library yet.
         Per-instrument: title language adapts (e.g. "...your tabla session"),
         href stays /libraries (browse the full range).
         ═══════════════════════════════════════════════════════════════ -->
    <a class="instant-strip" href="/libraries" data-reveal aria-label="Browse Crypto Cipher Kontakt instruments">
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
        <span class="instant-strip__sub">Layer them under your sitar session, or build the entire cue in Kontakt while you wait for the recording.</span>
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
    <section class="instr-faq" id="faq" aria-labelledby="faq-title" data-reveal-stagger>

      <div class="instr-faq__head">
        <span class="instr-faq__eyebrow" data-reveal>Frequently asked</span>
        <h2 class="instr-faq__title" id="faq-title" data-reveal>
          Before you <span class="instr-faq__title-accent">book</span>
        </h2>
        <p class="instr-faq__sub" data-reveal>
          The questions composers and producers ask before commissioning a sitar recording. If yours isn't here, write to us — we'll answer directly.
        </p>
      </div>

      <div class="instr-faq__list" data-reveal>

        <!-- Q1 · Custom asks -->
        <details class="faq-item">
          <summary class="faq-item__summary">
            <h3 class="faq-item__q">Can I commission a custom sitar performance in a specific raga or tuning?</h3>
            <span class="faq-item__icon" aria-hidden="true"></span>
          </summary>
          <div class="faq-item__body">
            <p class="faq-item__a">
              Yes — every session starts with a brief from you. Send us a reference (audio, sheet music, or a written description), specify the raga, tempo, mood, and any tuning requirements, and we'll match the right sitarist from our roster. We work in standard Hindustani ragas as well as custom microtonal tunings for cinematic and experimental work.
            </p>
            <p class="faq-item__a">
              For projects with very specific musical needs (e.g., adapting a Western melody to <em>raga Yaman</em>, or composing a new phrase in a non-traditional scale), we'll have a brief call before recording to confirm the approach.
            </p>
          </div>
        </details>

        <!-- Q2 · Turnaround -->
        <details class="faq-item">
          <summary class="faq-item__summary">
            <h3 class="faq-item__q">What's the turnaround time for a remote sitar recording?</h3>
            <span class="faq-item__icon" aria-hidden="true"></span>
          </summary>
          <div class="faq-item__body">
            <p class="faq-item__a">
              <strong>Standard turnaround is 3–5 working days</strong> from confirmed brief to final delivery. Sessions under 90 seconds with simple briefs can be delivered in 48 hours. Complex multi-take sessions, custom scoring work, or projects requiring multiple sitarists may take 7–10 working days.
            </p>
            <p class="faq-item__a">
              If you have a hard deadline, mention it in the booking form — we'll confirm feasibility before you commit. <strong>Rush options</strong> are available with a 24-hour turnaround for short cues at a premium rate.
            </p>
          </div>
        </details>

        <!-- Q3 · Multiple takes -->
        <details class="faq-item">
          <summary class="faq-item__summary">
            <h3 class="faq-item__q">Do I get multiple takes or edit options to choose from?</h3>
            <span class="faq-item__icon" aria-hidden="true"></span>
          </summary>
          <div class="faq-item__body">
            <p class="faq-item__a">
              Yes. Every session includes <strong>3 distinct takes minimum</strong> — one straight read, one with more expression and ornamentation, and one alternate interpretation. You're welcome to request more (up to 5 takes per cue is included in the standard rate).
            </p>
            <p class="faq-item__a">
              We deliver all takes as separate stems plus a comp suggestion. Final selection and editing rights are yours — no approval required from us.
            </p>
          </div>
        </details>

        <!-- Q4 · Notation / references -->
        <details class="faq-item">
          <summary class="faq-item__summary">
            <h3 class="faq-item__q">Can your sitarists read Western notation or do they only work from audio references?</h3>
            <span class="faq-item__icon" aria-hidden="true"></span>
          </summary>
          <div class="faq-item__body">
            <p class="faq-item__a">
              Both. Most of our roster reads Western staff notation comfortably and many can also read Indian sargam notation. For complex compositions, sheet music speeds up the session significantly.
            </p>
            <p class="faq-item__a">
              That said, sitar lives in nuance — pitch bends, ornaments, rhythmic feel — that don't fully translate to notation. <strong>We strongly recommend sending an audio reference along with any score</strong>, even a rough hummed melody. The combined input gets you to the result you actually want, faster.
            </p>
          </div>
        </details>

        <!-- Q5 · Pricing -->
        <details class="faq-item">
          <summary class="faq-item__summary">
            <h3 class="faq-item__q">What's included in the session price — and what costs extra?</h3>
            <span class="faq-item__icon" aria-hidden="true"></span>
          </summary>
          <div class="faq-item__body">
            <p class="faq-item__a">
              <strong>Included:</strong> the sitarist's performance fee, professional studio recording, multi-mic setup, three takes, basic editing (timing alignment, noise cleanup), stem delivery in your preferred format, and a 30-day window for one round of revisions.
            </p>
            <p class="faq-item__a">
              <strong>Extra:</strong> additional takes beyond five, additional sitarists for layering, extensive comp editing, custom mix processing, sync licensing fees if the recording will be commercially released, and rush turnaround. All extras are quoted upfront in writing — no surprises.
            </p>
          </div>
        </details>

        <!-- Q6 · Revisions -->
        <details class="faq-item">
          <summary class="faq-item__summary">
            <h3 class="faq-item__q">What if I need revisions after delivery?</h3>
            <span class="faq-item__icon" aria-hidden="true"></span>
          </summary>
          <div class="faq-item__body">
            <p class="faq-item__a">
              <strong>One round of revisions is included</strong> in the standard rate, valid for 30 days from delivery. This covers re-edits, alternate phrasings from existing takes, or minor performance adjustments.
            </p>
            <p class="faq-item__a">
              If the revision requires a fresh recording session (e.g., a new tempo, a different raga, or a new phrase entirely), that's billed as a new session at your existing rate. We'll always tell you upfront which category your request falls into.
            </p>
          </div>
        </details>

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

  </div>

</main>
