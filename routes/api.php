<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('signup' , [ApiController::class , 'signup']);
Route::post('login' , [ApiController::class , 'login']);

// Route::group(['middleware' => 'auth:sanctum'], function(){
Route::middleware('auth:sanctum')->group( function(){

    // Fetch data
    Route::get('get-data', [ApiController::class , 'get_data']);
});

// ---------------------------

// Add Data
Route::post('add-data' , [ApiController::class , 'add_data']);
Route::post('add-data1' , [ApiController::class , 'add_data1']);

// Update Data
Route::put('update-data', [ApiController::class , 'update_data']);
Route::patch('update-data1', [ApiController::class , 'update_data1']);

// Delete data
Route::delete('delete-data', [ApiController::class , 'delete_data']);
Route::delete('delete-data1', [ApiController::class , 'delete_data1']);

// Searching data
Route::get('search-data/{val}' , [ApiController::class , 'search_data']);

// Validate data
Route::post('validate-data' , [ApiController::class , 'validate_data']);