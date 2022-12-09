<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KosController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function() {
    Route::post('/admin/create_kost', [KosController::class, 'addKos']);
    Route::get('/getKost', [KosController::class, 'getKost']);

    Route::post('/admin/create_kamar', [KamarController::class, 'addKamar']);
    

    Route::post('/create_order', [OrderController::class, 'createOrder']);
    Route::get('/getUserOrder', [OrderController::class, 'getUserOrder']);
});

Route::withoutMiddleware('auth:api')->group(function() {
    Route::get('/getKamarTersedia', [KamarController::class, 'getAvailableKamar']);
    Route::post('create_user', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});