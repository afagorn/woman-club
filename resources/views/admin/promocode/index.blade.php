<?php
/**
 * @var \App\Models\Promocode[] $promocodes
 */
?>

@extends('admin.layouts.app', [
    'activePage' => 'promocodeList',
    'titlePage' => 'Просмотр промокодов',
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
              <th>Название</th>
              <th>Процент скидки</th>
              <th>Дата истичения</th>
              <th>Статус</th>
              <th>Создан</th>
              <th>Обновлен</th>
              <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($promocodes as $promocode)
              <tr>
                <td>{{$promocode->id}}</td>
                <td>{{$promocode->name}}</td>
                <td>{{$promocode->discount}}</td>
                <td>{{$promocode->expiration_at}}</td>
                <td>{{$promocode->statusToText()}}</td>
                <td>{{$promocode->created_at}}</td>
                <td>{{$promocode->updated_at}}</td>
                <td class="td-actions text-right">
                  <a href="{{route('admin.promocode.show', $promocode->id)}}" type="button" rel="tooltip"
                     class="btn btn-info" data-original-title="Посмотреть" title="Посмотреть">
                    <i class="material-icons">visibility</i>
                  </a>
                  <a href="{{route('admin.promocode.edit', $promocode->id)}}" type="button" rel="tooltip"
                     class="btn btn-success" data-original-title="Редактировать" title="Редактировать">
                    <i class="material-icons">edit</i>
                  </a>
                  <form action="{{route('admin.promocode.destroy', $promocode->id)}}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button rel="tooltip" type="submit" class="btn btn-danger js-confirm-delete"
                            data-original-title="Удалить" title="Удалить"><i class="material-icons">close</i></button>
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

