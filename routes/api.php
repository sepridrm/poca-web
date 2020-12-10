<?php

use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\InbondController;
use App\Http\Controllers\api\InbondDetailController;
use App\Http\Controllers\api\InbondSubDetailController;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\MaterialController;
use App\Http\Controllers\api\RegionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post("login",[LoginController::class, 'login']);

Route::get('inbond', [InbondController::class, 'index']);
Route::get('inbond/{id}', [InbondController::class, 'show']);
Route::post('inbond', [InbondController::class, 'store']);
Route::put('inbond/{id}', [InbondController::class, 'update']);
Route::delete('inbond/{id}', [InbondController::class, 'delete']);

Route::get('inbond-detail', [InbondDetailController::class, 'index']);
Route::get('inbond-detail/{id}', [InbondDetailController::class, 'show']);
Route::post('inbond-detail', [InbondDetailController::class, 'store']);
Route::put('inbond-detail/{id}', [InbondDetailController::class, 'update']);
Route::delete('inbond-detail/{id}', [InbondDetailController::class, 'delete']);

Route::get('inbond-subdetail', [InbondSubDetailController::class, 'index']);
Route::get('inbond-subdetail/{id}', [InbondSubDetailController::class, 'show']);
Route::post('inbond-subdetail', [InbondSubDetailController::class, 'store']);
Route::put('inbond-subdetail/{id}', [InbondSubDetailController::class, 'update']);
Route::delete('inbond-subdetail/{id}', [InbondSubDetailController::class, 'delete']);

Route::get('region', [RegionController::class, 'index']);
Route::get('customer', [CustomerController::class, 'index']);
Route::get('material', [MaterialController::class, 'index']);

