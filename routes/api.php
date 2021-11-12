<?php

use App\Http\Controllers\CrudController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/create',[CrudController::class,'create']);
Route::get('/get',[CrudController::class,'get']);
Route::put('/edit/{id}',[CrudController::class,'edit']);
Route::post('/update/{id}',[CrudController::class,'update']);
Route::delete('/delete/{id}',[CrudController::class,'delete']);
Route::get('/search/{search}',[CrudController::class,'search']);