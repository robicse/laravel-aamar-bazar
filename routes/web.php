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
Route::get('/about-us', 'Frontend\AboutController@About')->name('about-us');
Route::get('/contact', 'Frontend\AboutController@contact')->name('contact');
Route::get('/blog-list', 'Frontend\BlogController@index')->name('blog-list');
Route::get('/blog-details', 'Frontend\BlogController@details')->name('blog-details');

Route::post('/registration','Frontend\FrontendController@register')->name('user.register');
Route::get('/get-verification-code/{id}', 'Frontend\VerificationController@getVerificationCode')->name('get-verification-code');

//product
Route::get('/products/details/{slug}', 'Frontend\ProductController@ProductDetails')->name('product-details');
Route::post('/products/get/variant/price', 'Frontend\ProductController@ProductVariantPrice')->name('product.variant.price');
Route::post('/products/ajax/addtocart', 'Frontend\CartController@ProductAddCart')->name('product.add.cart');
Route::get('/product/clear/cart', 'Frontend\CartController@clearCart')->name('product.clear.cart');
Route::get('/product/remove/cart/{id}', 'Frontend\CartController@cartRemove')->name('product.cart.remove');
Route::post('/cart/quantity_update', 'Frontend\CartController@quantityUpdate')->name('qty.update');
//Shop/Vendor
Route::post('/shop/nearest/list', 'Frontend\ShopController@nearestshop')->name('shop.nearest');
Route::get('/become-a-vendor', 'Frontend\VendorController@index')->name('become-vendor');
Route::get('/shop/{slug}', 'Frontend\VendorController@singleshop')->name('shop.details');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth', 'user']], function () {
    //this route only for with out resource controller
    Route::get('/user/dashboard', 'User\DashboardController@index')->name('user.dashboard');
    Route::post('/user/dashboard/update', 'User\DashboardController@update')->name('user.profile-update');
    Route::get('/user/invoices', 'User\DashboardController@invoices')->name('user.invoices');
    Route::get('/user/notifications', 'User\DashboardController@notification')->name('user.notification');
    Route::get('/user/address', 'User\DashboardController@address')->name('user.address');
    Route::get('/user/order/history', 'User\DashboardController@orderHistory')->name('user.order.history');
    Route::get('/user/wishlist', 'User\DashboardController@wishlist')->name('user.wishlist');

    //this route only for resource controller
    Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'User',], function () {
        //Route::resource('products', 'ProductController');
    });

});
//Route::get('/vendor/dashboard', 'Vendor\DashboardController@index')->name('vendor.dashboard');

