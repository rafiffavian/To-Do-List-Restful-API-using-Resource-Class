<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Note;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Note $note)
    {
        // dd($user->ownsNote($note));
        return $user->ownsNote($note);
    }

    public function delete(User $user, Note $schedule)
    {
        // dd($schedule);
        return $user->ownsNote($schedule);
    }
}
