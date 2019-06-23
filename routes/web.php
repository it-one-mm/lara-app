<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home');
Route::view('about', 'about');
// Ticket
Route::get('contact', 'TicketsController@create');
Route::post('contact', 'TicketsController@store');
Route::get('tickets', 'TicketsController@index');
Route::get('ticket/{slug}', 'TicketsController@show');
Route::get('ticket/{slug}/edit', 'TicketsController@edit');
Route::patch('ticket/{slug}/edit', 'TicketsController@update');
Route::delete('ticket/{slug}', 'TicketsController@destroy');
// Comment
Route::post('comment', 'CommentsController@newComment');




