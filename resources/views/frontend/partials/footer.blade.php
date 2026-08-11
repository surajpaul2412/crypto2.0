<footer class="ft{{ !empty($footerAlwaysRevealed) ? ' is-revealed' : '' }}" id="footer"{{ empty($footerAlwaysRevealed) ? ' data-reveal' : '' }}>
  <div class="ft__bg"></div>
  <div class="ft__glow"></div>

  <div class="ft__wrap">
    <div class="ft__grid">
      <div class="ft__col">
        <div class="ft__col-head">Navigation</div>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('shop') }}">Instruments</a>
        <a href="{{ route('recording-services') }}">Recordings</a>
        <a href="{{ route('heritage-performances') }}">Heritage</a>
        <a href="/academy">Academy</a>
        <a href="{{ route('collaboration') }}">Collaboration</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('contact') }}">Contact</a>
      </div>

      <div class="ft__col">
        <div class="ft__col-head">Catalogue</div>
        <a href="{{ route('shop') }}">Virtual Instruments</a>
        <a href="/instruments/new">New Releases</a>
        <a href="/instruments/best-sellers">Best Sellers</a>
        <a href="/licensing">Licensing</a>
      </div>

      <div class="ft__col">
        <div class="ft__col-head">Collaboration</div>
        <a href="/collaboration/artists">Artists &amp; Musicians</a>
        <a href="/collaboration/composers">Composers &amp; Producers</a>
        <a href="/collaboration/ai-audio">AI &amp; Audio Technology</a>
        <a href="/collaboration/software-developers">Audio Software Developers</a>
        <a href="/collaboration/designers">UI &amp; Graphic Designers</a>
        <a href="/collaboration/sound-design">Sound Designers</a>
        <a href="/collaboration/creators">Content Creators</a>
        <a href="/collaboration/web-developers">Web &amp; Platform Developers</a>
        <a href="/affiliates">Affiliates</a>
      </div>

      <div class="ft__col">
        <div class="ft__col-head">Company</div>
        <a href="{{ route('about') }}">About Crypto Cipher</a>
        <a href="/competitions">Competitions</a>
        <a href="/blog">Blog</a>
        <a href="/news">News</a>
        <a href="/careers">Careers</a>
        <a href="/help">Help Center</a>
        <a href="/privacy-policy">Privacy Policy</a>
        <a href="/do-not-share">Do Not Share My Personal Information</a>
      </div>

      <div class="ft__col">
        <div class="ft__col-head">Connect</div>
        <a href="https://www.instagram.com/cryptocipher/" target="_blank" rel="noopener noreferrer">Instagram</a>
        <a href="https://www.youtube.com/@CryptoCipherLab" target="_blank" rel="noopener noreferrer">YouTube</a>
        <a href="https://in.linkedin.com/company/crypto-cipher" target="_blank" rel="noopener noreferrer">LinkedIn</a>
        <a href="/newsletter">Newsletter</a>
        <a href="/subscribe">Subscribe</a>
        <a href="/community-spotlight">Community Spotlight</a>
      </div>
    </div>

    <a href="https://svantra.in" class="ft__svantra" target="_blank" rel="noopener noreferrer" aria-label="Svantra opens in new tab" itemscope itemtype="https://schema.org/Brand">
      <div class="ft__svantra-inner">
        <div class="ft__svantra-text">
          <span class="ft__svantra-eyebrow"><span class="ft__svantra-dot" aria-hidden="true"></span>Crypto Cipher Universe</span>
          <span class="ft__svantra-name" itemprop="name">Svantra</span>
          <span class="ft__svantra-tag" itemprop="description">Coming soon from Crypto Cipher.</span>
        </div>
        <div class="ft__svantra-foot">
          <span class="ft__svantra-status">Coming Soon</span>
          <span class="ft__svantra-cta">Visit<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17L17 7M9 7h8v8"/></svg></span>
        </div>
      </div>
    </a>

    <div class="ft__trust">
      <div class="ft__trust-card">
        <div class="ft__trust-icon"><svg viewBox="0 0 24 24"><path d="M12 3l7 3v5c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6z"/><path d="M9.5 12l1.8 1.8L15 10"/></svg></div>
        <div class="ft__trust-title">Your privacy is protected</div>
        <div class="ft__trust-desc">We never share or sell your personal information.</div>
      </div>
      <div class="ft__trust-card">
        <div class="ft__trust-icon"><svg viewBox="0 0 24 24"><path d="M4 12h2M9 12V7M9 12v5M14 12V4M14 12v8M19 12V9M19 12v3"/></svg></div>
        <div class="ft__trust-title">100% AI-free authentic recordings</div>
        <div class="ft__trust-desc">Every sample is performed by real musicians and professionally recorded.</div>
      </div>
      <div class="ft__trust-card">
        <div class="ft__trust-icon"><svg viewBox="0 0 24 24"><path d="M6 3h9l4 4v14H6z"/><path d="M15 3v4h4"/><path d="M9 13l2 2 4-4"/></svg></div>
        <div class="ft__trust-title">License included with every download</div>
        <div class="ft__trust-desc">Commercial usage rights and ownership, cleared for global use.</div>
      </div>
      <div class="ft__trust-card">
        <div class="ft__trust-icon"><svg viewBox="0 0 24 24"><path d="M4 8h16v11H4z"/><path d="M4 8l2.5-3 3 3M9 8l2.5-3 3 3M14 8l2.5-3 3 3"/></svg></div>
        <div class="ft__trust-title">Built for film &amp; media</div>
        <div class="ft__trust-desc">Studio-mastered and cleared for sync - ready for any cue.</div>
      </div>
    </div>

    <div class="ft__bottom">
      <div class="ft__bottom-brand">
        <div class="ft__logo-wrap" id="ft-logo">
          <div class="ft__logo-stage">
            <img src="{{ asset('frontend/assets/img/logo.svg') }}" alt="Crypto Cipher Audio Lab" class="ft__logo" loading="lazy">
          </div>
        </div>
        <div class="ft__bottom-meta">
          <div class="ft__bottom-tagline">Preserving India's sonic heritage. Building the future of global music technology.</div>
          <div class="ft__copy">&copy; 2026 Crypto Cipher Audio Lab. All rights reserved.</div>
        </div>
      </div>
      <div class="ft__trusted">Trusted by composers worldwide</div>
    </div>
  </div>
</footer>
