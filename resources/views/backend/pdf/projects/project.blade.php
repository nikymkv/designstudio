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
    <p style="text-align:center"><strong>Проект</strong> #{{$data['project']->id}}</p>

<p style="text-align:center">&quot;{{ $data['project']->name_company }}&quot;</p>

<p style="text-align:center"><strong>Дата создания:</strong> {{ $data['project']->date_created }} <strong>Дедлайн: </strong>{{ $data['project']->deadline}}</p>

<p style="text-align:center"><strong>Информация о клиенте</strong></p>

<p style="text-align:justify"><strong>Имя:</strong> {{ $data['project']->client->name }}</p>

<p style="text-align:justify"><strong>Почта:</strong> {{ $data['project']->client->email }}</p>

<p style="text-align:justify"><strong>Номер телефона:</strong> {{ $data['project']->client->phone }}</p>

<p style="text-align:center"><strong>Информация о проекте</strong></p>

<p style="text-align:justify"><strong>Специализация компании: </strong>{{ $data['project']->scope }}</p>

<p style="text-align:justify"><strong>Предоставленная услуга:</strong> {{ $data['project']->service->name }} ({{ $data['project']->service->type }})</p>

<p style="text-align:justify"><strong>Предложенная стоимость проекта: </strong>{{ $data['project']->proposed_payment }} руб.</p>

<p style="text-align:justify"><strong>Итоговая стоимость проекта:</strong> {{ $data['project']->price }} руб.</p>

<p style="text-align:justify"><strong>Примечание: </strong>{{ $data['project']->description }}</p>

@if (isset($data['project']->answers))
<p style="text-align:center"><strong>Ответы на вопросы в форме</strong></p>

<p style="text-align:justify"><strong>URL: </strong>{{ $data['project']->answers['url'] ?? '' }}</p>

<p style="text-align:justify"><strong>URL: </strong>{{ $data['project']->answers['celi'] ?? '' }}</p>

<p style="text-align:justify"><strong>Модули: </strong>{{ $data['project']->answers['site-modules'] ?? '' }}</p>

<p style="text-align:justify"><strong>Цветовая гамма: </strong>{{ $data['project']->answers['gamma'] ?? '' }}</p>

<p style="text-align:justify"><strong>Наличие фото: </strong>{{ $data['project']->answers['photo'] ?? '' }}</p>

<p style="text-align:justify"><strong>Наполнение сайта информацией: </strong>{{ $data['project']->answers['content'] ?? '' }}</p>

@endif



<table align="left" border="1" cellpadding="1" cellspacing="0" style="width:100%">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Дата</th>
			<th scope="col">Статус</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($data['project']->status as $key => $status)
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