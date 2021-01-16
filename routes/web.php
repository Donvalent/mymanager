<?php

use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\HomesController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomesController::class, 'index'])->name('homes.index');

Route::get('/departments',[DepartmentsController::class, 'index'])->name('departments.index');
Route::get('/departments/show/{id}',[DepartmentsController::class, 'show'])->name('departments.show');
Route::get('/departments/create', [DepartmentsController::class, 'create'])->name('departments.create');
Route::post('/departments/store', [DepartmentsController::class, 'store'])->name('departments.store');
Route::get('/departments/edit/{id}', [DepartmentsController::class, 'edit'])->name('departments.edit');
Route::put('/departments/update/{id}', [DepartmentsController::class, 'update'])->name('departments.update');
Route::delete('/departments/destroy/{id}', [DepartmentsController::class, 'destroy'])->name('departments.destroy');

Route::get('/employees', [EmployeesController::class, 'index'])->name('employees.index');
Route::get('/employees/show/{id}',[EmployeesController::class, 'show'])->name('employees.show');
Route::get('/employees/create', [EmployeesController::class, 'create'])->name('employees.create');
Route::post('/employees/store', [EmployeesController::class, 'store'])->name('employees.store');
Route::get('/employees/edit/{id}', [EmployeesController::class, 'edit'])->name('employees.edit');
Route::put('/employees/update/{id}', [EmployeesController::class, 'update'])->name('employees.update');
Route::delete('/employees/destroy/{id}', [EmployeesController::class, 'destroy'])->name('employees.destroy');

Route::get('/tasks', [TasksController::class, 'index'])->name('tasks.index');
Route::get('/tasks/show/{id}',[TasksController::class, 'show'])->name('tasks.show');
Route::get('/tasks/create', [TasksController::class, 'create'])->name('tasks.create');
Route::post('/tasks/store', [TasksController::class, 'store'])->name('tasks.store');
Route::get('/tasks/edit/{id}', [TasksController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/update/{id}', [TasksController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/destroy/{id}', [TasksController::class, 'destroy'])->name('tasks.destroy');

