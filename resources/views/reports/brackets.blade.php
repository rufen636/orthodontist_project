<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отчет Брекеты</title>
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
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            text-align: center;
            padding: 10px;
        }
        .underline {
            border-bottom: 1px solid #000;
            width: 100%;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<h1>Отчет по лечению Брекетами</h1>
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
    <div class="question">
        <p>3. Прописка брекетов:</p>
        <table>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
            </tr>
            <tr>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
            </tr>
        </table>
    </div>

    <div class="question">
        <p>4. Длина коронки:</p>
        <table>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
            </tr>
            <tr>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
            </tr>
        </table>
    </div>

    <div class="question">
        <p>5. Высота позиционирования:</p>
        <table>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
            </tr>
            <tr>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
            </tr>
        </table>
    </div>

    <div class="question">
        <p>6. Реставрации-протезирование после лечения:</p>
        <table>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
            </tr>
            <tr>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
                <td><div class="underline"></div></td>
            </tr>
        </table>
    </div>

    <div class="question">
        <p>7. Дополнительно по плану лечения:</p>
        <div class="underline" style="height: 50px;"></div>
    </div>

</div>
</body>
</html>
