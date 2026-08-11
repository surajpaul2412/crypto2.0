@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Privacy Policy - Crypto Cipher Audio Lab';
    $pageDescription = 'How Crypto Cipher Audio Lab collects, uses, and protects your data. DPDPA, GDPR & CCPA aligned.';
    $pageCanonical = 'https://cryptocipher.in/privacy-policy';
    $pageOgUrl = 'https://cryptocipher.in/privacy-policy';
    $pageOgTitle = 'Privacy Policy - Crypto Cipher Audio Lab';
    $pageOgDescription = 'How Crypto Cipher Audio Lab collects, uses, and protects your data. DPDPA, GDPR & CCPA aligned.';
    $pageOgImage = 'https://cryptocipher.in/og/privacy.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab - Privacy Policy';
    $pageTwitterImage = 'https://cryptocipher.in/og/privacy.png?v=1';
    $pageBodyClass = 'has-mobile-side-index';
    $pageHeadInclude = 'frontend.partials.privacy-policy-head-inline';
    $pageStyleAssets = [];
    $pageScriptAssets = [];
@endphp

@section('page_chrome')
@include('frontend.partials.privacy-policy-chrome')
@endsection

@section('mobile_nav')
@include('frontend.partials.privacy-policy-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.privacy-policy-content')
@endsection

@section('page_scripts')
@include('frontend.partials.privacy-policy-page-scripts')
@endsection
