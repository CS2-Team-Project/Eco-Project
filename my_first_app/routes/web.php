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


Route::get('/',[HomeController::class,'home']);

Route::get('/product',[AdminController::class,'product']);

Route::post('/uploadproduct',[AdminController::class,'uploadproduct']);

Route::get('/products', [ProductController::class, 'index']);

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
