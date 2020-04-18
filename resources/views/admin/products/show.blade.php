<?php
use App\Models\Product;
/**
 * @var Product $product
 */
?>
@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'products', 'titlePage' => __('Просмотр продукта')])
@section('content')

{{--@if (session('status'))
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
                <span>{{ session('status') }}</span>
            </div>
        </div>
    </div>
@endif--}}
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Просмотр продукта</h4>
            <div class="card-category">{{$product->name}}</div>
        </div>
        <div class="card-body">
            <ul class="list list_clear list-description">
                <li class="list__item list-description__item">
                    <span class="list-description__unit list-description__unit_key">Алиас</span>
                    <span class="list-description__unit list-description__unit_value">{{$product->slug}}</span>
                </li>
                <li class="list__item list-description__item">
                    <span class="list-description__unit list-description__unit_key">Имя</span>
                    <span class="list-description__unit list-description__unit_value">{{$product->name}}</span>
                </li>
                <li class="list__item list-description__item">
                    <span class="list-description__unit list-description__unit_key">Описание</span>
                    <span class="list-description__unit list-description__unit_value">{{$product->description}}</span>
                </li>
                <li class="list__item list-description__item">
                    <span class="list-description__unit list-description__unit_key">Стоимость</span>
                    <span class="list-description__unit list-description__unit_value">{{$product->cost}}</span>
                </li>
                <li class="list__item list-description__item">
                    <span class="list-description__unit list-description__unit_key">Создан</span>
                    <span class="list-description__unit list-description__unit_value">{{$product->created_at}}</span>
                </li>
                <li class="list__item list-description__item">
                    <span class="list-description__unit list-description__unit_key">Обновлен</span>
                    <span class="list-description__unit list-description__unit_value">{{$product->updated_at}}</span>
                </li>
            </ul>
        </div>
        <div class="card-footer" style="justify-content: flex-start">

            <a class="btn btn-info" href="{{route('admin.products.index')}}">Вернуться к списку продуктов</a>
            <a class="btn btn-success" style="margin: 0 5px" href="{{route('admin.products.edit', $product->slug)}}">Редактировать</a>
            <a class="btn btn-danger" href="{{route('admin.products.destroy', $product->slug)}}">Удалить</a>

        </div>
    </div>

@endsection
