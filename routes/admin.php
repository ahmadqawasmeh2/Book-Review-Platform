<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Book\BookController;
use App\Http\Controllers\Admin\Home\HomeController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->name('auth.')->controller(LoginController::class)->group(function ($route) {
    $route->get('/login', 'getPage')->name('getPage');
    $route->post('login', 'login')->name('login');
    $route->post('logout', 'logout')->name('logout')->middleware('auth');
});


Route::prefix('home')->name('home.')->middleware('auth')->controller(HomeController::class)->group(function ($route) {
    $route->get('/', 'getPage')->name('index');
});

Route::prefix('book')->name('book.')->middleware('auth')->controller(BookController::class)->group(function ($route) {
    $route->get('/', 'getPage')->name('index');
    $route->get('dataTable', 'dataTable')->name('dataTable');
    $route->get('create', 'create')->name('create');
    $route->get('/{id}', 'show')->name('show');
    $route->post('store', 'store')->name('store');
});
