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
//     return view('welcome');
// });

Route::get('login', 'AuthController@login')->name('login');
Route::post('login', 'AuthController@postLogin')->name('post.login');

Route::middleware('auth')->group(function (){
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('/product/search', 'ProductController@search')->name('product.search');
    Route::get('/product/{id}/gallery', 'ProductController@gallery')->name('product.gallery');
    Route::post('/products/getproduct', 'ProductController@getProducts')->name('product.getproducts');
    Route::resource('product', 'ProductController');


    Route::resource('product-gallery', 'ProductGalleryController');

    // logout
    Route::post('logout', 'AuthController@logout')->name('logout');
});


// Route::get('/home', 'HomeController@index')->name('home');
    // Auth::routes([
    //     'register' => false
    // ]);