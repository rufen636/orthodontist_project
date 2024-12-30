<?php

namespace App\Http\Controllers\Calculates;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\TreatmentPlanning;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class PlanningController extends Controller
{
    public function index($id)
    {
        $userId = auth()->id();
        $patient = Patient::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();
        $planningCalculation = $patient->treatmentplanning()->first();
        return view('calculates.treatment_planning', compact( 'patient','planningCalculation'));
    }
    public function saveData(Request $request, $id)
    {
        $userId = auth()->id();
        $patient = Patient::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        TreatmentPlanning::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'patient_id' => $id,
            ],
            [
                'deficit_a'=>$request['deficit_a'],
                'incisor_inclination_up'=>$request['incisor_inclination_up'],
                'value_3_3_vc'=>$request['value_3_3_vc'],
                'value_4_4_vc'=>$request['value_4_4_vc'],
                'value_5_5_vc'=>$request['value_5_5_vc'],
                'value_6_6_vc'=>$request['value_6_6_vc'],
                'distalization_i'=>$request['distalization_i'],
                'distalization_ii'=>$request['distalization_ii'],
                'derotation_16'=>$request['derotation_16'],
                'derotation_26'=>$request['derotation_26'],
                'separation'=>$request['separation'],
                'incisor_inclination_down'=>$request['incisor_inclination_down'],
                'value_3_3_nc'=>$request['value_3_3_nc'],
                'value_4_4_nc'=>$request['value_4_4_nc'],
                'value_5_5_nc'=>$request['value_5_5_nc'],
                'value_6_6_nc'=>$request['value_6_6_nc'],
                'distalization_iii'=>$request['distalization_iii'],
                'distalization_iv'=>$request['distalization_iv'],
                'separation_nc'=>$request['separation_nc'],
                'space_nc'=>$request['space_nc'],
                'space_vc'=>$request['space_vc'],
                'sepDown'=>$request['sepDown'],
                'sepUp'=>$request['sepUp'],
            ]
            );
        return redirect()->route('planning.index',$patient->id);
    }
    public function downloadBraces($id)
    {
        $userId = auth()->id();
        $patient = Patient::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        $mpdf = new Mpdf([
            'mode' => 'utf-8',  // Убедитесь, что используем правильную кодировку
            'format' => 'A4',
            'encoding' => 'utf-8',
            'fontDir' => storage_path('fonts'), // Указываем папку с шрифтами
            'default_font' => 'dejavu',  // Указываем используемый шрифт
        ]);
        $planningCalculation = $patient->treatmentplanning()->first();
        // Загружаем HTML-контент
        $html = view('reports.brackets',compact('patient','planningCalculation'))->render();

        // Записываем HTML в PDF
        $mpdf->WriteHTML($html);

        // Генерация и загрузка PDF
        return $mpdf->Output('brackets.pdf', 'D');
    }

    public function downloadAligners($id)
    {
        $userId = auth()->id();
        $patient = Patient::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();
        $mpdf = new Mpdf([
            'mode' => 'utf-8',  // Убедитесь, что используем правильную кодировку
            'format' => 'A4',
            'encoding' => 'utf-8',
            'fontDir' => storage_path('fonts'), // Указываем папку с шрифтами
            'default_font' => 'dejavu',  // Указываем используемый шрифт
        ]);
        $planningCalculation = $patient->treatmentplanning()->first();
        // Загружаем HTML-контент
        $html = view('reports.aligners',compact('patient','planningCalculation'))->render();

        // Записываем HTML в PDF
        $mpdf->WriteHTML($html);

        // Генерация и загрузка PDF
        return $mpdf->Output('aligners.pdf', 'D');
    }

}
