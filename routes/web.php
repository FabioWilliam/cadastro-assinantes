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

Route::redirect('/', '/home');
Auth::routes(['verify' => true]);

Route::delete('assinantes/batch', 'AssinanteController@batch')->name('assinantes.batch')->middleware('auth');
Route::resource('assinantes', 'AssinanteController')->middleware('verified');

Route::delete('assinaturas/batch', 'AssinaturaController@batch')->name('assinaturas.batch')->middleware('auth');
Route::resource('assinaturas', 'AssinaturaController')->middleware('verified');

Route::resource('revistas', 'RevistaController')->middleware('verified');
Route::get('enviar-email/{id}', 'MailerController@emailManutencao')->name('email.manutencao')->middleware('verified');


Route::get('/home', 'HomeController@index')->name('home');
