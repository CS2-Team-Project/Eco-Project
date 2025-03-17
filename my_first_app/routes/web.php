<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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

Route::get('/home', function(){
    return view('UserUI.home');
});

Route::get('/products', function(){
    return view('UserUI.products');
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

use App\Http\Controllers\ProductController;
 
Route::get('/', function () {
    return view('welcome');
});

    Route::controller(ProductController::class)->prefix('product_management')->group(function () {
        Route::get('', 'index')->name('product_management');
        Route::get('create', 'create')->name('product_management.create');
        Route::post('store', 'store')->name('product_management.store');
        Route::get('show/{id}', 'show')->name('product_management.show');
        Route::get('edit/{id}', 'edit')->name('product_management.edit');
        Route::put('edit/{id}', 'update')->name('product_management.update');
        Route::delete('destroy/{id}', 'destroy')->name('product_management.destroy');
    });
    Route::get('/product_management', [ProductController::class, 'index'])->name('product_management');
 
