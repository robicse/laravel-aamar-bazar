<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin/login', 'Admin\AuthController@ShowLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\AuthController@LoginCheck')->name('admin.login.check');
Route::group(['as'=>'admin.','prefix' =>'admin','namespace'=>'Admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('roles','RoleController');
    Route::post('/roles/permission','RoleController@create_permission');
    Route::resource('staffs','StaffController');
    Route::resource('brands','BrandController');
    Route::resource('categories','CategoryController');
    Route::post('categories/is_home', 'CategoryController@updateIsHome')->name('categories.is_home');
    Route::resource('attributes','AttributeController');
    Route::resource('subcategories','SubcategoryController');
    Route::resource('sub-subcategories','SubSubcategoryController');
    Route::resource('products','ProductController');
    Route::get('products/slug/{name}','ProductController@ajaxSlugMake')->name('products.slug');
    Route::post('products/get-subcategories-by-category','ProductController@ajaxSubCat')->name('products.get_subcategories_by_category');
    Route::post('products/get-subsubcategories-by-subcategory','ProductController@ajaxSubSubCat')->name('products.get_subsubcategories_by_subcategory');
    Route::post('products/sku_combination','ProductController@sku_combination')->name('products.sku_combination');
    Route::post('products/todays_deal', 'ProductController@updateTodaysDeal')->name('products.todays_deal');
    Route::post('products/published/update', 'ProductController@updatePublished')->name('products.published');
    Route::post('products/featured/update', 'ProductController@updateFeatured')->name('products.featured');
    Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');
    Route::resource('sellers','SellerController');
    Route::post('sellers/verification','SellerController@verification')->name('seller.verification');
    Route::get('sellers/commission/form','SellerController@commissionForm')->name('seller.commission.form');
    Route::put('sellers/commission/update/{id}','SellerController@commissionStore')->name('seller.commission.update');
    Route::get('sellers/payment/history','SellerController@paymentHistory')->name('seller.payment.history');
    Route::get('sellers/withdraw/request','SellerController@withdrawRequest')->name('seller.withdraw.request');
    Route::get('sellers/profile/show/{id}','SellerController@profileShow')->name('seller.profile.show');
    Route::put('sellers/profile/update/{id}','SellerController@updateProfile')->name('seller.profile.update');
    Route::put('sellers/password/update/{id}','SellerController@updatePassword')->name('seller.password.update');
    Route::put('sellers/bankinfo/update/{id}','SellerController@bankInfoUpdate')->name('seller.bankinfo.update');
    Route::post('/sellers/payment_modal', 'SellerController@payment_modal')->name('sellers.payment_modal');
    Route::post('/sellers/withdraw_payment_modal', 'SellerController@withdraw_payment_modal')->name('sellers.withdraw_payment_modal');
    Route::post('/sellers/commission_modal', 'SellerController@commission_modal')->name('sellers.commission_modal');
    Route::put('/sellers/individual/commission/set/{id}', 'SellerController@individulCommissionSet')->name('seller.individual.commission.set');
    Route::post('/sellers/pay_to_seller_commission', 'SellerController@pay_to_seller_commission')->name('seller.commissions.pay_to_seller');
//    Route::get('/sellers/order_management', 'SellerController@order_management')->name('sellers.order_management');
});
