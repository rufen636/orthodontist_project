<?php

namespace App\Console;

use App\Http\Controllers\PaymentController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('subscriptions:deactivate')->daily();
        $schedule->call(function () {
            app(TinkoffController::class)->renewSubscription();
        })->daily();

    }
    protected $routeMiddleware = [
        'check.subscription' => \App\Http\Middleware\CheckSubscription::class,
    ];



    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}
