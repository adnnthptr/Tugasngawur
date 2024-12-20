<?php

use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PelangganController;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('manager', ManagerController::class);
Route::get('/manager/move-phone-to-task', [ManagerController::class, 'movePhoneToTask'])->name('manager.movePhoneToTask');
Route::get('manager/laporan/cetak', [ManagerController::class, 'laporan']);

Route::resource('pelanggan', PelangganController::class);
});