<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body { font-family: DejaVu Sans, sans-serif; }
</style>
<body>
    <p style="text-align:center"><strong>Проект</strong> #{{$project->id}}</p>

<p style="text-align:center">&quot;{{ $project->name_company }}&quot;</p>

<p style="text-align:center"><strong>Дата создания:</strong> {{ $project->date_created }} <strong>Дедлайн: </strong>{{ $project->deadline}}</p>

<p style="text-align:center"><strong>Информация о клиенте</strong></p>

<p style="text-align:justify"><strong>Имя:</strong> {{ $project->client->name }}</p>

<p style="text-align:justify"><strong>Почта:</strong> {{ $project->client->email }}</p>

<p style="text-align:justify"><strong>Номер телефона:</strong> {{ $project->client->phone }}</p>

<p style="text-align:center"><strong>Информация о проекте</strong></p>

<p style="text-align:justify"><strong>Специализация компании: </strong>{{ $project->scope }}</p>

<p style="text-align:justify"><strong>Предоставленная услуга:</strong> {{ $project->service->name }}</p>

<p style="text-align:justify"><strong>Предложенная стоимость проекта: </strong>{{ $project->proposed_payment }} руб.</p>

<p style="text-align:justify"><strong>Итоговая стоимость проекта:</strong> {{ $project->price }} руб.</p>

<p style="text-align:justify"><strong>Примечание: </strong>{{ $project->description }}</p>

<table align="left" border="1" cellpadding="1" cellspacing="0" style="width:100%">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Дата</th>
			<th scope="col">Статус</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($project->status as $key => $status)
        <tr>
            <td>
                {{ $key + 1 }}
            </td>
            <td>
                {{ $status->pivot->date_created}}
            </td>
            <td>
                {{ $status->name}}
            </td>
        </tr>
        @endforeach
	</tbody>
</table>
</body>
</html>