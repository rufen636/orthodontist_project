<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PatientController extends Controller
{
    public function index(Request $request){
        $userId = auth()->id();
        $patients = Patient::where('user_id', $userId)->get();
        $user = User::find($userId);
        $request->session()->regenerate();
        $subscription = auth()->user()->subscription()->first();
        $patientsCount = auth()->user()->patients()->count();
        $maxPatients = 5;

        if ($subscription && $subscription->status === 'active') {
            $maxPatients = $subscription->patients_limit ?? 300; // Устанавливаем 300 по умолчанию
        }

        $canAddPatient = $subscription && (
                ($subscription->status === 'inactive' && $subscription->patients_limit === 5) ||
                ($subscription->status === 'pending' && $subscription->patients_limit === 5) ||
                ($subscription->status === 'active' && $subscription->patients_limit === 300) ||
                ($subscription->status === 'canceled' && $subscription->patients_limit === 300)
            );
        return view('profile.patients',compact('patients','user','subscription','canAddPatient','patientsCount'));
    }


    public function create(Request $request)
    {
        // Валидация входящих данных
        $validated = $request->validate([
            'fullName' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $subscription = $user->subscription;

        // Определяем лимит пациентов в зависимости от подписки
        $limit = $subscription && $subscription->status == 'active' ? 300 : 5;

        // Проверяем, не превышен ли лимит
        if ($user->patients()->count() >= $limit) {
            return redirect()->route('main.patients')->with('error', 'Достигнут лимит пациентов');
        }

        // Добавляем пациента
        $user->patients()->create([
            'fullName' => $validated['fullName'],
        ]);

        return redirect()->route('main.patients')->with('success', 'Пациент добавлен!');
    }
    public function edit(Request $request){

    }

    public function delete(Request $id){
        $patient = Patient::findOrFail($id->id);

        // Удаляем связанные биометрические данные
        $patient->biometrics()->delete();

        // Удаляем пациента
        $patient->delete();

        // Перенаправляем с сообщением об успехе
        return redirect()->route('main.patients')->with('success', 'Пациент успешно удалён!');
    }
}
