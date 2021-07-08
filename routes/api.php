<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vue\UserController;

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

Route::post('userlogin', [UserController::class, 'authenticate']);
Route::post('userregister', [UserController::class, 'register']);
Route::get('/fetchdata',[UserController::class,'fetchdata']);
Route::get('/fetchbookdata/{category}/{subcategroy}',[UserController::class,'product']);
Route::get('/singlerecord/{id}',[UserController::class,'singlerecord']);
Route::post('/search',[UserController::class,'searchproduct']);
Route::post('/forgetpassword',[UserController::class,'forgetpassword']);
Route::post('/checkotp',[UserController::class,'checkotp']);
Route::post('/submitnewpassword',[UserController::class,'PasswordUpdate']);
Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [UserController::class, 'logout']);

});