@extends('layouts.app')

@section('content')

<div class="row text-center">
    <div class="col-sm"></div>
    <div class="col-sm-6">
        <h2>Сотрудники</h2>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Специализация
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach ($specs as $item)
                    <a class="dropdown-item" href="{{ route('backend.employees.index') }}" onclick="event.preventDefault();document.getElementById('spec_{{$item->id}}').submit();">
                        {{ $item->name }}
                    </a>
                    <form id="spec_{{$item->id}}" action="{{ route('backend.employees.index') }}" method="GET"
                        style="display: none;">
                        <input type="hidden" name="spec_id" value="{{$item->id}}">
                    </form>
                @endforeach
            </div>
        </div>
        <a href="{{ route('backend.employees.create') }}"><button>Добавить сотрудника</button></a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $key => $employee)
                <tr>
                    <td>
                        {{ $key }}
                    </td>
                    <td>
                        <a
                            href="{{ route('backend.employees.show', ['employee' => $employee]) }}">{{ $employee->name }}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm"></div>
</div>
@endsection