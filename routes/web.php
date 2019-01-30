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


/* Front-End Info */
Route::get('/','WelcomeController@index');
Route::get('/contact','WelcomeController@contactForm');
Route::get('/category-view/{id}','WelcomeController@category');
Route::get('/product-details/{id}','WelcomeController@productDetails');
Route::get('/customer/log-out','CustomerController@customerLogout');
/* End Front-End Info */     


/* Cart Info */
Route::post('/cart/add','CartController@addToCart');
Route::get('/cart/show','CartController@showCart');
Route::get('/cart/delete/{id}','CartController@deleteCartProduct');
Route::get('/cart/empty','CartController@emptyCartProduct');
/* End Cart Info */


/* Checkout Info */
Route::get('/checkout','CheckoutController@index');
Route::post('/checkout/sign-up','CheckoutController@customerRegistration');
Route::post('/checkout/sign-in','CheckoutController@customerLogin');
Route::get('/checkout/shipping','CheckoutController@showShippingForm');
Route::post('/checkout/save-shipping','CheckoutController@saveShippingInfo');
Route::get('/checkout/payment','CheckoutController@showPaymentForm');
Route::post('/checkout/save-order','CheckoutController@saveOrderInfo');
Route::get('/checkout/my-home','CheckoutController@customerHome');
/* End Checkout Info */


/* Customer sign-up/sign-in Info*/
Route::post('/customer/sign-up','CustomerController@customerRegistration');
Route::post('/customer/sign-in','CustomerController@customerSignIn');
Route::get('/customer/home','CustomerController@myHome');
Route::post('/customer/info-update','CustomerController@customerInfoUpdate');
/* End Customer sign-up/sign-in Info*/


/* ------------Admin panel Routes Info------------*/ 
Auth::routes();
Route::get('/dashboard','HomeController@index');

Route::group(['middleware'=>'AuthenticateMiddleware'],function(){

	/* Category Info*/ 
	Route::get('/category/add','CategoryController@createCategory');
	Route::post('/category/save','CategoryController@storeCategory');     
	Route::get('/category/manage','CategoryController@manageCategory');
	Route::get('/category/edit/{id}','CategoryController@editCategory');
	Route::post('/category/update','CategoryController@updateCategory');
	Route::get('/category/delete/{id}','CategoryController@deleteCategory');
	/*End Category Info*/

	/* Manufacturer Info */ 
	Route::get('/manufacturer/add','ManufacturerController@createManufacturer');
	Route::post('/manufacturer/save','ManufacturerController@storeManufacturer');     
	Route::get('/manufacturer/manage','ManufacturerController@manageManufacturer');
	Route::get('/manufacturer/edit/{id}','ManufacturerController@editManufacturer');
	Route::post('/manufacturer/update','ManufacturerController@updateManufacturer');
	Route::get('/manufacturer/delete/{id}','ManufacturerController@deleteManufacturer');
	/*End Manufacturer Info*/

	/* Product Info */
	Route::get('/product/add','ProductController@createProduct');
	Route::post('/product/save','ProductController@storeProduct');     
	Route::get('/product/manage','ProductController@manageProduct');
	Route::get('/product/view/{id}','ProductController@viewProduct');
	Route::get('/product/edit/{id}','ProductController@editProduct');
	Route::post('/product/update','ProductController@updateProduct');
	Route::get('/product/delete/{id}','ProductController@deleteProduct');
	/*End Product Info*/

    /* User Info */
    Route::get('/user/add','UserController@createUser');
    Route::post('/user/save','UserController@storeUser');
	Route::get('/user/manage','UserController@manageUser');
	Route::get('/user/edit/{id}','UserController@editUser');
	Route::post('/user/update','UserController@updateUser');
	Route::get('/user/delete/{id}','UserController@deleteUser');
	/*End User Info*/


	/* Customer Info */
	Route::get('/customer/add','CustomerController@createCustomer');
	Route::post('/customer/save','CustomerController@storeCustomer');
	Route::get('/customer/manage','CustomerController@manageCustomer');
	Route::get('/customer/view/{id}','CustomerController@viewCustomer');
	//Route::get('/customer/edit/{id}','CustomerController@editCustomer');
	//Route::post('/customer/update','CustomerController@updateCustomer');
	Route::get('/customer/delete/{id}','CustomerController@deleteCustomer');
	/*End Customer Info*/



});