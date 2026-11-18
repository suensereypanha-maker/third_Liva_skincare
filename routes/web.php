<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Liva Beauty & Care Frontend
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/products', [FrontendController::class, 'products'])->name('products.index');
Route::get('/products/{slug}', [FrontendController::class, 'productDetail'])->name('products.show');
Route::get('/cart', [FrontendController::class, 'cart'])->name('cart.index');
Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout.index');
Route::get('/order-success', [FrontendController::class, 'orderSuccess'])->name('order.success');
Route::get('/dashboard', [FrontendController::class, 'dashboard'])->name('account.dashboard');
Route::get('/lang/{locale}', [FrontendController::class, 'switchLang'])->name('lang.switch');
