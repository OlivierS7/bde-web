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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
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

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/boutique', function(){
    return view('boutique');
});

Route::get('/espace-membre', function(){
    return view('espace-membre');
});

Route::get('/events', function(){
    return view('events');
});

Route::post('/add-user', 'UserController@addUser');

Route::post('/connect-user', 'UserController@connectUser');

Route::post('/user-update-password', 'UserController@updatePasswordUser');

Route::get('/disconnect', 'UserController@disconnectUser');

Route::post('/contact-mail', 'ContactController@mailTo');
