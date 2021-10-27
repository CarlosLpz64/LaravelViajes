<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller; //Acción agregada

use App\Models\Address; //Necesario agregar

class AddressController extends Controller
{
    //

    //CREATE (INSERT)
    public function createAddresses(Request $request)
    {
        // Validate the request...

        $address = new Address;

        $address->country = 'MEXICO';
        $address->state = 'COLIMA';
        $address->city = 'MANZANILLO';

        $address->save();
    }
    
    //READ (SELECT)
    public function getAddresses(){
        return Address::all();
    }

    public function getAddress(){
        return 
        Address::Select('*')
        ->where('id', '=', 1)
        ->get();
    }

    //UPDATE
    public function updateAddresses(){
        Address::where('id', 2)
        //->where('destination', 'San Diego')
        ->update(['city' => 'SEATTLE']);
    }

    //UPDATE
    public function deleteAddresses(){
        $address = Address::find(4);
        $address->delete();
    }
}
