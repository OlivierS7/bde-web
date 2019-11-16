<?php

use App\Mail\MailTrap;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Request;

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

Route::get('/produit/{id}', 'ShopController@getOneProduct')->name('produit');

Route::get('/events/{id}', 'EventController@getOneEvent')->name('event');

Route::get('/espace-membre', function(){
    return view('espace-membre');
})->name('espace-membre');

Route::post('/add-user', 'UserController@addUser');

Route::post('/connect-user', 'UserController@connectUser');

Route::post('/user-update-password', 'UserController@updatePasswordUser');

Route::get('/disconnect', 'UserController@disconnectUser')->name('disconnect');

Route::post('/contact-mail', function(){
    Mail::to('bde-cesi-saint-nazaire@viacesi.fr')->send(new MailTrap());
    return redirect()->to('contact');
});

Route::get('/insertProduct', 'ShopController@getInfoOnCategory');

Route::post('/insertDatabaseProduct', 'ShopController@insertProduct');

Route::get('/insertEvent', function(){
    return view('insertEvent');
});

Route::post('/insertDatabaseEvent', 'EventController@insertEvent');

Route::get('/events/{event_id}/inscription', 'EventController@inscription')->name('inscription');

Route::get('/events/{event_id}/deinscription', 'EventController@deinscription')->name('deinscription');

Route::get('/events/{event_id}/like', 'EventController@like')->name('like');

Route::get('/events/{event_id}/unlike', 'EventController@unlike')->name('unlike');

Route::post('/events/{event_id}/insertComment', 'EventController@insertComment')->name('insertComment');

Route::post('/events/comment', 'EventController@comment')->name('comment');

Route::post('/events/comments/{comment_id}/deleteComment', 'EventController@deleteComment')->name('deleteComment');


Route::get('/boutique/panier', 'CartController@index')->name('panier');

Route::post('/deleteProduct', 'ShopController@deleteProduct')->name('deleteProduct');

Route::post('/deleteEvent', 'EventController@deleteEvent')->name('deleteEvent');

Route::post('/ajouter/{id}', 'CartController@addProductToCart')->name('ajouter');

Route::get('/boutique/panier/delete/{id}', 'CartController@deleteProduct')->name('deleteFromCart');

Route::post('/boutique/panier/validate', 'CartController@validateCart')->name('validateCart');

Route::get('/boutique/produit/{id}', 'ShopController@getOneProduct')->name('boutique-produit');
Route::get('/productList', 'ShopController@listProduct');

Route::get('/download-images', 'ImageController@download');

Route::get('/sortDescPriceProduct', 'ShopController@sortDescPrice');
Route::get('/sortASCPriceProduct', 'ShopController@sortASCPrice');
Route::get('/sortCategoryProduct', 'ShopController@sortChoiceCategory');
Route::get('/CGV', function(){
    return view('CGV');
})->name('CGV');
