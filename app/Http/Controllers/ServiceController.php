<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $services = Service::latest()->get();

        return view('admin.services.index', compact('services'));
    }

    // Form tambah data
    public function create()
    {
        return view('admin.services.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'icon' => 'nullable|max:255',
        ]);

        dd($request->all());

        Service::create([ 
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
        ]);

        return redirect()
            ->route('services.index')
            ->with('success', 'Service berhasil ditambahkan.');
    }

    // Form edit
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    // Update data
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'icon' => 'nullable|max:255',
        ]);

        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
        ]);

        return redirect()
            ->route('services.index')
            ->with('success', 'Service berhasil diperbarui.');
    }

    // Hapus data
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()
            ->route('services.index')
            ->with('success', 'Service berhasil dihapus.');
    }
}