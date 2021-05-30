@extends('layouts.app')

@section('content')
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
                        <input type="text" class="form-control @error('name_company') is-invalid @enderror" name="name_company" id="name_company" value="{{ old('name_company') ?? '' }}">
                    
                        @error('name_company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="scope">Специализация компании</label>
                        <input type="text" class="form-control @error('scope') is-invalid @enderror" name="scope" id="scope" value="{{ old('scope') ?? '' }}">
                   
                        @error('scope')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date_created">Дата создания</label>
                        <input type="text" class="form-control @error('date_created') is-invalid @enderror" name="date_created" id="date_created" value="{{date('Y-m-d')}}" readonly>
                    
                        @error('date_created')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deadline">Дедлайн</label>
                        <input type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" id="deadline" value="{{ old('deadline') ?? '' }}">
                    
                        @error('deadline')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="proposed_payment">Предложенная цена</label>
                        <input type="number" class="form-control @error('proposed_payment') is-invalid @enderror" name="proposed_payment" id="proposed_payment" value="{{ old('proposed_payment') ?? '' }}">
                    
                        @error('proposed_payment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Итоговая цена</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ old('price') ?? '' }}">
                   
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <p>
                        <label for="current_employees_id">Сотрудник</label>
                        <select name="current_employees_id[]" id="current_employees_id" multiple>
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
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" style="width:100%;" rows="10">{{ old('description') ?? '' }}</textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </p>
                    <button type="submit" class="part-btn">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-2"></div>
</div>

@endsection