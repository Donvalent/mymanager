<!-- Extends -->
@extends('layouts.app')

<!-- Body -->
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ФИО</th>
            <th scope="col">Пол</th>
            <th scope="col">Должность</th>
            <th scope="col">Зарплата</th>
            <th scope="col">Отделы</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->id }}.</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->gender }}</td>
            <td>{{ $employee->position->title }}</td>
            <td>{{ $employee->position->salary }} руб</td>
            <td>
                @foreach($employee->departments as $department)
                <a href="{{ route('departments.show', $department->id) }}">
                    {{ $department->title }}
                </a>
                @endforeach
            </td>
            <td>
                <a href="{{ route('employees.show', $employee->id) }}">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{ route('employees.edit', $employee->id) }}">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="{{ route('employees.destroy', $employee->id) }}">
                    <i class="fa fa-ban"></i>
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('employees.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Новый сотрудник</a>

@endsection
