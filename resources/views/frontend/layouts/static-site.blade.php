<!DOCTYPE html>
<html lang="en-IN">
<head>
@include('frontend.partials.head', [
    'pageTitle' => $pageTitle ?? 'Crypto Cipher Audio Lab',
    'pageDescription' => $pageDescription ?? '',
    'pageCanonical' => $pageCanonical ?? '',
    'pageOgUrl' => $pageOgUrl ?? '',
    'pageOgTitle' => $pageOgTitle ?? '',
    'pageOgDescription' => $pageOgDescription ?? '',
    'pageOgImage' => $pageOgImage ?? '',
    'pageOgImageAlt' => $pageOgImageAlt ?? '',
    'pageTwitterImage' => $pageTwitterImage ?? '',
])
</head>
<body class="{{ $pageBodyClass ?? '' }}">
@yield('page_chrome')
@hasSection('page_header')
@yield('page_header')
@else
@include('frontend.partials.header')
@endif
@yield('mobile_nav')
@yield('content')
@yield('page_pre_footer')
@hasSection('page_footer')
@yield('page_footer')
@else
@include('frontend.partials.footer', ['footerAlwaysRevealed' => $footerAlwaysRevealed ?? false])
@endif
@yield('page_post_footer')
@yield('page_scripts')
@include('frontend.partials.scripts')
</body>
</html>
