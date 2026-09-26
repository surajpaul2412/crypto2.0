@php
    $ccLang = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::class;
    $ccLocales = $ccLang::getSupportedLocales();
    $ccCurrentLocale = $ccLang::getCurrentLocale();
@endphp
@if (count($ccLocales) > 1)
<li class="cc-nav__item cc-nav__item--lang">
  <button class="cc-nav__link cc-nav__link--lang" type="button" aria-haspopup="true" aria-expanded="false" aria-controls="cc-nav-lang-dropdown" aria-label="{{ __('site.lang_label') }}">
    <svg class="cc-nav__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15 15 0 0 1 0 20 15 15 0 0 1 0-20z"/></svg>
    <span class="cc-nav__label">{{ strtoupper($ccCurrentLocale) }}</span>
  </button>
  <div class="cc-nav__dropdown cc-nav__dropdown--lang" id="cc-nav-lang-dropdown" role="menu" aria-hidden="true">
    @foreach ($ccLocales as $code => $props)
      <a class="cc-nav__dropdown-item{{ $code === $ccCurrentLocale ? ' is-active' : '' }}" role="menuitem"
         href="{{ $ccLang::getLocalizedURL($code, null, [], true) }}" hreflang="{{ $code }}" lang="{{ $code }}" rel="alternate"
         @if ($code === $ccCurrentLocale) aria-current="true" @endif>
        <span class="cc-lang__code">{{ strtoupper($code) }}</span>
        <span>{{ $props['native'] }}</span>
      </a>
    @endforeach
  </div>
</li>
<script>
(function () {
  var trigger = document.querySelector('.cc-nav__link--lang');
  var dropdown = document.getElementById('cc-nav-lang-dropdown');
  if (!trigger || !dropdown) return;
  function setOpen(open) {
    dropdown.classList.toggle('open', open);
    trigger.setAttribute('aria-expanded', open ? 'true' : 'false');
    dropdown.setAttribute('aria-hidden', open ? 'false' : 'true');
  }
  trigger.addEventListener('click', function (e) {
    e.stopPropagation();
    document.querySelectorAll('.cc-nav__dropdown.open').forEach(function (d) {
      if (d !== dropdown) d.classList.remove('open');
    });
    setOpen(!dropdown.classList.contains('open'));
  });
  document.addEventListener('click', function (e) {
    if (!dropdown.contains(e.target) && !trigger.contains(e.target)) setOpen(false);
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && dropdown.classList.contains('open')) { setOpen(false); trigger.focus(); }
  });
})();
</script>
@endif
