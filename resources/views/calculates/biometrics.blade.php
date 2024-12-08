@extends('layouts.app')
@section('head')
@endsection
@section('content')

    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto  mt-16">
        @foreach($patients as $patient)
            <div class="flex items-center mb-4">
                <button  class="text-blue-600 hover:text-blue-800">
                   <a href="javascript:history.back()">  &larr;</a> <!-- Стрелка влево -->
                </button>
                <h2 class="text-xl font-semibold ml-4">Биометрия (новая)</h2>
            </div>
            <div class="mb-2">
                <span class="font-medium">Пациент:</span>
                <span class="text-blue-600"> {{ $patient->fullName }} </span>
            </div>
    </div>
    <form action="{{ route('biometrics.calculate',['id' => $patient->id]) }}" method="POST">
        @csrf

        <div class=" flex flex-col sm:flex-row items-start justify-center  mt-16 ">
            <!-- Первая колонка -->
            <div class="w-full sm:w-1/3 p-4 ">
                <h1 class="text-xl font-semibold text-gray-700">
                    Измерьте мезиодистальные размеры 12 зубов на верхней челюсти и 12 зубов на нижней челюсти и внесите
                    их в
                    соответствующие поля
                </h1>
            </div>
            <!-- Вторая колонка -->
            <div class="w-full sm:w-2/3 p-4 ">
                <div class="bg-cover bg-center h-96 relative"
                     style="background-image: url('{{ asset('images/biometrics/teeth.png') }}')">
                    <!-- Инпуты для зубов -->
                    <div class="left-10 right-10 mt-3">
                        <input type="number"
                               class=" absolute top-[30%] left-[5%] w-[10%] sm:w-[6%] md:w-[5%] p-2 border rounded bg-white"
                               placeholder="1" name="tooth1" required>
                        <input type="number"
                               class=" absolute top-[30%] left-[12%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                               placeholder="2" name="tooth2" required>
                        <input type="number"
                               class="  absolute top-[30%] left-[19%] w-[10%] sm:w-[6%] md:w-[5%] border rounded bg-white p-2"
                               placeholder="3" name="tooth3" required>
                        <input type="number"
                               class="  absolute top-[30%] left-[27%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                               placeholder="4" name="tooth4" required>
                        <input type="number"
                               class=" absolute top-[30%] left-[34%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                               placeholder="5" name="tooth5" required>
                        <input type="number"
                               class="  absolute top-[30%] left-[43%] w-[10%] sm:w-[6%] md:w-[5%] border rounded bg-white p-2"
                               placeholder="6" name="tooth6" required>
                        <input type="number"
                               class="  absolute top-[30%] left-[53%] w-[10%] sm:w-[6%] md:w-[5%] border rounded bg-white p-2"
                               placeholder="7" name="tooth7" required>
                        <input type="number"
                               class=" absolute top-[30%] left-[60%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                               placeholder="8" name="tooth8" required>
                        <input type="number"
                               class="  absolute top-[30%] left-[68%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                               placeholder="9" name="tooth9" required>
                        <input type="number"
                               class="  absolute top-[30%] left-[76%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                               placeholder="10" name="tooth10" required>
                        <input type="number"
                               class=" absolute top-[30%] left-[82%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                               placeholder="11" name="tooth11" required>
                        <input type="number"
                               class="  absolute top-[30%] left-[90%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                               placeholder="12" name="tooth12" required>
                    </div>
                    <div class="left-10 right-10 mt-3">
                        <input type="number"
                               class=" absolute bottom-[30%] left-[5%] w-[10%] sm:w-[6%] md:w-[5%] p-2 border rounded bg-white"
                               placeholder="1" name="tooth13" required>
                        <input type="number"
                               class=" absolute bottom-[30%] left-[16%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                               placeholder="2" name="tooth14" required>
                        <input type="number"
                               class="  absolute bottom-[30%] left-[23%] w-[10%] sm:w-[6%] md:w-[5%] border rounded bg-white p-2"
                               placeholder="3" name="tooth15" required>
                        <input type="number"
                               class="  absolute bottom-[30%] left-[31%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                               placeholder="4" name="tooth16" required>
                        <input type="number"
                               class=" absolute bottom-[30%] left-[38%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                               placeholder="5" name="tooth17" required>
                        <input type="number"
                               class="  absolute bottom-[30%] left-[44%] w-[10%] sm:w-[6%] md:w-[5%] border rounded bg-white p-2"
                               placeholder="6" name="tooth18" required>
                        <input type="number"
                               class="  absolute bottom-[30%] left-[50%] w-[10%] sm:w-[6%] md:w-[5%] border rounded bg-white p-2"
                               placeholder="7" name="tooth19" required>
                        <input type="number"
                               class=" absolute bottom-[30%] left-[56%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                               placeholder="8" name="tooth20" required>
                        <input type="number"
                               class="  absolute bottom-[30%] left-[62%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                               placeholder="9" name="tooth21" required>
                        <input type="number"
                               class="  absolute bottom-[30%] left-[70%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                               placeholder="10" name="tooth22" required>
                        <input type="number"
                               class=" absolute bottom-[30%] left-[78%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                               placeholder="11" name="tooth23" required>
                        <input type="number"
                               class="  absolute bottom-[30%] left-[88%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                               placeholder="12" name="tooth24" required>
                    </div>
                    <!-- Добавьте больше инпутов для остальных зубов -->
                </div>
            </div>
        </div>
        <div class="flex flex-col sm:flex-row items-start justify-center">
            <!-- Первая колонка -->
            <div class="w-full sm:w-1/3 p-4">
                <h1 class="text-xl font-semibold text-gray-700">
                    Измерьте фактическую ширину зубного ряда на верхней и на нижней челюсти в точках Пона и внесите
                    значения в соответствующие поля
                </h1>
            </div>
            <!-- Вторая колонка -->
            <div class="w-full sm:w-2/3 p-4">
                <div class="flex flex-col sm:flex-row bg-cover bg-center h-96 relative"
                     style="background-image: url('{{ asset('images/biometrics/teeth2.jpg') }}')">
                    <input type="number"
                           class="  absolute bottom-[30%] left-[20%] w-[10%]  sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                           placeholder="12" name="row_width1" required>
                    <input type="number"
                           class="  absolute bottom-[50%] left-[20%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                           placeholder="12" name="row_width2" required>
                    <input type="number"
                           class="  absolute top-[27%] left-[75%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                           placeholder="12" name="row_width3" required>
                    <input type="number"
                           class="  absolute top-[47%] left-[75%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                           placeholder="12" name="row_width4" required>
                </div>
            </div>
        </div>
        <div class=" flex flex-col sm:flex-row items-start justify-center ">
            <!-- Первая колонка -->
            <div class="w-full sm:w-1/3 p-4 ">
                <h1 class="text-xl font-semibold text-gray-700">
                    Измерьте фактическую длину переднего отрезка верхней и нижней челюсти и внесите значения в
                    соответствующие поля
                </h1>
            </div>
            <!-- Вторая колонка -->
            <div class="w-full sm:w-2/3 p-4 ">
                <div class="bg-cover bg-center h-96 relative"
                     style="background-image: url('{{ asset('images/biometrics/teeth3.jpg') }}')">
                    <input type="number"
                           class="  absolute bottom-[60%] left-[22%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                           placeholder="12" name="leading_edge_length1 " required>
                    <input type="number"
                           class="  absolute bottom-[33%] left-[76%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                           placeholder="12" name="leading_edge_length2" required>
                </div>
            </div>
        </div>
        <div class=" flex flex-col sm:flex-row items-start justify-center ">
            <!-- Первая колонка -->
            <div class="w-full sm:w-1/3 p-4 ">
                <h1 class="text-xl font-semibold text-gray-700">
                    Измерьте фактическое количество места для клыка и двух премоляров в каждом сегменте верхней и нижней
                    челюсти и внесите значения в соответствующие поля
                </h1>
            </div>
            <!-- Вторая колонка -->
            <div class="w-full sm:w-2/3 p-4 ">
                <div class="bg-cover bg-center h-96 relative"
                     style="background-image: url('{{ asset('images/biometrics/teeth4.jpg') }}')">
                    <input type="number"
                           class="  absolute bottom-[45%] left-[8%] w-[10%]  sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                           placeholder="12" name="location_for_canine1" required>
                    <input type="number"
                           class="  absolute bottom-[45%] left-[36%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                           placeholder="12" name="location_for_canine2" required>
                    <input type="number"
                           class="  absolute top-[47%] left-[63%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                           placeholder="12" name="location_for_canine3" required>
                    <input type="number"
                           class="  absolute top-[47%] left-[87%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                           placeholder="12" name="location_for_canine4" required>
                </div>
            </div>
        </div>
        <div class=" flex flex-col sm:flex-row items-start justify-center ">
            <!-- Первая колонка -->
            <div class="w-full sm:w-1/3 p-4 ">
                <h1 class="text-xl font-semibold text-gray-700">
                    Дефицит места
                </h1>
            </div>
            <!-- Вторая колонка -->
            <div class="w-full sm:w-2/3 p-4 ">
                <div class="bg-cover bg-center h-96 relative"
                     style="background-image: url('{{ asset('images/biometrics/teeth5.jpg') }}')">
                    <label for="segment1" class="  absolute top-[0%] left-[0%]  "> 1 сегмент </label>
                    <input type="number"
                           class="  absolute top-[10%] left-[0%] w-[10%]  sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                           placeholder="12" id="segment1" name="segment1" required>
                    <label for="segment2" class="  absolute top-[0%] left-[46%]  "> 2 сегмент </label>
                    <input type="number"
                           class="  absolute top-[10%] left-[46%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                           placeholder="12" id="segment2" name="segment2" required>
                    <label for="segment3" class="  absolute bottom-[0%] left-[66%]  "> 4 сегмент </label>
                    <input type="number"
                           class="  absolute bottom-[10%] left-[63%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                           placeholder="12" id="segment3" name="segment3" required>
                    <label for="segment4" class="  absolute bottom-[0%] left-[87%]  "> 3 сегмент </label>
                    <input type="number"
                           class="  absolute bottom-[10%] left-[87%] w-[10%] sm:w-[6%] md:w-[5%]  border rounded bg-white p-2"
                           placeholder="12" id="segment4" name="segment4" required>
                </div>
            </div>


        </div>
        <div class="flex items-center justify-center ">
            <button type="submit"
                    class="hover:text-black bg-blue-700 hover:bg-white text-white border border-gray-400 shadow focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                ПЕРЕСЧИТАТЬ ВСЕ
            </button>
        </div>
    </form>
    @if (session('form_submitted'))
        <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg mt-6">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Результаты вычислений</h2>

            <!-- Индекс Тона -->
            <div class="mb-6 p-4 bg-gray-50 rounded-lg shadow-sm">
                <h3 class="text-xl font-medium text-gray-700">Индекс Тона:</h3>
                <p class="text-lg text-gray-900">{{ $tonIndex }}</p>
            </div>

            <!-- Ширина зубного ряда (Пон) -->
            <div class="mb-6 p-4 bg-gray-50 rounded-lg shadow-sm">
                <h3 class="text-xl font-medium text-gray-700">Ширина зубного ряда (Пон):</h3>
                <ul class="list-disc pl-5 space-y-2 text-lg text-gray-800">
                    <li>14-24: {{ $ponWidth['14-24'] }} мм</li>
                    <li>16-26: {{ $ponWidth['16-26'] }} мм</li>
                    <li>44-34: {{ $ponWidth['44-34'] }} мм</li>
                    <li>46-36: {{ $ponWidth['46-36'] }} мм</li>
                </ul>
            </div>

            <!-- Анализ по Коркхаузу -->
            <div class="mb-6 p-4 bg-gray-50 rounded-lg shadow-sm">
                <h3 class="text-xl font-medium text-gray-700">Анализ по Коркхаузу:</h3>
                <ul class="list-disc pl-5 space-y-2 text-lg text-gray-800">
                    <li>Длина переднего отрезка верхней челюсти: {{ $corhausAnalysis['upper'] }} мм</li>
                    <li>Длина переднего отрезка нижней челюсти: {{ $corhausAnalysis['lower'] }} мм</li>
                </ul>
            </div>

            <!-- Соотношение по Герлаху -->
            <div class="mb-6 p-4 bg-gray-50 rounded-lg shadow-sm">
                <h3 class="text-xl font-medium text-gray-700">Соотношение по Герлаху:</h3>
                <ul class="list-disc pl-5 space-y-2 text-lg text-gray-800">
                    @foreach ($gerlachAnalysis as $key => $value)
                        <li>{{ ucfirst($key) }}: {{ $value }} мм</li>
                    @endforeach
                </ul>
            </div>

            <!-- Анализ по Tanaka-Johnston -->
            <div class="mb-6 p-4 bg-gray-50 rounded-lg shadow-sm">
                <h3 class="text-xl font-medium text-gray-700">Анализ по Tanaka-Johnston:</h3>
                <ul class="list-disc pl-5 space-y-2 text-lg text-gray-800">
                    <li>Сегмент 1: {{ $tanakaAnalysis['segment1'] }} мм</li>
                    <li>Сегмент 2: {{ $tanakaAnalysis['segment2'] }} мм</li>
                    <li>Сегмент 3: {{ $tanakaAnalysis['segment3'] }} мм</li>
                    <li>Сегмент 4: {{ $tanakaAnalysis['segment4'] }} мм</li>
                </ul>
            </div>
        </div>
    @else
        <div class="container mx-auto p-6">
            <p class="text-xl text-center text-gray-700">Пожалуйста, отправьте форму для получения результатов.</p>
        </div>
    @endif

    @endforeach
@endsection
