<!-- Extends -->
@extends('layouts.app')

<!-- Body -->
@section('content')

    <div class="row">
        <div class="col-mg-4 col-lg-4">
            <div class="card">
                <img src="https://via.placeholder.com/256" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $employee->name }}</h5>
                    <p class="card-text">{{ $employee->phone }}</p>
                    <p class="card-text"><{{ $employee->email }}</p>
                    <p class="card-text">{{ $employee->position->title }}</p>
                    <p class="card-text">{{ $employee->position->salary }} руб.</p>
                    <p class="card-text">
                        @foreach($employee->departments as $department)
                            <a href="{{ route('departments.show', $department->id) }}">{{ $department->title }}</a>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-mg-8">
            {!! Form::open(['route' => ['employees.show', $employee->id], 'method' => 'GET']) !!}
            @csrf
            <input type="date" name="date" id="">
            <button class="btn btn-success" type="submit">Показать</button>
        {!! Form::close() !!}<br>
        <!-- Table of day info -->
            {{-- TODO: Подгрузка данных через ajax --}}
            @foreach($employee->days_info as $dayInfo)
                <div class="row">
                    <a class="btn btn-primary col-lg-12" data-toggle="collapse" href="#date{{ $dayInfo->date }}" role="button" aria-expanded="false">
                        {{ $dayInfo->date }}
                    </a>
                </div>
                <div class="collapse" id="date{{ $dayInfo->date }}">
                    <table class="table">
                        <thead>
                        <tr scope="col">
                            <th scope="col">Программы</th>
                            <th scope="col">Время</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($dayInfo->info as $program => $time)
                                <tr>
                                    <td>{{ $program }}</td>
                                    <td>{{ $time }} ч.</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>

@endsection
