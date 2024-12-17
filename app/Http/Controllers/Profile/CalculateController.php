<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function index($id){
        $userId = auth()->id();
        $patients = Patient::where('user_id', $userId)->get();
        $userId = auth()->id();

        // Проверяем, принадлежит ли пациент текущему пользователю
        $patient = Patient::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();
        return view('profile.calculation',compact('patients','patient'));
    }

}
