@extends('layouts.frontend')

@section('title', 'Contact')

@section('content')

<h1>Hubungi Kami</h1>

<form>

<label>Nama</label>

<input type="text">

<label>Email</label>

<input type="email">

<label>Pesan</label>

<textarea rows="5"></textarea>

<button>Kirim</button>

</form>

@endsection