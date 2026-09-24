<footer class="ft" id="footer" data-reveal>
  <div class="ft__bg"></div>
  <div class="ft__glow"></div>

  <div class="ft__wrap">
    <div class="ft__grid">
      <div class="ft__col">
        <div class="ft__col-head">{{ __('site.ft_navigation') }}</div>
        <a href="{{ route('home') }}">{{ __('site.ft_home') }}</a>
        <a href="{{ route('shop') }}">{{ __('site.nav_instruments') }}</a>
        <a href="{{ route('recording-services') }}">{{ __('site.nav_recordings') }}</a>
        <a href="{{ route('heritage-performances') }}">{{ __('site.nav_heritage') }}</a>
        <a href="/academy">{{ __('site.ft_academy') }}</a>
        <a href="{{ route('collaboration') }}">{{ __('site.ft_collaboration') }}</a>
        <a href="{{ route('about') }}">{{ __('site.nav_about') }}</a>
        <a href="{{ route('contact') }}">{{ __('site.nav_contact') }}</a>
      </div>

      <div class="ft__col">
        <div class="ft__col-head">{{ __('site.ft_catalogue') }}</div>
        <a href="{{ route('shop') }}">{{ __('site.ft_virtual_instruments') }}</a>
        <a href="/instruments/new">{{ __('site.ft_new_releases') }}</a>
        <a href="/instruments/best-sellers">{{ __('site.ft_best_sellers') }}</a>
        <a href="/licensing">{{ __('site.ft_licensing') }}</a>
      </div>

      <div class="ft__col">
        <div class="ft__col-head">{{ __('site.ft_collaboration') }}</div>
        <a href="/collaboration/artists">{{ __('site.ft_artists') }}</a>
        <a href="/collaboration/composers">{{ __('site.ft_composers') }}</a>
        <a href="/collaboration/ai-audio">{{ __('site.ft_ai_audio') }}</a>
        <a href="/collaboration/software-developers">{{ __('site.ft_audio_devs') }}</a>
        <a href="/collaboration/designers">{{ __('site.ft_ui_designers') }}</a>
        <a href="/collaboration/sound-design">{{ __('site.ft_sound_designers') }}</a>
        <a href="/collaboration/creators">{{ __('site.ft_content_creators') }}</a>
        <a href="/collaboration/web-developers">{{ __('site.ft_web_devs') }}</a>
        <a href="/affiliates">{{ __('site.ft_affiliates') }}</a>
      </div>

      <div class="ft__col">
        <div class="ft__col-head">{{ __('site.ft_company') }}</div>
        <a href="{{ route('about') }}">{{ __('site.ft_about_cc') }}</a>
        <a href="/competitions">{{ __('site.ft_competitions') }}</a>
        <a href="/blog">{{ __('site.ft_blog') }}</a>
        <a href="/news">{{ __('site.ft_news') }}</a>
        <a href="/careers">{{ __('site.ft_careers') }}</a>
        <a href="/help">{{ __('site.ft_help') }}</a>
        <a href="/privacy-policy">{{ __('site.ft_privacy') }}</a>
        <a href="/do-not-share">{{ __('site.ft_do_not_share') }}</a>
      </div>

      <div class="ft__col">
        <div class="ft__col-head">{{ __('site.ft_connect') }}</div>
        <a href="https://www.instagram.com/cryptocipher/" rel="noopener noreferrer" target="_blank">Instagram</a>
        <a href="https://www.youtube.com/@CryptoCipherLab" rel="noopener noreferrer" target="_blank">YouTube</a>
        <a href="https://in.linkedin.com/company/crypto-cipher" rel="noopener noreferrer" target="_blank">LinkedIn</a>
        <a href="/newsletter">{{ __('site.ft_newsletter') }}</a>
        <a href="/subscribe">{{ __('site.ft_subscribe') }}</a>
        <a href="/community-spotlight">{{ __('site.ft_spotlight') }}</a>
      </div>
    </div>

    <a href="https://svantra.in" class="ft__svantra" target="_blank" rel="noopener noreferrer" aria-label="{{ __('site.ft_visit') }} Svantra" itemscope itemtype="https://schema.org/Brand">
      <div class="ft__svantra-inner">
        <div class="ft__svantra-text">
          <span class="ft__svantra-eyebrow"><span class="ft__svantra-dot" aria-hidden="true"></span>{{ __('site.ft_universe') }}</span>
          <span class="ft__svantra-name" itemprop="name">Svantra</span>
          <span class="ft__svantra-tag" itemprop="description">{{ __('site.ft_coming_soon_from') }}</span>
        </div>
        <div class="ft__svantra-foot">
          <span class="ft__svantra-status">{{ __('site.ft_coming_soon') }}</span>
          <span class="ft__svantra-cta">{{ __('site.ft_visit') }}<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17L17 7M9 7h8v8"/></svg></span>
        </div>
      </div>
    </a>

    <div class="ft__trust">
      <div class="ft__trust-card">
        <div class="ft__trust-icon"><svg viewBox="0 0 24 24"><path d="M12 3l7 3v5c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6z"/><path d="M9.5 12l1.8 1.8L15 10"/></svg></div>
        <div class="ft__trust-title">{{ __('site.ft_privacy_title') }}</div>
        <div class="ft__trust-desc">{{ __('site.ft_privacy_desc') }}</div>
      </div>

      <div class="ft__trust-card">
        <div class="ft__trust-icon"><svg viewBox="0 0 24 24"><path d="M4 12h2M9 12V7M9 12v5M14 12V4M14 12v8M19 12V9M19 12v3"/></svg></div>
        <div class="ft__trust-title">{{ __('site.ft_ai_free_title') }}</div>
        <div class="ft__trust-desc">{{ __('site.ft_ai_free_desc') }}</div>
      </div>

      <div class="ft__trust-card">
        <div class="ft__trust-icon"><svg viewBox="0 0 24 24"><path d="M6 3h9l4 4v14H6z"/><path d="M15 3v4h4"/><path d="M9 13l2 2 4-4"/></svg></div>
        <div class="ft__trust-title">{{ __('site.ft_license_title') }}</div>
        <div class="ft__trust-desc">{{ __('site.ft_license_desc') }}</div>
      </div>

      <div class="ft__trust-card">
        <div class="ft__trust-icon"><svg viewBox="0 0 24 24"><path d="M4 8h16v11H4z"/><path d="M4 8l2.5-3 3 3M9 8l2.5-3 3 3M14 8l2.5-3 3 3"/></svg></div>
        <div class="ft__trust-title">{{ __('site.ft_film_title') }}</div>
        <div class="ft__trust-desc">{{ __('site.ft_film_desc') }}</div>
      </div>
    </div>

    <div class="ft__bottom">
      <div class="ft__bottom-brand">
        <div class="ft__logo-wrap" id="ft-logo">
          <div class="ft__logo-stage">
            <img src="assets/img/logo.svg" alt="Crypto Cipher®" class="ft__logo" loading="lazy">
          </div>
        </div>
        <div class="ft__bottom-meta">
          <div class="ft__bottom-tagline">{{ __('site.ft_tagline') }}</div>
          <div class="ft__copy">{{ __('site.ft_copy') }}</div>
        </div>
      </div>
      <div class="ft__trusted">{{ __('site.ft_trusted') }}</div>
    </div>
    @include('frontend.partials.language-switcher')
  </div>
</footer>
