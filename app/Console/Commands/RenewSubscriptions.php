<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RenewSubscriptions extends Command
{
    protected $signature = 'subscriptions:renew';
    protected $description = 'Проверяет подписки и продлевает их автоматически';

    public function handle()
    {
        $subscriptions = Subscription::where('status', 'active')
            ->whereDate('expires_at', '<=', Carbon::now()) // Проверяем, истекла ли подписка
            ->whereNotNull('rebill_id')
            ->get();

        foreach ($subscriptions as $subscription) {
            $amount = 300000; // 3000 рублей (в копейках)

            $data = [
                'TerminalKey' => config('services.tinkoff.terminal_key'),
                'Amount' => $amount,
                'OrderId' => $subscription->user_id,
                'RebillId' => $subscription->rebill_id, // Используем сохранённый RebillId
                'Description' => 'Продление подписки',
                'NotificationURL' => route('tinkoff.webhook'),
            ];

            $response = Http::post('https://securepay.tinkoff.ru/v2/Charge', $data);
            $result = $response->json();

            if (!empty($result['Success']) && $result['Success'] == true) {
                $subscription->expires_at = Carbon::now()->addMonth(); // Продлеваем на месяц
                $subscription->save();

                Log::info('Продлена подписка для пользователя: ' . $subscription->user_id);
            } else {
                $subscription->status = 'inactive'; // Отключаем подписку, если не удалось списать деньги
                $subscription->save();

                Log::warning('Не удалось продлить подписку для пользователя: ' . $subscription->user_id);
            }
        }

        Log::info('Проверка подписок завершена');
    }
}
