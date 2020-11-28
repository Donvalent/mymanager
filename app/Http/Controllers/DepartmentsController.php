<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DepartmentsController extends Controller
{
    public function index()
    {
        $departments = Department::with('users.position')->get();

        // TODO: realize max users salary in all departments

        return view('departments\index', [
            'departments' => $departments,
        ]);
    }

    public function show($id)
    {
        $department = Department::with('users.position')->find($id);

        return view('departments\show', [
            'department' => $department

        ]);
    }
}
