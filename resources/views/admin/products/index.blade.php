<?php
use App\Models\Product;
/**
 * @var Product[] $products
 */
?>

@extends('layouts.app', ['activePage' => 'products', 'titlePage' => 'Просмотр продуктов'])

@section('content')
{{--
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
--}}
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-body">
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
                                <th>Действия</th>
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
                                    <td class="td-actions text-right">
                                        <a href="{{route('admin.products.show', $product->id)}}" type="button" rel="tooltip" class="btn btn-info" data-original-title="Посмотреть" title="Посмотреть">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        <a href="{{route('admin.products.edit', $product->id)}}" type="button" rel="tooltip" class="btn btn-success" data-original-title="Редактировать" title="Редактировать">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="{{route('admin.products.destroy', $product->id)}}" rel="tooltip" class="btn btn-danger" data-original-title="Удалить" title="Удалить" onclick="return confirmDelete()">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
