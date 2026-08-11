<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="UTF-8">

    <title>Crypto Cipher</title>

    <meta name="description" content="">
    <meta name="keywords" content="Crypto Cipher">
    <meta name="author" content="Suraj Paul">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="{{ rtrim(request()->getSchemeAndHttpHost(), '/') }}/">

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/img/favicon/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/favicon/apple-touch-icon.png') }}">

    <!-- OG -->
    <meta property="og:image" content="{{ asset('assets/img/og-image.jpg') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/loaders/loader.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}">
    <style>
      .text-green {color: #67a318;}
      .inner-headline__title {
        font-size: 6rem !important;
      }
      .btn-line-headline {
        font-size: 6rem !important;
      }
      p.t-large {
        font-size: 2rem !important;
      }
      @media only screen and (min-width: 1200px) {
        h6 {
          font-size: 2.4rem !important;
        }
      }

      @media only screen and (max-width: 767px) {
        .inner-headline__title {
          font-size: 4.2rem !important;
        }
        .btn-line-headline {
          font-size: 4.2rem !important;
        }
        p.t-large {
          font-size: 2rem !important;
        }
      }
    </style>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/libs.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script>
      window.addEventListener('load', function () {
        if (!window.Swiper) return;

        document.querySelectorAll('.cc-featured-swiper').forEach(function (slider) {
          if (slider.classList.contains('swiper-initialized')) return;

          new Swiper(slider, {
            slidesPerView: 1.15,
            spaceBetween: 16,
            loop: true,
            speed: 700,
            grabCursor: true,
            autoplay: {
              delay: 2400,
              disableOnInteraction: false,
              pauseOnMouseEnter: true
            },
            navigation: {
              nextEl: slider.querySelector('.swiper-button-next'),
              prevEl: slider.querySelector('.swiper-button-prev')
            },
            breakpoints: {
              576: {
                slidesPerView: 2.1,
                spaceBetween: 16
              },
              992: {
                slidesPerView: 3.2,
                spaceBetween: 18
              },
              1200: {
                slidesPerView: 4.15,
                spaceBetween: 18
              },
              1600: {
                slidesPerView: 5,
                spaceBetween: 18
              }
            }
          });
        });
      });
    </script>
    <script>
      document.addEventListener('submit', async function (event) {
        var form = event.target.closest('form[data-ajax-submit="true"]');
        if (!form) return;

        event.preventDefault();

        try {
          var response = await fetch(form.action, {
            method: form.method || 'POST',
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
              'Accept': 'application/json'
            },
            body: new FormData(form),
            credentials: 'same-origin'
          });

          if (!response.ok) {
            throw new Error('Request failed');
          }

          var data = await response.json();

          if (typeof data.cartCount !== 'undefined') {
            document.querySelectorAll('.js-cart-count').forEach(function (el) {
              el.textContent = data.cartCount;
            });
          }

          if (typeof data.wishlistCount !== 'undefined') {
            document.querySelectorAll('.js-wishlist-count').forEach(function (el) {
              el.textContent = data.wishlistCount;
            });
          }

          var caption = form.querySelector('.btn-caption');
          if (form.dataset.actionKind === 'cart' && caption && typeof data.itemQty !== 'undefined') {
            caption.textContent = data.itemQty + ' in cart';
          }

          if (form.classList.contains('js-wishlist-form') && caption && typeof data.inWishlist !== 'undefined') {
            var inWishlist = !!data.inWishlist;
            form.dataset.inWishlist = inWishlist ? '1' : '0';
            form.action = inWishlist ? form.dataset.removeUrl : form.dataset.addUrl;
            caption.textContent = inWishlist
              ? (form.dataset.removeLabel || 'Remove Wishlist')
              : (form.dataset.addLabel || 'Add Wishlist');

            var iconBtn = form.querySelector('.js-wishlist-icon-btn');
            var icon = iconBtn ? iconBtn.querySelector('i') : null;
            if (iconBtn) {
              iconBtn.classList.toggle('is-active', inWishlist);
            }
            if (icon) {
              icon.classList.toggle('ph-fill', inWishlist);
              icon.classList.toggle('ph-bold', !inWishlist);
            }
          }

          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: data.message || 'Updated successfully.',
            timer: 1500,
            showConfirmButton: false
          });
        } catch (error) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Something went wrong. Please try again.'
          });
        }
      });
    </script>
    <!-- Load Scripts End -->    
  </body>
</html>
