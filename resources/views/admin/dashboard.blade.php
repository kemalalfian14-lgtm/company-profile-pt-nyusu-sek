@extends('layouts.admin')

@section('title','Dashboard')

@section('content')

<div class="dashboard-header">

    <h2>Selamat Datang, {{ Auth::user()->name }} 👋</h2>

    <p>
        Kelola seluruh data website PT. NYUSU SEK melalui dashboard admin.
    </p>

</div>

<div class="dashboard-grid">

    <div class="dashboard-card">

        <div class="dashboard-icon blue">

            <i class="bi bi-briefcase"></i>

        </div>

        <h3>{{ $totalServices }}</h3>

        <p>Total Services</p>

    </div>

    <div class="dashboard-card">

        <div class="dashboard-icon green">

            <i class="bi bi-images"></i>

        </div>

        <h3>{{ $totalGalleries }}</h3>

        <p>Total Gallery</p>

    </div>

    <div class="dashboard-card">

        <div class="dashboard-icon orange">

            <i class="bi bi-people"></i>

        </div>

        <h3>{{ $totalTeams }}</h3>

        <p>Total Team</p>

    </div>

</div>

<div class="table-card">

    <h3 style="margin-bottom:20px;">
        Ringkasan Sistem
    </h3>

    <table class="admin-table">

        <tbody>

            <tr>

                <td>
                    <i class="bi bi-check-circle-fill" style="color:#2563eb;"></i>
                    Services
                </td>

                <td>{{ $totalServices }}</td>

            </tr>

            <tr>

                <td>
                    <i class="bi bi-check-circle-fill" style="color:#16a34a;"></i>
                    Gallery
                </td>

                <td>{{ $totalGalleries }}</td>

            </tr>

            <tr>

                <td>
                    <i class="bi bi-check-circle-fill" style="color:#ea580c;"></i>
                    Team
                </td>

                <td>{{ $totalTeams }}</td>

            </tr>

            <tr>

                <td>

                    <strong>Total Konten</strong>

                </td>

                <td>

                    <strong>

                        {{ $totalServices + $totalGalleries + $totalTeams }}

                    </strong>

                </td>

            </tr>

        </tbody>

    </table>

</div>

@endsection