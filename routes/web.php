<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\UserController; //Necesario
Route::get('/getUsers', [UserController::class, 'getUsers']); //http://127.0.0.1:8000/getUsers
Route::get('/getDetailUsers', [UserController::class, 'getDetailUsers']); //http://127.0.0.1:8000/getDetailUsers


use App\Http\Controllers\AddressController; //Necesario
Route::get('/getAddresses', [AddressController::class, 'getAddresses']); //http://127.0.0.1:8000/getAddresses

use App\Http\Controllers\TripController; //Necesario
Route::get('/getTrips', [TripController::class, 'getTrips']); //http://127.0.0.1:8000/getTrips
Route::get('/getDetailTrips', [TripController::class, 'getDetailTrips']); //http://127.0.0.1:8000/getDetailTrips