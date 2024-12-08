@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <div class="bg-gray-100 min-h-screen flex flex-col items-center justify-center p-6">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-5xl w-full">
            <div class="flex justify-between items-center mb-6">
                <button  class="text-blue-600 hover:text-blue-800">
                    <a href="javascript:history.back()">  &larr;</a> <!-- Стрелка влево -->
                </button>
                <h1 class="text-3xl font-bold text-gray-800">ПАЦИЕНТЫ</h1>
                <div class="space-x-4">
                    {{--                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600">Скачать--}}
                    {{--                        обобщение данных--}}
                    {{--                    </button>--}}
                    {{--                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600">Оплатить--}}
                    {{--                        тариф--}}
                    {{--                    </button>--}}

                    <button id="addPatientBtn" type="button"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600">Добавить
                        пациента
                    </button>

                </div>
            </div>

            <table class="w-full border-collapse">
                <thead class="bg-gray-100">
                <tr>
                    <th class="text-left text-gray-600 p-4">ФИО</th>
                    <th class="text-left text-gray-600 p-4">Дата добавления</th>
                    <th class="text-center text-gray-600 p-4">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($patients as $patient)

                    <tr class="border-b">

                        <td class="p-4 text-gray-800"><a href="{{route('patients.calculate', ['id' => $patient->id])}}">{{ $patient->fullName }}</a></td>
                        <td class="p-4 text-gray-800">{{ $patient->created_at->format('d.m.Y') }}</td>
                        <td class="p-4 text-center">
                            <button class="text-gray-500 hover:text-blue-500"><i>✏️</i></button>
                            <form action="{{route('delete.patient', ['id' => $patient->id])}}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этого пациента?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-500 hover:text-red-500" ><i>🗑️</i></button>
                            </form>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Всплывающее окно для добавления пациента -->
        <form action="{{route('create.patient')}}" method="POST">
            @csrf
            <div id="addPatientModal"
                 class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
                <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold text-gray-800">Добавить пациента</h2>
                        <button id="closeModalBtn" class="text-gray-500 hover:text-gray-800 text-xl font-bold">×
                        </button>
                    </div>
                    <form id="addPatientForm">
                        <div class="space-y-4">
                            <div>
                                <label for="fullName" class="block text-gray-600">ФИО</label>
                                <input type="text" id="fullName" name="fullName" required
                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        <div class="flex justify-end mt-6">
                            <button type="submit"
                                    class="bg-blue-500 text-white px-6 py-2 rounded-md shadow-md hover:bg-blue-600">
                                Добавить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </form>

        <script>

            const addPatientBtn = document.getElementById('addPatientBtn');
            const addPatientModal = document.getElementById('addPatientModal');
            const closeModalBtn = document.getElementById('closeModalBtn');

            // Открыть модальное окно
            addPatientBtn.addEventListener('click', () => {
                addPatientModal.classList.remove('hidden');
            });

            // Закрыть модальное окно
            closeModalBtn.addEventListener('click', () => {
                addPatientModal.classList.add('hidden');
            });

            // Обработка формы добавления пациента
            document.getElementById('addPatientForm').addEventListener('submit', (e) => {
                e.preventDefault();

                // Сбор данных формы
                const fullName = document.getElementById('fullName').value;

                // Логика добавления нового пациента
                alert(`Пациент добавлен: ${fullName}`);

                // Закрытие модального окна
                addPatientModal.classList.add('hidden');
            });
        </script>
    </div>
@endsection
