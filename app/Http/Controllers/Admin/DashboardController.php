<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\Team;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalServices' => Service::count(),
            'totalGalleries' => Gallery::count(),
            'totalTeams' => Team::count(),
        ]);
    }
}