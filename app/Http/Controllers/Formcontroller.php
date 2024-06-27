<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Formcontroller extends Controller
{

     public function index(){
        return view('formdata');
     }
    public function formData(Request $request){
      echo ( $request->t1 ." " .$request->t2);
       return view('processData');


    }
}
