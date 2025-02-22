@extends('layouts.app')

@section('head')
    <title>Ортодонт | Лечение зубов</title>
    <meta name="description" content="Вылечим ваши зубы"/>
@endsection

@section('content')
    <div class="max-w-4xl mx-auto py-12 px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Выберите тариф</h2>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Бесплатный тариф -->
            <div class="border rounded-lg shadow-md p-6 bg-white">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Бесплатный</h3>
                <p class="text-gray-600 mb-4">До 5 пациентов</p>
                <p class="text-2xl font-semibold text-gray-800">0 ₽ / год</p>

                @if(auth()->user()->subscription && auth()->user()->subscription->status === 'inactive')
                    <span class="block mt-4 px-4 py-2 text-center bg-gray-300 text-gray-700 rounded-lg">
                    Активный тариф
                </span>
                @else
                    <button class="mt-4 w-full px-4 py-2 bg-gray-500 text-white rounded-lg shadow-md cursor-not-allowed">
                        Выбран по умолчанию
                    </button>
                @endif
            </div>

            <!-- Платный тариф -->
            <div class="border rounded-lg shadow-md p-6 bg-white">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Безлимит</h3>
                <p class="text-gray-600 mb-4">До 300 пациентов</p>
                <p class="text-2xl font-semibold text-gray-800">3000 ₽ / мес.</p>

                @if(auth()->user()->subscription && auth()->user()->subscription->status === 'active')

                    <span class="block mt-4 px-4 py-2 text-center bg-green-500 text-white rounded-lg">
                    Активный тариф
                </span>
                @else
                    <script src="https://securepay.tinkoff.ru/html/payForm/js/tinkoff_v2.js"></script>
                    <form action="{{ route('tinkoff.pay') }}" method="POST" class="payform-tbank" name="payform-tbank" onsubmit="pay(this); return false;">
                        @csrf
                        <input class="payform-tbank-row" type="hidden" name="terminalkey" value="{{config('services.tinkoff.terminal_key')}}">
                        <input class="payform-tbank-row" type="hidden" name="frame" value="false">
                        <input class="payform-tbank-row" type="hidden" name="language" value="ru">
                        <input class="payform-tbank-row" type="hidden" placeholder="Сумма заказа" value="3000" name="amount" required>
                        <input class="payform-tbank-row" type="hidden" placeholder="Номер заказа" name="order">
                        <input type="submit" class="mt-4 block w-full px-4 py-2 bg-blue-500 text-white text-center rounded-lg shadow-md hover:bg-blue-600" value = "Оформить подписку">
                    </form>
                @endif
            </div>
        </div>
    </div>

@endsection
