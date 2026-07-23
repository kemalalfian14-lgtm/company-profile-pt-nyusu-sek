<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('gallery'), $imageName);

        Gallery::create([
            'title' => $request->title,
            'image' => $imageName,
        ]);

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Gallery berhasil ditambahkan.');
    }

    public function show(Gallery $gallery)
    {
        //
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if ($gallery->image && file_exists(public_path('gallery/' . $gallery->image))) {
                unlink(public_path('gallery/' . $gallery->image));
            }

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('gallery'), $imageName);

            $gallery->image = $imageName;
        }

        $gallery->title = $request->title;

        $gallery->save();

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Gallery berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && file_exists(public_path('gallery/' . $gallery->image))) {
            unlink(public_path('gallery/' . $gallery->image));
        }

        $gallery->delete();

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Gallery berhasil dihapus.');
    }
}