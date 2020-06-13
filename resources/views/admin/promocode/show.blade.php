<?php

/**
 * @var \App\Models\Promocode $promocode
 */
?>
@extends('admin.layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'promocodeShow', 'titlePage' => __('Просмотр заказа')])
@section('content')
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title">Просмотр промокода</h4>
      <div class="card-category">{{$promocode->name}}</div>
    </div>
    <div class="card-body">
      <ul class="list list_clear list-description">
        <li class="list__item list-description__item">
          <span class="list-description__unit list-description__unit_key">Название</span>
          <span class="list-description__unit list-description__unit_value">{{$promocode->name}}</span>
        </li>
        <li class="list__item list-description__item">
          <span class="list-description__unit list-description__unit_key">Скидка</span>
          <span class="list-description__unit list-description__unit_value">{{$promocode->discount}}%</span>
        </li>
        <li class="list__item list-description__item">
          <span class="list-description__unit list-description__unit_key">Дата истечения</span>
          <span class="list-description__unit list-description__unit_value">{{$promocode->expiration_at}}</span>
        </li>
        <li class="list__item list-description__item">
          <span class="list-description__unit list-description__unit_key">Статус</span>
          <span class="list-description__unit list-description__unit_value">{{$promocode->statusToText()}}</span>
        </li>
      </ul>
    </div>
    <div class="card-footer" style="justify-content: flex-start">

      <a class="btn btn-info" href="{{route('admin.promocode.index')}}">Вернуться к списку промокодов</a>
      <a class="btn btn-success" style="margin: 0 5px" href="{{route('admin.promocode.edit', $promocode->id)}}">Редактировать</a>
      <a class="btn btn-danger" href="{{route('admin.promocode.destroy', $promocode->id)}}">Удалить</a>

    </div>
  </div>

@endsection
