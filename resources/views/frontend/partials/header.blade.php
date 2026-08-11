<nav class="cc-nav" id="cc-nav" role="navigation" aria-label="Main navigation">
  <a href="{{ route('home') }}" class="cc-nav__logo" aria-label="Crypto Cipher Home">
    <img src="{{ asset('frontend/assets/img/logo.svg') }}" alt="Crypto Cipher Audio Lab" height="40" width="102" loading="lazy">
  </a>

  <ul class="cc-nav__menu">
    <li class="cc-nav__item"><a class="cc-nav__link" href="{{ route('shop') }}"><svg class="cc-nav__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg><span class="cc-nav__label">Instruments</span></a></li>
    <li class="cc-nav__item"><a class="cc-nav__link" href="{{ route('recording-services') }}"><svg class="cc-nav__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/></svg><span class="cc-nav__label">Recordings</span></a></li>
    <li class="cc-nav__item"><a class="cc-nav__link" href="{{ route('heritage-performances') }}"><svg class="cc-nav__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg><span class="cc-nav__label">Heritage</span></a></li>
    <li class="cc-nav__item"><a class="cc-nav__link" href="{{ route('collaboration') }}"><svg class="cc-nav__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg><span class="cc-nav__label">Collaborate</span></a></li>
    <li class="cc-nav__item"><a class="cc-nav__link" href="{{ route('about') }}"><svg class="cc-nav__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg><span class="cc-nav__label">About</span></a></li>
    <li class="cc-nav__item"><a class="cc-nav__link" href="{{ route('contact') }}"><svg class="cc-nav__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg><span class="cc-nav__label">Contact</span></a></li>

    <li class="cc-nav__item cc-nav__item--social">
      <button class="cc-nav__link cc-nav__link--social" type="button" aria-haspopup="true" aria-expanded="false" aria-controls="cc-nav-social-dropdown" aria-label="Social media">
        <svg class="cc-nav__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>
        <span class="cc-nav__label">Social</span>
      </button>
      <div class="cc-nav__dropdown" id="cc-nav-social-dropdown" role="menu" aria-hidden="true">
        <a href="https://www.instagram.com/cryptocipher/" class="cc-nav__dropdown-item" role="menuitem" target="_blank" rel="noopener noreferrer">
          <svg class="cc-nav__dropdown-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
          <span>Instagram</span>
        </a>
        <a href="https://www.facebook.com/CryptoCipherAudioLab/" class="cc-nav__dropdown-item" role="menuitem" target="_blank" rel="noopener noreferrer">
          <svg class="cc-nav__dropdown-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
          <span>Facebook</span>
        </a>
        <a href="https://in.linkedin.com/company/crypto-cipher" class="cc-nav__dropdown-item" role="menuitem" target="_blank" rel="noopener noreferrer">
          <svg class="cc-nav__dropdown-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
          <span>LinkedIn</span>
        </a>
      </div>
    </li>

    <li class="cc-nav__item cc-nav__item--account">
      <button class="cc-nav__link cc-nav__link--account" type="button" aria-haspopup="true" aria-expanded="false" aria-controls="cc-nav-account-dropdown" aria-label="Account">
        <svg class="cc-nav__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        <span class="cc-nav__label">Login</span>
        <span class="cc-nav__badge" data-cart-total hidden aria-hidden="true">0</span>
      </button>
      <div class="cc-nav__dropdown cc-nav__dropdown--right" id="cc-nav-account-dropdown" role="menu" aria-hidden="true">
        <a href="{{ route('login') }}" class="cc-nav__dropdown-item" role="menuitem">
          <svg class="cc-nav__dropdown-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
          <span>Sign in</span>
        </a>
        <a href="{{ route('register') }}" class="cc-nav__dropdown-item" role="menuitem">
          <svg class="cc-nav__dropdown-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
          <span>Sign up</span>
        </a>
        <span class="cc-nav__dropdown-divider" role="separator"></span>
        <a href="{{ route('wishlist.index') }}" class="cc-nav__dropdown-item" role="menuitem">
          <svg class="cc-nav__dropdown-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
          <span>Wishlist</span>
          <span class="cc-nav__dropdown-count" data-wishlist-count hidden>0</span>
        </a>
        <a href="{{ route('cart.index') }}" class="cc-nav__dropdown-item" role="menuitem">
          <svg class="cc-nav__dropdown-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
          <span>Cart</span>
          <span class="cc-nav__dropdown-count" data-cart-count hidden>0</span>
        </a>
      </div>
    </li>
  </ul>

  <a href="https://svantra.in" class="cc-nav__svantra" target="_blank" rel="noopener noreferrer" data-magnetic aria-label="Visit Svantra in a new tab">
    <span class="cc-nav__svantra-glow" aria-hidden="true"></span>
    <span class="cc-nav__svantra-bg" aria-hidden="true"></span>
    <span class="cc-nav__svantra-shine" aria-hidden="true"></span>
    <span class="cc-nav__svantra-content">
      <span class="cc-nav__svantra-text">Svantra</span>
      <span class="cc-nav__svantra-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7"/><path d="M8 7h9v9"/></svg></span>
    </span>
    <span class="cc-nav__svantra-edge" aria-hidden="true"></span>
  </a>

  <button class="cc-nav__hamburger" type="button" aria-label="Toggle navigation" aria-controls="cc-nav-mobile" aria-expanded="false">
    <span></span>
    <span></span>
    <span></span>
  </button>
</nav>
