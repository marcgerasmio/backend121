<?php


use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MessagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarouselItemsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\AiController;
use App\Http\Controllers\Api\ProjectController;


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

//PUBLIC APIs
Route::post('/login', [AuthController::class,'login']); 
Route::post('/user',   [UserController::class,'store'])->name('user.store');
Route::post('/project', [ProjectController::class,'store'])->name('project.store'); 
Route::get('/project/show',       [ProjectController::class,'index']);



//OCR APIs
Route::post('/ocr', [AiController::class,'ocr'])->name('ocr.image'); 


//PRIVATE APIs
Route::middleware(['auth:sanctum'])->group(function (){
    Route::post('/logout', [AuthController::class,'logout']);
    Route::delete('/project/{id}',[ProjectController::class,'destroy']);
    Route::delete('/project', [ProjectController::class,'destroyall']); 
    
//ADMIN APIs
    Route::controller(CarouselItemsController::class)->group(function (){
        Route::get('/carousel',         'index');
        Route::get('/carousel/{id}',    'show');
        Route::post('/carousel',        'store');
        Route::put('/carousel/{id}',    'update');
        Route::delete('/carousel/{id}', 'destroy');
    });
    Route::controller(UserController::class)->group(function (){
        Route::get('/user',                 'index');
        Route::get('/user/{id}',            'show');
        Route::put('/user/{id}',            'update')->name('user.update');
        Route::put('/user/email/{id}',      'email')->name('user.email');
        Route::put('/user/password/{id}',   'password')->name('user.password');
        Route::put('/user/image/{id}',      'image')->name('user.image');
        Route::delete('/user/{id}',         'destroy');

        Route::get('/message',          'index');
        Route::post('/message',         'store');
        Route::delete('/message/{id}',  'destroy');
    });

// USER SPECIFIC APIs
Route::get('/profile/show',       [ProfileController::class,'show']);
Route::put('/profile/image',      [ProfileController::class,'image'])->name('profile.image');

});










