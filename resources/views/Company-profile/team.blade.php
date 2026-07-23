@extends('layouts.frontend')

@section('title', 'Team')

@section('content')

<h1>Our Team</h1>

<p>Tim profesional yang siap membantu kebutuhan bisnis Anda.</p>

<div class="cards">

    <div class="card">
        <img src="{{ asset('images/team1.jpg') }}" alt="CEO" class="team-img">
        <h2>Kristian Adya</h2>
        <p>Chief Executive Officer</p>
    </div>

    <div class="card">
        <img src="{{ asset('images/team2.jpg') }}" alt="CTO" class="team-img">
        <h2>Gagah Prasetyo</h2>
        <p>Chief Technology Officer</p>
    </div>

    <div class="card">
        <img src="{{ asset('images/team3.jpg') }}" alt="Designer" class="team-img">
        <h2>Sazkia Ratu</h2>
        <p>UI/UX Designer</p>
    </div>

</div>

@endsection