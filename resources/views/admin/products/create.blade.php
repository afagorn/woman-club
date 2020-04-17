<?php
/**
 * @var \Illuminate\Support\MessageBag $errors
 */
?>

@extends('layouts.app', ['activePage' => 'productsCreate', 'titlePage' => 'Создание продукта'])

@section('content')
    <div class="content">
        <div class="container">
            <form method="POST" action="{{ route('admin.products.store') }}">
                @csrf
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Создание нового продукта</h4>
                    </div>


                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">{{__('validation.attributes.name')}}</label>
                            <input id="name" type="text" class="form-control" name="name" placeholder="Название" value="{{old('name')}}">
                            @if($errors->has('name'))<span class="error text-danger">{{$errors->first('name')}}</span>@endif
                        </div>

                        <div class="form-group">
                            <label for="slug" class="col-form-label">{{__('validation.attributes.slug')}}</label>
                            <input id="slug" type="text" class="form-control" name="slug" placeholder="Заполняется автоматически, если оставить пустым" value="{{old('slug')}}">
                            @if($errors->has('slug'))<span class="error text-danger">{{$errors->first('slug')}}</span>@endif
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-form-label">{{__('validation.attributes.description')}}</label>
                            <textarea id="description" type="text" class="form-control" name="description" placeholder="Описание продукта" >{{old('description')}}</textarea>
                            @if($errors->has('description'))<span class="error text-danger">{{$errors->first('description')}}</span>@endif
                        </div>

                        <div class="form-group">
                            <label for="cost" class="col-form-label">{{__('validation.attributes.cost')}}</label>
                            <input id="cost" type="text" class="form-control" name="cost" placeholder="Целое число" value="{{old('cost')}}">
                            @if($errors->has('cost'))<span class="error text-danger">{{$errors->first('cost')}}</span>@endif
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Создать</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
