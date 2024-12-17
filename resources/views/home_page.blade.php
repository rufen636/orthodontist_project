@extends('layouts.app')
@section('head')
    <title> Ортодонт | Лечение зубов </title>
    <meta name="description" content="Вылечим ваши зубы" />
@endsection
@section('content')
    <section class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-20 text-center">
        <h2 class="text-4xl font-extrabold mb-4">Управляйте лечением ваших пациентов с лёгкостью</h2>
        <p class="text-lg mb-8">Программа для ортодонтов, позволяющая работать с биометрией, анализировать боковые ТРГ и создавать план лечения</p>
        <a href="{{route('main.login')}}" class="bg-white text-blue-600 px-6 py-3 rounded-full text-lg font-semibold">Начать</a>
    </section>

    <!-- Biometry Section -->
    <section id="biometry" class="py-16 bg-gray-50">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold mb-8">Биометрия пациента</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="{{ asset('images/main/3.jpeg') }}" alt="Biometry 1" class="mb-4 w-full h-48 object-cover rounded-lg">
                    <h4 class="text-xl font-semibold mb-2">Снимок 1</h4>
                    <p>Описание биометрии пациента, анализ измерений и прочее.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="{{ asset('images/main/1.jpeg') }}" alt="Biometry 2" class="mb-4 w-full h-48 object-cover rounded-lg">
                    <h4 class="text-xl font-semibold mb-2">Снимок 2</h4>
                    <p>Описание биометрии пациента, анализ измерений и прочее.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="{{ asset('images/main/2.jpeg') }}" alt="Biometry 3" class="mb-4 w-full h-48 object-cover rounded-lg">
                    <h4 class="text-xl font-semibold mb-2">Снимок 3</h4>
                    <p>Описание биометрии пациента, анализ измерений и прочее.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- TRG Section -->
    <section id="trg" class="py-16 bg-white">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold mb-8">Анализ боковой ТРГ</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-lg shadow-lg">
                    <img src="{{ asset('images/main/4.jpeg') }}" alt="TRG 1" class="mb-4 w-full h-48 object-cover rounded-lg">
                    <h4 class="text-xl font-semibold mb-2">ТРГ 1</h4>
                    <p>Описание анализа боковой ТРГ и его значимость для диагностики.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-lg">
                    <img src="{{ asset('images/main/5.jpeg') }}" alt="TRG 2" class="mb-4 w-full h-48 object-cover rounded-lg">
                    <h4 class="text-xl font-semibold mb-2">ТРГ 2</h4>
                    <p>Описание анализа боковой ТРГ и его значимость для диагностики.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-lg">
                    <img src="{{ asset('images/main/6.jpeg') }}" alt="TRG 3" class="mb-4 w-full h-48 object-cover rounded-lg">
                    <h4 class="text-xl font-semibold mb-2">ТРГ 3</h4>
                    <p>Описание анализа боковой ТРГ и его значимость для диагностики.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Treatment Plan Section -->
    <section id="treatment" class="py-16 bg-gray-50">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold mb-8">План лечения</h3>
            <p class="text-lg mb-8">Создавайте и отслеживайте план лечения для каждого пациента, учитывая все анализы и рекомендации.</p>
            <a href="#"
               class="bg-blue-600 text-white px-6 py-3 rounded-full text-lg font-semibold">Создать новый план</a>
        </div>
    </section>


@endsection
