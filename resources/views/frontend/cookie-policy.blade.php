@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Cookie Policy - Crypto Cipher Audio Lab';
    $pageDescription = 'How Crypto Cipher Audio Lab uses cookies and similar technologies, and how you can control them.';
    $pageCanonical = 'https://cryptocipher.in/cookie-policy';
    $pageOgUrl = 'https://cryptocipher.in/cookie-policy';
    $pageOgTitle = 'Cookie Policy - Crypto Cipher Audio Lab';
    $pageOgDescription = 'How Crypto Cipher Audio Lab uses cookies and similar technologies, and how you can control them.';
    $pageOgImage = 'https://cryptocipher.in/og/cookie-policy.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab - Cookie Policy';
    $pageTwitterImage = 'https://cryptocipher.in/og/cookie-policy.png?v=1';
    $pageBodyClass = 'has-mobile-side-index';
    $pageHeadInclude = 'frontend.partials.cookie-policy-head-inline';
    $pageStyleAssets = [];
    $pageScriptAssets = [];
@endphp

@section('page_chrome')
@include('frontend.partials.cookie-policy-chrome')
@endsection

@section('mobile_nav')
@include('frontend.partials.cookie-policy-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.cookie-policy-content')
@endsection

@section('page_scripts')
@include('frontend.partials.cookie-policy-page-scripts')
@endsection
