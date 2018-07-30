<?php

namespace App\Http\Controllers;

use App\Project;
use App\Activity;
use App\Opportunity;
use DB;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects = Project::all();
        $opportunities = Opportunity::all();
        $activities = Activity::with('user')->get();
        // $doneopportunities = DB::table('opportunities')->where('assigned_To', Auth::user()->name);
        // $donetasks = DB::table('tasks')->where('assigned_To', Auth::user()->name)->get();


        // dd($doneopportunities);
        return view('home', compact('projects', 'opportunities','activities', 'doneopportunities', 'donetasks'));
    }
}
