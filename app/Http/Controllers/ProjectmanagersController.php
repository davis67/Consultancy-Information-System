<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectmanagersController extends Controller
{
    public function create(){
        return view('projectmanager.create');

    }
    public function index(){
        return view('projectmanager.index');
    }
}
