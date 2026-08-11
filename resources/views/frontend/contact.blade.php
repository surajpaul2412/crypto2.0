@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Contact — Crypto Cipher® Audio Lab';
    $pageDescription = 'Contact Crypto Cipher Audio Lab — recording services, collaboration, library support, affiliation, demo composer programme.';
    $pageCanonical = 'https://cryptocipher.in/contact';
    $pageOgUrl = 'https://cryptocipher.in/contact';
    $pageOgTitle = 'Contact — Crypto Cipher® Audio Lab';
    $pageOgDescription = 'Contact Crypto Cipher Audio Lab — recording services, collaboration, library support, and composer programmes.';
    $pageOgImage = 'https://cryptocipher.in/og/contact.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab — Contact';
    $pageTwitterImage = 'https://cryptocipher.in/og/contact.png?v=1';
    $pageHeadInclude = 'frontend.partials.contact-head-inline';
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
@include('frontend.partials.contact-chrome')
@endsection

@section('mobile_nav')
@include('frontend.partials.contact-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.contact-content')
@endsection

@section('page_scripts')
@include('frontend.partials.contact-page-scripts')
@endsection
