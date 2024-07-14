<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductController::class)->group(function () {

    //Client routes for products
    Route::prefix('client')->group(function () {
        Route::get('/get-products', 'getProducts')
            ->name('product.index');

        Route::get('/get-product/{product}', 'getProduct')
            ->name('product.show');
    });


    //Admin routes for products
    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::post('/create-product', 'createProduct')
                ->middleware('auth:santum')
                ->name('product.create');

            Route::put('/update-product/{product}', 'updateProduct')
                ->name('product.update');

            Route::delete(
                '/delete-product/{product}',
                'deleteProduct'
            )->name('product.delete');

            Route::delete(
                '/delete-products',
                'deletedSelectedProduct'
            )->name('product.selectDelete');
        });
    });
});





