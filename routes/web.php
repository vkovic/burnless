<?php

use App\Http\Controllers\WebModuleController;
use App\Models\Action;
use App\Models\Score;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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

// Preview of web modules
Route::get('/modules/web/score', function () {
    $action = Action::where('date', now()->format('Y-m-d'))->get()->firstOrFail();

    return Inertia::render('Score')->with([
        'title' => $action->data['title'],
        'content' => $action->data['content'],
    ]);
});

// Submit action result - for any module type
Route::any('/modules/{module}/submit-action', function ($module) {
    Score::create([
        'session_id' => Session::getId(),
        'type' => request()->get('type'),
        'module' => $module,
        'score' => request()->get('score'),
    ]);

    return redirect()->route('thanks');
})->name('action.submit');


//// Dashboard
//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard')->with([
//        'totalUsers' => User::count(),
//        'totalActions' => Action::count(),
//        'todayUsers' => 3,
//        'todayActions' => Action::where('date', now()->format('Y-m-d'))->count(),
//    ]);
//})->name('dashboard');
//
//// Dashboard admin
//Route::get('/dashboard/admin/{module}', function ($module) {
//    return Inertia::render('Admin/' . $module);
//})->name('dashboard.module');
//Route::post('/dashboard/action', function () {
//    $data = request()->all();
//
//    if ($data['module'] == 'Score') {
//        Action::create([
//            'module' => $data['module'],
//            'name' => $data['name'],
//            'date' => $data['date'],
//            'data' => [
//                'title' => $data['title'],
//                'content' => $data['content'],
//            ]
//        ]);
//    } elseif ($data['module'] == 'YesNo') {
//        Action::create([
//            'module' => $data['module'],
//            'name' => $data['name'],
//            'date' => $data['date'],
//            'data' => [
//                'title' => $data['title'],
//                'content' => $data['content'],
//                'yes' => $data['yes'],
//                'no' => $data['no'],
//            ]
//        ]);
//    }
//
//    return redirect()->back();
//})->name('dashboard.action');
//

// Pages
Route::get('/thanks', function () {
    return view('pages.thanks');
})->name('thanks');

