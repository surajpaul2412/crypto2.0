@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Your Cart - Crypto Cipher Audio Lab';
    $pageDescription = 'Review your selected Indian instrument libraries before checkout.';
    $pageCanonical = 'https://cryptocipher.in/cart';
    $pageOgUrl = 'https://cryptocipher.in/cart';
    $pageOgTitle = 'Your Cart - Crypto Cipher Audio Lab';
    $pageOgDescription = 'Review your selected Indian instrument libraries before checkout.';
    $pageOgImage = 'https://cryptocipher.in/og/default.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab - Cart';
    $pageTwitterImage = 'https://cryptocipher.in/og/default.png?v=1';
    $pageHeadInclude = 'frontend.partials.cart-head-inline';
    $pageStyleAssets = [];
    $pageScriptAssets = [];
@endphp

@section('page_chrome')
@include('frontend.partials.cart-chrome')
@endsection

@section('mobile_nav')
@include('frontend.partials.cart-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.cart-content')
@endsection

@section('page_scripts')
@include('frontend.partials.cart-page-scripts')
@endsection
