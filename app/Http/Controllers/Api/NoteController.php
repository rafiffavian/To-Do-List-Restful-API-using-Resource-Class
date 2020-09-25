<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;
use App\Http\Resources\NoteResource;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;


class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::latest()->get();

        return NoteResource::collection($notes);
    }

    // public function show($id)
    // {
    //     $note = Note::find($id);

    //     return new NoteResource($note);
    // }

    public function show(Note $note)
    {
        return new NoteResource($note);
    }

    public function action(Request $request, Note $note)
    {
        // dd(auth()->user()->id);

        $this->validate($request, [
            'note'  => 'required',
            'date'  => 'required|date',
            'time'  => 'required',
        ]);

        $note = $note->create([
            'note'    => $request->note,
            'user_id' => auth()->id(),
            'date'    => $request->date,
            'time'    => $request->time,
        ]);

        // return response()->json($note);
        return new NoteResource($note);
    }

    public function update(Request $request, Note $note)
    {
        // dd($note);
        $this->authorize('update', $note);

        $this->validate( $request, [
            'note'  => 'required',
            'date'  => 'required|date',
            'time'  => 'required',
        ]);

         $note->update([
            'note'  => $request->note,
            'date'  => $request->date,
            'time'  => $request->time,
        ]);

      return new NoteResource($note);
    }

    public function destroy(Note $schedule)
    {
        // dd($schedule);
        $this->authorize('delete', $schedule);

        $schedule->delete();

        return response()->json([
            'message' => 'Your Note deleted!'
        ]);
        // return new NoteResource($schedule);
    }

}
