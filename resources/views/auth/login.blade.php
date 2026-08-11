@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Login - Crypto Cipher Audio Lab';
    $pageDescription = 'Sign in to your Crypto Cipher Audio Lab account to manage library downloads, recording sessions, and collaboration requests.';
    $pageCanonical = 'https://cryptocipher.in/login';
    $pageOgUrl = 'https://cryptocipher.in/login';
    $pageOgTitle = 'Login - Crypto Cipher Audio Lab';
    $pageOgDescription = 'Sign in to your Crypto Cipher Audio Lab account.';
    $pageOgImage = 'https://cryptocipher.in/og/default.png?v=1';
    $pageOgImageAlt = 'Crypto Cipher Audio Lab - Login';
    $pageTwitterImage = 'https://cryptocipher.in/og/default.png?v=1';
    $pageHeadInclude = 'frontend.partials.login-head-inline';
    $pageStyleAssets = [];
    $pageScriptAssets = [];
@endphp

@section('page_chrome')
@include('frontend.partials.login-chrome')
@endsection

@section('page_header')
<!-- intentionally blank: login page has no site header -->
@endsection

@section('content')
@include('frontend.partials.login-content')
@endsection

@section('page_footer')
<!-- intentionally blank: login page has no site footer -->
@endsection
