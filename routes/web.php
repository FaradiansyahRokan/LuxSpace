<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAdmin;
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

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/details/{slug}', [FrontEndController::class, 'details'])->name('details');
Route::get('/cart', [FrontEndController::class, 'cart'])->name('cart');
Route::get('/checkout/success', [FrontEndController::class, 'success'])->name('checkout-success');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified', 'IsAdmin'])->name('dashboard.')->prefix('dashboard')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::resource('product', ProductController::class);
    Route::resource('product.gallery', ProductGalleryController::class)->shallow()->only([
        'index', 'create', 'store', 'destroy'
    ]);
    Route::resource('transaction' , TransactionController::class)->only([
        'index' , 'show' , 'edit' , 'update'
    ]);
    Route::resource('user' , UserController::class)->only([
        'index' , 'edit' , 'update' , 'destroy'
    ]);
});