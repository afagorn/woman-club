<?php
/**
 * @var \Illuminate\Support\MessageBag $errors
 */
?>
@extends('admin.layouts.app', ['activePage' => 'customerCreate', 'titlePage' => 'Создание покупателя'])

@section('content')
  <form method="POST" action="{{ route('admin.customer.store') }}">
    @csrf
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Создание нового покупателя</h4>
        {{--<p class="card-category">Инвайт ссылка будет автоматически сгенерирована и отправлена по email</p>--}}
      </div>

      <div class="card-body">
        <div class="form-group">
          <label for="name" class="col-form-label">{{__('validation.attributes.userName')}}</label>
          <input id="name" type="text" class="form-control" name="name" placeholder="Михиал" value="{{old('name')}}">
          @if($errors->has('name'))<span class="error text-danger">{{$errors->first('name')}}</span>@endif
        </div>

        <div class="form-group">
          <label for="email" class="col-form-label">{{__('validation.attributes.email')}}</label>
          <input id="email" type="text" class="form-control" name="email" placeholder="myawesome@email.ru" value="{{old('email')}}">
          @if($errors->has('email'))<span class="error text-danger">{{$errors->first('email')}}</span>@endif
        </div>

        <div class="form-group">
          <label for="password" class="col-form-label">{{__('validation.attributes.password')}}</label>
          <input id="password" type="text" class="form-control" name="password" placeholder="До 32 символов" value="{{old('password')}}">
          @if($errors->has('password'))<span class="error text-danger">{{$errors->first('password')}}</span>@endif
        </div>

        <div class="form-group">
          <label for="tgUsername" class="col-form-label">{{__('validation.attributes.tgUsername')}}</label>
          <input id="tgUsername" type="text" class="form-control" name="tgUsername" placeholder="Без @, просто строка" value="{{old('tgUsername')}}">
          @if($errors->has('tgUsername'))<span class="error text-danger">{{$errors->first('tgUsername')}}</span>@endif
        </div>

        <div class="form-group ">
          <label for="unsubscribeDate" class="col-form-label">{{__('validation.attributes.unsubscribeDate')}}</label>
          <div class="input-group date ">
            <input id="unsubscribeDate" type="text" class="form-control js-datetimepicker" name="unsubscribeDate" placeholder="дд/мм/гггг" value="{{old('unsubscribeDate')}}">
            @if($errors->has('unsubscribeDate'))<span class="error text-danger">{{$errors->first('unsubscribeDate')}}</span>@endif
            <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
          </div>

        </div>

      </div>
      <div class="card-footer">
        <button class="btn btn-primary">Создать</button>
      </div>
    </div>
  </form>

@endsection
