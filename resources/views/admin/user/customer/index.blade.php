<?php
/**
 * @var \App\Models\User\Customer[] $customers
 */
?>

@extends('layouts.app', [
    'activePage' => 'customerList',
    'titlePage' => 'Просмотр покупателей',
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
              <th>Имя</th>
              <th>Email</th>
              <th>Создан</th>
              <th>Обновлен</th>
              <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
              <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->user->name}}</td>
                <td>{{$customer->user->email}}</td>
                <td>{{$customer->user->created_at}}</td>
                <td>{{$customer->user->updated_at}}</td>
                <td class="td-actions text-right">
                  <a href="{{route('admin.customer.show', $customer->id)}}" type="button" rel="tooltip"
                     class="btn btn-info" data-original-title="Посмотреть" title="Посмотреть">
                    <i class="material-icons">visibility</i>
                  </a>
                  <a href="{{route('admin.customer.edit', $customer->id)}}" type="button" rel="tooltip"
                     class="btn btn-success" data-original-title="Редактировать" title="Редактировать">
                    <i class="material-icons">edit</i>
                  </a>
                  <form action="{{route('admin.customer.destroy', $customer->id)}}" method="POST"
                        style="display: inline-block;">
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

