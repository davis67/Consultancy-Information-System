<?php

namespace App\Http\Controllers;

use App\Project;
use App\Activity;
use App\Opportunity;
use DB;
use Auth;
use App\Task;
use App\Team;
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
        $tasks = DB::table('tasks')->orderBy('id')->get();
        $teams = Team::all();
          $opportunities= DB::table('opportunities')
                    ->selectRaw("count('id') as opportunitiesdone,sales_stage" )
                    ->where('team', 'MCS')
                    ->groupBy("sales_stage")
                    ->get();
        return view('home', compact('projects', 'opportunities','teams', 'doneopportunities'));
    }
}
