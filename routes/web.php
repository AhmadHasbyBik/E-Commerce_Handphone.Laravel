<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Collection;

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

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('pesan/{id}', [PesanController::class, 'index']);
Route::post('pesan/{id}', [PesanController::class, 'pesan']);
Route::get('check-out', [PesanController::class, 'check_out']);
Route::delete('check-out/{id}', [PesanController::class, 'delete']);
Route::get('konfirmasi-check-out', [PesanController::class, 'konfirmasi']);

Route::get('profile', [ProfileController::class, 'index']);
Route::post('profile', [ProfileController::class, 'update'])->name('profile');

Route::get('history', [HistoryController::class, 'index']);
Route::get('history/{id}', [HistoryController::class, 'detail']);

Route::get('admin', [AdminController::class, 'index'])->name('admin');
Route::get('/tambahpegawai',[AdminController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata',[AdminController::class, 'insertdata'])->name('insertdata');
Route::get('/tampilkandata/{id}',[AdminController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}',[AdminController::class, 'updatedata'])->name('updatedata');
Route::post('/update', [AdminController::class, 'update'])->name('update');
Route::get('/delete/{id}',[AdminController::class, 'delete'])->name('delete');