<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Http\Resources\UserResource;

class RegisterController extends Controller
{
    public function action(Request $request, User $user)
    {
        $this->validate($request, [
            'name'          => 'required|min:3',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:8',
            'alamat'        => 'required',
            'date_of_birth' => 'required|date',
        ]);

       $user = $user->create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'alamat'        => $request->alamat,
            'date_of_birth' => $request->date_of_birth,
            'api_token'     => Str::random(80),
        ]);

        // return new UserResource($user);
        // return response()->json($user);
        return (new UserResource($user))->additional([
            'meta'  =>  [
                'api_token' =>  $user->api_token,
            ],
        ]);
    }
}
