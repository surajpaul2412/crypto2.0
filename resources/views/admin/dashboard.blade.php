@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="fw-bold mb-5">Admin Dashboard</h1>

    {{-- Stats --}}
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card p-4 border-0 shadow-sm">
                <h6 class="text-muted">Users</h6>
                <h3 class="fw-bold">{{ $usersCount }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4 border-0 shadow-sm">
                <h6 class="text-muted">Products</h6>
                <h3 class="fw-bold">{{ $productsCount }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4 border-0 shadow-sm">
                <h6 class="text-muted">Subscriptions</h6>
                <h3 class="fw-bold">{{ $subscriptionsCount }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-4 border-0 shadow-sm">
                <h6 class="text-muted">Revenue</h6>
                <h3 class="fw-bold">₹{{ number_format($revenue) }}</h3>
            </div>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="card border-0 shadow-sm p-4">
        <h5 class="fw-semibold mb-3">Quick Actions</h5>

        <div class="d-flex gap-3 flex-wrap">
            <a href="#" class="btn btn-outline-dark">Add Product</a>
            <a href="#" class="btn btn-outline-dark">Upload Sounds</a>
            <a href="#" class="btn btn-outline-dark">View Users</a>
            <a href="#" class="btn btn-outline-dark">View Subscriptions</a>
        </div>
    </div>

</div>
@endsection
