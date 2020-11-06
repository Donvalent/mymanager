<!-- Extends -->
@extends('layouts.app')

<!-- Body -->
@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Отчество</th>
                <th scope="col">Пол</th>
                <th scope="col">Должность</th>
                <th scope="col">Зарплата</th>
                <th scope="col">Отделы</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="/employees/view/"><i class="fa fa-share"></i></a></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href="">
                    </a>
                </td>
                <td><a href="/employees/edit/"><i class="fa fa-edit"></i></a></td>
                <td><a href="#"><i class="fa fa-minus-circle"></i></a></td>
            </tr>
        </tbody>
    </table>
    <a href="/employees/add" class="btn btn-primary"><i class="fa fa-plus"></i> Новый сотрудник</a>

@endsection
