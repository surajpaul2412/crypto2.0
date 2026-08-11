@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Order Confirmed - Crypto Cipher Audio Lab';
    $pageDescription = 'Your order has been placed successfully.';
    $pageCanonical = 'https://cryptocipher.in/checkout/success';
    $pageOgUrl = 'https://cryptocipher.in/checkout/success';
    $pageOgTitle = 'Order Confirmed - Crypto Cipher Audio Lab';
    $pageOgDescription = 'Your order has been placed successfully.';
    $pageOgImage = 'https://cryptocipher.in/og/default.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab - Order Confirmed';
    $pageTwitterImage = 'https://cryptocipher.in/og/default.png?v=1';
    $pageHeadInclude = 'frontend.partials.checkout-success-head-inline';
    $pageStyleAssets = [];
    $pageScriptAssets = [];
@endphp

@section('page_chrome')
@include('frontend.partials.checkout-success-chrome')
@endsection

@section('mobile_nav')
@include('frontend.partials.checkout-success-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.checkout-success-content')
@endsection

@section('page_scripts')
@include('frontend.partials.checkout-success-page-scripts')
@endsection
