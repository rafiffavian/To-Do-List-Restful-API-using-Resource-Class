<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('todolist/register', 'Api\RegisterController@action');
Route::post('todolist/login', 'Api\LoginController@action');
Route::get('todolist/profile', 'Api\UserController@action')->middleware('auth:api');
Route::post('todolist/store', 'Api\NoteController@action')->middleware('auth:api');
