<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/players',[PlayerController::class,'index']);
Route::post('/players',[PlayerController::class,'store']);
Route::post('/players/{player}',[PlayerController::class,'show']);
Route::post('/players/{player}',[PlayerController::class,'update']);
Route::post('/players/{player}',[PlayerController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
