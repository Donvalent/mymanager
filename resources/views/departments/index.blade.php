<!-- Extends -->
@extends('layouts.app')

<!-- Body -->
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Сотрудников</th>
            <th scope="col">Максимальная зарплата</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($departments as $department)
        <tr>
            <td><a href="/departments/show/{{ $department->id }}">{{ $department->title }}</a></td>
            <td>{{ $department->users()->count() }}</td>
            {{-- TODO: Реализовать вывод максимальной зарплаты каждого отдела --}}
{{--            <td> {{ $department->users->position->max('salary') }} руб</td>--}}
            <td></td>
            <td><a href="#"><i class="fa fa-minus-circle"></i></a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/departments/add" class="btn btn-primary"><i class="fa fa-plus"></i> Новый отдел</a>

@endsection
