<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Http\Resources\MinifiedNoteResource;

class NotesController extends Controller
{
    public function index()
    {
        $notes = MinifiedNoteResource::collection(Note::all());
        return view('layots.notes', ['notes' => $notes]);
    }

    public function create()
    {
        return view('layots.create');
    }


    public function store(StoreNoteRequest $request)
    {
        if (is_null($request->input('title'))) {
            $title = "Новая заметка";
        } else {
            $title = $request->input('title');
        }
        Note::query()->create([
            'title' => $title,
            'body' => $request->input('body'),
        ]);
        return redirect()->route('notes.index');
    }

    public function edit(Note $note)
    {
        return view('layots.update', ['note' => $note]);
    }

    public function update(UpdateNoteRequest $request, Note $note)
    {
        $data = [];
        $data = $request->validated();
        if ($data['is_important'] == "0") {
            $data['is_important'] = 0;
        } else {
            $data['is_important'] = 1;
        }
        $note->update($data);
        // dd($data);
        return redirect()->route('notes.index');
    }

    public function softDestroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index');
    }

    public function forceDelete(Note $noteid)
    {
        dd($noteid);
        return redirect()->route('note.deleted');
    }
    public function changeImportance(Note $note)
    {
        if ($note->is_important) {
            $note->is_important = 0;
            $note->save();
        } else {
            $note->is_important = 1;
            $note->save();
        }
        // dd($note);
        return redirect()->route('note.update', ['note' => $note]);
    }

    public function importantNotes()
    {
        $notes = Note::query()->where('is_important', 1)->get();
        return view('layots.important', ['notes' => $notes]);
    }

    public function deletedNotes()
    {
        $notes = Note::onlyTrashed()->get();
        return view('layots.deleted', ['notes' => $notes]);
    }

    public function restoreNote(Note $note)
    {
        $note->restore();
        return redirect()->back();
    }
}
