<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opportunity;
use App\Project;
use App\Task;
use DB;
use Session;
class ProjectsController extends Controller
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
        $tasks = DB::table('tasks')->orderBy('id')->get();
        $projects = Project::all();

        return view('projects.index', compact('projects', 'tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //      return view('projects.create');
    // }
    public function createProject($id)
    {
        $project = Opportunity::find($id);

        return view('projects.create')->with('project', $project);
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required',
            'contractRefNo'=>'required',
            'team' => 'required',
            'assigned_to'=>'required',
            'manager'=> 'required'
         ]);
         $project = Project::create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'contractRefNo'=>$request->contractRefNo,
            'team' => $request->team,
            'opportunity_id'=>$request->opportunityid,
            'manager'=> $request->manager,
            'user_id'=>$request->manager
         ]);
        //  $project->associates()->attach($request->associate);
         $project->users()->attach($request->assigned_to);
         Session::flash('success', 'You have successfully created a project');
         return redirect()->route('projects.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $tasks = DB::table('tasks')->where('project_id', $project->id)->get();
       // dd($tasks);
        return view('projects.show', compact('project', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
