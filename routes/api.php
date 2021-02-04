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

Route::group(['middleware' => ['auth:api', 'user']], function () {
    Route::post('/user/profile/update', 'Api\CustomerController@profileUpdate');
    Route::post('/user/password/update', 'Api\CustomerController@passwordUpdate');
    Route::get('/user/address', 'Api\CustomerController@address');
    Route::post('/user/address/update', 'Api\CustomerController@addressUpdate');
    Route::get('/user/wishlist', 'Api\CustomerController@wishlist');
    Route::post('/add/wishlist/{id}', 'Api\CustomerController@wishlistAdd' );
    Route::delete('/remove/wishlist/{id}', 'Api\CustomerController@wishlistRemove' );
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
Route::get('/search/product', 'Api\ProductController@search_product');

Route::post('/login','Api\AuthController@login');
Route::post('/register','Api\AuthController@register');
Route::post('/seller/register','Api\AuthController@sellerRegister');

//Customer Api
//Route::post('/user/profile/update', 'Api\CustomerController@profileUpdate')->middleware('auth:api');


