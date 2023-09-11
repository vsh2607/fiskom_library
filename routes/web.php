<?php

use App\Http\Controllers\AuthContoller;
use App\Http\Controllers\DashboardController;
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

Route::get('/login', [AuthContoller::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthContoller::class, 'login']);
Route::post('/logout', [AuthContoller::class, 'logout']);


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
