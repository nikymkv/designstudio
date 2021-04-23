@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-7 ml-2">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Проект</h5>
                <form action="{{ route('backend.projects.update', ['project' => $project]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name_company">Название компании</label>
                        <input type="text" class="form-control" name="name_company" id="name_company"
                            value="{{ $project->name_company }}">
                    </div>
                    <div class="form-group">
                        <label for="scope">Специализация компании</label>
                        <input type="text" class="form-control" name="scope" id="scope" value="{{ $project->scope }}">
                    </div>
                    <div class="form-group">
                        <label for="date_created">Дата создания</label>
                        <input type="text" class="form-control" name="date_created" id="date_created"
                            value="{{ $project->date_created }}">
                    </div>
                    <div class="form-group">
                        <label for="deadline">Дедлайн</label>
                        <input type="text" class="form-control" name="deadline" id="deadline"
                            value="{{ $project->deadline }}">
                    </div>
                    <div class="form-group">
                        <label for="proposed_payment">Предложенная цена</label>
                        <input type="number" class="form-control" name="proposed_payment" id="proposed_payment"
                            value="{{ $project->proposed_payment }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Итоговая цена</label>
                        <input type="number" class="form-control" name="price" id="price" value="{{ $project->price }}">
                    </div>
                    <p>Клиент:
                        <a
                            href="{{route('backend.clients.show', ['client' => $project->client])}}">{{ $project->client->name }}</a>
                    </p>
                    <p>
                        <label for="service">Услуга</label>
                        <input type="text" class="form-control" name="service" id="service" value="{{ $project->service->name }}" readonly>
                    </p>
                    <p>
                        <select name="current_employee_id">
                            @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}"
                                {{ $employee->id === $project->currentEmployee->id ? 'selected' : ''}}>
                                {{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    <p>
                        <select name="current_status_id">
                            @foreach ($statuses as $status)
                            <option value="{{ $status->id }}"
                                {{ $status->id === $project->status->last()->id ? 'selected' : '' }}>
                                {{ $status->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    <p>
                        <textarea name="description" id="" cols="30" rows="10">{{ $project->description }}</textarea>
                    </p>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col mr-2">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">История</h5>
                <ul class="list-group list-group-flush">
                    @foreach ($project->status as $key => $item)
                        <li class="list-group-item">{{ $key+1 }}: {{ $item->name }} {{ $item->pivot->date_created }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection