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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Auth::routes();

//facebook login
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::middleware(['moderator'])->group(function () {
    Route::resource('nominationUsers', 'NominationUserController');

    Route::get('users', 'UserController@index');
    Route::delete('users/{user}', 'UserController@destroy');
    Route::get('users/{user}/edit', 'UserController@edit');
    Route::match(['put', 'patch'], 'users/{user}', 'UserController@update');

    Route::get('categories/{category}/edit', 'CategoryController@edit');
    Route::match(['put', 'patch'], 'categories/{category}', 'CategoryController@update');
    Route::delete('categories/{category}', 'CategoryController@destroy');
    Route::get('categories/create', 'CategoryController@create');
    Route::post('categories', 'CategoryController@store');

    Route::get('nominations/{nomination}/edit', 'NominationController@edit');
    Route::match(['put', 'patch'], 'nominations/{nomination}', 'NominationController@update');
    Route::delete('nominations/{nomination}', 'NominationController@destroy');

    Route::get('votings/{voting}/edit', 'VotingController@edit');
    Route::match(['put', 'patch'], 'votings/{voting}', 'VotingController@update');
    Route::delete('votings/{voting}', 'VotingController@destroy');

    Route::resource('categories', 'CategoryController');
    Route::resource('nominations', 'NominationController');
    Route::resource('votings', 'VotingController');

    Route::middleware('admin')->group(function () {
        Route::resource('roles', 'RoleController');
        Route::resource('settings', 'SettingController');
        Route::resource('users', 'UserController');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::resource('categories', 'CategoryController');
    Route::resource('nominations', 'NominationController');
    Route::resource('votings', 'VotingController');
    Route::resource('users', 'UserController');
});
