@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto  mt-16">

        <div class="flex items-center mb-4">
            <button  class="text-blue-600 hover:text-blue-800">
                <a href="javascript:history.back()">  &larr;</a> <!-- Стрелка влево -->
            </button>
            <h2 class="text-xl font-semibold ml-4">Планирование лечения</h2>
        </div>
        <div class="mb-2">
            <span class="font-medium">Пациент:</span>
            <span class="text-blue-600"> {{ $patient->fullName }} </span>
        </div>
    </div>

    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md mt-7">
        <h1 class="text-2xl font-bold text-center mb-6">Таблица данных пациента</h1>

        <!-- Таблица для ВЧ -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Дефицит места ВЧ</h2>
            <div class="flex items-center mb-4">
                <label class="mr-2">A:</label>
                <input type="text" class="border rounded px-2 py-1 w-20">
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
                    <!-- Ввод данных в строки -->
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                </tr>
                </tbody>
            </table>
        </div>

        <!-- Таблица для НЧ -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Дефицит места НЧ</h2>
            <div class="flex items-center mb-4">
                <label class="mr-2">B:</label>
                <input type="text" class="border rounded px-2 py-1 w-20">
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
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                    <td class="border border-gray-300 px-2 py-1"><input type="number" class="w-full text-center border rounded"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Нижняя часть с выбором прикуса -->
    <div class="text-center my-6">
        <p class="text-lg font-semibold mb-4">Какой прикус хотите скорректировать?</p>
        <div class="flex justify-center space-x-4">
            <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">Дистальный</button>
            <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">Мезиальный</button>
            <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">Глубокий</button>
            <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">Открытый</button>
        </div>
    </div>

    <!-- Кнопки для скачивания -->
    <div class="flex justify-center space-x-6">
        <button class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Отчет Брекеты (скачать)</button>
        <button class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Отчет Элайнеры (скачать)</button>
    </div>
@endsection
