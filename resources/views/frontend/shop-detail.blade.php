@extends('frontend.layouts.static-site')

@php
    $pageTitle = $product->name . ' — ' . ucfirst($product->format) . ' | Crypto Cipher';
    $pageDescription = $product->tagline;
    $pageCanonical = 'https://cryptocipher.in/shop/' . $product->slug;
    $pageOgUrl = 'https://cryptocipher.in/shop/' . $product->slug;
    $pageOgTitle = $product->name . ' — ' . ucfirst($product->format) . ' | Crypto Cipher';
    $pageOgDescription = $product->tagline;
    $pageOgImage = $product->imageUrl();
    $pageOgImageAlt = 'Crypto Cipher Audio Lab — ' . $product->name;
    $pageTwitterImage = $product->imageUrl();
    $pageHeadInclude = 'frontend.partials.shop-detail-head-inline';
    $pageStyleAssets = [];
    $pageScriptAssets = [
        'https://cdn.jsdelivr.net/npm/lenis@1.1.13/dist/lenis.min.js',
    ];
@endphp

@section('page_chrome')
@include('frontend.partials.shop-detail-chrome')
@endsection

@section('mobile_nav')
@include('frontend.partials.shop-detail-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.shop-detail-content')
@endsection

@section('page_pre_footer')
@include('frontend.partials.shop-detail-pre-footer')
@endsection

@section('page_scripts')
@include('frontend.partials.shop-detail-page-scripts')
@endsection
