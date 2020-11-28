<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class HomesController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $employees = Employee::all();

        return view('home', [
            'departments' => $departments,
            'employees' => $employees,
        ]);
    }
}
