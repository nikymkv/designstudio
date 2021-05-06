<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сотрудники</title>
</head>
<style>
    body { font-family: DejaVu Sans, sans-serif; }
</style>
<body>
    <h1 align="center">Список всех сотрудников</h1>
    <table align="left" border="1" cellpadding="1" cellspacing="0" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Почта</th>
                <th>Телефон</th>
                <th>Дата рождения</th>
                <th>Принят на работу/Уволен</th>
                <th>Тип оплаты</th>
                <th>Оплата за час</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['employees'] as $key => $employee)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone ?? 'Пусто' }}</td>
                    <td>{{ $employee->dob }}</td>
                    <td>{{ $employee->hired }}/{{ $employee->dismissed }}</td>
                    <td>{{ $employee->payment->name }}</td>
                    <td>{{ $employee->hourly_payment }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>