@extends('layouts.app')

@section('title', 'Rayo – Digital Agency')
@section('meta_description', 'Elevate your digital presence with Rayo')
@section('meta_keywords', 'agency, portfolio, laravel')

@section('content')
<main id="mxd-page-content" class="mxd-page-content">
  <!-- Hero Section Start -->
  <div class="mxd-section mxd-hero-section">
    <div class="mxd-hero-00">
      <div class="mxd-hero-00__wrap">
        <!-- top group -->
        <div class="mxd-hero-00__top">
          <div class="mxd-hero-00__title-wrap loading-wrap">
            <!-- title images -->
            <div class="mxd-hero-00__images mxd-floating-img">
              <div class="hero-00-image image-01 mxd-floating-img__item loading__fade">
                <img class="mxd-pulse" src="img/hero/01_hero-img.webp" alt="Hero Image">
              </div>
              <div class="hero-00-image image-02 mxd-floating-img__item loading__fade">
                <img class="mxd-move" src="img/hero/02_hero-img.webp" alt="Hero Image">
              </div>
            </div>
            <!-- title marquee -->
            <div class="mxd-hero-00__marquee loading__item">
              <div class="marquee marquee-left--gsap">
                <div class="marquee__toleft marquee-flex">
                  <!-- single item -->
                  <div class="marquee__item item-regular text">
                    <p>your work</p>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="currentColor">
                      <path fill="currentColor" d="M78.4,38.4c0,0-11.8,0-15.8,0c-1.6,0-4.8-0.2-7.1-0.8c-2.3-0.6-4.3-0.8-6.3-2.4c-2-1.2-3.5-3.2-4.7-4.8
                        c-1.2-1.6-1.6-3.6-2-5.5c-0.3-1.5-0.7-4.3-0.8-5.9c-0.2-4.3,0-17.4,0-17.4C41.8,0.8,41,0,40.2,0s-1.6,0.8-1.6,1.6c0,0,0,13.1,0,17.4
                        c0,1.6-0.6,4.3-0.8,5.9c-0.3,2-0.8,4-2,5.5c-1.2,2-2.8,3.6-4.7,4.8s-4,1.8-6.3,2.4c-1.9,0.5-4.7,0.6-6.7,0.8c-3.9,0.4-16.6,0-16.6,0
                        C0.8,38.4,0,39.2,0,40c0,0.8,0.8,1.6,1.6,1.6c0,0,12.2,0,16.6,0c1.6,0,4.8,0.3,6.7,0.8c2.3,0.6,4.3,0.8,6.3,2.4
                        c1.6,1.2,3.2,2.8,4.3,4.4c1.2,2,2.1,3.9,2.4,6.3c0.2,1.7,0.7,4.7,0.8,6.7c0.2,4,0,16.2,0,16.2c0,0.8,0.8,1.6,1.6,1.6
                        s1.6-0.8,1.6-1.6c0,0,0-12.3,0-16.2c0-1.6,0.5-5.1,0.8-6.7c0.5-2.3,0.8-4.4,2.4-6.3c1.2-1.6,2.8-3.2,4.3-4.4c2-1.2,3.9-2,6.3-2.4
                        c1.8-0.3,5.1-0.7,7.1-0.8c3.5-0.2,15.8,0,15.8,0c0.8,0,1.6-0.8,1.6-1.6C80,39.2,79.2,38.4,78.4,38.4C78.4,38.4,78.4,38.4,78.4,38.4z
                        "/>
                    </svg>
                    <!-- <img class="inject-me" src="img/icons/20x20-rayo-star.svg" alt="Divider Icon"> -->
                  </div>
                  <!-- single item -->
                  <div class="marquee__item item-regular text">
                    <p>your work</p>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="currentColor">
                      <path fill="currentColor" d="M78.4,38.4c0,0-11.8,0-15.8,0c-1.6,0-4.8-0.2-7.1-0.8c-2.3-0.6-4.3-0.8-6.3-2.4c-2-1.2-3.5-3.2-4.7-4.8
                        c-1.2-1.6-1.6-3.6-2-5.5c-0.3-1.5-0.7-4.3-0.8-5.9c-0.2-4.3,0-17.4,0-17.4C41.8,0.8,41,0,40.2,0s-1.6,0.8-1.6,1.6c0,0,0,13.1,0,17.4
                        c0,1.6-0.6,4.3-0.8,5.9c-0.3,2-0.8,4-2,5.5c-1.2,2-2.8,3.6-4.7,4.8s-4,1.8-6.3,2.4c-1.9,0.5-4.7,0.6-6.7,0.8c-3.9,0.4-16.6,0-16.6,0
                        C0.8,38.4,0,39.2,0,40c0,0.8,0.8,1.6,1.6,1.6c0,0,12.2,0,16.6,0c1.6,0,4.8,0.3,6.7,0.8c2.3,0.6,4.3,0.8,6.3,2.4
                        c1.6,1.2,3.2,2.8,4.3,4.4c1.2,2,2.1,3.9,2.4,6.3c0.2,1.7,0.7,4.7,0.8,6.7c0.2,4,0,16.2,0,16.2c0,0.8,0.8,1.6,1.6,1.6
                        s1.6-0.8,1.6-1.6c0,0,0-12.3,0-16.2c0-1.6,0.5-5.1,0.8-6.7c0.5-2.3,0.8-4.4,2.4-6.3c1.2-1.6,2.8-3.2,4.3-4.4c2-1.2,3.9-2,6.3-2.4
                        c1.8-0.3,5.1-0.7,7.1-0.8c3.5-0.2,15.8,0,15.8,0c0.8,0,1.6-0.8,1.6-1.6C80,39.2,79.2,38.4,78.4,38.4C78.4,38.4,78.4,38.4,78.4,38.4z
                        "/>
                    </svg>
                    <!-- <img class="inject-me" src="img/icons/20x20-rayo-star.svg" alt="Divider Icon"> -->
                  </div>
                  <!-- single item -->
                  <div class="marquee__item item-regular text">
                    <p>your work</p>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="currentColor">
                      <path fill="currentColor" d="M78.4,38.4c0,0-11.8,0-15.8,0c-1.6,0-4.8-0.2-7.1-0.8c-2.3-0.6-4.3-0.8-6.3-2.4c-2-1.2-3.5-3.2-4.7-4.8
                        c-1.2-1.6-1.6-3.6-2-5.5c-0.3-1.5-0.7-4.3-0.8-5.9c-0.2-4.3,0-17.4,0-17.4C41.8,0.8,41,0,40.2,0s-1.6,0.8-1.6,1.6c0,0,0,13.1,0,17.4
                        c0,1.6-0.6,4.3-0.8,5.9c-0.3,2-0.8,4-2,5.5c-1.2,2-2.8,3.6-4.7,4.8s-4,1.8-6.3,2.4c-1.9,0.5-4.7,0.6-6.7,0.8c-3.9,0.4-16.6,0-16.6,0
                        C0.8,38.4,0,39.2,0,40c0,0.8,0.8,1.6,1.6,1.6c0,0,12.2,0,16.6,0c1.6,0,4.8,0.3,6.7,0.8c2.3,0.6,4.3,0.8,6.3,2.4
                        c1.6,1.2,3.2,2.8,4.3,4.4c1.2,2,2.1,3.9,2.4,6.3c0.2,1.7,0.7,4.7,0.8,6.7c0.2,4,0,16.2,0,16.2c0,0.8,0.8,1.6,1.6,1.6
                        s1.6-0.8,1.6-1.6c0,0,0-12.3,0-16.2c0-1.6,0.5-5.1,0.8-6.7c0.5-2.3,0.8-4.4,2.4-6.3c1.2-1.6,2.8-3.2,4.3-4.4c2-1.2,3.9-2,6.3-2.4
                        c1.8-0.3,5.1-0.7,7.1-0.8c3.5-0.2,15.8,0,15.8,0c0.8,0,1.6-0.8,1.6-1.6C80,39.2,79.2,38.4,78.4,38.4C78.4,38.4,78.4,38.4,78.4,38.4z
                        "/>
                    </svg>
                    <!-- <img class="inject-me" src="img/icons/20x20-rayo-star.svg" alt="Divider Icon"> -->
                  </div>
                  <!-- single item -->
                  <div class="marquee__item item-regular text">
                    <p>your work</p>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="currentColor">
                      <path fill="currentColor" d="M78.4,38.4c0,0-11.8,0-15.8,0c-1.6,0-4.8-0.2-7.1-0.8c-2.3-0.6-4.3-0.8-6.3-2.4c-2-1.2-3.5-3.2-4.7-4.8
                        c-1.2-1.6-1.6-3.6-2-5.5c-0.3-1.5-0.7-4.3-0.8-5.9c-0.2-4.3,0-17.4,0-17.4C41.8,0.8,41,0,40.2,0s-1.6,0.8-1.6,1.6c0,0,0,13.1,0,17.4
                        c0,1.6-0.6,4.3-0.8,5.9c-0.3,2-0.8,4-2,5.5c-1.2,2-2.8,3.6-4.7,4.8s-4,1.8-6.3,2.4c-1.9,0.5-4.7,0.6-6.7,0.8c-3.9,0.4-16.6,0-16.6,0
                        C0.8,38.4,0,39.2,0,40c0,0.8,0.8,1.6,1.6,1.6c0,0,12.2,0,16.6,0c1.6,0,4.8,0.3,6.7,0.8c2.3,0.6,4.3,0.8,6.3,2.4
                        c1.6,1.2,3.2,2.8,4.3,4.4c1.2,2,2.1,3.9,2.4,6.3c0.2,1.7,0.7,4.7,0.8,6.7c0.2,4,0,16.2,0,16.2c0,0.8,0.8,1.6,1.6,1.6
                        s1.6-0.8,1.6-1.6c0,0,0-12.3,0-16.2c0-1.6,0.5-5.1,0.8-6.7c0.5-2.3,0.8-4.4,2.4-6.3c1.2-1.6,2.8-3.2,4.3-4.4c2-1.2,3.9-2,6.3-2.4
                        c1.8-0.3,5.1-0.7,7.1-0.8c3.5-0.2,15.8,0,15.8,0c0.8,0,1.6-0.8,1.6-1.6C80,39.2,79.2,38.4,78.4,38.4C78.4,38.4,78.4,38.4,78.4,38.4z
                        "/>
                    </svg>
                    <!-- <img class="inject-me" src="img/icons/20x20-rayo-star.svg" alt="Divider Icon"> -->
                  </div>
                  <!-- single item -->
                  <div class="marquee__item item-regular text">
                    <p>your work</p>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="currentColor">
                      <path fill="currentColor" d="M78.4,38.4c0,0-11.8,0-15.8,0c-1.6,0-4.8-0.2-7.1-0.8c-2.3-0.6-4.3-0.8-6.3-2.4c-2-1.2-3.5-3.2-4.7-4.8
                        c-1.2-1.6-1.6-3.6-2-5.5c-0.3-1.5-0.7-4.3-0.8-5.9c-0.2-4.3,0-17.4,0-17.4C41.8,0.8,41,0,40.2,0s-1.6,0.8-1.6,1.6c0,0,0,13.1,0,17.4
                        c0,1.6-0.6,4.3-0.8,5.9c-0.3,2-0.8,4-2,5.5c-1.2,2-2.8,3.6-4.7,4.8s-4,1.8-6.3,2.4c-1.9,0.5-4.7,0.6-6.7,0.8c-3.9,0.4-16.6,0-16.6,0
                        C0.8,38.4,0,39.2,0,40c0,0.8,0.8,1.6,1.6,1.6c0,0,12.2,0,16.6,0c1.6,0,4.8,0.3,6.7,0.8c2.3,0.6,4.3,0.8,6.3,2.4
                        c1.6,1.2,3.2,2.8,4.3,4.4c1.2,2,2.1,3.9,2.4,6.3c0.2,1.7,0.7,4.7,0.8,6.7c0.2,4,0,16.2,0,16.2c0,0.8,0.8,1.6,1.6,1.6
                        s1.6-0.8,1.6-1.6c0,0,0-12.3,0-16.2c0-1.6,0.5-5.1,0.8-6.7c0.5-2.3,0.8-4.4,2.4-6.3c1.2-1.6,2.8-3.2,4.3-4.4c2-1.2,3.9-2,6.3-2.4
                        c1.8-0.3,5.1-0.7,7.1-0.8c3.5-0.2,15.8,0,15.8,0c0.8,0,1.6-0.8,1.6-1.6C80,39.2,79.2,38.4,78.4,38.4C78.4,38.4,78.4,38.4,78.4,38.4z
                        "/>
                    </svg>
                    <!-- <img class="inject-me" src="img/icons/20x20-rayo-star.svg" alt="Divider Icon"> -->
                  </div>
                </div>
              </div>
            </div>
            <!-- title text -->
            <h1 class="hero-00-title">
              <span class="hero-00-title__row loading__item">
                <em class="hero-00-title__item">Make</em>
                <em class="hero-00-title__item title-item-transparent">your work</em>
              </span>
              <span class="hero-00-title__row loading__item">
                <em class="hero-00-title__item title-item-image">
                  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 20 20">
                    <path d="M19.6,9.6h-3.9c-.4,0-1.8-.2-1.8-.2-.6,0-1.1-.2-1.6-.6-.5-.3-.9-.8-1.2-1.2-.3-.4-.4-.9-.5-1.4,0,0,0-1.1-.2-1.5V.4c0-.2-.2-.4-.4-.4s-.4.2-.4.4v4.4c0,.4-.2,1.5-.2,1.5,0,.5-.2,1-.5,1.4-.3.5-.7.9-1.2,1.2s-1,.5-1.6.6c0,0-1.2,0-1.7.2H.4c-.2,0-.4.2-.4.4s.2.4.4.4h4.1c.4,0,1.7.2,1.7.2.6,0,1.1.2,1.6.6.4.3.8.7,1.1,1.1.3.5.5,1,.6,1.6,0,0,0,1.3.2,1.7v4.1c0,.2.2.4.4.4s.4-.2.4-.4v-4.1c0-.4.2-1.7.2-1.7,0-.6.2-1.1.6-1.6.3-.4.7-.8,1.1-1.1.5-.3,1-.5,1.6-.6,0,0,1.3,0,1.8-.2h3.9c.2,0,.4-.2.4-.4s-.2-.4-.4-.4h0Z"/>
                  </svg>
                  <!-- <img class="inject-me" src="img/icons/20x20-rayo-star.svg" alt="Divider Icon"> -->
                </em>
                <em class="hero-00-title__item">stand out</em>
              </span>
            </h1>
          </div>
        </div>
        <!-- bottom group -->
        <div class="mxd-hero-00__bottom">
          <div class="hero-00-manifest loading__fade">
            <p class="mxd-manifest reveal-type anim-uni-in-up">Elevate your digital presence with Rayo - dynamic and stylish template designed for creative agencies and personal brands.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Hero Section End -->

  <!-- Section - Demo List Start -->
  <div id="demo" class="mxd-section padding-grid-pre-mtext">
    <div class="mxd-container">

      <!-- Block - Demo List Start -->
      <div class="mxd-block">
        <div class="mxd-demo-list">
          <!-- items row -->
          <div class="mxd-demo-list__row">
            <!-- single item -->
            <a class="mxd-demo-list__item animate-card-2" href="index-main.html" target="_blank">
              <div class="mxd-demo-list__image">
                <img src="img/demo/screens/01.webp" alt="Rayo Demo Screen">
                <div class="mxd-demo-list__screen screen-01"></div>
              </div>
              <div class="mxd-demo-list__caption">
                <span class="mxd-demo-list__link">Main Home</span>
                <span class="mxd-demo-list__num">/01</span>
              </div>
            </a>
            <!-- single item -->
            <a class="mxd-demo-list__item item-accent animate-card-2" href="index-software-development-company.html" target="_blank">
              <div class="mxd-demo-list__image">
                <img src="img/demo/screens/02.webp" alt="Rayo Demo Screen">
                <div class="mxd-demo-list__screen screen-02"></div>
              </div>
              <div class="mxd-demo-list__caption">
                <span class="mxd-demo-list__link opposite">Software Development Company</span>
                <span class="mxd-demo-list__num opposite">/02</span>
              </div>
              <div class="mxd-pricing-table__tag">
                <span class="tag tag-default tag-additional">🔥 Hot</span>
              </div>
            </a>
          </div>
          <!-- items row -->
          <div class="mxd-demo-list__row">
            <!-- single item -->
            <a class="mxd-demo-list__item animate-card-3" href="index-freelancer-portfolio.html" target="_blank">
              <div class="mxd-demo-list__image">
                <img src="img/demo/screens/03.webp" alt="Rayo Demo Screen">
                <div class="mxd-demo-list__screen screen-03"></div>
              </div>
              <div class="mxd-demo-list__caption">
                <span class="mxd-demo-list__link small">Freelancer Portfolio</span>
                <span class="mxd-demo-list__num small">/03</span>
              </div>
            </a>
            <!-- single item -->
            <a class="mxd-demo-list__item animate-card-3" href="index-digital-agency.html" target="_blank">
              <div class="mxd-demo-list__image">
                <img src="img/demo/screens/04.webp" alt="Rayo Demo Screen">
                <div class="mxd-demo-list__screen screen-04"></div>
              </div>
              <div class="mxd-demo-list__caption">
                <span class="mxd-demo-list__link small">Digital Agency</span>
                <span class="mxd-demo-list__num small">/04</span>
              </div>
            </a>
            <!-- single item -->
            <a class="mxd-demo-list__item animate-card-3" href="index-creative-design-studio.html" target="_blank">
              <div class="mxd-demo-list__image">
                <img src="img/demo/screens/05.webp" alt="Rayo Demo Screen">
                <div class="mxd-demo-list__screen screen-05"></div>
              </div>
              <div class="mxd-demo-list__caption">
                <span class="mxd-demo-list__link small">Creative Design Studio</span>
                <span class="mxd-demo-list__num small">/05</span>
              </div>
            </a>
          </div>
          <!-- items row -->
          <div class="mxd-demo-list__row">
            <!-- single item -->
            <a class="mxd-demo-list__item item-accent animate-card-2" href="index-personal-portfolio.html" target="_blank">
              <div class="mxd-demo-list__image">
                <img src="img/demo/screens/06.webp" alt="Rayo Demo Screen">
                <div class="mxd-demo-list__screen screen-06"></div>
              </div>
              <div class="mxd-demo-list__caption">
                <span class="mxd-demo-list__link opposite">Personal Portfolio</span>
                <span class="mxd-demo-list__num opposite">/06</span>
              </div>
              <div class="mxd-pricing-table__tag">
                <span class="tag tag-default tag-additional">🔥 Hot</span>
              </div>
            </a>
            <!-- single item -->
            <a class="mxd-demo-list__item animate-card-2" href="index-web-agency.html" target="_blank">
              <div class="mxd-demo-list__image">
                <img src="img/demo/screens/07.webp" alt="Rayo Demo Screen">
                <div class="mxd-demo-list__screen screen-07"></div>
              </div>
              <div class="mxd-demo-list__caption">
                <span class="mxd-demo-list__link">Web Agency</span>
                <span class="mxd-demo-list__num">/07</span>
              </div>
              <div class="mxd-pricing-table__tag">
                <span class="tag tag-default tag-accent">🦄 Trendy</span>
              </div>
            </a>
          </div>
          <!-- items row -->
          <div class="mxd-demo-list__row">
            <!-- single item -->
            <a class="mxd-demo-list__item animate-card-3" href="index-creative-developer.html" target="_blank">
              <div class="mxd-demo-list__image">
                <img src="img/demo/screens/08.webp" alt="Rayo Demo Screen">
                <div class="mxd-demo-list__screen screen-08"></div>
              </div>
              <div class="mxd-demo-list__caption">
                <span class="mxd-demo-list__link small">Creative Developer</span>
                <span class="mxd-demo-list__num small">/08</span>
              </div>
            </a>
            <!-- single item -->
            <a class="mxd-demo-list__item animate-card-3" href="index-designer.html" target="_blank">
              <div class="mxd-demo-list__image">
                <img src="img/demo/screens/09.webp" alt="Rayo Demo Screen">
                <div class="mxd-demo-list__screen screen-09"></div>
              </div>
              <div class="mxd-demo-list__caption">
                <span class="mxd-demo-list__link small">Designer</span>
                <span class="mxd-demo-list__num small">/09</span>
              </div>
            </a>
            <!-- single item -->
            <div class="mxd-demo-list__item empty-item animate-card-3">
              <div class="mxd-demo-list__image image-placeholder">
                <img src="img/demo/screens/05.webp" alt="Rayo Demo Screen">
              </div>
              <div class="empty-item__wrap">
                <div class="empty-item__content">
                  <div class="empty-item__logo mxd-rotate">
                    <!-- logo icon -->
                    <svg class="empty-item__image" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 56 56" style="enable-background:new 0 0 56 56;" xml:space="preserve">
                      <style type="text/css">
                        .mxd-logo-colored__bg{fill:var(--accent);}
                        .mxd-logo-colored__cat{clip-path:url(#mxd-logo__crop);fill:var(--additional);}
                      </style>
                      <path class="mxd-logo-colored__bg" d="M56,28c0,11.1-2.9,28-28,28S0,39.1,0,28S2.9,0,28,0S56,16.9,56,28z"/>
                      <g>
                        <defs>
                          <path id="mxd-logo__clip" d="M28,0C2.9,0,0,16.9,0,28s2.9,28,28,28s28-16.9,28-28S53.1,0,28,0z"/>
                        </defs>
                        <clipPath id="mxd-logo__crop">
                          <use xlink:href="#mxd-logo__clip"  style="overflow:visible;"/>
                        </clipPath>
                        <path class="mxd-logo-colored__cat" d="M33.6,34.5h0.9
                          c0.5,0,0.9,0.4,0.9,0.9v3.7c0,0.5-0.4,0.9-0.9,0.9h-0.9c-0.5,0-0.9-0.4-0.9-0.9v-3.7C32.7,34.9,33.1,34.5,33.6,34.5z M20.5,37.3
                          v1.9c0,0.5,0.4,0.9,0.9,0.9h0.9c0.5,0,0.9-0.4,0.9-0.9v-3.7c0-0.5-0.4-0.9-0.9-0.9h-0.9c-0.5,0-0.9,0.4-0.9,0.9V37.3L20.5,37.3z
                          M39.2,21.5v0.9c0,0.5-0.4,0.9-0.9,0.9h-0.9c-0.5,0-0.9-0.4-0.9-0.9v-0.9c0-0.5,0.4-0.9,0.9-0.9h0.9C38.8,20.5,39.2,21,39.2,21.5z
                          M34.5,26.1h0.9c0.5,0,0.9-0.4,0.9-0.9v-0.9c0-0.5-0.4-0.9-0.9-0.9h-0.9c-0.5,0-0.9,0.4-0.9,0.9v0.9C33.6,25.7,34,26.1,34.5,26.1z
                          M28,26.1h-4.7c-0.5,0-0.9,0.4-0.9,0.9V28c0,0.5,0.4,0.9,0.9,0.9h9.3c0.5,0,0.9-0.4,0.9-0.9v-0.9c0-0.5-0.4-0.9-0.9-0.9H28L28,26.1
                          z M19.6,24.3v0.9c0,0.5,0.4,0.9,0.9,0.9h0.9c0.5,0,0.9-0.4,0.9-0.9v-0.9c0-0.5-0.4-0.9-0.9-0.9h-0.9C20,23.3,19.6,23.8,19.6,24.3z
                          M16.8,21.5v0.9c0,0.5,0.4,0.9,0.9,0.9h0.9c0.5,0,0.9-0.4,0.9-0.9v-0.9c0-0.5-0.4-0.9-0.9-0.9h-0.9C17.2,20.5,16.8,21,16.8,21.5z
                          M14,26.1v4.7c0,0.5,0.4,0.9,0.9,0.9h0.9c0.5,0,0.9-0.4,0.9-0.9v-6.5c0-0.5-0.4-0.9-0.9-0.9h-0.9c-0.5,0-0.9,0.4-0.9,0.9V26.1
                          L14,26.1z M11.2,34.5v1.9c0,0.5-0.4,0.9-0.9,0.9H7.5c-0.5,0-0.9,0.4-0.9,0.9v0.9c0,0.5,0.4,0.9,0.9,0.9h0.9c0.5,0,0.9,0.4,0.9,0.9
                          V42c0,0.5-0.4,0.9-0.9,0.9H7.5c-0.5,0-0.9,0.4-0.9,0.9v0.9c0,0.5,0.4,0.9,0.9,0.9h0.9c0.5,0,0.9,0.4,0.9,0.9V56
                          c0,0.5,0.4,0.9,0.9,0.9h0.9c0.5,0,0.9-0.4,0.9-0.9v-6.5c0-0.5,0.4-0.9,0.9-0.9h3.7c0.5,0,0.9-0.4,0.9-0.9v-0.9
                          c0-0.5-0.4-0.9-0.9-0.9h-3.7c-0.5,0-0.9-0.4-0.9-0.9v-6.5c0-0.5,0.4-0.9,0.9-0.9c0.5,0,0.9-0.4,0.9-0.9v-3.7c0-0.5-0.4-0.9-0.9-0.9
                          h-0.9c-0.5,0-0.9,0.4-0.9,0.9L11.2,34.5L11.2,34.5z M42,26.1v-1.9c0-0.5-0.4-0.9-0.9-0.9h-0.9c-0.5,0-0.9,0.4-0.9,0.9v6.5
                          c0,0.5,0.4,0.9,0.9,0.9h0.9c0.5,0,0.9-0.4,0.9-0.9V26.1L42,26.1z M49.5,39.2v-0.9c0-0.5-0.4-0.9-0.9-0.9h-2.8
                          c-0.5,0-0.9-0.4-0.9-0.9v-3.7c0-0.5-0.4-0.9-0.9-0.9h-0.9c-0.5,0-0.9,0.4-0.9,0.9v3.7c0,0.5,0.4,0.9,0.9,0.9c0.5,0,0.9,0.4,0.9,0.9
                          v6.5c0,0.5-0.4,0.9-0.9,0.9h-3.7c-0.5,0-0.9,0.4-0.9,0.9v0.9c0,0.5,0.4,0.9,0.9,0.9h3.7c0.5,0,0.9,0.4,0.9,0.9V56
                          c0,0.5,0.4,0.9,0.9,0.9h0.9c0.5,0,0.9-0.4,0.9-0.9v-9.3c0-0.5,0.4-0.9,0.9-0.9h0.9c0.5,0,0.9-0.4,0.9-0.9v-0.9
                          c0-0.5-0.4-0.9-0.9-0.9h-0.9c-0.5,0-0.9-0.4-0.9-0.9v-0.9c0-0.5,0.4-0.9,0.9-0.9h0.9C49,40.1,49.5,39.7,49.5,39.2L49.5,39.2z"/>
                      </g>
                    </svg>
                  </div>
                  <p class="empty-item__caption">More demos coming<br>soon...</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Block - Demo List End -->

    </div>
  </div>
  <!-- Section - Demo List End -->

  <!-- Section - Marquee Text One Line Start -->
  <div class="mxd-section padding-mtext-pre-grid">
    <div class="mxd-container fullwidth-container">

      <!-- Block - Marquee Text One Line Start -->
      <div class="mxd-block">
        <div class="marquee marquee-left--gsap muted-extra">
          <div class="marquee__toleft">
            <!-- single item -->
            <div class="marquee__item one-line item-regular text">
              <p class="marquee__text">Designer</p>
              <div class="marquee__image">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="currentColor">
                  <path fill="currentColor" d="M78.4,38.4c0,0-11.8,0-15.8,0c-1.6,0-4.8-0.2-7.1-0.8c-2.3-0.6-4.3-0.8-6.3-2.4c-2-1.2-3.5-3.2-4.7-4.8
                    c-1.2-1.6-1.6-3.6-2-5.5c-0.3-1.5-0.7-4.3-0.8-5.9c-0.2-4.3,0-17.4,0-17.4C41.8,0.8,41,0,40.2,0s-1.6,0.8-1.6,1.6c0,0,0,13.1,0,17.4
                    c0,1.6-0.6,4.3-0.8,5.9c-0.3,2-0.8,4-2,5.5c-1.2,2-2.8,3.6-4.7,4.8s-4,1.8-6.3,2.4c-1.9,0.5-4.7,0.6-6.7,0.8c-3.9,0.4-16.6,0-16.6,0
                    C0.8,38.4,0,39.2,0,40c0,0.8,0.8,1.6,1.6,1.6c0,0,12.2,0,16.6,0c1.6,0,4.8,0.3,6.7,0.8c2.3,0.6,4.3,0.8,6.3,2.4
                    c1.6,1.2,3.2,2.8,4.3,4.4c1.2,2,2.1,3.9,2.4,6.3c0.2,1.7,0.7,4.7,0.8,6.7c0.2,4,0,16.2,0,16.2c0,0.8,0.8,1.6,1.6,1.6
                    s1.6-0.8,1.6-1.6c0,0,0-12.3,0-16.2c0-1.6,0.5-5.1,0.8-6.7c0.5-2.3,0.8-4.4,2.4-6.3c1.2-1.6,2.8-3.2,4.3-4.4c2-1.2,3.9-2,6.3-2.4
                    c1.8-0.3,5.1-0.7,7.1-0.8c3.5-0.2,15.8,0,15.8,0c0.8,0,1.6-0.8,1.6-1.6C80,39.2,79.2,38.4,78.4,38.4C78.4,38.4,78.4,38.4,78.4,38.4z
                    "/>
                </svg>
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item one-line item-regular text">
              <p class="marquee__text">Developer</p>
              <div class="marquee__image">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="currentColor">
                  <path fill="currentColor" d="M78.4,38.4c0,0-11.8,0-15.8,0c-1.6,0-4.8-0.2-7.1-0.8c-2.3-0.6-4.3-0.8-6.3-2.4c-2-1.2-3.5-3.2-4.7-4.8
                    c-1.2-1.6-1.6-3.6-2-5.5c-0.3-1.5-0.7-4.3-0.8-5.9c-0.2-4.3,0-17.4,0-17.4C41.8,0.8,41,0,40.2,0s-1.6,0.8-1.6,1.6c0,0,0,13.1,0,17.4
                    c0,1.6-0.6,4.3-0.8,5.9c-0.3,2-0.8,4-2,5.5c-1.2,2-2.8,3.6-4.7,4.8s-4,1.8-6.3,2.4c-1.9,0.5-4.7,0.6-6.7,0.8c-3.9,0.4-16.6,0-16.6,0
                    C0.8,38.4,0,39.2,0,40c0,0.8,0.8,1.6,1.6,1.6c0,0,12.2,0,16.6,0c1.6,0,4.8,0.3,6.7,0.8c2.3,0.6,4.3,0.8,6.3,2.4
                    c1.6,1.2,3.2,2.8,4.3,4.4c1.2,2,2.1,3.9,2.4,6.3c0.2,1.7,0.7,4.7,0.8,6.7c0.2,4,0,16.2,0,16.2c0,0.8,0.8,1.6,1.6,1.6
                    s1.6-0.8,1.6-1.6c0,0,0-12.3,0-16.2c0-1.6,0.5-5.1,0.8-6.7c0.5-2.3,0.8-4.4,2.4-6.3c1.2-1.6,2.8-3.2,4.3-4.4c2-1.2,3.9-2,6.3-2.4
                    c1.8-0.3,5.1-0.7,7.1-0.8c3.5-0.2,15.8,0,15.8,0c0.8,0,1.6-0.8,1.6-1.6C80,39.2,79.2,38.4,78.4,38.4C78.4,38.4,78.4,38.4,78.4,38.4z
                    "/>
                </svg>
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item one-line item-regular text">
              <p class="marquee__text">Freelancer</p>
              <div class="marquee__image">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="currentColor">
                  <path fill="currentColor" d="M78.4,38.4c0,0-11.8,0-15.8,0c-1.6,0-4.8-0.2-7.1-0.8c-2.3-0.6-4.3-0.8-6.3-2.4c-2-1.2-3.5-3.2-4.7-4.8
                    c-1.2-1.6-1.6-3.6-2-5.5c-0.3-1.5-0.7-4.3-0.8-5.9c-0.2-4.3,0-17.4,0-17.4C41.8,0.8,41,0,40.2,0s-1.6,0.8-1.6,1.6c0,0,0,13.1,0,17.4
                    c0,1.6-0.6,4.3-0.8,5.9c-0.3,2-0.8,4-2,5.5c-1.2,2-2.8,3.6-4.7,4.8s-4,1.8-6.3,2.4c-1.9,0.5-4.7,0.6-6.7,0.8c-3.9,0.4-16.6,0-16.6,0
                    C0.8,38.4,0,39.2,0,40c0,0.8,0.8,1.6,1.6,1.6c0,0,12.2,0,16.6,0c1.6,0,4.8,0.3,6.7,0.8c2.3,0.6,4.3,0.8,6.3,2.4
                    c1.6,1.2,3.2,2.8,4.3,4.4c1.2,2,2.1,3.9,2.4,6.3c0.2,1.7,0.7,4.7,0.8,6.7c0.2,4,0,16.2,0,16.2c0,0.8,0.8,1.6,1.6,1.6
                    s1.6-0.8,1.6-1.6c0,0,0-12.3,0-16.2c0-1.6,0.5-5.1,0.8-6.7c0.5-2.3,0.8-4.4,2.4-6.3c1.2-1.6,2.8-3.2,4.3-4.4c2-1.2,3.9-2,6.3-2.4
                    c1.8-0.3,5.1-0.7,7.1-0.8c3.5-0.2,15.8,0,15.8,0c0.8,0,1.6-0.8,1.6-1.6C80,39.2,79.2,38.4,78.4,38.4C78.4,38.4,78.4,38.4,78.4,38.4z
                    "/>
                </svg>
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item one-line item-regular text">
              <p class="marquee__text">Digital Agency</p>
              <div class="marquee__image">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="currentColor">
                  <path fill="currentColor" d="M78.4,38.4c0,0-11.8,0-15.8,0c-1.6,0-4.8-0.2-7.1-0.8c-2.3-0.6-4.3-0.8-6.3-2.4c-2-1.2-3.5-3.2-4.7-4.8
                    c-1.2-1.6-1.6-3.6-2-5.5c-0.3-1.5-0.7-4.3-0.8-5.9c-0.2-4.3,0-17.4,0-17.4C41.8,0.8,41,0,40.2,0s-1.6,0.8-1.6,1.6c0,0,0,13.1,0,17.4
                    c0,1.6-0.6,4.3-0.8,5.9c-0.3,2-0.8,4-2,5.5c-1.2,2-2.8,3.6-4.7,4.8s-4,1.8-6.3,2.4c-1.9,0.5-4.7,0.6-6.7,0.8c-3.9,0.4-16.6,0-16.6,0
                    C0.8,38.4,0,39.2,0,40c0,0.8,0.8,1.6,1.6,1.6c0,0,12.2,0,16.6,0c1.6,0,4.8,0.3,6.7,0.8c2.3,0.6,4.3,0.8,6.3,2.4
                    c1.6,1.2,3.2,2.8,4.3,4.4c1.2,2,2.1,3.9,2.4,6.3c0.2,1.7,0.7,4.7,0.8,6.7c0.2,4,0,16.2,0,16.2c0,0.8,0.8,1.6,1.6,1.6
                    s1.6-0.8,1.6-1.6c0,0,0-12.3,0-16.2c0-1.6,0.5-5.1,0.8-6.7c0.5-2.3,0.8-4.4,2.4-6.3c1.2-1.6,2.8-3.2,4.3-4.4c2-1.2,3.9-2,6.3-2.4
                    c1.8-0.3,5.1-0.7,7.1-0.8c3.5-0.2,15.8,0,15.8,0c0.8,0,1.6-0.8,1.6-1.6C80,39.2,79.2,38.4,78.4,38.4C78.4,38.4,78.4,38.4,78.4,38.4z
                    "/>
                </svg>
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item one-line item-regular text">
              <p class="marquee__text">Creative Studio</p>
              <div class="marquee__image">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="currentColor">
                  <path fill="currentColor" d="M78.4,38.4c0,0-11.8,0-15.8,0c-1.6,0-4.8-0.2-7.1-0.8c-2.3-0.6-4.3-0.8-6.3-2.4c-2-1.2-3.5-3.2-4.7-4.8
                    c-1.2-1.6-1.6-3.6-2-5.5c-0.3-1.5-0.7-4.3-0.8-5.9c-0.2-4.3,0-17.4,0-17.4C41.8,0.8,41,0,40.2,0s-1.6,0.8-1.6,1.6c0,0,0,13.1,0,17.4
                    c0,1.6-0.6,4.3-0.8,5.9c-0.3,2-0.8,4-2,5.5c-1.2,2-2.8,3.6-4.7,4.8s-4,1.8-6.3,2.4c-1.9,0.5-4.7,0.6-6.7,0.8c-3.9,0.4-16.6,0-16.6,0
                    C0.8,38.4,0,39.2,0,40c0,0.8,0.8,1.6,1.6,1.6c0,0,12.2,0,16.6,0c1.6,0,4.8,0.3,6.7,0.8c2.3,0.6,4.3,0.8,6.3,2.4
                    c1.6,1.2,3.2,2.8,4.3,4.4c1.2,2,2.1,3.9,2.4,6.3c0.2,1.7,0.7,4.7,0.8,6.7c0.2,4,0,16.2,0,16.2c0,0.8,0.8,1.6,1.6,1.6
                    s1.6-0.8,1.6-1.6c0,0,0-12.3,0-16.2c0-1.6,0.5-5.1,0.8-6.7c0.5-2.3,0.8-4.4,2.4-6.3c1.2-1.6,2.8-3.2,4.3-4.4c2-1.2,3.9-2,6.3-2.4
                    c1.8-0.3,5.1-0.7,7.1-0.8c3.5-0.2,15.8,0,15.8,0c0.8,0,1.6-0.8,1.6-1.6C80,39.2,79.2,38.4,78.4,38.4C78.4,38.4,78.4,38.4,78.4,38.4z
                    "/>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Block - Marquee Text One Line End -->

    </div>
  </div>
  <!-- Section - Marquee Text One Line End -->

  <!-- Section - Demo Cards Start -->
  <div class="mxd-section">
    <div class="mxd-container">

      <!-- Block - Demo Cards Start -->
      <div class="mxd-block">
        <div class="mxd-demo-cards">
          <!-- blog card -->
          <div class="mxd-demo-cards__item card-item-left animate-card-2">
            <div class="mxd-demo-cards__content">
              <div class="mxd-demo-cards__descr">
                <h2 class="mxd-demo-cards__title h2-small">
                  <a href="blog-standard.html" target="_blank">Blog Pages</a>
                </h2>
                <div class="mxd-demo-cards__tags">
                  <span class="tag tag-default tag-outline">Ideas</span>
                  <span class="tag tag-default tag-outline">Thoughts</span>
                  <span class="tag tag-default tag-outline">Inspiration</span>
                </div>
                <p>A blog that looks good, reads better, and brings your stories to life beautifully.</p>
              </div>
            </div>
            <div class="mxd-demo-cards__image card-image-fullwidth">
              <img src="img/demo/02_card-img.webp" alt="Demo Card Image">
            </div>
          </div>
          <!-- portfolio card -->
          <div class="mxd-demo-cards__item card-item-right animate-card-2">
            <div class="mxd-demo-card__gradient">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 1200">
                <style type="text/css">
                  .mxd-card-bg{fill:url(#purple-radial-gr);}
                </style>
                <g>
                  <radialGradient id="purple-radial-gr" cx="600" cy="600" r="600" gradientUnits="userSpaceOnUse">
                    <stop  offset="0" style="stop-color:#9F8BE7;stop-opacity:0.6"/>
                    <stop  offset="1" style="stop-color:#9F8BE7;stop-opacity:0"/>
                  </radialGradient>
                  <circle class="mxd-card-bg" cx="600" cy="600" r="600"/>
                </g>
              </svg>
            </div>
            <div class="mxd-demo-cards__image card-image-padding">
              <img src="img/demo/01_card-img.webp" alt="Demo Card Image">
            </div>
            <div class="mxd-demo-cards__content">
              <div class="mxd-demo-cards__descr">
                <h2 class="mxd-demo-cards__title h2-small">
                  <a href="works-simple.html" target="_blank">Portfolio</a>
                </h2>
                <div class="mxd-demo-cards__tags">
                  <span class="tag tag-default tag-outline">Showcase</span>
                  <span class="tag tag-default tag-outline">Visions</span>
                  <span class="tag tag-default tag-outline">Designs</span>
                </div>
                <p>Bring your work to life with stunning layouts. Clear, stylish pages built to impress 
                  and inspire.</p>
              </div>
              <div class="mxd-demo-cards__icons">
                <div class="demo-icons__item">
                  <div class="demo-icons__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 56 56">
                      <path d="M54.8,28c0,10.6-2.8,26.8-26.8,26.8S1.2,38.6,1.2,28,4,1.2,28,1.2s26.8,16.2,26.8,26.8Z"/>
                    </svg>
                    <i class="ph ph-cards-three"></i>
                  </div>
                  <p class="demo-icons__caption">Stack cards</p>
                </div>
                <div class="demo-icons__item">
                  <div class="demo-icons__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 56 56">
                      <path d="M54.8,28c0,10.6-2.8,26.8-26.8,26.8S1.2,38.6,1.2,28,4,1.2,28,1.2s26.8,16.2,26.8,26.8Z"/>
                    </svg>
                    <i class="ph ph-squares-four"></i>
                  </div>
                  <p class="demo-icons__caption">Grids</p>
                </div>
                <div class="demo-icons__item">
                  <div class="demo-icons__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 56 56">
                      <path d="M54.8,28c0,10.6-2.8,26.8-26.8,26.8S1.2,38.6,1.2,28,4,1.2,28,1.2s26.8,16.2,26.8,26.8Z"/>
                    </svg>
                    <i class="ph ph-list-star"></i>
                  </div>
                  <p class="demo-icons__caption">Archive list</p>
                </div>
                <div class="demo-icons__item">
                  <div class="demo-icons__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 56 56">
                      <path d="M54.8,28c0,10.6-2.8,26.8-26.8,26.8S1.2,38.6,1.2,28,4,1.2,28,1.2s26.8,16.2,26.8,26.8Z"/>
                    </svg>
                    <i class="ph ph-chat-circle-dots"></i>
                  </div>
                  <p class="demo-icons__caption">Testimonials</p>
                </div>
                <div class="demo-icons__item">
                  <div class="demo-icons__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 56 56">
                      <path d="M54.8,28c0,10.6-2.8,26.8-26.8,26.8S1.2,38.6,1.2,28,4,1.2,28,1.2s26.8,16.2,26.8,26.8Z"/>
                    </svg>
                    <i class="ph ph-cherries"></i>
                  </div>
                  <p class="demo-icons__caption">Project</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Block - Demo Cards End -->

    </div>
  </div>
  <!-- Section - Demo Cards End -->

  <!-- Section - Responsive Promo Start -->
  <div class="mxd-section">
    <div class="mxd-container no-padding-container">

      <!-- Block - Responsive Promo Start -->
      <div class="mxd-block">
        <div class="mxd-resp-promo">
          <div class="container-fluid p-0">
            <div class="row g-0">
              <!-- left side -->
              <div class="col-12 col-xl-6 mxd-resp-promo__item">
                <div class="mxd-container grid-container">
                  <div class="mxd-block mxd-grid-item no-margin">
                    <div class="mxd-resp-promo__content">
                      <div class="mxd-resp-promo__manifest anim-uni-in-up">
                        <p class="reveal-type">Fully responsive and pixel-perfect Rayo looks 
                          great on any device. Your site stays stunning and functional everywhere.</p>
                      </div>
                      <div class="mxd-demo-cards__icons justify-start-desktop">
                        <div class="demo-icons__item animate-card-4">
                          <div class="demo-icons__icon transparent">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 56 56">
                              <path d="M54.8,28c0,10.6-2.8,26.8-26.8,26.8S1.2,38.6,1.2,28,4,1.2,28,1.2s26.8,16.2,26.8,26.8Z"/>
                            </svg>
                            <i class="ph ph-device-mobile-camera"></i>
                          </div>
                          <p class="demo-icons__caption">Smartphone</p>
                        </div>
                        <div class="demo-icons__item animate-card-4">
                          <div class="demo-icons__icon transparent">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 56 56">
                              <path d="M54.8,28c0,10.6-2.8,26.8-26.8,26.8S1.2,38.6,1.2,28,4,1.2,28,1.2s26.8,16.2,26.8,26.8Z"/>
                            </svg>
                            <i class="ph ph-device-tablet-camera"></i>
                          </div>
                          <p class="demo-icons__caption">Tablet</p>
                        </div>
                        <div class="demo-icons__item animate-card-4">
                          <div class="demo-icons__icon transparent">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 56 56">
                              <path d="M54.8,28c0,10.6-2.8,26.8-26.8,26.8S1.2,38.6,1.2,28,4,1.2,28,1.2s26.8,16.2,26.8,26.8Z"/>
                            </svg>
                            <i class="ph ph-laptop"></i>
                          </div>
                          <p class="demo-icons__caption">Laptop</p>
                        </div>
                        <div class="demo-icons__item animate-card-4">
                          <div class="demo-icons__icon transparent">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 56 56">
                              <path d="M54.8,28c0,10.6-2.8,26.8-26.8,26.8S1.2,38.6,1.2,28,4,1.2,28,1.2s26.8,16.2,26.8,26.8Z"/>
                            </svg>
                            <i class="ph ph-desktop"></i>
                          </div>
                          <p class="demo-icons__caption">Desktop</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- right side (media) -->
              <div class="col-12 col-xl-6 mxd-resp-promo__item">
                <div class="mxd-resp-promo__image anim-uni-in-up">
                  <img src="img/demo/01_resp-img.webp" alt="Rayo Image">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Block - Responsive Promo End -->

    </div>
  </div>
  <!-- Section - Responsive Promo End -->

  <!-- Section - Marquee Text One Line Start -->
  <div class="mxd-section padding-mtext-pre-grid">
    <div class="mxd-container fullwidth-container">

      <!-- Block - Marquee Text One Line Start -->
      <div class="mxd-block">
        <div class="marquee marquee-left--gsap muted-extra">
          <div class="marquee__toleft">
            <!-- single item -->
            <div class="marquee__item one-line item-regular text">
              <p class="marquee__text">Inner Pages</p>
              <div class="marquee__image">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="currentColor">
                  <path fill="currentColor" d="M78.4,38.4c0,0-11.8,0-15.8,0c-1.6,0-4.8-0.2-7.1-0.8c-2.3-0.6-4.3-0.8-6.3-2.4c-2-1.2-3.5-3.2-4.7-4.8
                    c-1.2-1.6-1.6-3.6-2-5.5c-0.3-1.5-0.7-4.3-0.8-5.9c-0.2-4.3,0-17.4,0-17.4C41.8,0.8,41,0,40.2,0s-1.6,0.8-1.6,1.6c0,0,0,13.1,0,17.4
                    c0,1.6-0.6,4.3-0.8,5.9c-0.3,2-0.8,4-2,5.5c-1.2,2-2.8,3.6-4.7,4.8s-4,1.8-6.3,2.4c-1.9,0.5-4.7,0.6-6.7,0.8c-3.9,0.4-16.6,0-16.6,0
                    C0.8,38.4,0,39.2,0,40c0,0.8,0.8,1.6,1.6,1.6c0,0,12.2,0,16.6,0c1.6,0,4.8,0.3,6.7,0.8c2.3,0.6,4.3,0.8,6.3,2.4
                    c1.6,1.2,3.2,2.8,4.3,4.4c1.2,2,2.1,3.9,2.4,6.3c0.2,1.7,0.7,4.7,0.8,6.7c0.2,4,0,16.2,0,16.2c0,0.8,0.8,1.6,1.6,1.6
                    s1.6-0.8,1.6-1.6c0,0,0-12.3,0-16.2c0-1.6,0.5-5.1,0.8-6.7c0.5-2.3,0.8-4.4,2.4-6.3c1.2-1.6,2.8-3.2,4.3-4.4c2-1.2,3.9-2,6.3-2.4
                    c1.8-0.3,5.1-0.7,7.1-0.8c3.5-0.2,15.8,0,15.8,0c0.8,0,1.6-0.8,1.6-1.6C80,39.2,79.2,38.4,78.4,38.4C78.4,38.4,78.4,38.4,78.4,38.4z
                    "/>
                </svg>
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item one-line item-regular text">
              <p class="marquee__text">Inner Pages</p>
              <div class="marquee__image">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="currentColor">
                  <path fill="currentColor" d="M78.4,38.4c0,0-11.8,0-15.8,0c-1.6,0-4.8-0.2-7.1-0.8c-2.3-0.6-4.3-0.8-6.3-2.4c-2-1.2-3.5-3.2-4.7-4.8
                    c-1.2-1.6-1.6-3.6-2-5.5c-0.3-1.5-0.7-4.3-0.8-5.9c-0.2-4.3,0-17.4,0-17.4C41.8,0.8,41,0,40.2,0s-1.6,0.8-1.6,1.6c0,0,0,13.1,0,17.4
                    c0,1.6-0.6,4.3-0.8,5.9c-0.3,2-0.8,4-2,5.5c-1.2,2-2.8,3.6-4.7,4.8s-4,1.8-6.3,2.4c-1.9,0.5-4.7,0.6-6.7,0.8c-3.9,0.4-16.6,0-16.6,0
                    C0.8,38.4,0,39.2,0,40c0,0.8,0.8,1.6,1.6,1.6c0,0,12.2,0,16.6,0c1.6,0,4.8,0.3,6.7,0.8c2.3,0.6,4.3,0.8,6.3,2.4
                    c1.6,1.2,3.2,2.8,4.3,4.4c1.2,2,2.1,3.9,2.4,6.3c0.2,1.7,0.7,4.7,0.8,6.7c0.2,4,0,16.2,0,16.2c0,0.8,0.8,1.6,1.6,1.6
                    s1.6-0.8,1.6-1.6c0,0,0-12.3,0-16.2c0-1.6,0.5-5.1,0.8-6.7c0.5-2.3,0.8-4.4,2.4-6.3c1.2-1.6,2.8-3.2,4.3-4.4c2-1.2,3.9-2,6.3-2.4
                    c1.8-0.3,5.1-0.7,7.1-0.8c3.5-0.2,15.8,0,15.8,0c0.8,0,1.6-0.8,1.6-1.6C80,39.2,79.2,38.4,78.4,38.4C78.4,38.4,78.4,38.4,78.4,38.4z
                    "/>
                </svg>
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item one-line item-regular text">
              <p class="marquee__text">Inner Pages</p>
              <div class="marquee__image">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="currentColor">
                  <path fill="currentColor" d="M78.4,38.4c0,0-11.8,0-15.8,0c-1.6,0-4.8-0.2-7.1-0.8c-2.3-0.6-4.3-0.8-6.3-2.4c-2-1.2-3.5-3.2-4.7-4.8
                    c-1.2-1.6-1.6-3.6-2-5.5c-0.3-1.5-0.7-4.3-0.8-5.9c-0.2-4.3,0-17.4,0-17.4C41.8,0.8,41,0,40.2,0s-1.6,0.8-1.6,1.6c0,0,0,13.1,0,17.4
                    c0,1.6-0.6,4.3-0.8,5.9c-0.3,2-0.8,4-2,5.5c-1.2,2-2.8,3.6-4.7,4.8s-4,1.8-6.3,2.4c-1.9,0.5-4.7,0.6-6.7,0.8c-3.9,0.4-16.6,0-16.6,0
                    C0.8,38.4,0,39.2,0,40c0,0.8,0.8,1.6,1.6,1.6c0,0,12.2,0,16.6,0c1.6,0,4.8,0.3,6.7,0.8c2.3,0.6,4.3,0.8,6.3,2.4
                    c1.6,1.2,3.2,2.8,4.3,4.4c1.2,2,2.1,3.9,2.4,6.3c0.2,1.7,0.7,4.7,0.8,6.7c0.2,4,0,16.2,0,16.2c0,0.8,0.8,1.6,1.6,1.6
                    s1.6-0.8,1.6-1.6c0,0,0-12.3,0-16.2c0-1.6,0.5-5.1,0.8-6.7c0.5-2.3,0.8-4.4,2.4-6.3c1.2-1.6,2.8-3.2,4.3-4.4c2-1.2,3.9-2,6.3-2.4
                    c1.8-0.3,5.1-0.7,7.1-0.8c3.5-0.2,15.8,0,15.8,0c0.8,0,1.6-0.8,1.6-1.6C80,39.2,79.2,38.4,78.4,38.4C78.4,38.4,78.4,38.4,78.4,38.4z
                    "/>
                </svg>
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item one-line item-regular text">
              <p class="marquee__text">Inner Pages</p>
              <div class="marquee__image">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="currentColor">
                  <path fill="currentColor" d="M78.4,38.4c0,0-11.8,0-15.8,0c-1.6,0-4.8-0.2-7.1-0.8c-2.3-0.6-4.3-0.8-6.3-2.4c-2-1.2-3.5-3.2-4.7-4.8
                    c-1.2-1.6-1.6-3.6-2-5.5c-0.3-1.5-0.7-4.3-0.8-5.9c-0.2-4.3,0-17.4,0-17.4C41.8,0.8,41,0,40.2,0s-1.6,0.8-1.6,1.6c0,0,0,13.1,0,17.4
                    c0,1.6-0.6,4.3-0.8,5.9c-0.3,2-0.8,4-2,5.5c-1.2,2-2.8,3.6-4.7,4.8s-4,1.8-6.3,2.4c-1.9,0.5-4.7,0.6-6.7,0.8c-3.9,0.4-16.6,0-16.6,0
                    C0.8,38.4,0,39.2,0,40c0,0.8,0.8,1.6,1.6,1.6c0,0,12.2,0,16.6,0c1.6,0,4.8,0.3,6.7,0.8c2.3,0.6,4.3,0.8,6.3,2.4
                    c1.6,1.2,3.2,2.8,4.3,4.4c1.2,2,2.1,3.9,2.4,6.3c0.2,1.7,0.7,4.7,0.8,6.7c0.2,4,0,16.2,0,16.2c0,0.8,0.8,1.6,1.6,1.6
                    s1.6-0.8,1.6-1.6c0,0,0-12.3,0-16.2c0-1.6,0.5-5.1,0.8-6.7c0.5-2.3,0.8-4.4,2.4-6.3c1.2-1.6,2.8-3.2,4.3-4.4c2-1.2,3.9-2,6.3-2.4
                    c1.8-0.3,5.1-0.7,7.1-0.8c3.5-0.2,15.8,0,15.8,0c0.8,0,1.6-0.8,1.6-1.6C80,39.2,79.2,38.4,78.4,38.4C78.4,38.4,78.4,38.4,78.4,38.4z
                    "/>
                </svg>
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item one-line item-regular text">
              <p class="marquee__text">Inner Pages</p>
              <div class="marquee__image">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" fill="currentColor">
                  <path fill="currentColor" d="M78.4,38.4c0,0-11.8,0-15.8,0c-1.6,0-4.8-0.2-7.1-0.8c-2.3-0.6-4.3-0.8-6.3-2.4c-2-1.2-3.5-3.2-4.7-4.8
                    c-1.2-1.6-1.6-3.6-2-5.5c-0.3-1.5-0.7-4.3-0.8-5.9c-0.2-4.3,0-17.4,0-17.4C41.8,0.8,41,0,40.2,0s-1.6,0.8-1.6,1.6c0,0,0,13.1,0,17.4
                    c0,1.6-0.6,4.3-0.8,5.9c-0.3,2-0.8,4-2,5.5c-1.2,2-2.8,3.6-4.7,4.8s-4,1.8-6.3,2.4c-1.9,0.5-4.7,0.6-6.7,0.8c-3.9,0.4-16.6,0-16.6,0
                    C0.8,38.4,0,39.2,0,40c0,0.8,0.8,1.6,1.6,1.6c0,0,12.2,0,16.6,0c1.6,0,4.8,0.3,6.7,0.8c2.3,0.6,4.3,0.8,6.3,2.4
                    c1.6,1.2,3.2,2.8,4.3,4.4c1.2,2,2.1,3.9,2.4,6.3c0.2,1.7,0.7,4.7,0.8,6.7c0.2,4,0,16.2,0,16.2c0,0.8,0.8,1.6,1.6,1.6
                    s1.6-0.8,1.6-1.6c0,0,0-12.3,0-16.2c0-1.6,0.5-5.1,0.8-6.7c0.5-2.3,0.8-4.4,2.4-6.3c1.2-1.6,2.8-3.2,4.3-4.4c2-1.2,3.9-2,6.3-2.4
                    c1.8-0.3,5.1-0.7,7.1-0.8c3.5-0.2,15.8,0,15.8,0c0.8,0,1.6-0.8,1.6-1.6C80,39.2,79.2,38.4,78.4,38.4C78.4,38.4,78.4,38.4,78.4,38.4z
                    "/>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Block - Marquee Text One Line End -->

    </div>
  </div>
  <!-- Section - Marquee Text One Line End -->

  <!-- Section - Inner Pages Slider Start -->
  <div class="mxd-section padding-pre-grid">
    <div class="mxd-container">

      <!-- Block - Inner Pages Slider Start -->
      <div class="mxd-block">
        <!-- Slider main container -->
        <div class="mxd-demo-swiper mxd-grid-item anim-uni-in-up">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- single slide -->
            <div class="swiper-slide mxd-demo-swiper__slide">
              <a class="demo-swiper-slide__image" href="services.html" target="_blank">
                <img src="img/demo/inner/03_services.webp" alt="Rayo Image">
              </a>
              <div class="demo-swiper-slide__descr">
                <a href="services.html" data-swiper-parallax-opacity="0" data-swiper-parallax-y="-30">
                  <span>Services</span>
                </a>
              </div>
            </div>
            <!-- single slide -->
            <div class="swiper-slide mxd-demo-swiper__slide">
              <a class="demo-swiper-slide__image" href="team.html" target="_blank">
                <img src="img/demo/inner/04_team.webp" alt="Rayo Image">
              </a>
              <div class="demo-swiper-slide__descr">
                <a href="team.html" data-swiper-parallax-opacity="0" data-swiper-parallax-y="-30">
                  <span>Our Team</span>
                </a>
              </div>
            </div>
            <!-- single slide -->
            <div class="swiper-slide mxd-demo-swiper__slide">
              <a class="demo-swiper-slide__image" href="pricing.html" target="_blank">
                <img src="img/demo/inner/05_pricing.webp" alt="Rayo Image">
              </a>
              <div class="demo-swiper-slide__descr">
                <a href="pricing.html" data-swiper-parallax-opacity="0" data-swiper-parallax-y="-30">
                  <span>Pricing Plans</span>
                </a>
              </div>
            </div>
            <!-- single slide -->
            <div class="swiper-slide mxd-demo-swiper__slide">
              <a class="demo-swiper-slide__image" href="about-me.html" target="_blank">
                <img src="img/demo/inner/01_about-me.webp" alt="Rayo Image">
              </a>
              <div class="demo-swiper-slide__descr">
                <a href="about-me.html" data-swiper-parallax-opacity="0" data-swiper-parallax-y="-30">
                  <span>About Me</span>
                </a>
              </div>
            </div>
            <!-- single slide -->
            <div class="swiper-slide mxd-demo-swiper__slide">
              <a class="demo-swiper-slide__image" href="about-us.html" target="_blank">
                <img src="img/demo/inner/02_about-us.webp" alt="Rayo Image">
              </a>
              <div class="demo-swiper-slide__descr">
                <a href="about-us.html" data-swiper-parallax-opacity="0" data-swiper-parallax-y="-30">
                  <span>About Us</span>
                </a>
              </div>
            </div>
            <!-- single slide -->
            <div class="swiper-slide mxd-demo-swiper__slide">
              <a class="demo-swiper-slide__image" href="404.html" target="_blank">
                <img src="img/demo/inner/08_404.webp" alt="Rayo Image">
              </a>
              <div class="demo-swiper-slide__descr">
                <a href="404.html" data-swiper-parallax-opacity="0" data-swiper-parallax-y="-30">
                  <span>404 Error</span>
                </a>
              </div>
            </div>
            <!-- single slide -->
            <div class="swiper-slide mxd-demo-swiper__slide">
              <a class="demo-swiper-slide__image" href="faq.html" target="_blank">
                <img src="img/demo/inner/06_faq.webp" alt="Rayo Image">
              </a>
              <div class="demo-swiper-slide__descr">
                <a href="faq.html" data-swiper-parallax-opacity="0" data-swiper-parallax-y="-30">
                  <span>FAQ Page</span>
                </a>
              </div>
            </div>
            <!-- single slide -->
            <div class="swiper-slide mxd-demo-swiper__slide">
              <a class="demo-swiper-slide__image" target="_blank">
                <img src="img/demo/inner/07_contact.webp" alt="Rayo Image">
              </a>
              <div class="demo-swiper-slide__descr">
                <a data-swiper-parallax-opacity="0" data-swiper-parallax-y="-30">
                  <span>Contact</span>
                </a>
              </div>
            </div>
          </div>
          <!-- navigation buttons -->
          <div class="swiper-button-prev mxd-slider-btn mxd-slider-btn-round-prev v2">
            <a class="btn btn-round btn-round-small btn-outline slide-left anim-no-delay" href="#0">
              <i class="ph ph-arrow-left"></i>
            </a> 
          </div>
          <div class="swiper-button-next mxd-slider-btn mxd-slider-btn-round-next v2">
            <a class="btn btn-round btn-round-small btn-outline slide-right anim-no-delay" href="#0">
              <i class="ph ph-arrow-right"></i>
            </a> 
          </div>
        </div>
      </div>
      <!-- Block - Inner Pages Slider End -->
      
    </div>
  </div>
  <!-- Section - Inner Pages Slider End -->

  <!-- Section - Components Start -->
  <div class="mxd-section">
    <div class="mxd-container fullwidth-container">

      <!-- Block - Components Start -->
      <div class="mxd-block">
        <!-- marquee top to left -->
        <div class="marquee marquee-left--gsap muted-extra">
          <div class="marquee__toleft">
            <!-- single item -->
            <div class="marquee__item overflow-visible one-line item-regular text">
              <div class="marquee__component">
                <img src="img/demo/components/sec-01.webp" alt="Rayo Image">
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item overflow-visible one-line item-regular text">
              <div class="marquee__component">
                <img src="img/demo/components/sec-02.webp" alt="Rayo Image">
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item overflow-visible one-line item-regular text">
              <div class="marquee__component">
                <img src="img/demo/components/sec-03.webp" alt="Rayo Image">
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item overflow-visible one-line item-regular text">
              <div class="marquee__component">
                <img src="img/demo/components/sec-04.webp" alt="Rayo Image">
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item overflow-visible one-line item-regular text">
              <div class="marquee__component">
                <img src="img/demo/components/sec-05.webp" alt="Rayo Image">
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item overflow-visible one-line item-regular text">
              <div class="marquee__component">
                <img src="img/demo/components/sec-06.webp" alt="Rayo Image">
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item overflow-visible one-line item-regular text">
              <div class="marquee__component">
                <img src="img/demo/components/sec-07.webp" alt="Rayo Image">
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item overflow-visible one-line item-regular text">
              <div class="marquee__component">
                <img src="img/demo/components/sec-08.webp" alt="Rayo Image">
              </div>
            </div>
          </div>
        </div>
        <!-- block title -->
        <div class="mxd-container">
          <div class="mxd-demo-components">
            <div class="mxd-demo-components__objects">
              <div class="mxd-demo-components__object obj-01 anim-uni-in-up">
                <img class="mxd-move-slow" src="img/demo/01_comp-img.webp" alt="Rayo Image">
              </div>
              <div class="mxd-demo-components__object obj-02 anim-uni-in-up">
                <img class="mxd-rotate-slow" src="img/demo/01_comp-img.webp" alt="Rayo Image">
              </div>
              <div class="mxd-demo-components__object obj-03 anim-uni-in-up">
                <img class="mxd-move" src="img/demo/01_comp-img.webp" alt="Rayo Image">
              </div>
            </div>
            <div class="mxd-demo-components__title anim-uni-in-up">
              <span class="reveal-type">Functional<br>components</span>
            </div>
          </div>
        </div>
        <!-- marquee bottom to right -->
        <div class="marquee marquee-right--gsap muted-extra">
          <div class="marquee__toright">
            <!-- single item -->
            <div class="marquee__item overflow-visible one-line item-regular text">
              <div class="marquee__component">
                <img src="img/demo/components/sec-09.webp" alt="Rayo Image">
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item overflow-visible one-line item-regular text">
              <div class="marquee__component">
                <img src="img/demo/components/sec-10.webp" alt="Rayo Image">
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item overflow-visible one-line item-regular text">
              <div class="marquee__component">
                <img src="img/demo/components/sec-11.webp" alt="Rayo Image">
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item overflow-visible one-line item-regular text">
              <div class="marquee__component">
                <img src="img/demo/components/sec-04.webp" alt="Rayo Image">
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item overflow-visible one-line item-regular text">
              <div class="marquee__component">
                <img src="img/demo/components/sec-14.webp" alt="Rayo Image">
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item overflow-visible one-line item-regular text">
              <div class="marquee__component">
                <img src="img/demo/components/sec-06.webp" alt="Rayo Image">
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item overflow-visible one-line item-regular text">
              <div class="marquee__component">
                <img src="img/demo/components/sec-15.webp" alt="Rayo Image">
              </div>
            </div>
            <!-- single item -->
            <div class="marquee__item overflow-visible one-line item-regular text">
              <div class="marquee__component">
                <img src="img/demo/components/sec-08.webp" alt="Rayo Image">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Block - Components End -->

    </div>
  </div>
  <!-- Section - Components End -->

  <!-- Section - Features Promo Start -->
  <div class="mxd-section">
    <div class="mxd-container no-padding-container">

      <!-- Block - Features Promo Start -->
      <div class="mxd-block">
        <div class="mxd-features-promo">
          <div class="container-fluid p-0">
            <div class="row g-0">
              <!-- left side -->
              <div class="col-12 col-xl-5 mxd-features-promo__item">
                <div class="mxd-container grid-container no-padding-right">
                  <div class="mxd-block mxd-grid-item no-margin">
                    <div class="mxd-features-promo__content">
                      <h2 class="mxd-pinned__title centered-mobile h2-small anim-uni-in-up reveal-type">Top-notch features, build for you</h2>
                      <div class="mxd-pinned__tags centered-mobile anim-uni-in-up">
                        <span class="tag tag-default tag-outline">Animations</span>
                        <span class="tag tag-default tag-outline">Plugins</span>
                        <span class="tag tag-default tag-outline">Services</span>
                      </div>
                      <p class="anim-uni-in-up centered-mobile">Rayo template packed with smooth animations, modern design 
                        tools and clean code. It's a flexible, future-proof template that's easy to customize 
                        and a joy to use.</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- right side (media) -->
              <div class="col-12 col-xl-7 mxd-features-promo__item">
                <div class="mxd-features-promo__image anim-uni-in-up">
                  <img src="img/demo/01_fea-img.webp" alt="Rayo Image">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Block - Features Promo End -->

    </div>
  </div>
  <!-- Section - Features Promo End -->

  <!-- Section - Features Cards Start -->
  <div class="mxd-section overflow-hidden">
    <div class="mxd-container grid-container">

      <!-- Block - Features Cards Start -->
      <div class="mxd-block">
        <div class="mxd-features-cards">
          <div class="container-fluid px-0">
            <div class="row gx-0">
              <!-- item -->
              <div class="col-12 col-xl-8 mxd-features-cards__item features-item-01 mxd-grid-item anim-uni-scale-in-right">
                <div class="mxd-features-cards__inner justify-between bg-base-tint radius-l padding-4">
                  <div class="mxd-features-cards__gradient features-gradient-01">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 1200">
                      <style type="text/css">
                        .mxd-card-bg{fill:url(#purple-radial-grad);}
                      </style>
                      <g>
                        <radialGradient id="purple-radial-grad" cx="600" cy="600" r="600" gradientUnits="userSpaceOnUse">
                          <stop  offset="0" style="stop-color:#9F8BE7;stop-opacity:0.6"/>
                          <stop  offset="1" style="stop-color:#9F8BE7;stop-opacity:0"/>
                        </radialGradient>
                        <circle class="mxd-card-bg" cx="600" cy="600" r="600"/>
                      </g>
                    </svg>
                  </div>
                  <div class="mxd-features-cards__image features-image-01">
                    <img src="img/demo/02_fea-img.webp" alt="Rayo Illustration">
                  </div>
                  <div class="mxd-features-cards__title">
                    <h3 class="anim-uni-in-up">Dynamic & stylish design</h3>
                  </div>
                  <div class="mxd-features-cards__info">
                    <div class="mxd-features-cards__tags">
                      <span class="tag tag-default tag-outline anim-uni-in-up">Design</span>
                      <span class="tag tag-default tag-outline anim-uni-in-up">Layouts</span>
                      <span class="tag tag-default tag-outline anim-uni-in-up">Visuals</span>
                    </div>
                    <p class="anim-uni-in-up">Modern, eye-catching layouts crafted to make your brand stand 
                      out and keep visitors engaged.</p>
                  </div>
                </div>
              </div>
              <!-- item -->
              <div class="col-12 col-xl-4 mxd-features-cards__item mxd-grid-item anim-uni-scale-in-left">
                <div class="mxd-features-cards__inner justify-end bg-accent radius-l padding-4">
                  <div class="mxd-features-cards__image features-image-02">
                    <img src="img/demo/03_fea-img.webp" alt="Rayo Illustration">
                  </div>
                  <div class="mxd-features-cards__title">
                    <h3 class="opposite anim-uni-in-up">Dark / light<br>mode</h3>
                  </div>
                  <div class="mxd-features-cards__info">
                    <div class="mxd-features-cards__tags">
                      <span class="tag tag-default tag-outline-opposite anim-uni-in-up">Theme Choice</span>
                      <span class="tag tag-default tag-outline-opposite anim-uni-in-up">Interactive</span>
                    </div>
                    <p class="t-opposite anim-uni-in-up">Switch effortlessly between light and dark modes 
                      for a user-friendly experience.</p>
                  </div>
                </div>
              </div>
              <!-- item -->
              <div class="col-12 col-xl-4 mxd-features-cards__item mxd-grid-item anim-uni-scale-in-right">
                <div class="mxd-features-cards__inner bg-additional radius-l padding-4">
                  <div class="mxd-features-cards__title">
                    <h3 class="anim-uni-in-up">Easy to customize</h3>
                  </div>
                  <div class="mxd-features-cards__info">
                    <div class="mxd-features-cards__tags">
                      <span class="tag tag-default tag-outline anim-uni-in-up">Flexible</span>
                      <span class="tag tag-default tag-outline anim-uni-in-up">Fast</span>
                      <span class="tag tag-default tag-outline anim-uni-in-up">User-friendly</span>
                    </div>
                    <p class="t-bright anim-uni-in-up">Adapt every detail to fit your vision — no fuss, just 
                      simple, clear editing.</p>
                  </div>
                  <div class="mxd-features-cards__image features-image-03">
                    <img src="img/demo/04_fea-img.webp" alt="Illustration">
                  </div>
                </div>
              </div>
              <!-- item -->
              <div class="col-12 col-xl-4 mxd-features-cards__item mxd-grid-item anim-uni-scale-in">
                <div class="mxd-features-cards__inner bg-base-opp radius-l padding-4">
                  <div class="mxd-features-cards__title">
                    <h3 class="opposite anim-uni-in-up">GSAP-powered animations</h3>
                  </div>
                  <div class="mxd-features-cards__info">
                    <div class="mxd-features-cards__tags">
                      <span class="tag tag-default tag-outline-opposite anim-uni-in-up">Motion</span>
                      <span class="tag tag-default tag-outline-opposite anim-uni-in-up">Smooth</span>
                      <span class="tag tag-default tag-outline-opposite anim-uni-in-up">Interactive</span>
                    </div>
                    <p class="t-opposite anim-uni-in-up">Adding unique movement, scroll magic, and creative 
                      depth to your pages.</p>
                  </div>
                  <div class="mxd-features-cards__image features-image-04">
                    <img src="img/demo/06_fea-img.webp" alt="Illustration">
                  </div>
                </div>
              </div>
              <!-- item -->
              <div class="col-12 col-xl-4 mxd-features-cards__item mxd-grid-item anim-uni-scale-in-left">
                <div class="mxd-features-cards__inner justify-end bg-base-tint radius-l padding-4">
                  <div class="mxd-features-cards__gradient features-gradient-02">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 1200">
                      <style type="text/css">
                        .mxd-card-bg{fill:url(#purple-radial-gradient);}
                      </style>
                      <g>
                        <radialGradient id="purple-radial-gradient" cx="600" cy="600" r="600" gradientUnits="userSpaceOnUse">
                          <stop  offset="0" style="stop-color:#9F8BE7;stop-opacity:0.6"/>
                          <stop  offset="1" style="stop-color:#9F8BE7;stop-opacity:0"/>
                        </radialGradient>
                        <circle class="mxd-card-bg" cx="600" cy="600" r="600"/>
                      </g>
                    </svg>
                  </div>
                  <div class="mxd-features-cards__title">
                    <h3 class="anim-uni-in-up">Code<br>excellence</h3>
                  </div>
                  <div class="mxd-features-cards__info">
                    <div class="mxd-features-cards__tags">
                      <span class="tag tag-default tag-outline anim-uni-in-up">Clean</span>
                      <span class="tag tag-default tag-outline anim-uni-in-up">Reliable</span>
                      <span class="tag tag-default tag-outline anim-uni-in-up">Validated</span>
                    </div>
                    <p class="anim-uni-in-up">Built with clean, well-structured code that's fast, secure, 
                      and easy to maintain.</p>
                  </div>
                  <div class="mxd-features-cards__image features-image-05">
                    <img src="img/demo/05_fea-img.webp" alt="Illustration">
                  </div>
                </div>
              </div>
              <!-- teaser -->
              <div class="col-12 mxd-features-cards__teaser mxd-grid-item anim-uni-in-up">
                <p class="mxd-point-subtitle anim-uni-in-up">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" fill="currentColor">
                    <path fill="currentColor" d="M19.6,9.6c0,0-3,0-4,0c-0.4,0-1.8-0.2-1.8-0.2c-0.6-0.1-1.1-0.2-1.6-0.6c-0.5-0.3-0.9-0.8-1.2-1.2
                      c-0.3-0.4-0.4-0.9-0.5-1.4c0,0-0.1-1.1-0.2-1.5c-0.1-1.1,0-4.4,0-4.4C10.4,0.2,10.2,0,10,0S9.6,0.2,9.6,0.4c0,0,0.1,3.3,0,4.4
                      c0,0.4-0.2,1.5-0.2,1.5C9.4,6.7,9.2,7.2,9,7.6C8.7,8.1,8.2,8.5,7.8,8.9c-0.5,0.3-1,0.5-1.6,0.6c0,0-1.2,0.1-1.7,0.2
                      c-1,0.1-4.2,0-4.2,0C0.2,9.6,0,9.8,0,10c0,0.2,0.2,0.4,0.4,0.4c0,0,3.1-0.1,4.2,0c0.4,0,1.7,0.2,1.7,0.2c0.6,0.1,1.1,0.2,1.6,0.6
                      c0.4,0.3,0.8,0.7,1.1,1.1c0.3,0.5,0.5,1,0.6,1.6c0,0,0.1,1.3,0.2,1.7c0,1,0,4.1,0,4.1c0,0.2,0.2,0.4,0.4,0.4s0.4-0.2,0.4-0.4
                      c0,0,0-3.1,0-4.1c0-0.4,0.2-1.7,0.2-1.7c0.1-0.6,0.2-1.1,0.6-1.6c0.3-0.4,0.7-0.8,1.1-1.1c0.5-0.3,1-0.5,1.6-0.6
                      c0,0,1.3-0.1,1.8-0.2c1,0,4,0,4,0c0.2,0,0.4-0.2,0.4-0.4C20,9.8,19.8,9.6,19.6,9.6L19.6,9.6z"/>
                  </svg>
                  <span>and much more</span>
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" fill="currentColor">
                    <path fill="currentColor" d="M19.6,9.6c0,0-3,0-4,0c-0.4,0-1.8-0.2-1.8-0.2c-0.6-0.1-1.1-0.2-1.6-0.6c-0.5-0.3-0.9-0.8-1.2-1.2
                      c-0.3-0.4-0.4-0.9-0.5-1.4c0,0-0.1-1.1-0.2-1.5c-0.1-1.1,0-4.4,0-4.4C10.4,0.2,10.2,0,10,0S9.6,0.2,9.6,0.4c0,0,0.1,3.3,0,4.4
                      c0,0.4-0.2,1.5-0.2,1.5C9.4,6.7,9.2,7.2,9,7.6C8.7,8.1,8.2,8.5,7.8,8.9c-0.5,0.3-1,0.5-1.6,0.6c0,0-1.2,0.1-1.7,0.2
                      c-1,0.1-4.2,0-4.2,0C0.2,9.6,0,9.8,0,10c0,0.2,0.2,0.4,0.4,0.4c0,0,3.1-0.1,4.2,0c0.4,0,1.7,0.2,1.7,0.2c0.6,0.1,1.1,0.2,1.6,0.6
                      c0.4,0.3,0.8,0.7,1.1,1.1c0.3,0.5,0.5,1,0.6,1.6c0,0,0.1,1.3,0.2,1.7c0,1,0,4.1,0,4.1c0,0.2,0.2,0.4,0.4,0.4s0.4-0.2,0.4-0.4
                      c0,0,0-3.1,0-4.1c0-0.4,0.2-1.7,0.2-1.7c0.1-0.6,0.2-1.1,0.6-1.6c0.3-0.4,0.7-0.8,1.1-1.1c0.5-0.3,1-0.5,1.6-0.6
                      c0,0,1.3-0.1,1.8-0.2c1,0,4,0,4,0c0.2,0,0.4-0.2,0.4-0.4C20,9.8,19.8,9.6,19.6,9.6L19.6,9.6z"/>
                  </svg>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Block - Features Cards End -->

    </div>
  </div>
  <!-- Section - Features Cards End -->

  <!-- Section - Demo CTA Start -->
  <div class="mxd-section padding-default">
    <div class="mxd-container">

      <!-- Block - Demo CTA Start -->
      <div class="mxd-block">
        <div class="mxd-demo-cta">
          <div class="mxd-demo-cta__caption anim-uni-in-up">
            <h2 class="h2-small reveal-type">Show your creativity and get noticed today!</h2>
          </div>
          <div class="mxd-demo-cta__btn anim-uni-in-up">
            <a class="btn btn-anim btn-default btn-large btn-additional slide-right" href="https://1.envato.market/kOvmWN" target="_blank">
              <span class="btn-caption">Buy Now</span>
              <i class="ph-bold ph-shopping-cart-simple"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- Block - Demo CTA End -->

    </div>
  </div>
</main>
@endsection
