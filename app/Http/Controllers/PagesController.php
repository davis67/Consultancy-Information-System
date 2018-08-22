<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Page;
use App\Role;
use App\Team;

use App\Leave;
use App\Leavesetting;
use App\User;
use App\Project;
use App\Division;
use App\Associate;
use App\Holiday;
use App\Serviceline;
use Hash;
use DB;    //Use DB to run custom SELECT statements

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('pages.dashboard');
    }
    
    public function admin(){
        $roles = Role::all();
        $teams = Team::all();
        $meats = Meat::all();
        $leaves = Leave::all();
        $divisions = Division::all();
        $associates = Associate::all();
        $holidays = Holiday::all();
        $servicelines = Serviceline::all();
        $leavesettings = Leavesetting::all();
        // return view('pages.admin')->with('roles', $roles)->with('teams', $teams);
        return view('pages.admin',
        ['roles'=>$roles,
        'teams'=>$teams,
        'meats'=>$meats,
        'leaves'=>$leaves,
        'divisions'=>$divisions,
        'associates'=>$associates,
        'holidays'=>$holidays,
        'servicelines'=>$servicelines,
        'leavesettings'=>$leavesettings
        ]);
    }
    public function support(){
        return view('pages.support');
    }

    //Individual profile page shows meats, leave, projects and opportunities for a user who is logged in
    public function profile(){
        $leaves = Leave::where('user_id', Auth::user()->id)->get();
        // $meats = Meat::where('user_id', Auth::user()->id)->get();
        // $worked = $meats->sum('duration');
        // $wopps = Meat::where('user_id', Auth::user()->id)->where('beneficiary','Opportunities')->get();
        // $woppsum = $wopps->sum('duration');
        // $admins = Meat::where('user_id', Auth::user()->id)->where('beneficiary','Administration')->get();
        // $adminw = $admins->sum('duration');
        // $personal = Meat::where('user_id', Auth::user()->id)->where('beneficiary','Personal')->get();
        // $personalw = $personal->sum('duration');

        //$carriedForward = Leavesetting::
        //$opportunities = Opportunity::where('user_id', Auth::user()->id)->get();
        //$projects = Project::where('user_id', Auth::user()->id)->get();
        
        return view('pages.profile',[
            'leaves'=>$leaves,
            // 'meats'=>$meats,
            // 'worked'=>$worked,
            // 'woppsum'=>$woppsum,
            // 'adminw'=>$adminw,
            // 'personalw'=>$personalw
            ]);
    }

    //List of all staff and their contacts
    public function users(){
        $users = User::all();
        return view('pages.users',['users'=>$users]);
    }

    //List of all associates and their contacts
    public function associates(){
        $associates = Associate::all();
        return view('pages.associates',['associates'=>$associates]);
    }
    public function pms(){
        return view('pages.pms');
    }
    public function generatePDF(){
        $title = ['title'=>'Test'];
        $pdf = PDF::loadview('pages.pdf', $title);
        return $pdf->download('Document.pdf');
    }


    
}