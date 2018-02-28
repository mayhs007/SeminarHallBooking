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
Route::group(['middleware' => 'auth.redirect_admin'], function(){
    Route::get( '/', ['as' => 'user_pages.home', 'uses' => 'PagesController@home'])->middleware('guest');
    Route::get('home', ['as' => 'user_pages.home', 'uses' => 'PagesController@home']);
    Route::get('hall', ['as' => 'user_pages.hall', 'uses' => 'PagesController@hall']);
    Route::get('book', ['as' => 'user_pages.book', 'uses' => 'PagesController@book']);
    Route::group(['prefix' => 'book'], function(){
        Route::post('register', ['as' => 'user_pages.register', 'uses' => 'PagesController@register']);
        Route::get('register', ['as' => 'user_pages.register', 'uses' => 'PagesController@register']);
    });


});


Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function(){
    // Login routes
    Route::get('login', ['as' => 'auth.login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('login', 'LoginController@login');
    // Logout route
    Route::get('logout', ['as' => 'auth.logout', 'uses' => 'LoginController@logout']);
    // Registration routes
    Route::get('register', ['as' => 'auth.register', 'uses' => 'RegisterController@showRegistrationForm']);
    Route::post('register', 'RegisterController@register');
    Route::get('change-password', ['as' => 'auth.changePassword', 'uses' => 'PasswordController@showChangePassword']);
    Route::post('change-password', ['uses' => 'PasswordController@changePassword']);
    
});
//Admin
Route::group(['prefix' => 'admin', 'as' => 'admin::', 'middleware' => ['auth','auth.admin:']], function(){
    Route::resource('clubs', 'ClubsController', ['except' => 'show']);   
    Route::resource('events', 'EventsController', ['except' => 'show']);   
    Route::resource('halls',  'HallsController', ['except' => 'show']);
    Route::resource('users',  'UsersController', ['except' => 'show']);
    Route::get('/', ['as' => 'root', 'uses' => 'AdminPagesController@root']);  
   
});

 
