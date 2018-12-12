<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/products', function () {
    return view('frontend.products');
});

Route::get('/admin-login', function () {
    return view('auth.admin-login');
});


Route::get('/main', function () {
    return view('layouts.main');
});


Auth::routes();

Route::prefix('admin')->group(function (){
    Route::get('/','Auth\AdminLoginController@loginForm')->name('admin_login_form');
    Route::post('/','Auth\AdminLoginController@login')->name('admin_login');
    Route::get('/register','Auth\AdminRegisterController@registerForm')->name('admin_register_form');
    Route::post('/register','Auth\AdminRegisterController@register')->name('admin_register');
    Route::post('/logout','Auth\AdminRegisterController@logout')->name('admin_logout');

    Route::get('/dashboard','Admin\DashboardController@index')->name('admin_dashboard');

    Route::get('/products','Backend\ProductsController@index')->name('admin_products');
    Route::post('/products','Backend\ProductsController@addProduct')->name('add_products');
    Route::get('/products/{id}','Backend\ProductsController@showProduct')->name('admin_show_product');

    Route::post('/product-variations','Backend\ProductsController@addProductVariation')->name('add_products_variations');

    Route::get('/products-categories','Backend\ProductsController@categories')->name('admin_products_categories');
    Route::post('/products-categories','Backend\ProductsController@addCategory')->name('add_product_category');

    Route::get('/clients','Backend\ClientsController@index')->name('admin_clients');

    Route::get('/orders','Backend\OrdersController@orders')->name('admin_orders');

    Route::get('/sales','Backend\SalesController@sales')->name('admin_sales');
    Route::post('/sales','Backend\SalesController@addSale')->name('admin_add_sale');

    Route::get('/bookings','Backend\BookingsController@bookings')->name('admin_bookings');
    Route::post('/bookings','Backend\BookingsController@addBooking')->name('admin_add_booking');

});





Route::get('/','Frontend\FrontendController@landingPage')->name('landing_page');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/about-us','Frontend\FrontendController@aboutUs')->name('about_us');

Route::get('/contact-us','Frontend\FrontendController@contactUs')->name('contact_us');

Route::get('/products','Frontend\ProductsController@products')->name('products');

Route::get('/products/{id}','Frontend\ProductsController@product')->name('product_detail');