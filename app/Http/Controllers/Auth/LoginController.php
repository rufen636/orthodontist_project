<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            // Если пользователь авторизован, редиректим на страницу профиля
            return redirect()->route('main.profile'); // Замените 'profile' на ваш маршрут для профиля
        }
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['login' => $request->login, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('main.profile');
        }else {
            // Если аутентификация не удалась, возвращаемся на страницу входа с ошибкой
            return redirect()->back()->withErrors([
                'login' => 'Неверный логин или пароль.',
            ]);
        }
    }

    public function logout(Request $request){
        Auth::logout(); // Выход пользователя

        $request->session()->invalidate(); // Очистка сессии
        $request->session()->regenerateToken(); // Генерация нового CSRF-токена

        return redirect('/'); // Перенаправление на главную страницу
    }
}
