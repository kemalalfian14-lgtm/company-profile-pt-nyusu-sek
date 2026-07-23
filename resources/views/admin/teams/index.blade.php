@extends('layouts.admin')

@section('title','Team')

@section('content')

<div class="page-header">

    <div>

        <h2>Data Team</h2>

        <p>Kelola seluruh anggota tim PT. NYUSUSEK.</p>

    </div>

    <a href="{{ route('teams.create') }}" class="action-btn">

        <i class="bi bi-plus-lg"></i>

        Tambah Team

    </a>

</div>

@if(session('success'))

<div class="success-box">

    <i class="bi bi-check-circle-fill"></i>

    {{ session('success') }}

</div>

@endif

<div class="table-card">

<table class="admin-table">

<thead>

<tr>

<th width="60">No</th>

<th width="130">Foto</th>

<th>Nama</th>

<th>Jabatan</th>

<th width="180">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($teams as $team)

<tr>

<td>

{{ $loop->iteration }}

</td>

<td>

<img src="{{ asset('team/'.$team->photo) }}"
     class="team-photo">

</td>

<td>

<strong>{{ $team->name }}</strong>

</td>

<td>

{{ $team->position }}

</td>

<td>

<div class="action-group">

<a href="{{ route('teams.edit',$team->id) }}"
class="edit-btn">

<i class="bi bi-pencil-square"></i>

Edit

</a>

<form action="{{ route('teams.destroy',$team->id) }}"
method="POST">

@csrf
@method('DELETE')

<button
class="delete-btn"
onclick="return confirm('Yakin ingin menghapus data ini?')">

<i class="bi bi-trash"></i>

Hapus

</button>

</form>

</div>

</td>

</tr>

@empty

<tr>

<td colspan="5" class="empty-table">

Belum ada data Team.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection