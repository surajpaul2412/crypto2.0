@php
    $ccLang = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::class;
    $ccLocales = $ccLang::getSupportedLocales();
    $ccCurrentLocale = $ccLang::getCurrentLocale();
@endphp
@if (count($ccLocales) > 1)
  <div class="cc-nav__mobile-divider" aria-hidden="true"></div>
  <span class="cc-nav__mobile-section-label">{{ __('site.lang_label') }}</span>
  <div class="cc-lang-mobile">
    @foreach ($ccLocales as $code => $props)
      <a class="cc-lang-mobile__link{{ $code === $ccCurrentLocale ? ' is-active' : '' }}"
         href="{{ $ccLang::getLocalizedURL($code, null, [], true) }}" hreflang="{{ $code }}" lang="{{ $code }}" rel="alternate"
         title="{{ $props['native'] }}" @if ($code === $ccCurrentLocale) aria-current="true" @endif>{{ strtoupper($code) }}</a>
    @endforeach
  </div>
@endif
