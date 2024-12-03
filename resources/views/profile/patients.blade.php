@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <div class="bg-gray-100 min-h-screen flex flex-col items-center justify-center p-6">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-5xl w-full">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">ПАЦИЕНТЫ</h1>
            <div class="space-x-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600">Скачать обобщение данных</button>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600">Оплатить тариф</button>
                <button id="addPatientBtn" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600">Добавить пациента</button>
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
            <tr class="border-b">
                <td class="p-4 text-gray-800">Иванов И. И.</td>
                <td class="p-4 text-gray-800">29.11.2024</td>
                <td class="p-4 text-center">
                    <button class="text-gray-500 hover:text-blue-500"><i>✏️</i></button>
                    <button class="text-gray-500 hover:text-red-500"><i>🗑️</i></button>
                </td>
            </tr>
            <tr>
                <td class="p-4 text-gray-800">Смирнов С. С.</td>
                <td class="p-4 text-gray-800">28.11.2024</td>
                <td class="p-4 text-center">
                    <button class="text-gray-500 hover:text-blue-500"><i>✏️</i></button>
                    <button class="text-gray-500 hover:text-red-500"><i>🗑️</i></button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- Всплывающее окно для добавления пациента -->
    <div id="addPatientModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-gray-800">Добавить пациента</h2>
                <button id="closeModalBtn" class="text-gray-500 hover:text-gray-800 text-xl font-bold">×</button>
            </div>
            <form id="addPatientForm">
                <div class="space-y-4">
                    <div>
                        <label for="fullName" class="block text-gray-600">ФИО</label>
                        <input type="text" id="lastName" name="lastName" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md shadow-md hover:bg-blue-600">Добавить</button>
                </div>
            </form>
        </div>
    </div>

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
            const lastName = document.getElementById('fullName').value;

            // Логика добавления нового пациента
            alert(`Пациент добавлен: ${lastName}`);

            // Закрытие модального окна
            addPatientModal.classList.add('hidden');
        });
    </script>
    </div>
@endsection
