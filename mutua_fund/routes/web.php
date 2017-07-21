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

//Route::get('/', function () {
   // return view('welcome');
//});

Route::get('/','InvestmentsController@index')->name('home');
Route::post('/','InvestmentsController@search');
Route::post('/detail','InvestmentsController@details_of_fund');
Route::post('/investment','InvestmentsController@store');

Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');

Route::get('/login','SessionController@create');
Route::post('/login','SessionController@store');


Route::get('/logout','SessionController@destroy');