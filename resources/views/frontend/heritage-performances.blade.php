@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Heritage Films — Indian Classical Music as Meditation · Crypto Cipher®';
    $pageDescription = 'Indian classical music has been a practice for the mind for three thousand years — modern science calls it meditation. Documentary films of the masters who carry that tradition, brought to the world by Crypto Cipher®.';
    $pageCanonical = 'https://cryptocipher.in/heritage';
    $pageOgUrl = 'https://cryptocipher.in/heritage';
    $pageOgTitle = 'Heritage Films — Indian Classical Music as Meditation · Crypto Cipher®';
    $pageOgDescription = 'Indian classical music performances and documentary films — a three-thousand-year practice for mind and wellbeing, with the masters.';
    $pageOgImage = 'https://cryptocipher.in/og/heritage.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab — Heritage Films';
    $pageTwitterImage = 'https://cryptocipher.in/og/heritage.png?v=1';
    $pageBodyClass = 'has-mobile-side-index';
    $pageHeadInclude = 'frontend.partials.heritage-head-inline';
    $pageStyleAssets = [];
    $pageScriptAssets = [
        'https://cdn.jsdelivr.net/npm/lenis@1.1.13/dist/lenis.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js',
    ];
@endphp

@section('page_chrome')
@include('frontend.partials.heritage-chrome')
@endsection

@section('mobile_nav')
@include('frontend.partials.heritage-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.heritage-content')
@endsection

@section('page_scripts')
@include('frontend.partials.heritage-page-scripts')
@endsection
