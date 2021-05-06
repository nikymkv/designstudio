@extends('layouts.app')

@section('content')
@if($errors->any())
    {{ dd($errors->messages()) }}
@endif
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-7 ml-2">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Создание проекта</h5>
                <form action="{{ route('backend.projects.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name_company">Название компании</label>
                        <input type="text" class="form-control" name="name_company" id="name_company">
                    </div>
                    <div class="form-group">
                        <label for="scope">Специализация компании</label>
                        <input type="text" class="form-control" name="scope" id="scope">
                    </div>
                    <div class="form-group">
                        <label for="date_created">Дата создания</label>
                        <input type="text" class="form-control" name="date_created" id="date_created" value="{{now()}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="deadline">Дедлайн</label>
                        <input type="text" class="form-control" name="deadline" id="deadline">
                    </div>
                    <div class="form-group">
                        <label for="proposed_payment">Предложенная цена</label>
                        <input type="number" class="form-control" name="proposed_payment" id="proposed_payment">
                    </div>
                    <div class="form-group">
                        <label for="price">Итоговая цена</label>
                        <input type="number" class="form-control" name="price" id="price">
                    </div>
                    <p>
                        <label for="current_employee_id">Сотрудник</label>
                        <select name="current_employee_id" id="current_employee_id">
                            @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">
                                {{ $employee->name }}
                            </option>
                            @endforeach
                        </select>
                    </p>
                    <input type="hidden" name="client_id" value="{{ $client->id }}">
                    <p>
                        <label for="service_id">Услуга</label>
                        <select name="service_id" id="service_id">
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }} ({{ $service->type }})</option>
                            @endforeach
                        </select>
                    </p>
                    <p>
                        <label for="description">Комментарий</label>
                        <textarea name="description" id="description" style="width:100%;" rows="10"></textarea>
                    </p>
                    <button type="submit" class="part-btn">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-2"></div>
</div>

@endsection