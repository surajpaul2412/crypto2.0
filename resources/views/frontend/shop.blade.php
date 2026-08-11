@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Indian Virtual Instruments for Kontakt - Crypto Cipher Audio Lab';
    $pageDescription = 'Premium Indian virtual instruments for Kontakt from Crypto Cipher. 14 instruments - Tabla, Harmonium, Sitar, Voices of Ragas, Tarangs, Swarmandal - recorded with Indian master musicians. AI-training-free, sync-cleared.';
    $pageCanonical = route('shop');
    $pageOgUrl = route('shop');
    $pageOgTitle = 'Indian Virtual Instruments for Kontakt - Crypto Cipher Audio Lab';
    $pageOgDescription = 'Premium Indian virtual instruments for Kontakt - Tabla, Sitar, Harmonium, Tarangs and more, recorded with Indian master musicians.';
    $pageOgImage = 'https://cryptocipher.in/og/library-shop.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab - Indian Virtual Instruments';
    $pageTwitterImage = 'https://cryptocipher.in/og/library-shop.png?v=1';
    $pageHeadInclude = 'frontend.partials.shop-head-inline';
    $pageStyleAssets = [];
    $pageScriptAssets = [];
@endphp

@section('mobile_nav')
@include('frontend.partials.shop-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.shop-content')
@endsection

@section('page_scripts')
@include('frontend.partials.shop-page-scripts')
@endsection
