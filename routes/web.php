<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[\App\Http\Controllers\Admin\CatalogController::class, 'index'])->name('home');

Auth::routes();

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth'],
], function () {
    Route::resource('/catalogs',\App\Http\Controllers\Admin\CatalogController::class);
    Route::get('/catalogs/{id}/attributes',[\App\Http\Controllers\Admin\CatalogController::class, 'createAttr'])->name('catalogs.createAttr');
    Route::post('/catalogs/{id}/attributes',[\App\Http\Controllers\Admin\CatalogController::class, 'storeAttr'])->name('catalogs.storeAttr');
    Route::resource('/orders',\App\Http\Controllers\Admin\OrderController::class)->only('index', 'show', 'destroy');
});
