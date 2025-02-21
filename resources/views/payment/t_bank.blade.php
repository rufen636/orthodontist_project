@extends('layouts.app')

@section('head')
    <title>Ортодонт | Лечение зубов</title>
    <meta name="description" content="Вылечим ваши зубы"/>
@endsection

@section('content')
<script src="https://securepay.tinkoff.ru/html/payForm/js/tinkoff_v2.js"></script>
<form action="{{ route('tinkoff.pay') }}" method="POST" class="payform-tbank pt-20" name="payform-tbank" onsubmit="pay(this); return false;">
    @csrf
    <input class="payform-tbank-row" type="hidden" name="terminalkey" value="{{config('services.tinkoff.terminal_key')}}">
    <input class="payform-tbank-row" type="hidden" name="frame" value="false">
    <input class="payform-tbank-row" type="hidden" name="language" value="ru">
    <input class="payform-tbank-row" type="text" placeholder="Сумма заказа" value="3000" name="amount" required>
    <input class="payform-tbank-row" type="hidden" placeholder="Номер заказа" name="order">
    <input class="payform-tbank-row" type="text" placeholder="Описание заказа" name="description">
    <input class="payform-tbank-row" type="text" placeholder="ФИО плательщика" name="name">
    <input class="payform-tbank-row" type="email" placeholder="E-mail" name="email">
    <input class="payform-tbank-row" type="tel" placeholder="Контактный телефон" name="phone">
    <input class="payform-tbank-row payform-tbank-btn" type="submit" value="Оплатить">
</form>
<style>
    .payform-tbank {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin: 2px auto;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        max-width: 250px;
    }
    .payform-tbank-row {
        margin: 2px;
        border-radius: 4px;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        -webkit-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
        border: 1px solid #DFE3F3;
        padding: 15px;
        outline: none;
        background-color: #DFE3F3;
        font-size: 15px;
    }
    .payform-tbank-row:focus {
        background-color: #FFFFFF;
        border: 1px solid #616871;
        border-radius: 4px;
    }
    .payform-tbank-btn {
        background-color: #FBC520;
        border: 1px solid #FBC520;
        color: #3C2C0B;
    }
    .payform-tbank-btn:hover {
        background-color: #FAB619;
        border: 1px solid #FAB619;
    }
</style>
<script type="text/javascript">
    const TPF = document.getElementById("payform-tbank");

    TPF.addEventListener("submit", function (e) {
        e.preventDefault();
        const {description, amount, email, phone, receipt} = TPF;

        if (receipt) {
            if (!email.value && !phone.value)
                return alert("Поле E-mail или Phone не должно быть пустым");

            TPF.receipt.value = JSON.stringify({
                "EmailCompany": "mail@mail.com",
                "Taxation": "patent",
                "FfdVersion": "1.2",
                "Items": [
                    {
                        "Name": description.value || "Оплата",
                        "Price": Math.round(amount.value * 100),
                        "Quantity": 1.00,
                        "Amount": Math.round(amount.value * 100),
                        "PaymentMethod": "full_prepayment",
                        "PaymentObject": "service",
                        "Tax": "none",
                        "MeasurementUnit": "pc"
                    }
                ]
            });
        }
        pay(TPF);
    })
</script>
@endsection
