@extends('layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-sm"></div>
        <div class="col-sm-6">
            <h2>Клиенты</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Почта</th>
                    <th scope="col">Телефон</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>
                                {{ $client->id }}
                            </td>
                            <td>
                                <a href="{{ route('backend.clients.show', ['client' => $client]) }}">{{ $client->name }}</a>
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
