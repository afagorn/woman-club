<?php
/**
 * @var \App\Models\Order[] $orders
 */
?>

@extends('admin.layouts.app', [
    'activePage' => 'orderList',
    'titlePage' => 'Просмотр заказов',
    'containerFluid' => true
])

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Покупатель</th>
              <th>Продукты</th>
              <th>Стоимость</th>
              <th>Промокод</th>
              <th>Статус</th>
              <th>Создан</th>
              <th>Обновлен</th>
              <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
              <tr>
                <td>{{$order->id}}</td>
                <td>
                  <a href="{{route('admin.customer.show', $order->customer->id)}}">{{!is_null($order->customer->user->name) ? $order->customer->user->name : 'Без имени'}}</a>
                </td>
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
                <td class="td-actions text-right">
                  <a href="{{route('admin.order.show', $order->id)}}" type="button" rel="tooltip"
                     class="btn btn-info" data-original-title="Посмотреть" title="Посмотреть">
                    <i class="material-icons">visibility</i>
                  </a>
                  <a href="{{route('admin.order.edit', $order->id)}}" type="button" rel="tooltip"
                     class="btn btn-success" data-original-title="Редактировать" title="Редактировать">
                    <i class="material-icons">edit</i>
                  </a>
                  <form action="{{route('admin.order.destroy', $order->id)}}" method="POST"
                        style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button rel="tooltip" type="submit" class="btn btn-danger js-confirm-delete"
                            data-original-title="Удалить" title="Удалить"><i class="material-icons">close</i></button>
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>

@endsection

