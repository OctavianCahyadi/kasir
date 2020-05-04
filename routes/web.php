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
    return redirect('/dashboard-admin');
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::group(['middleware'=>'auth'],function(){
    Route::group(['middleware'=>'is_kasir'],function(){
        Route::get('/dashboard-kasir','PageController@kasir')->name('dashboard-kasir');
    });
    Route::group(['middleware'=>'is_admin'],function(){
        Route::get('/dashboard-admin','PageController@dashboardadmin')->name('dashboard-admin');
        Route::resource('/kategori', 'CategoryController')->except([
            'create', 'show'
        ]);
        Route::resource('/produk', 'ProductController');
    });
});