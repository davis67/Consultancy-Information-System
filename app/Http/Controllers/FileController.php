<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\Storage;
use Mail;
use App\User;

class FileController extends Controller
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
         $files = File::orderBy('created_at','DESC')->paginate(30);
     
        return view('files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = User::all();
        return view('files.create', compact('users'));
    }
  /**
     * Store a newly created file in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
    public function store(Request $request){
        $document = $request->file('document');
           $request->validate([
                'publish_date' =>'nullable',
                'description'=>'nullable',
                'expiration_date'=>'nullable',
                'assigned_to' => 'nullable',
                'category'=>'nullable',
                'team' => 'nullable'
            ]);
            File::create([
                'title' => $document->getClientOriginalName(),
                'path' => $document->store('public/storage'),
                'size' =>$document->getSize(),
                'publish_date' =>$request->publish_date,
                'description'=>$request->description,
                'expiration_date'=>$request->expiration_date,
                'assigned_to' => $request->assigned_to,
                'category'=>$request->category,
                'team' => $request->team
            ]);
            return redirect('/files');   
    }
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dl = File::find($id);
        return Storage::download($dl->path, $dl->title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fl = File::find($id);
        $data = array('title' => $fl->title, 'path' => $fl->path);
        Mail::send('emails.attachment', $data, function($message) use($fl){
            $message->to('davisag67@gmail.com', 'Agaba Davis')->subject('Laravel file attachment and embed');
            $message->attach(storage_path('app/'.$fl->path));
            $message->from('davisag67@gmail.com', 'Agaba Davis');
        });
        return redirect('/files')->with('success','File attachment has been sent to your email');
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
        $del = File::find($id);
        Storage::delete($del->path);
        $del->delete();
        return redirect('/files');
    }
}
