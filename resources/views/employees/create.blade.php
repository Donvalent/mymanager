<!-- Extends -->
@extends('layouts.app')

<!-- Body -->
@section('content')

    <div class="container">
        <h3>Новый сотрудник</h3>
        <div class="row">
            <div class="col-md-12"><br>
                {!! Form::open(['route' => ['employees.store'], 'method' => 'POST']) !!}
                @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Фио..." value="{{old('name')}}"><br>

                        <label for="gender">Пол</label>
                        <select class="selectpicker" name="gender" id="gender" required>
                            <option value="Мужчина" @if(old('gender') == "Мужчина") {{ 'selected' }} @endif>Мужчина</option>
                            <option value="Женщина" @if(old('gender') == "Женщина") {{ 'selected' }} @endif>Женщина</option>
                        </select><br><br>

                        <input type="text" class="form-control" name="email" placeholder="email..." value="{{old('email')}}"><br>
                        <input type="text" class="form-control" name="phone" placeholder="Номер телефона..." value="{{old('phone')}}"><br>
                        <input type="text" class="form-control" name="position_title" placeholder="Должность..." value="{{old('position_title')}}"><br>
                        <input type="text" class="form-control" name="position_salary" placeholder="Зарплата..." value="{{old('position_salary')}}"><br>

                        <label for="MultipleDepartments">Отделы</label>
                        <select class="selectpicker" name="departments[]" multiple id="MultipleDepartments" required>
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
