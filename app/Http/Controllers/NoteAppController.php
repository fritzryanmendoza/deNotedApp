<?php

namespace App\Http\Controllers;

use App\NoteApp;
use Illuminate\Http\Request;
use App\Http\Resources\NotesResource;

class NoteAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return NoteApp::latest()->get();
    }
    
    public function tasks(){
        return view('units.todotask');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ],
        [
            'title.required' => 'Title field is required',
            'body.required' => 'Body field is required',
        ],);

        /**$this->validate($request,
        [
            'title' => 'required',
            'body' => 'requried',
        ],
        [
            'title.required' => 'Title field is required',
            'body.required' => 'Body field is required',
        ],
        );*/

        NoteApp::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NoteApp  $noteApp
     * @return \Illuminate\Http\Response
     */
    public function show(NoteApp $noteApp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NoteApp  $noteApp
     * @return \Illuminate\Http\Response
     */
    public function edit(NoteApp $noteApp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NoteApp  $noteApp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $note = NoteApp::findOrFail($id);
        $note->update($request->all());
        $note->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NoteApp  $noteApp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = NoteApp::findOrFail($id);
        $note->delete();
        return NoteApp::latest()->get();
    }
}
