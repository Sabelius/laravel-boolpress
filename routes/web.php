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

// Route::get('/', function () {
//     return view('guests.home');
// });

Route::get('/home', 'HomeController@index')->name('guests.home');
Route::get('/contatti', 'HomeController@getContactForm')->name('guests.contact');
Route::post('/contatti', 'HomeController@contactFormHandler')->name('guests.sender');
Route::get('/thanks', 'HomeController@contactFormEnder')->name('guests.thanks');

Auth::routes();

Route::middleware("auth")
->namespace("Admin")
->name("admin.")
->prefix("admin")
->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource("posts", PostController::class);
    Route::resource("users", UserController::class);
});


Route::get("{any?}", function(){
    return view('guests.home');
})->where("any", ".*");