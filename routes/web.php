<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', '\App\Http\Controllers\FrontEndController@index');
Route::get('/{locale}', '\App\Http\Controllers\FrontEndController@locale');

Route::get('/{locale}/{slug}', '\App\Http\Controllers\FrontEndController@page');
Route::get('/{locale}/xeberler/{slug}', '\App\Http\Controllers\FrontEndController@blog');
Route::get('/{locale}/{parent}/{slug}', '\App\Http\Controllers\FrontEndController@child');

Route::post('/contact', '\App\Http\Controllers\FormController@sendEmail')->name('send.email');
