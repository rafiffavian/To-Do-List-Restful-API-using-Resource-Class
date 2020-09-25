<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('todolist/register', 'Api\RegisterController@action');
Route::post('todolist/login', 'Api\LoginController@action');
Route::get('todolist/profile', 'Api\UserController@action')->middleware('auth:api');
Route::post('todolist/store', 'Api\NoteController@action')->middleware('auth:api');
Route::get('todolist/index', 'Api\NoteController@index')->middleware('auth:api');
Route::get('todolist/detailnote/{note}', 'Api\NoteController@show')->middleware('auth:api');
Route::put('todolist/update/{note}', 'Api\NoteController@update')->middleware('auth:api');
Route::get('todolist/usernot/{user}', 'Api\UserController@show')->middleware('auth:api');
Route::delete('todolist/delete/{schedule}', 'Api\NoteController@destroy')->middleware('auth:api');
