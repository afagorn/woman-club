<?php
use App\Models\Product;
/**
 * @var Product[] $products
 */
?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="navbar navbar-expand-lg bg-white" style="margin-bottom: 25px">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.products.create')}}">Создать новый продукт</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container">

    <table class="table table-striped">
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
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
