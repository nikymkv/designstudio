@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-5 ml-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Информация о клиенте</h5>
                <p class="card-text">Создан: {{ $client->created_at }}</p>
                <p class="card-text">Обновлен: {{ $client->updated_at }}</p>
                <form action="{{ route('backend.clients.update', ['client' => $client]) }}" method="post">
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
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>

            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Проекты
                    <button type="button" class="btn btn-link">
                        <a href="{{ route('backend.projects.create', ['client' => $client]) }}">Добавить проект</a>
                    </button>
                </h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Название</th>
                            <th scope="col">Услуга</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>
                                        {{ $project->id }}
                                    </td>
                                    <td>
                                        <a href="{{ route('backend.projects.show', ['project' => $project]) }}">{{ $project->name_company }}</a>
                                    </td>
                                    <td>
                                        {{ $project->service->name }}
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