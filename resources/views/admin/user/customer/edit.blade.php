<?php
/**
 * @var \App\Models\User\Customer $customer
 * @var \Illuminate\Support\MessageBag $errors
 */
?>

@extends('layouts.app', ['activePage' => 'customer', 'titlePage' => __('Редактирование покупателя')])
@section('content')
  <form action="{{route('admin.customer.update', $customer->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Редактирование покупателя</h4>
        <p class="card-category">{{$customer->name}}</p>
      </div>

      <div class="card-body ">
        <div class="form-group {{$errors->has('name') ? 'has-danger' : ''}}">
          <label class="col-form-label" for="input-name">{{__('validation.attributes.name')}}</label>
          <input type="text" id="input-name" name="name" value="{{old('name', $customer->name)}}"
                 class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
          @if($errors->has('name'))<span class="error text-danger">{{$errors->first('name')}}</span>@endif
        </div>

        <div class="form-group {{$errors->has('description') ? 'has-danger' : ''}}">
          <label for="input-description">{{__('validation.attributes.description')}}</label>
          <textarea id="input-description" name="description"
                    class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}">{{old('description', $customer->description)}}</textarea>
          @if($errors->has('description'))<span class="error text-danger">{{$errors->first('description')}}</span>@endif
        </div>

        <div class="form-group {{$errors->has('cost') ? 'has-danger' : ''}}">
          <label for="input-description">{{__('validation.attributes.cost')}}</label>
          <input type="text" id="input-description" name="cost" value="{{old('cost', $customer->cost)}}"
                 class="form-control {{$errors->has('cost') ? 'is-invalid' : ''}}">
          @if($errors->has('cost'))<span class="error text-danger">{{$errors->first('cost')}}</span>@endif
        </div>
      </div>
      <div class="card-footer mr-auto">
        <button class="btn btn-success" type="submit">Редактировать</button>
        <a href="{{route('admin.customer.index')}}" class="btn btn-info" type="submit">Вернуться</a>
      </div>
    </div>

  </form>
@endsection
