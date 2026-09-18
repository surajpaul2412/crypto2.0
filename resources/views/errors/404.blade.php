@extends('frontend.layouts.static-site')

@php
    $pageTitle = 'Page Not Found — Crypto Cipher® Audio Lab';
    $pageDescription = "The page you're looking for might have moved. Let us help you find it.";
    $pageStyleAssets = [
        asset('frontend/assets/css/cc-404.css'),
    ];
    $pageScriptAssets = [
        [
            'src' => asset('frontend/assets/js/cc-404.js'),
            'defer' => true,
        ],
    ];
@endphp

@section('page_chrome')
@include('frontend.partials.404-chrome')
@endsection

@section('mobile_nav')
@include('frontend.partials.404-mobile-nav')
@endsection

@section('content')
@include('frontend.partials.404-content')
@endsection

@section('page_footer')
@endsection
