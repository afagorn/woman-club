@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Создание продукта</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.products.store') }}">
        @csrf
        <div class="form-group">
            <label for="name" class="col-form-label">Название</label>
            <input id="name" type="text" class="form-control" name="name" placeholder="Сногсшибательное название">
        </div>

        <div class="form-group">
            <label for="slug" class="col-form-label">Алиас</label>
            <input id="slug" type="text" class="form-control" name="slug" placeholder="Заполняется автоматически если оставить пустым">
        </div>

        <div class="form-group">
            <label for="description" class="col-form-label">Описание</label>
            <textarea id="description" type="text" class="form-control" name="description" placeholder="Самое лучшее описание"></textarea>
        </div>

        <div class="form-group">
            <label for="cost" class="col-form-label">Стоимость</label>
            <input id="cost" type="text" class="form-control" name="cost" placeholder="Круглое число, как твое пузико)))">
        </div>

        <button class="btn btn-primary">Создать</button>
    </form>
</div>
@endsection
