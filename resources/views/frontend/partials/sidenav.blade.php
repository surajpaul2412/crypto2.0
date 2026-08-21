{{--
    Shared site lateral nav — "Virtual Instruments / Recording Services / Heritage
    Films" sidebar. Previously copy-pasted verbatim into 8 different *-content.blade.php
    files (privacy-policy, cookie-policy, terms-of-service, collaboration, heritage,
    recording-services, recording-services-inner, shop-detail) — centralised here so
    there's one place to fix/update it.

    Params:
    - $activeSection (string, optional) — value for data-active-section. Currently
      informational only (no JS reads it yet); default 'recording-services' matches
      what most pages already had.
    - $currentSlug (string|null, optional) — instrument slug to mark as the current
      page in the "Virtual Instruments" list (adds .current + aria-current="page").
      Pass the product slug from shop-detail; leave null everywhere else.

    The "Virtual Instruments" list itself is pulled live from the products table
    (same query/order as ShopController::index) — add/remove/reorder a product in
    the admin and it shows up here automatically, on all 8 pages that include this
    partial, no code change needed.
--}}
@php
    $activeSection ??= 'recording-services';
    $currentSlug ??= null;

    $sidenavInstruments = \App\Models\Product::published()->orderBy('sort_order')->get(['slug', 'name']);
@endphp
<!-- COMPONENT: sidenav START -->
<aside class="sidenav" id="sidenav" data-active-section="{{ $activeSection }}" aria-label="Site navigation">

  <!-- Mobile pull tab · grip pulses when closed; sticky + close button when open -->
  <div class="sidenav__pull" id="sidenav-pull" role="button" tabindex="0" aria-label="Open navigation" aria-expanded="false">
    <div class="sidenav__pull-grip"></div>
    <span class="sidenav__pull-label" id="sidenav-pull-label">Navigate</span>
    <span class="sidenav__pull-meta">{{ $sidenavInstruments->count() }} · 8</span>
    <button class="sidenav__pull-close" id="sidenav-pull-close" type="button" aria-label="Close navigation">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
  </div>

  <!-- ─── SECTION 1: KONTAKT LIBRARIES (locked-open) ─── -->
  <section class="sidenav__section expanded locked-open" data-section="kontakt-libraries">
    <button class="sidenav__section-head" aria-expanded="true" aria-controls="sec-libs">
      <span class="sidenav__section-label">
        <span class="sidenav__section-label-text">Virtual Instruments</span>
        <span class="sidenav__section-count">{{ $sidenavInstruments->count() }} instruments</span>
      </span>
      <span class="sidenav__section-arrow">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
      </span>
    </button>
    <div class="sidenav__section-body" id="sec-libs">
      <div class="sidenav__section-body-inner">
        <div class="sidenav__section-body-pad">
          <ul class="sidenav__list sidenav__list--libs">
            @foreach ($sidenavInstruments as $instrument)
            <li><a href="{{ route('shop.show', $instrument->slug) }}" class="sidenav__item @if ($instrument->slug === $currentSlug) current @endif" @if ($instrument->slug === $currentSlug) aria-current="page" @endif><span class="sidenav__item-name">{{ $instrument->name }}</span></a></li>
            @endforeach
          </ul>
          <a href="{{ route('shop') }}" class="sidenav__footer-link">View all instruments <span class="sidenav__footer-link-arrow">→</span></a>
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
<!-- COMPONENT: sidenav END -->
