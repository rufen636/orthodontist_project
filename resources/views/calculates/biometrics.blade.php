@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto  mt-16">
        <div class="flex items-center mb-4">
            <button class="text-blue-600 hover:text-blue-800">
                &larr; <!-- Стрелка влево -->
            </button>
            <h2 class="text-xl font-semibold ml-4">Биометрия (новая)</h2>
        </div>
        <div class="mb-2">
            <span class="font-medium">Пациент:</span>
            <span class="text-blue-600"> Иванов Иван Иванович </span>
        </div>
        <div>
            <span class="font-medium">Дата отчета:</span>
            <span class="text-blue-600"> 01.12.2024</span>
        </div>
    </div>
    <div class=" flex items-start justify-center min-h-screen mt-16 ">
        <!-- Первая колонка -->
        <div class="w-1/3 p-4 ">
            <h1 class="text-xl font-semibold text-gray-700">
                Измерьте мезиодистальные размеры 12 зубов на верхней челюсти и 12 зубов на нижней челюсти и внесите их в
                соответствующие поля
            </h1>
        </div>
        <!-- Вторая колонка -->
        <div class="w-2/3 p-4 ">
            <div class="bg-cover bg-center h-96 relative"
                 style="background-image: url('{{ asset('images/biometrics/teeth.jpg') }}')">
                <!-- Инпуты для зубов -->
                <div class="flex gap-10 top-24 absolute left-10 right-10 mt-3">
                    <input type="text" class="  w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="1">
                    <input type="text" class=" w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="2">
                    <input type="text" class="  w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="3">
                    <input type="text" class="  w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="4">
                    <input type="text" class="  w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="5">
                    <input type="text" class="  w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="6">
                    <input type="text" class="  w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="7">
                    <input type="text" class="  w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="8">
                    <input type="text" class="  w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="9">
                    <input type="text" class="  w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="10">
                    <input type="text" class=" w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="11">
                    <input type="text" class="  w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="12">
                </div>
                <div class="flex gap-x-8 bottom-24 absolute   mb-3 ml-16 mr-16 ">

                    <input type="text" class=" w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="1">
                    <input type="text" class="w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="2">
                    <input type="text" class="w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="3">
                    <input type="text" class="w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="4">
                    <input type="text" class="w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="5">
                    <input type="text" class="w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="6">
                    <input type="text" class="w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="7">
                    <input type="text" class="w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="8">
                    <input type="text" class="w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="9">
                    <input type="text" class="w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="10">
                    <input type="text" class="w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="11">
                    <input type="text" class="w-1/12 h-10 border rounded-md bg-white p-2"
                           placeholder="12">
                </div>
                <!-- Добавьте больше инпутов для остальных зубов -->
            </div>
        </div>
    </div>
@endsection
