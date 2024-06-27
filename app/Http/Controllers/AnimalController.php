<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
   public $animal;

    public function index(){
        return view('auth.animal');
    }
    public function store(Request $request)
    {
         $animal = new Animal();
         $animal->name= $request->name;
         $animal->color = $request->color;
         $animal->pet =$request->pet;
         $animal->save();
         if($animal->save()){
            return 'Animal save successfully';

         }
         else{
            return 'something went wrong';
         }
       
    }
}
