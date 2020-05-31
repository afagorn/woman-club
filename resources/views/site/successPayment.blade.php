<?php
/**
 * @var \App\Models\Order|null $order
 */
?>

@extends('site.layouts.app')

  @if(is_null($order))
    @section('content')
      <h1 style="text-align: center">Ваш заказ не оплачен</h1>
    @endsection
  @else
    @section('content')

      <div class="thanksPay">
        <div class="thanksPay__wrapper">
          <div class="thanksPay__header thanksPay__header_text_center">
            <h1 class="head thanksPay__head thanksPay__head_main">Благодарим вас за покупку</h1>
            @if(count($order->products) == 1)
              <div class="thanksPay__title">Вам открыт доступ в телеграм канал по ссылке ниже. Также инвайт-ссылка была отправлена вам на почту {{$order->customer->user->email}}</div>
            @else
              <div class="thanksPay__title">Вам открыт доступ в телеграм каналы по ссылкам ниже. Также инвайт-ссылки были отправлены вам на почту {{$order->customer->user->email}}</div>
            @endif
          </div>

          <ul class="thanksPay__productList list list_clear">
            @foreach($order->products as $product)
              <li style="margin-top: 10px"><a href="{{$product->invite_link}}" target="_blank">{{$product->name}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>

    @endsection
  @endif
