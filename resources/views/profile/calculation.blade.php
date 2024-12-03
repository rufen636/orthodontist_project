@extends('layouts.app')
@section('head')
    <title> Ортодонт | Лечение зубов </title>
    <meta name="description" content="Вылечим ваши зубы"/>
@endsection
@section('content')

    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <h1 class="text-2xl font-bold mb-6">Добавление расчёта</h1>

        <!-- Кнопка открытия модального окна -->
        <button id="open-modal-btn"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
            Добавить расчёт
        </button>

        <!-- Модальное окно -->
        <div id="modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 shadow-lg w-80 relative">
                <!-- Закрытие модального окна -->
                <button id="close-modal-btn"
                        class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 transition">&times;
                </button>

                <h2 class="text-xl font-semibold mb-4 text-center">Выберите тип расчёта</h2>

                <!-- Кнопки выбора -->
                <div class="space-y-4">
                    <button class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                        <a href="{{route('biometrics.index')}}">
                            Боковая ТРГ
                        </a>
                    </button>
                    <button class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                        Планирование лечения
                    </button>
                    <button class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                        Биометрия
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript для работы модального окна -->
    <script>
        const modal = document.getElementById('modal');
        const openModalBtn = document.getElementById('open-modal-btn');
        const closeModalBtn = document.getElementById('close-modal-btn');

        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    </script>
@endsection
