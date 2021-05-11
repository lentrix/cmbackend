<?php

use App\Http\Controllers\AuthController;
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

Route::put('/store/{id}', [StoreController::class,'update']);
Route::get('/store/{id}', [StoreController::class,'show']);
Route::delete('/store/{id}', [StoreController::class,'destroy']);
Route::post('/store', [StoreController::class,'store']);

