@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Checkout - Crypto Cipher Audio Lab';
    $pageDescription = 'Complete your purchase securely.';
    $pageCanonical = 'https://cryptocipher.in/checkout';
    $pageOgUrl = 'https://cryptocipher.in/checkout';
    $pageOgTitle = 'Checkout - Crypto Cipher Audio Lab';
    $pageOgDescription = 'Complete your purchase securely.';
    $pageOgImage = 'https://cryptocipher.in/og/default.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab - Checkout';
    $pageTwitterImage = 'https://cryptocipher.in/og/default.png?v=1';
    $pageHeadInclude = 'frontend.partials.checkout-head-inline';
    $pageStyleAssets = [];
    $pageScriptAssets = [];
@endphp

@section('page_chrome')
@include('frontend.partials.checkout-chrome')
@endsection

@section('mobile_nav')
@include('frontend.partials.checkout-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.checkout-content')
@endsection

@section('page_scripts')
@include('frontend.partials.checkout-page-scripts')
@endsection
