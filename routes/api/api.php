<?php

use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Support\Facades\Route;

Route::post('/productinformation', [ProductApiController::class, 'productCheckout']);