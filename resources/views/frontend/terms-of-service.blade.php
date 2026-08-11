@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Terms of Service - Crypto Cipher Audio Lab';
    $pageDescription = 'Terms governing use of Crypto Cipher Audio Lab\'s website, libraries, and recording services.';
    $pageCanonical = 'https://cryptocipher.in/terms-of-service';
    $pageOgUrl = 'https://cryptocipher.in/terms-of-service';
    $pageOgTitle = 'Terms of Service - Crypto Cipher Audio Lab';
    $pageOgDescription = 'Terms governing use of Crypto Cipher Audio Lab\'s website, libraries, and recording services.';
    $pageOgImage = 'https://cryptocipher.in/og/terms.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab - Terms of Service';
    $pageTwitterImage = 'https://cryptocipher.in/og/terms.png?v=1';
    $pageBodyClass = 'has-mobile-side-index';
    $pageHeadInclude = 'frontend.partials.terms-of-service-head-inline';
    $pageStyleAssets = [];
    $pageScriptAssets = [
        'https://cdn.jsdelivr.net/npm/lenis@1.1.13/dist/lenis.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js',
    ];
@endphp

@section('page_chrome')
@include('frontend.partials.terms-of-service-chrome')
@endsection

@section('mobile_nav')
@include('frontend.partials.terms-of-service-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.terms-of-service-content')
@endsection

@section('page_scripts')
@include('frontend.partials.terms-of-service-page-scripts')
@endsection
