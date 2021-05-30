@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-7 ml-2">
        <div class="card">
            <div class="card-body">
                @if ($project->answers)
                <div class="float-right">
                    <button class="part-btn" data-toggle="modal" data-target="#exampleModal">Форма</button>
                </div>
                @endif
                <h4 class="card-title">Проект</h4>
                <form action="{{ route('backend.projects.update', ['project' => $project]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name_company">Название компании</label>
                        <input type="text" class="form-control @error('name_company') is-invalid @enderror"
                            name="name_company" id="name_company" value="{{ $project->name_company }}">
                        @error('name_company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="scope">Специализация компании</label>
                        <input type="text" class="form-control @error('scope') is-invalid @enderror" name="scope"
                            id="scope" value="{{ $project->scope }}">
                        @error('scope')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date_created">Дата создания</label>
                        <input type="date" class="form-control @error('date_created') is-invalid @enderror"
                            name="date_created" id="date_created" value="{{ Carbon\Carbon::parse($project->date_created)->format('Y-m-d') }}">
                        @error('date_created')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deadline">Дедлайн</label>
                        <input type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline"
                            id="deadline" value="{{ $project->deadline ? Carbon\Carbon::parse($project->deadline)->format('Y-m-d') : '' }}">
                        @error('deadline')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="proposed_payment">Предложенная цена</label>
                        <input type="number" class="form-control @error('proposed_payment') is-invalid @enderror"
                            name="proposed_payment" id="proposed_payment" value="{{ $project->proposed_payment }}">
                        @error('proposed_payment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Итоговая цена</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                            id="price" value="{{ $project->price }}">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="client">Клиент:</label>
                        <p id="client">
                            <a
                                href="{{route('backend.clients.show', ['client' => $project->client])}}">{{ $project->client->name }}</a>
                        </p>
                    </div>
                    <div>
                        <p>
                            <label for="service">Услуга</label>
                            <input type="text" class="form-control" name="service" id="service"
                                value="{{ $project->service->name }} ({{ $project->service->type }})" readonly>
                        </p>
                    </div>
                    @if (\Auth::guard('backend')->user()->is_admin)
                    <p>
                        <select name="current_employees_id[]" id="current_employees_id" multiple="multiple">
                            @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}"
                                {{ ! empty($project->currentEmployees->whereIn('id', $employee->id)->count()) ? 'selected' : ''}}>
                                {{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    <p>
                        <select name="current_status_id" id="current_status_id">
                            @foreach ($statuses as $status)
                            <option value="{{ $status->id }}"
                                {{ $status->id === $project->status->last()->id ? 'selected' : '' }}>
                                {{ $status->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    @else
                    <div>
                        <label for="employee">Над проектом работает:</label>
                        <p>
                            @foreach ($project->currentEmployees as $item)
                            <a id="employee" href="{{ route('backend.employees.show', ['employee' => $item]) }}">
                                {{ $item->name }}
                            </a>
                            @endforeach
                        </p>
                    </div>
                    <div>
                        <label for="project_status">Текущий статус:</label>
                        <p id="project_status">
                            {{ $project->status->last()->pivot->date_created }} {{ $project->status->last()->name }}
                        </p>
                    </div>
                    @endif

                    <p>
                        <label for="desc">Комментарий:</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                            id="desc" style="width:100%;" rows="10">{{ $project->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </p>
                    <button type="submit" class="part-btn">Сохранить</button>
                </form>
                <form class="mt-2" action="{{ route('backend.pdf.handle.project') }}" method="POST">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <button type="submit" class="part-btn">Генерация PDF</button>
                </form>
                <form class="mt-2" action="{{ route('backend.projects.destroy', ['project' => $project]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="part-btn">Удалить</button>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text=center" id="exampleModalLabel">Ответы на вопросы в форме</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <p><strong>URL:</strong> {{ $project->answers['url'] ?? '' }}</p>
                        <p><strong>Цели:</strong> {{ $project->answers['celi'] ?? '' }}</p>
                        <p><strong>Модули:</strong> {{ $project->answers['site-modules'] ?? '' }}</p>
                        <p><strong>Цветовая гамма:</strong> {{ $project->answers['gamma'] ?? '' }}</p>
                        <p><strong>Наличие фото:</strong> {{ $project->answers['photo'] ?? '' }}</p>
                        <p><strong>Наполнение сайта информацией:</strong> {{ $project->answers['content'] ?? '' }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="part-btn" data-dismiss="modal">Закрыть</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection