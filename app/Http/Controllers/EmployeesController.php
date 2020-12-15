<?php

namespace App\Http\Controllers;

use App\Http\Requests\employeeRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class EmployeesController extends Controller
{
    use ValidatesRequests;

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
    public function show(int $id, Request $request) : View
    {
        $daysInfoDate = date("Y-m-d");

        if ($request->has('date'))
            $daysInfoDate = request()->get('date');

        $employee = Employee::with('position', 'departments')->find($id);
        $employee->load(["days_info" => function($q) use($daysInfoDate){
            $q->where('date', '=', $daysInfoDate);
        }]);

        foreach ($employee->days_info as $day_info)
            $day_info->info = json_decode($day_info->info, true);

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
    public function store(EmployeeRequest $request) : RedirectResponse
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

    /**
     * Method for /edit route
     *
     * @param int $employeeId
     * @param Request $request
     * @return View
     */
    public function edit(int $employeeId) : View
    {
        $departments = Department::all();
        $employee = Employee::with('position', 'departments')->find($employeeId);

        return view('employees/edit', [
            'employee' => $employee,
            'departments' => $departments,
        ]);
    }

    /**
     * Updating employee data
     *
     * @param int $employeeId
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(int $employeeId, EmployeeRequest $request) : RedirectResponse
    {
        // Get departments list from request
        $departments = array();
        foreach ($request->departments as $departmentId)
            array_push($departments, Department::find($departmentId));

        // Add employee in db
        $employee = Employee::with('position', 'departments')->find($employeeId);
        $employee->name = $request->get('name');
        $employee->gender = $request->get('gender');
        $employee->email = $request->get('email');
        $employee->phone = $request->get('phone');
        $employee->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

        // Edit position in employee
        $employee->position()->update([
            'title' => $request->get('position_title'),
            'salary' => $request->get('position_salary')
        ]);

        $employee->save();

        // Add departments in employee
        $employee->departments()->detach();

        $employee->departments()->saveMany($departments);

        return redirect()->route('employees.index');
    }

    /**
     * Method for /destroy route
     *
     * @param int $employeeId
     * @return RedirectResponse
     */
    public function destroy(int $employeeId) : RedirectResponse
    {
        $employee = Employee::find($employeeId);
        $employee->position()->delete();
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
