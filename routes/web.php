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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'Frontend\FrontendController@index')->name('index');
Route::get('/shopping-cart', 'Frontend\CartController@viewCart')->name('shopping-cart');
Route::get('/checkout', 'Frontend\CartController@checkout')->name('checkout');
Route::get('/shop', 'Frontend\ShopController@shop')->name('shop');
Route::get('/product-details', 'Frontend\ProductController@ProductDetails')->name('product-details');
Route::get('/become-a-vendor', 'Frontend\VendorController@index')->name('become-vendor');
Route::get('/vendor-store', 'Frontend\VendorController@store')->name('vendor-store');
Route::get('/about-us', 'Frontend\AboutController@About')->name('about-us');
Route::get('/contact', 'Frontend\AboutController@contact')->name('contact');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth', 'admin']], function () {
    //this route only for with out resource controller
    Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');

    //this route only for resource controller
    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin',], function () {
        //Route::resource('products', 'ProductController');
    });

});

Route::group(['middleware' => ['auth', 'user']], function () {
    //this route only for with out resource controller
    Route::get('/user/dashboard', 'User\DashboardController@index')->name('user.dashboard');

    //this route only for resource controller
    Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'User',], function () {
        //Route::resource('products', 'ProductController');
    });

});
