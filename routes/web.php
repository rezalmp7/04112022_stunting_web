<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtikelHomeController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\StuntingHomeController;

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
    return view('welcome');
});

Route::get('login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'loginAction']);
Route::get('login/logout', [LoginController::class, 'logout']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/artikel', [ArtikelHomeController::class, 'index']);
Route::get('/artikel/show/{id}', [ArtikelHomeController::class, 'show']);

Route::get('/dataSunting', [StuntingHomeController::class, 'index']);

Route::get('/pencarian', [PencarianController::class, 'index']);
Route::get('/pencarian/{id}/detail', [PencarianController::class, 'show']);

Route::middleware(['loginAdmin'])->group(function () {
    Route::resource('admin/dashboard', DashboardController::class);
    Route::resource('admin/admin', AdminController::class);
    Route::post('admin/admin/store', [AdminController::class, 'store']);
    Route::post('admin/admin/update/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/{id}/destroy', [AdminController::class, 'destroy']);

    Route::resource('admin/artikel', ArtikelController::class);
    Route::post('admin/artikel/store', [ArtikelController::class, 'store']);
    Route::get('admin/artikel/{id}/destroy', [ArtikelController::class, 'destroy']);
    Route::get('admin/artikel/{id}/show', [ArtikelController::class, 'show']);
    Route::post('admin/artikel/update/{id}', [ArtikelController::class, 'update']);

    Route::resource('admin/pemeriksaan', PemeriksaanController::class);
    Route::get('admin/pasien/create', [PemeriksaanController::class, 'createPasien']);
    Route::post('admin/pasien/store', [PemeriksaanController::class, 'storePasien']);
    Route::get('admin/pasien/{id}/edit', [PemeriksaanController::class, 'editPasien']);
    Route::post('admin/pasien/update/{id}', [PemeriksaanController::class, 'updatePasien']);
    Route::get('admin/pasien/{id}/destroy', [PemeriksaanController::class, 'destroyPasien']);
    Route::get('admin/pasien/{id}/show', [PemeriksaanController::class, 'showPasien']);
    Route::get('admin/pemeriksaan/{id}/create', [PemeriksaanController::class, 'create']);
    Route::post('admin/pemeriksaan/{id}/store', [PemeriksaanController::class, 'store']);
    Route::get('admin/pemeriksaan/{id}/edit', [PemeriksaanController::class, 'edit']);
    Route::post('admin/pemeriksaan/{id}/update', [PemeriksaanController::class, 'update']);
    Route::get('admin/pemeriksaan/{id}/destroy', [PemeriksaanController::class, 'destroy']);
});
