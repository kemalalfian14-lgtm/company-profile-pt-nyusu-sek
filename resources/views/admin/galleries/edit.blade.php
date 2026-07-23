@extends('layouts.admin')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header">
            <h3 class="mb-0">Edit Gallery</h3>
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

            <form action="{{ route('galleries.update', $gallery->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title', $gallery->title) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Saat Ini</label>
                    <br>

                    <img src="{{ asset('gallery/' . $gallery->image) }}"
                         alt="{{ $gallery->title }}"
                         class="img-thumbnail"
                         width="180">
                </div>

                <div class="mb-3">
                    <label class="form-label">Ganti Gambar (Opsional)</label>

                    <input
                        type="file"
                        name="image"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,image/*">
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('galleries.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection