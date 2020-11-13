<?php

use Illuminate\Support\Facades\Route;



Route::get('/','FrontController@index');
Route::get('/today-all-match/{id}','FrontController@todayAllMatch')->name('today.all.match');


Route::get('/live/{id}','LiveController@live')->name('live');
Route::post('/stripe-payment','PaymentController@payment')->name('stripe.payment');
Route::get('/profile','HomeController@profile')->name('profile');
Route::post('/update-user-password','HomeController@updatePassword')->name('update.user.password');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin

Route::prefix('/admin')->group(function () {
	//admin auth routes start
	Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
   	Route::post('/login', 'Backend\Auth\LoginController@login');
   	Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/admin-change-password', 'AdminController@changePassword')->name('admin.change.password');
    Route::post('/update-change-password', 'AdminController@updatePassword')->name('update.admin.password');

   	Route::post('/logout', 'AdminController@logout')->name('admin.logout');
   	Route::get('/password/reset', 'Backend\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
   	Route::post('/password/email', 'Backend\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
   	Route::get('/password/reset/{token}', 'Backend\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
   	Route::post('/password/reset', 'Backend\Auth\ResetPasswordController@reset')->name('admin.password.update');
   	//admin auth ends here


    //category
    Route::get('/all-category','Backend\CategoryController@index')->name('all.category');
    Route::get('/add-category','Backend\CategoryController@create')->name('add.category');
    Route::post('/store-category','Backend\CategoryController@store')->name('store.category');
    Route::get('/edit-category/{id}','Backend\CategoryController@edit')->name('edit.category');
    Route::post('/update-category/{id}','Backend\CategoryController@update')->name('update.category');
    Route::get('/delete-category/{id}','Backend\CategoryController@delete')->name('delete.category');

    //match
    Route::get('/today-match','Backend\MatchController@today')->name('today.match');
    Route::get('/tomorrow-match','Backend\MatchController@tomorrow')->name('tomorrow.match');
    Route::get('/yesterday-match','Backend\MatchController@yesterday')->name('yesterday.match');
    Route::get('/to-be-deleted-match','Backend\MatchController@toBeDeletedMatch')->name('to.be.deleted.match');
    Route::get('/add-match','Backend\MatchController@create')->name('add.match');
    Route::post('/store-match','Backend\MatchController@store')->name('store.match');
    Route::get('/edit-match/{id}','Backend\MatchController@edit')->name('edit.match');
    Route::post('/update-match/{id}','Backend\MatchController@update')->name('update.match');
    Route::get('/delete-match/{id}','Backend\MatchController@delete')->name('match.delete');
    Route::get('/change-match-status/{status}/{id}','Backend\MatchController@changeStatus')->name('change.match.status');


    //price plan
    Route::get('/all-price-plan','Backend\PriceController@index')->name('all.price');
    Route::get('/add-price-plan','Backend\PriceController@create')->name('add.price');
    Route::post('/store-price-plan','Backend\PriceController@store')->name('store.price');
    Route::get('/edit-price-plan/{id}','Backend\PriceController@edit')->name('edit.price');
    Route::post('/update-price-plan/{id}','Backend\PriceController@update')->name('update.price');
    Route::get('/delete-price-plan/{id}','Backend\PriceController@delete')->name('price.delete');

    Route::get('/all-user','AdminController@allUser')->name('all.user');
    Route::get('/all-payment','AdminController@allPayment')->name('all.payment');
});