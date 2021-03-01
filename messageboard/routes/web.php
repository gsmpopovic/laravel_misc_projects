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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MessageController;

Route::get('/', 'HomeController@index' );
Route::get('/about', 'AboutController@about' );

Route::post('/create', 'MessageController@create' );

Route::get('/Message/{id}', 'MessageController@view' );

