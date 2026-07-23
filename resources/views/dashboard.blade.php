@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="dashboard-title">
    <h2>Dashboard</h2>
    <p>
        Selamat datang kembali,
        <strong>{{ Auth::user()->name }}</strong>.
        Kelola website PT. NYUSUSEK melalui menu di samping.
    </p>
</div>

<div class="dashboard-cards">

    <div class="card-admin">
        <div class="card-icon">
            <i class="bi bi-briefcase-fill"></i>
        </div>

        <h5>Total Services</h5>

        <div class="card-number">
            0
        </div>
    </div>

    <div class="card-admin">
        <div class="card-icon">
            <i class="bi bi-images"></i>
        </div>

        <h5>Total Gallery</h5>

        <div class="card-number">
            0
        </div>
    </div>

    <div class="card-admin">
        <div class="card-icon">
            <i class="bi bi-people-fill"></i>
        </div>

        <h5>Total Team</h5>

        <div class="card-number">
            0
        </div>
    </div>

</div>

@endsection