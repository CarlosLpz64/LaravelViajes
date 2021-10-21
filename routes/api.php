<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\UserController; //Necesario
Route::post('/getUsers', [UserController::class, 'getUsers']); //http://localhost:8000/api/getUsers
Route::post('/getDetailUsers', [UserController::class, 'getDetailUsers']); //http://localhost:8000/api/getDetailUsers

use App\Http\Controllers\TripController; //Necesario
Route::post('/getTrips', [TripController::class, 'getTrips']); //http://localhost:8000/api/getTrips
Route::post('/getDetailTrips', [TripController::class, 'getDetailTrips']); //http://localhost:8000/api/getDetailTrips


use App\Http\Controllers\AddressController; //Necesario
Route::post('/getAddresses', [AddressController::class, 'getAddresses']); //http://localhost:8000/api/getAddresses