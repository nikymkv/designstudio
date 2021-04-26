@extends('layouts.app')

@section('content')

<div class="row text-center">
    <div class="col-sm-2"></div>
    <div class="col-sm-7 ml-2">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Настройки экспорта</h5>
                <form action="{{ route('backend.pdf.handle') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="model_type">Сущность:</label>
                        <select name="model_type" id="model_type">
                            <option value="1">Сотрудники</option>
                            <option value="2">Проекты</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="model_id">ID сущности</label>
                        <input type="number" name="model_id" id="model_id">
                    </div>

                    <div class="form-group">
                        <label for="date_created">За дату:</label>
                        <input type="date" name="date_created" id="date_created">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="all" id="all">
                        <label class="form-check-label" for="all">
                          Экспорт всех записей
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Экспорт</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-2"></div>
</div>
<script>

</script>
@endsection