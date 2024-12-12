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
Route::post('add-data1' , [ApiController::class , 'add_data1']);

// Update Data
Route::put('update-data', [ApiController::class , 'update_data']);
Route::patch('update-data1', [ApiController::class , 'update_data1']);

// Delete data
Route::delete('delete-data', [ApiController::class , 'delete_data']);
Route::delete('delete-data1', [ApiController::class , 'delete_data1']);