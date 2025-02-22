<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RenewSubscriptions extends Command
{
    protected $signature = 'subscriptions:renew';
    protected $description = 'Автоматически продлевает подписки пользователей';

    public function handle()
    {
        $subscriptions = Subscription::where('expires_at', '<', now())->whereNotNull('rebill_id')->get();

        foreach ($subscriptions as $subscription) {
            $response = Http::post('https://securepay.tinkoff.ru/v2/Charge', [
                'TerminalKey' => config('services.tinkoff.terminal_key'),
                'RebillId' => $subscription->rebill_id,
                'Amount' => 300000, // Цена подписки
            ]);

            $paymentData = $response->json();

            if ($paymentData['Success']) {
                // Продляем подписку
                $subscription->update(['expires_at' => now()->addMonth()]);
            } else {
                // Если платеж не прошел, можно уведомить пользователя
                Log::error("Ошибка продления подписки: {$subscription->user_id}");
            }
        }
    }
}
