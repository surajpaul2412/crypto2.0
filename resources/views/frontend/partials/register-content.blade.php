<main id="main" tabindex="-1" class="login-section" role="main">
  <div class="login-wrap">
    <div class="login-card cc-card">
      <div class="login-head">
        <span class="eyebrow">Account Access</span>
        <h1 class="login-title">Create your account</h1>
        <p class="login-sub">Join Crypto Cipher to manage your library downloads, recording sessions, and collaboration requests.</p>
      </div>

      <form method="POST" action="{{ route('register') }}" class="login-form" novalidate>
        @csrf

        <div class="login-field">
          <label for="name">Full name</label>
          <input
            id="name"
            type="text"
            name="name"
            value="{{ old('name') }}"
            placeholder="Your name"
            class="@error('name') is-invalid @enderror"
            required
            autofocus
            autocomplete="name"
          >
          @error('name')
            <span class="login-error">{{ $message }}</span>
          @enderror
        </div>

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
            autocomplete="new-password"
          >
          @error('password')
            <span class="login-error">{{ $message }}</span>
          @enderror
        </div>

        <div class="login-field">
          <label for="password_confirmation">Confirm password</label>
          <input
            id="password_confirmation"
            type="password"
            name="password_confirmation"
            placeholder="••••••••"
            class="@error('password_confirmation') is-invalid @enderror"
            required
            autocomplete="new-password"
          >
          @error('password_confirmation')
            <span class="login-error">{{ $message }}</span>
          @enderror
        </div>

        <button type="submit" class="login-submit">
          <span>Create account</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
        </button>
      </form>

      <p class="login-footer-link">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
    </div>
  </div>
</main>
