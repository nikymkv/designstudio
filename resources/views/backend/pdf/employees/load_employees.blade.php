<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сотрудники</title>
</head>
<style>
    body {
        font-family: DejaVu Sans, sans-serif;
    }

    .projects {
        width: 100%;
    }
</style>

<body>
    <h1 align="center">Загруженность сотрудников</h1>
    <table class="projects" align="left" border="1" cellpadding="1" cellspacing="0" style="width:100%">
        <thead>
            <tr>
                <th>Название компании</th>
                <th>Дата создания</th>
                <th>Дедлайн</th>
                <th>Цена</th>
                <th>Клиент</th>
                <th>Услуга</th>
                <th>Статус</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($data['employees'] as $item)
                <tr>
                    <td align="center" colspan="7"><strong>{{ $item->name }} ({{ $item->specsToString() }})</strong></td>
                </tr>
                @if ($item->projects->count() == 0)
                    <tr>
                        <td align="center" colspan="7">На данный момент не задействован(-а)</td>
                    </tr>
                @endif
                @foreach ($item->availableProjects() as $key => $project)                        
                <tr>
                    <td>{{ $project->name_company }}</td>
                    <td>{{ $project->date_created }}</td>
                    <td>{{ $project->deadline ?? 'Пусто' }}</td>
                    <td>{{ $project->price ?? 'Пусто' }}</td>
                    <td>{{ $project->client->name }}</td>
                    <td>{{ $project->service->name }}  ({{ $project->service->type }})</td>
                    <td>{{ $project->status->last()->name }}</td>
                </tr>
                @endforeach
            @endforeach

        </tbody>
    </table>
    <br>

</body>

</html>