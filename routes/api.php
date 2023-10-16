<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\AuthorController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('book',[BookController::class,'index']);
Route::get('book/{id}',[BookController::class,'show']);
Route::post('book',[BookController::class,'create']);
Route::put('book/{id}',[BookController::class,'update']);
Route::delete('book/{id}',[BookController::class,'delete']);



Route::get('author',[AuthorController::class,'index']);
Route::get('author/{id}',[AuthorController::class,'show']);
Route::post('author',[AuthorController::class,'create']);
Route::put('author/{id}',[AuthorController::class,'update']);
Route::delete('author/{id}',[AuthorController::class,'delete']);
