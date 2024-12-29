<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отчет Элайнеры</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h2 {
            color: #333;
        }
        .question {
            margin-bottom: 20px;
        }
        .underline {
            border-bottom: 1px solid #000;
            width: 100%;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<h1>Отчет Элейнеры</h1>
<p>Пациент: {{ $patient->fullName }}</p>

<!-- Здесь добавьте остальные данные и таблицы, которые хотите включить в отчет -->

<h2>Таблицы данных пациента</h2>
<p> Дефецит места ВЧ: {{$planningCalculation->space_vc}}</p>
<table border="1">

    <tr>
        <th >Наклон резцов</th>
        <th >3-3</th>
        <th >4-4</th>
        <th >5-5</th>
        <th >6-6</th>
        <th >Дистализация I</th>
        <th >Дистализация II</th>
        <th >Деротация 16</th>
        <th >Деротация 26</th>
        <th >Сепарация (промежуток)</th>
        <th >Место</th>

        <!-- добавьте другие столбцы -->
    </tr>
    <tr>
        <td>{{ $planningCalculation->incisor_inclination_up }}</td>
        <td>{{ $planningCalculation->value_3_3_vc }}</td>
        <td>{{ $planningCalculation->value_4_4_vc }}</td>
        <td>{{ $planningCalculation->value_5_5_vc }}</td>
        <td>{{ $planningCalculation->value_6_6_vc }}</td>
        <td>{{ $planningCalculation->distalization_i }}</td>
        <td>{{ $planningCalculation->distalization_ii }}</td>
        <td>{{ $planningCalculation->derotation_16 }}</td>
        <td>{{ $planningCalculation->derotation_26 }}</td>
        <td>{{ $planningCalculation->separation }}</td>
        <td>{{ $planningCalculation->space_vc }}</td>
    </tr>
    <!-- добавьте остальные строки данных -->
</table>
<p> Дефецит места НЧ: {{$planningCalculation->space_nc}}</p>
<table border="1">

    <tr>
        <th >Наклон резцов</th>
        <th >3-3</th>
        <th >4-4</th>
        <th >5-5</th>
        <th >6-6</th>
        <th >Дистализация III</th>
        <th >Дистализация IV</th>
        <th >Сепарация (промежуток)</th>
        <th >Место</th>

        <!-- добавьте другие столбцы -->
    </tr>
    <tr>
        <td>{{ $planningCalculation->incisor_inclination_down }}</td>
        <td>{{ $planningCalculation->value_3_3_nc }}</td>
        <td>{{ $planningCalculation->value_4_4_nc }}</td>
        <td>{{ $planningCalculation->value_5_5_nc }}</td>
        <td>{{ $planningCalculation->value_5_5_nc }}</td>
        <td>{{ $planningCalculation->distalization_iii }}</td>
        <td>{{ $planningCalculation->distalization_iv }}</td>
        <td>{{ $planningCalculation->separation_nc }}</td>
        <td>{{ $planningCalculation->space_nc }}</td>
    </tr>
</table>
<div class="question">
    <p>1. Без удаления / С удалением - каких зубов, когда:</p>
    <div class="underline"></div>
</div>

<div class="question">
    <p>2. Дополнительные приспособления (МИ, аппараты):</p>
    <div class="underline"></div>
</div>
<h2>ВЧ</h2>
<ol>
    <li>Наклоните коронки верхних резцов щечно на {{$planningCalculation->incisor_inclination_up}} градусов. Корни не смешайте щечно/корне смешайте небно на {{$planningCalculation->derotation_16}} мм.</li>
    <li>Ширину в области кликов не меняйте.</li>
    <li>Наклоните коронки премоляров щечно и моляров щечно на {{$planningCalculation->value_4_4_nc}} мм . Корни не смешайте щечно/корни смешайте небно на {{$planningCalculation->derotation_26}} мм.</li>
    <li>Проведите последовательную дистализацию по протоколу 1/2 вверх слева на {{$planningCalculation->distalization_i}} и справа на {{$planningCalculation->distalization_ii}}.</li>
    <li>Проведите дистализацию нижних премоляров щечно на 1 мм.</li>
    <li>Проведите сепарацию верхний резцов на {{$planningCalculation->sepUp}} мм</li>
</ol>

<h2>НЧ</h2>
<ol>
    <li>Проведите дистализацию нижних резцов щечно на {{$planningCalculation->incisor_inclination_down}} мм. Корни не смешайте щечно/корни смешайте небно на {{$planningCalculation->derotation_16}} мм.</li>
    <li>Проведите дистализацию нижних премоляров щечно на {{$planningCalculation->derotation_26}} мм.</li>
    <li>Проведите сепарацию нижних резцов на {{$planningCalculation->sepDown}} мм</li>
</ol>


<p>Введите мысли:</p>

</body>
</html>
