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

Route::get('/', function () {
    return view('test');
});

Route::get('/connection', function(){
    return view('connection');
});

Route::get('/mentions-legales', function(){
    return view('mentions-legales');
});

Route::get('/register', function(){
    return view('register');
});
