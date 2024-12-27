@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto  mt-16">

            <div class="flex items-center mb-4">
                <button  class="text-blue-600 hover:text-blue-800">
                    <a href="javascript:history.back()">  &larr;</a> <!-- Стрелка влево -->
                </button>
                <h2 class="text-xl font-semibold ml-4">Боковая ТРГ</h2>
            </div>
            <div class="mb-2">
                <span class="font-medium">Пациент:</span>
                <span class="text-blue-600"> {{ $patient->fullName }} </span>
            </div>
        </div>
        <h2 class="text-xl font-semibold mb-4">Расчеты:</h2>
        <div class="w-full mx-auto bg-white p-6 rounded-lg shadow-md">
            <!-- Масштаб -->


            <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md grid grid-cols-2 gap-6">
                <!-- Левая колонка: Выбор точек и отображение их описания -->
                <div>
                    <h2 class="text-lg font-semibold mb-4">Точки:</h2>
                    <div id="points-container" class="space-y-6 overflow-y-auto max-h-[700px]">
                        <!-- Точка N -->
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="N" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить N</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointN.png') }}" alt="Точка N" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Геометрический центр гипофиза</p>
                            </div>
                        </div>

                        <!-- Точка S -->
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="S" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить S</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointS.png') }}" alt="Точка S" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Точка в области основания черепа</p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="Se" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить Se</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointSe.png') }}" alt="Точка Se" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Середина входа в турецкое седло</p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="C" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить C</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointC.png') }}" alt="Точка C" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Центр головки суставного отростка нижней челюсти</p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="Co" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить Co</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointCo.png') }}" alt="Точка C" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Дистальная точка суставного отростка нижней челюсти</p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="K1" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить K1</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointK1.png') }}" alt="Точка C" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Точка на дистальном крае угла нижней челюсти. Устанавливается, чтобы провести касательную к ветви нижней челюсти</p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="K2" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить K2</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointK2.png') }}" alt="Точка C" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Точка на нижнем крае угла нижней челюсти. Устанавливается, чтобы провести касательную к телу нижней челюсти</p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="Me" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить Me</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointMe.png') }}" alt="Точка C" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Нижняя точка на нижнем крае тела нижней челюсти в месте наложения симфиза
                                </p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="Go" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить Go</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointGo.png') }}" alt="Точка C" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Касательная к телу и ветви нижней челюсти, пересечение биссектрисы этого угла с нижней челюстью</p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="Gn" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить Gn</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointGn.png') }}" alt="Точка C" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Касательная к телу и ветви нижней челюсти, пересечение биссектрисы этого угла с нижней челюстью</p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="B" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить B</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointB.png') }}" alt="Точка C" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Наиболее глубокая точка на переднем крае апикального базиса нижней челюсти </p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="B2" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить B2</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointB2.png') }}" alt="Точка C" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Верхушка корня нижнего резца
                                </p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="B1" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить B1</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointB1.png') }}" alt="Точка C" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Верхушка коронки нижнего резца</p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="Ii" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить ii</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointii.png') }}" alt="Точка C" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Точка между режущими краями резцов </p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="P6" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить P6</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointP6.png') }}" alt="Точка C" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Вершина дистального бугра первого нижнего моляра </p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="A1" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить A1</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointA1.png') }}" alt="Точка C" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Верхушка коронки верхнего резца </p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="A2" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить A2</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointA2.png') }}" alt="Точка C" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Верхушка корня верхнего резца   </p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="A" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить A</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointA.png') }}" alt="Точка C" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Наиболее глубокая точка на переднем крае апикального базиса верхней челюсти   </p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="ANS" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить ANS</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointANS.png') }}" alt="Точка C" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Передняя носовая ость </p>
                            </div>
                        </div>
                        <div class="border rounded-lg p-4 shadow-md">
                            <label class="flex items-center">
                                <input type="radio" name="point" value="PNS" class="mr-2 toggle-point">
                                <span class="text-gray-700">Поставить PNS</span>
                            </label>
                            <div class="point-details hidden mt-4">
                                <img src="{{ asset('images/sidetwg/pointPNS.png') }}" alt="Точка C" class="max-w-[250px] max-h-[250px] w-full h-auto rounded-lg shadow-md mb-2">
                                <p class="text-gray-600">Задняя носовая ость  </p>
                            </div>
                        </div>

                        <!-- Добавьте другие точки аналогично -->
                    </div>
                </div>


                <div class="flex flex-col items-center justify-center bg-gray-50 p-6 border rounded-lg shadow-inner h-full relative">
                    <form action="{{route('trg.store', ['id' => $patient->id])}}" method="POST">
                        @method('PATCH')
                        @csrf <!-- Защита от CSRF-атак -->
                    <div class="relative">
                        <!-- Изображение -->
                        <img id="main-image" src="{{ asset('storage/' . $trgCalculation->image_path) }}" alt="Главное изображение" class="w-[750px]  h-auto rounded-lg shadow-md">
                        <!-- Контейнер для точек -->
                        <div id="points-overlay" class="absolute top-0 left-0 w-full h-full"></div>
                    </div>
                    <p class="mt-4 text-gray-500 text-sm text-center">Кликните на изображение, чтобы установить точку.</p>

                    <!-- Контейнер для кнопок -->
                    <div class="mt-4 flex space-x-4">

                            <ul class="hidden">
                                <li>
                                    <label for="SNA">SNA: </label>
                                    <input type="text" name="SNA" id="SNA" />
                                </li>
                                <li>
                                    <label for="SNB">SNB: </label>
                                    <input type="text" name="SNB" id="SNB"  />
                                </li>
                                <li>
                                    <label for="ANB">ANB: </label>
                                    <input type="text" name="ANB" id="ANB"  />
                                </li>
                                <li>
                                    <label for="Wits">Wits: </label>
                                    <input type="text" name="Wits" id="Wits"  />
                                </li>
                                <li>
                                    <label for="Beta">Beta: </label>
                                    <input type="text" name="Beta" id="Beta"  />
                                </li>
                                <li>
                                    <label for="SNMP">SN-MP: </label>
                                    <input type="text" name="SNMP" id="SNMP"  />
                                </li>
                                <li>
                                    <label for="SNNL">SN-NL: </label>
                                    <input type="text" name="SNNL" id="SNNL"  />
                                </li>
                                <li>
                                    <label for="NLMP">NL-MP: </label>
                                    <input type="text" name="NLMP" id="NLMP"  />
                                </li>
                                <li>
                                    <label for="Go">Go: </label>
                                    <input type="text" name="Go" id="Go"  />
                                </li>
                                <li>
                                    <label for="SGoNMe">S-Go/N-Me: </label>
                                    <input type="text" name="SGoNMe" id="SGoNMe"  />
                                </li>
                                <li>
                                    <label for="ISN">I-SN: </label>
                                    <input type="text" name="ISN" id="ISN"  />
                                </li>
                                <li>
                                    <label for="INL">I-NL: </label>
                                    <input type="text" name="INL" id="INL"  />
                                </li>
                                <li>
                                    <label for="IMP">i-MP: </label>
                                    <input type="text" name="IMP" id="IMP"  />
                                </li>
                                <li>
                                    <label for="Ii">Ii: </label>
                                    <input type="text" name="Ii" id="Ii"  />
                                </li>
                            </ul>

                        <button type="submit" id="save-image" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Посмотреть отчёт</button>

                        <button id="clear-points" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Очистить точки</button>

                    </div>
                </form>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        const toggleInputs = document.querySelectorAll('.toggle-point');
                        const pointDetails = document.querySelectorAll('.point-details');

                        toggleInputs.forEach((input, index) => {
                            input.addEventListener('change', () => {
                                // Скрываем все блоки с описанием и изображениями
                                pointDetails.forEach(detail => detail.classList.add('hidden'));

                                // Если радиокнопка выбрана, отображаем соответствующий блок
                                if (input.checked) {
                                    pointDetails[index].classList.remove('hidden');
                                }
                            });
                        });
                    });
                    document.addEventListener('DOMContentLoaded', () => {
                        const image = document.getElementById('main-image');
                        const overlay = document.getElementById('points-overlay');
                        const saveButton = document.getElementById('save-image');
                        const clearButton = document.getElementById('clear-points');
                        const points = [];
                        let measurements = {};

                        // Добавление точки на изображение
                        overlay.addEventListener('click', (event) => {

                            const rect = overlay.getBoundingClientRect();
                            const x = event.clientX - rect.left;
                            const y = event.clientY - rect.top;

                            // Получаем название точки с радио кнопки
                            const pointName = document.querySelector('input[name="point"]:checked')?.value;
                            if (!pointName) {
                                alert('Пожалуйста, выберите точку.');
                                return;
                            }
                            if (points.some(point => point.name === pointName)) {
                                alert(`Точка с именем "${pointName}" уже добавлена.`);
                                return;
                            }
                            // Создаем элемент для точки
                            const pointElement = document.createElement('div');
                            pointElement.classList.add('absolute', 'text-center', 'flex', 'flex-col', 'items-center');
                            pointElement.style.left = `${x}px`;
                            pointElement.style.top = `${y}px`;

                            // Маленький кружок для точки
                            const dot = document.createElement('div');
                            dot.classList.add('bg-red-500', 'rounded-full', 'w-2', 'h-2', 'mb-1');
                            pointElement.appendChild(dot);

                            // Надпись над точкой
                            const label = document.createElement('div');
                            label.textContent = pointName; // Используем заранее заданное название
                            label.classList.add('text-xs', 'text-gray-800', 'font-semibold');
                            pointElement.appendChild(label);

                            overlay.appendChild(pointElement);

                            // Сохраняем данные о точке
                            points.push({
                                name: pointName,
                                x: x,
                                y: y,
                                element: pointElement,
                            });
                        });

                        // Функция для расчёта угла между двумя точками

                        // Функция для расчета Wits и других измерений (например SNA, SNB)
                        function calculateMeasurement() {
                            const findPoint = name => points.find(p => p.name === name);

                            // const requiredPoints = ['S', 'N', 'A', 'B', 'Go', 'Me', 'PNS', 'ANS','Gn','Ii'];
                            // const missingPoints = requiredPoints.filter(point => !findPoint(point));
                            // if (missingPoints.length > 0) {
                            //     console.error(`Отсутствуют точки: ${missingPoints.join(', ')}`);
                            //     alert(`Не хватает точек для расчета: ${missingPoints.join(', ')}`);
                            //     return;
                            // }

                            // Определяем необходимые точки
                            const pointN = findPoint('N');
                            const pointS = findPoint('S');
                            const pointSe = findPoint('Se');
                            const pointC = findPoint('C');
                            const pointCo = findPoint('Co');
                            const pointK1 = findPoint('K1');
                            const pointK2 = findPoint('K2');
                            const pointMe = findPoint('Me');
                            const pointGo = findPoint('Go');
                            const pointGn = findPoint('Gn');
                            const pointB = findPoint('B');
                            const pointB2 = findPoint('B2');
                            const pointB1 = findPoint('B1');
                            const pointIi = findPoint('Ii');
                            const pointP6 = findPoint('P6');
                            const pointA1 = findPoint('A1');
                            const pointA2 = findPoint('A2');
                            const pointA = findPoint('A');
                            const pointANS = findPoint('ANS');
                            const pointPNS = findPoint('PNS');

                            // SNA
                            if (pointS && pointN && pointA) {
                                const vectorSN = calculateVector(pointS, pointN);
                                const vectorNA = calculateVector(pointN, pointA);
                                measurements.SNA = calculateAngleBetweenVectors(vectorSN, vectorNA).toFixed(2);
                            } else {
                                measurements.SNA = null;
                            }

                            // SNB
                            if (pointS && pointN && pointB) {
                                const vectorSN = calculateVector(pointS, pointN);
                                const vectorNB = calculateVector(pointN, pointB);
                                measurements.SNB = calculateAngleBetweenVectors(vectorSN, vectorNB).toFixed(2);
                            } else {
                                measurements.SNB = null;
                            }

                            if (measurements.SNA !== null && measurements.SNB !== null) {
                                measurements.ANB = (parseFloat(measurements.SNA) - parseFloat(measurements.SNB)).toFixed(2);
                            } else {
                                measurements.ANB = null;
                            }

                            // Wits (расстояние между проекциями точек A и B на линию ANS-PNS)
                            if (pointA && pointB && pointANS && pointPNS) {
                                const projectionA = calculateProjection(pointA, pointANS, pointPNS);
                                const projectionB = calculateProjection(pointB, pointANS, pointPNS);
                                measurements.Wits = (projectionA - projectionB).toFixed(2);
                            } else {
                                measurements.Wits = null;
                            }

                            // Beta
                            if (pointS && pointN && pointA && pointB) {
                                const vectorSN = calculateVector(pointS, pointN);
                                const vectorAB = calculateVector(pointA, pointB);
                                measurements.Beta = calculateAngleBetweenVectors(vectorSN, vectorAB).toFixed(2);
                            } else {
                                measurements.Beta = null;
                            }

                            // SN-MP
                            if (pointS && pointN && pointGo && pointMe) {
                                const vectorSN = calculateVector(pointS, pointN);
                                const vectorGoMe = calculateVector(pointGo, pointMe);
                                measurements.SNMP = calculateAngleBetweenVectors(vectorSN, vectorGoMe).toFixed(2);
                            } else {
                                measurements.SNMP = null;
                            }

                            // SN-NL
                            if (pointS && pointN && pointANS && pointPNS) {
                                const vectorSN = calculateVector(pointS, pointN);
                                const vectorANS_PNS = calculateVector(pointANS, pointPNS);
                                measurements.SNNL = calculateAngleBetweenVectors(vectorSN, vectorANS_PNS).toFixed(2);
                            } else {
                                measurements.SNNL = null;
                            }

                            // NL-MP
                            if (pointANS && pointPNS && pointGo && pointMe) {
                                const vectorANS_PNS = calculateVector(pointANS, pointPNS);
                                const vectorGoMe = calculateVector(pointGo, pointMe);
                                measurements.NLMP = calculateAngleBetweenVectors(vectorANS_PNS, vectorGoMe).toFixed(2);
                            } else {
                                measurements.NLMP = null;
                            }

                            // Go
                            if (pointS && pointGo && pointMe) {
                                const vectorSGo = calculateVector(pointS, pointGo);
                                const vectorGoMe = calculateVector(pointGo, pointMe);
                                measurements.Go = calculateAngleBetweenVectors(vectorSGo, vectorGoMe).toFixed(2);
                            } else {
                                measurements.Go = null;
                            }

                            // S-Go/N-Me
                            if (pointS && pointGo && pointN && pointMe) {
                                const distanceSGo = Math.sqrt((pointGo.x - pointS.x) ** 2 + (pointGo.y - pointS.y) ** 2);
                                const distanceNMe = Math.sqrt((pointMe.x - pointN.x) ** 2 + (pointMe.y - pointN.y) ** 2);
                                measurements.SGoNMe = ((distanceSGo / distanceNMe) * 100).toFixed(2);
                            } else {
                                measurements.SGoNMe = null;
                            }

                            // I-SN
                            if (pointIi && pointGn && pointS && pointN) {
                                const vectorIiGn = calculateVector(pointIi, pointGn);
                                const vectorSN = calculateVector(pointS, pointN);
                                measurements.ISN = calculateAngleBetweenVectors(vectorIiGn, vectorSN).toFixed(2);
                            } else {
                                measurements.ISN = null;
                            }

                            // I-NL
                            if (pointIi && pointGn && pointANS && pointPNS) {
                                const vectorIiGn = calculateVector(pointIi, pointGn);
                                const vectorANS_PNS = calculateVector(pointANS, pointPNS);
                                measurements.INL = calculateAngleBetweenVectors(vectorIiGn, vectorANS_PNS).toFixed(2);
                            } else {
                                measurements.INL = null;
                            }

                            // I-MP
                            if (pointIi && pointGn && pointGo && pointMe) {

                                const vectorIiGn = calculateVector(pointIi, pointGn);
                                const vectorGoMe = calculateVector(pointGo, pointMe);
                                measurements.IMP = calculateAngleBetweenVectors(vectorIiGn, vectorGoMe).toFixed(2);
                            } else {
                                measurements.IMP = null;
                            }
                            if (pointIi && pointS && pointN) {
                                const vectorIiS = calculateVector(pointIi, pointS);
                                const vectorSN = calculateVector(pointS, pointN);
                                measurements.Ii = calculateAngleBetweenVectors(vectorIiS, vectorSN).toFixed(2);
                            } else {
                                measurements.Ii = null;
                            }
                            // Приводим значения undefined к null
                            Object.keys(measurements).forEach(key => {
                                measurements[key] = measurements[key] || null;
                            });
                            measurements.SNMP = measurements.SNMP || null;
                            measurements.SNNL = measurements.SNNL || null;
                            measurements.NLMP = measurements.NLMP || null;
                            measurements.Beta = measurements.Beta || null;
                            measurements.Go = measurements.Go || null;
                            measurements.SGoNMe = measurements.SGoNMe || null;
                            measurements.ISN = measurements.ISN || null;
                            measurements.INL = measurements.INL || null;
                            measurements.IMP = measurements.IMP || null;
                            measurements.Ii = measurements.Ii || null;
                        }

// Вспомогательные функции
                        function calculateVector(point1, point2) {
                            return { x: point2.x - point1.x, y: point2.y - point1.y };
                        }
                        function calculateAngleBetweenVectors(v1, v2) {
                            const dotProduct = v1.x * v2.x + v1.y * v2.y;
                            const magV1 = Math.sqrt(v1.x ** 2 + v1.y ** 2);
                            const magV2 = Math.sqrt(v2.x ** 2 + v2.y ** 2);

                            if (magV1 === 0 || magV2 === 0) {
                                console.error('Один из векторов имеет нулевую длину');
                                return NaN;
                            }

                            let cosTheta = dotProduct / (magV1 * magV2);
                            cosTheta = Math.max(-1, Math.min(1, cosTheta)); // Устраняем ошибки округления
                            const angleRad = Math.acos(cosTheta);
                            return angleRad * (180 / Math.PI); // Переводим в градусы
                        }

                        function calculateProjection(point, lineStart, lineEnd) {
                            const lineVector = calculateVector(lineStart, lineEnd);
                            const pointVector = calculateVector(lineStart, point);
                            const lineLengthSquared = lineVector.x ** 2 + lineVector.y ** 2;
                            const projectionScale = (pointVector.x * lineVector.x + pointVector.y * lineVector.y) / lineLengthSquared;

                            return projectionScale * Math.sqrt(lineLengthSquared); // Убедитесь, что единицы измерения корректны
                        }
                            // Заменяем undefined на null для поля SNMP и других измерений



                        // Сохранение отчета
                        saveButton.addEventListener('click', () => {
                            calculateMeasurement();

                            // Обновляем значения полей формы с данными из объекта measurements
                            document.getElementById('SNA').value = measurements.SNA;
                            document.getElementById('SNB').value = measurements.SNB;
                            document.getElementById('ANB').value = measurements.ANB;
                            document.getElementById('Wits').value = measurements.Wits;
                            document.getElementById('Beta').value = measurements.Beta;
                            document.getElementById('SNMP').value = measurements.SNMP;
                            document.getElementById('SNNL').value = measurements.SNNL;
                            document.getElementById('NLMP').value = measurements.NLMP;
                            document.getElementById('Go').value = measurements.Go;
                            document.getElementById('SGoNMe').value = measurements.SGoNMe;
                            document.getElementById('ISN').value = measurements.ISN;
                            document.getElementById('INL').value = measurements.INL;
                            document.getElementById('IMP').value = measurements.IMP;
                            document.getElementById('Ii').value = measurements.Ii;

                            // Добавляем данные о точках в скрытое поле формы
                            const pointsData = points.map(p => ({
                                name: p.name,
                                x: p.x,
                                y: p.y
                            }));
                            const pointsInput = document.createElement('input');
                            pointsInput.type = 'hidden';
                            pointsInput.name = 'points';
                            pointsInput.value = JSON.stringify(pointsData);
                            document.querySelector('form').appendChild(pointsInput);
                        });

                        // Очистка всех точек
                        clearButton.addEventListener('click', () => {
                            points.forEach(point => {
                                if (point.element) {
                                    point.element.remove();
                                }
                            });
                            points.length = 0;
                        });
                    });
                </script>

@endsection

