<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| USER Routes
|--------------------------------------------------------------------------
*/


Route::name('products.')->group(function () {
    Route::get('view', [ProductController::class, 'view'])->name('view');
    Route::post('checkout', [ProductController::class, 'checkout'])->name('checkout');
});
