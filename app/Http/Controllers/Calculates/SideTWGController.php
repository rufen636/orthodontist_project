<?php

namespace App\Http\Controllers\Calculates;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\SideTWG;
use Illuminate\Http\Request;

class SideTWGController extends Controller
{
    public function create($id)
    {
        $patient = Patient::findOrFail($id);
        return view('tpr.create', compact('patient'));
    }

    public function store(Request $request, $id)
    {


        $patient = Patient::findOrFail($id);
        $imagePath = $request->file('image')->store('trg_images', 'public');

        // Пример расчетов
        $calculations = [
            'scale' => $request->input('scale', '10'),
            'points' => [
                'A' => [100, 200],
                'B' => [150, 250],
            ],
        ];

        $tprCalculation = Sidetwg::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'patient_id' => $id,
            ],
            [
            'patient_id' => $patient->id,
            'image_path' => $imagePath,
            'calculations' => $calculations,
        ]);

        return redirect()->route('trg.show', $patient->id);
    }

    public function show($id)
    {
        $userId = auth()->id();
        $patient = Patient::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();
        $tprCalculation = Sidetwg::with('patient')->findOrFail($id);
        return view('calculates.side_twg', compact('tprCalculation','patient'));
    }
}
