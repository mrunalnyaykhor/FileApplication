<?php

namespace App\Http\Controllers;
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
            return redirect()->intended(route("home"));
        }
        return redirect(route("login.store"))->with("error","login failed");
    }



    // public function doLogout()
    //   {
    //   Auth::logout(); // logging out user
    //   return Redirect::to('login'); // redirection to login screen
    //   }

    /**
     * Show the form for creating a new resource.
     */
    // public
    // function doLogin()
    //   {
    //   // Creating Rules for Email and Password
    //   $rules = array(
    //     'email' => 'required|email', // make sure the email is an actual email
    //     'password' => 'required|alphaNum|min:8'
    //     // password has to be greater than 3 characters and can only be alphanumeric and);
    //     // checking all field
    //   );
    //     $validator = Validator::make(Input::all(), $rules);
    //     // if the validator fails, redirect back to the form
    //     if ($validator->fails())
    //       {
    //       return Redirect::to('login')->withErrors($validator) // send back all errors to the login form
    //       ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
    //       }
    //       else
    //       {
    //       // create our user data for the authentication
    //       $userdata = array(
    //         'email' => Input::get('email') ,
    //         'password' => Input::get('password')
    //       );
    //       // attempt to do the login
    //       if (Auth::attempt($userdata))
    //         {
    //         // validation successful
    //         // do whatever you want on success
    //         }
    //         else
    //         {
    //         // validation not successful, send back to form
    //         return Redirect::to('login');
    //         }
    //       }
       // }
}
