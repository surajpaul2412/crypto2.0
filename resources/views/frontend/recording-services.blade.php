@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Recording Services — Custom Indian Master Musician Sessions · Crypto Cipher®';
    $pageDescription = 'Custom remote recordings with India\'s master musicians, tracked in our studio in India. 3-4 day delivery. Sync-cleared. AI-training-free. Heard on Netflix, ITV, Emmy-nominated film scores.';
    $pageCanonical = route('recording-services');
    $pageOgUrl = route('recording-services');
    $pageOgTitle = 'Recording Services — Custom Indian Master Musician Sessions · Crypto Cipher®';
    $pageOgDescription = 'Custom remote recordings with India\'s master musicians, tracked in our studio in India. 3-4 day delivery, sync-cleared, AI-training-free.';
    $pageOgImage = 'https://cryptocipher.in/og/recording-services.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab — Recording Services';
    $pageTwitterImage = 'https://cryptocipher.in/og/recording-services.png?v=1';
    $pageBodyClass = 'has-mobile-side-index';
    $pageHeadInclude = 'frontend.partials.recording-services-head-inline';
    $pageStyleAssets = [];
    $pageScriptAssets = [
        'https://cdn.jsdelivr.net/npm/lenis@1.1.13/dist/lenis.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js',
    ];
@endphp

@section('page_chrome')
@include('frontend.partials.recording-services-chrome')
@endsection

@section('mobile_nav')
@include('frontend.partials.recording-services-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.recording-services-content')
@endsection

@section('page_scripts')
@include('frontend.partials.recording-services-page-scripts')
@endsection
