<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthContoller;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Models\Anggota;
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
Route::get('/', [AuthContoller::class, 'index'])->name('login')->middleware('guest');

//Autentikasi
Route::get('/login', [AuthContoller::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthContoller::class, 'login']);
Route::post('/logout', [AuthContoller::class, 'logout']);


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

//Anggota
Route::get('/tambah-anggota', [AnggotaController::class, 'index'])->name('tambah-anggota')->middleware('auth');
Route::post('/tambah-anggota', [AnggotaController::class, 'store'])->middleware('auth');
Route::get('/list-anggota', [AnggotaController::class, 'showListAnggota'])->name('list-anggota')->middleware('auth');
Route::delete('/hapus-anggota/{id}', [AnggotaController::class, 'destroy'])->middleware('auth');
Route::get('/detail-anggota/{id}', [AnggotaController::class, 'show'])->middleware('auth');
Route::post('/edit-anggota/{id}', [AnggotaController::class, 'update'])->middleware('auth');
Route::get('/edit-anggota/{id}', [AnggotaController::class, 'edit'])->middleware('auth');

//Buku
Route::get('/list-buku',[BukuController::class, 'index'])->name('list-buku')->middleware('auth');
Route::post('/upload-file', [BukuController::class, 'store'])->middleware('auth');


//Proses Pinjam - Kembali
Route::get('/pinjam', [PeminjamanController::class, 'index'])->name('pinjam')->middleware('auth');
Route::get('/kembali', [PeminjamanController::class, 'bookReturnPage'])->name('kembali')->middleware('auth');
Route::post('/kembali/{id}', [PeminjamanController::class, 'bookReturn'])->middleware('auth');
Route::post('/pinjam', [PeminjamanController::class, 'store'])->middleware('auth');
Route::get('/fetchDetail/{id}',[PeminjamanController::class, 'fetchBookReturnData'])->middleware('auth');
