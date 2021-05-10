@extends('layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-sm"></div>
        <div class="col-sm-10">
            <h2>Клиенты</h2>
            <table class="table">
                <thead class="table-head">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Почта</th>
                    <th scope="col">Телефон</th>
                </tr>
                </thead>
                <tbody class="table-body">
                    @foreach($clients as $client)
                        <tr onclick="window.location.href='{{ route('backend.clients.show', ['client' => $client]) }}'">
                            <td>
                                {{ $client->id }}
                            </td>
                            <td>
                                {{ $client->name }}
                            </td>
                            <td>
                                {{ $client->email }}
                            </td>
                            <td>
                                {{ $client->phone }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm"></div>
    </div>
@endsection
