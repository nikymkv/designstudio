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
                            <strong>Услуга:</strong> {{ $project->service->name }} ({{ $project->service->type }})
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