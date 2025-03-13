<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Portal\Auth\AuthController;
use App\Http\Controllers\Portal\Home\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('login', [AuthController::class, 'getPageLogin'])->name('login');
Route::get('register', [AuthController::class, 'getPageRegister'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('loginstore');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/', [HomeController::class, 'getPage'])->name('home.index');
Route::get('/details/{id}', [HomeController::class, 'details'])->name('home.details');
Route::post('/reviewSubmit', [HomeController::class, 'reviewSubmit'])->name('home.reviewSubmit');
