<!-- Extends -->
@extends('layouts.app')

<!-- Body -->
@section('content')

    <div class="container">
        <h3>Новый сотрудник</h3>
        <div class="row">
            <div class="col-md-12"><br>
                {!! Form::open(['route' => ['employees.store']]) !!}
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Фио..."><br>

                        <label for="gender">Пол</label>
                        <select class="selectpicker" name="gender" id="gender" required>
                            <option value="Мужчина">Мужчина</option>
                            <option value="Женщина">Женщина</option>
                        </select><br><br>

                        <input type="text" class="form-control" name="email" placeholder="email..."><br>
                        <input type="text" class="form-control" name="phone" placeholder="Номер телефона..."><br>
                        <input type="text" class="form-control" name="position_title" placeholder="Должность..."><br>
                        <input type="text" class="form-control" name="position_salary" placeholder="Зарплата..."><br>

                        <label for="MultiplieSelect1">Отделы</label>
                        <select class="selectpicker" name="departments[]" multiple id="MultiplieSelect1" required>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->title }}</option>
                            @endforeach
                        </select><br><br>

                        <button class="btn btn-success" type="submit" name="submit">Добавить</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
