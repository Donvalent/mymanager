<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Method for /employees route
     *
     * @return View
     */
    public function index() : View
    {
        $employees = User::with('departments')->get();

        return view('employees/index', [
            'employees' => $employees,
        ]);
    }

    /**
     * Method for /show route
     *
     * @return View
     */
    public function show(int $id) : View
    {
        $employee = Employee::with('position', 'departments')->find($id);

        return view('employees/show', [
            'employee' => $employee,
        ]);
    }

    /**
     * Method for /create route
     *
     * @return View
     */
    public function create() : View
    {
        $departments = Department::all();

        return view('employees/create', [
            'departments' => $departments,
        ]);
    }

    /**
     * POST method for /store route
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) : RedirectResponse
    {
        // Add new position for new employee
        $position = new Position();
        $position->title = $request->get('position_title');
        $position->salary = $request->get('position_salary');

        // Get departments list from request
        $departments = array();
        foreach ($request->departments as $departmentId)
            array_push($departments, Department::find($departmentId));

        // Add employee in db
        $employee = new Employee();
        $employee->name = $request->get('name');
        $employee->gender = $request->get('gender');
        $employee->email = $request->get('email');
        $employee->phone = $request->get('phone');
        $employee->position()->save($position);
        $employee->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

        $employee->save();

        // Add departments in employee
        $employee->departments()->saveMany($departments);

        return redirect()->route('employees.index');
    }

    public function edit(Request $request) : View
    {


        return view('employees/edit', [

        ]);
    }
}
