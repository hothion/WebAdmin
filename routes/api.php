<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\NonficationController;
use App\Http\Controllers\Api\ChatContronller;
use App\Http\Controllers\Api\ProfileController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Accounts
Route::get('account',[LoginController::class, 'getAccount']);
Route::post('account',[LoginController::class, 'register']);
Route::get('account/{id}',[LoginController::class, 'showAccount']);
Route::delete('account/{id}',[LoginController::class, 'destroyAccount']);
//Login
Route::post('login',[LoginController::class,'loginUser']);
Route::post('loginAdmin',[LoginController::class,'loginAdmin']);
//profile
Route::get('profileAdmin/{id}',[ProfileController::class,'getProfile']);
Route::patch('updateProfile/{id}',[ProfileController::class,'updateEditAdmin']);
Route::post('uploadImg',[ProfileController::class,'uploadImage']);
Route::get('uploadImg',[ProfileController::class,'uploadImage']);
Route::get('profileAd',[ProfileController::class,'profileAdmin']);




//Nonfication
Route::get('nofication',[NonficationController::class,'index']);
Route::get('nofication/{id}',[NonficationController::class,'getNotification']);

//Chat
Route::get('chat',[ChatContronller::class,'index']);
Route::get('chatadmin',[ChatContronller::class,'getchatAd']);


//Progress
Route::get('progress/{id}',[ProgressController::class,'getProgress']);

//PromotionContronller
Route::get('promotion',[PromotionContronller::class,'index']);

//Search
Route::get('search',[SearchController::class,'index']);
