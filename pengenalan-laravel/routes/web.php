<?php

use App\Http\Controllers\PromoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('promo', PromoController::class);
