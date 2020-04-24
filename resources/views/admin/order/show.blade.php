<?php

/**
 * @var \App\Models\Order $order
 */
?>
@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'orderShow', 'titlePage' => __('Просмотр заказа')])
@section('content')
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title">Просмотр заказа</h4>
      <div class="card-category">{{$order->name}}</div>
    </div>
    <div class="card-body">
      <ul class="list list_clear list-description">
        <li class="list__item list-description__item">
          <span class="list-description__unit list-description__unit_key">Имя покупателя</span>
          <span class="list-description__unit list-description__unit_value">{{$order->customer->user->name}}</span>
        </li>
        <li class="list__item list-description__item">
          <span class="list-description__unit list-description__unit_key">Email покупателя</span>
          <span class="list-description__unit list-description__unit_value">{{$order->customer->user->email}}</span>
        </li>
        <li class="list__item list-description__item">
          <span class="list-description__unit list-description__unit_key">Телеграм ссылка</span>
          <span class="list-description__unit list-description__unit_value">{{$order->tgInviteLink->link}}</span>
        </li>
        {{--<li class="list__item list-description__item">
          <span class="list-description__unit list-description__unit_key">Стоимость</span>
          <span class="list-description__unit list-description__unit_value">{{$order->cost}}</span>
        </li>--}}
        <li class="list__item list-description__item">
          <span class="list-description__unit list-description__unit_key">Статус</span>
          <span class="list-description__unit list-description__unit_value">{{$order->statusToText()}}</span>
        </li>
      </ul>
    </div>
    <div class="card-footer" style="justify-content: flex-start">

      <a class="btn btn-info" href="{{route('admin.order.index')}}">Вернуться к списку заказов</a>
      <a class="btn btn-success" style="margin: 0 5px" href="{{route('admin.order.edit', $order->id)}}">Редактировать</a>
      <a class="btn btn-danger" href="{{route('admin.order.destroy', $order->id)}}">Удалить</a>

    </div>
  </div>

@endsection
