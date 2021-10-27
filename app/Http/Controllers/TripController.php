<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller; //Acción agregada

use App\Models\Trip; //Necesario agregar

class TripController extends Controller
{
    //
    //CREATE (INSERT)
    public function createTrip()
    {    
        $trip = new Trip;

        $trip->trip_date = '2021-10-26 20:00:00';
        $trip->origin = '1';
        $trip->destination = '2';
        $trip->user = '1';

        $trip->save();
    }
        
    //READ (SELECT)
    public function getTrips(){
        return Trip::all();
    }

    public function getTrip($id){
        return 
        Trip::Select('trips.trip_date AS Date', 'ad1.country AS Origin_Country', 
        'ad1.state AS Origin_State', 'ad1.city AS Origin_City',
        'ad2.country AS Destination_Country', 
        'ad2.state AS Destination_State', 'ad2.city AS Destination_City',
        'users.name AS User')
        ->join('addresses as ad1','ad1.id','=','trips.origin')
        ->join('addresses as ad2','ad2.id','=','trips.destination')
        ->join('users','users.id','=','trips.user')
        ->where('trips.user', '=', $id)
        ->get();
    }

    public function getDetailUsers(){
        return 
        Trip::Select('users.id', 'users.name', 'users.email','users.password', 
        'ad1.country', 'ad1.state', 'ad1.city')
        ->join('addresses as ad1','ad1.id','=','users.location')
        ->get();
    }
    
    //UPDATE
    public function updateTripDestination($id,$des){
        Trip::where('id', $id)
        ->update(['destination' => $des]);
    }

    //DELETE
    public function deleteTrip($id){
        $user = Trip::find($id);
        $user->delete();
    }

    
    //
    public function getDetailTrips(){
        return 
        Trip::Select('trips.trip_date AS Date', 'ad1.country AS Origin_Country', 
        'ad1.state AS Origin_State', 'ad1.city AS Origin_City',
        'ad2.country AS Destination_Country', 
        'ad2.state AS Destination_State', 'ad2.city AS Destination_City')
        ->join('addresses as ad1','ad1.id','=','trips.origin')
        ->join('addresses as ad2','ad2.id','=','trips.destination')
        ->get();
    }

    public function prueba1($id){
        $aux = 0;
        $contador = Trip::Select('trips.trip_date AS Date', 'ad1.country AS Origin_Country', 
        'ad1.state AS Origin_State', 'ad1.city AS Origin_City',
        'ad2.country AS Destination_Country', 
        'ad2.state AS Destination_State', 'ad2.city AS Destination_City',
        'users.name AS User')
        ->join('addresses as ad1','ad1.id','=','trips.origin')
        ->join('addresses as ad2','ad2.id','=','trips.destination')
        ->join('users','users.id','=','trips.user')
        ->where('trips.user', '=', $id)
        ->get();
        foreach ($contador as $valor){
            $aux = $aux + 1;
        }
        return $aux;
    }
}

/*
Select trips.trip_date AS 'Date', ad1.country AS 'Origin_Country', 
        ad1.state AS 'Origin_State', ad1.city AS 'Origin_City',
        ad2.country AS 'Destination_Country', 
        ad2.state AS 'Destination_State', ad2.city AS 'Destination_City',
        users.name AS 'User'
        FROM trips
        INNER JOIN addresses as ad1 ON ad1.id = trips.origin
        INNER JOIN addresses as ad2 ON ad2.id = trips.destination
        INNER JOIN users ON users.id = trips.user
        WHERE trips.user = 1
*/

/*
SELECT users.name, users.email, users.password, 
addresses.country, addresses.state, addresses.city 
FROM users INNER JOIN addresses on addresses.id=users.location;
*/