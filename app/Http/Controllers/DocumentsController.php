<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Document;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();

        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
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
        // dd($request->all());
        $this->validate($request, [
            'document_file' => 'required|max:100000|mimes:doc,pdf,docx,odt,zip',
            'status' => 'required',
            'document_name' => 'required',
            'revision' => 'required',
            'publish_date' => 'required',
            'expiration_date' => 'required',
            'team' => 'required',
            'category' => 'required',
            'description' => 'nullable',
            'assigned_to' => 'required',
        ]);
        $document_file = $request->document_file;
        $document_file_new_name = time().$document_file->getClientOriginalName();
        $document_file->move('uploads/documents/', $document_file_new_name);

        Document::create([
            'document_file' => 'uploads/documents/'.$document_file_new_name,
            'status' => $request->status,
            'document_name' => $request->document_name,
            'revision' => $request->revision,
            'publish_date' => $request->publish_date,
            'expiration_date' => $request->expiration_date,
            'team' => $request->team,
            'category' => $request->category,
            'description' => $request->description,
            'assigned_to' => $request->assigned_to,
        ]);
        Session::flash('success', 'You have successively saved a document');

        return redirect()->route('documents.index');
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
