<?php

use App\Models\Product\Product;

/**
 * @var \App\Models\User\Customer $customer
 */
?>
@extends('admin.layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'customer', 'titlePage' => __('Просмотр продукта')])
@section('content')
  <div class="row">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Просмотр покупателя</h4>
        <div class="card-category">{{$customer->name}}</div>
      </div>
      <div class="card-body">
        <ul class="list list_clear list-description">
          <li class="list__item list-description__item">
            <span class="list-description__unit list-description__unit_key">Имя</span>
            <span class="list-description__unit list-description__unit_value">{{$customer->user->name}}</span>
          </li>
          <li class="list__item list-description__item">
            <span class="list-description__unit list-description__unit_key">Email</span>
            <span class="list-description__unit list-description__unit_value">{{$customer->user->email}}</span>
          </li>
          <li class="list__item list-description__item">
            <span class="list-description__unit list-description__unit_key">Телеграм username</span>
            <span class="list-description__unit list-description__unit_value">{{$customer->tg_username}}</span>
          </li>
          {{--<li class="list__item list-description__item">
            <span class="list-description__unit list-description__unit_key">Дата прекращения подписки</span>
            <span class="list-description__unit list-description__unit_value">{{$customer->unsubscribe_at}}</span>
          </li>--}}
        </ul>
      </div>
      <div class="card-footer" style="justify-content: flex-start">

        <a class="btn btn-info" href="{{route('admin.customer.index')}}">Вернуться к списку покупателей</a>
        <a class="btn btn-success" style="margin: 0 5px" href="{{route('admin.customer.edit', $customer->id)}}">Редактировать</a>
        <a class="btn btn-danger" href="{{route('admin.customer.destroy', $customer->id)}}">Удалить</a>

      </div>
    </div>
  </div>

  <div class="row">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Заказы</h4>
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Продукты</th>
              <th>Стоимость</th>
              <th>Промокод</th>
              <th>Статус</th>
              <th>Создан</th>
              <th>Обновлен</th>
            </tr>
          </thead>
          <tbody>
          @foreach($customer->orders as $order)
            <tr>
              <td>{{$order->id}}</td>
              <td>
                <ul class="list_clear">
                  @foreach($order->products as $product)
                    <li><a href="{{route('admin.products.show', $product->slug)}}">{{$product->name}}</a></li>
                  @endforeach
                </ul>
              </td>
              <td>{{$order->cost}}</td>
              <td>{{$order->promocodeToText()}}</td>
              <td>{{$order->statusToText()}}</td>
              <td>{{$order->created_at}}</td>
              <td>{{$order->updated_at}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
