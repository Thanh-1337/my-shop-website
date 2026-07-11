<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index']);
Route::get('products.php',[HomeController::class,'products']);
Route::get('about.php',[HomeController::class,'about']);
Route::get('support.php',[HomeController::class,'support']);
