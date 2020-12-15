<!-- Extends -->
@extends('layouts.app')

<!-- Body -->
@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Сотрудники</th>
                <th scope="col">Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->date }}</td>
                <td>
                    @foreach($task->users as $employee)
                        <a href="{{ route('employees.show', $employee->id) }}">{{ $employee->name }}</a>
                        @if(!$loop->last) , @endif
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('tasks.show', $task->id) }}">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('tasks.edit', $task->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                    {!!  Form::open(['method' => 'DELETE', 'route' => ['tasks.destroy', $task->id]]) !!}
                    <button class="delete" onclick="return confirm('Are you sure?')">
                        <i class="fa fa-ban"></i>
                    </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Новая задача</a>

@endsection
