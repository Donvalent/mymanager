<!-- Extends -->
@extends('layouts.app')

<!-- Body -->
@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Номер</th>
                <th scope="col">Сотрудник</th>
                <th scope="col">Название</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="/tasks/view/"><i class="fa fa-share"></i></a></td>
                <td></td>
                <td><a href="/employees/view/"></a></td>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="/tasks/edit/"><i class="fa fa-edit"></i></a></td>
                <td><a href="#"><i class="fa fa-minus-circle"></i></a></td>
            </tr>
        </tbody>
    </table>

    <a href="/tasks/add" class="btn btn-primary"><i class="fa fa-plus"></i> Новая задача</a>

@endsection
