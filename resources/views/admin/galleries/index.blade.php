@extends('layouts.admin')

@section('title', 'Gallery')

@section('content')

<div class="page-header">

    <div>

        <h2>Data Gallery</h2>

        <p>Kelola seluruh dokumentasi PT. NYUSUSEK.</p>

    </div>

    <a href="{{ route('galleries.create') }}" class="action-btn">

        <i class="bi bi-plus-lg"></i>

        Tambah Gallery

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

                <th>Judul</th>

                <th width="170">Gambar</th>

                <th width="180">Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($galleries as $gallery)

            <tr>

                <td>

                    {{ $loop->iteration }}

                </td>

                <td>

                    <strong>{{ $gallery->title }}</strong>

                </td>

                <td>

                    <img src="{{ asset('gallery/'.$gallery->image) }}"
                         class="gallery-photo"
                         alt="{{ $gallery->title }}">

                </td>

                <td>

                    <div class="action-group">

                        <a href="{{ route('galleries.edit',$gallery->id) }}"
                           class="edit-btn">

                            <i class="bi bi-pencil-square"></i>

                            Edit

                        </a>

                        <form action="{{ route('galleries.destroy',$gallery->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="delete-btn"
                                onclick="return confirm('Yakin ingin menghapus gallery ini?')">

                                <i class="bi bi-trash"></i>

                                Hapus

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="4" class="empty-table">

                    <i class="bi bi-images"></i>

                    <br><br>

                    Belum ada data gallery.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection