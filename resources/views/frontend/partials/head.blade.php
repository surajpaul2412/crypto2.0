<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>document.documentElement.className+=" js";</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<base href="{{ rtrim(asset('frontend'), '/') }}/">
<title>{{ $pageTitle }}</title>
<meta name="description" content="{{ $pageDescription }}">
@if ($pageCanonical !== '')
<link rel="canonical" href="{{ $pageCanonical }}">
@endif
<meta name="robots" content="index,follow">
<meta http-equiv="content-language" content="en-IN">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Crypto Cipher Audio Lab">
<meta property="og:locale" content="en_IN">
@if ($pageOgUrl !== '')
<meta property="og:url" content="{{ $pageOgUrl }}">
@endif
<meta property="og:title" content="{{ $pageOgTitle !== '' ? $pageOgTitle : $pageTitle }}">
<meta property="og:description" content="{{ $pageOgDescription !== '' ? $pageOgDescription : $pageDescription }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $pageOgTitle !== '' ? $pageOgTitle : $pageTitle }}">
<meta name="twitter:description" content="{{ $pageOgDescription !== '' ? $pageOgDescription : $pageDescription }}">
@if ($pageOgImage !== '')
<meta property="og:image" content="{{ $pageOgImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $pageOgImageAlt }}">
<meta name="twitter:image" content="{{ $pageTwitterImage !== '' ? $pageTwitterImage : $pageOgImage }}">
@endif
@php
    $faviconVersion = file_exists(public_path('frontend/assets/icons/favicon.ico'))
        ? filemtime(public_path('frontend/assets/icons/favicon.ico'))
        : time();
@endphp
<link rel="icon" href="{{ asset('frontend/assets/icons/favicon.ico') }}?v={{ $faviconVersion }}" sizes="any">
<link rel="shortcut icon" href="{{ asset('frontend/assets/icons/favicon.ico') }}?v={{ $faviconVersion }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/assets/icons/favicon-32x32.png') }}?v={{ $faviconVersion }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/assets/icons/favicon-16x16.png') }}?v={{ $faviconVersion }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/assets/icons/apple-touch-icon.png') }}?v={{ $faviconVersion }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/tokens.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/base.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/system.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/shell.css') }}">
@if (!empty($pageHeadInclude))
@include($pageHeadInclude)
@endif
<link rel="stylesheet" href="{{ asset('frontend/assets/css/polish.css') }}">
@foreach (($pageStyleAssets ?? []) as $pageStyleAsset)
@php
    $styleSrc = $pageStyleAsset;
    $localBase = asset('frontend/assets') . '/';
    if ($styleSrc !== '' && str_starts_with($styleSrc, $localBase)) {
        $absoluteStylePath = public_path('frontend/assets/' . substr($styleSrc, strlen($localBase)));
        if (is_file($absoluteStylePath)) {
            $styleSrc .= '?v=' . filemtime($absoluteStylePath);
        }
    }
@endphp
<link rel="stylesheet" href="{{ $styleSrc }}">
@endforeach
