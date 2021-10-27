<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller; //Acción agregada

use App\Models\User; //Necesario agregar

class UserController extends Controller
{
    //
        //CREATE (INSERT)
        public function createUsers($name,$email,$password,$location)
        {    
            $user = new User;
    
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->location = $location;
    
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
    public function updateUsersName($id,$name){
        User::where('id', $id)
        ->update(['name' => $name]);
    }

    //DELETE
    public function deleteUsers($id){
        $user = User::find($id);
        $user->delete();
    }

}
