<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

// Shop & Heritage Routes
Route::get('/', [ShopController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'shop'])->name('shop');
Route::get('/product/{slug}', [ShopController::class, 'product'])->name('product.show');
Route::get('/heritage', [ShopController::class, 'heritage'])->name('heritage');
Route::get('/contact', [ShopController::class, 'contact'])->name('contact');
Route::post('/contact', [ShopController::class, 'submitContact'])->name('contact.submit');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/coupon', [CartController::class, 'applyCoupon'])->name('cart.coupon');
Route::post('/cart/coupon/remove', [CartController::class, 'removeCoupon'])->name('cart.coupon.remove');
Route::post('/cart/giftwrap', [CartController::class, 'toggleGiftWrap'])->name('cart.giftwrap');

// Checkout & Order Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/order-success/{order_number}', [CheckoutController::class, 'success'])->name('order.success');

// Wishlist Routes
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
