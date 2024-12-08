<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[ \App\Http\Controllers\IndexController::class,'index'])->name('main.index');

Route::get('/register',[\App\Http\Controllers\Auth\RegisterController::class,'index'])->name('main.register');
Route::post('/register/create',[\App\Http\Controllers\Auth\RegisterController::class,'create'])->name('register');

Route::get('/login',[\App\Http\Controllers\Auth\LoginController::class,'index'])->name('main.login');
Route::post('/login',[\App\Http\Controllers\Auth\LoginController::class,'authenticate'])->name('login');
Route::get('/logout',[\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::get('/profile',[App\Http\Controllers\Profile\IndexController::class,'index'])->name('main.profile')->middleware('auth');
Route::patch('/profile/update',[App\Http\Controllers\Profile\IndexController::class,'update'])->name('update.profile')->middleware('auth');

Route::get('/patients',[\App\Http\Controllers\Profile\PatientController::class,'index'])->name('main.patients')->middleware('auth');
Route::post('/patients/create',[\App\Http\Controllers\Profile\PatientController::class,'create'])->name('create.patient')->middleware('auth');
Route::patch('/patients/edit',[\App\Http\Controllers\Profile\PatientController::class,'edit'])->name('edit.patient')->middleware('auth');
Route::delete('/patients/{id}/delete',[\App\Http\Controllers\Profile\PatientController::class,'delete'])->name('delete.patient')->middleware('auth');

//Route::get('/patients/{id}/',[\App\Http\Controllers\Profile\PatientController::class,'create'])->name('main.patients.edit')->middleware('auth');
Route::get('/patients/{id}/calculate',[\App\Http\Controllers\Profile\CalculateController::class,'index'])->name('patients.calculate')->middleware('auth');

Route::get('/patients/{id}/calculate/biometrics',[\App\Http\Controllers\Calculates\BiometricsController::class,'index'])->name('biometrics.index')->middleware('auth');
Route::post('/patients/{id}/calculate/biometrics',[\App\Http\Controllers\Calculates\BiometricsController::class,'calculate'])->name('biometrics.calculate')->middleware('auth');
