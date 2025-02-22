<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Subscription;

class TinkoffController extends Controller
{
    public function pay(Request $request)
    {
        $user = auth()->user();
        $amount = 300000; // 3000 рублей (в копейках)

        // Создаём или обновляем подписку
        $subscription = Subscription::updateOrCreate(
            ['user_id' => $user->id],
            [
                'status' => 'pending',
                'patients_limit' => 300,
                'expires_at' => now()->addMonth(),
            ]
        );

        // Формируем данные для API Тинькофф
        $data = [
            'TerminalKey' => config('services.tinkoff.terminal_key'),
            'Amount' => $amount,
            'OrderId' => $user->id,
            'Description' => 'Оплата подписки на сервис',
            'SuccessURL' => route('payment.success'),
            'FailURL' => route('payment.failed'),
            'NotificationURL' => route('tinkoff.webhook'),
            'Recurrent' => 'true', // Включаем автоплатежи
        ];

        Log::info('Отправка запроса на оплату', $data);

        // Отправляем запрос в Тинькофф
        $response = Http::post('https://securepay.tinkoff.ru/v2/Init', $data);
        $result = $response->json();

        if (!empty($result['PaymentURL'])) {
            return redirect()->away($result['PaymentURL']);
        }

        return back()->withErrors('Ошибка при создании платежа');
    }


    public function webhook(Request $request)
    {
        Log::info('Webhook received:', $request->all());

        $data = $request->all();

        if (!$this->isValidTinkoffSignature($data)) {
            Log::warning('Webhook signature invalid', $data);
            return response('Invalid signature', 403);
        }

        if (isset($data['Status']) && $data['Status'] === 'CONFIRMED') {
            $userId = $data['OrderId'];

            $subscription = Subscription::where('user_id', $userId)->first();

            if ($subscription) {
                $subscription->status = 'active';
                $subscription->patients_limit = 300;
                $subscription->expires_at = now()->addMonth(); // Подписка на 1 месяц
                if (isset($data['RebillId'])) {
                    $subscription->rebill_id = $data['RebillId']; // Сохраняем RebillId
                }
                $subscription->save();

                Log::info('Подписка активирована для пользователя: ' . $userId);
            } else {
                Log::warning('Subscription not found for user: ' . $userId);
            }
        }

        return response('OK', 200)->header('Content-Type', 'text/plain');
    }


    public function success()
    {
        return redirect()->route('dashboard')->with('message', 'Оплата прошла успешно!');
    }
    public function failed()
    {
        return redirect()->route('dashboard')->with('error', 'Оплата не прошла. Попробуйте снова.');
    }
    private function isValidTinkoffSignature($data)
    {
        $token = $data['Token'] ?? '';
        unset($data['Token']);

        ksort($data);
        $values = implode('', array_values($data));

        $password = config('services.tinkoff.password');
        $checkToken = hash('sha256', $values . $password);

        return $token === $checkToken;
    }

}
