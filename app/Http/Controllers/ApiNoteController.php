<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class ApiNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Note::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'note' => 'required'
        ]);

        $note = $request->user()->notes()->create($data);
        return ['note' => $note];
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return $note;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {

        if (Auth::id() !== $note->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $data = $request->validate([
            'title' => 'required',
            'note' => 'required'
        ]);

        $note->update($data);
        return  $note;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if (Auth::id() !== $note->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $note->delete();
        return ['message' => 'The note was deleted'];
    }
}
