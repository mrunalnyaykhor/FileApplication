<?php

namespace App\Http\Controllers;
use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Validator;

use App\Http\Controllers\IlluminateSupportFacadesValidator;
use App\Http\Controllers\IlluminateFoundationBusDispatchesJobs;

use IlluminateFoundationValidationValidatesRequests;
use IlluminateFoundationAuthAccessAuthorizesRequests;
use IlluminateFoundationAuthAccessAuthorizesResources;
use IlluminateHtmlHtmlServiceProvider;


class LoginController extends Controller
{
    protected $user;
    public function __construct(){
        $this->user= new User();
    }
    public function index(){

        return view('auth.login');
    }

    function login(Request $request){


        $request ->validate([
            "email"=>"required",
            "password"=>"required",
        ]);
        $credentials =$request->only("email","password");
        if(Auth::attempt($credentials)){

                return redirect('gallery');
        }
        return redirect(route("login.post"))->with("error","login failed");

    }
    public function gallery()
    {
        $user = Auth::user();
        $galleries = Gallery::where('owner', $user->name)->get();

        return view('gallery', ['galaries' => $galleries]);
    }




}
