<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Subscription;

class TinkoffController extends Controller
{
    public function pay(Request $request)
    {
        $user = auth()->user();
        $amount = 300000; // 3000 рублей в копейках
        $orderId = $request['order']; // Это будет тот orderId, который мы передаем из шаблона
        Log::info('Получен OrderId:', ['orderId' => $orderId]);

        // Обновляем или создаем подписку с уникальным orderId
        $subscription = Subscription::updateOrCreate(
            ['user_id' => $user->id],
            [
                'status' => 'pending',
                'patients_limit' => 5,
                'expires_at' => now()->addMonth(),
                'order_id' => $orderId,  // Сохраняем order_id
            ]
        );

        $data = [
            'TerminalKey' => config('services.tinkoff.terminal_key'),
            'Amount' => $amount,
            'OrderId' => $orderId,  // Передаем уникальный orderId
            'Description' => 'Оплата подписки на сервис',
            'SuccessURL' => route('payment.success'),
            'FailURL' => route('payment.failed'),
            'NotificationURL' => route('tinkoff.webhook'),
            'Recurrent' => 'true',
        ];

        Log::info('Отправка запроса на оплату', $data);

        $response = Http::post('https://rest-api-test.tinkoff.ru/v2', $data);
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
            $orderId = $data['OrderId'];

            Log::info('Получен OrderId:', ['OrderId' => $orderId]);

            // Логируем поиск подписки для пользователя
            Log::info('Поиск подписки по OrderId:', ['orderId' => $orderId]);

            $subscription = Subscription::where('order_id', $orderId)->first();

            if ($subscription) {
                Log::info('Подписка найдена:', ['subscription' => $subscription]);

                // Обновляем подписку
                $subscription->status = 'active';
                $subscription->patients_limit = 300;
                $subscription->expires_at = now()->addMonth(); // Подписка на 1 месяц

                if (isset($data['RebillId'])) {
                    $subscription->rebill_id = $data['RebillId']; // Сохраняем RebillId
                    Log::info('RebillId сохранен: ' . $data['RebillId']);
                }

                $subscription->save();

                // Логируем изменения в подписке
                Log::info('Подписка после изменения:', ['subscription' => $subscription]);
            } else {
                Log::warning('Подписка не найдена для OrderId:', ['orderId' => $orderId]);
            }
        }

        return response('OK', 200)->header('Content-Type', 'text/plain');
    }



    public function success()
    {
        return redirect()->route('main.patients')->with('message', 'Оплата прошла успешно!');
    }

    public function failed()
    {
        return redirect()->route('main.patients')->with('error', 'Оплата не прошла. Попробуйте снова.');
    }

    private function isValidTinkoffSignature($data)
    {
        $expectedToken = $data['Token'] ?? '';
        unset($data['Token']); // Убираем Token перед вычислением

        // Секретный ключ из .env
        $secretKey = config('services.tinkoff.secret_key');
        if (!$secretKey) {
            Log::error('Tinkoff Secret Key not found in config.');
            return false;
        }

        // Получаем OrderId из базы данных
        if (isset($data['OrderId'])) {
            $order = \App\Models\Subscription::where('order_id', $data['OrderId'])->first();
            if (!$order) {
                Log::error('OrderId not found in database', ['OrderId' => $data['OrderId']]);
                return false;
            }
            $data['OrderId'] = $order->order_id; // Убеждаемся, что берем правильное значение из БД
        }

        // Порядок параметров
        $orderedParams = [
            'Amount',
            'CardId',
            'ErrorCode',
            'ExpDate',
            'OrderId',  // Значение теперь берется из БД
            'Pan',
            'Password',  // Секретный ключ идет сюда
            'PaymentId',
            'RebillId',
            'Status',
            'Success',
            'TerminalKey',
        ];

        // Добавляем пароль в массив данных
        $data['Password'] = $secretKey;
        $data['Success'] = "true";

        // Создаем новый массив с параметрами в нужном порядке
        $orderedData = [];
        foreach ($orderedParams as $param) {
            if (isset($data[$param])) {
                $orderedData[$param] = $data[$param];
            }
        }

        // Объединяем значения в строку
        $valuesString = implode('', array_values($orderedData));

        // Генерируем SHA-256
        $calculatedToken = hash('sha256', $valuesString);

        Log::info('Сравнение подписи', [
            'expected' => $expectedToken,
            'calculated' => $calculatedToken,
            'values_string' => $valuesString
        ]);

        return hash_equals($expectedToken, $calculatedToken);
    }



    public function renewSubscription()
    {
        $subscriptions = Subscription::where('status', 'active')
            ->whereDate('expires_at', '<', now()->addDays(3)) // Запуск за 3 дня до истечения подписки
            ->whereNotNull('rebill_id')
            ->get();

        foreach ($subscriptions as $subscription) {
            $data = [
                'TerminalKey' => config('services.tinkoff.terminal_key'),
                'Amount' => 300000, // 3000 рублей
                'OrderId' => $subscription->user_id . '-' . now()->timestamp,
                'RebillId' => $subscription->rebill_id,
            ];

            Log::info('Попытка автоматического списания для пользователя ' . $subscription->user_id, $data);

            $response = Http::post('https://securepay.tinkoff.ru/v2/Charge', $data);
            $result = $response->json();

            if (isset($result['Success']) && $result['Success']) {
                Log::info('Автоматическая оплата успешна для пользователя ' . $subscription->user_id);

                $subscription->status = 'active';
                $subscription->expires_at = now()->addMonth();
                $subscription->save();
            } else {
                Log::warning('Не удалось продлить подписку для пользователя ' . $subscription->user_id, $result);

                // Отмена подписки
                $subscription->update([
                    'status' => 'inactive',
                    'rebill_id' => null, // Убираем RebillId, чтобы не было новых попыток списания
                    'patients_limit' => 5, // Откат до базового тарифа
                ]);

                Log::info('Подписка отменена для пользователя ' . $subscription->user_id);
            }
        }
    }

    public function cancelSubscription()
    {
        $user = auth()->user();
        $subscription = $user->subscription; // Получаем связанную подписку

        if (!$subscription || $subscription->status !== 'active') {
            return response()->json(['message' => 'У вас нет активной подписки'], 400);
        }

        // Обновляем подписку
        if ($subscription) {
            $subscription->update([
                'status' => 'canceled',

            ]);
            Log::info("Статус подписки перед refresh: " . $subscription->status);

            $subscription->refresh();
            Log::info("Статус подписки после refresh: " . $subscription->status);

            Log::info('Подписка обновлена', ['status' => $subscription->status]);
        }

        // Возвращаем успешный ответ
        return redirect()->route('main.patients')->with('success', 'Подписка отменина');
    }



}
