<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subtask;
use App\User;
class SubtaskController extends Controller
{
    /**
     * shows the list of all sub-tasks
     */
    public function index(){

    }

     /*
     *
     * creates a new sub-task
     */
    public function createtask($id){
        
        $users = User::all();
        return view('subtasks.create', compact('users','id'));
    }

    public function store(Request $request){
        // dd($request->all());
         $this->validate($request, [
            'name' =>'required',
            'duedate' => 'required',
            'task_id' => 'required',
            'user_id' => 'required',
            'task_title' => 'required'
        ]);
        $task = Subtask::create([
            'task_id' => $request->task_id,
            'user_id'    => $request->user_id,
            'task_title' => $request->task_title,
            'name'       => $request->name,
            'duedate'    => $request->duedate
        ]);

        return redirect()->route('tasks.index');
    }

    public function show(Subtask $subtask){
        return view('subtasks.index', compact('subtask'));

    }

    public function edit(Subtask $subtask){
        return view('subtasks.index', compact('subtask'));
    }

    
    public function destroy(Subtask $subtask){

        $subtask->delete();

        return redirect()->route('subtasks.index');
    }
}
