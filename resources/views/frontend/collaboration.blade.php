@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Collaborate — Open Call for Composers, Engineers, Designers · Crypto Cipher®';
    $pageDescription = 'An open call for composers, sound designers, engineers, and creators who want to help bring Indian musical heritage to the world. Crypto Cipher® partners with proven professionals globally.';
    $pageCanonical = 'https://cryptocipher.in/collaborate';
    $pageOgUrl = 'https://cryptocipher.in/collaborate';
    $pageOgTitle = 'Collaborate — Open Call for Composers, Engineers, Designers · Crypto Cipher®';
    $pageOgDescription = 'Projects and roles for music composers, sound designers, engineers and Kontakt scripters. Help bring Indian musical heritage to the world.';
    $pageOgImage = 'https://cryptocipher.in/og/collab.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab — Collaborate';
    $pageTwitterImage = 'https://cryptocipher.in/og/collab.png?v=1';
    $pageBodyClass = 'has-mobile-side-index';
    $pageHeadInclude = 'frontend.partials.collaboration-head-inline';
    $pageStyleAssets = [
        asset('frontend/assets/css/cc-enquiry-hub.css'),
    ];
    $pageScriptAssets = [
        'https://cdn.jsdelivr.net/npm/lenis@1.1.13/dist/lenis.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js',
        asset('frontend/assets/js/cc-enquiry-hub.config.js'),
        [
            'src' => asset('frontend/assets/js/cc-enquiry-hub.js'),
            'defer' => true,
        ],
    ];
@endphp

@section('page_chrome')
@include('frontend.partials.collaboration-chrome')
@endsection

@section('mobile_nav')
@include('frontend.partials.collaboration-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.collaboration-content')
@endsection

@section('page_scripts')
@include('frontend.partials.collaboration-page-scripts')
@endsection
