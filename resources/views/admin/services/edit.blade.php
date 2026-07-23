@extends('layouts.admin')

@section('content')

<div class="container py-5">

    <div class="card shadow">

        <div class="card-header">
            <h3 class="mb-0">Edit Service</h3>
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

            <form action="{{ route('services.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title', $service->title) }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea
                        name="description"
                        class="form-control"
                        rows="5"
                        required>{{ old('description', $service->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Icon</label>
                    <input
                        type="text"
                        name="icon"
                        class="form-control"
                        value="{{ old('icon', $service->icon) }}"
                        placeholder="Contoh: 💻 atau fa-solid fa-code">
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('services.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection