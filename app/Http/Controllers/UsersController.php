<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Session;
use Admin;
use App\Usergroup;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
        // $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usergroups = Usergroup::all();
        return view('users.create', compact('usergroups'));
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
        //  dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'employeeNo'=>'required',
            'reportsTo' =>'required',
            'team'=>'required',
            'is_permitted'=>'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'),
            'employeeNo'=>$request->employeeNo,
            'reportsTo' =>$request->reportsTo,
            'team'=>$request->team,
            'is_permitted'=>$request->is_permitted
        ]);
        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/1.jpeg',
        ]);
        Session::flash('success', 'User added successively');

        return redirect()->route('users');
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
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        Session::flash('sucess','You have successively trashed a user');
        return back();
    }

    public function admin($id)
    {
        $user = User::find($id);
        $user->admin = 1;
        $user->save();
        Session::flash('success', 'You have successively changed the permission');

        return redirect()->back();
    }

    public function not_admin($id)
    {
        $user = User::find($id);
        $user->admin = 0;
        $user->save();
        Session::flash('success', 'You have successively changed the permission to not admin');

        return redirect()->back();
    }
    public function trashed(){
        $users = User::onlyTrashed()->get();
        return view('users.lists', compact('users'));
    }
    public function removeUser($id){
        $user = User::withTrashed()->where('id', $id);
        $user->forceDelete();
        Session::flash('success', 'You have Completely deleted an opportunity');
        return view('users.lists');
     }
}
