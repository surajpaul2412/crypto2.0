<main id="main" tabindex="-1" class="wishlist-main" role="main">
  <div class="wishlist-head">
    <span class="eyebrow">Account · Saved Libraries</span>
    <h1 class="wishlist-title">Your wishlist</h1>
    <p class="wishlist-sub">Instruments and libraries you've saved for later — pick up right where you left off.</p>
  </div>

  @if (session('success'))
    <div class="wishlist-status">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:1px;"><polyline points="20 6 9 17 4 12"/></svg>
      <span>{{ session('success') }}</span>
    </div>
  @endif

  @if (count($items) === 0)
    <div class="wishlist-empty cc-card" id="wishlist-empty">
      <div class="wishlist-empty__icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
      </div>
      <h2 class="wishlist-empty__title">Nothing saved yet</h2>
      <p class="wishlist-empty__sub">Tap the heart icon on any instrument to save it here for quick access later.</p>
      <a href="{{ route('shop') }}" class="wishlist-empty__cta">
        <span>Browse instruments</span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
      </a>
    </div>
  @else
    <p class="wishlist-count" id="wishlist-count">{{ count($items) }} {{ count($items) === 1 ? 'item' : 'items' }} saved</p>

    <div class="recommended" id="wishlist-grid" data-reveal>
      @foreach ($items as $item)
      <article class="rec-card" data-slug="{{ $item['slug'] }}">
        <a href="{{ route('shop.show', $item['slug']) }}" class="rec-card__art">
          <img class="rec-card__art-bg" src="{{ $item['image'] }}" alt="" loading="lazy" style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;">
          <span class="rec-card__price{{ $item['price'] <= 0 ? ' rec-card__price--free' : '' }}">
            {{ $item['price'] <= 0 ? 'FREE' : '$' . number_format($item['price']) }}
          </span>
          <span class="cc-format-chip">For {{ $item['edition'] }}</span>
        </a>
        <div class="rec-card__body">
          @if (!empty($item['label']))
            <span class="rec-card__meta">{{ $item['label'] }}</span>
          @endif
          <div class="cc-card-title-row">
            <h3 class="rec-card__name"><a href="{{ route('shop.show', $item['slug']) }}">{{ $item['name'] }}</a></h3>
            <div class="cc-card-actions" aria-label="Card actions">
              <button type="button" class="cc-card-action-btn" aria-label="Remove {{ $item['name'] }} from wishlist" data-action="wishlist" data-slug="{{ $item['slug'] }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
              </button>
              <form method="POST" action="{{ route('wishlist.move_to_cart', $item['slug']) }}" class="wishlist-move-form">
                @csrf
                <button type="submit" class="cc-card-action-btn" aria-label="Move {{ $item['name'] }} to cart">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                </button>
              </form>
            </div>
          </div>
        </div>
      </article>
      @endforeach
    </div>
  @endif
</main>
