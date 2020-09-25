<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function action()
    {
        $user = auth()->user();

        return new UserResource($user);
    }

    public function show(User $user)
    {
        // dd($user);
        return new UserResource($user);
    }
}
