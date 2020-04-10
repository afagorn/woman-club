<?php
use App\Models\Product;
/**
 * @var Product $product
 */
?>
@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Material Dashboard')])
@section('content')
<div class="container">
    <h1>Продукт {{$product->name}}}</h1>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Алиас</th>
                <th>Имя</th>
                <th>Описание</th>
                <th>Стоимость</th>
                <th>Создан</th>
                <th>Обновлен</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->slug}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->cost}}</td>
                    <td>{{$product->created_at}}</td>
                    <td>{{$product->updated_at}}</td>
                    <td>
                        <div class="dropdown  btn-group">
                            <div class="btn dropdown-toggle btn-info">
                                <i class="icon-sett"
                            </div>
                        </div> {{}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
