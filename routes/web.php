<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TeamController;
use Illuminate\Support\Facades\Route;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\Team;

Route::get('/', function () {

    $services = Service::all();
    $galleries = Gallery::latest()->get();
    $teams = Team::latest()->get();

return view('Company-profile.home', compact(
    'services',
    'galleries',
    'teams'
));
    });

Route::view('/about', 'Company-profile.about');
Route::view('/services', 'Company-profile.services');
Route::view('/gallery', 'Company-profile.gallery');
Route::view('/team', 'Company-profile.team');
Route::view('/contact', 'Company-profile.contact');

Route::middleware(['auth'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('services', ServiceController::class);

        Route::resource('galleries', GalleryController::class);

        Route::resource('teams', TeamController::class);

        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');

        Route::delete('/profile', [ProfileController::class, 'destroy'])
            ->name('profile.destroy');
    });

require __DIR__ . '/auth.php';