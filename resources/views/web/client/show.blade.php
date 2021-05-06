@extends('layouts.app')

@section('content')
@if($errors->any())
    {{ dd($errors->messages()) }}
@endif
<div class="row">
    <div class="col"></div>
    <div class="col-sm-5 ml-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Информация о профиле</h5>
                <p class="card-text">Создан: {{ $client->created_at }}</p>
                <p class="card-text">Обновлен: {{ $client->updated_at }}</p>
                <form action="{{ route('web.client.update', ['client' => $client]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $client->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Почта</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{ $client->email }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $client->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Подтверждение пароля</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>
                    <button type="submit" class="part-btn">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>
@endsection