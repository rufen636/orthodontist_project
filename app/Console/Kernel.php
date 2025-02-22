<?php

namespace App\Console;

use App\Http\Controllers\PaymentController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('subscriptions:renew')->dailyAt('03:00'); // Запуск каждый день в 3:00 ночи
        $schedule->command('subscriptions:deactivate')->daily();
    }


    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}
