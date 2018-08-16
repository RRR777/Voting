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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

//facebook login
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::middleware('moderator')->group(function () {
    Route::resource('nominationUsers', 'NominationUserController');

    Route::get('users', 'UserController@index');
    Route::delete('users/{user}', 'UserController@destroy');
    Route::put('users/{user}', 'UserController@update');
    Route::patch('users/{user}', 'UserController@update');

    Route::put('categories/{category}', 'CategoryController@update');
    Route::patch('categories/{category}', 'CategoryController@update');
    Route::delete('categories/{category}', 'CategoryController@destroy');
    Route::get('categories/create', 'CategoryController@create');
    Route::post('categories', 'CategoryController@store');

    Route::put('nominations/{nomination}', 'NominationController@update');
    Route::patch('nominations/{nomination}', 'NominationController@update');
    Route::delete('nominations/{nomination}', 'NominationController@destroy');

    Route::middleware(['admin'])->group(function () {
        Route::resource('roles', 'RoleController');
        Route::resource('settings', 'SettingController');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::resource('categories', 'CategoryController');
    Route::resource('nominations', 'NominationController');
    Route::resource('votings', 'VotingController');
    Route::resource('users', 'UserController');
});
