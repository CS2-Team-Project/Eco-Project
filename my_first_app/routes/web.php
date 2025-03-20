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

Route::get('/search', function () {
    $searchQuery = request('query');
    return view('search', compact('searchQuery'));
});