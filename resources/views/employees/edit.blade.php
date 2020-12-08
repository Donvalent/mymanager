<!-- Extends -->
@extends('layouts.app')

<!-- Body -->
@section('content')

    <div class="container">
        <h3>Редактировать сотрудника</h3>
        <div class="row">
            <div class="col-md-12"><br>
                {!! Form::open(['route' => ['employees.update', $employee->id], 'method' => 'PUT']) !!}
                @csrf
                <div class="form-group">
                    <input value="{{ $employee->name }}" type="text" class="form-control" name="name" placeholder="Фио..."><br>

                    <label for="gender">Пол</label>
                    <select class="selectpicker" name="gender" id="gender" required>
                        <option @if ($employee->gender == 'Male') selected @endif value="Мужчина">Мужчина</option>
                        <option @if ($employee->gender == 'Female') selected @endif value="Женщина">Женщина</option>
                    </select><br><br>

                    <input value="{{ $employee->email }}" type="text" class="form-control" name="email" placeholder="email..."><br>
                    <input value="{{ $employee->phone }}" type="text" class="form-control" name="phone" placeholder="Номер телефона..."><br>
                    <input value="{{ $employee->position->title }}" type="text" class="form-control" name="position_title" placeholder="Должность..."><br>
                    <input value="{{ $employee->position->salary }}" type="text" class="form-control" name="position_salary" placeholder="Зарплата..."><br>

                    <label for="MultiplieSelect1">Отделы</label>
                    <select class="selectpicker" name="departments[]" multiple id="MultiplieSelect1" required>
                        @foreach($departments as $department)
                            <option
                                @foreach ($employee->departments as $employeeDepartment)
                                    @if ($department->title == $employeeDepartment->title)
                                        selected
                                    @endif
                                @endforeach value="{{ $department->id }}">{{ $department->title }}</option>
                        @endforeach
                    </select><br><br>

                    <button class="btn btn-warning">Обновить</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
