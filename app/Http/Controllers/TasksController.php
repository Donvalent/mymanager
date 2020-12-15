<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TasksController extends Controller
{
    use ValidatesRequests;

    /**
     * Method for /tasks route
     *
     * @return View
     */
    public function index() : View
    {
        $tasks = Task::with('users')->get();

        return view('tasks/index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Method for /show route
     *
     * @param $taskId
     * @return View
     */
    public function show($taskId) : View
    {
        $task = Task::with('users')->find($taskId);

        return view('tasks/show',[
           'task' => $task,
        ]);
    }

    /**
     * Method for /create route
     *
     * @return View
     */
    public function create() : View
    {
        $employees = Employee::all();

        return view('tasks/create', [
           'employees' => $employees,
        ]);
    }

    /**
     * Method for /store route
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) : RedirectResponse
    {
        // Get employees from request
        $employees = array();
        foreach ($request->employees as $employee)
            array_push($employees, Employee::find($employee));

        $task = new Task();
        $task->title = $request->get('title');
        $task->description = $request->get('description');
        $task->status = $request->get('status');
        $task->date = $request->get('date');
        $task->deadline = $request->get('deadline');

        $task->save();

        // Add employees in task
        $task->users()->saveMany($employees);

        return redirect()->route('tasks.index');
    }

    /**
     * Method for /edit route
     *
     * @param $taskId
     * @return View
     */
    public function edit($taskId) : View
    {
        $task = Task::with('users')->find($taskId);
        $employees = Employee::all();

        return view('tasks.edit', [
            'task' => $task,
            'employees' => $employees,
        ]);
    }

    /**
     * Method for /update route
     *
     * @param $taskId
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(int $taskId, Request $request) : RedirectResponse
    {
        // Get task
        $task = Task::with('users')->find($taskId);

        // Get employees list from request
        $employees = array();
        foreach ($request->employees as $employeeId)
            array_push($employees, Employee::find($employeeId));

        // Edit task
        $task->title = $request->get('title');
        $task->description = $request->get('description');
        $task->status = $request->get('status');
        $task->date = $request->get('date');
        $task->deadline = $request->get('deadline');

        $task->save();

        // Add Employees in task
        $task->users()->detach();
        $task->users()->saveMany($employees);

        return redirect()->route('tasks.index');
    }

    /**
     * Method for /destroy route
     *
     * @param $taskId
     * @return RedirectResponse
     */
    public function destroy($taskId) : RedirectResponse
    {
        $task = Task::find($taskId);
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
