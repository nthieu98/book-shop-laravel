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

Route::get('/', 'IndexController@index')->name('welcome');

// Route::get('/login', ['uses' => 'LoginController@getLogin'])->name('login');

// Route::post('/login', 'LoginController@postLogin');

// Route::match(['get', 'post'], '/admin','AdminController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Category/Listing Page
Route::get('/products/{url}','ProductsController@products');

// Product Detail Page
Route::get('/product/{id}','ProductsController@product');

// Cart Page
Route::match(['get', 'post'],'/cart','ProductsController@cart');

// Add to Cart Route
Route::match(['get', 'post'], '/add-cart', 'ProductsController@addtocart');

// Delete Product from Cart Route
Route::get('/cart/delete-product/{id}','ProductsController@deleteCartProduct');

// Update Product Quantity from Cart
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');

// Get Product Attribute Price
Route::any('/get-product-price','ProductsController@getProductPrice');

// Apply Coupon
Route::post('/cart/apply-coupon','ProductsController@applyCoupon');

Route::prefix('admin')->group(function()  {
    Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/dashboard','AdminController@index')->name('admin.dashboard');	
	// Route::get('/settings','AdminController@settings');
	// Route::get('/check-pwd','AdminController@chkPassword');
	// Route::match(['get', 'post'],'/update-pwd','AdminController@updatePassword');

	// Admin Categories Routes
	Route::match(['get', 'post'], '/add-category','CategoryController@addCategory');
	Route::match(['get', 'post'], '/edit-category/{id}','CategoryController@editCategory');
	Route::match(['get', 'post'], '/delete-category/{id}','CategoryController@deleteCategory');
	Route::get('/view-categories','CategoryController@viewCategories');

	// Admin Products Routes
	Route::match(['get','post'],'/add-product','ProductsController@addProduct');
	Route::match(['get','post'],'/edit-product/{id}','ProductsController@editProduct');
	Route::get('/delete-product/{id}','ProductsController@deleteProduct');
	Route::get('/view-products','ProductsController@viewProducts');
	Route::get('/delete-product-image/{id}','ProductsController@deleteProductImage');
	
	Route::match(['get', 'post'], '/add-images/{id}','ProductsController@addImages');
	Route::get('/delete-alt-image/{id}','ProductsController@deleteProductAltImage');

	// Admin Attributes Routes
	Route::match(['get', 'post'], '/add-attributes/{id}','ProductsController@addAttributes');
	Route::match(['get', 'post'], '/edit-attributes/{id}','ProductsController@editAttributes');
	Route::get('/delete-attribute/{id}','ProductsController@deleteAttribute');

	// Admin Users Routes
	Route::match(['get','post'],'/add-user','UsersController@addUser');
	Route::match(['get','post'],'/edit-user/{id}','UsersController@editUser');
	Route::get('/view-users','UsersController@viewUsers');
	Route::get('/delete-user/{id}','UsersController@deleteUser');

	// Admin Reports Routes
	Route::match(['get','post'],'/add-report','ReportsController@addReport');
	Route::match(['get','post'],'/edit-report/{id}','ReportsController@editReport');
	Route::get('admin/view-reports','ReportsController@viewReports');
    Route::get('/delete-report/{id}','ReportsController@deleteReport');

    // Admin Orders Routes
    Route::match(['get','post'],'/add-order','OrdersController@addOrder');
    Route::match(['get','post'],'/add-order/{id}/add-product','OrdersController@addProduct');
    Route::match(['get','post'],'/add-order/{id}/delete-product/{idp}','OrdersController@deleteProduct');
    Route::match(['get','post'],'/edit-order/{id}','OrdersController@editOrder');
    Route::match(['get','post'],'/edit-order/{id}/edit-order-detail','OrdersController@editOrderDetail');
    Route::match(['get','post'],'/edit-order/{id}/delete-order-detail/{idp}','OrdersController@deleteDetail');
	Route::get('/view-orders','OrdersController@viewOrders');
    Route::get('/delete-order/{id}','OrdersController@deleteOrder');
    
    Route::get('/logout','AdminController@logout');
});


// Route::get('/register', 'RegisterController@getRegister') -> name('register');

// Route::post('/register', 'RegisterController@postRegister');

// Route::get('/admin', 'AdminController@getAdmin')->name('admin');
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{id}', 'UserController@viewProfile');
Route::post('/profile/{id}', 'UserController@editProfile');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/search', 'IndexController@search');
Route::get('/product/{id}', 'IndexController@viewProduct');
Route::post('/product/{id}', 'UserController@addCart');
Route::get('/checkout/{id}', 'UserController@checkOut');
Route::get('/{id}/{idp}', 'UserController@addCart2');