@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white shadow rounded-lg">
    <!-- Header -->
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
    <!-- Image and Graph Section -->
    <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- X-Ray -->
        <div>
            <img src="{{ asset('storage/' . $trgCalculation->image_path) }}" alt="X-Ray" class="w-full h-auto rounded shadow">
        </div>


        <!-- Graphs -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Пик роста</h3>
            <div class="grid grid-cols-3 gap-4">

                <img src="{{ asset('images/sidetwg/vertebra.svg') }}" alt="Graph CS1" class="max-w-[350px] max-h-[350px] h-auto mx-auto">

            </div>
        </div>
    </div>
<div class="mt-6">
    <table class="w-full border-collapse border border-gray-200">
        <thead>
        <tr class="bg-gray-100 text-left">
            <th class="border border-gray-200 px-4 py-2">Измерение</th>
            <th class="border border-gray-200 px-4 py-2">Результат </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="border border-gray-200 px-4 py-2">&lt;SNA&gt;</td>
            <td class="border border-gray-200 px-4 py-2">{{$trgCalculation->SNA}}°</td>
        </tr>
        <tr>
            <td class="border border-gray-200 px-4 py-2">&lt;SNB&gt;</td>
            <td class="border border-gray-200 px-4 py-2">{{$trgCalculation->SNB}}° </td>
        </tr>
        <tr>
            <td class="border border-gray-200 px-4 py-2">&lt;ANB&gt;</td>
            <td class="border border-gray-200 px-4 py-2">{{$trgCalculation->ANB}}° </td>
        </tr>
        <tr>
            <td class="border border-gray-200 px-4 py-2">&lt;Wits&gt;</td>
            <td class="border border-gray-200 px-4 py-2">{{$trgCalculation->Wits}}° </td>
        </tr>
        <tr>
            <td class="border border-gray-200 px-4 py-2">&lt;Beta&gt;</td>
            <td class="border border-gray-200 px-4 py-2">{{$trgCalculation->Beta}}° </td>
        </tr>
        <tr>
            <td class="border border-gray-200 px-4 py-2">&lt;SNMP&gt;</td>
            <td class="border border-gray-200 px-4 py-2">{{$trgCalculation->SNMP}}° </td>
        </tr>
        <tr>
            <td class="border border-gray-200 px-4 py-2">&lt;SNNL&gt;</td>
            <td class="border border-gray-200 px-4 py-2">{{$trgCalculation->SNNL}}° </td>
        </tr>
        <tr>
            <td class="border border-gray-200 px-4 py-2">&lt;NLMP&gt;</td>
            <td class="border border-gray-200 px-4 py-2">{{$trgCalculation->NLMP}}° </td>
        </tr>
        <tr>
            <td class="border border-gray-200 px-4 py-2">&lt;Go&gt;</td>
            <td class="border border-gray-200 px-4 py-2">{{$trgCalculation->Go}}° </td>
        </tr>
        <tr>
            <td class="border border-gray-200 px-4 py-2">&lt;S-Go/N-Me&gt;</td>
            <td class="border border-gray-200 px-4 py-2">{{$trgCalculation->SGoNMe}} % </td>
        </tr>
        <tr>
            <td class="border border-gray-200 px-4 py-2">&lt;ISN&gt;</td>
            <td class="border border-gray-200 px-4 py-2">{{$trgCalculation->ISN}}° </td>
        </tr>
        <tr>
            <td class="border border-gray-200 px-4 py-2">&lt;INL&gt;</td>
            <td class="border border-gray-200 px-4 py-2">{{$trgCalculation->INL}}° </td>
        </tr>
        <tr>
            <td class="border border-gray-200 px-4 py-2">&lt;IMP&gt;</td>
            <td class="border border-gray-200 px-4 py-2">{{$trgCalculation->IMP}}° </td>
        </tr>
        <tr>
            <td class="border border-gray-200 px-4 py-2">&lt;Ii&gt;</td>
            <td class="border border-gray-200 px-4 py-2">{{$trgCalculation->Ii}}° </td>
        </tr>
        <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>


</div>
@endsection
