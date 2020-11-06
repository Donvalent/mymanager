<!-- Extends -->
@extends('layouts.app')

<!-- Body -->
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Сотрудников</th>
            <th scope="col">Максимальная зарплата</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="/departments/view/"></a></td>
                <td></td>
                <td></td>
                <td><a href="#"><i class="fa fa-minus-circle"></i></a></td>
            </tr>
        </tbody>
    </table>
    <a href="/departments/add" class="btn btn-primary"><i class="fa fa-plus"></i> Новый отдел</a>

@endsection
