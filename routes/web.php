<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/projects', ProjectController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
