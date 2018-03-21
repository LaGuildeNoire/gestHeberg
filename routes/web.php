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
Route::get('/contracts', 'ContractController@index')->name('contracts');
Route::get('/support', 'ContractController@support')->name('support');
Route::get('/users', 'ContractController@users')->name('users');


Route::post('/', 'ContractController@connect')->name('gestHeberg.login');

// Dans la section client rajouté une liste avec recherche pour modifier les clients choisi
// Les clients on accès : à leur contrat / l'envoie de message au SISR et le support Technique
// Pour les amendements (modification): le client propose et le SISR valide