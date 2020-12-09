<!-- Extends -->
@extends('layouts.app')

<!-- Body -->
@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Сотрудники</th>
                @foreach($departments as $department)
                    <th scope="col"><a href="/departments/show/{{ $department->id }}">{{$department->title}}</a></th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <!-- Abbreviation -->
                <td><a href="/employees/view/{{ $employee->id }}">{{ $employee->name }}</a></td>
                <!-- Fill table -->
                {{-- TODO: Таблица сотрудников и их отедлов (некорректно отображаются +) --}}
                @foreach($departments as $department)
                    @foreach($employee->departments as $employeeDepartment)
                        @if($employeeDepartment->id != $department->id)
                            <td>-</td>
                        @else
                            <td>+</td>
                            @break
                        @endif
                    @endforeach
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
