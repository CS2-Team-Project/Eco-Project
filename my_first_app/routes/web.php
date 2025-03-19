<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect']);

Route::post('/add_post',[HomeController::class,'add_post']);

Route::get('/',[HomeController::class,'home']);

Route::get('/product',[AdminController::class,'product']);

Route::post('/uploadproduct',[AdminController::class,'uploadproduct']);

Route::get('/products', [ProductController::class, 'index']);

Route::get('/admin/product', [AdminController::class, 'manageProducts'])->name('admin.product');
Route::post('/admin/update-product/{id}', [AdminController::class, 'updateProduct']);
Route::delete('/admin/delete-product/{id}', [AdminController::class, 'deleteProduct']);

Route::post('/basket/add/{id}', [BasketController::class, 'add'])->name('basket.add');

Route::get('/home', function(){
    return view('UserUI.home');
});

Route::get('/contact', function(){
    return view('UserUI.contact');
});


Route::get('/about', function(){
    return view('UserUI.about');
});

Route::get('/basket', function(){
    return view('UserUI.basket');
});

Route::get('/checkout', function () {
    return view('UserUI.checkout');
});

