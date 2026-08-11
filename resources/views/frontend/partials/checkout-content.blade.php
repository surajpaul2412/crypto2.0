<main id="main" tabindex="-1" class="checkout-main" role="main">
  <div class="checkout-head">
    <span class="eyebrow">Secure Checkout</span>
    <h1 class="checkout-title">Complete your order</h1>
    <p class="checkout-sub">Instant digital delivery — your download links are emailed the moment payment is confirmed.</p>
  </div>

  <div class="checkout-steps">
    <span class="checkout-steps__step is-done"><span class="checkout-steps__dot">✓</span> Cart</span>
    <span class="checkout-steps__sep"></span>
    <span class="checkout-steps__step is-active"><span class="checkout-steps__dot">2</span> Checkout</span>
    <span class="checkout-steps__sep"></span>
    <span class="checkout-steps__step"><span class="checkout-steps__dot">3</span> Confirmation</span>
  </div>

  <form method="POST" action="{{ route('checkout.store') }}" class="checkout-layout" novalidate id="checkout-form">
    @csrf

    <div class="checkout-form">
      <section class="checkout-section cc-card">
        <h2 class="checkout-section__title"><span class="checkout-section__num">1</span> Contact information</h2>
        <div class="checkout-grid">
          <div class="checkout-field span-2">
            <label for="name">Full name</label>
            <input
              id="name"
              type="text"
              name="name"
              value="{{ $customer['name'] }}"
              placeholder="Your name"
              class="@error('name') is-invalid @enderror"
              required
              autofocus
              autocomplete="name"
            >
            @error('name') <span class="checkout-error">{{ $message }}</span> @enderror
          </div>

          <div class="checkout-field">
            <label for="email">Email address</label>
            <input
              id="email"
              type="email"
              name="email"
              value="{{ $customer['email'] }}"
              placeholder="you@example.com"
              class="@error('email') is-invalid @enderror"
              required
              autocomplete="email"
            >
            @error('email') <span class="checkout-error">{{ $message }}</span> @enderror
          </div>

          <div class="checkout-field">
            <label for="phone">Phone <span style="opacity:.5;font-weight:400;text-transform:none;">(optional)</span></label>
            <input
              id="phone"
              type="tel"
              name="phone"
              value="{{ $customer['phone'] }}"
              placeholder="+91 98765 43210"
              class="@error('phone') is-invalid @enderror"
              autocomplete="tel"
            >
            @error('phone') <span class="checkout-error">{{ $message }}</span> @enderror
          </div>

          <div class="checkout-field span-2">
            <label for="country">Billing country</label>
            <select id="country" name="country" class="@error('country') is-invalid @enderror" required>
              @foreach (['India', 'United States', 'United Kingdom', 'Canada', 'Australia', 'Germany', 'France', 'Singapore', 'United Arab Emirates', 'Other'] as $country)
                <option value="{{ $country }}" @selected($customer['country'] === $country)>{{ $country }}</option>
              @endforeach
            </select>
            @error('country') <span class="checkout-error">{{ $message }}</span> @enderror
          </div>
        </div>
      </section>

      <section class="checkout-section cc-card">
        <h2 class="checkout-section__title"><span class="checkout-section__num">2</span> Payment method</h2>
        <div class="payment-methods" id="payment-methods">
          @php
            $methods = [
              'upi' => ['UPI', 'Google Pay, PhonePe, Paytm', '<path d="M12 2v20M2 12h20"/><path d="M12 6l6 6-6 6M12 18l-6-6 6-6"/>'],
              'card' => ['Card', 'Visa, Mastercard, RuPay', '<rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/>'],
              'bank' => ['Bank Transfer', 'NEFT / IMPS / RTGS', '<path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11M20 10v11M8 14v3M12 14v3M16 14v3"/>'],
              'paypal' => ['PayPal', 'International cards', '<path d="M7 21h3l1-6h3a5 5 0 0 0 5-5c0-3-2-5-6-5H8L5 21"/><path d="M12 15h2a5 5 0 0 0 5-5"/>'],
            ];
          @endphp
          @foreach ($methods as $value => [$label, $sub, $iconPath])
          <label class="payment-method{{ $customer['payment_method'] === $value ? ' is-selected' : '' }}" data-payment-method>
            <input type="radio" name="payment_method" value="{{ $value }}" @checked($customer['payment_method'] === $value)>
            <span class="payment-method__icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">{!! $iconPath !!}</svg>
            </span>
            <span>
              <span class="payment-method__label">{{ $label }}</span>
              <span class="payment-method__sub">{{ $sub }}</span>
            </span>
            <span class="payment-method__check"></span>
          </label>
          @endforeach
        </div>
        @error('payment_method') <span class="checkout-error" style="display:block;margin-top:0.8rem;">{{ $message }}</span> @enderror
      </section>

      <div>
        <button type="submit" class="checkout-submit" id="checkout-submit-btn">
          <span>Place order — ${{ number_format($subtotal, 2) }}</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
        </button>
        <p class="checkout-secure-note">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          <span>Payments are encrypted and processed securely</span>
        </p>
      </div>
    </div>

    <aside class="checkout-summary cc-card">
      <h2 class="checkout-summary__title">Order summary</h2>

      <div class="checkout-summary__items">
        @foreach ($items as $item)
        <div class="checkout-summary__item">
          <div class="checkout-summary__item-thumb">
            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" loading="lazy">
            @if ($item['quantity'] > 1)
              <span class="checkout-summary__item-qty">{{ $item['quantity'] }}</span>
            @endif
          </div>
          <div class="checkout-summary__item-body">
            <div class="checkout-summary__item-name">{{ $item['name'] }}</div>
            <div class="checkout-summary__item-edition">For {{ $item['edition'] }}</div>
          </div>
          <div class="checkout-summary__item-price">${{ number_format($item['line_total'], 2) }}</div>
        </div>
        @endforeach
      </div>

      <div class="checkout-summary__row">
        <span>Subtotal</span>
        <span>${{ number_format($subtotal, 2) }}</span>
      </div>
      <div class="checkout-summary__row">
        <span>License</span>
        <span>Included</span>
      </div>

      <div class="checkout-summary__total">
        <span class="checkout-summary__total-label">Total</span>
        <span class="checkout-summary__total-value">${{ number_format($subtotal, 2) }}</span>
      </div>
    </aside>
  </form>
</main>
