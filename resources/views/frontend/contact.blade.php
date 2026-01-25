@extends('layouts.app')

@section('title', 'Rayo – Digital Agency')
@section('meta_description', 'Elevate your digital presence with Rayo')
@section('meta_keywords', 'agency, portfolio, laravel')

@section('content')
<main id="mxd-page-content" class="mxd-page-content inner-page-content">

  <!-- Section - Inner Page Headline Start -->
  <div class="mxd-section mxd-section-inner-headline padding-s-text-pre-form overflow-hidden">
    <div class="mxd-container grid-container">
    
      <!-- Block - Inner Page Headline Start -->
      <div class="mxd-block loading-wrap">
        <div class="container-fluid px-0">
          <div class="row gx-0">

            <!-- Inner Headline Name Start -->
            <div class="col-12 col-xl-2 mxd-grid-item no-margin">
              <div class="mxd-block__name name-inner-headline">
                <p class="mxd-point-subtitle">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" fill="currentColor">
                    <path fill="currentColor" d="M19.6,9.6c0,0-3,0-4,0c-0.4,0-1.8-0.2-1.8-0.2c-0.6-0.1-1.1-0.2-1.6-0.6c-0.5-0.3-0.9-0.8-1.2-1.2
                      c-0.3-0.4-0.4-0.9-0.5-1.4c0,0-0.1-1.1-0.2-1.5c-0.1-1.1,0-4.4,0-4.4C10.4,0.2,10.2,0,10,0S9.6,0.2,9.6,0.4c0,0,0.1,3.3,0,4.4
                      c0,0.4-0.2,1.5-0.2,1.5C9.4,6.7,9.2,7.2,9,7.6C8.7,8.1,8.2,8.5,7.8,8.9c-0.5,0.3-1,0.5-1.6,0.6c0,0-1.2,0.1-1.7,0.2
                      c-1,0.1-4.2,0-4.2,0C0.2,9.6,0,9.8,0,10c0,0.2,0.2,0.4,0.4,0.4c0,0,3.1-0.1,4.2,0c0.4,0,1.7,0.2,1.7,0.2c0.6,0.1,1.1,0.2,1.6,0.6
                      c0.4,0.3,0.8,0.7,1.1,1.1c0.3,0.5,0.5,1,0.6,1.6c0,0,0.1,1.3,0.2,1.7c0,1,0,4.1,0,4.1c0,0.2,0.2,0.4,0.4,0.4s0.4-0.2,0.4-0.4
                      c0,0,0-3.1,0-4.1c0-0.4,0.2-1.7,0.2-1.7c0.1-0.6,0.2-1.1,0.6-1.6c0.3-0.4,0.7-0.8,1.1-1.1c0.5-0.3,1-0.5,1.6-0.6
                      c0,0,1.3-0.1,1.8-0.2c1,0,4,0,4,0c0.2,0,0.4-0.2,0.4-0.4C20,9.8,19.8,9.6,19.6,9.6L19.6,9.6z"/>
                  </svg>
                  <span>Contact</span>
                </p>
              </div>
            </div>
            <!-- Inner Headline Name Start -->

            <!-- Inner Headline Content Start -->
            <div class="col-12 col-xl-8 mxd-grid-item no-margin">

              <div class="mxd-block__content">
                <div class="mxd-block__inner-headline loading__item">
                  <h1 class="inner-headline__title">
                    Let's talk<br>about your project!
                    <!-- <a class="btn btn-line-headline slide-right-up anim-no-delay" href="mailto:example@example.com?subject=Message%20from%20your%20site">
                      <span class="btn-caption">hello@rayo.com</span>
                      <i class="ph-bold ph-arrow-up-right"></i>
                    </a> -->
                  </h1>
                  <a class="btn btn-line-headline slide-right-up anim-no-delay" href="mailto:example@example.com?subject=Message%20from%20your%20site">
                    <span class="btn-caption">hello@rayo.com</span>
                    <i class="ph-bold ph-arrow-up-right"></i>
                  </a>
                  <p class="inner-headline__text t-large t-bright loading__item">Have questions? We've got the answers! 
                    Here, you'll find clear and concise information about our services, process, 
                    and what to expect when working with us. If you need more details, feel free to 
                    reach out!</p>
                </div>
              </div>

            </div>
            <!-- Inner Headline Content End -->

          </div>
        </div>
      </div>
      <!-- Block - Inner Page Headline End -->

    </div>
  </div>
  <!-- Section - Inner Page Headline End -->

  <!-- Section - Inner Page Form Start -->
  <div class="mxd-section mxd-section-inner-form padding-default">
    <div class="mxd-container grid-container">
    
      <!-- Block - Inner Page Headline Start -->
      <div class="mxd-block">
        <div class="container-fluid px-0">
          <div class="row gx-0">

            <!-- Inner Headline Name Start -->
            <div class="col-12 col-xl-2 mxd-grid-item no-margin"></div>
            <!-- Inner Headline Name Start -->

            <!-- Inner Headline Content Start -->
            <div class="col-12 col-xl-8">

              <div class="mxd-block__content contact">
                <div class="mxd-block__inner-form loading__fade">
                  <div class="form-container">

                    <!-- Reply Messages Start -->
                    <div class="form__reply centered text-center">
                      <i class="ph-fill ph-smiley-wink reply__icon"></i>
                      <!-- <i class="ph-fill ph-smiley reply__icon"></i> -->
                      <p class="reply__title">Done!</p>
                      <span class="reply__text">Thanks for your message. We'll get back as soon as possible.</span>
                    </div> 
                    <!-- Reply Messages End -->
      
                    <!-- Contact Form Start -->
                    <form class="form contact-form" id="contact-form">
                      <!-- Hidden Required Fields -->
                      <input type="hidden" name="project_name" value="Rayo Template">
                      <input type="hidden" name="admin_email" value="support@mixdesign.dev">
                      <input type="hidden" name="form_subject" value="Contact Form Message">
                      <!-- END Hidden Required Fields-->
                      <div class="container-fluid p-0">
                        <div class="row gx-0">
                          <div class="col-12 col-md-6 mxd-grid-item anim-uni-in-up">
                            <input type="text" name="Name" placeholder="Your name*" required>
                          </div>
                          <div class="col-12 col-md-6 mxd-grid-item anim-uni-in-up">
                            <input type="text" name="Company" placeholder="Company name">
                          </div>
                          <div class="col-12 col-md-6 mxd-grid-item anim-uni-in-up">
                            <input type="email" name="E-mail" placeholder="Email*" required>
                          </div>
                          <div class="col-12 col-md-6 mxd-grid-item anim-uni-in-up">
                            <input type="tel" name="Phone" placeholder="Phone">
                          </div>
                          <div class="col-12 mxd-grid-item anim-uni-in-up">
                            <textarea name="Message" placeholder="A few words about your project*" required></textarea>
                          </div>
                          <div class="col-12 mxd-grid-item anim-uni-in-up">
                            <button class="btn btn-anim btn-default btn-large btn-opposite slide-right-up" type="submit">
                              <span class="btn-caption">Submit</span>
                              <i class="ph-bold ph-arrow-up-right"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </form>
                    <!-- Contact Form End -->
      
                  </div>
                </div>
              </div>

            </div>
            <!-- Inner Headline Content End -->

          </div>
        </div>
      </div>
      <!-- Block - Inner Page Headline End -->

    </div>
  </div>
  <!-- Section - Inner Page Form End -->

  <!-- Section - Parallax Divider Start -->
  <div class="mxd-section padding-grid-pre-mtext">
    <div class="mxd-container">
      <div class="mxd-divider">
        <div class="mxd-divider__image divider-image-3 parallax-img"></div>
      </div>
    </div>
  </div>
  <!-- Section - Parallax Divider End -->

  <!-- Section - Marquee Text One Line Start -->
  <div class="mxd-section padding-mtext">
    <div class="mxd-container fullwidth-container">

      <!-- Block - Marquee Text One Line Start -->
      <div class="mxd-block">
        <div class="marquee marquee-right--gsap muted-extra">
          <div class="marquee__toright">
            <!-- single item -->
            <div class="marquee__item one-line item-regular text">
              <p class="marquee__text">Connect</p>
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
              <p class="marquee__text">Connect</p>
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
              <p class="marquee__text">Connect</p>
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
              <p class="marquee__text">Connect</p>
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

  <!-- Section - Socials List Start -->
  <div class="mxd-section padding-pre-title">
    <div class="mxd-container">

      <!-- Block - Socials List Start -->
      <div class="mxd-block">
        <div class="mxd-links-lines">
          <!-- item -->
          <div class="mxd-links-lines__item">
            <div class="mxd-links-lines__divider anim-uni-in-up"></div>
            <a class="mxd-links-lines__link anim-uni-in-up" href="https://dribbble.com/" target="_blank">
              <h6 class="mxd-links-lines__title">Dribbble</h6>
              <div class="mxd-links-lines__icon">
                <i class="ph ph-arrow-up-right"></i>
              </div>
            </a>
            <div class="mxd-links-lines__divider anim-uni-in-up"></div>
          </div>
          <!-- item -->
          <div class="mxd-links-lines__item">
            <div class="mxd-links-lines__divider anim-uni-in-up"></div>
            <a class="mxd-links-lines__link anim-uni-in-up" href="https://www.behance.net/" target="_blank">
              <h6 class="mxd-links-lines__title">Behance</h6>
              <div class="mxd-links-lines__icon">
                <i class="ph ph-arrow-up-right"></i>
              </div>
            </a>
            <div class="mxd-links-lines__divider anim-uni-in-up"></div>
          </div>
          <!-- item -->
          <div class="mxd-links-lines__item">
            <div class="mxd-links-lines__divider anim-uni-in-up"></div>
            <a class="mxd-links-lines__link anim-uni-in-up" href="https://www.instagram.com/" target="_blank">
              <h6 class="mxd-links-lines__title">Instagram</h6>
              <div class="mxd-links-lines__icon">
                <i class="ph ph-arrow-up-right"></i>
              </div>
            </a>
            <div class="mxd-links-lines__divider anim-uni-in-up"></div>
          </div>
          <!-- item -->
          <div class="mxd-links-lines__item">
            <div class="mxd-links-lines__divider anim-uni-in-up"></div>
            <a class="mxd-links-lines__link anim-uni-in-up" href="https://github.com/" target="_blank">
              <h6 class="mxd-links-lines__title">Github</h6>
              <div class="mxd-links-lines__icon">
                <i class="ph ph-arrow-up-right"></i>
              </div>
            </a>
            <div class="mxd-links-lines__divider anim-uni-in-up"></div>
          </div>
          <!-- item -->
          <div class="mxd-links-lines__item">
            <div class="mxd-links-lines__divider anim-uni-in-up"></div>
            <a class="mxd-links-lines__link anim-uni-in-up" href="https://codepen.io/" target="_blank">
              <h6 class="mxd-links-lines__title">Codepen</h6>
              <div class="mxd-links-lines__icon">
                <i class="ph ph-arrow-up-right"></i>
              </div>
            </a>
            <div class="mxd-links-lines__divider anim-uni-in-up"></div>
          </div>
          <!-- item -->
          <div class="mxd-links-lines__item">
            <div class="mxd-links-lines__divider anim-uni-in-up"></div>
            <a class="mxd-links-lines__link anim-uni-in-up" href="https://www.figma.com/community" target="_blank">
              <h6 class="mxd-links-lines__title">Figma community</h6>
              <div class="mxd-links-lines__icon">
                <i class="ph ph-arrow-up-right"></i>
              </div>
            </a>
            <div class="mxd-links-lines__divider anim-uni-in-up"></div>
          </div>
        </div>
      </div>
      <!-- Block - Socials List Start -->

    </div>
  </div>
  <!-- Section - Socials List End -->

  <!-- Section - Text Block Start -->
  <div class="mxd-section padding-default">
    <div class="mxd-container grid-container">
    
      <!-- Block - Text Block with H2 Title, Paragraph and Contact Lists Start -->
      <div class="mxd-block">
        <div class="container-fluid px-0">
          <div class="row gx-0">
            <div class="col-12 col-xl-5 mxd-grid-item no-margin">
              <div class="mxd-block__name">
                <h2 class="reveal-type anim-uni-in-up">Welcome to our office</h2>
              </div>
            </div>
            <div class="col-12 col-xl-6 mxd-grid-item no-margin">
              <div class="mxd-block__content">
                <div class="mxd-block__paragraph">
                  <p class="t-large t-bright anim-uni-in-up">Inspiring ideas, creative insights, 
                    and the latest in design and tech. Fueling innovation for your digital journey.</p>
                  <div class="mxd-paragraph__lists">
                    <div class="container-fluid p-0">
                      <div class="row g-0">
                        <div class="col-12 col-md-12 col-xl-12 mxd-paragraph__lists-item">
                          <div class="mxd-paragraph__lists-title">
                            <p class="t-large t-bright t-caption anim-uni-in-up">New Delhi</p>
                          </div>
                          <ul>
                            <li class="anim-uni-in-up">
                              <a class="anim-uni-in-up" href="https://share.google/QVihAtEvdEsmKz0JH" target="_blank">
                                Space No: 1, Second Floor DA - Block Market (Ramji Lal Commercial Shopping Complex) Shalimar Bagh, New Delhi - 110088
                              </a>
                            </li>
                          </ul>
                          <ul>
                            <li class="anim-uni-in-up">
                              <a href="tel:+12127089400">+1 212-708-9400</a>
                            </li>
                            <li class="anim-uni-in-up">
                              <a href="mailto:example@example.com?subject=Message%20from%20your%20site">hello@rayo.com</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Block - Text Block with H2 Title, Paragraph and Contact Lists End -->

    </div>
  </div>
  <!-- Section - Text Block End -->

</main>
@endsection
