@extends('layouts.app')

@section('title', 'Remote Recordings - Crypto Cipher')
@section('meta_description', 'Book remote recording sessions with Indian acoustic instruments and collaborative production support.')
@section('meta_keywords', 'remote recording, kontakt, indian instruments, collaboration, crypto cipher')

@section('content')
<main id="mxd-page-content" class="mxd-page-content inner-page-content">

  <div class="mxd-section mxd-section-inner-headline padding-s-text-pre-form overflow-hidden">
    <div class="mxd-container grid-container">
      <div class="mxd-block loading-wrap">
        <div class="container-fluid px-0">
          <div class="row gx-0">
            <div class="col-12 col-xl-2 mxd-grid-item no-margin">
              <div class="mxd-block__name name-inner-headline">
                <p class="mxd-point-subtitle">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M19.6,9.6h-3.9c-.4,0-1.8-.2-1.8-.2-.6,0-1.1-.2-1.6-.6-.5-.3-.9-.8-1.2-1.2-.3-.4-.4-.9-.5-1.4,0,0,0-1.1-.2-1.5V.4c0-.2-.2-.4-.4-.4s-.4.2-.4.4v4.4c0,.4-.2,1.5-.2,1.5,0,.5-.2,1-.5,1.4-.3.5-.7.9-1.2,1.2s-1,.5-1.6.6c0,0-1.2,0-1.7.2H.4c-.2,0-.4.2-.4.4s.2.4.4.4h4.1c.4,0,1.7.2,1.7.2.6,0,1.1.2,1.6.6.4.3.8.7,1.1,1.1.3.5.5,1,.6,1.6,0,0,0,1.3.2,1.7v4.1c0,.2.2.4.4.4s.4-.2.4-.4v-4.1c0-.4.2-1.7.2-1.7,0-.6.2-1.1.6-1.6.3-.4.7-.8,1.1-1.1.5-.3,1-.5,1.6-.6,0,0,1.3,0,1.8-.2h3.9c.2,0,.4-.2.4-.4s-.2-.4-.4-.4Z"/>
                  </svg>
                  <span>Services</span>
                </p>
              </div>
            </div>

            <div class="col-12 col-xl-8 mxd-grid-item no-margin">
              <div class="mxd-block__content">
                <div class="mxd-block__inner-headline loading__item">
                  <h1 class="inner-headline__title">Remote Recordings</h1>
                  <p class="inner-headline__text t-large t-bright loading__item">
                    Collaborate with our session artists remotely and get production-ready stems for films, games, ads and independent releases.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mxd-section no-padding-section">
    <div class="remote-hero loading__fade">
      <img src="{{ asset('assets/img/works/preview/1920x1080_prv-05.webp') }}" alt="Remote recording session setup">
      <div class="remote-hero__overlay">
        <div class="mxd-container">
          <h2>Record authentic performances without leaving your studio</h2>
          <p>Share your cue, we handle players, engineering and delivery.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="mxd-section padding-default">
    <div class="mxd-container">
      <div class="mxd-block">
        <div class="remote-content-grid loading__fade">
          <div class="remote-content-copy">
            <h3>How collaboration works</h3>
            <p>Send us your BPM, key, rough mix, notation or MIDI. We review the arrangement and suggest the best players and microphone setup for your sonic target.</p>
            <p>Once approved, we schedule the session, record multiple takes, and deliver cleaned stems with optional comping notes. You can also request alternate articulations and tempo versions.</p>
            <ul class="remote-checklist">
              <li>Live Indian + orchestral instruments on request</li>
              <li>48k/24-bit WAV stems, dry and processed versions</li>
              <li>Turnaround from 48 hours for urgent projects</li>
            </ul>
          </div>
          <aside class="remote-content-panel">
            <h4>Important links</h4>
            <a href="{{ route('shop') }}">Browse Kontakt Libraries</a>
            <a href="{{ route('wishlist.index') }}">Save references in Wishlist</a>
            <a href="{{ route('contact') }}">General support & billing</a>
            <a href="#remote-form">Start remote recording inquiry</a>
          </aside>
        </div>
      </div>
    </div>
  </div>

  <div class="mxd-section padding-grid-pre-mtext">
    <div class="mxd-container">
      <div class="remote-gallery loading__fade">
        <figure><img src="{{ asset('assets/img/works/preview/1200x800_prv-06.webp') }}" alt="Musician recording strings"></figure>
        <figure><img src="{{ asset('assets/img/works/preview/1200x800_prv-03.webp') }}" alt="Studio collaboration team"></figure>
        <figure><img src="{{ asset('assets/img/works/preview/1200x800_prv-07.webp') }}" alt="Mix and stem preparation"></figure>
      </div>
    </div>
  </div>

  <div class="mxd-section mxd-section-inner-form padding-default">
    <div class="mxd-container grid-container">
      <div class="mxd-block">
        <div class="container-fluid px-0">
          <div class="row gx-0">
            <div class="col-12 col-xl-2 mxd-grid-item no-margin"></div>
            <div class="col-12 col-xl-8">
              <div class="mxd-block__content contact">
                <div class="mxd-block__inner-form loading__fade">
                  <div class="form-container">
                    <form class="form contact-form" id="remote-form" action="#0" method="post">
                      <div class="container-fluid p-0">
                        <div class="row gx-0">
                          <div class="col-12 col-md-6 mxd-grid-item anim-uni-in-up">
                            <input type="text" name="name" placeholder="Your name*" required>
                          </div>
                          <div class="col-12 col-md-6 mxd-grid-item anim-uni-in-up">
                            <input type="email" name="email" placeholder="Email*" required>
                          </div>
                          <div class="col-12 col-md-6 mxd-grid-item anim-uni-in-up">
                            <input type="text" name="project_type" placeholder="Project type (Film/Game/Ad)" required>
                          </div>
                          <div class="col-12 col-md-6 mxd-grid-item anim-uni-in-up">
                            <input type="text" name="timeline" placeholder="Expected timeline">
                          </div>
                          <div class="col-12 mxd-grid-item anim-uni-in-up">
                            <input type="url" name="references" placeholder="Reference links (Drive/YouTube/SoundCloud)">
                          </div>
                          <div class="col-12 mxd-grid-item anim-uni-in-up">
                            <textarea name="message" placeholder="Tell us the instruments and recording requirements*" required></textarea>
                          </div>
                          <div class="col-12 mxd-grid-item anim-uni-in-up">
                            <button class="btn btn-anim btn-default btn-large btn-opposite slide-right-up" type="submit">
                              <span class="btn-caption">Send Inquiry</span>
                              <i class="ph-bold ph-arrow-up-right"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<style>
  .remote-hero {
    position: relative;
    height: min(72vh, 720px);
    margin-top: 35px;
    overflow: hidden;
  }
  .remote-hero img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }
  .remote-hero__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(12, 14, 20, 0.18) 0%, rgba(12, 14, 20, 0.78) 100%);
    display: flex;
    align-items: flex-end;
    padding: 2rem 0;
  }
  .remote-hero__overlay h2,
  .remote-hero__overlay p {
    color: #fff;
    margin: 0;
  }
  .remote-hero__overlay h2 {
    font-size: clamp(1.6rem, 4vw, 3rem);
    margin-bottom: 0.5rem;
  }

  .remote-content-grid {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: clamp(1.4rem, 2.2vw, 2.6rem);
    align-items: start;
    padding-top: 4em;
  }
  .remote-content-copy h3 {
    margin: 0 0 1.2rem;
    font-size: clamp(1.55rem, 2.2vw, 2.25rem);
    line-height: 1.2;
  }
  .remote-content-copy p {
    margin: 0 0 1.15rem;
    color: var(--base-opp);
    line-height: 1.78;
    max-width: 62ch;
  }
  .remote-checklist {
    margin: 1.4rem 0 0;
    padding: 0;
    list-style: none;
    display: grid;
    gap: 0.78rem;
  }
  .remote-checklist li {
    margin: 0;
    padding: 0.78rem 0.95rem;
    border: 1px solid rgba(16, 18, 27, 0.12);
    border-radius: 12px;
    background: var(--base-tint);
    line-height: 1.58;
  }
  .remote-content-panel {
    background: var(--base-tint);
    border-radius: var(--_radius-m);
    padding: 2.35rem 3.2rem;
    display: grid;
    gap: 0.6rem;
    align-content: start;
    border: 1px solid rgba(16, 18, 27, 0.12);
  }
  .remote-content-panel h4 {
    margin: 0 0 0.7rem;
    font-size: clamp(1.55rem, 2vw, 2.2rem);
    line-height: 1.15;
  }
  .remote-content-panel a {
    display: block;
    padding: 0.58rem 0;
    color: var(--base-opp);
    text-decoration: underline;
    text-underline-offset: 3px;
    border-bottom: 1px dashed rgba(16, 18, 27, 0.2);
    line-height: 1.45;
  }
  .remote-content-panel a:last-child {
    border-bottom: 0;
  }

  .remote-gallery {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 0.9rem;
  }
  .remote-gallery figure {
    margin: 0;
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid rgba(16, 18, 27, 0.12);
  }
  .remote-gallery img {
    width: 100%;
    height: 100%;
    min-height: 260px;
    object-fit: cover;
    display: block;
  }

  @media (max-width: 991px) {
    .remote-hero {
      margin-top: 84px;
      height: 58vh;
    }
    .remote-content-grid,
    .remote-gallery {
      grid-template-columns: 1fr;
    }
    .remote-content-panel {
      margin-top: 0.4rem;
      padding: 1.15rem 1rem;
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var remoteForm = document.getElementById('remote-form');
    if (!remoteForm) return;

    remoteForm.addEventListener('submit', function (event) {
      event.preventDefault();

      if (typeof Swal !== 'undefined') {
        Swal.fire({
          icon: 'success',
          title: 'Inquiry sent',
          text: 'Your remote recording request is captured. We will contact you soon.',
          timer: 1800,
          showConfirmButton: false
        });
      }

      remoteForm.reset();
    });
  });
</script>
@endsection
