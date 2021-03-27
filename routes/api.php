<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\HeartController;
use App\Http\Controllers\Api\NonficationController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Accounts
Route::get('account',[LoginController::class, 'getAccount']);
Route::post('account',[LoginController::class, 'register']);
Route::get('account/{id}',[LoginController::class, 'showAccount']);
Route::delete('account/{id}',[LoginController::class, 'destroyAccount']);

Route::post('login',[LoginController::class,'loginUser']);

Route::post('loginAdmin',[LoginController::class,'loginAdmin']);


//Products
Route::get('products',[ProductController::class,'getProduct']);
Route::post('products',[ProductController::class,'store']);
Route::delete('products/{id}',[ProductController::class,'destroy']);
Route::put('products/{id}',[ProductController::class,'update']);

// Statistics
Route::get('product_chart',[ProductController::class,'getLineProductChart']);
Route::get('user_chart',[ProductController::class,'getLineUserChart']);
Route::get('order_chart',[ProductController::class,'getOrderPerDay']);
Route::get('order_barchart',[ProductController::class,'getBarOrderChart']);
Route::get('order_pieChart',[ProductController::class,'catePieChart']);

Route::get('get_count_product',[ProductController::class,'getCountProduct']);
Route::get('get_count_review',[ProductController::class,'getCountReview']);
Route::get('get_count_heart',[ProductController::class,'getCountHeart']);
Route::get('get_count_user',[ProductController::class,'getCountUser']);

Route::get('weekChart',[ProductController::class,'weekChart']);
Route::get('lastWeekChart',[ProductController::class,'LastweekChart']);
Route::get('getWeek/{counter}',[ProductController::class,'getDayofYear']);

Route::get('getNumber',[ProductController::class,'getNumberWeek']);


//Order
Route::get('order',[OrderController::class,'getOrder']);
Route::get('order/{id}',[OrderController::class,'getOrderDetails']);
Route::post('addproducttoorder',[OrderController::class,'getAddProduct']);
Route::delete('deleteproducttoorder',[OrderController::class,'deleteProductInOrder']);
Route::patch('order_update/{id}',[OrderController::class,'update']);
Route::get('order_show/{id}',[OrderController::class,'show']);
Route::get('detail_order/{id}',[OrderController::class,'getOrderDetailsAdmin']);


Route::delete('order_delete/{id}',[OrderController::class, 'destroy']);
//Review
Route::get('review',[ReviewController::class,'index']);
Route::get('review/{id}',[ReviewController::class,'getReviewDetails']);
Route::post('review',[ReviewController::class,'addProductReview']);

//Heart
Route::get('heart',[HeartController::class,'index']);
Route::get('heart/{id}',[HeartController::class,'getHeartDetails']);
Route::put('heart',[HeartController::class,'addProductHeart']);

//Nonfication
Route::get('nofication',[NonficationController::class,'index']);
