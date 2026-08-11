@foreach (($pageScriptAssets ?? []) as $pageScriptAsset)
@php
    $src = is_array($pageScriptAsset) ? ($pageScriptAsset['src'] ?? '') : $pageScriptAsset;
    $defer = is_array($pageScriptAsset) ? !empty($pageScriptAsset['defer']) : false;

    // Cache-bust local assets so edits take effect immediately (external CDN URLs untouched).
    $localBase = asset('frontend/assets') . '/';
    if ($src !== '' && str_starts_with($src, $localBase)) {
        $absolutePath = public_path('frontend/assets/' . substr($src, strlen($localBase)));
        if (is_file($absolutePath)) {
            $src .= '?v=' . filemtime($absolutePath);
        }
    }
@endphp
@if ($src !== '')
<script src="{{ $src }}"{{ $defer ? ' defer' : '' }}></script>
@endif
@endforeach
<script>
  window.__WISHLIST_SLUGS__ = {!! json_encode(array_keys(session('wishlist', []))) !!};
  window.__WISHLIST_URLS__ = {
    add: {!! json_encode(route('wishlist.add', ['slug' => '__SLUG__'])) !!},
    remove: {!! json_encode(route('wishlist.remove', ['slug' => '__SLUG__'])) !!}
  };
</script>
<script src="{{ asset('frontend/assets/js/wishlist-actions.js') }}?v={{ file_exists(public_path('frontend/assets/js/wishlist-actions.js')) ? filemtime(public_path('frontend/assets/js/wishlist-actions.js')) : time() }}"></script>
<script>
  window.__CART_COUNT__ = {!! (int) collect(session('cart', []))->sum(fn ($item) => (int) ($item['quantity'] ?? 0)) !!};
  window.__CART_URLS__ = {
    add: {!! json_encode(route('cart.add', ['slug' => '__SLUG__'])) !!},
    update: {!! json_encode(route('cart.update', ['slug' => '__SLUG__'])) !!},
    remove: {!! json_encode(route('cart.remove', ['slug' => '__SLUG__'])) !!},
    checkout: {!! json_encode(route('checkout.index')) !!}
  };
</script>
<script src="{{ asset('frontend/assets/js/cart-actions.js') }}?v={{ file_exists(public_path('frontend/assets/js/cart-actions.js')) ? filemtime(public_path('frontend/assets/js/cart-actions.js')) : time() }}"></script>
<script src="{{ asset('frontend/assets/js/polish.js') }}" defer></script>
