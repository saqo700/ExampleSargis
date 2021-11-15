<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//USER CRUD

Route::get('users', [UserController::class, 'index'])->name('users.index');




Route::middleware('auth:api')->group(function () {

    Route::get('users/user', [UserController::class, 'show'])->name('users.show');

    Route::patch('users/edit', [UserController::class, 'update'])->name('users.update');

    Route::delete('users', [UserController::class, 'destroy'])->name('users.destroy');

    // PRODUCT CRUD

    Route::get('products', [ProductController::class, 'index'])->name('products.index');

    Route::post('products', [ProductController::class, 'store'])->name('products.store');

    Route::get('products/product', [ProductController::class, 'show'])->name('products.show');

    Route::patch('products/{id}/edit', [ProductController::class, 'update'])->name('products.update');

    Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('products/my/products', [ProductController::class, 'showProd'])->name('products.show');


});

Route::post('users', [UserController::class, 'store'])->name('users.store');



