<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opportunity;
use App\Project;
use App\Task;

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
        $projects = Project::all();

        return view('projects.index', compact('projects'));
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
    public function store(Request $request, Opportunity $opportunity)
    {
        dd($request::all());
        Project::create(request()->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'opportunity_id' => $opportunity->id,
         ]));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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

    public function projectdetails(){

        $tasks = Task::all();
        // $tasks->orderBy('sortorder')->get();
        dd($tasks);
    }
}
