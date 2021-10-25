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
Route::get('/getUsers', [UserController::class, 'getUsers']); //http://localhost:8000/api/getUsers
Route::get('/getDetailUsers', [UserController::class, 'getDetailUsers']); //http://localhost:8000/api/getDetailUsers

use App\Http\Controllers\TripController; //Necesario
Route::get('/getTrips', [TripController::class, 'getTrips']); //http://localhost:8000/api/getTrips
Route::get('/getDetailTrips', [TripController::class, 'getDetailTrips']); //http://localhost:8000/api/getDetailTrips

//ADDRESS/////////////////////////////////////////////////
use App\Http\Controllers\AddressController; //Necesario
//CREATE
Route::get('/createAddresses', [AddressController::class, 'createAddresses']); //http://localhost:8000/api/createAddresses
//READ
Route::get('/getAddresses', [AddressController::class, 'getAddresses']); //http://localhost:8000/api/getAddresses
//UPDATE
Route::get('/updateAddresses', [AddressController::class, 'updateAddresses']); //http://localhost:8000/api/updateAddresses
//DELETE
Route::get('/deleteAddresses', [AddressController::class, 'deleteAddresses']); //http://localhost:8000/api/deleteAddresses
