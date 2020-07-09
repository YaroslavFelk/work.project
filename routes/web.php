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

Route::get('/aa', function () {
    return view('test');
});

Route::get('/', 'VkController@index');

Route::get('/company', 'VkController@company');

Route::get('/demographic', 'VkController@data');
