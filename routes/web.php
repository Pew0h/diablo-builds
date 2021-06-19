<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HeroeController;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => ['auth']], function () {
    // routes Admin
    Route::get('/admin/users', [DashboardController::class, 'adminUsers'])->name('admin.users')->middleware('admin');

    // Route Home
    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
    Route::post('/dashboard', [DashboardController::class, 'searchAction'])->name('dashboard.search');

    // Route information héro
    Route::get('/hero/{pseudo}/{heroId}', [HeroeController::class, 'showAction'])->name('hero.show');

    // Route création
    Route::get('/build/create/{pseudo}/{heroId}-{classe}', [HeroeController::class, 'create'])->name('perso.create');
    Route::post('/builds', [HeroeController::class, 'store'])->name('build.store');

    // Route voir les builds
    Route::get('/builds', [HeroeController::class, 'index'])->name('build.index');

    // routes update
    Route::get('/builds/{build}/edit', [HeroeController::class, 'edit'])->name('build.edit');
    Route::put('/builds/{build}', [HeroeController::class, 'update'])->name('build.update');

    // route delete
    Route::delete('/builds/{build}', [HeroeController::class, 'delete'])->name('build.delete');
});

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
