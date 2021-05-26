<?php

use Illuminate\Support\Facades\Route;

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
});

Auth::routes();
Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');

    //Users
    Route::post('users/store', 'UsersController@store')->name('Users.store');
	Route::get('users', 'UsersController@index')->name('Users');
	Route::get('users/create', 'UsersController@create')->name('Users.create');
	Route::put('users/{id}', 'UsersController@update')->name('Users.update');
	Route::get('users/{id}', 'UsersController@show')->name('Users.show');
	Route::delete('users/{id}', 'UsersController@destroy')->name('Users.destroy');
	Route::get('users/{id}/edit', 'UsersController@edit')->name('Users.edit');

    //Cities
    Route::post('cities/store', 'CitiesController@store')->name('Cities.store');
	Route::get('cities', 'CitiesController@index')->name('Cities');
	Route::get('cities/create', 'CitiesController@create')->name('Cities.create');
	Route::put('cities/{id}', 'CitiesController@update')->name('Cities.update');
	Route::get('cities/{id}', 'CitiesController@show')->name('Cities.show');
	Route::delete('cities/{id}', 'CitiesController@destroy')->name('Cities.destroy');
	Route::get('cities/{id}/edit', 'CitiesController@edit')->name('Cities.edit');

    //Clients
    Route::post('clients/store', 'ClientsController@store')->name('Clients.store');
	Route::get('clients', 'ClientsController@index')->name('Clients');
	Route::get('clients/create', 'ClientsController@create')->name('Clients.create');
	Route::put('clients/{id}', 'ClientsController@update')->name('Clients.update');
	Route::get('clients/{id}', 'ClientsController@show')->name('Clients.show');
	Route::delete('clients/{id}', 'ClientsController@destroy')->name('Clients.destroy');
	Route::get('clients/{id}/edit', 'ClientsController@edit')->name('Clients.edit');
});
