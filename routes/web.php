<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[ \App\Http\Controllers\IndexController::class,'index'])->name('main.index');

Route::get('/register',[\App\Http\Controllers\Auth\RegisterController::class,'index'])->name('main.register');

Route::get('/login',[\App\Http\Controllers\Auth\LoginController::class,'index'])->name('main.login');
