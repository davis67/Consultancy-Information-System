<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opportunity;
use Session;

class OpportunityController extends Controller
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
        return view('opportunities.index')->with('opportunities', Opportunity::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('opportunities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $opportunity = new Opportunity();
        $latest = $opportunity->latestOmnumber();

        Opportunity::create(request()->validate([
           'opportunity_name' => 'required',
            'business_number' => 'required',
           'client_name' => 'required',
           'country' => 'required',
            'sales_stage' => 'required',
            'date' => 'required',
            'revenue' => 'required',
            'currency' => 'required',
            'leads_name' => 'required',
            'internal_deadline' => 'required',
            'team' => 'required',
           'probability' => 'required',
            'reference_number' => 'nullable',
           'next_step' => 'required',
            'number_of_licence' => 'nullable',
           'partners' => 'required',
           'funded_by' => 'required',
           'year' => 'required',
           'description' => 'nullable',
           'assigned_to' => 'required',
        ]) + ['OM_number' => $latest + 1]);
        Session::flash('success', 'You have successively created an opportunity');

        return redirect()->route('opportunities.index');
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
}
