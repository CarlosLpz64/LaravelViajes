<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller; //Acción agregada

use App\Models\Address; //Necesario agregar

class AddressController extends Controller
{
    //
    public function getAddresses(){
        return Address::all();
    }
}
