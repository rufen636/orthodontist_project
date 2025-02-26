<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class CheckSubscriptionExpiration extends Command
{
    protected $signature = 'subscription:check-expiration';
    protected $description = 'Проверяет истечение подписок со статусом canceled и сбрасывает лимит пациентов';

    public function handle()
    {
        $users = User::whereHas('subscription', function ($query) {
            $query->where('status', 'canceled')->where('expired_at', '<', Carbon::now());
        })->get();

        foreach ($users as $user) {
            $user->update(['patients_limit' => 5]);

            $this->info("Подписка истекла у пользователя {$user->id}, лимит сброшен до 5.");
        }

        $this->info("Проверка подписок завершена.");
    }
}
