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
Route::get('/patients/calculate/{id}',[\App\Http\Controllers\Profile\CalculateController::class,'index'])->name('patients.calculate')->middleware('auth');

Route::get('/patients/calculate/{id}/biometrics',[\App\Http\Controllers\Calculates\BiometricsController::class,'index'])->name('biometrics.index')->middleware('auth');
Route::post('/patients/calculate/{id}/biometrics',[\App\Http\Controllers\Calculates\BiometricsController::class,'calculate'])->name('biometrics.calculate')->middleware('auth');
Route::get('/patients/calculate/{id}/biometrics/show',[\App\Http\Controllers\Calculates\BiometricsController::class,'show'])->name('biometrics.show')->middleware('auth');

Route::post('/patients/calculate/{id}/trg/storeImg',[\App\Http\Controllers\Calculates\SideTWGController::class,'storeImg'])->name('trg.store.image')->middleware('auth');
Route::patch('/patients/calculate/{id}/trg/store',[\App\Http\Controllers\Calculates\SideTWGController::class,'store'])->name('trg.store')->middleware('auth');
Route::get('/patients/calculate/{id}/trg/create',[\App\Http\Controllers\Calculates\SideTWGController::class,'create'])->name('trg.create')->middleware('auth');
Route::get('/patients/calculate/{id}/trg/show',[\App\Http\Controllers\Calculates\SideTWGController::class,'show'])->name('trg.show')->middleware('auth');

Route::get('/patients/calculate/{id}/planning',[\App\Http\Controllers\Calculates\PlanningController::class,'index'])->name('planning.index')->middleware('auth');

Route::post('/patients/calculate/{id}/planning/save-data', [\App\Http\Controllers\Calculates\PlanningController::class, 'saveData'])->name('save-data')->middleware('auth');;
Route::get('/patients//calculate/{id}/planning/download-report/braces', [\App\Http\Controllers\Calculates\PlanningController::class, 'downloadBraces'])->name('download-braces')->middleware('auth');;
Route::get('/patients/calculate/{id}/planning/download-report/aligners', [\App\Http\Controllers\Calculates\PlanningController::class, 'downloadAligners'])->name('download-aligners')->middleware('auth');;
