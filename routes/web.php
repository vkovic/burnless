<?php

use App\Http\Controllers\WebModuleController;
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

//
// Client Preview
//

Route::get('burnless', function () {
    return redirect('/burnless-client/index.html');
});

//
// Module Preview
//

Route::get('/preview/{template}', [WebModuleController::class, 'preview'])->name('preview');

//
// Modules
//

Route::get('/modules/getDayData', [WebModuleController::class, 'dayData'])->name('module.dayData');
Route::get('/modules/{module}', [WebModuleController::class, 'get'])->name('module');
Route::post('/modules/{module}', [WebModuleController::class, 'submit'])->name('module');

// Submit module result - for any module type
Route::get('/modules/{module}/submit', [ModuleController::class, 'submit'])->name('module.submit');

//
// Dashboard
//

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

//
// Other
//
Route::get('/thanks', function () {
    return view('pages.thanks');
})->name('thanks');

require __DIR__.'/auth.php';
