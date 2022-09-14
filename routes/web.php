<?php

use App\Http\Controllers\PlayController;
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

Route::get('/go', [PlayController::class, 'go']);

Route::get('/admin', [PlayController::class, 'admin']);

Route::get('burnless', function () {
    return redirect('/burnless-client/index.html');
});

Route::get('/preview/{template}', [PlayController::class, 'preview'])->name('preview');
Route::get('/second', [PlayController::class, 'second'])->name('second');
Route::any('/smilies', [PlayController::class, 'smilies'])->name('smilies');
Route::any('/quote', [PlayController::class, 'quote'])->name('quote');

//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
