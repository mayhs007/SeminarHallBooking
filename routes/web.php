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
    Route::get( '/', ['as' => 'user_pages.root', 'uses' => 'PagesController@root']);
    Route::get('home', ['as' => 'user_pages.home', 'uses' => 'PagesController@home']);
    Route::get('hall', ['as' => 'user_pages.hall', 'uses' => 'PagesController@hall']);
    Route::get('book', ['as' => 'user_pages.book', 'uses' => 'PagesController@book']);
    Route::group(['prefix' => 'book'], function(){
        Route::post('register', ['as' => 'user_pages.register', 'uses' => 'PagesController@register']);
        Route::get('register', ['as' => 'user_pages.register', 'uses' => 'PagesController@register']);
     
    });
    Route::get('bookings', ['as' => 'user_pages.bookings', 'uses' => 'PagesController@bookings']);
    Route::post('bookings', ['as' => 'user_pages.bookings', 'uses' => 'PagesController@bookings']);
    Route::post('unregister', ['as' => 'user_pages.unregister', 'uses' => 'PagesController@unregister']);
    Route::get('unregister', ['as' => 'user_pages.unregister', 'uses' => 'PagesController@unregister']);
    Route::post('register_edit', ['as' => 'user_pages.register_edit', 'uses' => 'PagesController@register_edit']);
    Route::get('register_edit', ['as' => 'user_pages.register_edit', 'uses' => 'PagesController@register_edit']);
    Route::post('suggestions', ['as' => 'user_pages.suggestion', 'uses' => 'PagesController@suggestion']);
    Route::get('suggestions', ['as' => 'user_pages.suggestion', 'uses' => 'PagesController@suggestion']);
    Route::post('registration', ['as' => 'user_pages.registration', 'uses' => 'PagesController@registration']);
    Route::get('registration', ['as' => 'user_pages.registration', 'uses' => 'PagesController@registration']);
    


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
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');
});
//Admin
Route::group(['prefix' => 'admin', 'as' => 'admin::', 'middleware' => ['auth','auth.admin:']], function(){
    Route::resource('clubs', 'ClubsController', ['except' => 'show']);   
    Route::resource('events', 'EventsController', ['except' => 'show']);   
    Route::resource('halls',  'HallsController', ['except' => 'show']);
    Route::resource('users',  'UsersController', ['except' => 'show']);
    Route::get('get_admins', ['as' =>'admins', 'uses' => 'HallsController@getAdmins']);
    Route::get('/', ['as' => 'root', 'uses' => 'AdminPagesController@root']);  
    Route::post('registration', ['as' => 'admin_pages.registrations', 'uses' => 'AdminPagesController@registrations']);
    Route::get('registration', ['as' => 'admin_pages.registrations', 'uses' => 'AdminPagesController@registrations']);
   
});

 
