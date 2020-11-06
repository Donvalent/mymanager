<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/departments','App\Http\Controllers\DepartmentController@index')->name('departments');

Route::get('/employees','App\Http\Controllers\EmployeeController@index')->name('employees');

Route::get('/tasks','App\Http\Controllers\TaskController@index')->name('tasks');

