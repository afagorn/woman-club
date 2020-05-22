@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">
            <input type="hidden" name="receiver" value="{{ $receiver }}">
            <input type="hidden" name="formcomment" value="Проект «Железный человек»: реактор холодного ядерного синтеза">
            <input type="hidden" name="short-dest" value="Проект «Железный человек»: реактор холодного ядерного синтеза">
            <input type="hidden" name="label" value="$order_id">
            <input type="hidden" name="quickpay-form" value="donate">
            <input type="hidden" name="targets" value="транзакция {order_id}">
            <input type="hidden" name="sum" value="4568.25" data-type="number">
            <input type="hidden" name="comment" value="Хотелось бы получить дистанционное управление.">
            <input type="hidden" name="need-fio" value="true">
            <input type="hidden" name="need-email" value="true">
            <input type="hidden" name="need-phone" value="false">
            <input type="hidden" name="need-address" value="false">
            <div class="form-group">
                <label class="col-form-label"><input type="radio" name="paymentType" value="PC">Яндекс.Деньгами</label>
            </div>
            <div class="form-group">
                <label><input type="radio" name="paymentType" value="AC">Банковской картой</label>
            </div>
            <button class="btn btn-primary">Оплатить</button>
        </form>
    </div>
@endsection
