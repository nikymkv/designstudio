@extends('layouts.app')

@section('content')
<div class="row text-center">
    <div class="col-sm"></div>
    <div class="col-sm-6">
        <h2>Проекты</h2>
        @if(Auth::guard('backend')->user()->is_admin)
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ $enTab == 0 ? 'active' : 'disabled' }}" href="{{ route('backend.projects') }}"
                    onclick="event.preventDefault();
                document.getElementById('tab1').submit();">В разработке</a>
                <form id="tab1" action="{{ route('backend.projects') }}" method="GET" style="display: none;">
                    <input type="hidden" name="param" value="0">
                </form>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ $enTab == 1 ? 'active' : 'disabled' }}"
                    href="{{ route('backend.projects') }}" onclick="event.preventDefault();
                    document.getElementById('tab2').submit();">Завершены</a>
                <form id="tab2" action="{{ route('backend.projects') }}" method="GET" style="display: none;">
                    <input type="hidden" name="param" value="1">
                </form>
            </li>
        </ul>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $key => $project)
                <tr>
                    <td>
                        {{ $key }}
                    </td>
                    <td>
                        <a
                            href="{{ route('backend.projects.show', ['project' => $project]) }}">{{ $project->name_company }}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm"></div>
</div>
@endsection