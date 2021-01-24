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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['namespace'=>'Admin','prefix' => 'admin'], function () {
    Route::get('/login','LoginController@showLoginForm')->name('admin.login');
    Route::post('/login','LoginController@login')->name('admin.login');

    Route::post('/logout','LoginController@logout')->name('admin.logout');
    Route::get('/home','HomeController@index')->name('admin.home');

    
    Route::get('/view', 'HomeController@view')->name('admin.view');
    Route::get('/add', 'HomeController@add')->name('admin.add');
    Route::post('/store', 'HomeController@store')->name('admin.store');
    Route::get('/edit/{id}', 'HomeController@edit')->name('admin.edit');
    Route::post('/update/{id}', 'HomeController@update')->name('admin.update');
    Route::get('/delete/{id}', 'HomeController@delete')->name('admin.delete');


    
    Route::get('/view/customer', 'HomeController@customerView')->name('admin.customer.view');
    Route::get('/delete/customer/{id}', 'HomeController@customerDelete')->name('admin.customer.delete');
    Route::delete('/delete/customer', 'HomeController@deleteCheckAll')->name('admin.customer.delete');




});

Route::group(['namespace'=>'Customer','prefix' => 'customer'], function () {
    Route::get('/login','LoginController@showLoginForm')->name('customer.login');
    Route::post('/login','LoginController@login')->name('customer.login');

    Route::post('/logout','LoginController@logout')->name('customer.logout');
    Route::get('/home','HomeController@index')->name('customer.home');


    Route::get('/view', 'HomeController@view')->name('customer.view');
    Route::get('/add', 'HomeController@add')->name('customer.add');
    Route::post('/store', 'HomeController@store')->name('customer.store');
    Route::get('/edit/{id}', 'HomeController@edit')->name('customer.edit');
    Route::post('/update/{id}', 'HomeController@update')->name('customer.update');
    Route::get('/delete/{id}', 'HomeController@delete')->name('customer.delete');


    Route::get('/zip', 'ZipController@zipCreateAdnDownload')->name('customer.zip');


});





