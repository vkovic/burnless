<?php

use App\Http\Controllers\ModuleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/settings', function () {
    // Settings should get order of appearing
    return [
        'quotes' => now()->addHours(1),
        'smilies' => now()->addHours(1)->addMinutes(12),
    ];
});

Route::get('/go', [ModuleController::class, 'go']);

Route::get('/admin', [ModuleController::class, 'admin']);

Route::get('burnless', function () {
    return redirect('/burnless-client/index.html');
});

Route::get('/preview/{template}', [ModuleController::class, 'preview'])->name('preview');
Route::get('/second', [ModuleController::class, 'second'])->name('second');
Route::any('/smilies', [ModuleController::class, 'smilies'])->name('smilies');
Route::any('/quote', [ModuleController::class, 'quote'])->name('quote');

Route::get('/dashboard', function () {
    return Inertia::render('DashboardDefault');
})->middleware(['auth', 'verified'])->name('dashboard-default');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

require __DIR__.'/auth.php';
