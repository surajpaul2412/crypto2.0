@verbatim
<main id="main" tabindex="-1" class="libinner">

  <!-- ────────────────────────────────────────────
       SIDE INDEX — sticky left column
       ──────────────────────────────────────────── -->
  <!-- ────────────────────────────────────────────
       SIDENAV-001 — Unified Side Nav
       Active section: kontakt-libraries (LIBINNER default)
       ──────────────────────────────────────────── -->
@endverbatim
@include('frontend.partials.sidenav', ['activeSection' => 'kontakt-libraries', 'currentSlug' => $product->slug])
@verbatim




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
        <a href="/">{{ __('site.ft_home') }}</a>
        <span class="lib-hero__breadcrumb-sep">/</span>
        <a href="/shop">{{ __('site.nav_instruments') }}</a>
        <span class="lib-hero__breadcrumb-sep">/</span>
        <span class="lib-hero__breadcrumb-current">{{ $product->name }}</span>
      </div>

      {{-- Title/tagline always come from the (translatable) product record — the
           featured product previously duplicated its English name/tagline here as
           static markup, which meant it never picked up a translation. --}}
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

      @if ($isFeaturedProduct)
      <div class="lib-hero__video d3" id="hero-video-frame" data-reveal role="button" tabindex="0" aria-label="Play library walkthrough" data-yt-id="uvsQEvH-cxM" data-yt-title="{{ __('shop_detail_featured.video_title') }}">
        <div class="lib-hero__poster" aria-hidden="true"></div>
        <div class="lib-hero__video-highlight" id="hero-video-highlight"></div>
        <div class="lib-hero__video-vignette"></div>

        <!-- Badges overlay — top-left of video -->
        <div class="lib-hero__video-badges">
          <span class="lib-hero__badge lib-hero__badge--flagship">{{ __('shop_detail.flagship_badge') }}</span>
          <span class="lib-hero__badge lib-hero__badge--format">{{ __('shop_detail.for_format_prefix') }} {{ $product->formatLabel() }}</span>
        </div>

        <div class="lib-hero__play">
          <button class="lib-hero__play-btn" aria-label="Play library film">
            <svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg>
          </button>
        </div>

        <div class="lib-hero__video-overlay">
          <div>
            <div class="lib-hero__video-label">{{ __('shop_detail_featured.video_library_film_label') }}</div>
            <div class="lib-hero__video-name">{{ __('shop_detail_featured.video_title') }}</div>
          </div>
          <span class="lib-hero__video-duration">02 : 48</span>
        </div>
      </div>
      @else
      <div class="lib-hero__video d3" data-reveal style="cursor:default;">
        <img src="{{ $product->imageUrl() }}" alt="{{ $product->name }}" loading="lazy" style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;border-radius:inherit;">
        <div class="lib-hero__video-vignette"></div>
        <div class="lib-hero__video-badges">
          @if ($product->flagship)
          <span class="lib-hero__badge lib-hero__badge--flagship">{{ __('shop_detail.flagship_badge') }}</span>
          @endif
          <span class="lib-hero__badge lib-hero__badge--format">{{ __('shop_detail.for_format_prefix') }} {{ $product->formatLabel() }}</span>
        </div>
      </div>
      @endif

      @if ($isFeaturedProduct)
      <!-- Meta strip — thin info band UNDER video -->
      <div class="lib-hero__meta d4" data-reveal>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">{{ __('shop_detail.label_format') }}</span>
          <span class="lib-hero__meta-value">{{ __('shop_detail_featured.meta.value_format') }}</span>
        </div>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">{{ __('shop_detail.label_size') }}</span>
          <span class="lib-hero__meta-value">{{ __('shop_detail_featured.meta.value_size') }}</span>
        </div>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">{{ __('shop_detail.label_vocalists') }}</span>
          <span class="lib-hero__meta-value">{{ __('shop_detail_featured.meta.value_vocalists') }}</span>
        </div>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">{{ __('shop_detail.label_region') }}</span>
          <span class="lib-hero__meta-value">{{ $product->region->label }}</span>
        </div>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">{{ __('shop_detail.label_compatibility') }}</span>
          <span class="lib-hero__meta-value">{{ __('shop_detail_featured.meta.value_compatibility') }}</span>
        </div>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">{{ __('shop_detail.label_license') }}</span>
          <span class="lib-hero__meta-value">{{ __('shop_detail_featured.meta.value_license') }}</span>
        </div>
      </div>
      @else
      <div class="lib-hero__meta d4" data-reveal>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">{{ __('shop_detail.label_format') }}</span>
          <span class="lib-hero__meta-value">{{ __('shop_detail.for_format_prefix') }} {{ $product->formatLabel() }}</span>
        </div>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">{{ __('shop_detail.label_region') }}</span>
          <span class="lib-hero__meta-value">{{ $product->region->label }}</span>
        </div>
        <div class="lib-hero__meta-item">
          <span class="lib-hero__meta-label">{{ __('shop_detail.label_license') }}</span>
          <span class="lib-hero__meta-value">{{ __('shop_detail_featured.meta.value_license') }}</span>
        </div>
      </div>
      @endif
    </section>

    <section class="section" id="price-panel-section">
      <div class="price-panel" data-reveal>

        <div class="price-panel__left">
          <span class="price-panel__eyebrow">{{ __('shop_detail.one_time_purchase') }}</span>
          <div class="price-panel__price-row">
            <span class="price-panel__price">{{ $product->priceDisplay() }}</span>
            @if ($product->price > 0)
            <span class="price-panel__currency">{{ $product->resolvedCurrencyCode() }}</span>
            @endif
          </div>
        </div>

        <div class="price-panel__right">
          <a href="#" class="price-panel__buy" data-action="buy-now" data-slug="{{ $product->slug }}">
            <span class="price-panel__buy-label" data-cart-label>{{ __('shop_detail.buy_instrument') }}</span>
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
            <span><strong>{{ __('shop_detail.kontakt_full_required') }}</strong> {{ __('shop_detail.kontakt_player_incompatible') }}</span>
          </div>
          @endif

          <div class="price-panel__secondary">
            <button class="price-panel__link" id="shortlist-btn" type="button" aria-pressed="false" data-action="wishlist" data-slug="{{ $product->slug }}">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/>
              </svg>
              <span id="shortlist-label" data-wishlist-label>{{ __('shop_detail.save_for_later') }}</span>
            </button>
            <span class="price-panel__divider"></span>
            <button class="price-panel__link" id="license-btn" type="button">{{ __('shop_detail.view_license_terms') }}</button>
          </div>
        </div>

      </div>
    </section>

    @if ($product->tracks->isNotEmpty())
    <section class="section" id="listen">
      <div class="section__head">
        <span class="eyebrow" data-reveal>{{ __('shop_detail.listen_eyebrow') }}</span>
        <h2 class="section__title d1" data-reveal>{{ __('shop_detail.listen_title') }}</h2>
        <p class="section__sub d2" data-reveal>{{ __('shop_detail.listen_sub') }}</p>
      </div>

      <div class="player-box" data-reveal>
        <div class="player" data-advance="on" data-cc-player="legacy" oncontextmenu="return false">
          @foreach ($product->tracks as $track)
          <article class="player__row" data-track="track-{{ $track->id }}" data-src="{{ $track->previewUrl() }}" data-duration="{{ $track->preview_seconds }}">
            <button class="player__play" type="button" aria-label="Play">
              <svg class="player__play-icon" viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg>
              <svg class="player__pause-icon" viewBox="0 0 24 24"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
            </button>
            <div class="player__info">
              <div class="player__head">
                <h3 class="player__title">{{ $track->title }}</h3>
                <span class="player__time"><span class="player__elapsed">0 : 00</span></span>
              </div>
            </div>
            <div class="player__wave"></div>
          </article>
          @endforeach
        </div>
        <p class="player-box__sub" style="margin-top:0.9rem;">{{ __('shop_detail.listen_preview_note') }}</p>
      </div>
    </section>
    @endif

    @if ($isFeaturedProduct)
    @php
        $cueTrackMeta = [
            ['id' => 'pyre-at-dawn', 'src' => 'audio/vocal00001_1.2.wav', 'peaks' => 'audio/peaks/vocal00001_1.2.json', 'duration' => '01 : 38'],
            ['id' => 'saffron-road', 'src' => 'audio/vocal00002_1.1.wav', 'peaks' => 'audio/peaks/vocal00002_1.1.json', 'duration' => '00 : 52'],
            ['id' => 'temple-first-light', 'src' => 'audio/vocal00003_1.1.wav', 'peaks' => 'audio/peaks/vocal00003_1.1.json', 'duration' => '02 : 14'],
            ['id' => 'rivers-saraswati', 'src' => 'audio/vocal00004_1.1.wav', 'peaks' => 'audio/peaks/vocal00004_1.1.json', 'duration' => '03 : 02'],
            ['id' => 'last-monsoon', 'src' => 'audio/vocal00005_1.1.wav', 'peaks' => 'audio/peaks/vocal00005_1.1.json', 'duration' => '02 : 47'],
            ['id' => 'hidden-shrine', 'src' => 'audio/vocal00006_1.1.wav', 'peaks' => 'audio/peaks/vocal00006_1.1.json', 'duration' => '01 : 56'],
            ['id' => 'invocation', 'src' => 'audio/vocal00007_1.1.wav', 'peaks' => 'audio/peaks/vocal00007_1.1.json', 'duration' => '01 : 12'],
            ['id' => 'qawwali-night', 'src' => 'audio/vocal00008_1.1.wav', 'peaks' => 'audio/peaks/vocal00008_1.1.json', 'duration' => '04 : 21'],
            ['id' => 'border-of-light', 'src' => 'audio/vocal00009_1.1.wav', 'peaks' => 'audio/peaks/vocal00009_1.1.json', 'duration' => '02 : 38'],
            ['id' => 'raga-of-stars', 'src' => 'audio/vocal00010_1.1.wav', 'peaks' => 'audio/peaks/vocal00010_1.1.json', 'duration' => '03 : 14'],
        ];
        $cueCopy = __('shop_detail_featured.cues.tracks');

        $videoMeta = [
            ['id' => 'walkthrough', 'yt' => '3J0NHxFGA3c', 'duration' => '07:42', 'placeholder' => false],
            ['id' => 'tutorial-1', 'yt' => 'oT27yIgaG8U', 'duration' => '04:18', 'placeholder' => false],
            ['id' => 'tutorial-2', 'yt' => 'Hr-mbhzS-ys', 'duration' => '05:51', 'placeholder' => false],
            ['id' => 'tips', 'yt' => 'E01-uc_RKaQ', 'duration' => '03:24', 'placeholder' => false],
            ['id' => 'live-demo', 'yt' => '3J0NHxFGA3c', 'duration' => '06:12', 'placeholder' => true],
        ];
        $videoCopy = __('shop_detail_featured.videos.items');

        $patchCopy = __('shop_detail_featured.patches.items');
        $statCopy = __('shop_detail_featured.description.stats');
        $demoComposerCopy = __('shop_detail_featured.credits.demo_composers');
    @endphp
    <section class="section" id="cues">
      <div class="section__head">
        <span class="eyebrow" data-reveal>{{ __('shop_detail_featured.cues.eyebrow') }}</span>
        <h2 class="section__title d1" data-reveal>{{ __('shop_detail_featured.cues.title') }}</h2>
        <p class="section__sub d2" data-reveal>
          {{ __('shop_detail_featured.cues.sub') }}
        </p>
      </div>

      <div class="player-box" data-reveal>
        <header class="player-box__head">
          <div class="player-box__head-left">
            <span class="player-box__eyebrow">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"/></svg>
              {{ __('shop_detail_featured.cues.player_eyebrow') }}
            </span>
            <h3 class="player-box__title">{{ __('shop_detail_featured.cues.player_title') }}</h3>
            <p class="player-box__sub">{{ __('shop_detail_featured.cues.player_sub') }}</p>
          </div>
          <div class="player-box__head-right">
            <span class="player-box__count">{{ __('shop_detail_featured.cues.player_count') }}</span>
          </div>
        </header>

        <div class="player" data-advance="on" data-cc-player="legacy">
          @foreach ($cueTrackMeta as $i => $meta)
          <article class="player__row" data-track="{{ $meta['id'] }}" data-src="{{ $meta['src'] }}" data-peaks="{{ $meta['peaks'] }}">
            <button class="player__play" type="button" aria-label="Play">
              <svg class="player__play-icon" viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg>
              <svg class="player__pause-icon" viewBox="0 0 24 24"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
            </button>
            <div class="player__info">
              <div class="player__head">
                <span class="player__type">{{ $cueCopy[$i]['type'] }}</span>
                <h3 class="player__title" title="{{ $cueCopy[$i]['title'] }}">{{ $cueCopy[$i]['title'] }}</h3>
                <span class="player__time"><span class="player__elapsed">0 : 00</span> / {{ $meta['duration'] }}</span>
              </div>
              <div class="player__meta" title="{{ $cueCopy[$i]['context'] }}">
                <span class="player__composer">{{ __('shop_detail_featured.cues.composer_placeholder') }}</span>
                <span class="player__sep">·</span>
                <span class="player__context">{{ $cueCopy[$i]['context'] }}</span>
              </div>
            </div>
            <div class="player__wave"></div>
            <span class="player__duration">{{ $meta['duration'] }}</span>
          </article>
          @endforeach
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
          <span class="tech-row__label">{{ __('shop_detail_featured.tech.format_compat_label') }}</span>
          <span class="tech-row__values">{{ __('shop_detail_featured.tech.format_compat_values') }}</span>
        </div>
        <div class="tech-row">
          <span class="tech-row__label">{{ __('shop_detail_featured.tech.library_contents_label') }}</span>
          <span class="tech-row__values">{{ __('shop_detail_featured.tech.library_contents_values') }}</span>
        </div>
        <div class="tech-row">
          <span class="tech-row__label">{{ __('shop_detail_featured.tech.storage_audio_label') }}</span>
          <span class="tech-row__values">{{ __('shop_detail_featured.tech.storage_audio_values') }}</span>
        </div>
        <div class="tech-row">
          <span class="tech-row__label">{{ __('shop_detail_featured.tech.license_updates_label') }}</span>
          <span class="tech-row__values">{{ __('shop_detail_featured.tech.license_updates_values') }}</span>
        </div>
      </div>
    </section>


    <!-- §4 VIDEOS ─────────────────────────────── -->
    <section class="section" id="videos">
      <div class="section__head">
        <span class="eyebrow" data-reveal>{{ __('shop_detail_featured.videos.eyebrow') }}</span>
        <h2 class="section__title d1" data-reveal>{{ __('shop_detail_featured.videos.title') }}</h2>
        <p class="section__sub d2" data-reveal>
          {{ __('shop_detail_featured.videos.sub') }}
        </p>
      </div>

      <!-- Desktop tabs -->
      <div class="videos__tabs" role="tablist">
        @foreach ($videoMeta as $i => $meta)
        <button class="videos__tab{{ $i === 0 ? ' active' : '' }}" data-video="{{ $meta['id'] }}" role="tab" aria-selected="{{ $i === 0 ? 'true' : 'false' }}">
          {{ $videoCopy[$i]['tab_label'] }} <span class="videos__tab-duration">{{ $meta['duration'] }}</span>
        </button>
        @endforeach
      </div>

      <div class="videos__panel-stage">
      <div class="videos__panel-track">
      @foreach ($videoMeta as $i => $meta)
      <div class="videos__panel" data-panel="{{ $meta['id'] }}" data-yt-id="{{ $meta['yt'] }}" @if ($meta['placeholder']) data-yt-placeholder="1" @endif @if ($i === 0) data-yt-title="{{ $videoCopy[$i]['panel_name'] }}" @endif>
        <div class="videos__panel-highlight" aria-hidden="true"></div>
        <div class="videos__panel-vignette" aria-hidden="true"></div>
        <div class="videos__panel-play">
          <button class="videos__panel-btn"><svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg></button>
        </div>
        <div class="videos__panel-overlay">
          <span class="videos__panel-name">{{ $videoCopy[$i]['panel_name'] }}</span>
          <span class="videos__thumb-duration" style="position:static;background:none;padding:0;color:rgba(255,255,255,0.7)">{{ $meta['duration'] }}</span>
        </div>
      </div>
      @endforeach
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
        @foreach ($videoMeta as $i => $meta)
        <div class="videos__thumb" data-yt-id="{{ $meta['yt'] }}"@if ($meta['placeholder']) data-yt-placeholder="1"@endif>
          <span class="videos__thumb-duration">{{ $meta['duration'] }}</span>
          <div class="videos__thumb-overlay">
            <div class="videos__thumb-meta">
              <span class="videos__thumb-label">{{ $videoCopy[$i]['thumb_label'] }}</span>
              <span class="videos__thumb-name">{{ $videoCopy[$i]['thumb_name'] }}</span>
            </div>
            <button class="videos__thumb-play" aria-label="Play"><svg viewBox="0 0 24 24"><polygon points="6 4 20 12 6 20 6 4"/></svg></button>
          </div>
        </div>
        @endforeach
      </div>
    </section>


    <!-- §5 PATCHES ────────────────────────────── -->
    <section class="section" id="patches">
      <div class="section__head">
        <span class="eyebrow" data-reveal>{{ __('shop_detail_featured.patches.eyebrow') }}</span>
        <h2 class="section__title d1" data-reveal>{{ __('shop_detail_featured.patches.title') }}</h2>
        <p class="section__sub d2" data-reveal>
          {{ __('shop_detail_featured.patches.sub') }}
        </p>
      </div>

      <div class="patches" data-reveal>
        @foreach ($patchCopy as $patch)
        <div class="patch">
          <div class="patch__head">
            <h3 class="patch__name">{{ $patch['name'] }}</h3>
          </div>
          <p class="patch__desc">{{ $patch['desc'] }}</p>
        </div>
        @endforeach
      </div>
    </section>

    <!-- §6 DESCRIPTION — 2-column layout
         Left: prose (60%) · Right: pull-quote + stat blocks (40%)
         Eliminates empty right space · keeps text scannable
         ──────────────────────────────── -->
    <section class="section" id="description">
      <div class="section__head">
        <span class="eyebrow" data-reveal>{{ __('shop_detail_featured.description.eyebrow') }}</span>
        <h2 class="section__title d1" data-reveal>{{ __('shop_detail_featured.description.title') }}</h2>
      </div>

      <div class="description" data-reveal>

        <div class="description__prose">
          @foreach (__('shop_detail_featured.description.prose') as $i => $paragraph)
          <p @if ($i === 0) class="hvid__text-body--lead" @endif>{!! $paragraph !!}</p>
          @endforeach
        </div>

        <aside class="description__rail">

          <div class="description__quote">
            <svg class="description__quote-mark" viewBox="0 0 24 24" fill="currentColor">
              <path d="M9.4 6.5c-3.5 0-5.9 3-5.9 6.7v4.3h5.6V13h-2.6c0-2.4 1.4-4.2 3.6-4.6L9.4 6.5zm9.4 0c-3.5 0-5.9 3-5.9 6.7v4.3H18.5V13h-2.6c0-2.4 1.4-4.2 3.6-4.6L18.8 6.5z"/>
            </svg>
            <p class="description__quote-body">
              {{ __('shop_detail_featured.description.quote_body') }}
            </p>
            <span class="description__quote-attr">{{ __('shop_detail_featured.description.quote_attr') }}</span>
          </div>

          <div class="description__stats">
            @foreach ($statCopy as $stat)
            <div class="description__stat">
              <span class="description__stat-num">{{ $stat['num'] }}</span>
              <span class="description__stat-label">{{ $stat['label'] }}</span>
            </div>
            @endforeach
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
        <span class="eyebrow" data-reveal>{{ __('shop_detail_featured.credits.eyebrow') }}</span>
        <h2 class="section__title d1" data-reveal>{{ __('shop_detail_featured.credits.title') }}</h2>
      </div>

      <div class="credits-list" data-reveal>

        <div class="credit-row">
          <span class="credit-row__role">{{ __('shop_detail_featured.credits.produced_by_role') }}</span>
          <div class="credit-row__body">
            <strong>{{ __('shop_detail_featured.credits.produced_by_name') }}</strong>
            <em>{{ __('shop_detail_featured.credits.produced_by_title') }}</em>
          </div>
        </div>

        <div class="credit-row">
          <span class="credit-row__role">{{ __('shop_detail_featured.credits.performed_by_role') }}</span>
          <div class="credit-row__body">
            <strong>{{ __('shop_detail_featured.credits.performed_by_v1') }}</strong> <em>{{ __('shop_detail_featured.credits.performed_by_v1_style') }}</em>
            <span class="credit-row__sep">·</span>
            <strong>{{ __('shop_detail_featured.credits.performed_by_v2') }}</strong> <em>{{ __('shop_detail_featured.credits.performed_by_v2_style') }}</em>
            <span class="credit-row__sep">·</span>
            <strong>{{ __('shop_detail_featured.credits.performed_by_v3') }}</strong> <em>{{ __('shop_detail_featured.credits.performed_by_v3_style') }}</em>
          </div>
        </div>

        <div class="credit-row">
          <span class="credit-row__role">{{ __('shop_detail_featured.credits.recording_role') }}</span>
          <div class="credit-row__body">
            <strong>{{ __('shop_detail_featured.credits.recording_lead') }}</strong> <em>{{ __('shop_detail_featured.credits.recording_lead_title') }}</em>
            <span class="credit-row__sep">·</span>
            <strong>{{ __('shop_detail_featured.credits.recording_assistant') }}</strong> <em>{{ __('shop_detail_featured.credits.recording_assistant_title') }}</em>
          </div>
        </div>

        <div class="credit-row">
          <span class="credit-row__role">{{ __('shop_detail_featured.credits.studio_role') }}</span>
          <div class="credit-row__body">
            <strong>{{ __('shop_detail_featured.credits.studio_name') }}</strong>
            <em>{{ __('shop_detail_featured.credits.studio_detail') }}</em>
          </div>
        </div>

        <div class="credit-row">
          <span class="credit-row__role">{{ __('shop_detail_featured.credits.scripting_role') }}</span>
          <div class="credit-row__body">
            <strong>{{ __('shop_detail_featured.credits.scripting_dev') }}</strong> <em>{{ __('shop_detail_featured.credits.scripting_dev_title') }}</em>
            <span class="credit-row__sep">·</span>
            <strong>{{ __('shop_detail_featured.credits.scripting_ksp') }}</strong> <em>{{ __('shop_detail_featured.credits.scripting_ksp_title') }}</em>
          </div>
        </div>

        <div class="credit-row">
          <span class="credit-row__role">{{ __('shop_detail_featured.credits.sound_design_role') }}</span>
          <div class="credit-row__body">
            <strong>{{ __('shop_detail_featured.credits.sound_design_name') }}</strong>
          </div>
        </div>

        <div class="credit-row">
          <span class="credit-row__role">{{ __('shop_detail_featured.credits.quality_testing_role') }}</span>
          <div class="credit-row__body">
            <em>{{ __('shop_detail_featured.credits.quality_testing_label') }}</em>
            {{ __('shop_detail_featured.credits.quality_testing_names') }}
          </div>
        </div>

        <div class="credit-row">
          <span class="credit-row__role">{{ __('shop_detail_featured.credits.demo_composers_role') }}</span>
          <div class="credit-row__body">
            @foreach ($demoComposerCopy as $i => $dc)
            @if ($i > 0)<span class="credit-row__sep">·</span>@endif
            <em>{{ $dc['title'] }}</em> <strong>{{ $dc['name'] }}</strong>
            @endforeach
          </div>
        </div>

      </div>
    </section>
    @else
    <!-- Generic fallback — no rich per-product content authored yet for this instrument -->
    <section class="section" id="tech-details">
      <div class="tech-specs" data-reveal>
        <div class="tech-row">
          <span class="tech-row__label">{{ __('shop_detail.label_format') }}</span>
          <span class="tech-row__values">
            {{ $product->formatLabel() }}
            @if ($isKontaktFormat)
            <span class="tech-row__sep">·</span> {{ __('shop_detail.tech_format_note') }}
            @endif
          </span>
        </div>
        <div class="tech-row">
          <span class="tech-row__label">{{ __('shop_detail.label_delivery') }}</span>
          <span class="tech-row__values">{{ __('shop_detail.tech_instant_download') }}{{ $isKontaktFormat ? ' '.__('shop_detail.tech_via_native_access') : '' }}</span>
        </div>
        <div class="tech-row">
          <span class="tech-row__label">{{ __('shop_detail.label_license') }}</span>
          <span class="tech-row__values">{{ __('shop_detail.tech_royalty_free') }} <span class="tech-row__sep">·</span> {{ __('shop_detail.tech_sync_cleared') }}</span>
        </div>
        <div class="tech-row">
          <span class="tech-row__label">{{ __('shop_detail.label_price') }}</span>
          <span class="tech-row__values">{{ $product->priceDisplay() }}</span>
        </div>
      </div>
    </section>

    <section class="section" id="description">
      <div class="section__head">
        <span class="eyebrow" data-reveal>{{ __('shop_detail.about_this_library') }}</span>
        <h2 class="section__title d1" data-reveal>{{ $product->name }}</h2>
      </div>

      <div class="description" data-reveal>
        <div class="description__prose">
          <p class="hvid__text-body--lead">{{ $product->tagline }}</p>
          @if ($product->artist)
          <p>{{ __('shop_detail.performed_by') }} <strong>{{ $product->artist }}</strong>.</p>
          @endif
        </div>
      </div>
    </section>
    @endif

    <!-- §8 RECOMMENDED — dynamically pulled from the same instrument family -->
    <section class="section" id="recommended">
      <div class="section__head">
        <span class="eyebrow" data-reveal>{{ __('shop_detail.recommended_eyebrow') }}</span>
        <h2 class="section__title d1" data-reveal>{{ __('shop_detail.recommended_title') }}</h2>
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
    <section class="section" id="bundle">
      <div class="bundle-cta" data-reveal>
        <div class="bundle-cta__copy">
          <span class="bundle-cta__eyebrow">{{ __('shop_detail_featured.bundle.eyebrow') }}</span>
          <h3 class="bundle-cta__title">{{ __('shop_detail_featured.bundle.title') }}</h3>
          <div class="bundle-cta__price-row">
            <span class="bundle-cta__price-now">$199</span>
            <span class="bundle-cta__price-was">$277</span>
            <span class="bundle-cta__save">{{ __('shop_detail_featured.bundle.save_badge') }}</span>
          </div>
          <p class="bundle-cta__note">
            {{ __('shop_detail_featured.bundle.note') }}
          </p>
        </div>
        <div class="bundle-cta__action">
          <a href="/bundle/voices-suite" class="cta cta--ghost">{{ __('shop_detail_featured.bundle.cta_label') }} <span class="cta__arrow">→</span></a>
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
          <h3 class="soft-cta__title">{{ __('shop_detail_featured.recording_cta.title') }}</h3>
          <p class="soft-cta__sub">
            {{ __('shop_detail_featured.recording_cta.sub') }}
          </p>
        </div>
        <a href="/recording-services" class="cta-pill" data-magnetic>
          <span class="cta-pill__label">{{ __('shop_detail_featured.recording_cta.cta_label') }}</span>
          <span class="cta-pill__arrow" aria-hidden="true">→</span>
          <span class="cta-pill__meter" aria-hidden="true"><i></i><i></i><i></i><i></i></span>
        </a>
      </div>
    </section>
    @endif

    <section class="section" id="faq">
      <div class="section__head">
        <span class="eyebrow" data-reveal>{{ __('shop_detail.faq_eyebrow') }}</span>
        <h2 class="section__title d1" data-reveal>{{ __('shop_detail.faq_title') }}</h2>
        <p class="section__sub d2" data-reveal>
          {{ __('shop_detail.faq_sub', ['product' => $product->name]) }}
        </p>
      </div>

      <div class="faq" data-reveal>
        @if ($isFeaturedProduct)
        @foreach (__('shop_detail_featured.faq') as $item)
        <details class="faq__item">
          <summary class="faq__q">
            {{ $item['q'] }}
            <span class="faq__icon"></span>
          </summary>
          <div class="faq__a-wrap"><div class="faq__a">
            {{ $item['a'] }}
          </div></div>
        </details>
        @endforeach
        @else
        @if ($isKontaktFormat)
        <details class="faq__item">
          <summary class="faq__q">
            {{ __('shop_detail.faq_kontakt_player_q') }}
            <span class="faq__icon"></span>
          </summary>
          <div class="faq__a-wrap"><div class="faq__a">
            {{ __('shop_detail.faq_kontakt_player_a') }}
          </div></div>
        </details>
        @else
        <details class="faq__item">
          <summary class="faq__q">
            {{ __('shop_detail.faq_non_kontakt_q') }}
            <span class="faq__icon"></span>
          </summary>
          <div class="faq__a-wrap"><div class="faq__a">
            {!! __('shop_detail.faq_non_kontakt_a', [
                'format' => '<strong>'.$product->formatLabel().'</strong>',
                'contact' => '<a href="'.route('contact').'">'.__('shop_detail.faq_non_kontakt_contact_link').'</a>',
            ]) !!}
          </div></div>
        </details>
        @endif

        <details class="faq__item">
          <summary class="faq__q">
            {{ __('shop_detail.faq_sync_q') }}
            <span class="faq__icon"></span>
          </summary>
          <div class="faq__a-wrap"><div class="faq__a">
            {{ __('shop_detail.faq_sync_a') }}
          </div></div>
        </details>
        @endif
      </div>
    </section>

  </div><!-- /.main-col -->
</main>