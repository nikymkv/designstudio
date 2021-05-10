@extends('layouts.app')

@section('content')

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
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Почта</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dob">Дата рождения</label>
                        <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="dob">

                        @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone">

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" autocomplete="on">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Подтверждение пароля</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" autocomplete="on">

                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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
                        <input type="number" class="form-control @error('hourly_payment') is-invalid @enderror" name="hourly_payment" id="hourly_payment">

                        @error('hourly_payment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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