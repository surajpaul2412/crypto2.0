<main id="main" tabindex="-1" class="cart-main" role="main">
  <div class="cart-head">
    <span class="eyebrow">Your Order</span>
    <h1 class="cart-title">Your cart</h1>
    <p class="cart-sub">Review your selected libraries before checkout — every purchase is a one-time, royalty-free license.</p>
  </div>

  @if (session('success'))
    <div class="cart-status">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:1px;"><polyline points="20 6 9 17 4 12"/></svg>
      <span>{{ session('success') }}</span>
    </div>
  @endif

  @if (count($items) === 0)
    <div class="cart-empty cc-card" id="cart-empty">
      <div class="cart-empty__icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
      </div>
      <h2 class="cart-empty__title">Your cart is empty</h2>
      <p class="cart-empty__sub">Browse the catalogue and add an instrument to get started.</p>
      <a href="{{ route('shop') }}" class="cart-empty__cta">
        <span>Browse instruments</span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
      </a>
    </div>
  @else
    <div class="cart-layout">
      <div class="cart-list" id="cart-list">
        @foreach ($items as $item)
        <div class="cart-item cc-card" data-slug="{{ $item['slug'] }}" data-unit-price="{{ $item['price'] }}">
          <a href="{{ route('shop.show', $item['slug']) }}" class="cart-item__thumb">
            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" loading="lazy">
          </a>

          <div class="cart-item__body">
            <span class="cart-item__edition">For {{ $item['edition'] }}</span>
            <h3 class="cart-item__name"><a href="{{ route('shop.show', $item['slug']) }}">{{ $item['name'] }}</a></h3>
            <span class="cart-item__price">${{ number_format($item['price'], 2) }} each</span>
          </div>

          <div class="cart-item__aside">
            <span class="cart-item__line-total" data-line-total>${{ number_format($item['line_total'], 2) }}</span>

            <div class="cart-qty" role="group" aria-label="Quantity for {{ $item['name'] }}">
              <button type="button" class="cart-qty__btn" data-qty-decrease aria-label="Decrease quantity">&minus;</button>
              <input type="number" class="cart-qty__input" data-qty-input value="{{ $item['quantity'] }}" min="1" max="99" inputmode="numeric" aria-label="Quantity">
              <button type="button" class="cart-qty__btn" data-qty-increase aria-label="Increase quantity">+</button>
            </div>

            <button type="button" class="cart-item__remove" data-cart-remove>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
              <span>Remove</span>
            </button>
          </div>
        </div>
        @endforeach
      </div>

      <aside class="cart-summary cc-card">
        <h2 class="cart-summary__title">Order summary</h2>

        <div class="cart-summary__row">
          <span id="cart-item-count-label">{{ count($items) }} {{ count($items) === 1 ? 'item' : 'items' }}</span>
          <span id="cart-subtotal-display">${{ number_format($subtotal, 2) }}</span>
        </div>
        <div class="cart-summary__row">
          <span>License</span>
          <span>Included</span>
        </div>

        <div class="cart-summary__divider"></div>

        <div class="cart-summary__total">
          <span class="cart-summary__total-label">Total</span>
          <span class="cart-summary__total-value" id="cart-total-display">${{ number_format($subtotal, 2) }}</span>
        </div>

        <a href="{{ route('checkout.index') }}" class="cart-summary__cta">
          <span>Proceed to checkout</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
        </a>

        <div class="cart-summary__trust">
          <div class="cart-summary__trust-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7 3v5c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6z"/></svg>
            <span>Secure checkout</span>
          </div>
          <div class="cart-summary__trust-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M2 12h20"/><path d="M12 6l6 6-6 6M12 18l-6-6 6-6"/></svg>
            <span>Instant digital download</span>
          </div>
          <div class="cart-summary__trust-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3h9l4 4v14H6z"/><path d="M15 3v4h4"/><path d="M9 13l2 2 4-4"/></svg>
            <span>Royalty-free, sync-cleared license</span>
          </div>
        </div>
      </aside>
    </div>

    <a href="{{ route('shop') }}" class="cart-continue">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
      <span>Continue shopping</span>
    </a>
  @endif
</main>
