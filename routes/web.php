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

Route::get('/', 'ContractController@login')->name('login');

Route::post('/', 'ContractController@connect')->name('gestHeberg.login');


Route::get('/contracts', 'ContractController@index')->name('contracts');
Route::get('/contracts/newContract', 'ContractController@newContract')->name('newContract');
Route::get('/contracts/newType', 'ContractController@newType')->name('newType');
Route::get('/contracts/old', 'ContractController@old')->name('archives');

Route::post('/contracts/newContract', 'ContractController@createContract')->name('gestHeberg.newContract');
Route::post('/contracts/newType', 'ContractController@createType')->name('gestHeberg.newType');


Route::get('/support', 'ContractController@support')->name('support');
Route::get('/support/message', 'ContractController@message')->name('message');


Route::get('/users', 'ContractController@users')->name('users');
Route::get('/users/waitList', 'ContractController@waitList')->name('waitList');



// Dans la section client rajouté une liste avec recherche pour modifier les clients choisi
// Les clients on accès : à leur contrat / l'envoie de message au SISR et le support Technique
// Pour les amendements (modification): le client propose et le SISR valide