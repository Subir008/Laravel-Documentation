<?php

use App\Http\Controllers\API\ApiAuthController;
use App\Http\Controllers\API\ApiCrudController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('signup' , [ApiController::class , 'signup']);
Route::post('login' , [ApiController::class , 'login']);
Route::post('login1' , [ApiController::class , 'login1']);
// Route::get('login' , [ApiController::class , 'login'])->name('login');

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


// ------------------------------------------------

// Crud Using Api resource
Route::post('signupdata' , [ApiAuthController::class , 'signup']);
Route::post('logindata' , [ApiAuthController::class , 'login']);

Route::middleware('auth:sanctum')->group(function(){
    
    Route::delete('logout', [ApiAuthController::class , 'logout']);

    // 
    Route::apiResource('crud', ApiCrudController::class);
});