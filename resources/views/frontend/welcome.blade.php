@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Crypto Cipher Audio Lab - From the Spirit of India';
    $pageDescription = 'Crypto Cipher Audio Lab - Authentic Indian instruments, ancient traditions crafted for the modern music composer. Virtual Instruments for Kontakt, Recording Services, SVANTRA.';
    $pageCanonical = 'https://cryptocipher.in/';
    $pageOgUrl = 'https://cryptocipher.in/';
    $pageOgTitle = 'Crypto Cipher Audio Lab - From the Spirit of India';
    $pageOgDescription = 'Crypto Cipher Audio Lab - Authentic Indian instruments, ancient traditions crafted for the modern music composer. Virtual Instruments for Kontakt, Recording Services, SVANTRA.';
    $pageOgImage = 'https://cryptocipher.in/og/homepage.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab - From the Spirit of India';
    $pageTwitterImage = 'https://cryptocipher.in/og/homepage.png?v=1';
    $pageHeadInclude = 'frontend.partials.welcome-head-inline';
    $pageScriptAssets = [
        [
            // Deferred (was blocking) — polish.js (also deferred, loaded right
            // after) is what actually calls `new Lenis(...)`, and deferred
            // scripts always execute in document order regardless of download
            // speed, so this stays 100% safe: Lenis is still guaranteed ready
            // before polish.js's smooth-scroll init runs.
            'src' => 'https://cdn.jsdelivr.net/npm/lenis@1.1.13/dist/lenis.min.js',
            'defer' => true,
        ],
        [
            'src' => asset('frontend/assets/js/cc-demo-player.js?v=dur1'),
            'defer' => true,
        ],
    ];
@endphp

@section('page_chrome')
@include('frontend.partials.welcome-chrome')
@endsection

@section('mobile_nav')
@include('frontend.partials.welcome-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.welcome-content')
@endsection

@section('page_scripts')
@include('frontend.partials.welcome-page-scripts')
@endsection
