<?php

use Illuminate\Support\Facades\Route;

use App\Mail\NewUserWelcomeMail;

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





Auth::routes();


Route::get('/email', function(){

	return new NewUserWelcomeMail();
});

//follow me route for axios

Route::post('follow/{user}', 'FollowsController@store'
);

Route::get('/', 'PostsController@index'); //to view all the post



Route::get('/p/create','PostsController@create');
Route::get('/p/{post}','PostsController@show');
Route::get('/p/{post}/edit','PostsController@show');
Route::post('/p','PostsController@store');


//Profile
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');


//contact
route::get('contact', 'ContactsController@create')->name('contact.create');
route::post('contact', 'ContactsController@store')->name('contact.store');


//About
route::view('about','about');

//services
route::view('services','services');