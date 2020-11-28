<!-- Extends -->
@extends('layouts.app')

<!-- Body -->
@section('content')

    <h1 class="text-center">{{ $department->title }}</h1>
    <table class="table">
        <thead>
        <tr scope="col">
            <th scope="col">Ф.И.О.</th>
            <th scope="col">Пол</th>
            <th scope="col">Должность</th>
        </tr>
        </thead>
        <tbody>
        @foreach($department->users as $employee)
            <tr>
                <td><a href="/employees/show/{{ $employee->id }}">{{ $employee->name }}</a></td>
                <td>{{ $employee->gender }}</td>
                <td>{{ $employee->position->title }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

