<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:100',
            'content' => 'nullable|max:500',
        ]);

        Note::create($validated);

        return redirect()->route('notes.index')
                        ->with('success', 'Note successfully added!');
    }


    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:100',
            'content' => 'nullable|max:500',
        ]);

        $note->update($validated);

        return redirect()->route('notes.index')
                        ->with('success', 'Note successfully updated!');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index');
    }

    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    public function toggle(Note $note)
    {
    $note->update([
        'is_done' => !$note->is_done
    ]);

    return redirect()->back();
    }

}
