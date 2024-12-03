@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-4xl w-full">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">ЛИЧНЫЙ КАБИНЕТ</h1>
        <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Левая колонка -->
            <div class="space-y-4">
                <!-- ФИО -->
                <div>
                    <label for="fullName" class="block text-gray-400 text-sm">ФИО</label>
                    <input type="text" id="fullName" name="fullName" value="Иван Иванов"
                           class="w-full text-lg font-medium text-gray-800 border-b border-gray-300 focus:outline-none focus:border-blue-500 pb-1">
                </div>
                <!-- Город -->
                <div>
                    <label for="city" class="block text-gray-400 text-sm">Город</label>
                    <input type="text" id="city" name="city" value="Минск"
                           class="w-full text-lg font-medium text-gray-800 border-b border-gray-300 focus:outline-none focus:border-blue-500 pb-1">
                </div>
                <!-- Пароль -->
                <div>
                    <label for="password" class="block text-gray-400 text-sm">Пароль</label>
                    <div class="flex items-center gap-4">
                        <input type="password" id="password" name="password" value="password123" disabled
                               class="w-full text-lg font-medium text-gray-800 border-b border-gray-300 focus:outline-none focus:border-blue-500 pb-1">
                        <button type="button" id="editPasswordBtn"
                                class="text-blue-500 hover:underline font-medium">Изменить</button>
                    </div>
                </div>
            </div>

            <!-- Правая колонка -->
            <div class="space-y-4">
                <!-- Электронная почта -->
                <div>
                    <label for="email" class="block text-gray-400 text-sm">Электронная почта</label>
                    <input type="email" id="email" name="email" value="rufen77777@mail.ru"
                           class="w-full text-lg font-medium text-gray-800 border-b border-gray-300 focus:outline-none focus:border-blue-500 pb-1">
                </div>
                <!-- Телефон -->
                <div>
                    <label for="phone" class="block text-gray-400 text-sm">Номер телефона</label>
                    <input type="tel" id="phone" name="phone" value="+375342123312"
                           class="w-full text-lg font-medium text-gray-800 border-b border-gray-300 focus:outline-none focus:border-blue-500 pb-1">
                </div>
            </div>

            <!-- Кнопки -->
            <div class="col-span-1 md:col-span-2 flex justify-between mt-6">
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white font-medium rounded-lg shadow-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-400">
                    Сохранить
                </button>
                <button type="reset" class="px-6 py-2 bg-gray-300 text-gray-800 font-medium rounded-lg shadow-md hover:bg-gray-400 focus:ring-2 focus:ring-gray-300">
                    Сбросить
                </button>
            </div>
        </form>
        <div class="text-center mt-8">
            <a href="{{route('main.patients')}}" class="text-blue-500 font-medium hover:underline">Перейти к пациентам</a>
        </div>
    </div>

    <script>
        // Логика для активации редактирования пароля
        const passwordInput = document.getElementById('password');
        const editPasswordBtn = document.getElementById('editPasswordBtn');

        editPasswordBtn.addEventListener('click', () => {
            passwordInput.disabled = !passwordInput.disabled; // Переключаем состояние "disabled"
            if (!passwordInput.disabled) {
                passwordInput.focus(); // Фокусируемся на поле, если оно активно
            }
        });
    </script>
    </div>
@endsection
