<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;

Route::apiResource('products', ProductController::class);
Route::apiResource('carts', CartController::class);
Route::apiResource('orders', OrderController::class)->only(['index', 'store', 'show', 'update']);