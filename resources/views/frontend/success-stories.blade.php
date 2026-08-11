@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Success Stories — What Pro Composers Say · Crypto Cipher®';
    $pageDescription = 'Oscar, BAFTA and Grammy-winning composers on Crypto Cipher\'s authentic Indian virtual instruments and recording services. Real words, real productions.';
    $pageCanonical = 'https://cryptocipher.in/testimonials';
    $pageOgUrl = 'https://cryptocipher.in/testimonials';
    $pageOgTitle = 'Success Stories — What Pro Composers Say · Crypto Cipher®';
    $pageOgDescription = 'Oscar, BAFTA and Grammy-winning composers on Crypto Cipher\'s authentic Indian virtual instruments and recording services.';
    $pageOgImage = 'https://cryptocipher.in/og/testimonials.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab — Success Stories';
    $pageTwitterImage = 'https://cryptocipher.in/og/testimonials.png?v=1';
    $pageHeadInclude = 'frontend.partials.success-stories-head-inline';
    $pageStyleAssets = [];
    $pageScriptAssets = [];
@endphp

@section('page_chrome')
@include('frontend.partials.success-stories-chrome')
@endsection

@section('mobile_nav')
@include('frontend.partials.success-stories-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.success-stories-content')
@endsection

@section('page_scripts')
@include('frontend.partials.success-stories-page-scripts')
@endsection
