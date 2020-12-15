<!-- Extends -->
@extends('layouts.app')

<!-- Body -->
@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <p class="card-text">{{ $task->description }}</p>
                    <p class="card-text">{{ $task->status }}</p>
                    <p class="card-text">
                        @foreach($task->users as $employee)
                            <a href="{{ route('employees.show', $employee->id) }}">{{ $employee->name }}</a>
                            @if(!$loop->last) , @endif
                        @endforeach
                    </p>
                    <p class="card-text">{{ $task->date }} - {{ $task->deadline }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
