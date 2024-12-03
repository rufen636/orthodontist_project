<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[ \App\Http\Controllers\IndexController::class,'index'])->name('main.index');

Route::get('/register',[\App\Http\Controllers\Auth\RegisterController::class,'index'])->name('main.register');
Route::post('/register/create',[\App\Http\Controllers\Auth\RegisterController::class,'create'])->name('register');

Route::get('/login',[\App\Http\Controllers\Auth\LoginController::class,'index'])->name('main.login');
Route::post('/login',[\App\Http\Controllers\Auth\LoginController::class,'authenticate'])->name('login');
Route::get('/logout',[\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::get('/profile',[App\Http\Controllers\Profile\IndexController::class,'index'])->name('main.profile')->middleware('auth');
Route::get('/patients',[\App\Http\Controllers\Profile\PatientController::class,'index'])->name('main.patients')->middleware('auth');

//Route::get('/patients/{id}/',[\App\Http\Controllers\Profile\PatientController::class,'create'])->name('main.patients.edit')->middleware('auth');
Route::get('/patients/calculate',[\App\Http\Controllers\Profile\CalculateController::class,'index'])->name('patients.calculate')->middleware('auth');

Route::get('/patients/calculate/biometrics',[\App\Http\Controllers\Calculates\BiometricsController::class,'index'])->name('biometrics.index')->middleware('auth');
