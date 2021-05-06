@extends('layouts.app')

@section('content')
@if($errors->any())
    {{ dd($errors->messages()) }}
@endif
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Информация о сотруднике</h5>
                <form action="{{ route('backend.employees.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Имя сотрудника</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Почта</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="dob">Дата рождения</label>
                        <input type="date" class="form-control" name="dob" id="dob">
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="text" class="form-control" name="phone" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="specs">Специализация</label>
                        <select name="specs[]" id="specs" multiple="multiple">
                            @foreach ($specs as $spec)
                                <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control" name="password" id="password" autocomplete="on">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Подтверждение пароля</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" autocomplete="on">
                    </div>
                    <div class="form-group">
                        <label for="type_payment">Тип оплаты:</label>
                        <p>
                            <select name="payment_type_id" id="type_payment">
                                @foreach ($paymentType as $pType)
                                    <option value="{{ $pType->id }}">{{ $pType->name }}</option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="hourly_payment">Зарплата</label>
                        <input type="number" class="form-control" name="hourly_payment" id="hourly_payment">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_admin">
                        <label class="form-check-label" for="is_admin">
                            Права администратора
                        </label>
                    </div>

                    <button type="submit" class="part-btn mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection