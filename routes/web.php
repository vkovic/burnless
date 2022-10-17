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

// Submit action result - for any module type
Route::get('/modules/{module}/submit', [ModuleController::class, 'submit'])->name('module.submit');

//
// Dashboard
//

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/dashboard/modules/{module}', function ($module) {
    return Inertia::render($module);
})->name('dashboard.module');

Route::post('/dashboard/modules/{module}', function () {
    dump(request()->all());
})->name('dashboard.module');

//
// Dashboard admin
//

Route::post('/dashboard/action', function () {
    $data = request()->all();

    dump($data);

    if ($data['module'] == 'Score') {

        \App\Models\Action::create([
            'module' => $data['module'],
            'name' => $data['name'],
            'date' => $data['date'],
            'data' => [
                'title' => $data['title'],
                'content' => $data['content'],
            ]
        ]);

    } elseif($data['module'] == 'YesNo') {

        \App\Models\Action::create([
            'module' => $data['module'],
            'name' => $data['name'],
            'date' => $data['date'],
            'data' => [
                'yes' => $data['yes'],
                'no' => $data['no'],
            ]
        ]);
    }

    return redirect()->back();


})->name('dashboard.action');

//
// Other
//

Route::get('/thanks', function () {
    return view('pages.thanks');
})->name('thanks');




require __DIR__.'/auth.php';
