<?php

namespace App\Http\Controllers;

use App\Project;
use App\Opportunity;

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

        return view('home', compact('projects', 'opportunities'));
    }
}
