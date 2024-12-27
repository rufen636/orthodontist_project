@extends('layouts.app')

@section('head')
    <title>Ортодонт | Лечение зубов</title>
    <meta name="description" content="Вылечим ваши зубы"/>
@endsection

@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto mt-16">
        <div class="flex items-center mb-4">
            <button class="text-blue-600 hover:text-blue-800">
                <a href="javascript:history.back()"> &larr;</a>
            </button>
            <h2 class="text-xl font-semibold ml-4">Расчёты</h2>
        </div>
        <div class="mb-2">
            <span class="font-medium">Пациент:</span>
            <span class="text-blue-600">{{ $patient->fullName }}</span>
        </div>
    </div>

    <div class="flex flex-col items-center justify-center mt-5 bg-white">
        <h1 class="text-2xl font-bold mb-6">Добавление расчёта</h1>
        <div class="flex gap-5">
            @if($patient->biometrics()->exists())
                <div>
                    <button
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
                        <a href="{{ route('biometrics.index', ['id' => $patient->id]) }}">Биометрия</a>
                    </button>
                </div>
            @endif
            @if($patient->sidetwg()->exists())
                    <div>
                        <button
                            class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
                            <a href="{{ route('trg.show', ['id' => $patient->id]) }}">Боковая ТРГ</a>
                        </button>
                    </div>
            @endif
            <div>
                <!-- Кнопка открытия модального окна -->
                <button id="open-modal-btn"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
                    Добавить расчёт
                </button>
            </div>
        </div>

        <!-- Модальное окно выбора типа расчёта -->
        <div id="modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50"
             role="dialog" aria-hidden="true">
            <div class="bg-white rounded-lg p-6 shadow-lg w-80 relative">
                <!-- Закрытие модального окна -->
                <button id="close-modal-btn"
                        class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 transition" aria-label="Закрыть">
                    &times;
                </button>

                <h2 class="text-xl font-semibold mb-4 text-center">Выберите тип расчёта</h2>

                <div class="space-y-4">
                    @if(!$patient->sidetwg()->exists())
                    <button id="open-tpr-modal"
                            class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                        Боковая ТРГ
                    </button>
                    @endif

                    <button class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                      <a href="{{route('planning.index', ['id' => $patient->id])}}"> Планирование лечения</a>
                    </button>
                    @if(!$patient->biometrics()->exists())
                        <button class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                            <a href="{{route('biometrics.index', ['id' => $patient->id])}}">
                                Биометрия
                            </a>
                        </button>
                    @endif
                </div>
            </div>
        </div>

        <!-- Модальное окно для ТРГ -->
        <div id="tpr-modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50"
             role="dialog" aria-hidden="true">
            <div class="bg-white rounded-lg p-6 shadow-lg w-96 relative">
                <!-- Закрытие модального окна -->
                <button id="close-tpr-modal"
                        class="absolute top-2 right-2 text-gray-600 hover:text-gray-800 transition" aria-label="Закрыть">
                    &times;
                </button>

                <h2 class="text-xl font-semibold mb-4 text-center">Боковая ТРГ</h2>

                <!-- Форма для загрузки изображения -->
                <form action="{{ route('trg.store.image', ['id' => $patient->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-medium mb-2">Снимок (png, jpg, jpeg):</label>
                        <input type="file" id="image" name="image" accept="image/png, image/jpeg"
                               class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>



                    <div class="flex justify-end">
                        <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">
                            Добавить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript для работы модальных окон -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('modal');
            const tprModal = document.getElementById('tpr-modal');
            const openModalBtn = document.getElementById('open-modal-btn');
            const closeModalBtn = document.getElementById('close-modal-btn');
            const openTprModalBtn = document.getElementById('open-tpr-modal');
            const closeTprModalBtn = document.getElementById('close-tpr-modal');

            const toggleModal = (modalElement, show) => {
                if (show) {
                    modalElement.classList.remove('hidden');
                    modalElement.setAttribute('aria-hidden', 'false');
                } else {
                    modalElement.classList.add('hidden');
                    modalElement.setAttribute('aria-hidden', 'true');
                }
            };

            openModalBtn.addEventListener('click', () => toggleModal(modal, true));
            closeModalBtn.addEventListener('click', () => toggleModal(modal, false));

            openTprModalBtn.addEventListener('click', () => {
                toggleModal(modal, false);
                toggleModal(tprModal, true);
            });

            closeTprModalBtn.addEventListener('click', () => toggleModal(tprModal, false));

        });
    </script>
@endsection
