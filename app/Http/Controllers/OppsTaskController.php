<?php

namespace App\Http\Controllers;

use Session;
use App\OppsTask;
use App\User;
use Illuminate\Http\Request;
use Auth;
class OppsTaskController extends Controller
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
       
        $tasks = User::find(Auth::User()->id)->tasks;
        return view('opptasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('opptasks.create', compact('users'));
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
        $this->validate($request,[
            'task_name' => 'required',
            'task_status' => 'required',
            'priority' => 'required',
            'service_line' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'team' => 'required',
            'related_to' => 'required',
            'description' => 'nullable',
           ]);
           $task = OppsTask::create([
            'task_name' => $request->task_name,
            'task_status' => $request->task_status,
            'priority' => $request->priority,
            'service_line' => $request->service_line,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'team' => $request->team,
            'related_to' => $request->related_to,
            'description' => $request->description
           ]);
            $task->users()->attach($request->assigned_to);
        Session::flash('success', 'You have successfully created a task');

        return redirect()->route('opptasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(OppsTask $task)
    {
      return view('opptasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(OppsTask $task)
    {
        $users = User::all();
      return view('opptasks.edit', compact('task','users'));
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
        $this->validate($request,[
            'task_name' => 'required',
            'task_status' => 'required',
            'priority' => 'required',
            'service_line' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'team' => 'required',
            'related_to' => 'required',
            'description' => 'nullable',
           ]);
           $task ->update([
            'task_name' => $request->task_name,
            'task_status' => $request->task_status,
            'priority' => $request->priority,
            'service_line' => $request->service_line,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'team' => $request->team,
            'related_to' => $request->related_to,
            'description' => $request->description
           ]);
            $task->users()->sync($request->assigned_to);
        Session::flash('success', 'You have successfully updated a task');

        return redirect()->route('opptasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(OppsTask $task)
    {
        $task->delete();
        Session::flash('success', "You have successively deleted a task");
        return redirect()->route('opptasks.index');
    }
}
