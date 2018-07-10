<?php

namespace App\Http\Controllers;

use Session;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('tasks.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::create(request()->validate([
            'task_name' => 'required',
            'task_status' => 'required',
            'priority' => 'required',
            'service_line' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'team' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'related_to' => 'required',
            'description' => 'nullable',
            'assigned_to' => 'required',
           ]));
        Session::flash('success', 'You have successfully created a task');

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return response()->json($task);

        //return $task;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Task::update(request()->validate([
            'task_name' => 'required',
            'task_status' => 'required',
            'priority' => 'required',
            'service_line' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'team' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'related_to' => 'required',
            'description' => 'nullable',
            'assigned_to' => 'required',
           ]));
        Session::flash('success', 'You have successfully created a task');

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
