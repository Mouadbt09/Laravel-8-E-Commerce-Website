<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\offerController;
use App\Http\Controllers\PController;
use App\Http\Controllers\stripeController;
use App\Http\Middleware\Adminmiddleware;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();
// home page route
Route::get('/',[PController::class, 'home']);

// route for about
Route::view('about','about');

// route for cheackout
Route::get('checkout',[CartController::class,'checkout']);

// show products
Route::resource('products', PController::class);

// filter by category
Route::get('filterByC/{category}', [PController::class, 'filterByCategory'])->name('filterByC');

// filter by category2
Route::get('filterBycat/{category}', [PController::class, 'filterByCategory2']);

// search
Route::get('/search', [PController::class, 'search'])->name('product.search');

// filter by price
Route::get('/products/filter/{minprice}/{maxprice}', [PController::class,'filterByPriceRange'])->name('products.filter');

// Cart
Route::get('/cart',[CartController::class,'index'])->middleware('auth');

// add to cart route
Route::get('addtocart/{id}',[CartController::class,'add']);

// add to cart from product view route
Route::get('addtocart_fromP/{id}/{size}',[CartController::class,'add2']);

// Route for update cat quantity
Route::get('/update_cat/{quantity}/{id}/{iprice}', [CartController::class, 'update']);

// Route for update cat size
Route::get('/update_catsize/{size}/{id}', [CartController::class, 'updatesize']);

// Route for delete from cart
Route::get('/deletefromcart/{id}', [CartController::class,'destroy'])->middleware('auth');

// update for offer
Route::put('offerup/{id}', [offerController::class,"store"])->name("offerup");

// show offer
Route::get('offers/{id}', [offerController::class,"show"])->name("showOffer");
// delete offer
Route::delete('/offers/{id}', [DashboardController::class, 'destroy'])->name('destroyOffer');

// delete order
Route::delete('/order/{id}', [DashboardController::class, 'destroyOrder'])->name('destroyOrder');

// payment
Route::post('pay', [stripeController::class, 'checkout'])->name('checkout');
Route::get('/success', [stripeController::class, 'success'])->name('success');
Route::get('/index', [stripeController::class, 'index'])->name('index');




// Admin crud routes
Route::get('/panel', [DashboardController::class, 'index'])->name('panel')->middleware(Adminmiddleware::class);
Route::get('/panel/add', [DashboardController::class, 'add'])->name('panel.add')->middleware(Adminmiddleware::class);
Route::get('/panel/offer', [DashboardController::class, 'offer'])->name('panel.offers')->middleware(Adminmiddleware::class);
Route::get('/panel/ordre', [DashboardController::class, 'order'])->name('panel.orders')->middleware(Adminmiddleware::class);
Route::get('/panel/upd/{id}', [DashboardController::class, 'upd'])->name('panel.upd')->middleware(Adminmiddleware::class);
Route::get('/panel/dashp', [DashboardController::class, 'dashp'])->name('panel.dashp')->middleware(Adminmiddleware::class);
Route::post('/addproduct', [DashboardController::class, 'addProduct'])->name('addproduct');
Route::put('/updatep/{id}', [DashboardController::class, 'upProduct'])->name('updatep');
Route::post('/dashboard/search', [DashboardController::class, 'search'])->name('search');
Route::get('/dashboard/filterByCategory/{category}', [DashboardController::class, 'filterByCategory'])->name('dashboard.filterByCategory');
Route::delete('/product/{id}', [DashboardController::class, 'destroy'])->name('product.destroy');









