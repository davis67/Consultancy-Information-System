<?php

namespace App\Http\Controllers;

use App\Project;
use App\Activity;
use App\Opportunity;
use DB;
use Auth;
use Hash;
use Session;
use App\Task;
use App\Team;
use Illuminate\Http\Request;
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
    public function index(Request $request)
    {
        $tasks = DB::table('tasks')->orderBy('id')->get();
        $teams = Team::all();
        $teamName= $request->input('team');
        // dd($teamName);
        $opportunities= DB::table('opportunities')
                    ->selectRaw("count('id') as opportunitiesdone,sales_stage" )
                    ->where('team', Auth::user()->team)
                    ->groupBy("sales_stage")
                    ->get();
        return view('home', compact('projects','teams', 'opportunities','doneopportunities'));
    }
    public function changePassword(Request $request){
       
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        Session::flash('success', "YOU have successively updated your password");
        return redirect()->back();
}
}
