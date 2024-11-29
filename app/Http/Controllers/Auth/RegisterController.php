<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }


    public function create(Request $request){
        $request->validate([
            'login' => ['required', 'string', 'min:4', 'max:255', 'unique:users,login'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'login.unique' => 'Такой логин уже существует. Пожалуйста, выберите другой.',
        ]);
        User::create([
           'login' => $request['login'],
           'password' => Hash::make($request['password']),

        ]);
        return redirect()->route('main.login');

    }
}
