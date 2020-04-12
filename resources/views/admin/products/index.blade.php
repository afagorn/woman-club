<?php
use App\Models\Product;
/**
 * @var Product[] $products
 */
?>

@extends('layouts.app', ['activePage' => 'productsList', 'titlePage' => 'Просмотр продуктов'])

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
    <div class="container">
    @if (session('status'))
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
    @endif
    </div>
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
                                        <a href="{{route('admin.products.show', $product->slug)}}" type="button" rel="tooltip" class="btn btn-info" data-original-title="Посмотреть" title="Посмотреть">
                                            <i class="material-icons">visibility</i>
                                        </a>
                                        <a href="{{route('admin.products.edit', $product->slug)}}" type="button" rel="tooltip" class="btn btn-success" data-original-title="Редактировать" title="Редактировать">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <form action="{{route('admin.products.destroy', $product->slug)}}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                            <button rel="tooltip" type="submit" class="btn btn-danger js-confirm-delete" data-original-title="Удалить" title="Удалить"><i class="material-icons">close</i></button>
                                        </form>
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
