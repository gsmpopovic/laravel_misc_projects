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

// Pass a list of pizzas to a user from our DB
Route::get('/pizzas', function () {
    // $pizzas = ['hawaiian'=>['name'=>'hawaiian', 'base'=>'thin-crust', 'toppings'=>['cheese', 'pineapple']]];
   $pizzas =[
       ['type'=>'Hawaiian', 'base'=>'Cheesy crust'],
       ['type'=>'Hawaiian', 'base'=>'Cheesy crust'], 
       ['type'=>'Hawaiian', 'base'=>'Cheesy crust']
   ];
    return view('pizzas', ['pizzas'=>$pizzas]);
});

Route::get('/users', function () {
    return view('users');
});

Route::get('/locations', function () {
    $locations=['locations'=>['A', 'B', 'C', 'D', 'E']];
    return view('locations', ['locations'=>$locations]);
});