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

Route::get('users/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('users/register', 'Auth\RegisterController@register')->name('register');
Route::get('users/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('users/login', 'Auth\LoginController@login')->name('login');

Route::post('users/logout', 'Auth\LoginController@logout')->name('logout');

Route::view('/', 'home')->name('page.home');
Route::view('about', 'about')->name('page.about');

Route::get('contact', 'TicketsController@create')->name('tickets.create');
Route::post('contact', 'TicketsController@store')->name('tickets.store');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['manager']], function() {

    Route::get('/', 'PagesController@home')->name('pages.home');

    // Ticket
    Route::name('tickets.')->group(function() {
        Route::get('tickets', 'TicketsController@index')->name('index');
        Route::get('ticket/{slug}', 'TicketsController@show')->name('show');
        Route::get('ticket/{slug}/edit', 'TicketsController@edit')->name('edit');
        Route::patch('ticket/{slug}/edit', 'TicketsController@update')->name('update');
        Route::delete('ticket/{slug}', 'TicketsController@destroy')->name('destroy');
    });

    Route::name('roles.')->group(function() {
      Route::get('roles', 'RolesController@index')->name('index');
      Route::get('roles/create', 'RolesController@create')->name('create');
      Route::post('roles/create', 'RolesController@store')->name('store');
    });

    Route::name('users.')->group(function() {
      Route::get('users', 'UsersController@index')->name('index');
      Route::get('users/{id}/edit', 'UsersController@edit')->name('edit');
      Route::post('users/{id}/edit','UsersController@update')->name('update');
    });

    Route::name('posts.')->group(function() {
      Route::get('posts', 'PostsController@index')->name('index');
      Route::get('posts/create', 'PostsController@create')->name('create');
      Route::post('posts/create', 'PostsController@store')->name('store');
      Route::get('posts/{id?}/edit', 'PostsController@edit')->name('edit');
      Route::post('posts/{id?}/edit','PostsController@update')->name('update');
    });

});



// Comment
Route::post('comment', 'CommentsController@newComment');
