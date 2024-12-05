<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Валидация входящих данных
        $validated = $request->validate([
            'fullName' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'password' => ['string', 'min:8'],
            'email' => 'required|string|max:255',
            'city' => 'required|string|max:255',


        ]);
        $user->fullName = $validated['fullName'];
        $user->city = $validated['city'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];

        // Обновляем пароль, если он был изменен
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
            $user->password_not_hashed = $request['password'];
        }

        $user->save();
        // Обновление данных

        return redirect()->back()->with('success', 'Данные профиля успешно обновлены.');
    }

}
