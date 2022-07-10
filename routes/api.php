<?php

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



Route::group(['as' => 'api.', 'namespace' => 'Api'], function () {
    Route::group([
        'prefix' => 'v1',
    ], function () {
        Route::post('/register', [\App\Http\Controllers\Api\v1\AuthController::class, 'register']);
        Route::get('/login', [\App\Http\Controllers\Api\v1\AuthController::class, 'login']);
        Route::get('/categories', [\App\Http\Controllers\Api\v1\CategoryController::class, 'list']);
        Route::get('/catalogs', [\App\Http\Controllers\Api\v1\CatalogController::class, 'index']);
        Route::get('/catalog/{slug}', [\App\Http\Controllers\Api\v1\CatalogController::class, 'show']);
        Route::post('/orders/checkout', [\App\Http\Controllers\Api\v1\OrderController::class, 'checkout']);

        Route::middleware('auth:sanctum')->group(function () {
            Route::get('/orders', [\App\Http\Controllers\Api\v1\OrderController::class, 'index']);
        });
    });
});
