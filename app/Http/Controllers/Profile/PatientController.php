<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index(){
        $userId = auth()->id();
        $patients = Patient::where('user_id', $userId)->get();
        return view('profile.patients',compact('patients'));
    }

    public function create(Request $request){
        // Валидация входящих данных
        $validated = $request->validate([
            'fullName' => 'required|string|max:255'
        ]);
        auth()->user()->patients()->create([
            'fullName' => $validated['fullName'],
        ]);
        return redirect()->route('main.patients')->with('success', 'Пациент добавлен!');
    }
    public function edit(Request $request){

    }

    public function delete(Request $id){
        // Проверяем, существует ли пациент
        $patient = Patient::findOrFail($id->id);

        // Удаляем пациента
        $patient->delete();

        // Перенаправляем с сообщением об успехе
        return redirect()->route('main.patients')->with('success', 'Пациент успешно удалён!');
    }
}
