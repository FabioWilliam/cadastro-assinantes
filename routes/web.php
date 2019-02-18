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

Route::redirect('/', 'assinantes');
Route::resource('assinantes', 'AssinanteController');
Route::resource('revistas', 'RevistaController');
Route::post('excluir-assinantes', function ()
    {
        return 'Destroy Batch';
    }
);
