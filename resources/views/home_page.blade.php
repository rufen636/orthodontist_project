@extends('layouts.app')
@section('head')
    <title> Ортодонт | Лечение зубов </title>
    <meta name="description" content="Вылечим ваши зубы" />
@endsection
@section('content')
    <section class="bg-blue-500 text-white text-center py-20">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold">Ваши зубы - наша забота</h1>
            <p class="mt-4 text-lg">Качественная ортодонтическая диагностика и лечение.</p>
        </div>
    </section>
    <section id="services" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800">Наши услуги</h2>
            <div class="mt-12 grid md:grid-cols-3 gap-8">
                <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-xl font-semibold text-gray-700">Диагностика</h3>
                    <p class="mt-4 text-gray-600">Современные методы диагностики для точного определения состояния зубов и челюстей.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-xl font-semibold text-gray-700">Лечение</h3>
                    <p class="mt-4 text-gray-600">Профессиональное лечение различных заболеваний и дефектов зубочелюстной системы.</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center">
                    <h3 class="text-xl font-semibold text-gray-700">Консультации</h3>
                    <p class="mt-4 text-gray-600">Получите советы от опытных ортодонтов, которые помогут вам выбрать лучшее лечение.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
