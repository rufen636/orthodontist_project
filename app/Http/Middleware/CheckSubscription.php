<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;

class CheckSubscription
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Проверяем подписку
        $subscription = Subscription::where('user_id', $user->id)->first();

        if ($subscription) {
            if ($subscription->expires_at < now()) {
                // Если подписка истекла, меняем статус
                $subscription->update(['status' => 'pending']);
            } else {
                // Если подписка активна, убеждаемся, что статус правильный
                if ($subscription->status !== 'active') {
                    $subscription->update(['status' => 'active']);
                }
            }
        }

        // Если подписка истекла или её нет, ограничиваем доступ
        if (!$subscription || $subscription->status === 'expired') {
            if ($user->patients()->count() > 5) {
                return response()->json(['error' => 'Подписка истекла. Доступ ограничен 5 пациентами.'], 403);
            }
        }

        return $next($request);
    }
}
