@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-7 ml-2">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Проект</h4>
                <form>
                    <div class="form-group">
                        <p>
                            <strong>Название компании:</strong> {{ $project->name_company }}
                        </p>
                    </div>
                    <div class="form-group">
                        <p>
                            <strong>Специализация компании:</strong> {{ $project->scope }}
                        </p>
                    </div>
                    <div class="form-group">
                        <p>
                            <strong>Дата создания:</strong> {{ $project->date_created }}
                        </p>
                    </div>
                    <div class="form-group">
                        <p>
                            <strong>Дедлайн:</strong> {{ $project->deadline }}
                        </p>
                    </div>
                    <div class="form-group">
                        <p>
                            <strong>Предложенная цена:</strong> {{ $project->proposed_payment }}
                        </p>
                    </div>
                    <div class="form-group">
                        <p>
                            <strong>Итоговая цена:</strong> {{ $project->price }}
                        </p>
                    </div>
                    <div>
                        <p>
                            <strong>Клиент:</strong> {{ $project->client->name }}
                        </p>
                    </div>
                    <div>
                        <p>
                            <strong>Услуга:</strong> {{ $project->service->name }}
                        </p>
                    </div>
                    <div>
                        <p>
                            <p>
                                <strong>Текущий статус:</strong> {{ $project->status->last()->pivot->date_created }} {{ $project->status->last()->name }}
                            </p>
                        </p>
                    </div>
                    <p>
                        <p>
                            <strong>Комментарий:</strong> {{ $project->description }}
                        </p>
                    </p>
                </form>
            </div>

        </div>
    </div>
    <div class="col mr-2">
        <div class="card">
            <div class="card-body history" id="history_block">
                <h4 class="card-title">История</h4>
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