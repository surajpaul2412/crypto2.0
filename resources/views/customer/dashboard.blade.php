@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Your Dashboard - Crypto Cipher Audio Lab';
    $pageDescription = 'Your purchased instrument libraries, order history, and account.';
    $pageCanonical = '';
    $pageOgUrl = '';
    $pageOgTitle = 'Your Dashboard - Crypto Cipher Audio Lab';
    $pageOgDescription = 'Your purchased instrument libraries, order history, and account.';
    $pageOgImage = 'https://cryptocipher.in/og/default.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab - Dashboard';
    $pageTwitterImage = 'https://cryptocipher.in/og/default.png?v=1';
    $pageHeadInclude = 'frontend.partials.dashboard-head-inline';
    $pageStyleAssets = [];
    $pageScriptAssets = [];
@endphp

@section('page_chrome')
@include('frontend.partials.dashboard-chrome')
@endsection

@section('mobile_nav')
@include('frontend.partials.dashboard-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.dashboard-content')
@endsection

@section('page_scripts')
@include('frontend.partials.dashboard-page-scripts')
@endsection
