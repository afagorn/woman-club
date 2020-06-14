<?php
/**
 * @var \App\Models\Promocode $promocode
 * @var \Illuminate\Support\MessageBag $errors
 */
?>

@extends('admin.layouts.app', ['activePage' => 'promocodeEdit', 'titlePage' => __('Редактирование промокода')])
@section('content')
  <form action="{{route('admin.promocode.update', $promocode->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Редактирование промокода</h4>
        <p class="card-category">{{$promocode->name}}</p>
      </div>

      <div class="card-body">
        <div class="form-group">
          <label for="name" class="col-form-label">{{__('validation.attributes.name')}}</label>
          <input id="name" type="text" class="form-control" name="name" placeholder="Одно слово в любом регистре, например, PROMOCODE" value="{{old('name', $promocode->name)}}">
          @if($errors->has('name'))<span class="error text-danger">{{$errors->first('name')}}</span>@endif
        </div>

        <div class="form-group">
          <label for="discount" class="col-form-label">{{__('validation.attributes.discount')}}</label>
          <input id="discount" type="text" class="form-control" name="discount" placeholder="Целое положительное число в процентах от 1 до 100" value="{{old('discount', $promocode->discount)}}">
          @if($errors->has('discount'))<span class="error text-danger">{{$errors->first('discount')}}</span>@endif
        </div>

        <div class="form-group">
          <label for="expirationDate" class="col-form-label">{{__('validation.attributes.expirationDate')}}</label>
          <div class="input-group date">
            <input id="expirationDate" type="text" class="form-control js-datetimepicker" name="expirationDate" placeholder="дд/мм/гггг" value="{{old('expirationDate', $promocode->expiration_at->isoFormat('DD.MM.YYYY H:ss'))}}">
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
      <div class="card-footer mr-auto">
        <button class="btn btn-success" type="submit">Редактировать</button>
        <a href="{{route('admin.promocode.index')}}" class="btn btn-info" type="submit">Вернуться</a>
      </div>
    </div>

  </form>
@endsection
