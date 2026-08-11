@extends('frontend.layouts.static-site')

@php
    $pageTitle = $instrument->name . ' — Live Recording Sessions · Crypto Cipher®';
    $pageDescription = $instrument->meta_description;
    $pageCanonical = 'https://cryptocipher.in/recording/' . $instrument->slug;
    $pageOgUrl = 'https://cryptocipher.in/recording/' . $instrument->slug;
    $pageOgTitle = $instrument->name . ' Remote Recording — Crypto Cipher';
    $pageOgDescription = $instrument->meta_description;
    $pageOgImage = 'https://cryptocipher.in/og/recording-inner.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab — ' . $instrument->name . ' Recording';
    $pageTwitterImage = 'https://cryptocipher.in/og/recording-inner.png?v=1';
    $pageHeadInclude = 'frontend.partials.recording-services-inner-head-inline';
    $pageStyleAssets = [];
    $pageScriptAssets = [
        'https://cdn.jsdelivr.net/npm/lenis@1.1.13/dist/lenis.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js',
        [
            'src' => asset('frontend/assets/js/cc-demo-player.js') . '?v=dur1',
            'defer' => true,
        ],
    ];
@endphp

@section('page_chrome')
@include('frontend.partials.recording-services-inner-chrome')
@endsection

@section('page_header')
@include('frontend.partials.recording-services-inner-header')
@endsection

@section('mobile_nav')
@include('frontend.partials.recording-services-inner-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.recording-services-inner-content')
@endsection

@section('page_pre_footer')
@include('frontend.partials.recording-services-inner-pre-footer')
@endsection

@section('page_footer')
@include('frontend.partials.recording-services-inner-footer')
@endsection

@section('page_scripts')
@include('frontend.partials.recording-services-inner-page-scripts')
@endsection
