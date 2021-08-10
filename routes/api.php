<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StockController;

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
Route::post('login', [LoginController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function (){
    
    Route::get('/stocks', [StockController::class, 'home']);

    Route::get('/search', [StockController::class, 'search']);

    Route::get('/items', [StockController::class, 'items']);
 });

