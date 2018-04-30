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

// Route::get('/d', ['middleware' => 'login'])->name('login');


Route::get('/', 'ContractController@login')->name('loginPage');
Route::post('/', 'ContractController@connect')->name('gestHeberg.login');

Route::group(['middleware' => 'admin'], function()
{
	Route::get('/contracts', 'ContractController@adminList')->name('contracts');
	Route::get('/contracts/newContract', 'ContractController@newContract')->name('newContract');
	Route::get('/contracts/newType', 'ContractController@newType')->name('newType');
	Route::get('/contracts/archives', 'ContractController@adminArchives')->name('archives');

	Route::post('/contracts/newContract', 'ContractController@createContract')->name('gestHeberg.newContract');
	Route::post('/contracts/newType', 'ContractController@createType')->name('gestHeberg.newType');


	Route::get('/support', 'ContractController@adminSupport')->name('support');
	Route::get('/support/message', 'ContractController@adminMessage')->name('message');

	Route::get('/users', 'ContractController@usersGest')->name('users');
	Route::get('/users/waitList', 'ContractController@waitList')->name('waitList');
});


Route::group(['middleware' => 'user'], function()
{
	Route::get('/contracts', 'ContractController@userList')->name('contracts');
	Route::get('/contracts/archives', 'ContractController@userArchives')->name('archives');

	Route::get('/support', 'ContractController@userSupport')->name('support');
	Route::get('/support/message', 'ContractController@userMessage')->name('message');
});





// Dans la section client rajouté une liste avec recherche pour modifier les clients choisi
// Les clients on accès : à leur contrat / l'envoie de message au SISR et le support Technique
// Pour les amendements (modification): le client propose et le SISR valide