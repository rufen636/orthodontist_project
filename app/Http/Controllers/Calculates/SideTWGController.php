<?php

namespace App\Http\Controllers\Calculates;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\SideTWG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SideTWGController extends Controller
{
    public function create($id)
    {
        $userId = auth()->id();
        $patient = Patient::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();
        $trgCalculation = $patient->sidetwg()->first();
        return view('calculates.side_twg', compact('patient','trgCalculation'));
    }

    public function storeImg(Request $request, $id)
    {
        $userId = auth()->id();
        $patient = Patient::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();

        // Проверка наличия файла
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Получаем файл
            $file = $request->file('image');

            // Проверяем расширение файла
            $extension = $file->getClientOriginalExtension();
            if (!in_array($extension, ['png', 'jpg', 'jpeg'])) {
                return response()->json(['error' => 'Invalid image format'], 400);
            }

            // Генерация имени для файла
            $imageName = 'image_' . time() . '.' . $extension;

            // Сохранение файла в публичную директорию
            $filePath = $file->storeAs('images/points', $imageName, 'public');

            // Обновление или создание записи SideTWG
            SideTWG::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'patient_id' => $id,
                ],
                [
                    'image_path' => $filePath, // Путь уже будет относительный к `public/storage`
                ]
            );

            // Редирект обратно к созданию ТРГ
            return redirect()->route('trg.create', $patient->id);
        }

        // Если файл не был передан или он некорректный
        return response()->json(['error' => 'Image not provided or invalid'], 400);
    }


    public function store(Request $request, $id)
    {
dd($request);
        SideTWG::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'patient_id' => $id,
            ],
            [
                'SNA'=>$request['SNA'],
                'SNB'=>$request['SNB'],
                'ANB'=>$request['ANB'],
                'Wits'=>$request['Wits'],
                'Beta'=>$request['Beta'],
                'SNMP'=>$request['SNMP'],
                'SNNL'=>$request['SNNL'],
                'NLMP'=>$request['NLMP'],
                'Go'=>$request['Go'],
                'SGoNMe'=>$request['SGoNMe'],
                'ISN'=>$request['ISN'],
                'INL'=>$request['INL'],
                'IMP'=>$request['IMP'],
                'Ii'=>$request['Ii']
            ]
        );
        $userId = auth()->id();
        $patient = Patient::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();
        return redirect()->route('trg.show',$patient->id);
    }

    public function show($id)
    {
        $userId = auth()->id();
        $patient = Patient::where('id', $id)
            ->where('user_id', $userId)
            ->firstOrFail();
        $trgCalculation = $patient->sidetwg()->first();
        return view('calculates.side_twg_show', compact('trgCalculation','patient'));
    }
}
