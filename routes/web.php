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
})->name('home');

Route::get('/connection', function(){
    return view('connection');
})->name('connection');

Route::get('/mentions-legales', function(){
    return view('mentions-legales');
})->name('mentions-legales');

Route::get('/register', function(){
    return view('register');
});

Route::get('/contact', function(){
    return view('contact');
})->name('contact');

Route::get('/boutique', 'ShopController@mainPage')->name('boutique');

Route::post('/produit/{id}', 'ShopController@getOneProduct');

Route::get('/espace-membre', function(){
    return view('espace-membre');
})->name('espace-membre');

Route::get('/events', function(){
    return view('events');
})->name('events');

Route::post('/add-user', 'UserController@addUser');

Route::post('/connect-user', 'UserController@connectUser');

Route::post('/user-update-password', 'UserController@updatePasswordUser');

Route::get('/disconnect', 'UserController@disconnectUser')->name('disconnect');

Route::post('/contact-mail', 'ContactController@mailTo');

Route::get('/insertProduct', 'ShopController@getInfoOnCategory');

Route::post('/insertDatabaseProduct', 'ShopController@insertProduct');