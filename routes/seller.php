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

Route::get('be-a-seller', 'Seller\AuthController@ShowRegForm')->name('seller.registration');
Route::post('be-a-seller/store', 'Seller\AuthController@store')->name('seller.registration.store');
//Route::post('/admin/login', 'Admin\AuthController@LoginCheck')->name('admin.login.check');
Route::group(['as'=>'seller.','prefix' =>'seller', 'middleware' => ['auth', 'seller']], function(){
    Route::get('dashboard','Seller\DashboardController@index')->name('dashboard');

    Route::resource('products','Seller\ProductController');
    Route::resource('shop','Seller\ShopController');

    Route::get('profile','Seller\ProfileController@profile')->name('profile.index');
    Route::post('profile/update','Seller\ProfileController@profile_update')->name('profile.update');
    Route::get('password','Seller\ProfileController@password')->name('password.edit');
    Route::post('password/update','Seller\ProfileController@password_update')->name('password.update');
    Route::get('payment/settings','Seller\ProfileController@payment')->name('payment.settings');
    Route::post('payment/update','Seller\ProfileController@payment_update')->name('payment.update');
    Route::post('payment/cash_on_delivery_status', 'Seller\ProfileController@cashOnDelivery')->name('payment.cash_on_delivery_status');
    Route::post('payment/bank_payment_status', 'Seller\ProfileController@bankPayment')->name('payment.bank_payment_status');

    Route::get('payment/request','Seller\PaymentController@index')->name('payment.history');
    Route::get('money/withdraw','Seller\PaymentController@money')->name('money.withdraw');


    Route::get('products/slug/{name}','Seller\ProductController@ajaxSlugMake')->name('products.slug');
    Route::post('products/get-subcategories-by-category','Seller\ProductController@ajaxSubCat')->name('products.get_subcategories_by_category');
    Route::post('products/get-subsubcategories-by-subcategory','Seller\ProductController@ajaxSubSubCat')->name('products.get_subsubcategories_by_subcategory');
    Route::post('products/sku_combination','Seller\ProductController@sku_combination')->name('products.sku_combination');
    Route::post('products/todays_deal', 'Seller\ProductController@updateTodaysDeal')->name('products.todays_deal');
    Route::post('products/published/update', 'Seller\ProductController@updatePublished')->name('products.published');
    Route::post('products/featured/update', 'Seller\ProductController@updateFeatured')->name('products.featured');
    Route::post('ckeditor/upload', 'Seller\CkeditorController@upload')->name('ckeditor.upload');

    /*Route::resource('roles','RoleController');
    Route::post('/roles/permission','RoleController@create_permission');
    Route::resource('staffs','StaffController');
    Route::resource('brands','BrandController');
    Route::resource('categories','CategoryController');
    Route::resource('attributes','AttributeController');
    Route::resource('subcategories','SubcategoryController');
    Route::resource('sub-subcategories','SubSubcategoryController');

    Route::get('products/slug/{name}','ProductController@ajaxSlugMake')->name('products.slug');
    Route::post('products/get-subcategories-by-category','ProductController@ajaxSubCat')->name('products.get_subcategories_by_category');
    Route::post('products/get-subsubcategories-by-subcategory','ProductController@ajaxSubSubCat')->name('products.get_subsubcategories_by_subcategory');
    Route::post('products/sku_combination','ProductController@sku_combination')->name('products.sku_combination');
    Route::post('products/todays_deal', 'ProductController@updateTodaysDeal')->name('products.todays_deal');
    Route::post('products/published/update', 'ProductController@updatePublished')->name('products.published');
    Route::post('products/featured/update', 'ProductController@updateFeatured')->name('products.featured');
    Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');*/


});
