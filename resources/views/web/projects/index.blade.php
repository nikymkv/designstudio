@extends('layouts.app')

@section('content')
<div class="row text-center">
    <div class="col-sm"></div>
    <div class="col-sm-10">
        <h2>Проекты</h2>
        <ul class="nav nav-tabs">
            
            <li class="nav-item">
                <a class="nav-link {{ $enTab == 0 ? 'active' : '' }}" href="{{ route('web.projects.index') }}" onclick="event.preventDefault();
                document.getElementById('tab1').submit();">В разработке</a>
                <form id="tab1" action="{{ route('web.projects.index') }}" method="GET" style="display: none;">
                    <input type="hidden" name="param" value="0">
                </form>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ $enTab == 1 ? 'active' : '' }}" href="{{ route('web.projects.index') }}" onclick="event.preventDefault();
                    document.getElementById('tab2').submit();">Завершены</a>
                <form id="tab2" action="{{ route('web.projects.index') }}" method="GET" style="display: none;">
                    <input type="hidden" name="param" value="1">
                </form>
            </li>

        </ul>
        <table class="table">
            <thead class="table-head">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col">Услуга</th>
                    <th scope="col">Клиент</th>
                </tr>
            </thead>
            <tbody class="table-body">
                @foreach($projects as $key => $project)
                <tr onclick="window.location.href='{{ route('web.projects.show', ['project' => $project]) }}';">
                    <td>
                        {{ $key }}
                    </td>
                    <td>
                        {{ $project->name_company }}
                    </td>
                    <td>
                        {{ $project->date_created }}
                    </td>
                    <td>
                        {{ $project->service->name }}
                    </td>
                    <td>
                        {{ $project->client->name }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text=center" id="exampleModalLabel">Настройки экспорта</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="export_form" action="{{ route('backend.pdf.handle.projects') }}" method="POST">
                            @csrf
                            <h5>По дате создания</h5>
                            <div class="form-group">
                                <label for="startDate">С:</label>
                                <input type="date" name="startDate" id="startDate">
                            </div>
                            <div class="form-group">
                                <label for="endDate">По:</label>
                                <input type="date" name="endDate" id="endDate">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="part-btn" data-dismiss="modal">Закрыть</a>
                        <a href="#" class="part-btn" onclick="event.preventDefault();
                        document.getElementById('export_form').submit();">Экспортировать</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm"></div>
</div>
@endsection