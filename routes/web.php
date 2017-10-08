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

date_default_timezone_set('America/Sao_Paulo');

Auth::routes();

Route::group(['middleware' => ['auth']], function()
{
    Route::resource('/painel', 'ClienteController');

    Route::get('/', 'ClienteController@index')->name('index');

    Route::post('/painel/{id}', 'ClienteController@alterarStatus')->name('alterarStatus');

    Route::get('/admin', 'UserController@edit')->name('admin-edit');
    
    Route::post('/admin', 'UserController@update')->name('admin-update');
});
