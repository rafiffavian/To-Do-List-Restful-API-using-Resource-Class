<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;
use App\Http\Resources\NoteResource;
use Auth;


class NoteController extends Controller
{
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
}
