<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use App\Services\TinkoffService;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $tinkoffService;

    public function __construct(TinkoffService $tinkoffService)
    {
        $this->tinkoffService = $tinkoffService;
    }
    public function index(){
        $user = auth()->user();
        $orderId = uniqid($user->id . '_'); // Генерация уникального orderId с префиксом из user_id
        Subscription::updateOrCreate(
            ['user_id' => $user->id], // Ищем подписку по user_id
            ['order_id' => $orderId]   // Сохраняем только orderId
        );
        return view('payment.tarif',compact('orderId'));
    }

    public function t_bank()
    {
        return view('payment.t_bank');
    }


    public function pay(Request $request)
    {
        $user = Auth::user();
        $amount = 300000; // 3000 руб (копейки)
        $orderId = time();
        $description = "Месячная подписка на 300 пациентов";

        $payment = $this->tinkoffService->initPayment($orderId, $amount, $description, true);

        if ($payment['Success']) {
            Subscription::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'status' => 'inactive', // Ждём подтверждения оплаты
                    'patients_limit' => 300,
                    'expires_at' => now()->addMonth(),
                ]
            );

            // Сохраняем rebill_id
            $user->update(['rebill_id' => $payment['RebillId'] ?? null]);

            return redirect($payment['PaymentURL']);
        }

        return back()->with('error', 'Ошибка при оплате.');
    }

    // Webhook от Тинькофф
    public function webhook(Request $request)
    {
        $data = $request->all();
        Log::info('Tinkoff Webhook:', $data);

        if ($data['Status'] == 'CONFIRMED' && isset($data['RebillId'])) {
            $user = Auth::where('rebill_id', $data['RebillId'])->first();

            if ($user) {
                $user->subscription()->update([
                    'status' => 'active',
                    'expires_at' => now()->addMonth(),
                ]);
            }
        }

        return response()->json(['status' => 'ok']);
    }
    public function rebill()
    {
        $subscriptions = Subscription::where('status', 'active')
            ->whereDate('expires_at', '<', now())
            ->get();

        foreach ($subscriptions as $subscription) {
            $user = $subscription->user;
            if (!$user->rebill_id) continue;

            $payment = $this->tinkoffService->rebill($user->rebill_id, 300000);

            if ($payment['Success']) {
                $subscription->update(['expires_at' => now()->addMonth()]);
            } else {
                $subscription->update(['status' => 'expired']);
            }
        }

    }
}
