<?php

use App\Models\Product\Product;

/**
 * @var Product[] $products
 */
?>

@extends('admin.layouts.app', [
    'activePage' => 'productsList',
    'titlePage' => 'Просмотр продуктов',
    'containerFluid' => true
])

@section('content')
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
              <th>Инвайт-ссылка</th>
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
                <td>{{$product->invite_link}}</td>
                <td>{{$product->cost}}</td>
                <td>{{$product->created_at}}</td>
                <td>{{$product->updated_at}}</td>
                <td class="td-actions text-right">
                  <a href="{{route('admin.products.show', $product->slug)}}" type="button" rel="tooltip"
                     class="btn btn-info" data-original-title="Посмотреть" title="Посмотреть">
                    <i class="material-icons">visibility</i>
                  </a>
                  <a href="{{route('admin.products.edit', $product->slug)}}" type="button" rel="tooltip"
                     class="btn btn-success" data-original-title="Редактировать" title="Редактировать">
                    <i class="material-icons">edit</i>
                  </a>
                  <form action="{{route('admin.products.destroy', $product->slug)}}" method="POST"
                        style="display: inline-block;">
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

@endsection

