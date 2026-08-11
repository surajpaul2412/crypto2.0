<main id="main" tabindex="-1" class="login-section" role="main">
  <div class="login-wrap">
    <div class="login-card cc-card">
      <div class="login-head">
        <span class="eyebrow">Account Access</span>
        <h1 class="login-title">Welcome back</h1>
        <p class="login-sub">Sign in to manage your library downloads, recording sessions, and collaboration requests.</p>
      </div>

      @if (session('status'))
        <div class="login-status">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:1px;"><polyline points="20 6 9 17 4 12"/></svg>
          <span>{{ session('status') }}</span>
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}" class="login-form" novalidate>
        @csrf

        <div class="login-field">
          <label for="email">Email address</label>
          <input
            id="email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="you@example.com"
            class="@error('email') is-invalid @enderror"
            required
            autofocus
            autocomplete="username"
          >
          @error('email')
            <span class="login-error">{{ $message }}</span>
          @enderror
        </div>

        <div class="login-field">
          <label for="password">Password</label>
          <input
            id="password"
            type="password"
            name="password"
            placeholder="••••••••"
            class="@error('password') is-invalid @enderror"
            required
            autocomplete="current-password"
          >
          @error('password')
            <span class="login-error">{{ $message }}</span>
          @enderror
        </div>

        <div class="login-row">
          <label class="login-remember">
            <input type="checkbox" name="remember">
            <span>Remember me</span>
          </label>
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="login-forgot">Forgot password?</a>
          @endif
        </div>

        <button type="submit" class="login-submit">
          <span>Sign in</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
        </button>
      </form>

      <p class="login-footer-link">New to Crypto Cipher? <a href="{{ route('register') }}">Create an account</a></p>
    </div>
  </div>
</main>
