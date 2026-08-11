@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Your Wishlist - Crypto Cipher Audio Lab';
    $pageDescription = 'Instruments and libraries you\'ve saved for later on Crypto Cipher Audio Lab.';
    $pageCanonical = 'https://cryptocipher.in/wishlist';
    $pageOgUrl = 'https://cryptocipher.in/wishlist';
    $pageOgTitle = 'Your Wishlist - Crypto Cipher Audio Lab';
    $pageOgDescription = 'Instruments and libraries you\'ve saved for later.';
    $pageOgImage = 'https://cryptocipher.in/og/default.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab - Wishlist';
    $pageTwitterImage = 'https://cryptocipher.in/og/default.png?v=1';
    $pageHeadInclude = 'frontend.partials.wishlist-head-inline';
    $pageStyleAssets = [];
    $pageScriptAssets = [];
@endphp

@section('page_chrome')
@include('frontend.partials.wishlist-chrome')
@endsection

@section('mobile_nav')
@include('frontend.partials.wishlist-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.wishlist-content')
@endsection

@section('page_scripts')
@include('frontend.partials.wishlist-page-scripts')
@endsection
