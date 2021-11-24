<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\LeadsController;

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
        'name' => 'Anthony Bird',
        'frameworks'=> [
            'Laravel', 'Vue', 'Inertia'
        ]
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/about', function () {
    return Inertia::render('About');
})->name('about');

// Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
//    $user = Auth::user();
//     $id = $user->id;

//     if (Auth::user()->role !='1'){
//         abort(403);
//     }
//     else {
//         return Inertia::render('Admin');
//     }
// })->name('admin');

Route::get('/admin', ['middleware' => 'IsAdmin', function () {
    return Inertia::render('Admin');
}])->name('admin');

// Route::middleware(['IsAdmin'])->get('/admin', function () {
//     return Inertia::render('Admin');
// })->name('admin');

// Route::middleware(['auth', 'isAdmin'])->group(function () {
//     Route::get('/admin', function () {
//         return Inertia::render('Admin');
//     })->name('admin');
//   });

Route::group(['middleware' => 'auth:sanctum', 'verified'], function (){
    Route::get('/leads/list', [LeadsController::class, 'list'])->name('leads.list');
    Route::get('/leads/add', [LeadsController::class, 'create'])->name('leads.add');
    Route::post('/leads/save', [LeadsController::class, 'store'])->name('leads.save');
    Route::get('/leads/view/{lead}', [LeadsController::class, 'view'])->name('lead.view');
    Route::post('/leads/update', [LeadsController::class, 'update'])->name('lead.update');
});



