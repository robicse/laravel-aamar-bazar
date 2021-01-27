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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
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

Route::post('/login','Api\AuthController@login');
Route::post('/register','Api\AuthController@register');
Route::post('/seller/register','Api\AuthController@sellerRegister');

