<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TinkoffService;
use Illuminate\Support\Facades\Log;

class TinkoffController extends Controller
{
    protected $tinkoffService;

    public function __construct(TinkoffService $tinkoffService)
    {
        $this->tinkoffService = $tinkoffService;
    }

    // Метод для инициализации платежа
    public function pay(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $orderId = time(); // Генерируем уникальный номер заказа
        $amount = $request->amount;
        $description = "Оплата заказа #{$orderId}";

        $payment = $this->tinkoffService->initPayment($orderId, $amount, $description);

        if (isset($payment['Success']) && $payment['Success']) {
            return redirect($payment['PaymentURL']); // Перенаправляем пользователя на оплату
        }

        return back()->with('error', 'Ошибка при создании платежа');
    }

    public function checkStatus(Request $request)
    {
        $orderId = $request->order_id; // передай номер заказа
        $status = $this->tinkoffService->checkPaymentStatus($orderId);

        return response()->json($status);
    }

    // Метод для обработки webhook-уведомлений от Тинькофф
    public function webhook(Request $request)
    {
        $data = $request->all();
        Log::info('Tinkoff Webhook:', $data); // Логируем входящие данные

        if ($data['Status'] == 'CONFIRMED') {
            // Здесь можно обновить статус заказа в БД
        }

        return response()->json(['status' => 'ok']);
    }
}
