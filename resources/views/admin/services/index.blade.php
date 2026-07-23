@extends('layouts.admin')

@section('title', 'Services')

@section('content')

<div class="page-header">

    <div>
        <h2>Data Services</h2>
        <p>Kelola seluruh layanan PT. NYUSUSEK.</p>
    </div>

    <a href="{{ route('services.create') }}" class="action-btn">
        <i class="bi bi-plus-lg"></i>
        Tambah Service
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

                <th width="70">No</th>

                <th width="90">Icon</th>

                <th width="250">Judul</th>

                <th>Deskripsi</th>

                <th width="180">Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($services as $service)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td class="icon-column">

                    {{ $service->icon }}

                </td>

                <td>

                    <strong>{{ $service->title }}</strong>

                </td>

                <td>

                    {{ $service->description }}

                </td>

                <td>

                    <div class="action-group">

                        <a href="{{ route('services.edit',$service->id) }}"
                           class="edit-btn">

                            <i class="bi bi-pencil-square"></i>

                            Edit

                        </a>

                        <form action="{{ route('services.destroy',$service->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="delete-btn"
                                onclick="return confirm('Yakin ingin menghapus service ini?')">

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

                    <i class="bi bi-inbox"></i>

                    <br><br>

                    Belum ada data service.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection