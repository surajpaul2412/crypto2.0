{{-- Layout ported from static-site/06_404.html. The static mockup's
     auto-suggest/search index pointed at fake /instruments/* product URLs;
     here it's built from this app's real named routes instead. --}}
@php
    $cc404Index = [
        ['type' => 'Section', 'name' => 'Shop — Virtual Instruments', 'url' => route('shop'), 'keywords' => ['instruments','library','libraries','kontakt','samples','shop','catalogue','tabla','sitar','sarangi','bansuri','buy','virtual']],
        ['type' => 'Section', 'name' => 'Recording Services', 'url' => route('recording-services'), 'keywords' => ['recording','remote','session','sync','license','film','ott','studio','sitar','tabla','sarangi','custom']],
        ['type' => 'Section', 'name' => 'Heritage Performances', 'url' => route('heritage-performances'), 'keywords' => ['heritage','documentary','film','rare','disappearing','tradition','performances']],
        ['type' => 'Section', 'name' => 'Collaboration', 'url' => route('collaboration'), 'keywords' => ['collaboration','collab','artist','featured','join','apply']],
        ['type' => 'Section', 'name' => 'Success Stories', 'url' => route('success-stories'), 'keywords' => ['success','stories','testimonial','composer','client','case']],
        ['type' => 'Team', 'name' => 'Team', 'url' => route('team'), 'keywords' => ['team','people','staff','artists','musicians']],
        ['type' => 'FAQ', 'name' => 'FAQ', 'url' => route('faq'), 'keywords' => ['faq','question','help','support']],
        ['type' => 'About', 'name' => 'About Crypto Cipher', 'url' => route('about'), 'keywords' => ['about','us','company','story','history']],
        ['type' => 'Contact', 'name' => 'Contact', 'url' => route('contact'), 'keywords' => ['contact','support','email','reach','help']],
    ];
@endphp

<!-- ═══════════════════════════════════════════════════════════════
     404 — Page Not Found
     ═══════════════════════════════════════════════════════════════ -->
<main id="main" tabindex="-1" class="lost-main">

  <!-- ─── Hero · 404 ─── -->
  <section class="lost-hero">
    <div class="lost-hero__eyebrow" data-reveal>Page Not Found</div>
    <div class="lost-hero__num" data-reveal>404</div>
    <h1 class="lost-hero__title" data-reveal>Looks like that link <em>moved or retired</em>.</h1>
    <p class="lost-hero__sub" data-reveal>
      We've been making audio since 2010 — a few old pages have been retired or reshaped over the years. Let's get you to what you were looking for.
    </p>
    <div class="lost-hero__url" id="brokenUrl" data-reveal>
      <span id="brokenUrlPath">/</span>
    </div>
  </section>

  <!-- ─── 3-layer triage ─── -->
  <div class="triage">

    <!-- LAYER 1 — Auto-suggest from URL keywords -->
    <section class="triage-layer" id="layerSuggest" data-reveal>
      <header class="triage-layer__head">
        <span class="triage-layer__num">i</span>
        <div>
          <div class="triage-layer__title">Did you mean one of these?</div>
          <div class="triage-layer__sub" id="suggestSub">Matched from the URL you tried</div>
        </div>
      </header>
      <div class="suggest" id="suggestGrid"></div>
    </section>

    <!-- LAYER 2 — Intent picker -->
    <section class="triage-layer" data-reveal>
      <header class="triage-layer__head">
        <span class="triage-layer__num">ii</span>
        <div>
          <div class="triage-layer__title">Tell us what you came for</div>
          <div class="triage-layer__sub">Pick a category and we'll take you there</div>
        </div>
      </header>
      <div class="intent">
        <a href="{{ route('shop') }}" class="intent__btn">
          <span class="intent__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
          </span>
          <span class="intent__label">Kontakt Libraries</span>
          <span class="intent__desc">Tabla, dholak, voices, tarangs, and more authentic Indian instruments</span>
        </a>
        <a href="{{ route('recording-services') }}" class="intent__btn">
          <span class="intent__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/></svg>
          </span>
          <span class="intent__label">Remote Recording</span>
          <span class="intent__desc">Session-director-led recording for film, OTT, and sync</span>
        </a>
        <a href="{{ route('heritage-performances') }}" class="intent__btn">
          <span class="intent__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
          </span>
          <span class="intent__label">Heritage Films</span>
          <span class="intent__desc">Documentary recordings of disappearing Indian instruments</span>
        </a>
        <a href="{{ route('collaboration') }}" class="intent__btn">
          <span class="intent__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </span>
          <span class="intent__label">Collaboration</span>
          <span class="intent__desc">Apply as an artist, composer, or partner</span>
        </a>
      </div>
    </section>

    <!-- LAYER 3 — Search + browse fallback -->
    <section class="triage-layer" data-reveal>
      <header class="triage-layer__head">
        <span class="triage-layer__num">iii</span>
        <div>
          <div class="triage-layer__title">Search the whole site</div>
          <div class="triage-layer__sub">Or browse the site sections below</div>
        </div>
      </header>

      <div class="search-wrap">
        <span class="search-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        </span>
        <input type="search" class="search-input" id="searchInput" placeholder="Try &#39;tabla&#39;, &#39;recording&#39;, &#39;heritage&#39;..." autocomplete="off" aria-label="Search the site">
      </div>
      <div class="search-results" id="searchResults" aria-live="polite"></div>

      <div class="browse-grid" id="browseGrid"></div>

      <div class="lost-cta">
        <span class="lost-cta__label">Still lost?</span>
        <a href="{{ route('home') }}" class="cta-pill" data-magnetic>
          <span class="cta-pill__label">Back to home</span>
          <span class="cta-pill__arrow" aria-hidden="true">→</span>
          <span class="cta-pill__meter" aria-hidden="true"><i></i><i></i><i></i><i></i></span>
        </a>
      </div>
    </section>

  </div>
</main>

<script>
  window.CC404_INDEX = @json($cc404Index);
</script>
