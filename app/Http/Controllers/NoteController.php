<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $notes = Note::query()
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view("index", ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $data = $request->validate([
            'title' => ['required', 'string'],
            'note' => ['required', 'string']
        ]);

        $note = Note::create($data);

        return to_route('note.show', $note);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note) {
        return view("single", ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note) {
        return view("edit", ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'note' => ['required', 'string']
        ]);
        $note->Update($data);
        return to_route('note.show', $note);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return to_route('note.index', $note);
    }
}
