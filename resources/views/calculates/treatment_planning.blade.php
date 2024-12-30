@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto mt-16">

        <div class="flex items-center mb-4">
            <button class="text-blue-600 hover:text-blue-800">
                <a href="javascript:history.back()">  &larr;</a>
            </button>
            <h2 class="text-xl font-semibold ml-4">Планирование лечения</h2>
        </div>
        <div class="mb-2">
            <span class="font-medium">Пациент:</span>
            <span class="text-blue-600"> {{ $patient->fullName }} </span>
        </div>
    </div>


     <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md mt-7">
         <form action="{{route('save-data',['id' => $patient->id])}}" method="POST">
             @csrf
        <h1 class="text-2xl font-bold text-center mb-6">Таблица данных пациента</h1>

        <!-- Таблица для ВЧ -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Дефицит места ВЧ</h2>
            <div class="flex items-center mb-4">
                <label class="mr-2">A:</label>
                <input type="text" class="border rounded px-2 py-1 w-20" name="deficit_a" value="{{$planningCalculation->space_vc}}">
            </div>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                <tr>
                    <th class="border border-gray-300 px-2 py-1">Наклон резцов</th>
                    <th class="border border-gray-300 px-2 py-1">3-3</th>
                    <th class="border border-gray-300 px-2 py-1">4-4</th>
                    <th class="border border-gray-300 px-2 py-1">5-5</th>
                    <th class="border border-gray-300 px-2 py-1">6-6</th>
                    <th class="border border-gray-300 px-2 py-1">Дистализация I</th>
                    <th class="border border-gray-300 px-2 py-1">Дистализация II</th>
                    <th class="border border-gray-300 px-2 py-1">Деротация 16</th>
                    <th class="border border-gray-300 px-2 py-1">Деротация 26</th>
                    <th class="border border-gray-300 px-2 py-1">Сепарация (промежуток)</th>
                    <th class="border border-gray-300 px-2 py-1">Место</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="incisor_inclination_up" value="{{$planningCalculation->incisor_inclination_up}}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="value_3_3_vc" value="{{ $planningCalculation->value_3_3_vc }}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="value_4_4_vc" value="{{ $planningCalculation->value_4_4_vc }}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="value_5_5_vc" value="{{ $planningCalculation->value_5_5_vc }}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="value_6_6_vc" value="{{ $planningCalculation->value_6_6_vc }}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="distalization_i" value="{{ $planningCalculation->distalization_i }}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="distalization_ii" value="{{ $planningCalculation->distalization_ii }}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="derotation_16" value="{{ $planningCalculation->derotation_16 }}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="derotation_26" value="{{ $planningCalculation->derotation_26 }}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="separation" value="{{ $planningCalculation->separation }}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="text" class="w-full text-center border rounded" name="space_vc" value="{{ $planningCalculation->space_vc }}"></td>
                </tr>

                </tbody>
            </table>
        </div>

        <!-- Таблица для НЧ -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Дефицит места НЧ</h2>
            <div class="flex items-center mb-4">
                <label class="mr-2">B:</label>
                <input type="text" class="border rounded px-2 py-1 w-20" name="deficit_b" value="{{$planningCalculation->space_nc}}">
            </div>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                <tr>
                    <th class="border border-gray-300 px-2 py-1">Наклон резцов</th>
                    <th class="border border-gray-300 px-2 py-1">3-3</th>
                    <th class="border border-gray-300 px-2 py-1">4-4</th>
                    <th class="border border-gray-300 px-2 py-1">5-5</th>
                    <th class="border border-gray-300 px-2 py-1">6-6</th>
                    <th class="border border-gray-300 px-2 py-1">Дистализация III</th>
                    <th class="border border-gray-300 px-2 py-1">Дистализация IV</th>
                    <th class="border border-gray-300 px-2 py-1">Сепарация (промежуток)</th>
                    <th class="border border-gray-300 px-2 py-1">Место</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="incisor_inclination_down" value="{{ $planningCalculation->incisor_inclination_down }}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="value_3_3_nc" value="{{ $planningCalculation->value_3_3_nc }}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="value_4_4_nc" value="{{ $planningCalculation->value_4_4_nc }}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="value_5_5_nc" value="{{ $planningCalculation->value_5_5_nc }}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="value_6_6_nc" value="{{ $planningCalculation->value_5_5_nc }}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="distalization_iii" value="{{ $planningCalculation->distalization_iii }}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="distalization_iv" value="{{ $planningCalculation->distalization_iv }}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded" name="separation_nc" value="{{ $planningCalculation->separation_nc }}"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="text" class="w-full text-center border rounded" name="space_nc" value="{{ $planningCalculation->space_nc }}"></td>
                </tr>
                </tbody>
            </table>
        </div>
         <div class="scale-container pb-6 relative">
             <p class="p-2">Сепарация</p>
             <div class="scale pt-16">
                 <div class="scale-labels pb-4">

                     <span>5</span>
                     <span>4</span>
                     <span>3</span>
                     <span>2</span>
                     <span>1</span>
                     <span>2</span>
                     <span>3</span>
                     <span>4</span>
                     <span>5</span>

                 </div>
                 <div class="scale-line pt-2 mt-4">

                 </div>
                 <div class="input-container pb-1 pt-6">
                     <input type="text" class=" scale-input  absolute  right-[25%]"  name="sepDown" value="{{ $planningCalculation->sepDown }}"/>
                     <input type="text" class="scale-input absolute  right-[60%]" placeholder=" " name="sepDown" value="{{ $planningCalculation->sepDown }}"/>
                     <input type="text" class="scale-input absolute  left-[60%]" placeholder=" " name="sepDown" value="{{ $planningCalculation->sepDown }}"/>
                     <input type="text" class="scale-input absolute  left-[25%]" placeholder=" " name="sepDown" value="{{ $planningCalculation->sepDown }}"/>
                     <input type="text" class="scale-input absolute  left-[48%]" placeholder=" " name="sepDown" value="{{ $planningCalculation->sepDown }}"/>
                     <input type="text" class="scale-input  absolute top-[20%] right-[25%]" name="sepUp" placeholder=" " value="{{ $planningCalculation->sepUp }}"/>
                     <input type="text" class="scale-input absolute top-[20%]  right-[60%]" name="sepUp" placeholder=" " value="{{ $planningCalculation->sepUp }}"/>
                     <input type="text" class="scale-input absolute top-[20%] left-[60%]" name="sepUp" placeholder=" " value="{{ $planningCalculation->sepUp }}" />
                     <input type="text" class="scale-input absolute top-[20%] left-[25%]" name="sepUp" placeholder=" " value="{{ $planningCalculation->sepUp }}" />
                     <input type="text" class="scale-input absolute  top-[20%] left-[48%]" name="sepUp" placeholder=" " value="{{ $planningCalculation->sepUp }}"/>

                 </div>
             </div>
         </div>

         <!-- Нижняя часть с выбором прикуса -->

         <div class="flex justify-center mt-4 p-4">
             <input type="button" id="calculateBtn" class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" value="Выполнить расчеты">
         </div>
         <!-- Кнопки для скачивания -->

             <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                 Сохранить
             </button>
         </form>
    </div>

        <div class="max-w-lg mx-auto mt-8 bg-white p-6 rounded-lg shadow-md text-center">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Данные уже заполнены</h2>
            <p class="text-gray-600 mb-6">Вы можете скачать отчет в формате PDF.</p>
            <div class="flex justify-center space-x-6">
                <a href="{{route('download-braces', ['id' => $patient->id])}}" ><input type="button"  class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" value="Отчет Брекеты (скачать)"></a>
                <a href="{{route('download-aligners', ['id' => $patient->id])}}"><input type="button" class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" value="Отчет Элайнеры (скачать)"></a>
            </div>
        </div>






    <style>
        .scale-container {
            text-align: center;
            margin-top: 20px;
        }

        .scale {
            position: relative;
        }

        .scale-labels {
            display: flex;
            justify-content: space-between;
            margin-bottom: -10px;
            font-size: 10px;
        }

        .scale-line {
            background-color: #e0e0e0;
            height: 4px;
            border-radius: 2px;
            margin: 0 15px;
            position: relative;
        }

        .scale-indicator {
            position: absolute;
            top: -25px;
            font-size: 14px;
            color: red;
        }

        .scale-indicator.left {
            left: calc(50% - 15px); /* adjust position */
        }

        .scale-indicator.right {
            left: calc(50% + 5px); /* adjust position */
        }

        .input-container {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .scale-input {
            width: 40px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            text-align: center;
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>
    <script>
        document.getElementById('calculateBtn').addEventListener('click', function() {
            // Расчет для поля Место
            let values = [
                "value_3_3_vc", "value_4_4_vc", "value_5_5_vc", "value_6_6_vc",
                "distalization_i", "distalization_ii", "derotation_16", "derotation_26","incisor_inclination_up"

            ];
            let values1 =[
                "incisor_inclination_down","value_3_3_nc","value_4_4_nc","value_5_5_nc","value_6_6_nc","distalization_iii","distalization_iv"
            ];

            let totalSpace1 = 0;
            values1.forEach(function(field) {
                let value = parseFloat(document.querySelector('[name="' + field + '"]').value) || 0;
                totalSpace1 += value;
            });
            totalSpace1=totalSpace1/1.93;
            document.querySelector('[name="space_nc"]').value = totalSpace1.toFixed(1);
            let totalSpace = 0;
            values.forEach(function(field) {
                let value = parseFloat(document.querySelector('[name="' + field + '"]').value) || 0;
                totalSpace += value;
            });
            totalSpace=totalSpace/1.93;
            // Отображаем результат в поле Место
            document.querySelector('[name="space_vc"]').value = totalSpace.toFixed(1);

            const sepInput = document.querySelector('[name="separation"]');

            // Проверяем, найдено ли поле, и получаем его значение
            const sep =( sepInput ? (parseFloat(sepInput.value) || 0) / 5 : 0)*(-1);

            // Обновляем значение в другом месте
            const sepFields = document.querySelectorAll('[name="sepUp"]');
            sepFields.forEach(function(sepField) {
                sepField.value = sep.toFixed(1); // Присваиваем рассчитанное значение
            });

            const sepInput1 = document.querySelector('[name="separation_nc"]');

            // Проверяем, найдено ли поле, и получаем его значение
            const sep1 =( sepInput ? (parseFloat(sepInput1.value) || 0) / 5 : 0)*(-1);

            // Обновляем значение в другом месте
            const sepFieldss = document.querySelectorAll('[name="sepDown"]');
            sepFieldss.forEach(function(sepField1) {
                sepField1.value = sep1.toFixed(1); // Присваиваем рассчитанное значение
            });
        });
    </script>
@endsection
