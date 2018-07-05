<?php

namespace App\Http\Controllers;
use App\Contact;
use Session;
use Illuminate\Http\Request;

class ContactController extends Controller
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
        $contacts = Contact::all();

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Contact::create($request->validate([
             'name_title'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'office_telephone'=>'required',
            'mobile_telephone'=>'required',
            'department'=>'required',
            'job-title'=>'required',
            'email'=>'required|email',
            'client_name' =>'required',
            'address_street'=>'nullable',
            'address_city'=>'required',
            'address_state'=>'required',
            'address_postal_code'=>'required',
            'address_country'=>'required',
            'alt_address_street'=>'nullable',
            'alt_address_city'=>'nullable',
            'alt_address_state'=>'nullable',
            'alt_postal_code'=>'nullable',
            'alt_address_country'=>'nullable',
            'description'=>'required',
            'assigned_to'=>'required'
        ]));

         Session::flash('success', 'You have successively created a contact');

        return redirect()->route('contacts.index');
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
}
