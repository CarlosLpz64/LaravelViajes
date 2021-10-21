<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller; //Acción agregada

use App\Models\User; //Necesario agregar

class UserController extends Controller
{
    //
    public function getUsers(){
        return User::all();
    }

    public function getDetailUsers(){
        return 
        User::Select('users.id', 'users.name', 'users.email','users.password', 
        'ad1.country', 'ad1.state', 'ad1.city')
        ->join('addresses as ad1','ad1.id','=','users.location')
        ->get();
    }

}
