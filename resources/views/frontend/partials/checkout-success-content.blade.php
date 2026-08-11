@php
    $paymentLabels = [
        'upi' => 'UPI',
        'card' => 'Card',
        'bank' => 'Bank Transfer',
        'paypal' => 'PayPal',
    ];
    $paymentLabel = $paymentLabels[$order['customer']['payment_method']] ?? ucfirst($order['customer']['payment_method']);
@endphp
<main id="main" tabindex="-1" class="success-main" role="main">
  <div class="success-hero">
    <div class="success-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
    </div>
    <span class="eyebrow" style="justify-content:center;">Order Confirmed</span>
    <h1 class="success-title">Thank you, {{ explode(' ', $order['customer']['name'])[0] }}!</h1>
    <p class="success-sub">Your order has been placed successfully. A confirmation with your download links has been sent to <strong style="color:var(--text-secondary);">{{ $order['customer']['email'] }}</strong>.</p>
  </div>

  <div class="success-order-card cc-card">
    <div class="success-order-head">
      <div>
        <div class="success-order-number-label">Order Number</div>
        <div class="success-order-number">{{ $order['order_number'] }}</div>
      </div>
      <div class="success-order-date">{{ $order['placed_at'] }}</div>
    </div>

    <div class="success-items">
      @foreach ($order['items'] as $item)
      <div class="success-item">
        <div class="success-item__thumb">
          <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" loading="lazy">
        </div>
        <div class="success-item__body">
          <div class="success-item__name">{{ $item['name'] }}</div>
          <div class="success-item__meta">For {{ $item['edition'] }} @if($item['quantity'] > 1) &middot; Qty {{ $item['quantity'] }} @endif</div>
        </div>
        <div class="success-item__price">${{ number_format($item['line_total'], 2) }}</div>
      </div>
      @endforeach
    </div>

    <div class="success-total">
      <span class="success-total-label">Total paid</span>
      <span class="success-total-value">${{ number_format($order['subtotal'], 2) }}</span>
    </div>
  </div>

  <div class="success-details cc-card">
    <div class="success-details__item">
      <span class="success-details__label">Billed to</span>
      <span class="success-details__value">{{ $order['customer']['name'] }}</span>
    </div>
    <div class="success-details__item">
      <span class="success-details__label">Country</span>
      <span class="success-details__value">{{ $order['customer']['country'] }}</span>
    </div>
    <div class="success-details__item">
      <span class="success-details__label">Payment method</span>
      <span class="success-details__value">{{ $paymentLabel }}</span>
    </div>
    <div class="success-details__item">
      <span class="success-details__label">Email</span>
      <span class="success-details__value">{{ $order['customer']['email'] }}</span>
    </div>
  </div>

  <div class="success-next cc-card">
    <div class="success-next__title">What happens next</div>
    <div class="success-next__list">
      <div class="success-next__item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        <span>A confirmation email with your invoice and download links is on its way — check your inbox in the next few minutes.</span>
      </div>
      <div class="success-next__item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        <span>Libraries are Native Access ready — authorize on up to 2 machines from your account once download links arrive.</span>
      </div>
      <div class="success-next__item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
        <span>Need help? Reach out any time via <a href="{{ route('contact') }}" style="color:var(--green-light);text-decoration:underline;">our contact page</a> and we'll sort it out.</span>
      </div>
    </div>
  </div>

  <div class="success-actions">
    <a href="{{ route('shop') }}" class="success-cta-primary">
      <span>Continue shopping</span>
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
    </a>
    <a href="{{ route('home') }}" class="success-cta-secondary">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
      <span>Back to home</span>
    </a>
  </div>
</main>
