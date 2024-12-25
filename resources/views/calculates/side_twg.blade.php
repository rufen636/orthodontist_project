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
            <h2 class="text-lg font-semibold mb-4">Масштаб 10 мм:</h2>
            <div class="space-y-2">
                <div>
                    <label class="flex items-center">
                        <input type="radio" name="scale" value="0mm" class="mr-2">
                        <span class="text-gray-700">Поставить 0 мм</span>
                    </label>
                </div>
                <div>
                    <label class="flex items-center">
                        <input type="radio" name="scale" value="10mm" class="mr-2">
                        <span class="text-gray-700">Поставить 10 мм</span>
                    </label>
                </div>
            </div>

            <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md grid grid-cols-2 gap-6">
                <!-- Левая колонка: Выбор точек и отображение их описания -->
                <div>
                    <h2 class="text-lg font-semibold mb-4">Точки:</h2>
                    <div id="points-container" class="space-y-6 overflow-y-auto max-h-[400px]">
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
                                <input type="radio" name="point" value="ii" class="mr-2 toggle-point">
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
                    <div class="relative">
                        <!-- Изображение -->
                        <img id="main-image" src="{{ asset('images/sidetwg/pointN.png') }}" alt="Главное изображение" class="w-full h-auto rounded-lg shadow-md">
                        <!-- Контейнер для точек -->
                        <div id="points-overlay" class="absolute top-0 left-0 w-full h-full"></div>
                    </div>
                    <p class="mt-4 text-gray-500 text-sm text-center">Кликните на изображение, чтобы установить точку.</p>

                    <!-- Контейнер для кнопок -->
                    <div class="mt-4 flex space-x-4">
                        <button id="save-image" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Сохранить изображение</button>
                        <button id="clear-points" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Очистить точки</button>
                    </div>
                </div>

            </div>

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

                // Добавление точки на изображение
                overlay.addEventListener('click', (event) => {
                    const rect = overlay.getBoundingClientRect();
                    const x = event.clientX - rect.left;
                    const y = event.clientY - rect.top;

                    // Получение выбранной точки из радиокнопок
                    const selectedPoint = document.querySelector('input[name="point"]:checked');
                    if (!selectedPoint) {
                        alert('Пожалуйста, выберите тип точки.');
                        return;
                    }

                    // Проверка на наличие точки с таким именем
                    const existingPoint = points.find(point => point.type === selectedPoint.value);
                    if (existingPoint) {
                        alert(`Точка с именем "${selectedPoint.value}" уже существует.`);
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
                    label.textContent = selectedPoint.value; // Текст берется из радиокнопки
                    label.classList.add('text-xs', 'text-gray-800', 'font-semibold');
                    pointElement.appendChild(label);

                    overlay.appendChild(pointElement);

                    // Сохраняем данные о точке
                    points.push({
                        type: selectedPoint.value,
                        x: x,
                        y: y,
                        element: pointElement, // Сохраняем элемент для последующего удаления
                    });

                    console.log('Точки:', points);
                });

                // Сохранение изображения с точками
                saveButton.addEventListener('click', () => {
                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');
                    const imageElement = new Image();

                    imageElement.src = image.src;

                    imageElement.onload = () => {
                        // Устанавливаем размеры холста
                        canvas.width = imageElement.width;
                        canvas.height = imageElement.height;

                        // Рисуем изображение на холсте
                        context.drawImage(imageElement, 0, 0);

                        // Рисуем точки и надписи
                        points.forEach(point => {
                            // Рисуем точку
                            context.beginPath();
                            context.arc(point.x, point.y, 3, 0, Math.PI * 2);
                            context.fillStyle = 'red';
                            context.fill();

                            // Рисуем надпись
                            context.font = '12px Arial';
                            context.fillStyle = 'black';
                            context.textAlign = 'center';
                            context.fillText(point.type, point.x, point.y - 5);
                        });

                        // Сохраняем холст как изображение
                        const dataUrl = canvas.toDataURL('image/png');
                        const link = document.createElement('a');
                        link.href = dataUrl;
                        link.download = 'image-with-points.png';
                        link.click();
                    };
                });

                // Очистка всех точек
                clearButton.addEventListener('click', () => {
                    // Удаляем элементы точек из DOM
                    points.forEach(point => {
                        if (point.element) {
                            point.element.remove();
                        }
                    });

                    // Очищаем массив точек
                    points.length = 0;

                    console.log('Все точки удалены.');
                });
            });
        </script>
@endsection

