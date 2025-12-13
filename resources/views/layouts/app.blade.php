<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="UTF-8">

    <title>Rayo - Digital Agency & Personal Portfolio</title>

    <meta name="description" content="Elevate your digital presence with Rayo...">
    <meta name="keywords" content="mix_design, resume, portfolio">
    <meta name="author" content="mix_design">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="{{ url('/') }}/">

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/img/favicon/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">

    <!-- OG -->
    <meta property="og:image" content="{{ asset('assets/img/og-image.jpg') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/loaders/loader.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}">
</head>

  <body>
    @include('partials.loader')
    @include('partials.header')

    @yield('content')
    
    @include('partials.footer')

    <!-- To Top Button Start -->
    <a href="#0" id="to-top" class="btn btn-to-top slide-up anim-no-delay">
      <i class="ph ph-arrow-up"></i>
    </a>
    <!-- To Top Button End -->

    <!-- Load Scripts Start -->
    <script src="{{ asset('assets/js/libs.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- Load Scripts End -->    
  </body>
</html>
