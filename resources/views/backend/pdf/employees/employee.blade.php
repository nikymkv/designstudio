<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сотрудник # {{ $data['employee']->id }}</title>
</head>
<style>
    body { font-family: DejaVu Sans, sans-serif; }
</style>
<body>
    <p style="text-align:center">Сотрудник # {{ $data['employee']->id }}</p>

    <p><strong>Дата создания:</strong> {{ $data['employee']->created_at }}</p>

    <p><strong>Последнее обновление:</strong> {{ $data['employee']->updated_at }}</p>

    <p><strong>Принят на работу:</strong> {{ $data['employee']->hired }}</p>
    
    @if (isset($data['employee']->dismissed))
        <p><strong>Уволен:</strong> {{ $data['employee']->dismissed }}</p>
    @endif

    <p><strong>Имя:</strong> {{ $data['employee']->name }}</p>

    <p><strong>Дата рождения:</strong> {{ $data['employee']->dob }}</p>

    <p><strong>Почта:</strong> {{ $data['employee']->email }}</p>

    <p><strong>Номер телефона:</strong> {{ $data['employee']->phone }}</p>

    <p><strong>Специализация(-и):</strong> {{ $data['employee']->specsToString() }}</p>
    <p><strong>Тип оплаты:</strong> {{ $data['employee']->payment->name}}</p>

    @if ($data['employee']->payment->id == 2)
        <p><strong>Ставка в час:</strong> {{ $data['employee']->hourly_payment }}</p>
    @endif
    @if ($data['projects']->count() != 0)
        <table border="1" cellpadding="1" cellspacing="0" style="width:100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Название компании</th>
                    <th>Услуга</th>
                    <th>Клиент</th>
                    <th>Статус</th>
                    <th>Дата создания</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['projects'] as $key => $project)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $project->name_company }}</td>
                        <td>{{ $project->service->name }}</td>
                        <td>{{ $project->client->name }}</td>
                        <td>{{ $project->status->last()->name ?? '' }}</td>
                        <td>{{ $project->date_created }}</td>
                    </tr>        
                @endforeach
            </tbody>
        </table>
    @else
        <p style="text-align:center">Проекты отсутствуют</p>
    @endif
</body>
</html>     