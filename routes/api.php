<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// ---------------------------
// Fetch data
Route::get('get-data', [ApiController::class , 'get_data']);

// Add Data
Route::post('add-data' , [ApiController::class , 'add_data']);

// Update Data
Route::put('update-data', [ApiController::class , 'update_data']);