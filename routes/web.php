<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\GoogleController;

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

// Route::get('/', function () {
//   return view('welcome');
// });


  


Auth::routes();
Route::post('/addtocart',[CartController::class,'addProduct']);
Route::post('delete-cart-item',[CartController::class,'deleteCartitem']);
Route::post('update-cart',[CartController::class,'updateCart']);

Route::middleware(['auth'])->group(function() {
  Route::get('cart',[CartController::class,'viewcart']);
  Route::get('checkout',[CheckoutController::class,'index']);
  Route::post('place-order',[CheckoutController::class,'placeorder']);

  Route::get('my-orders',[UserController::class,'index']);
  Route::get('view-order/{id}',[UserController::class,'vieworder']);
  
   


});


Route::middleware(['auth','isAdmin'])->group(function () {
Route::get('dashboard', [AdminController::class, 'index']);

//Route::resource('categories',Admin\CategoryController::class);
Route::get('categories', 'Admin\CategoryController@index');
Route::get('add-category', 'Admin\CategoryController@create');
Route::post('store', 'Admin\CategoryController@store');
Route::get('/edit/{id}', 'Admin\CategoryController@edit');
Route::put('/update/{id}','Admin\CategoryController@update');
Route::get('/delete/{id}','Admin\CategoryController@delete');

Route::get('products',  [ProductController::class,'index']);
Route::get('add-products','Admin\ProductController@add');
Route::post('insert-products','Admin\ProductController@insert');
Route::get('edit-products/{id}','Admin\ProductController@edit');
Route::put('update-products/{id}',[ProductController::class,'update']);
Route::get('delete/{id}',[ProductController::class,'destroy']);

Route::get('users',[UserController::class,'users']);
Route::get('orders',[OrderController::class,'index']);
Route::get('admin/view-order/{id}',[OrderController::class,'view']);
Route::PUT('update-order/{id}',[OrderController::class,'updateorder']);
Route::get('order-history',[OrderController::class,'orderhistory']);

Route::get('users',[DashboardController::class,'users']); 
Route::get('view-users/{id}',[DashboardController::class,'viewuser']); 




});


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


Route::get('auth/facebook', [GoogleController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [GoogleController::class, 'handleGoogleFacebook']);

Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class,'index']);
Route::get('/category',[App\Http\Controllers\Frontend\FrontendController::class,'category']);
Route::get('viewcategory/{slug}',[App\Http\Controllers\Frontend\FrontendController::class,'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'productview']);

Route::resource('posts', PostController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
/*
Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get("/posts/{id}",[PostController::class,'show'])->name('posts.show');
Route::get("/edit/{id}",[PostController::class,'edit'])->name('posts.edit');
Route::put("/update/{id}",[PostController::class,'update'])->name('posts.update');
Route::delete("/posts/{id}",[PostController::class,'destroy'])->name('posts.destroy');
*/

// Route::get('materials',  [MaterialController::class,'index']);
// Route::get('add-materials','Admin\MaterialController@add');
// Route::post('insert-materials','Admin\MaterialController@insert');

