@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'About — Crypto Cipher® Audio Lab · Sampled Indian Instruments Since 2010';
    $pageDescription = 'Crypto Cipher Audio Lab: Indian sample libraries, remote recording, music education & heritage films. Sampling Indian instruments since 2010, India.';
    $pageCanonical = 'https://cryptocipher.in/about';
    $pageOgUrl = 'https://cryptocipher.in/about';
    $pageOgTitle = 'About — Crypto Cipher® Audio Lab · Sampled Indian Instruments Since 2010';
    $pageOgDescription = 'Crypto Cipher Audio Lab: Indian sample libraries, remote recording, music education & heritage films. Sampling Indian instruments since 2010, India.';
    $pageOgImage = 'https://cryptocipher.in/og/about.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab — About';
    $pageTwitterImage = 'https://cryptocipher.in/og/about.png?v=1';
    $pageHeadInclude = 'frontend.partials.about-head-inline';
    $pageStyleAssets = [];
    $pageScriptAssets = [
        'https://cdn.jsdelivr.net/npm/lenis@1.1.13/dist/lenis.min.js',
    ];
@endphp

@section('page_chrome')
@include('frontend.partials.about-chrome')
@endsection

@section('mobile_nav')
@include('frontend.partials.about-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.about-content')
@endsection

@section('page_scripts')
@include('frontend.partials.about-page-scripts')
@endsection
