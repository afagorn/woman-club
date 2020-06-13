<?php
/**
 * @var \Illuminate\Support\MessageBag $errors
 */
?>
@extends('admin.layouts.app', ['activePage' => 'promocodeCreate', 'titlePage' => 'Создание промокода'])

@section('content')
  @if($errors)
    @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
    @endforeach
  @endif
  <form method="POST" action="{{ route('admin.promocode.store') }}">
    @csrf
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Создание нового промокода</h4>
        <p class="card-category">Промокоды регистронезависимые(ПРОМОКОД = ПрОмОкОд)</p>
      </div>

      <div class="card-body">
        <div class="form-group">
          <label for="name" class="col-form-label">{{__('validation.attributes.name')}}</label>
          <input id="name" type="text" class="form-control" name="name" placeholder="Одно слово в любом регистре, например, PROMOCODE" value="{{old('name')}}">
          @if($errors->has('name'))<span class="error text-danger">{{$errors->first('name')}}</span>@endif
        </div>

        <div class="form-group">
          <label for="discount" class="col-form-label">{{__('validation.attributes.discount')}}</label>
          <input id="discount" type="text" class="form-control" name="discount" placeholder="Целое положительное число в процентах от 1 до 100" value="{{old('discount')}}">
          @if($errors->has('discount'))<span class="error text-danger">{{$errors->first('discount')}}</span>@endif
        </div>

        <div class="form-group">
          <label for="expirationDate" class="col-form-label">{{__('validation.attributes.expirationDate')}}</label>
          <div class="input-group date">
            <input id="expirationDate" type="text" class="form-control js-datetimepicker" name="expirationDate" placeholder="дд/мм/гггг" value="{{old('expirationDate')}}">
            @if($errors->has('expirationDate'))<span class="error text-danger">{{$errors->first('expirationDate')}}</span>@endif
            <span class="input-group-addon"></span>
            <span class="glyphicon glyphicon-calendar"></span>
          </div>
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">{{__('validation.attributes.status')}}</label>
          <select class="form-control" data-style="btn btn-link" id="status" name="status">
            <option value="{{\App\Models\Promocode::STATUS_ACTIVATED}}" selected>Активен</option>
            <option value="{{\App\Models\Promocode::STATUS_NOT_ACTIVATED}}">Не активен</option>
          </select>
          @if($errors->has('status'))<span class="error text-danger">{{$errors->first('status')}}</span>@endif
        </div>

      </div>
      <div class="card-footer">
        <button class="btn btn-primary">Создать</button>
      </div>
    </div>
  </form>

@endsection
