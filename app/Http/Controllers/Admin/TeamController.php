<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->get();

        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photoName = time() . '.' . $request->photo->extension();

        $request->photo->move(public_path('team'), $photoName);

        Team::create([
            'name' => $request->name,
            'position' => $request->position,
            'photo' => $photoName,
        ]);

        return redirect()
            ->route('teams.index')
            ->with('success', 'Data team berhasil ditambahkan.');
    }

    public function show(Team $team)
    {
        //
    }

    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {

            if ($team->photo && file_exists(public_path('team/' . $team->photo))) {
                unlink(public_path('team/' . $team->photo));
            }

            $photoName = time() . '.' . $request->photo->extension();

            $request->photo->move(public_path('team'), $photoName);

            $team->photo = $photoName;
        }

        $team->name = $request->name;
        $team->position = $request->position;

        $team->save();

        return redirect()
            ->route('teams.index')
            ->with('success', 'Data team berhasil diperbarui.');
    }

    public function destroy(Team $team)
    {
        if ($team->photo && file_exists(public_path('team/' . $team->photo))) {
            unlink(public_path('team/' . $team->photo));
        }

        $team->delete();

        return redirect()
            ->route('teams.index')
            ->with('success', 'Data team berhasil dihapus.');
    }
}