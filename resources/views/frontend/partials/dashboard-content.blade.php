<main id="main" tabindex="-1" class="dash-main" role="main">
  <div class="dash-head">
    <div>
      <span class="eyebrow">Account · Dashboard</span>
      <h1 class="dash-title">Welcome back, <em>{{ explode(' ', $user->name)[0] }}</em></h1>
      <p class="dash-sub">{{ $user->email }}</p>
    </div>
    <a href="#" class="dash-logout" onclick="event.preventDefault(); document.getElementById('dash-logout-form').submit();">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
      <span>Logout</span>
    </a>
    <form id="dash-logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
      @csrf
    </form>
  </div>

  @if (session('success'))
    <div class="dash-status">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:1px;"><polyline points="20 6 9 17 4 12"/></svg>
      <span>{{ session('success') }}</span>
    </div>
  @endif

  <div class="dash-stats">
    <div class="dash-stat cc-card">
      <div class="dash-stat__label">My Library</div>
      <div class="dash-stat__value">{{ $productsCount }}</div>
    </div>
    <div class="dash-stat cc-card">
      <div class="dash-stat__label">Downloads Available</div>
      <div class="dash-stat__value">{{ $downloadsCount }}</div>
    </div>
    <div class="dash-stat cc-card">
      <div class="dash-stat__label">Orders Placed</div>
      <div class="dash-stat__value">{{ $ordersCount }}</div>
    </div>
  </div>

  @if ($orders->isEmpty())
    <div class="dash-empty cc-card">
      <div class="dash-empty__icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
      </div>
      <h2 class="dash-empty__title">No purchases yet</h2>
      <p class="dash-empty__sub">Once you buy an instrument library, it'll show up here — with your order history and a direct link back to it any time.</p>
      <a href="{{ route('shop') }}" class="dash-empty__cta">
        <span>Browse instruments</span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
      </a>
    </div>
  @else
    <section class="dash-section">
      <div class="dash-section__head">
        <h2 class="dash-section__title">My Library</h2>
        <a href="{{ route('shop') }}" class="dash-section__link">
          <span>Browse more</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
        </a>
      </div>
      <div class="recommended">
        @foreach ($recentProducts as $item)
        <article class="rec-card">
          <a href="{{ route('shop.show', $item->slug) }}" class="rec-card__art">
            <img class="rec-card__art-bg" src="{{ $item->image }}" alt="" loading="lazy" style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;">
            <span class="rec-card__price">${{ number_format($item->price, 0) }}</span>
            <span class="cc-format-chip">For {{ $item->edition }}</span>
          </a>
          <div class="rec-card__body">
            <span class="rec-card__meta">Owned</span>
            <h3 class="rec-card__name"><a href="{{ route('shop.show', $item->slug) }}">{{ $item->name }}</a></h3>
          </div>
        </article>
        @endforeach
      </div>
    </section>

    <section class="dash-section">
      <div class="dash-section__head">
        <h2 class="dash-section__title">Orders &amp; Billing</h2>
      </div>
      <div class="dash-orders">
        @foreach ($recentOrders as $order)
        <div class="dash-order cc-card">
          <div class="dash-order__main">
            <span class="dash-order__number">{{ $order->order_number }}</span>
            <span class="dash-order__meta">{{ $order->placed_at->format('d M Y, h:i A') }}</span>
            <span class="dash-order__items">{{ $order->items->count() }} {{ $order->items->count() === 1 ? 'item' : 'items' }}</span>
          </div>
          <div class="dash-order__right">
            <span class="dash-order__total">${{ number_format($order->subtotal, 2) }}</span>
            <span class="dash-order__status">{{ ucfirst($order->status) }}</span>
          </div>
        </div>
        @endforeach
      </div>
    </section>
  @endif

  <section class="dash-section" style="margin-bottom:0;">
    <div class="dash-empty cc-card" style="padding:2.4rem 2rem;">
      <h2 class="dash-empty__title" style="font-size:1.05rem;">Need help?</h2>
      <p class="dash-empty__sub" style="margin-bottom:1.2rem;">Our support team is here for you.</p>
      <a href="{{ route('contact') }}" class="dash-empty__cta">
        <span>Contact support</span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
      </a>
    </div>
  </section>
</main>
