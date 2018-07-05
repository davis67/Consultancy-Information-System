<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Activity;
use App\Opportunity;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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
        return view('home',compact('projects', 'opportunities'));
    }
}
