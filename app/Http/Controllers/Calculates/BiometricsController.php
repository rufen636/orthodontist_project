<?php

namespace App\Http\Controllers\Calculates;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class BiometricsController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $patients = Patient::where('user_id', $userId)->get();
        return view('calculates.biometrics', compact('patients'));
    }

    public function calculate(Request $request)
    {
        $userId = auth()->id();
        $patients = Patient::where('user_id', $userId)->get();
//        $validatedData = $request->validate([
//            'tooth1' => 'required|integer',
//            'tooth2' => 'required|integer',
//            'tooth3' => 'required|integer',
//            'tooth4' => 'required|integer',
//            'tooth5' => 'required|integer',
//            'tooth6' => 'required|integer',
//            'tooth7' => 'required|integer',
//            'tooth8' => 'required|integer',
//            'tooth9' => 'required|integer',
//            'tooth10' => 'required|integer',
//            'tooth11' => 'required|integer',
//            'tooth12' => 'required|integer',
//            'tooth13' => 'required|integer',
//            'tooth14' => 'required|integer',
//            'tooth15' => 'required|integer',
//            'tooth16' => 'required|integer',
//            'tooth17' => 'required|integer',
//            'tooth18' => 'required|integer',
//            'tooth19' => 'required|integer',
//            'tooth20' => 'required|integer',
//            'tooth21' => 'required|integer',
//            'tooth22' => 'required|integer',
//            'tooth23' => 'required|integer',
//            'tooth24' => 'required|integer',
//            'row_width1' => 'required|integer',
//            'row_width2' => 'required|integer',
//            'row_width3' => 'required|integer',
//            'row_width4' => 'required|integer',
//            'leading_edge_length1' => 'required|integer',
//            'leading_edge_length2'=> 'required|integer',
//            'location_for_canine1'=> 'required|integer',
//            'location_for_canine2'=> 'required|integer',
//            'location_for_canine3'=> 'required|integer',
//            'location_for_canine4'=> 'required|integer',
//            'segment1' => 'required|integer',
//            'segment2' => 'required|integer',
//            'segment3' => 'required|integer',
//            'segment4' => 'required|integer',
//        ]);
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

        // Расчет Индекса Тона (предположим, что это просто как пример)
        $tonIndex = $this->calculateTonIndex($toothSumUp,$toothSumDown);

        // Расчет ширины зубного ряда для Пона
        $pon1 = $request['row_width1'];
        $pon2 = $request['row_width2'];
        $pon3 = $request['row_width3'];
        $pon4 = $request['row_width4'];

        // Пример вычисления дефицита по Пону
        $ponWidth = $this->calculatePonWidth($pon1, $pon2, $pon3, $pon4);

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
        session()->flash('form_submitted', true);

        session()->flash('tonIndex', $tonIndex);
        session()->flash('ponWidth', $ponWidth);
        session()->flash('corhausAnalysis', $corhausAnalysis);
        session()->flash('gerlachAnalysis', $gerlachAnalysis);
        session()->flash('tanakaAnalysis', $tanakaAnalysis);

        // Возвращаем результаты в представление
        return view('calculates.biometrics',compact('tonIndex','ponWidth','corhausAnalysis','gerlachAnalysis','tanakaAnalysis','patients'));
    }

    // Метод для расчета Индекса Тона
    private function calculateTonIndex($toothSumUp,$toothSumDown)
    {
        $result = $toothSumDown  / $toothSumUp;
        return $result; // Примерное значение
    }

    // Метод для расчета ширины зубного ряда по Пону
    private function calculatePonWidth($pon1, $pon2, $pon3, $pon4)
    {
        // Пример расчета дефицита ширины
        return [
            '14-24' => $pon1 - 5,
            '16-26' => $pon2 - 6.25,
            '44-34' => $pon3 - 5,
            '46-36' => $pon4 - 6.25
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
}
