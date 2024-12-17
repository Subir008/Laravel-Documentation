<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\RelationshipController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\Agecheck;
use App\Http\Middleware\Countrycheck;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::view('/' , 'home');

// Route::get('/about/{name}' , function ($name) {
//     return view('about' , ['name' => $name]);
// });

// Route::get('/' , function (){
//     return view('home');
// });

Route::get('user',[NewController::class ,'getuser']);
Route::get('new', [NewController::class , 'array']);
// Route::get('about/{name}',[NewController::class ,'about']);
Route::view('/about','about');

Route::view('/user-form' , 'form-submittion');
Route::post('userdata' , [NewController::class , 'getuserdata']);

Route::view('/user-form1' , 'form-submittion1');
Route::post('radioform' , [NewController::class , 'getuserdata1']);

Route::view('/user-form2' , 'form-validation');
Route::post('formvaliddata' , [NewController::class , 'customformvalidation']);

Route::view('name-route' , 'name-route')->name('nr');
Route::view('name-route/{name}' , 'name-route')->name('nrs');
Route::get('nrs' , [NewController::class , 'nameRoutes'] );


// -----------------------
//Prefix Group routing &  Controller routing
Route::prefix('routegroup' )->group( function(){
    Route::view('/group-route','routegroup/group-route');
    Route::controller(NewController::class)->group(function(){
        Route::get('/show', 'groupRouteShow');
        Route::get('/groupRoutefunction',[NewController::class , 'groupRoutefunction']);
    });
});
// -----------------------

// -----------------------
// Middleware

//Global Middleware
// Route::view('middleware','middleware')->middleware('check');

//Group Middleware
// Route::middleware('check')->group(function(){
//     Route::view('middleware','middleware');
//     Route::view('ab','about');
// });

//Route Middleware
Route::view('middleware','middleware')->middleware([Agecheck::class,Countrycheck::class]);
Route::view('ab','about')->middleware(Agecheck::class);
//-----------------


//-----------------
// Database 
Route::get('data',[NewController::class,'dataFetch']);

Route::get('student',[NewController::class,'studentData']);

Route::get('query',[QueryController::class, 'query']);
Route::get('modelquery',[QueryController::class, 'modelQuery']);
// -----------------------

// -----------------------
// Route Method
Route::view('routemethod', 'route-method');
Route::get('form-submit',[NewController::class, 'get_method']);
Route::post('form-submit',[NewController::class, 'post_method']);
Route::put('form-submit',[NewController::class, 'put_method']);
Route::patch('form-submit',[NewController::class, 'patch_method']);
Route::delete('form-submit',[NewController::class, 'delete_method']);

// Route::any('form-submit',[NewController::class, 'any_method']);
Route::match(['put','get','post'],'form-submit',[NewController::class, 'method1']);
Route::match(['delete','patch'],'form-submit',[NewController::class, 'method2']);
// ------------------------

// ---------------------------
// Request Class
Route::view('request','request-class');
Route::post('request-class',[NewController::class,'request_function']);
// --------------------------

// --------------------------
// Session file
Route::view('session','session');
Route::post('session-response',[NewController::class, 'session']);
Route::get('logout',[NewController::class, 'logout']);
// --------------------------

// --------------------------
// File upload 
Route::view('fileupload','fileupload');
Route::post('fileupload',action: [ FileUploadController::class , 'uploadFile']);
//-----------------------------

//-----------------------------
// Localisation
Route::prefix('localisation/localisation')->group(function(){
    Route::view('/' , 'localisation/localisation' );
    Route::view('about' , 'localisation/about' );
});
//-----------------------------

//-----------------------------
// CRUD Operation
Route::prefix('crud/')->group(function(){

    Route::view('/','crud/crud');
    Route::view('add-details','crud/add-details');
    Route::view('upload-image','crud/upload-image');
    Route::view('display-image','crud/display-image');

    Route::controller(CrudController::class)->group(function(){
        Route::post('add-details' , 'adddetails');
        Route::get('show-details' , 'showdetails');
        Route::get('delete-details/{id}' , 'deletedetails');
        Route::get('edit-details/{id}' , 'fetchdetails');
        Route::put('update-details/{id}' , 'updatedetails');
        Route::get('search' , 'search');
        Route::post('multi-delete' , 'multidelete');
        Route::post('upload-image', 'uploadimage');
        Route::get('display-image', 'displayimage');
    });
});
//-----------------------------

//-----------------------------
//Layout
Route::view('layout/home','layout/home');
Route::view('layout/inheritence','layout/inheritence');
//-----------------------------

//-----------------------------
// Stub
Route::view('stub', 'stub');
//-----------------------------

//-----------------------------
// Seeder
Route::view('seeders', 'seeders');
//-----------------------------

//-----------------------------
// Maintenance
Route::view('maintenance', 'maintenance');
Route::view('error', 'error');

// No page found
Route::fallback(function(){
    return view('error');
});
//-----------------------------

//-----------------------------
// Accessor
Route::view('accessors', 'accessors');
Route::get('accessor/accessor-list', [NewController::class,'accessor_list']);
Route::get('accessor/list', [NewController::class,'normal_list']);
//-----------------------------

//-----------------------------
// Mutuator
Route::view('mutator', 'mutator');
Route::get('mutator-add', [NewController::class,'mutator']);
Route::get('accessor/list', [NewController::class,'normal_list']);
//-----------------------------

//-----------------------------
// Relationship
Route::view('relationship', 'relationship');
Route::get('onetoone',[RelationshipController::class , 'onetoone']);
Route::get('onetooneinverse',[RelationshipController::class , 'onetooneinverse']);
Route::get('onetomany',[RelationshipController::class , 'onetomany']);
//-----------------------------

//-----------------------------
// Mail Sending
Route::view('mail','mail/mail');
Route::post('mail',[MailController::class , 'send_mail']);
Route::post('mail_attachment',[MailController::class , 'send_mail_attachment'])->name('mail_attach');
//-----------------------------

//-----------------------------
// API 
Route::view('api','api/api');
//-----------------------------


