<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::query()
        ->where("user_id", auth()->user()->id)
        ->orderBy("created_at","desc")
        ->paginate(10);

        // (or)
        // $notes = Note::query()
        // ->where("user_id", request()->user()->id)
        // ->orderBy("created_at","desc")
        // ->paginate();
        
        return view('note.index', ['notes'=> $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'note'=> ['required', 'string']
        ]);

        //dd($request);
        
        $data['user_id'] = $request->user()->id;

        $note = Note::create($data);

        // return redirect()->route('note.show', $note)->with('message', 'Note was created successfully');
        return to_route('note.show', $note)->with('message','Note was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        if ($note->user_id !== auth()->user()->id) {
            abort(403,'Do not have access to the record');
        }

        return view('note.show', ['note'=> $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403,'Not allowed to edit this record');
        }

        //dd($note);

        return view('note.edit', ['note'=> $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403,'Not allowed to update this record');
        }
        
        $data = $request->validate([
            'note'=> ['required', 'string']
        ]);
        
        $note->update($data);

        return redirect()->route('note.show', $note)->with('message','Note was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403,'Not allowed to delete this record');
        }

        $note->delete();

        return redirect()->route('note.index')->with('message','Note was deleted');
    }
}
