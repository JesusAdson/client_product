<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::controller(ClientController::class)->prefix('client')->group(function () {
    Route::get('/', 'index')->name('client.index');
    Route::get('/create', 'create')->name('client.create');
    Route::post('/', 'store')->name('client.store');
    Route::get('/edit/{id}', 'edit')->name('client.edit');
    Route::put('/update/{id}', 'update')->name('client.update');
    Route::delete('/delete/{id}', 'destroy')->name('client.delete');
    Route::get('/search', 'search')->name('client.search');
    Route::get('/show/{id}', 'show')->name('client.show');
});

Route::controller(ProductController::class)->prefix('product')->group(function () {
    Route::get('/', 'index')->name('product.index');
    Route::get('/create', 'create')->name('product.create');
    Route::post('/', 'store')->name('product.store');
    Route::get('/edit/{id}', 'edit')->name('product.edit');
    Route::put('/update/{id}', 'update')->name('product.update');
    Route::delete('/delete/{id}', 'destroy')->name('product.delete');
    Route::get('/search', 'search')->name('product.search');
    Route::get('/show/{id}', 'show')->name('product.show');
});