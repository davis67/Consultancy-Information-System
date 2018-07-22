<?php

namespace App\Http\Controllers;

use App\Leave;
use App\User;
use Auth;
use Session;
use Illuminate\Http\Request;
use DB;
class leavesController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::all();
        
        return view('leaves.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leaves.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
       
       $leave = Leave::create($request->validate([
            'description'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'leave_type'=>'required'
        ])+['user_id' =>auth()->id()]);
        Session::flash('success', "You have successfully requested for a leave");

        return redirect()->route('leaves.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Approve reject or acccept.
     * 
     * This will be done by the supervisor, CEO, and the executive Director
     */
    public function acceptLeave(){
        DB::table('leaves') 
        ->where('status','submitted')
        ->update([
           'status' => 'Endorsed'
        ]);
    }
    public function reviewLeave(){
        DB::table('leaves') 
        ->where('status','Endorsed')
        ->update([
           'status' => 'Reviewed'
        ]);
    }
    public function approveLeave(){
        DB::table('leaves') 
        ->where('status','Reviewed')
        ->update([
           'status' => 'Approved'
        ]);
    }
    public function rejectLeave($id){
        $leave = Leave::find($id);
        $leave->status = 'rejected';
        $leave->save();
      
    }
}
