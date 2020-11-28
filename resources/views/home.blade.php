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
                @foreach($departments as $department)
                    @foreach($employee->departments as $employeeDepartment)
                        @if($employeeDepartment->title == $department->title)
                            <td>+</td>
                        @else
                            <td> </td>
                        @endif
                    @endforeach
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
