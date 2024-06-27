<?php

namespace App\Http\Controllers;

use App\Models\UserForm;
use Illuminate\Http\Request;

class UserFormControllerr extends Controller
{

    public function userformprocess(){
        return view('userform');
    }

    public function processData(Request $request){

        $user= new UserForm();
        $user->id=$request->id;
        $user->name= $request->name;
        $user->email=$request->email;
        $user->save();
        if($user->save()){
           
            return response('userform')->json(['message'=>'user save'],201);

        }
        else{
            return "something wrong";
        }


    }
}
