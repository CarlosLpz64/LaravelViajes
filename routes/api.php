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

//USERS///////////////////////////////////////////////////
use App\Http\Controllers\UserController; //Necesario
//CREATE
Route::post('/createUsers', [UserController::class, 'createUsers']); //http://localhost:8000/api/createUsers
//READ
    //READ ALL
    Route::get('/getUsers', [UserController::class, 'getUsers']); //http://localhost:8000/api/getUsers
    //READ ID
Route::get('/getUser{id}', [UserController::class, 'getUser'], function ($id) {return 'User '.$id;}); //http://localhost:8000/api/getUser{id}

//UPDATE
//Route::get('/updateUsersName/{id}/{name}', [UserController::class, 'updateUsersName'], function ($id,$name) {}); //http://localhost:8000/api/updateUsersName/{id}/{name}
Route::post('/updateUsersName', [UserController::class, 'updateUsersName']); //http://localhost:8000/api/updateUsersName
//DELETE
Route::get('/deleteUsers{id}', [UserController::class, 'deleteUsers'], function ($id) {return 'User '.$id;}); //http://localhost:8000/api/deleteUsers{id}

//TRIPS///////////////////////////////////////////////////
use App\Http\Controllers\TripController; //Necesario
//CRUD
Route::get('/createTrip', [TripController::class, 'createTrip']); //http://localhost:8000/api/createTrip
//READ
    //READ ALL
Route::get('/getTrips', [TripController::class, 'getTrips']); //http://localhost:8000/api/getTrips
    //READ ID
Route::get('/getTrip{id}', [TripController::class, 'getTrip'], function ($id) {return 'User '.$id;}); //http://localhost:8000/api/getTrip{id}
//UPDATE
Route::get('/updateTripDestination/{id}/{des}', [TripController::class, 'updateTripDestination'], function ($id,$des) {}); //http://localhost:8000/api/updateTripDestination/{id}/{des}
//DELETE
Route::get('/deleteTrip{id}', [TripController::class, 'deleteTrip'], function ($id) {return 'Trip '.$id;}); //http://localhost:8000/api/deleteTrip{id}

//ADDRESS/////////////////////////////////////////////////
use App\Http\Controllers\AddressController; //Necesario
//CREATE
Route::get('/createAddresses', [AddressController::class, 'createAddresses']); //http://localhost:8000/api/createAddresses
//READ
    //ALL
Route::get('/getAddresses', [AddressController::class, 'getAddresses']); //http://localhost:8000/api/getAddresses
    //ID
Route::get('/getAddress', [AddressController::class, 'getAddress']); //http://localhost:8000/api/getAddress
//UPDATE
Route::get('/updateAddresses', [AddressController::class, 'updateAddresses']); //http://localhost:8000/api/updateAddresses
//DELETE
Route::get('/deleteAddresses', [AddressController::class, 'deleteAddresses']); //http://localhost:8000/api/deleteAddresses



    //READ INNER JOIN (TAREA PASADA)
    Route::get('/getDetailUsers', [UserController::class, 'getDetailUsers']); //http://localhost:8000/api/getDetailUsers
    Route::get('/getDetailTrips', [TripController::class, 'getDetailTrips']); //http://localhost:8000/api/getDetailTrips
    Route::get('/prueba1{id}', [TripController::class, 'prueba1'], function ($id) {return 'User '.$id;}); //http://localhost:8000/api/prueba1{id}
