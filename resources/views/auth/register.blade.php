@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Create Account - Crypto Cipher Audio Lab';
    $pageDescription = 'Create your Crypto Cipher Audio Lab account to manage library downloads, recording sessions, and collaboration requests.';
    $pageCanonical = 'https://cryptocipher.in/register';
    $pageOgUrl = 'https://cryptocipher.in/register';
    $pageOgTitle = 'Create Account - Crypto Cipher Audio Lab';
    $pageOgDescription = 'Create your Crypto Cipher Audio Lab account.';
    $pageOgImage = 'https://cryptocipher.in/og/default.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab - Create Account';
    $pageTwitterImage = 'https://cryptocipher.in/og/default.png?v=1';
    $pageHeadInclude = 'frontend.partials.register-head-inline';
    $pageStyleAssets = [];
    $pageScriptAssets = [];
@endphp

@section('page_chrome')
@include('frontend.partials.register-chrome')
@endsection

@section('page_header')
<!-- intentionally blank: register page has no site header -->
@endsection

@section('content')
@include('frontend.partials.register-content')
@endsection

@section('page_footer')
<!-- intentionally blank: register page has no site footer -->
@endsection
