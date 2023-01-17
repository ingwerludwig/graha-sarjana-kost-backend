<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KosController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContactUsController;

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
    Route::post('/admin/create_kost', [KosController::class, 'addKos']);
    Route::get('/getKost', [KosController::class, 'getKost']);
    Route::get('/getRecommendKost', [KosController::class, 'getNearestKost']);

    Route::get('/paymentView', [KosController::class, 'getKost']);

    Route::post('/admin/create_kamar', [KamarController::class, 'addKamar']);
    
    Route::post('/create_order', [OrderController::class, 'createOrder']);
    Route::post('/confirm_payment/{order_id}', [OrderController::class, 'confirmOrder']);
    Route::patch('/admin/accept_payment', [OrderController::class, 'confirmUserPayment']);
    Route::get('/admin/getAllUserOrder', [OrderController::class, 'getAllUserOrder']);

    Route::post('contact_us', [ContactUsController::class, 'send']);
    Route::patch('/cancelOrder/{order_id}',[OrderController::class, 'cancelOrder']);
    
    Route::get('/getUserOrder', [OrderController::class, 'getUserOrder']);
    Route::get('/getKamarDetails/{kamar_id}', [KamarController::class, 'getKamarDetails']);
    Route::get('/getOrderDetails/{order_id}', [OrderController::class, 'getOrderDetails']);
});

Route::withoutMiddleware('auth:api')->group(function() {
    
    Route::get('/getKamarTersedia', [KamarController::class, 'getAvailableKamar']);
    Route::post('create_user', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
});