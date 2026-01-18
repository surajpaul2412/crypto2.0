@extends('layouts.app')

@section('title', 'Customer Dashboard')
@section('meta_description', 'Elevate your digital presence with Rayo')
@section('meta_keywords', 'agency, portfolio, laravel')

@section('content')
<main id="mxd-page-content" class="mxd-page-content inner-page-content">

  <!-- ===============================
  Inner Page Headline
  =============================== -->
  <div class="mxd-section mxd-section-inner-headline padding-headline-pre-grid">
    <div class="mxd-container grid-container">

      <div class="mxd-block loading-wrap">
        <div class="container-fluid px-0">
          <div class="row gx-0">

            <!-- Page Label -->
            <div class="col-12 col-xl-2 mxd-grid-item no-margin">
              <div class="mxd-block__name name-inner-headline loading__item">
                <p class="mxd-point-subtitle">
                  <span>Dashboard</span>
                </p>
              </div>
            </div>

            <!-- Page Title -->
            <div class="col-12 col-xl-10 mxd-grid-item no-margin">
              <div class="mxd-block__content">
                <div class="mxd-block__inner-headline">
                  <h1 class="inner-headline__title">
                    Welcome back, Suraj
                  </h1>
                  <p class="t-muted mt-2">
                    Plan: <strong>Pro</strong> • Active till 12 Feb 2026
                  </p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- ===============================
  Dashboard Body (Sidebar + Content)
  =============================== -->
  <section class="mxd-section">
    <div class="mxd-container grid-container">
      <div class="row gx-0">

        <!-- ===============================
        Sidebar (Static)
        =============================== -->
        <div class="col-12 col-xl-2 mxd-grid-item no-margin">

          <nav class="mxd-dashboard-nav">
            <ul class="list-unstyled mb-0">

              <li class="mb-3 fw-semibold">Dashboard</li>
              <li class="mb-3 t-muted">My Library</li>
              <li class="mb-3 t-muted">Downloads</li>
              <li class="mb-3 t-muted">Licenses</li>
              <li class="mb-3 t-muted">Orders & Billing</li>
              <li class="mb-3 t-muted">Support</li>

              <li class="mt-4 t-muted">Logout</li>

            </ul>
          </nav>

        </div>

        <!-- ===============================
        Main Content
        =============================== -->
        <div class="col-12 col-xl-10 mxd-grid-item no-margin">

          <!-- Stats -->
          <section class="mxd-section pt-0">
            <div class="mxd-container">
              <div class="row g-4">

                <div class="col-md-3">
                  <div class="card border-0 shadow-sm p-4 h-100">
                    <p class="t-muted mb-1">My Products</p>
                    <h2 class="fw-bold">12</h2>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="card border-0 shadow-sm p-4 h-100">
                    <p class="t-muted mb-1">Downloads</p>
                    <h2 class="fw-bold">48</h2>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="card border-0 shadow-sm p-4 h-100">
                    <p class="t-muted mb-1">Licenses</p>
                    <h2 class="fw-bold">3</h2>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="card border-0 shadow-sm p-4 h-100">
                    <p class="t-muted mb-1">Support Tickets</p>
                    <h2 class="fw-bold">1</h2>
                  </div>
                </div>

              </div>
            </div>
          </section>

          <!-- My Library -->
          <section class="mxd-section">
            <div class="mxd-container">
              <h3 class="mb-4">My Library</h3>

              <div class="d-flex justify-content-between py-3 border-bottom">
                <div>
                  <strong>Neo Strings</strong>
                  <div class="t-muted small">Instrument</div>
                </div>
                <span class="t-muted">View</span>
              </div>

              <div class="d-flex justify-content-between py-3 border-bottom">
                <div>
                  <strong>Analog Drums</strong>
                  <div class="t-muted small">Sample Pack</div>
                </div>
                <span class="t-muted">View</span>
              </div>

            </div>
          </section>

          <!-- Recent Downloads -->
          <section class="mxd-section">
            <div class="mxd-container">
              <h3 class="mb-4">Recent Downloads</h3>

              <div class="d-flex justify-content-between py-3 border-bottom">
                <span>Neo Strings v2.1</span>
                <span class="t-muted">Download</span>
              </div>

              <div class="d-flex justify-content-between py-3 border-bottom">
                <span>Analog Drums Pack</span>
                <span class="t-muted">Download</span>
              </div>

            </div>
          </section>

          <!-- Support -->
          <section class="mxd-section">
            <div class="mxd-container text-center">
              <h4>Need help?</h4>
              <p class="t-muted">Our support team is here for you.</p>
              <span class="btn btn-dark">Contact Support</span>
            </div>
          </section>

        </div>
      </div>
    </div>
  </section>

</main>
@endsection
