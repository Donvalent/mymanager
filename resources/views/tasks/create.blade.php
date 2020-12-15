<!-- Extends -->
@extends('layouts.app')

<!-- Body -->
@section('content')

    <div class="container">
        <h3>Редактирование задачи</h3>
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' => ['tasks.store'], 'method' => 'POST']) !!}
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Название..."><br>
                        <textarea type="text" class="form-control" name="description" placeholder="Описание..."></textarea><br>
                        <select class="selectpicker" name="status" id="status">
                            <option value="Выполнено">Выполнено</option>
                            <option value="Не выполнено">Не выполнено</option>
                            <option value="В работе" selected>В работе</option>
                            <option value="Приостановленно">Приостановленно</option>
                        </select><br><br>
                        <select name="employees[]" id="EmployeesMultiplie" class="selectpicker" multiple required>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select><br><br>
                        <div class="col-md-2">
                            <p>Дата: </p><input type="date" name="date" class="form-control"><br>
                            <p>Срок выполнения: </p><input type="date" name="deadline" class="form-control"><br>
                        </div>

                        <button class="btn btn-success" type="submit" name="submit">Добавить</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
