@extends('layouts.app')
@section('head')
@endsection
@section('content')
    <div class="bg-gray-100 min-h-screen flex flex-col items-center justify-center p-6 mt-6">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-5xl w-full">
            <div class="flex justify-between items-center mb-6">
                <button class="text-blue-600 hover:text-blue-800">
                    <a href="javascript:history.back()"> &larr;</a> <!-- Стрелка влево -->
                </button>
                <h1 class="text-3xl font-bold text-gray-800">ПАЦИЕНТЫ</h1>
                <div class="flex space-x-4">
                    <button type="button"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600"><a
                            href="{{route('payment.index')}}">Оформить подписку</a>
                    </button>
                    <button id="addPatientBtn" type="button"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600">Добавить
                        пациента
                    </button>
                    @if($subscription && $subscription->status === 'active')
                        <!-- Кнопка отмены подписки -->
                        <button id="cancelSubscriptionBtn" type="button"
                                class="bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-600">
                            Отменить подписку
                        </button>

                        <!-- Модальное окно подтверждения отмены подписки -->
                        <div id="confirmationModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
                            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-2xl font-bold text-gray-800">Вы уверены?</h2>
                                    <button id="closeModalBtn" class="text-gray-500 hover:text-gray-800 text-xl font-bold">×</button>
                                </div>
                                <p class="text-gray-700 mb-4">Вы точно уверены, что хотите отменить подписку?</p>
                                <div class="flex justify-end space-x-4">
                                    <form id="cancelSubscriptionForm" action="{{ route('subscription.cancel') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600">
                                            Подтвердить
                                        </button>
                                    </form>
                                    <button id="cancelBtn" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600">
                                        Отменить
                                    </button>
                                </div>
                            </div>
                        </div>

                        <script>
                            // Открыть модальное окно при нажатии на кнопку "Отменить подписку"
                            const cancelSubscriptionBtn = document.getElementById('cancelSubscriptionBtn');
                            const confirmationModal = document.getElementById('confirmationModal');
                            const closeModalBtn = document.getElementById('closeModalBtn');
                            const cancelBtn = document.getElementById('cancelBtn');

                            cancelSubscriptionBtn.addEventListener('click', () => {
                                confirmationModal.classList.remove('hidden');
                            });

                            // Закрыть модальное окно при нажатии на крестик или на кнопку "Отменить"
                            closeModalBtn.addEventListener('click', () => {
                                confirmationModal.classList.add('hidden');
                            });

                            cancelBtn.addEventListener('click', () => {
                                confirmationModal.classList.add('hidden');
                            });

                            // Отправить форму при подтверждении
                            // Форма для отмены подписки будет отправлена после нажатия на кнопку "Подтвердить"
                        </script>
                    @endif

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
                @php
                    $subscription = auth()->user()->subscription;
                    $patientsCount = auth()->user()->patients()->count();
                    $canViewAllPatients = $subscription && (
                        $subscription->status === 'active' || $patientsCount <= 5
                    );
                @endphp

                @foreach($patients as $index => $patient)
                    @if($canViewAllPatients || $index < 5)
                        <tr class="border-b">
                            <td class="p-4 text-gray-800">
                                <a href="{{ route('patients.calculate', ['id' => $patient->id]) }}">
                                    {{ $patient->fullName }}
                                </a>
                            </td>
                            <td class="p-4 text-gray-800">{{ $patient->created_at->format('d.m.Y') }}</td>
                            <td class="p-4 text-center">
                                <button class="text-gray-500 hover:text-blue-500"><i>✏️</i></button>
                                <form action="{{ route('delete.patient', ['id' => $patient->id]) }}" method="POST"
                                      onsubmit="return confirm('Вы уверены, что хотите удалить этого пациента?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-500 hover:text-red-500"><i>🗑️</i></button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach

                </tbody>
            </table>
        </div>

        <!-- Всплывающее окно для добавления пациента -->

        @php
            $subscription = auth()->user()->subscription;
            $patientsCount = auth()->user()->patients()->count();
            $canAddPatient = $subscription && (
                ($subscription->status === 'inactive' && $patientsCount < 5) ||
                ($subscription->status === 'pending' && $patientsCount < 5) ||
                ($subscription->status === 'active' && $patientsCount < 300)
            );

        @endphp
        @php
            $subscription = auth()->user()->subscription;
            $patientsCount = auth()->user()->patients()->count();

            // Определяем максимальное количество пациентов, которое может быть отображено
            $maxPatients = 5;
            if ($subscription && $subscription->status !== 'inactive' && $subscription->status !== 'pending') {
                $maxPatients = $subscription->patients_limit;
            }

            // Ограничиваем количество пациентов, которые отображаются, если подписка не активна или в ожидании
            $patientsDisplay = ($subscription && ($subscription->status === 'inactive' || $subscription->status === 'pending')) ? min($patientsCount, $maxPatients) : $patientsCount;
        @endphp
        @if($canAddPatient)
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
                    </div>
                </div>
            </form>
            @elseif($subscription && $subscription->status === 'active')
                <p class="text-green-500 text-center mt-4">
                    Ваш лимит пациентов: {{ $patientsDisplay }} / {{ $subscription->patients_limit }}.
                </p>
            @elseif($subscription && $subscription->status === 'pending')
                <p class="text-yellow-500 text-center mt-4">
                    Вы достигли лимита пациентов ({{ $patientsDisplay }} / 5). Продлите подписку, чтобы увидеть всех своих пациентов.
                </p>
            @elseif($subscription && $subscription->status === 'inactive')
                <p class="text-red-500 text-center mt-4">
                    Вы достигли лимита пациентов ({{ $patientsDisplay }} / 5). Купите подписку для увеличения лимита и продолжения работы с пациентами.
                </p>
            @else
                <p class="text-red-500 text-center mt-4">
                    У вас нет активной подписки. Оформите подписку, чтобы начать работать с пациентами.
                </p>
            @endif



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


            });


        </script>
    </div>
@endsection
