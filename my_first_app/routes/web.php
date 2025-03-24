<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ShippingAddressController;

// Define all your routes here

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect']);
Route::post('/add_post', [HomeController::class, 'add_post']);
Route::get('/', [HomeController::class, 'home']);
Route::get('/product', [AdminController::class, 'product']);
Route::post('/uploadproduct', [AdminController::class, 'uploadproduct']);
Route::get('/products', [ProductController::class, 'index']);

Route::get('/home', function () {
    return view('UserUI.home');
});
Route::get('/contact', function () {
    return view('UserUI.contact');
});
Route::get('/about', function () {
    return view('UserUI.about');
});
Route::get('/basket', function () {
    return view('UserUI.basket');
});
Route::get('/checkout', function () {
    return view('UserUI.checkout');
});



Route::post('/basket/{id}', [BasketController::class, 'addToBasket'])->middleware('auth');
Route::get('/basket', [BasketController::class, 'viewBasket'])->name('basket');
Route::get('/checkout', [CheckoutController::class, 'showCheckoutPage'])->name('checkout');
Route::post('/checkout/submit', [CheckoutController::class, 'submit'])->name('checkout.submit');

// Shipping Address Routes

// This route handles showing the form (create view)
Route::get('/shipping-address/create', [ShippingAddressController::class, 'create'])->name('address.create');

// This route handles storing (or updating) the address
Route::post('/shipping-address/store', [ShippingAddressController::class, 'store'])->name('address.store');



Route::post('/basket/{id}', [BasketController::class, 'addToBasket'])->middleware('auth');
Route::get('/basket', [BasketController::class, 'viewBasket'])->name('basket');
Route::get('/checkout', [CheckoutController::class, 'showCheckoutPage'])->name('checkout');
Route::post('/checkout/submit', [CheckoutController::class, 'submit'])->name('checkout.submit');

// Shipping Address Routes

// This route handles showing the form (create view)
Route::get('/shipping-address/create', [ShippingAddressController::class, 'create'])->name('address.create');

// This route handles storing (or updating) the address
Route::post('/shipping-address/store', [ShippingAddressController::class, 'store'])->name('address.store');

Route::get('/search', function () {
    $searchQuery = request('query');
    return view('search', compact('searchQuery'));
});

Route::delete('/basket/{itemId}/delete', [BasketController::class, 'deleteItem'])->name('basket.delete');

// Route for confirming the order
Route::post('/confirm-order', [BasketController::class, 'confirmOrder'])->name('order.confirm');

// Route for the order confirmation page
Route::get('/order-confirmation/{order}', function ($order) {
    return view('UserUI.confirmation', ['order' => $order]);
})->name('order.confirmation');

