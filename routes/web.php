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

Route::get('/events', 'EventController@mainPage')->name('events');

Route::post('/produit/{id}', 'ShopController@getOneProduct')->name('produit');

Route::post('/events/{id}', 'EventController@getOneEvent')->name('event');

Route::get('/espace-membre', function(){
    return view('espace-membre');
})->name('espace-membre');

Route::post('/add-user', 'UserController@addUser');

Route::post('/connect-user', 'UserController@connectUser');

Route::post('/user-update-password', 'UserController@updatePasswordUser');

Route::get('/disconnect', 'UserController@disconnectUser')->name('disconnect');

Route::post('/contact-mail', 'ContactController@mailTo');

Route::get('/insertProduct', 'ShopController@getInfoOnCategory');

Route::post('/insertDatabaseProduct', 'ShopController@insertProduct');

Route::get('/insertEvent', function(){
    return view('insertEvent');
});

Route::post('/insertDatabaseEvent', 'EventController@insertEvent');

Route::get('/boutique/panier', 'CartController@index');

Route::post('/deleteProduct', 'ShopController@deleteProduct')->name('deleteProduct');

Route::post('/deleteEvent', 'EventController@deleteEvent')->name('deleteEvent');

Route::post('/ajouter/{id}', 'CartController@addProductToCart')->name('ajouter');

Route::post('/boutique/panier/validate', 'CartController@validateCart')->name('validateCart');
