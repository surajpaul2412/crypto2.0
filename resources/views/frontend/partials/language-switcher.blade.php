@php
    $ccLocales = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales();
    $ccCurrentLocale = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale();
@endphp
@if (count($ccLocales) > 1)
<nav class="ft__lang" aria-label="{{ __('site.lang_label') }}">
  <svg class="ft__lang-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15 15 0 0 1 0 20 15 15 0 0 1 0-20z"/></svg>
  <ul class="ft__lang-list">
    @foreach ($ccLocales as $code => $props)
      <li>
        <a class="ft__lang-link{{ $code === $ccCurrentLocale ? ' is-active' : '' }}"
           href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($code, null, [], true) }}"
           hreflang="{{ $code }}" lang="{{ $code }}" rel="alternate"
           @if ($code === $ccCurrentLocale) aria-current="true" @endif>{{ $props['native'] }}</a>
      </li>
    @endforeach
  </ul>
</nav>
@endif
