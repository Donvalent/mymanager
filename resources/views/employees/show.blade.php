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
                            <a href="{{ $department->id }}">{{ $department->title }}</a>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
        <!-- Table of day info -->
        <table class="table col-lg-8 col-mg-8">
            <thead>
                <tr scope="col">
                    <th scope="col">Программы</th>
                    <th scope="col">Время</th>
                </tr>
            </thead>
            <tbody>
<!--                --><?php //foreach($daysInfo as $processTitle => $time): ?>
                    <tr>
{{--                        <td><?php echo $processTitle; ?></td>--}}
{{--                        <td><?php echo ($time < 60) ? $time . ' мин' : round($time / 60, 1) . ' ч'; ?></td>--}}
                    </tr>
<!--                --><?php //endforeach; ?>
            </tbody>
        </table>
    </div>

@endsection
