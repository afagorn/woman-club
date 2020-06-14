<?php
/**
 * @var \Illuminate\Support\MessageBag $errors
 * @var \App\Models\Product\Product[] $products
 * @var \App\Models\Promocode[] $promocodes
 */
?>
@extends('admin.layouts.app', ['activePage' => 'orderCreate', 'titlePage' => 'Создание заказа'])

@section('content')
  {{--@if($errors)
    @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
    @endforeach
  @endif--}}
  <form method="POST" action="{{ route('admin.order.store') }}">
    @csrf
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Создание нового заказа</h4>
        <p class="card-category">Если заказ в статусе оплачен, то отправляется соответствующее письмо на email покупателя</p>
      </div>

      <div class="card-body">
        <div class="form-group">
          <label for="email" class="col-form-label">{{__('validation.attributes.email')}}</label>
          <input id="email" type="text" class="form-control" name="email" placeholder="myawesome@email.ru" value="{{old('email')}}">
          @if($errors->has('email'))<span class="error text-danger">{{$errors->first('email')}}</span>@endif
        </div>

        <div class="form-group">
          <label for="name" class="col-form-label">{{__('validation.attributes.userName')}}</label>
          <input id="name" type="text" class="form-control" name="name" placeholder="Аполлинария" value="{{old('name')}}">
          @if($errors->has('name'))<span class="error text-danger">{{$errors->first('name')}}</span>@endif
        </div>

        <div class="form-group">
          <label for="productsId">Продукт(ы)</label>
          <select multiple="multiple" class="form-control" data-style="btn btn-link" id="productsId" name="products_id[]" required>
            @foreach($products as $product)
              <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="promocode">Промокод</label>
          <select class="form-control" data-style="btn btn-link" id="promocode" name="promocode" required>
            <option>Не указан</option>
            @foreach($promocodes as $promocode)
              <option value="{{$promocode->name}}">{{$promocode->name}} ({{$promocode->discount}}%)</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="status">Статус заказа</label>
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
