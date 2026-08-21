<main id="main" tabindex="-1" class="libinner">

  <!-- ────────────────────────────────────────────
       SIDE INDEX — sticky left column
       ──────────────────────────────────────────── -->
  <!-- ────────────────────────────────────────────
       SIDENAV-001 — Unified Side Nav
       Active section: kontakt-libraries (LIBINNER default)
       ──────────────────────────────────────────── -->
@include('frontend.partials.sidenav', ['activeSection' => 'heritage-films'])




  <!-- ────────────────────────────────────────────
       MAIN COLUMN
       ──────────────────────────────────────────── -->
<div class="main-col">

    <!-- ════════════════════════════════════════════════════════════
         §1 CINEMATIC HERO · Netflix-style · video as backdrop,
         title + description overlay top-left, all in one frame
         ──────────────────────────────────────────── -->
    <section class="heritage-cinehero" id="hero" aria-labelledby="cinehero-title">
      <div class="heritage-cinehero__section-head">
        <span class="heritage-cinehero__section-rule"></span>
        <span class="heritage-cinehero__section-label">Featured Film</span>
      </div>
      <article class="heritage-cinehero__card" data-yt-id="pTXWnHvZF8Y" data-yt-title="Raag Ahir Bhairav at Qutab Minar — Pt. Sunil Kant Saxena" data-hero-thumb="assets/img/heritage-hero-portrait.jpg">

        <!-- Backdrop layer. Mobile (≤640px) uses a custom 4:5 portrait key-art so
             the hero card fills with NO crop; wider screens use the 16:9 YouTube
             thumb. Swap data-hero-thumb / the mobile <source> to art-direct. -->
        <div class="heritage-cinehero__backdrop" aria-hidden="true">
          <picture>
            <source media="(max-width: 640px)" srcset="assets/img/heritage-hero-portrait.jpg">
            <img class="heritage-cinehero__thumb" src="https://i.ytimg.com/vi/pTXWnHvZF8Y/maxresdefault.jpg" alt="" />
          </picture>
          <div class="heritage-cinehero__scrim"></div>
        </div>

        <!-- Foreground content overlay (left-aligned, Netflix-style) -->
        <div class="heritage-cinehero__content" data-reveal>
          <nav class="heritage-cinehero__crumb">
            <a href="/">Home</a>
            <span class="heritage-cinehero__crumb-sep">/</span>
            <span class="heritage-cinehero__crumb-current">Heritage Films</span>
          </nav>

          <h1 class="heritage-cinehero__title" id="cinehero-title">
            Music as <em>medicine.</em>
          </h1>

          <p class="heritage-cinehero__tagline">
            For three thousand years, Indian classical music has been a path to stillness — a practice for the mind, not just the ear. We film the masters who still carry it.
          </p>

          <div class="heritage-cinehero__meta">
            <span class="heritage-cinehero__chip">Sitar</span>
            <span class="heritage-cinehero__dot">·</span>
            <span>Raga Ahir Bhairav</span>
            <span class="heritage-cinehero__dot">·</span>
            <span>Pt. Sunil Kant Saxena</span>
          </div>

          <div class="heritage-cinehero__actions">
            <button class="heritage-cinehero__play-btn" type="button" data-cinehero-play>
              <svg viewBox="0 0 16 16" width="14" height="14" fill="currentColor" aria-hidden="true"><polygon points="3,2 13,8 3,14"/></svg>
              <span>Watch film</span>
            </button>
            <a class="heritage-cinehero__secondary-btn" href="#archive">
              <span>Browse archive</span>
              <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><line x1="12" y1="5" x2="12" y2="19"/><polyline points="19 12 12 19 5 12"/></svg>
            </a>
          </div>
        </div>

        <!-- Center play button overlay (mobile + tap target) -->
        <button class="heritage-cinehero__center-play" type="button" data-cinehero-play aria-label="Play featured film">
          <svg viewBox="0 0 80 80" width="80" height="80" aria-hidden="true">
            <circle cx="40" cy="40" r="38" fill="rgba(13,17,23,0.4)" stroke="rgba(187,214,122,0.55)" stroke-width="1.2"/>
            <polygon points="33,25 33,55 58,40" fill="#BBD67A"/>
          </svg>
        </button>

        <!-- Duration tag top-right -->
      </article>
    </section>

    <!-- ════════════════════════════════════════════════════════════
         §3 HIGHLIGHTS · 3 curated pieces showing the meditative dimension
         ──────────────────────────────────────────── -->
    <section class="section heritage-highlights" id="highlights" aria-labelledby="highlights-title">
      <header class="heritage-section-head" data-reveal>
        <span class="eyebrow heritage-eyebrow">
          Special Films
        </span>
        <h2 class="heritage-section-title" id="highlights-title">The Practice</h2>
        <p class="heritage-section-head__sub">Modern science is rediscovering what Indian musicians have known for centuries: raga listening shifts brain states, lowers cortisol, and restores attention. These three films open that door.</p>
      </header>

      <div class="heritage-highlights__grid">
        <article class="heritage-card heritage-card--highlight" data-yt-id="hv0rjjIy0Xw" data-yt-title="Dilruba — robber of the heart">
          <div class="heritage-card__media">
            <img class="heritage-card__thumb" src="https://i.ytimg.com/vi/hv0rjjIy0Xw/maxresdefault.jpg" alt="" loading="lazy" />
            <div class="heritage-card__vignette"></div>
            <div class="heritage-card__play" aria-hidden="true">
              <svg viewBox="0 0 48 48" width="48" height="48"><circle cx="24" cy="24" r="23" fill="rgba(13,17,23,0.55)" stroke="rgba(187,214,122,0.5)"/><polygon points="20,15 20,33 33,24" fill="#BBD67A"/></svg>
            </div>
            <span class="heritage-tag">Dilruba</span>
          </div>
          <div class="heritage-card__body">
            <h3 class="heritage-card__title">Dilruba — robber of the heart</h3>
            <p class="heritage-card__meta">A devotional bow-string piece for evening practice</p>
          </div>
        </article>

        <article class="heritage-card heritage-card--highlight" data-yt-id="DAdCP0cQJGY" data-yt-title="Raga Vocals — the breath as instrument">
          <div class="heritage-card__media">
            <img class="heritage-card__thumb" src="https://i.ytimg.com/vi/DAdCP0cQJGY/maxresdefault.jpg" alt="" loading="lazy" />
            <div class="heritage-card__vignette"></div>
            <div class="heritage-card__play" aria-hidden="true">
              <svg viewBox="0 0 48 48" width="48" height="48"><circle cx="24" cy="24" r="23" fill="rgba(13,17,23,0.55)" stroke="rgba(187,214,122,0.5)"/><polygon points="20,15 20,33 33,24" fill="#BBD67A"/></svg>
            </div>
            <span class="heritage-tag">Vocal</span>
          </div>
          <div class="heritage-card__body">
            <h3 class="heritage-card__title">Raga Vocals — the breath as instrument</h3>
            <p class="heritage-card__meta">An aalap on Raga Marwa for the dusk hour</p>
          </div>
        </article>

        <article class="heritage-card heritage-card--highlight" data-yt-id="fCNqOViwY9k" data-yt-title="Tabla — Lagi Ladi · the rhythm of attention">
          <div class="heritage-card__media">
            <img class="heritage-card__thumb" src="https://i.ytimg.com/vi/fCNqOViwY9k/maxresdefault.jpg" alt="" loading="lazy" />
            <div class="heritage-card__vignette"></div>
            <div class="heritage-card__play" aria-hidden="true">
              <svg viewBox="0 0 48 48" width="48" height="48"><circle cx="24" cy="24" r="23" fill="rgba(13,17,23,0.55)" stroke="rgba(187,214,122,0.5)"/><polygon points="20,15 20,33 33,24" fill="#BBD67A"/></svg>
            </div>
            <span class="heritage-tag">Tabla</span>
          </div>
          <div class="heritage-card__body">
            <h3 class="heritage-card__title">Tabla — Lagi Ladi · the rhythm of attention</h3>
            <p class="heritage-card__meta">A rhythmic cycle that trains the mind to follow patterns</p>
          </div>
        </article>
      </div>
    </section>

    <!-- ════════════════════════════════════════════════════════════
         §4 ARCHIVE · the full collection · 12 films · filter by instrument
         ──────────────────────────────────────────── -->
    <section class="section heritage-archive" id="archive" aria-labelledby="archive-title">
      <header class="heritage-section-head" data-reveal>
        <span class="eyebrow eyebrow--italic heritage-since">Since 2010</span>
        <h2 class="heritage-section-title" id="archive-title">The Archive</h2>
        <p class="heritage-section-head__sub">Every film in the collection. Filter by instrument — each tradition carries its own pathway to stillness.</p>
      </header>

      <nav class="heritage-filters" role="tablist" aria-label="Filter by instrument">
        <button class="heritage-chip is-active" type="button" data-filter="all" role="tab" aria-selected="true">
          All <span class="heritage-chip__count">{{ $heritagePerformances->count() }}</span>
        </button>
        @foreach ($heritageCategories as $heritageCategory)
        <button class="heritage-chip" type="button" data-filter="{{ $heritageCategory->slug }}" role="tab" aria-selected="false">
          {{ $heritageCategory->label }} <span class="heritage-chip__count">{{ $heritageCategory->performances_count }}</span>
        </button>
        @endforeach
      </nav>

      <div class="heritage-archive__grid" id="archive-grid">

        @foreach ($heritagePerformances as $heritagePerformance)
        <article class="heritage-card" data-instrument="{{ $heritagePerformance->category->slug }}" data-yt-id="{{ $heritagePerformance->youtube_id }}" data-yt-title="{{ $heritagePerformance->displayLightboxTitle() }}">
          <div class="heritage-card__media">
            <img class="heritage-card__thumb" src="{{ $heritagePerformance->thumbnailUrl() }}" alt="" loading="lazy" />
            <div class="heritage-card__vignette"></div>
            <div class="heritage-card__play" aria-hidden="true"><svg viewBox="0 0 48 48" width="44" height="44"><circle cx="24" cy="24" r="23" fill="rgba(13,17,23,0.55)" stroke="rgba(187,214,122,0.5)"/><polygon points="20,15 20,33 33,24" fill="#BBD67A"/></svg></div>
            <span class="heritage-tag">{{ $heritagePerformance->category->label }}</span>
          </div>
          <div class="heritage-card__body">
            <h3 class="heritage-card__title">{{ $heritagePerformance->title }}</h3>
            <p class="heritage-card__meta">{{ $heritagePerformance->subtitle }}</p>
          </div>
        </article>
        @endforeach

      </div>

      <!-- Discrete outbound to full playlist — for users who want continuous play -->
      <p class="heritage-archive__outbound">
        <span class="heritage-archive__outbound-prefix">Want it on in the background?</span>
        <a class="heritage-archive__outbound-link" href="https://www.youtube.com/playlist?list=PL-qjKbqchCDaJULWtkLYBY83HIr2d_sYB" target="_blank" rel="noopener noreferrer">
          View full playlist on YouTube
          <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M7 17L17 7"/>
            <polyline points="7 7 17 7 17 17"/>
          </svg>
        </a>
      </p>
    </section>

  </div><!-- /.main-col -->
</main>
