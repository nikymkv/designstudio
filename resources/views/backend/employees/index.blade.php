@extends('layouts.app')

@section('content')

<div class="row text-center">
    <div class="col-sm"></div>
    <div class="col-sm-10">
        <h2>Сотрудники</h2>

          <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.employees.create') }}">Добавить сотрудника</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Экспорт</a>
            </li>

            <li class="nav-item">
                <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Специализация</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('backend.employees.index') }}">Все</a>
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
            </li>

        </ul>
        <table class="table">
            <thead class="table-head">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Дата рождения</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Почта</th>
                </tr>
            </thead>
            <tbody class="table-body">
                @foreach($employees as $key => $employee)
                <tr onclick="window.location.href='{{ route('backend.employees.show', ['employee' => $employee]) }}'">
                    <td>
                        {{ $key+1 }}
                    </td>
                    <td>
                        {{ $employee->name }}
                    </td>
                    <td>
                        {{ $employee->dob }}
                    </td>
                    <td>
                        {{ $employee->phone }}
                    </td>
                    <td>
                        {{ $employee->email }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text=center" id="exampleModalLabel">Настройки экспорта</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="export_form" action="{{ route('backend.pdf.handle.employees') }}" method="POST">
                @csrf
                <div class="form-group" id="select_type_event">
                    <label for="typeEvent">Тип:</label>
                    <select name="typeEvent" id="typeEvent" onchange="typeEventChange()">
                        <option value="1">Дата рождения</option>
                        <option value="2">Дата принятия</option>
                        <option value="3">Дата увольнения</option>
                        <option value="4">Текущая занятость</option>
                    </select>
                </div>
                <script>
                    function typeEventChange()
                    {
                        let typeEvent = document.getElementById('typeEvent')
                        if (typeEvent.value == 4) {
                            removeDateForm()
                        } else {
                            if ( ! document.getElementById('start_date_form')) {
                                let startDateForm = document.createElement('div')
                                startDateForm.className = 'form-group'
                                startDateForm.id = 'start_date_form'
                                let labelStart = document.createElement('label')
                                labelStart.htmlFor = 'startDate'
                                labelStart.textContent = 'С:'
                                inputStart = document.createElement('input')
                                inputStart.setAttribute('type', 'date')
                                inputStart.setAttribute('name', 'startDate')
                                inputStart.setAttribute('id', 'startDate')
                                startDateForm.append(labelStart)
                                startDateForm.append(inputStart)
                                select_type_event.after(startDateForm)
                            }
                            if ( ! document.getElementById('end_date_form')) {
                                let endDateForm = document.createElement('div')
                                endDateForm.className = 'form-group'
                                endDateForm.id = 'end_date_form'
                                let labelStart = document.createElement('label')
                                labelStart.htmlFor = 'endDate'
                                labelStart.textContent = 'По:'
                                inputStart = document.createElement('input')
                                inputStart.setAttribute('type', 'date')
                                inputStart.setAttribute('name', 'endDate')
                                inputStart.setAttribute('id', 'endDate')
                                endDateForm.append(labelStart)
                                endDateForm.append(inputStart)
                                start_date_form.after(endDateForm)
                            }
                        }
                    }

                    function removeDateForm() {
                        if (document.getElementById('start_date_form')) {
                            document.getElementById('start_date_form').remove()
                        }

                        if (document.getElementById('end_date_form')) {
                            document.getElementById('end_date_form').remove()
                        }
                    }
                </script>
                <div class="form-group" id="start_date_form">
                    <label for="startDate">С:</label>
                    <input type="date" name="startDate" id="startDate">
                </div>
                <div class="form-group" id="end_date_form">
                    <label for="endDate">По:</label>
                    <input type="date" name="endDate" id="endDate">
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          <button type="button" class="btn btn-primary" onclick="event.preventDefault();
          document.getElementById('export_form').submit();">Экспортировать</button>
        </div>
      </div>
    </div>
  </div>
    </div>
    <div class="col-sm"></div>
</div>
@endsection