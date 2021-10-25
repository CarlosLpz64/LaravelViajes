<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller; //Acción agregada

use App\Models\Trip; //Necesario agregar

class TripController extends Controller
{
    //
    public function getTrips(){
        return Trip::all();
    }


    //CREATE (INSERT)
    
    //READ (SELECT)
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
}
