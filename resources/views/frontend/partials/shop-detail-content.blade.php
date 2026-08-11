@verbatim
<main id="main" tabindex="-1" class="libinner">

  <!-- ────────────────────────────────────────────
       SIDE INDEX — sticky left column
       ──────────────────────────────────────────── -->
  <!-- ────────────────────────────────────────────
       SIDENAV-001 — Unified Side Nav
       Active section: kontakt-libraries (LIBINNER default)
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
              <li><a href="/shop/voices-of-ancient-india" class="sidenav__item current" aria-current="page"><span class="sidenav__item-name">Voices of Ancient India</span></a></li>
              <li><a href="/shop/solo-tabla" class="sidenav__item"><span class="sidenav__item-name">Solo Tabla</span></a></li>
              <li><a href="/shop/bollywood-harmonium" class="sidenav__item"><span class="sidenav__item-name">Bollywood Harmonium</span></a></li>
              <li><a href="/shop/solo-dholak" class="sidenav__item"><span class="sidenav__item-name">Solo Dholak</span></a></li>
              <li><a href="/shop/voices-of-ragas-vol-1" class="sidenav__item"><span class="sidenav__item-name">Voices of Ragas Vol 1</span></a></li>
              <li><a href="/shop/voices-of-ragas-vol-2" class="sidenav__item"><span class="sidenav__item-name">Voices of Ragas Vol 2</span></a></li>
              <li><a href="/shop/tabla-tarang" class="sidenav__item"><span class="sidenav__item-name">Tabla Tarang</span></a></li>
              <li><a href="/shop/tabla-loops" class="sidenav__item"><span class="sidenav__item-name">Tabla Loops</span></a></li>
              <li><a href="/shop/dholak-loops" class="sidenav__item"><span class="sidenav__item-name">Dholak Loops</span></a></li>
              <li><a href="/shop/swarmandal" class="sidenav__item"><span class="sidenav__item-name">Swarmandal</span></a></li>
              <li><a href="/shop/tarangs" class="sidenav__item"><span class="sidenav__item-name">Tarangs</span></a></li>
              <li><a href="/shop/tongue-drum" class="sidenav__item"><span class="sidenav__item-name">Tongue Drum</span></a></li>
              <li><a href="/shop/bol-tabla-mouth-percussion" class="sidenav__item"><span class="sidenav__item-name">BOL — Tabla Mouth Perc.</span></a></li>
              <li><a href="/shop/terry-and-bells" class="sidenav__item"><span class="sidenav__item-name">Terry &amp; Bells</span></a></li>
            </ul>
            <a href="/shop" class="sidenav__footer-link">View all instruments <span class="sidenav__footer-link-arrow">→</span></a>
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
      <a href="/heritage-performances" class="sidenav__cta-link" aria-label="View Heritage Films">
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

    <!-- §1 HERO — v4.4
         Order: breadcrumb · title (full-width) · tagline (full-width) · video (full-width) · meta
         Price panel moved OUT of hero — now its own standalone section §1B
         ──────────────────────────────── -->
@endverbatim
@php
    $isFeaturedProduct = $product->slug === 'voices-of-ancient-india';
    $isKontaktFormat = $product->isKontaktFormat();
    $nameWords = explode(' ', $product->name);
    $lastNameWord = array_pop($nameWords);
@endphp
    <section class="lib-hero" id="hero">
      <div class="lib-hero__ambient"></div>

      <div class="lib-hero__breadcrumb" data-reveal>
        <a href="/">Home</a>
        <span class="lib-hero__breadcrumb-sep">/</span>
        <a href="/shop">Instruments</a>
        <span class="lib-hero__breadcrumb-sep">/</span>
        <span class="lib-hero__breadcrumb-current">{{ $product->name }}</span>
      </div>

      @if ($isFeaturedProduct)
      <h1 class="lib-hero__title d1" data-reveal>
        <span class="lib-hero__title-word" style="--w:0">Voices</span>
        <span class="lib-hero__title-word" style="--w:1">of</span>
        <span class="lib-hero__title-word lib-hero__title-word--gradient" style="--w:2">
          <span class="gradient-text">Ancient&nbsp;India</span>
        </span>
      </h1>

      <p class="lib-hero__tagline d2" data-reveal>
        Sanskrit shlokas, Sufi qawwali, devotional alaaps — three master vocalists,
        one library. The deepest spiritual vocal palette Crypto Cipher has ever recorded.
      </p>
      @else
      <h1 class="lib-hero__title d1" data-reveal>
        @foreach ($nameWords as $i => $word)
        <span class="lib-hero__title-word" style="--w:{{ $i }}">{{ $word }}</span>
        @endforeach
        <span class="lib-hero__title-word lib-hero__title-word--gradient" style="--w:{{ count($nameWords) }}">
          <span class="gradient-text">{{ $lastNameWord }}</span>
        </span>
      </h1>

      <p class="lib-hero__tagline d2" data-reveal>
        {{ $product->tagline }}
      </p>
      @endif

      @if ($isFeaturedProduct)
@verbatim
      <div class="lib-hero__video d3" id="hero-video-frame" data-reveal role="button" tabindex="0" aria-label="Play library walkthrough" data-yt-id="uvsQEvH-cxM" data-yt-title="A Voice Carried Through Centuries">
        <div class="lib-hero__poster" aria-hidden="true"></div>
        <div class="lib-hero__video-highlight" id="hero-video-highlight"></div>
        <div class="lib-hero__video-vignette"></div>

        <!-- Badges overlay — top-left of video -->
        <div class="lib-hero__video-badges">
          <span class="lib-hero__badge lib-hero__badge--flagship">Flagship</span>
          <span class="lib-hero__badge lib-hero__badge--format">For Kontakt</span>
        </div>

        <div class="lib-hero__play">
          <button class="lib-hero__play-btn" aria-label="Play library film">
            <svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg>
          </button>
        </div>

        <div class="lib-hero__video-overlay">
          <div>
            <div class="lib-hero__video-label">Library Film</div>
            <div class="lib-hero__video-name">A Voice Carried Through Centuries</div>
          </div>
          <span class="lib-hero__video-duration">02 : 48</span>
        </div>
      </div>
@endverbatim
      @else
      <div class="lib-hero__video d3" data-reveal style="cursor:default;">
        <img src="{{ $product->imageUrl() }}" alt="{{ $product->name }}" loading="lazy" style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;border-radius:inherit;">
        <div class="lib-hero__video-vignette"></div>
        <div class="lib-hero__video-badges">
          @if ($product->flagship)
          <span class="lib-hero__badge lib-hero__badge--flagship">Flagship</span>
          @endif
          <span class="lib-hero__badge lib-hero__badge--format">For {{ $product->formatLabel() }}</span>
        </div>
      </div>
      @endif

      @if ($isFeaturedProduct)
@verbatim
      <!-- Meta strip — thin info band UNDER video -->
      <div class="lib-hero__meta d4" data-reveal>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">Format</span>
          <span class="lib-hero__meta-value">Kontakt 6 Full</span>
        </div>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">Size</span>
          <span class="lib-hero__meta-value">8.4 GB</span>
        </div>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">Vocalists</span>
          <span class="lib-hero__meta-value">3 Masters</span>
        </div>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">Region</span>
          <span class="lib-hero__meta-value">Pan-Indian</span>
        </div>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">Compatibility</span>
          <span class="lib-hero__meta-value">macOS / Windows</span>
        </div>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">License</span>
          <span class="lib-hero__meta-value">Sync-Cleared · AI-Free</span>
        </div>
      </div>
@endverbatim
      @else
      <div class="lib-hero__meta d4" data-reveal>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">Format</span>
          <span class="lib-hero__meta-value">For {{ $product->formatLabel() }}</span>
        </div>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">Region</span>
          <span class="lib-hero__meta-value">{{ $product->region->label }}</span>
        </div>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">License</span>
          <span class="lib-hero__meta-value">Sync-Cleared · AI-Free</span>
        </div>
      </div>
      @endif
    </section>

    <section class="section" id="price-panel-section">
      <div class="price-panel" data-reveal>

        <div class="price-panel__left">
          <span class="price-panel__eyebrow">One-time purchase</span>
          <div class="price-panel__price-row">
            <span class="price-panel__price">{{ $product->priceDisplay() }}</span>
            @if ($product->price > 0)
            <span class="price-panel__currency">USD</span>
            @endif
          </div>
        </div>

        <div class="price-panel__right">
          <a href="#" class="price-panel__buy" data-action="buy-now" data-slug="{{ $product->slug }}">
            <span class="price-panel__buy-label" data-cart-label>Buy Instrument</span>
            <span class="price-panel__buy-price">{{ $product->priceDisplay() }}</span>
            <svg class="price-panel__buy-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
            </svg>
          </a>

          @if ($isKontaktFormat)
          <div class="price-panel__warning">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
              <line x1="12" y1="9" x2="12" y2="13"/>
              <line x1="12" y1="17" x2="12.01" y2="17"/>
            </svg>
            <span><strong>Requires Kontakt 6 Full or higher.</strong> Not compatible with the free Kontakt Player.</span>
          </div>
          @endif

          <div class="price-panel__secondary">
            <button class="price-panel__link" id="shortlist-btn" type="button" aria-pressed="false" data-action="wishlist" data-slug="{{ $product->slug }}">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/>
              </svg>
              <span id="shortlist-label" data-wishlist-label>Save for later</span>
            </button>
            <span class="price-panel__divider"></span>
            <button class="price-panel__link" id="license-btn" type="button">View license terms</button>
          </div>
        </div>

      </div>
    </section>

    @if ($isFeaturedProduct)
@verbatim
    <section class="section" id="cues">
      <div class="section__head">
        <span class="eyebrow" data-reveal>Composer Cues</span>
        <h2 class="section__title d1" data-reveal>Hear it in real cues</h2>
        <p class="section__sub d2" data-reveal>
          Working composers, real projects — film, OTT, game, trailer, and documentary scoring.
          The strongest sonic proof is what the library sounds like in finished work.
        </p>
      </div>

      <div class="player-box" data-reveal>
        <header class="player-box__head">
          <div class="player-box__head-left">
            <span class="player-box__eyebrow">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"/></svg>
              Demo Reel
            </span>
            <h3 class="player-box__title">10 Composer Cues</h3>
            <p class="player-box__sub">Real projects · real composers · raw stems from finished work</p>
          </div>
          <div class="player-box__head-right">
            <span class="player-box__count">10 tracks · 24 min</span>
          </div>
        </header>

        <div class="player" data-advance="on" data-cc-player="legacy">

          <article class="player__row" data-track="pyre-at-dawn" data-src="audio/vocal00001_1.2.wav" data-peaks="audio/peaks/vocal00001_1.2.json">
            <button class="player__play" type="button" aria-label="Play">
              <svg class="player__play-icon" viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg>
              <svg class="player__pause-icon" viewBox="0 0 24 24"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
            </button>
            <div class="player__info">
              <div class="player__head">
                <span class="player__type">Film Cue</span>
                <h3 class="player__title" title="&quot;Pyre at Dawn — A Funeral on the Ganges&quot;">"Pyre at Dawn — A Funeral on the Ganges"</h3>
                <span class="player__time"><span class="player__elapsed">0 : 00</span> / 01 : 38</span>
              </div>
              <div class="player__meta" title="Period drama · climactic funeral sequence · main vocalist over orchestral bed">
                <span class="player__composer">[Composer Name]</span>
                <span class="player__sep">·</span>
                <span class="player__context">Period drama · climactic funeral sequence · main vocalist over orchestral bed</span>
              </div>
            </div>
            <div class="player__wave"></div>
            <span class="player__duration">01 : 38</span>
          </article>

          <article class="player__row" data-track="saffron-road" data-src="audio/vocal00002_1.1.wav" data-peaks="audio/peaks/vocal00002_1.1.json">
            <button class="player__play" type="button" aria-label="Play">
              <svg class="player__play-icon" viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg>
              <svg class="player__pause-icon" viewBox="0 0 24 24"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
            </button>
            <div class="player__info">
              <div class="player__head">
                <span class="player__type">OTT Trailer</span>
                <h3 class="player__title" title="&quot;The Saffron Road&quot;">"The Saffron Road"</h3>
                <span class="player__time"><span class="player__elapsed">0 : 00</span> / 00 : 52</span>
              </div>
              <div class="player__meta" title="Streaming series · season-finale tag · qawwali ensemble + sub-bass design">
                <span class="player__composer">[Composer Name]</span>
                <span class="player__sep">·</span>
                <span class="player__context">Streaming series · season-finale tag · qawwali ensemble + sub-bass design</span>
              </div>
            </div>
            <div class="player__wave"></div>
            <span class="player__duration">00 : 52</span>
          </article>

          <article class="player__row" data-track="temple-first-light" data-src="audio/vocal00003_1.1.wav" data-peaks="audio/peaks/vocal00003_1.1.json">
            <button class="player__play" type="button" aria-label="Play">
              <svg class="player__play-icon" viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg>
              <svg class="player__pause-icon" viewBox="0 0 24 24"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
            </button>
            <div class="player__info">
              <div class="player__head">
                <span class="player__type">Game Cue</span>
                <h3 class="player__title" title="&quot;Temple of the First Light — Sacred Zone Theme&quot;">"Temple of the First Light — Sacred Zone Theme"</h3>
                <span class="player__time"><span class="player__elapsed">0 : 00</span> / 02 : 14</span>
              </div>
              <div class="player__meta" title="AAA RPG · sacred temple zone · alaap layer over hybrid orchestral pad">
                <span class="player__composer">[Composer Name]</span>
                <span class="player__sep">·</span>
                <span class="player__context">AAA RPG · sacred temple zone · alaap layer over hybrid orchestral pad</span>
              </div>
            </div>
            <div class="player__wave"></div>
            <span class="player__duration">02 : 14</span>
          </article>

          <article class="player__row" data-track="rivers-saraswati" data-src="audio/vocal00004_1.1.wav" data-peaks="audio/peaks/vocal00004_1.1.json">
            <button class="player__play" type="button" aria-label="Play">
              <svg class="player__play-icon" viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg>
              <svg class="player__pause-icon" viewBox="0 0 24 24"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
            </button>
            <div class="player__info">
              <div class="player__head">
                <span class="player__type">Documentary</span>
                <h3 class="player__title" title="&quot;Rivers of the Saraswati&quot;">"Rivers of the Saraswati"</h3>
                <span class="player__time"><span class="player__elapsed">0 : 00</span> / 03 : 02</span>
              </div>
              <div class="player__meta" title="Streaming documentary · main theme · Sanskrit shloka over harmonium drone">
                <span class="player__composer">[Composer Name]</span>
                <span class="player__sep">·</span>
                <span class="player__context">Streaming documentary · main theme · Sanskrit shloka over harmonium drone</span>
              </div>
            </div>
            <div class="player__wave"></div>
            <span class="player__duration">03 : 02</span>
          </article>

          <article class="player__row" data-track="last-monsoon" data-src="audio/vocal00005_1.1.wav" data-peaks="audio/peaks/vocal00005_1.1.json">
            <button class="player__play" type="button" aria-label="Play">
              <svg class="player__play-icon" viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg>
              <svg class="player__pause-icon" viewBox="0 0 24 24"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
            </button>
            <div class="player__info">
              <div class="player__head">
                <span class="player__type">Film Cue</span>
                <h3 class="player__title" title="&quot;The Last Monsoon — Climax of the Rains&quot;">"The Last Monsoon — Climax of the Rains"</h3>
                <span class="player__time"><span class="player__elapsed">0 : 00</span> / 02 : 47</span>
              </div>
              <div class="player__meta" title="Indie drama · emotional climax · solo female alaap with harmonium drone and tabla rhythm">
                <span class="player__composer">[Composer Name]</span>
                <span class="player__sep">·</span>
                <span class="player__context">Indie drama · emotional climax · solo female alaap with harmonium drone and tabla rhythm</span>
              </div>
            </div>
            <div class="player__wave"></div>
            <span class="player__duration">02 : 47</span>
          </article>

          <article class="player__row" data-track="hidden-shrine" data-src="audio/vocal00006_1.1.wav" data-peaks="audio/peaks/vocal00006_1.1.json">
            <button class="player__play" type="button" aria-label="Play">
              <svg class="player__play-icon" viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg>
              <svg class="player__pause-icon" viewBox="0 0 24 24"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
            </button>
            <div class="player__info">
              <div class="player__head">
                <span class="player__type">Game Cue</span>
                <h3 class="player__title" title="&quot;The Hidden Shrine&quot;">"The Hidden Shrine"</h3>
                <span class="player__time"><span class="player__elapsed">0 : 00</span> / 01 : 56</span>
              </div>
              <div class="player__meta" title="Open-world adventure · discovery cue · layered male shloka + reversed alaap textures">
                <span class="player__composer">[Composer Name]</span>
                <span class="player__sep">·</span>
                <span class="player__context">Open-world adventure · discovery cue · layered male shloka + reversed alaap textures</span>
              </div>
            </div>
            <div class="player__wave"></div>
            <span class="player__duration">01 : 56</span>
          </article>

          <article class="player__row" data-track="invocation" data-src="audio/vocal00007_1.1.wav" data-peaks="audio/peaks/vocal00007_1.1.json">
            <button class="player__play" type="button" aria-label="Play">
              <svg class="player__play-icon" viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg>
              <svg class="player__pause-icon" viewBox="0 0 24 24"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
            </button>
            <div class="player__info">
              <div class="player__head">
                <span class="player__type">Trailer</span>
                <h3 class="player__title" title="&quot;Invocation — Opening Card for a Mythological Series&quot;">"Invocation — Opening Card for a Mythological Series"</h3>
                <span class="player__time"><span class="player__elapsed">0 : 00</span> / 01 : 12</span>
              </div>
              <div class="player__meta" title="OTT mythology series · main title music · Sanskrit shloka chorus + cinematic percussion">
                <span class="player__composer">[Composer Name]</span>
                <span class="player__sep">·</span>
                <span class="player__context">OTT mythology series · main title music · Sanskrit shloka chorus + cinematic percussion</span>
              </div>
            </div>
            <div class="player__wave"></div>
            <span class="player__duration">01 : 12</span>
          </article>

          <article class="player__row" data-track="qawwali-night" data-src="audio/vocal00008_1.1.wav" data-peaks="audio/peaks/vocal00008_1.1.json">
            <button class="player__play" type="button" aria-label="Play">
              <svg class="player__play-icon" viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg>
              <svg class="player__pause-icon" viewBox="0 0 24 24"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
            </button>
            <div class="player__info">
              <div class="player__head">
                <span class="player__type">Film Cue</span>
                <h3 class="player__title" title="&quot;Qawwali Night at the Dargah&quot;">"Qawwali Night at the Dargah"</h3>
                <span class="player__time"><span class="player__elapsed">0 : 00</span> / 04 : 21</span>
              </div>
              <div class="player__meta" title="Sufi-themed feature film · diegetic performance scene · full qawwali ensemble with hand percussion">
                <span class="player__composer">[Composer Name]</span>
                <span class="player__sep">·</span>
                <span class="player__context">Sufi-themed feature film · diegetic performance scene · full qawwali ensemble with hand percussion</span>
              </div>
            </div>
            <div class="player__wave"></div>
            <span class="player__duration">04 : 21</span>
          </article>

          <article class="player__row" data-track="border-of-light" data-src="audio/vocal00009_1.1.wav" data-peaks="audio/peaks/vocal00009_1.1.json">
            <button class="player__play" type="button" aria-label="Play">
              <svg class="player__play-icon" viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg>
              <svg class="player__pause-icon" viewBox="0 0 24 24"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
            </button>
            <div class="player__info">
              <div class="player__head">
                <span class="player__type">Documentary</span>
                <h3 class="player__title" title="&quot;At the Border of Light — Theme for a Tibetan Documentary&quot;">"At the Border of Light — Theme for a Tibetan Documentary"</h3>
                <span class="player__time"><span class="player__elapsed">0 : 00</span> / 02 : 38</span>
              </div>
              <div class="player__meta" title="Buddhist heritage documentary · contemplative theme · long-form devotional alaap over drone bed">
                <span class="player__composer">[Composer Name]</span>
                <span class="player__sep">·</span>
                <span class="player__context">Buddhist heritage documentary · contemplative theme · long-form devotional alaap over drone bed</span>
              </div>
            </div>
            <div class="player__wave"></div>
            <span class="player__duration">02 : 38</span>
          </article>

          <article class="player__row" data-track="raga-of-stars" data-src="audio/vocal00010_1.1.wav" data-peaks="audio/peaks/vocal00010_1.1.json">
            <button class="player__play" type="button" aria-label="Play">
              <svg class="player__play-icon" viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg>
              <svg class="player__pause-icon" viewBox="0 0 24 24"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
            </button>
            <div class="player__info">
              <div class="player__head">
                <span class="player__type">Game Cue</span>
                <h3 class="player__title" title="&quot;Raga of the Stars — Cosmos Exploration Theme&quot;">"Raga of the Stars — Cosmos Exploration Theme"</h3>
                <span class="player__time"><span class="player__elapsed">0 : 00</span> / 03 : 14</span>
              </div>
              <div class="player__meta" title="Sci-fi puzzle game · cosmos zone music · sustained vocal pads + granular textures from sound design layer">
                <span class="player__composer">[Composer Name]</span>
                <span class="player__sep">·</span>
                <span class="player__context">Sci-fi puzzle game · cosmos zone music · sustained vocal pads + granular textures from sound design layer</span>
              </div>
            </div>
            <div class="player__wave"></div>
            <span class="player__duration">03 : 14</span>
          </article>

        </div><!-- /.player -->
      </div><!-- /.player-box -->
    </section>


    <!-- §1C TECHNICAL SPECS — inline horizontal rows (Apple-tech-spec pattern)
         Each row: label (left) · spec values (right inline, separated by ·)
         Reads like a spec sheet · denser than card grid · proportional to content
         ──────────────────────────────── -->
    <section class="section" id="tech-details">
      <div class="tech-specs" data-reveal>
        <div class="tech-row">
          <span class="tech-row__label">Format &amp; Compatibility</span>
          <span class="tech-row__values">
            Kontakt 6.7 or higher (Full)
            <span class="tech-row__sep">·</span> Free Kontakt Player not supported
            <span class="tech-row__sep">·</span> macOS 10.14+ / Windows 10+
            <span class="tech-row__sep">·</span> 8 GB RAM min, 16 GB recommended
          </span>
        </div>
        <div class="tech-row">
          <span class="tech-row__label">Library Contents</span>
          <span class="tech-row__values">
            3 master vocalists, 540+ samples
            <span class="tech-row__sep">·</span> 4 mic positions per vocalist
            <span class="tech-row__sep">·</span> 32 ragas mapped chromatically
            <span class="tech-row__sep">·</span> Sanskrit shlokas, Sufi qawwali stems, alaap phrases
          </span>
        </div>
        <div class="tech-row">
          <span class="tech-row__label">Storage &amp; Audio</span>
          <span class="tech-row__values">
            8.4 GB on disk
            <span class="tech-row__sep">·</span> ~12 GB during decompression
            <span class="tech-row__sep">·</span> 24-bit / 48 kHz NCW lossless
            <span class="tech-row__sep">·</span> Native Access · 2 active machines
          </span>
        </div>
        <div class="tech-row">
          <span class="tech-row__label">License &amp; Updates</span>
          <span class="tech-row__values">
            Royalty-free, all commercial use
            <span class="tech-row__sep">·</span> Sync-cleared, AI-training-free at performance level
            <span class="tech-row__sep">·</span> Lifetime updates via Native Access
            <span class="tech-row__sep">·</span> 14-day refund
          </span>
        </div>
      </div>
    </section>


    <!-- §4 VIDEOS ─────────────────────────────── -->
    <section class="section" id="videos">
      <div class="section__head">
        <span class="eyebrow" data-reveal>Videos</span>
        <h2 class="section__title d1" data-reveal>Walkthrough &amp; tutorials</h2>
        <p class="section__sub d2" data-reveal>
          Library walkthrough, scripting tutorials, and live demos. Each video includes timestamps and chapter markers in the YouTube description.
        </p>
      </div>

      <!-- Desktop tabs -->
      <div class="videos__tabs" role="tablist">
        <button class="videos__tab active" data-video="walkthrough" role="tab" aria-selected="true">
          Walkthrough <span class="videos__tab-duration">07:42</span>
        </button>
        <button class="videos__tab" data-video="tutorial-1" role="tab" aria-selected="false">
          Tutorial 1 — Patches <span class="videos__tab-duration">04:18</span>
        </button>
        <button class="videos__tab" data-video="tutorial-2" role="tab" aria-selected="false">
          Tutorial 2 — Articulations <span class="videos__tab-duration">05:51</span>
        </button>
        <button class="videos__tab" data-video="tips" role="tab" aria-selected="false">
          Tips &amp; Tricks <span class="videos__tab-duration">03:24</span>
        </button>
        <button class="videos__tab" data-video="live-demo" role="tab" aria-selected="false">
          Live Demo <span class="videos__tab-duration">06:12</span>
        </button>
      </div>

      <div class="videos__panel-stage">
      <div class="videos__panel-track">
      <div class="videos__panel" data-panel="walkthrough" data-yt-id="3J0NHxFGA3c" data-yt-title="Library Walkthrough — Voices of Ancient India">
        <div class="videos__panel-highlight" aria-hidden="true"></div>
        <div class="videos__panel-vignette" aria-hidden="true"></div>
        <div class="videos__panel-play">
          <button class="videos__panel-btn"><svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg></button>
        </div>
        <div class="videos__panel-overlay">
          <span class="videos__panel-name">Library Walkthrough — Voices of Ancient India</span>
          <span class="videos__thumb-duration" style="position:static;background:none;padding:0;color:rgba(255,255,255,0.7)">07 : 42</span>
        </div>
      </div>
      <div class="videos__panel" data-panel="tutorial-1" data-yt-id="oT27yIgaG8U">
        <div class="videos__panel-highlight" aria-hidden="true"></div>
        <div class="videos__panel-vignette" aria-hidden="true"></div>
        <div class="videos__panel-play">
          <button class="videos__panel-btn"><svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg></button>
        </div>
        <div class="videos__panel-overlay">
          <span class="videos__panel-name">Tutorial 1 — Loading and switching patches</span>
          <span class="videos__thumb-duration" style="position:static;background:none;padding:0;color:rgba(255,255,255,0.7)">04 : 18</span>
        </div>
      </div>
      <div class="videos__panel" data-panel="tutorial-2" data-yt-id="Hr-mbhzS-ys">
        <div class="videos__panel-highlight" aria-hidden="true"></div>
        <div class="videos__panel-vignette" aria-hidden="true"></div>
        <div class="videos__panel-play">
          <button class="videos__panel-btn"><svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg></button>
        </div>
        <div class="videos__panel-overlay">
          <span class="videos__panel-name">Tutorial 2 — Triggering articulations and round-robins</span>
          <span class="videos__thumb-duration" style="position:static;background:none;padding:0;color:rgba(255,255,255,0.7)">05 : 51</span>
        </div>
      </div>
      <div class="videos__panel" data-panel="tips" data-yt-id="E01-uc_RKaQ">
        <div class="videos__panel-highlight" aria-hidden="true"></div>
        <div class="videos__panel-vignette" aria-hidden="true"></div>
        <div class="videos__panel-play">
          <button class="videos__panel-btn"><svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg></button>
        </div>
        <div class="videos__panel-overlay">
          <span class="videos__panel-name">Tips &amp; Tricks — Layering, EQ, and reverb suggestions</span>
          <span class="videos__thumb-duration" style="position:static;background:none;padding:0;color:rgba(255,255,255,0.7)">03 : 24</span>
        </div>
      </div>
      <div class="videos__panel" data-panel="live-demo" data-yt-id="3J0NHxFGA3c" data-yt-placeholder="1">
        <div class="videos__panel-highlight" aria-hidden="true"></div>
        <div class="videos__panel-vignette" aria-hidden="true"></div>
        <div class="videos__panel-play">
          <button class="videos__panel-btn"><svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg></button>
        </div>
        <div class="videos__panel-overlay">
          <span class="videos__panel-name">Live Demo — Sumit performing a cue setup, start to finish</span>
          <span class="videos__thumb-duration" style="position:static;background:none;padding:0;color:rgba(255,255,255,0.7)">06 : 12</span>
        </div>
      </div>
      </div><!-- /.videos__panel-track -->
      <button class="videos__arrow videos__arrow--prev" aria-label="Previous video" type="button">
        <svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="15 5 8 12 15 19" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
      <button class="videos__arrow videos__arrow--next" aria-label="Next video" type="button">
        <svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="9 5 16 12 9 19" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
      </div><!-- /.videos__panel-stage -->

      <!-- Mobile thumb strip -->
      <div class="videos__strip">
        <div class="videos__thumb" data-yt-id="3J0NHxFGA3c">
          <span class="videos__thumb-duration">07 : 42</span>
          <div class="videos__thumb-overlay">
            <div class="videos__thumb-meta">
              <span class="videos__thumb-label">Walkthrough</span>
              <span class="videos__thumb-name">Voices of Ancient India</span>
            </div>
            <button class="videos__thumb-play" aria-label="Play"><svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg></button>
          </div>
        </div>
        <div class="videos__thumb" data-yt-id="oT27yIgaG8U">
          <span class="videos__thumb-duration">04 : 18</span>
          <div class="videos__thumb-overlay">
            <div class="videos__thumb-meta">
              <span class="videos__thumb-label">Tutorial 1</span>
              <span class="videos__thumb-name">Patches</span>
            </div>
            <button class="videos__thumb-play" aria-label="Play"><svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg></button>
          </div>
        </div>
        <div class="videos__thumb" data-yt-id="Hr-mbhzS-ys">
          <span class="videos__thumb-duration">05 : 51</span>
          <div class="videos__thumb-overlay">
            <div class="videos__thumb-meta">
              <span class="videos__thumb-label">Tutorial 2</span>
              <span class="videos__thumb-name">Articulations</span>
            </div>
            <button class="videos__thumb-play" aria-label="Play"><svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg></button>
          </div>
        </div>
        <div class="videos__thumb" data-yt-id="E01-uc_RKaQ">
          <span class="videos__thumb-duration">03 : 24</span>
          <div class="videos__thumb-overlay">
            <div class="videos__thumb-meta">
              <span class="videos__thumb-label">Tips &amp; Tricks</span>
              <span class="videos__thumb-name">Layering & FX</span>
            </div>
            <button class="videos__thumb-play" aria-label="Play"><svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg></button>
          </div>
        </div>
        <div class="videos__thumb" data-yt-id="3J0NHxFGA3c" data-yt-placeholder="1">
          <span class="videos__thumb-duration">06 : 12</span>
          <div class="videos__thumb-overlay">
            <div class="videos__thumb-meta">
              <span class="videos__thumb-label">Live Demo</span>
              <span class="videos__thumb-name">Cue setup walkthrough</span>
            </div>
            <button class="videos__thumb-play" aria-label="Play"><svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg></button>
          </div>
        </div>
      </div>
    </section>


    <!-- §5 PATCHES ────────────────────────────── -->
    <section class="section" id="patches">
      <div class="section__head">
        <span class="eyebrow" data-reveal>Inside the Library</span>
        <h2 class="section__title d1" data-reveal>Patches</h2>
        <p class="section__sub d2" data-reveal>
          Each patch is hand-scripted with its own articulation map, mic mixer, and dynamic layering. Auditioned in the demo player above.
        </p>
      </div>

      <div class="patches" data-reveal>

        <div class="patch">
          <div class="patch__head">
            <h3 class="patch__name">Sanskrit Shloka — Solo Male</h3>
          </div>
          <p class="patch__desc">Lead male vocalist · sustained open vowels · 4 mic positions · 32 ragas mapped chromatically</p>
        </div>

        <div class="patch">
          <div class="patch__head">
            <h3 class="patch__name">Devotional Alaap — Solo Female</h3>
          </div>
          <p class="patch__desc">Lead female vocalist · slow ornamentation · breath-driven phrasing · 6 mood layers</p>
        </div>

        <div class="patch">
          <div class="patch__head">
            <h3 class="patch__name">Sufi Qawwali — Ensemble</h3>
          </div>
          <p class="patch__desc">All three vocalists · call-and-response stems · qawwali-style harmonic clusters</p>
        </div>

        <div class="patch">
          <div class="patch__head">
            <h3 class="patch__name">Sustains &amp; Pads</h3>
          </div>
          <p class="patch__desc">Long-form sustains · pad textures · convolution-ready for ambient and trailer use</p>
        </div>

        <div class="patch">
          <div class="patch__head">
            <h3 class="patch__name">Phrase Library</h3>
          </div>
          <p class="patch__desc">120+ pre-recorded phrases · tempo-locked · key-detection-friendly · drag-to-DAW</p>
        </div>

        <div class="patch">
          <div class="patch__head">
            <h3 class="patch__name">Sound Design Stems</h3>
          </div>
          <p class="patch__desc">Granular vocal textures · reversed alaaps · stretched shlokas · cinematic risers and falls</p>
        </div>

      </div>
    </section>

    <!-- §6 DESCRIPTION — 2-column layout
         Left: prose (60%) · Right: pull-quote + stat blocks (40%)
         Eliminates empty right space · keeps text scannable
         ──────────────────────────────── -->
    <section class="section" id="description">
      <div class="section__head">
        <span class="eyebrow" data-reveal>About this Library</span>
        <h2 class="section__title d1" data-reveal>The story behind the recording</h2>
      </div>

      <div class="description" data-reveal>

        <div class="description__prose">
          <p class="hvid__text-body--lead">
            <span class="leadin">Recorded on location</span>
            <strong>Voices of Ancient India</strong> is the deepest spiritual vocal library Crypto Cipher has ever recorded.
            Three master vocalists from three distinct traditions — Sanskrit-trained classical, Sufi qawwali-trained,
            and devotional alaap-trained — each chosen not just for tone, but for the lineage they carry.
          </p>
          <p>
            Recording took 11 weeks across our studio in India. Every shloka was performed in single takes,
            captured on Royer 122 ribbons, Neumann TLM 49 condensers, and a stereo overhead pair, then
            scripted into Kontakt with phase-aligned mic positions and humanized round-robin timing.
          </p>
          <p>
            The library ships with 32 ragas mapped chromatically, 120+ phrases for drag-to-DAW use,
            a full qawwali ensemble patch with call-and-response stems, and a sound-design layer with
            reversed, granular, and stretched textures for trailer and game scoring. All recordings are
            <strong>sync-cleared globally</strong> and <strong>declared AI-training-free</strong> at performance contract level.
          </p>
          <p>
            This is the library we wished existed when we first started scoring Indian voices into film
            back in 2010. It exists now.
          </p>
        </div>

        <aside class="description__rail">

          <div class="description__quote">
            <svg class="description__quote-mark" viewBox="0 0 24 24" fill="currentColor">
              <path d="M9.4 6.5c-3.5 0-5.9 3-5.9 6.7v4.3h5.6V13h-2.6c0-2.4 1.4-4.2 3.6-4.6L9.4 6.5zm9.4 0c-3.5 0-5.9 3-5.9 6.7v4.3H18.5V13h-2.6c0-2.4 1.4-4.2 3.6-4.6L18.8 6.5z"/>
            </svg>
            <p class="description__quote-body">
              The library we wished existed when we first started scoring Indian voices into film back in 2010.
            </p>
            <span class="description__quote-attr">Sumit Kumar · Founder</span>
          </div>

          <div class="description__stats">
            <div class="description__stat">
              <span class="description__stat-num">11</span>
              <span class="description__stat-label">Weeks of recording</span>
            </div>
            <div class="description__stat">
              <span class="description__stat-num">3</span>
              <span class="description__stat-label">Master vocalists, three traditions</span>
            </div>
            <div class="description__stat">
              <span class="description__stat-num">540+</span>
              <span class="description__stat-label">Single-take samples</span>
            </div>
            <div class="description__stat">
              <span class="description__stat-num">4</span>
              <span class="description__stat-label">Mic positions per vocalist</span>
            </div>
          </div>

        </aside>

      </div>
    </section>

    <!-- §7 LIBRARY CREDITS — compact single-line list (denser than cards)
         Each role: label (left) · names+context (right inline)
         All 8 roles in one tight box · ~50% smaller than cards
         ──────────────────────────────── -->
    <section class="section" id="credits">
      <div class="section__head">
        <span class="eyebrow" data-reveal>Library Credits</span>
        <h2 class="section__title d1" data-reveal>The crew behind this library</h2>
      </div>

      <div class="credits-list" data-reveal>

        <div class="credit-row">
          <span class="credit-row__role">Produced by</span>
          <div class="credit-row__body">
            <strong>Sumit Kumar</strong>
            <em>Founder · Crypto Cipher Audio Lab</em>
          </div>
        </div>

        <div class="credit-row">
          <span class="credit-row__role">Performed by</span>
          <div class="credit-row__body">
            <strong>[Vocalist 1]</strong> <em>Sanskrit shlokas</em>
            <span class="credit-row__sep">·</span>
            <strong>[Vocalist 2]</strong> <em>Devotional alaap</em>
            <span class="credit-row__sep">·</span>
            <strong>[Vocalist 3]</strong> <em>Sufi qawwali</em>
          </div>
        </div>

        <div class="credit-row">
          <span class="credit-row__role">Recording</span>
          <div class="credit-row__body">
            <strong>[Engineer]</strong> <em>Lead</em>
            <span class="credit-row__sep">·</span>
            <strong>[Assistant]</strong> <em>Assistant</em>
          </div>
        </div>

        <div class="credit-row">
          <span class="credit-row__role">Studio</span>
          <div class="credit-row__body">
            <strong>Crypto Cipher Audio Lab</strong>
            <em>India · Royer R-122 · Neumann TLM 49 · AKG C414 · Schoeps CMC6 · UAD preamps</em>
          </div>
        </div>

        <div class="credit-row">
          <span class="credit-row__role">Scripting</span>
          <div class="credit-row__body">
            <strong>[Developer]</strong> <em>Kontakt</em>
            <span class="credit-row__sep">·</span>
            <strong>[KSP Coder]</strong> <em>KSP scripting</em>
          </div>
        </div>

        <div class="credit-row">
          <span class="credit-row__role">Sound Design</span>
          <div class="credit-row__body">
            <strong>[Sound Designer Name]</strong>
          </div>
        </div>

        <div class="credit-row">
          <span class="credit-row__role">Quality Testing</span>
          <div class="credit-row__body">
            <em>Beta composers:</em>
            <strong>[Name 1]</strong>, <strong>[Name 2]</strong>, <strong>[Name 3]</strong>
          </div>
        </div>

        <div class="credit-row">
          <span class="credit-row__role">Demo Composers</span>
          <div class="credit-row__body">
            <em>"Pyre at Dawn"</em> <strong>[Composer 1]</strong>
            <span class="credit-row__sep">·</span>
            <em>"Saffron Road"</em> <strong>[Composer 2]</strong>
            <span class="credit-row__sep">·</span>
            <em>"First Light"</em> <strong>[Composer 3]</strong>
            <span class="credit-row__sep">·</span>
            <em>"Saraswati"</em> <strong>[Composer 4]</strong>
          </div>
        </div>

      </div>
    </section>
@endverbatim
    @else
    <!-- Generic fallback — no rich per-product content authored yet for this instrument -->
    <section class="section" id="tech-details">
      <div class="tech-specs" data-reveal>
        <div class="tech-row">
          <span class="tech-row__label">Format</span>
          <span class="tech-row__values">
            {{ $product->formatLabel() }}
            @if ($isKontaktFormat)
            <span class="tech-row__sep">·</span> Free Kontakt Player not supported
            @endif
          </span>
        </div>
        <div class="tech-row">
          <span class="tech-row__label">Delivery</span>
          <span class="tech-row__values">Instant digital download{{ $isKontaktFormat ? ' via Native Access' : '' }}</span>
        </div>
        <div class="tech-row">
          <span class="tech-row__label">License</span>
          <span class="tech-row__values">Royalty-free, all commercial use <span class="tech-row__sep">·</span> Sync-cleared, AI-training-free</span>
        </div>
        <div class="tech-row">
          <span class="tech-row__label">Price</span>
          <span class="tech-row__values">{{ $product->priceDisplay() }}</span>
        </div>
      </div>
    </section>

    <section class="section" id="description">
      <div class="section__head">
        <span class="eyebrow" data-reveal>About this library</span>
        <h2 class="section__title d1" data-reveal>{{ $product->name }}</h2>
      </div>

      <div class="description" data-reveal>
        <div class="description__prose">
          <p class="hvid__text-body--lead">{{ $product->tagline }}</p>
          @if ($product->artist)
          <p>Performed by <strong>{{ $product->artist }}</strong>.</p>
          @endif
        </div>
      </div>
    </section>
    @endif

    <!-- §8 RECOMMENDED — dynamically pulled from the same instrument family -->
    <section class="section" id="recommended">
      <div class="section__head">
        <span class="eyebrow" data-reveal>Composers Also Bought</span>
        <h2 class="section__title d1" data-reveal>Pairs well with</h2>
      </div>

      <div class="recommended" data-reveal>
        @foreach ($relatedProducts as $related)
        <a href="{{ route('shop.show', $related->slug) }}" class="rec-card">
          <div class="rec-card__art">
            <img class="rec-card__art-bg" src="{{ $related->imageUrl() }}" alt="" loading="lazy" style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;">
            <span class="rec-card__price">{{ $related->priceDisplay() }}</span>
            <span class="cc-format-chip">For {{ $related->formatLabel() }}</span>
          </div>
          <div class="rec-card__body">
            <span class="rec-card__meta">{{ $related->familyLabelDisplay() }} · {{ $related->regionLabelDisplay() }}</span>
            <div class="cc-card-title-row">
              <h3 class="rec-card__name">{{ $related->name }}</h3>
              <div class="cc-card-actions" aria-label="Card actions">
                <button type="button" class="cc-card-action-btn" aria-label="Add {{ $related->name }} to wishlist" data-action="wishlist" data-slug="{{ $related->slug }}">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                </button>
                <button type="button" class="cc-card-action-btn" aria-label="Add {{ $related->name }} to cart" data-action="cart" data-slug="{{ $related->slug }}">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                </button>
              </div>
            </div>
            <span class="rec-card__artist">{{ $related->artist }}</span>
          </div>
        </a>
        @endforeach
      </div>
    </section>

    @if ($isFeaturedProduct)
@verbatim
    <section class="section" id="bundle">
      <div class="bundle-cta" data-reveal>
        <div class="bundle-cta__copy">
          <span class="bundle-cta__eyebrow">Suite · 3 Instruments</span>
          <h3 class="bundle-cta__title">The Voices Suite — includes this library</h3>
          <div class="bundle-cta__price-row">
            <span class="bundle-cta__price-now">$199</span>
            <span class="bundle-cta__price-was">$277</span>
            <span class="bundle-cta__save">Save 28%</span>
          </div>
          <p class="bundle-cta__note">
            Already buying this library? A single-library purchase credits toward this suite within 60 days of your original purchase.
          </p>
        </div>
        <div class="bundle-cta__action">
          <a href="/bundle/voices-suite" class="cta cta--ghost">View Suite <span class="cta__arrow">→</span></a>
        </div>
      </div>
    </section>

    <!-- §10 RECORDING SERVICES CTA ────────────── -->
    <section class="section" id="recording-cta">
      <div class="soft-cta" data-reveal>
        <div class="soft-cta__icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/>
            <path d="M19 10v2a7 7 0 0 1-14 0v-2"/>
            <line x1="12" y1="19" x2="12" y2="23"/>
          </svg>
        </div>
        <div class="soft-cta__copy">
          <h3 class="soft-cta__title">Want it played live for your cue?</h3>
          <p class="soft-cta__sub">
            We can record any of these vocalists for your specific project — direct the performance, request retakes, lock the take you need. 3-4 day delivery · sync-cleared · NDA-friendly · AI-training-free terms confirmed at booking.
          </p>
        </div>
        <a href="/recording-services" class="cta-pill" data-magnetic>
          <span class="cta-pill__label">Book a session</span>
          <span class="cta-pill__arrow" aria-hidden="true">→</span>
          <span class="cta-pill__meter" aria-hidden="true"><i></i><i></i><i></i><i></i></span>
        </a>
      </div>
    </section>
@endverbatim
    @endif

    <section class="section" id="faq">
      <div class="section__head">
        <span class="eyebrow" data-reveal>Library Questions</span>
        <h2 class="section__title d1" data-reveal>Before you buy</h2>
        <p class="section__sub d2" data-reveal>
          Specific questions about {{ $product->name }}. For catalogue-wide questions, see the FAQ on the library shop page.
        </p>
      </div>

      <div class="faq" data-reveal>
        @if ($isFeaturedProduct)
@verbatim

        <details class="faq__item">
          <summary class="faq__q">
            What's the best Kontakt library for Indian devotional and spiritual cues?
            <span class="faq__icon"></span>
          </summary>
          <div class="faq__a-wrap"><div class="faq__a">
            For sacred, devotional, and spiritual scoring, Voices of Ancient India is our deepest vocal library — three master vocalists across Sanskrit, Sufi, and devotional traditions, with full alaap phrasing and qawwali ensemble stems. For melodic ornamentation only (sargams, bandish), pair it with Voices of Ragas Vol 1 or 2. For instrumental backdrops, Bollywood Harmonium and Swarmandal are the most-used companions in spiritual cue scoring.
          </div></div>
        </details>

        <details class="faq__item">
          <summary class="faq__q">
            Does this work with the free Kontakt Player?
            <span class="faq__icon"></span>
          </summary>
          <div class="faq__a-wrap"><div class="faq__a">
            <strong>No.</strong> This library requires <strong>Kontakt 6 Full</strong> (or higher) — a paid one-time purchase from Native Instruments. The free Kontakt Player will load the library but only for 30 minutes per session, which is a Native Instruments restriction across all third-party libraries, not specific to Crypto Cipher.
          </div></div>
        </details>

        <details class="faq__item">
          <summary class="faq__q">
            What are the system requirements?
            <span class="faq__icon"></span>
          </summary>
          <div class="faq__a-wrap"><div class="faq__a">
            Kontakt 6.7 or higher · 8 GB RAM minimum (16 GB recommended for full multi-mic loading) · 12 GB free disk space during install (8.4 GB after) · macOS 10.14+ or Windows 10+. Authorization is one-time via Native Access and supports 2 active machines.
          </div></div>
        </details>

        <details class="faq__item">
          <summary class="faq__q">
            Can I use this in OTT, Hollywood film, and sync placements?
            <span class="faq__icon"></span>
          </summary>
          <div class="faq__a-wrap"><div class="faq__a">
            <strong>Yes — globally.</strong> The single license covers all commercial use including theatrical film, OTT and streaming, broadcast television, advertising, sync placements, and games. The library is declared <strong>sync-cleared</strong> and <strong>AI-training-free</strong> at the performance contract level — meaning the original performances cannot be used to train AI models, including by you, your clients, or any downstream license holder.
          </div></div>
        </details>

        <details class="faq__item">
          <summary class="faq__q">
            How is this different from other Indian vocal libraries?
            <span class="faq__icon"></span>
          </summary>
          <div class="faq__a-wrap"><div class="faq__a">
            Two differences. <strong>Lineage:</strong> our vocalists are working performers from named gharanas and Sufi traditions, not session singers — every recording carries inherited phrasing. <strong>Scripting depth:</strong> 32 ragas mapped chromatically with full alaap-style ornamentation, qawwali ensemble stems with call-and-response, and a sound-design layer for trailer use. The library is built for cue scoring, not just sample browsing.
          </div></div>
        </details>

      @endverbatim
        @else
        @if ($isKontaktFormat)
        <details class="faq__item">
          <summary class="faq__q">
            Does this work with the free Kontakt Player?
            <span class="faq__icon"></span>
          </summary>
          <div class="faq__a-wrap"><div class="faq__a">
            <strong>No.</strong> This library requires <strong>Kontakt 6 Full</strong> (or higher) — a paid one-time purchase from Native Instruments. The free Kontakt Player will load the library but only for 30 minutes per session, which is a Native Instruments restriction across all third-party libraries, not specific to Crypto Cipher.
          </div></div>
        </details>
        @else
        <details class="faq__item">
          <summary class="faq__q">
            What do I need to use this library?
            <span class="faq__icon"></span>
          </summary>
          <div class="faq__a-wrap"><div class="faq__a">
            This library is delivered as a <strong>{{ $product->formatLabel() }}</strong> format. See the technical specs above for exact software/hardware requirements. If you're unsure whether it's compatible with your setup, <a href="{{ route('contact') }}">contact us</a> before purchasing.
          </div></div>
        </details>
        @endif

        <details class="faq__item">
          <summary class="faq__q">
            Can I use this in OTT, Hollywood film, and sync placements?
            <span class="faq__icon"></span>
          </summary>
          <div class="faq__a-wrap"><div class="faq__a">
            <strong>Yes — globally.</strong> The single license covers all commercial use including theatrical film, OTT and streaming, broadcast television, advertising, sync placements, and games. The library is declared <strong>sync-cleared</strong> and <strong>AI-training-free</strong> at the performance contract level — meaning the original performances cannot be used to train AI models, including by you, your clients, or any downstream license holder.
          </div></div>
        </details>
        @endif
      </div>
    </section>

  </div><!-- /.main-col -->
</main>