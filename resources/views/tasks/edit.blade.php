<!-- Extends -->
@extends('layouts.app')

<!-- Body -->
@section('content')

    <div class="container">
        <h3>Редактирование задачи</h3>
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' => ['tasks.update', $task->id], 'method' => 'PUT']) !!}
                    @csrf
                    <div class="form-group">
                        <input value="{{ $task->title }}" type="text" class="form-control" name="title" placeholder="Название..."><br>
                        <textarea type="text" class="form-control" name="description" placeholder="Описание...">{{ $task->description }}</textarea><br>
                        <select class="selectpicker" name="status" id="status">
                            <option value="Выполнено" @if($task->status == 'Выполнено') selected @endif>Выполнено</option>
                            <option value="Не выполнено" @if($task->status == 'Не выполнено') selected @endif>Не выполнено</option>
                            <option value="В работе" @if($task->status == 'В работе') selected @endif>В работе</option>
                            <option value="Приостановленно" @if($task->status == 'Приостановленно') selected @endif>Приостановленно</option>
                        </select><br><br>
                        <select name="employees[]" id="EmployeesMultiplie" class="selectpicker" multiple required>
                            @foreach($employees as $employee)
                                <option
                                    @foreach($task->users as $taskEmployee)
                                        @if($employee->id == $taskEmployee->id)
                                            selected
                                        @endif
                                    @endforeach value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select><br><br>
                        <div class="col-md-2">
                            <p>Дата: </p><input value="{{ $task->date }}" type="date" name="date" class="form-control"><br>
                            <p>Срок выполнения: </p><input value="{{ $task->deadline }}" type="date" name="deadline" class="form-control"><br>
                        </div>
                        <button class="btn btn-warning">Обновить</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
