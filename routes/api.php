<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Authenticated routes
Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/test-protected', function(){
        return response()->json([
            'message' => 'This is a secret data.'
        ]);
    });
});

//public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',[AuthController::class,'login']);

//Store
Route::put('/store/{id}', [StoreController::class,'update']);
Route::get('/store/{id}', [StoreController::class,'show']);
Route::delete('/store/{id}', [StoreController::class,'destroy']);
Route::post('/store', [StoreController::class,'store']);

//Seller
Route::put('/seller/{id}',[SellerController::class,'update']);
Route::get('/seller/{id}', [SellerController::class,'show']);
Route::delete('/seller/{id}', [SellerController::class,'destroy']);
Route::post('/seller',[SellerController::class,'store']);
Route::get('/seller',[SellerController::class,'index']);
