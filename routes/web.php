<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KopdesController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('kopdes', KopdesController::class);