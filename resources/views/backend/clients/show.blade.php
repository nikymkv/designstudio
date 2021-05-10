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
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $client->name }}">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Почта</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $client->email }}">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $client->phone }}">

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="part-btn">Сохранить</button>
                </form>

            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Проекты
                    <form class="mt-2" action="{{ route('backend.projects.create', ['client' => $client]) }}" method="get">
                        @csrf
                        <button type="submit" class="part-btn">Добавить проект</button>
                    </form>
                </h5>
                <table class="table">
                    <thead class="table-head">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Название</th>
                            <th scope="col">Услуга</th>
                        </tr>
                        </thead>
                        <tbody class="table-body">
                            @foreach($projects as $project)
                                <tr onclick="window.location.href='{{ route('backend.projects.show', ['project' => $project]) }}'">
                                    <td>
                                        {{ $project->id }}
                                    </td>
                                    <td>
                                        {{ $project->name_company }}
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