<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller; //Acción agregada

use App\Models\User; //Necesario agregar

class UserController extends Controller
{
    //
        //CREATE (INSERT)
        public function createUsers(Request $request)
        {    
            $user = new User;
    
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->location = $request->location;
    
            $user->save();
        }
        
    //READ (SELECT)
    public function getUsers(){
        return User::all();
    }

    public function getUser($id){
        return 
        User::Select('*')
        ->where('id', '=', $id)
        ->get();
    }

    public function getDetailUsers(){
        return 
        User::Select('users.id', 'users.name', 'users.email','users.password', 
        'ad1.country', 'ad1.state', 'ad1.city')
        ->join('addresses as ad1','ad1.id','=','users.location')
        ->get();
    }
    
    //UPDATE
    public function updateUsersName(Request $request){
        User::where('id', $request->id)
        ->update(['name' => $request->name]);
    }

    //DELETE
    public function deleteUsers($id){
        $user = User::find($id);
        $user->delete();
    }
    ////////////////////////////////////

    //CREATE (INSERT)
    public function createEdificio(Request $request)
    {    
        $edi = new Building;
        $edi->nombre = $request->nombre;
        $edi->save();
    }
    
    //READ (SELECT)
    public function getEdificios(){
        return Building::all();
    }

    //UPDATE
    public function updateEdificio(Request $request, $id){
        Building::where('id', $id)
        ->update(['nombre' => $request->nombre]);
    }

    //DELETE
    public function deleteEdificio($id){
        $edi = Building::find($id);
        $edi->delete();
    }
}
