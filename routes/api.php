<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('/user/profile/update', 'Api\CustomerController@profileUpdate');
    Route::post('/user/password/update', 'Api\CustomerController@passwordUpdate');
    Route::get('/user/address', 'Api\AddressController@index');
    Route::post('/user/address/add', 'Api\AddressController@store');
    Route::post('/user/address/set-default/{id}', 'Api\AddressController@setDefault');
    Route::delete('/user/address/delete/{id}', 'Api\AddressController@destroy');
    Route::post('/user/address/update', 'Api\CustomerController@addressUpdate');
    Route::get('/user/wishlist', 'Api\CustomerController@wishlist');
    Route::post('/add/wishlist/{id}', 'Api\CustomerController@wishlistAdd' );
    Route::delete('/remove/wishlist/{id}', 'Api\CustomerController@wishlistRemove' );
    Route::get('/orders', 'Api\OrderController@order_get');
    Route::post('/order/details/{id}', 'Api\OrderController@order_details_get');
    Route::post('/order/submit', 'Api\OrderController@orderSubmit');

    //Seller
    Route::get('/seller/dashboard', 'Api\SellerController@dashboard');
    Route::get('/seller/info', 'Api\SellerController@profile');
    Route::post('/seller/profile-update', 'Api\SellerController@profileUpdate');
    Route::post('/seller/password-update', 'Api\SellerController@passwordUpdate');
    Route::post('/seller/bank-details-update', 'Api\SellerController@bankDetailsUpdate');
    Route::post('/seller/nid-info-update', 'Api\SellerController@nidInfoUpdate');
    Route::get('/seller/shop/info', 'Api\SellerController@shopInfo');
    Route::post('/seller/shop/info-update', 'Api\SellerController@shopInfoUpdate');
});


Route::get('/brands','Api\BrandController@getBrands');
Route::get('/categories','Api\CategoryController@getCategories');
Route::get('/subcategories','Api\SubcategoryController@getSubcategories');
Route::get('/shops','Api\ShopController@getShop');
Route::get('/shops/lat/{lat}/lng/{lng}','Api\ShopController@getShopByLatLng');
Route::get('/sellers','Api\SellerController@getSellers');
Route::get('/shop-categories','Api\ShopCategoryController@getShopCategories');
Route::get('/shop-subcategories','Api\ShopSubcategoryController@getShopSubcategories');
Route::get('/shop-brands','Api\ShopBrandController@getShopBrands');
Route::get('/sliders','Api\SliderController@getSliders');
Route::get('/featured-products/{id}','Api\ProductController@getFeaturedProducts');
Route::get('/shop-categories/{id}','Api\ShopCategoryController@getShopCategory');
Route::get('/todays-deal-products/{id}','Api\ProductController@getTodaysDeal');
Route::get('/best-sales-products/{id}','Api\ProductController@getBestSales');
Route::get('/flash-deals-products/{id}','Api\ProductController@getFlashDeals');
Route::get('/related-products/{id}','Api\ProductController@getRelatedProducts');
Route::post('/search/product', 'Api\ProductController@search_product');
Route::get('/category/featured-products/{id}', 'Api\CategoryController@categoryProducts');
Route::get('/category/all-products/{id}', 'Api\CategoryController@categoryAllProducts');

Route::post('/login','Api\AuthController@login');
Route::post('/register','Api\AuthController@register');
Route::post('/seller/register','Api\AuthController@sellerRegister');

//Customer Api
//Route::post('/user/profile/update', 'Api\CustomerController@profileUpdate')->middleware('auth:api');


