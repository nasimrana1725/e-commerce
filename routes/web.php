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
//Frontend...............
Route::get('/', 'HomeController@index');

//Show Products by category...............
Route::get('/products_by_category/{category_id}', 'HomeController@show_products_by_category');
//Show Products by manufacture...............
Route::get('/products_by_manufacture/{manufacture_id}', 'HomeController@show_products_by_manufacture');
//Show Product Details by ID...............
Route::get('/view_products/{products_id}', 'HomeController@products_details_by_id');

//ADD to Cart...............
Route::post('/add_cart', 'CartController@add_cart');
Route::get('/show_cart', 'CartController@show_cart');
Route::get('/delete_cart/{rowId}', 'CartController@delete_cart');
Route::post('/update_cart', 'CartController@update_cart');

//My Order...............
Route::get('/myorder', 'MyOrderController@index');

//Products...............
Route::get('/products', 'ShopController@index');

//ADD to Checkout...............
Route::post('/customer_registration', 'CheckoutController@customer_registration');
Route::get('/checkout', 'CheckoutController@checkout');

//ADD to Shipping...............
Route::post('/shipping', 'ShippingController@shipping');

//ADD to Payment...............
Route::get('/payment', 'PaymentController@payment');
Route::post('/order_place', 'PaymentController@order_place');

//ADD to Login...............
Route::get('/login', 'CustomerLoginController@index');
Route::post('/customer_login', 'CustomerLoginController@customer_login');
Route::get('/customer_logout', 'CustomerLoginController@customer_logout');

//ADD to Login...............
Route::get('/contactus', 'HomeController@contactus');




//Backend...........
Route::get('/logout', 'SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin-dashboard', 'AdminController@dashboard');


//Category...........
Route::get('/add-category', 'CategoryController@index');
Route::get('/all-category', 'CategoryController@all_category');
Route::post('/save-category', 'CategoryController@save_category');
Route::get('/inactive_category/{category_id}', 'CategoryController@inactive_category');
Route::get('/active_category/{category_id}', 'CategoryController@active_category');
Route::get('/edit_category/{category_id}', 'CategoryController@edit_category');
Route::post('/update_category/{category_id}', 'CategoryController@update_category');
Route::get('/delete_category/{category_id}', 'CategoryController@delete_category');



//Barnd or Manufacture...........
Route::get('/add-manufacture', 'manufactureController@index');
Route::get('/all-manufacture', 'manufactureController@all_manufacture');
Route::post('/save-manufacture', 'manufactureController@save_manufacture');
Route::get('/inactive_manufacture/{manufacture_id}', 'manufactureController@inactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}', 'manufactureController@active_manufacture');
Route::get('/edit_manufacture/{manufacture_id}', 'manufactureController@edit_manufacture');
Route::post('/update_manufacture/{manufacture_id}', 'manufactureController@update_manufacture');
Route::get('/delete_manufacture/{manufacture_id}', 'manufactureController@delete_manufacture');


//Products...........
Route::get('/add-products', 'ProductsController@index');
Route::get('/all-products', 'ProductsController@all_products');
Route::post('/save-products', 'ProductsController@save_products');
Route::get('/inactive_products/{products_id}', 'ProductsController@inactive_products');
Route::get('/active_products/{products_id}', 'ProductsController@active_products');
Route::get('/edit_products/{products_id}', 'ProductsController@edit_products');
Route::post('/update_products/{products_id}', 'ProductsController@update_products');
Route::get('/delete_products/{products_id}', 'ProductsController@delete_products');


//Slider...........
Route::get('/add-slider', 'SliderController@index');
Route::get('/all-slider', 'SliderController@all_slider');
Route::post('/save-slider', 'SliderController@save_slider');
Route::get('/inactive_slider/{slider_id}', 'SliderController@inactive_slider');
Route::get('/active_slider/{slider_id}', 'SliderController@active_slider');
Route::get('/edit_slider/{slider_id}', 'SliderController@edit_slider');
Route::post('/update_slider/{slider_id}', 'SliderController@update_slider');
Route::get('/delete_slider/{slider_id}', 'SliderController@delete_slider');

//Manage Order...........
Route::get('/order_list', 'ManageOrderController@index');
Route::get('/view_order/{order_id}', 'ManageOrderController@view_order');
Route::get('/delete_order/{order_id}', 'ManageOrderController@delete_order');
Route::get('/inactive_order/{order_id}', 'ManageOrderController@inactive_order');
Route::get('/active_order/{order_id}', 'ManageOrderController@active_order');

//Manage Sell...........
Route::get('/sell_list', 'SellController@index');

//Manage Sell...........
Route::get('/profit', 'ProfitController@index');
Route::get('/profit_report', 'ProfitController@profit_report');
