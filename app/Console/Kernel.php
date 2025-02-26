<?php

namespace App\Console;

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TinkoffController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {

        $schedule->call(function () {
            app(\App\Http\Controllers\TinkoffController::class)->renewSubscription();
        })->daily();
        $schedule->command('subscription:check-expiration')->hourly();

    }
    protected $routeMiddleware = [
        'check.subscription' => \App\Http\Middleware\CheckSubscription::class,
    ];



    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}
