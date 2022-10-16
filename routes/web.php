<?php

use App\Http\Controllers\ClientController;
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