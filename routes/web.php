<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('page',[App\http\Controllers\PageController::class,'getIndex']);

Route::get('loaisanpham/{type}',[App\http\Controllers\PageController::class,'getLoaiSP']);

Route::get('chitietsanpham',[App\http\Controllers\PageController::class,'getDetail']);

Route::get('lienhe',[App\http\Controllers\PageController::class,'getContact']);

Route::get('gioithieu',[App\http\Controllers\PageController::class,'getAbout']);

// Admin

Route::get('admin', [App\Http\Controllers\PageController::class, 'getIndexAdmin']);

Route::get('admin-add-form', [App\Http\Controllers\PageController::class, 'getAdminAdd'])->name('add-product');

Route::post('admin-add-form', [App\Http\Controllers\PageController::class, 'postAdminAdd']);	

Route::get('admin-edit-form/{id}', [App\Http\Controllers\PageController::class, 'getAdminEdit']);

Route::post('admin-edit', [App\Http\Controllers\PageController::class, 'postAdminEdit']);	

Route::post('admin-delete/{id}', [App\Http\Controllers\PageController::class, 'postAdminDelete']);	

Route::get('admin-export', [App\Http\Controllers\PageController::class, 'exportAdminProduct'])->name('export');

// Regester
Route::get('/register', function () {		
    return view('users.register');	
    });		

// ----------------------------Wishlist-----------------------------------------------------------//
Route::prefix ('wishlist')->group(function(){
    Route::get('/add/{id}',[App\Http\Controllers\WishlistController::class, 'AddWishlist']);
    Route::get('/delete/{id}',[App\Http\Controllers\WishlistController::class, 'DeleteWishlist']);

    Route::get('/order',[App\Http\Controllers\WishlistController::class, 'OrderWishlist']);
});
// ----------------------------Comment-------------------------------------------------------------//
Route::post('/comment/{id}',[App\Http\Controllers\CommentController::class,'AddComment']);


// ----------------------------------Login, Logout, Regester--------------------------------------//
Route::get('/login',function(){
    return view('users.login');
});

Route::post('/login',[App\Http\Controllers\UserController::class,'Login']);

Route::get('/logout',[App\Http\Controllers\UserController::class,'Logout']);

Route::get('/register',function(){
    return view('users.register');
});

Route::post('/register',[App\Http\Controllers\UserController::class,'Register']);

//------------------------------------CART--------------------------------------------------------//
Route::get('add-to-cart/{id}',[App\Http\Controllers\PageController::class,'getAddToCart'])->name('themgiohang');
Route::get('del-cart/{id}',[App\Http\Controllers\PageController::class,'getDelItemCart'])->name('xoagiohang');

//-------------------------------------CHECKOUT----------------------------------------------------//
Route::get('check-out',[App\Http\Controllers\PageController::class,'getCheckout'])->name('dathang');
Route::post('check-out',[App\Http\Controllers\PageController::class,'postCheckout'])->name('dathang');

//------------------------------Cổng thanh toán -----------------------------------------------//
Route::post('/vnp_payment',[App\Http\Controllers\PageController::class,'vnp_payment']);

Route::post('/momo_payment',[App\Http\Controllers\PageController::class,'momo_payment']);

