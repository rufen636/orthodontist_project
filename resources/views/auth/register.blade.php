@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <section class="bg-white ">
        <form method="POST" action="{{ route('register') }}" onsubmit="return validatePasswords()">
            @csrf
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-blue-700 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Регистрация
                        </h1>
                        <div class="space-y-4 md:space-y-6">
                            <div>
                                <label for="login" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Введите ваш логин</label>
                                <input type="text" name="login" id="login" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Login" required minlength="4">
                                @if ($errors->has('login'))
                                    <p class="text-red-500 text-sm">{{ $errors->first('login') }}</p>
                                @endif
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Пароль</label>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" required minlength="8">
                            </div>
                            <div>
                                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Подтвердите пароль</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <p id="password-error" class="text-sm text-red-500 hidden">Пароли не совпадают</p>
                            </div>
                            <div class="flex justify-center">
                                <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 border border-gray-400 shadow focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    Создать аккаунт
                                </button>
                            </div>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Уже есть аккаунт? <a href="{{ route('main.login') }}" class="font-medium text-primary-600 hover:underline dark:text-white">Ввойдите здесь</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script>
        function validatePasswords() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const errorElement = document.getElementById('password-error');

            if (password !== confirmPassword) {
                errorElement.classList.remove('hidden');
                return false;
            } else {
                errorElement.classList.add('hidden');
                return true;
            }
        }document.getElementById('login').addEventListener('blur', function () {
            const login = this.value;
            const errorElement = document.getElementById('login-error');

            fetch(`/check-login?login=${login}`)
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        errorElement.textContent = 'Этот логин уже занят.';
                        errorElement.classList.remove('hidden');
                    } else {
                        errorElement.textContent = '';
                        errorElement.classList.add('hidden');
                    }
                });
        });
    </script>
@endsection
