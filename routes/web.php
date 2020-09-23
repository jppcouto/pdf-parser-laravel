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

Route::get('/db', 'DBController@db')->name('db');

//carregamento do pdf
Route::get('/', 'UploadController@uploadForm');
Route::post('/', 'UploadController@uploadFile')->name('uploadFile');

//adicionar pdf para a BD
Route::get('insert','InsertController@insertform');
Route::post('create','InsertController@insert');
