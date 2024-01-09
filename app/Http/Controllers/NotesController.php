<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchNoteRequest;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Http\Resources\MinifiedNoteResource;

class NotesController extends Controller
{
    public function index()
    {
        $notes = Note::query()->orderBy('updated_at', 'desc')->get()->toArray();
        // $note = new MinifiedNoteResource(Note::query()->find(5));
        // dd($note);
        return view('layots.notes', ['notes' => MinifiedNoteResource::collection($notes)]);
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
        if($request->is_important == "1"){
            $is_important = 1;

        }else{
            $is_important = 0;
        }
        Note::query()->create([
            'title' => $title,
            'body' => $request->input('body'),
            'is_important' => $is_important
        ]);
        return redirect()->route('note.index');
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
        return redirect()->route('note.index');
    }

    public function softDestroy(Note $note)
    {
        $note->delete();
        return redirect()->route('note.index');
    }

    public function forceDelete(int $note)
    {
        $deletedNote = Note::onlyTrashed()->find($note);
        $deletedNote->forceDelete();
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
        return view('layots.deleted', ['notes' => MinifiedNoteResource::collection($notes)]);
    }

    public function restoreNote(int $noteId)
    {
        $note = Note::withTrashed()->find($noteId)->restore();
        return redirect()->back();
    }

    public function searchNote(SearchNoteRequest $request)
    {
        $title = $request->title;
        $notes = Note::query()->where('title', 'LIKE', "%{$title}%")->orderBy('updated_at', 'desc')->get();
        return view('layots.notes', ['notes' => $notes]);
    }
}
