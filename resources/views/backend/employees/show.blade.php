@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-5 ml-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Информация о сотруднике</h5>
                <p class="card-text">Создан: {{ $employee->created_at }}</p>
                <p class="card-text">Обновлен: {{ $employee->updated_at }}</p>
                <form action="{{ route('backend.employees.update', ['employee' => $employee]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Имя сотрудника</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $employee->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Почта</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror"  name="email" id="email" value="{{ $employee->email }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dob">Дата рождения</label>
                        <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="dob" value="{{ $employee->dob }}">
                        @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $employee->phone }}">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Пароль</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Подтверждение пароля</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="specs">Специализация</label>
                        <select name="specs[]" id="specs" multiple="multiple" {{ Auth::guard('backend')->user()->is_admin ? '' : 'disabled="true"' }}>
                            @foreach ($specs as $spec)
                                <option value="{{ $spec->id }}" {{ $employee->specs->contains(function ($value, $key) use ($spec) {
                                    return $spec->id == $value->id;
                                }) ? 'selected' : '' }}>{{ $spec->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="type_payment">Тип оплаты:</label>
                        <p>
                            <select name="payment_type_id" id="type_payment" {{ Auth::guard('backend')->user()->is_admin ? '' : 'disabled="true"' }}>
                                @foreach ($paymentType as $pType)
                                    <option value="{{ $pType->id }}" {{ $employee->payment->id == $pType->id ? 'selected' : '' }} >{{ $employee->payment->name }}</option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                    @if ($employee->payment_type_id == 2)
                        <div class="form-group">
                            <label for="hourly_payment">Зарплата</label>
                            <input type="number" class="form-control" name="hourly_payment" id="hourly_payment"
                                value="{{ $employee->hourly_payment }}">
                        </div>
                    @endif
                    <button type="submit" class="part-btn">Сохранить</button>
                </form>
                <form class="mt-2" action="{{ route('backend.pdf.handle.employee') }}" method="post">
                    @csrf
                    <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                    <button type="submit" class="part-btn">Генерация PDF</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Проекты сотрудника</h5>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link {{ $enTab == 0 ? 'active' : '' }}" href="{{ route('backend.employees.show', ['employee' => $employee]) }}"
                        onclick="event.preventDefault();
                document.getElementById('tab1').submit();">В разработке</a>
                    <form id="tab1" action="{{ route('backend.employees.show', ['employee' => $employee]) }}" method="GET" style="display: none;">
                        <input type="hidden" name="param" value="0">
                    </form>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $enTab == 1 ? 'active' : '' }}" href="{{ route('backend.employees.show', ['employee' => $employee]) }}"
                        onclick="event.preventDefault();
                    document.getElementById('tab2').submit();">Завершены</a>
                    <form id="tab2" action="{{ route('backend.employees.show', ['employee' => $employee]) }}" method="GET" style="display: none;">
                        <input type="hidden" name="param" value="1">
                    </form>
                </li>
                </ul>
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