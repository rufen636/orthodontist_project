<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TinkoffController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('main.index');

// Регистрация и авторизация
Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('main.register');
Route::post('/register/create', [\App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('main.login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Профиль
Route::middleware(['auth',\App\Http\Middleware\CheckSubscription::class])->group(function () {
    Route::get('/profile', [\App\Http\Controllers\Profile\IndexController::class, 'index'])->name('main.profile');
    Route::patch('/profile/update', [\App\Http\Controllers\Profile\IndexController::class, 'update'])->name('update.profile');

    // Пациенты
    Route::get('/patients', [\App\Http\Controllers\Profile\PatientController::class, 'index'])->name('main.patients');
    Route::post('/patients/create', [\App\Http\Controllers\Profile\PatientController::class, 'create'])->name('create.patient');
    Route::patch('/patients/edit', [\App\Http\Controllers\Profile\PatientController::class, 'edit'])->name('edit.patient');
    Route::delete('/patients/{id}', [\App\Http\Controllers\Profile\PatientController::class, 'delete'])->name('delete.patient');

    // Расчёты
    Route::prefix('/patients/calculate/{id}')->group(function () {
        Route::get('/', [\App\Http\Controllers\Profile\CalculateController::class, 'index'])->name('patients.calculate');

        Route::prefix('/biometrics')->group(function () {
            Route::get('/', [\App\Http\Controllers\Calculates\BiometricsController::class, 'index'])->name('biometrics.index');
            Route::post('/', [\App\Http\Controllers\Calculates\BiometricsController::class, 'calculate'])->name('biometrics.calculate');
            Route::get('/show', [\App\Http\Controllers\Calculates\BiometricsController::class, 'show'])->name('biometrics.show');
        });

        Route::prefix('/trg')->group(function () {
            Route::post('/storeImg', [\App\Http\Controllers\Calculates\SideTWGController::class, 'storeImg'])->name('trg.store.image');
            Route::patch('/store', [\App\Http\Controllers\Calculates\SideTWGController::class, 'store'])->name('trg.store');
            Route::get('/create', [\App\Http\Controllers\Calculates\SideTWGController::class, 'create'])->name('trg.create');
            Route::get('/show', [\App\Http\Controllers\Calculates\SideTWGController::class, 'show'])->name('trg.show');
        });

        Route::prefix('/planning')->group(function () {
            Route::get('/', [\App\Http\Controllers\Calculates\PlanningController::class, 'index'])->name('planning.index');
            Route::post('/save-data', [\App\Http\Controllers\Calculates\PlanningController::class, 'saveData'])->name('save-data');
            Route::get('/download-report/braces', [\App\Http\Controllers\Calculates\PlanningController::class, 'downloadBraces'])->name('download-braces');
            Route::get('/download-report/aligners', [\App\Http\Controllers\Calculates\PlanningController::class, 'downloadAligners'])->name('download-aligners');
        });
    });

    // Платежи
    Route::prefix('/payment')->group(function () {
        Route::get('/show', [PaymentController::class, 'index'])->name('payment.index');
        Route::post('/', [PaymentController::class, 'createPayment'])->name('payment.create');
        Route::get('/tinkoff', [PaymentController::class, 't_bank'])->name('payment.tinkoff');
        Route::post('/pay', [TinkoffController::class, 'pay'])->name('tinkoff.pay');
        Route::get('/success', [TinkoffController::class, 'success'])->name('payment.success');
        Route::get('/failed', [TinkoffController::class, 'failed'])->name('payment.failed');

    });
    Route::post('/subscription/cancel', [TinkoffController::class, 'cancelSubscription'])->name('subscription.cancel');
});



// Webhook (без CSRF-защиты)
Route::post('/webhook', [TinkoffController::class, 'webhook'])
    ->name('tinkoff.webhook')
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);
