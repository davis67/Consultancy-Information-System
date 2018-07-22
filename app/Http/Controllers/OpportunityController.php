<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opportunity;
use Session;
use App\User;
use DB;
class OpportunityController extends Controller
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
        $opportunities = Opportunity::all(); 
        return view('opportunities.index', compact('opportunities'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $users = User::all();

        return view('opportunities.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $opportunity = new Opportunity();
        $latest = $opportunity->latestOmnumber();   
        $assigned= $request->input('assigned_to'); 
        $assigned = implode(',', $assigned);     
        //  dd($assigned);
      Opportunity::create(request()->validate([
           'opportunity_name'=>'required',
            'business_number'=>'required',
           'client_name'=>'required',
           'country'=>'required',
            'date'=>'required',
            'revenue'=>'required',
            'currency'=>'required',
            'leads_name'=>'required',
            'internal_deadline'=>'required',
            'team'=>'required',
           'probability'=>'required',
            'reference_number'=>'nullable',
           'next_step'=>'required',
            'number_of_licence'=>'nullable',
           'partners'=>'required',
           'funded_by'=>'required',
           'year'=>'required',
           'description'=>'nullable'
           
        ])+['OM_number'=>$latest + 1, 'assigned_to' => $assigned]);
        Session::flash('success', "You have successively created an opportunity");
        return redirect()->route('opportunities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Opportunity $opportunity)
    {
        return view('opportunities.show', compact('opportunitty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Opportunity $opportunity)
    {
        $users = User::all();
        return view('opportunities.edit', compact('opportunity', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opportunity $opportunity)
    {
        //  dd(request()->all());
        // $opportunity = new Opportunity();
        $latest = $opportunity->latestOmnumber();          
      $opportunity->update(request()->validate([
           'opportunity_name'=>'required',
            'business_number'=>'required',
           'client_name'=>'required',
           'country'=>'required',
            'date'=>'required',
            'revenue'=>'required',
            'currency'=>'required',
            'leads_name'=>'required',
            'internal_deadline'=>'required',
            'team'=>'required',
           'probability'=>'required',
            'reference_number'=>'nullable',
           'next_step'=>'required',
            'number_of_licence'=>'nullable',
           'partners'=>'required',
           'funded_by'=>'required',
           'year'=>'required',
           'description'=>'nullable',
           'assigned_to'=>'required'
           
        ])+['OM_number'=>$latest]);
        Session::flash('success', "You have successively updated an opportunity");
        return redirect()->route('opportunities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $opportunity= Opportunity::find($id);
        $opportunity->delete();
        return redirect()->route('opportunities.index');
    }
  
     public function changeStatus(Request $request){
            $opportunityName= $request->input('opportunity_name');
            $salesStage= $request->input('sales_stage');
            $opportunity = DB::table('opportunities') 
            ->where('opportunity_name',$opportunityName);
            $opportunity->update([
               'sales_stage' => $salesStage
            ]);
            if($salesStage == 'Closed Lost'||$salesStage == 'Did Not Persue' ||$salesStage == 'Not Submitted'){
                $opportunity->delete();
                return redirect()->back();
            }elseif($salesStage == 'Closed Won'){
                return view('projects.create');
            }
            Session::flash('success', 'You have successively updated an opportunity');
            return redirect()->back();
             
     }
     public function trashed(){
        $users = Opportunity::onlyTrashed()->get();
        return view('users.lists', compact('users'));
    }
     public function removeOpportunity($id){
        $opportunity = Opportunity::withTrashed()->where('id', $id);
        $opportunity->forceDelete();
        Session::flash('success', 'You have Completely deleted an opportunity');
        return view('opportunities.lists');
     }
     public function restoreOpportunity($id){
        $opportunity = Opportunity::withTrashed()->where('id', $id);
        $opportunity->restore();
        Session::flash('success', 'You have Completely restored an opportunity');
        return view('opportunities.lists');
     }
}
