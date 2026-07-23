@extends('layouts.admin')

@section('title', 'Edit Team')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header">
            <h3 class="mb-0">Edit Team</h3>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('teams.update', $team->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $team->name) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input
                        type="text"
                        name="position"
                        class="form-control"
                        value="{{ old('position', $team->position) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Saat Ini</label>

                    <div class="mb-3">
                        <img src="{{ asset('team/' . $team->photo) }}"
                             alt="{{ $team->name }}"
                             class="img-thumbnail"
                             width="180">
                    </div>

                    <input
                        type="file"
                        name="photo"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,image/*">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti foto.
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('teams.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection