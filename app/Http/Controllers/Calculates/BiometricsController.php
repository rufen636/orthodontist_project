<?php

namespace App\Http\Controllers\Calculates;

use App\Http\Controllers\Controller;
use App\Models\Biometrics;
use App\Models\Patient;
use Illuminate\Http\Request;

class BiometricsController extends Controller
{
    public function index($id)
    {
        $userId = auth()->id();
        $patient = Patient::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        // Используем метод связи
        $biometrics = $patient->biometrics()->first();

        return view('calculates.biometrics', compact( 'patient', 'biometrics'));
    }

    public function calculate(Request $request,$id)
    {
        $userId = auth()->id();
        $patient = Patient::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();
        $currentPatient = Patient::where('user_id', auth()->id())->first();

        if ($currentPatient) {
            session(['current_patient_id' => $currentPatient->id]); // Сохраняем ID пациента в сессию
        } else {
            dd('Пациент не найден');
        }


        // Пример расчета Индекса Тона
        // Извлечение данных из запроса

        // ... и так далее для всех данных
        $toothSumUp = 0;
        for ($i = 1; $i <= 12; $i++) {
            $toothSumUp += $request['tooth' . $i];
        }
        $toothSumDown = 0;
        for ($i = 13; $i <= 24; $i++) {
            $toothSumDown += $request['tooth' . $i];
        }

        // Расчет Индекса Тона
        $tonIndex = $this->calculateTonIndex($toothSumUp,$toothSumDown);
        $sumUpper = 0;
        for ($i = 5; $i <= 8; $i++) {
            $sumUpper += $request['tooth' . $i];
        }
        $sumLower =0;
        for ($i = 17; $i <= 20; $i++) {
            $sumLower += $request['tooth' . $i];
        }
        $normUpper = $sumUpper * 1.33;
        $normLower = $sumLower * 1.29;
        $deltaUpper = $sumUpper - $normUpper;
        $deltaLower = $sumLower - $normLower;

        $adjustmentUpper = null;
        if ($deltaUpper > 0) {
            // Сепарация
            $adjustmentUpper = $deltaUpper; // Суммарная корректировка

        } elseif ($deltaUpper < 0) {
            // Реставрация
            $adjustmentUpper =  abs($deltaUpper);// Суммарная корректировка

        } else {
            $adjustmentUpper = 0;
        }

// Проверяем нижние резцы
        $adjustmentLower = null;
        if ($deltaLower > 0) {
            // Сепарация
            $adjustmentLower =  $deltaLower; // Суммарная корректировка

        } elseif ($deltaLower < 0) {
            // Реставрация
            $adjustmentLower = abs($deltaLower);
        } else {
            $adjustmentLower = 0;
        }

        // Расчет ширины зубного ряда для Пона
        $pon1 = $request['premolarUp'];
        $pon2 = $request['molarUp'];
        $pon3 = $request['molarDown'];
        $pon4 = $request['premolarUp'];

        $frontWidth =$sumUpper*100/80;
        $backWidth =$sumUpper*100/64;
        // Пример вычисления дефицита по Пону
        $ponWidth = $this->calculatePonWidth($pon1, $pon2, $pon3, $pon4,$frontWidth,$backWidth);

        // Расчет длины переднего отрезка по Коркхаузу
        $leadingEdge1 = $request['leading_edge_length1'];
        $leadingEdge2 = $request['leading_edge_length2'];
        $corhausAnalysis = $this->calculateCorhausAnalysis($leadingEdge1, $leadingEdge2);

        // Соотношение по Герлаху (например, просто вычисления с использованием данных сегментов)
        $segments = [
            'segment1' => $request['segment1'],
            'segment2' => $request['segment2'],
            'segment3' => $request['segment3'],
            'segment4' => $request['segment4'],
        ];
        $gerlachAnalysis = $this->calculateGerlachAnalysis($segments);

        $segment1 =$request['segment1'];
        $segment2 =$request['segment2'];
        $segment3 =$request['segment3'];
        $segment4 =$request['segment4'];
            // Анализ по Tanaka-Johnston (например, предполагаемая ширина моляров)
        $tanakaAnalysis = $this->calculateTanakaJohnston($segment1, $segment2, $segment3,$segment4);
        $currentPatientId = session('current_patient_id');

        if ($currentPatientId) {
            Biometrics::updateOrCreate([
                'tonIndex' => $tonIndex,
                'adjustmentUpper' => $adjustmentUpper,
                'adjustmentLower' => $adjustmentLower,
                'ponWidth_14_24' => $ponWidth['14-24'],
                'ponWidth_16_26' => $ponWidth['16-26'],
                'ponWidth_44_34' => $ponWidth['44-34'],
                'ponWidth_46_36' => $ponWidth['46-36'],
                'user_id' => auth()->id(), // Текущий пользователь
                'patient_id' => $id // ID текущего пациента
            ]);
        } else {
            dd('Текущий пациент не установлен');
        }
        $userId = auth()->id();
        $patient = Patient::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        // Используем метод связи
        $biometrics = $patient->biometrics()->first();

        // Возвращаем результаты в представление
        return view('calculates.biometrics',compact('tonIndex','biometrics','ponWidth','corhausAnalysis','gerlachAnalysis','tanakaAnalysis','patient','adjustmentUpper','adjustmentLower'));
    }

    // Метод для расчета Индекса Тона
    private function calculateTonIndex($toothSumUp,$toothSumDown)
    {
        $result = $toothSumUp  / $toothSumDown;
        return $result; // Примерное значение
    }

    // Метод для расчета ширины зубного ряда по Пону
    private function calculatePonWidth($pon1, $pon2, $pon3, $pon4,$frontWidth,$backWidth)
    {
        // Пример расчета дефицита ширины
        return [
            '14-24' => $pon1 - $frontWidth,
            '16-26' => $pon2 - $backWidth,
            '44-34' => $pon3 - $frontWidth,
            '46-36' => $pon4 - $backWidth
        ];
    }

    // Метод для анализа Коркхауза
    private function calculateCorhausAnalysis($leadingEdge1, $leadingEdge2)
    {
        // Пример расчета длины переднего отрезка
        return [
            'upper' => round($leadingEdge1 - 0.35, 2),
            'lower' => round($leadingEdge2 + 1.65, 2)
        ];
    }

    // Метод для анализа Герлаха
    private function calculateGerlachAnalysis($segments)
    {
        // Пример расчета по Герлаху
        $result = [];
        foreach ($segments as $key => $value) {
            // Простое условие для примера
            $result[$key] = $value - 0; // Могут быть другие расчеты в зависимости от условий
        }
        return $result;
    }

    // Метод для анализа по Tanaka-Johnston
    private function calculateTanakaJohnston($segment1, $segment2, $segment3,$segment4)
    {
        // Пример простого расчета для Tanaka-Johnston
        return [
            'segment1' => $segment1 - 11,
            'segment2' => $segment2 - 11,
            'segment3' => $segment3 - 10.5,
            'segment4' => $segment4 - 10.5
        ];
    }
    public function show($id)
    {
        $userId = auth()->id();
        $patient = Patient::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();
        $biometrics = $patient->biometrics()->first();

        return view('calculates.biometrics',compact('biometrics','patient'));
    }
}
