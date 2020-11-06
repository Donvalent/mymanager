<!-- Extends -->
@extends('layouts.app')

<!-- Body -->
@section('content')

<table class="table">
    <thead>
    <tr>
        <th scope="col">Сотрудники</th>

        <th scope="col"><a href="/departments/view/"></a></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <!-- Аббревиатура -->
        <td><a href="/employees/view/"></a></td>
        <!-- Заполнение таблицы -->
    </tr>
    </tbody>
</table>

@endsection
