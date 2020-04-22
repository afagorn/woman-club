<?php
/**
 * @var \Illuminate\Support\MessageBag $errors
 * @var \App\Models\Product[] $products
 */
?>
@extends('layouts.app', ['activePage' => 'orderCreate', 'titlePage' => 'Создание заказа'])

@section('content')
  <form method="POST" action="{{ route('admin.order.store') }}">
    @csrf
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Создание нового заказа</h4>
        <p class="card-category">Инвайт ссылка будет автоматически сгенерирована и отправлена по email</p>
      </div>

      <div class="card-body">
        <div class="form-group">
          <label for="email" class="col-form-label">{{__('validation.attributes.email')}}</label>
          <input id="email" type="text" class="form-control" name="email" placeholder="myawesome@email.ru" value="{{old('email')}}">
          @if($errors->has('email'))<span class="error text-danger">{{$errors->first('email')}}</span>@endif
        </div>

        <div class="form-group">
          <label for="product">Продукт</label>
          <select class="form-control" data-style="btn btn-link" id="product" name="productId" required>
          @foreach($products as $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
          @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="status">Статус платежа</label>
          <select class="form-control" data-style="btn btn-link" id="status" name="status">
            <option value="{{\App\Models\Order::STATUS_NOT_PAID}}" selected>Не оплачен</option>
            <option value="{{\App\Models\Order::STATUS_PAID}}">Оплачен</option>
          </select>
        </div>

      </div>
      <div class="card-footer">
        <button class="btn btn-primary">Создать</button>
      </div>
    </div>
  </form>

@endsection
