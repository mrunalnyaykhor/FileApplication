<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\RegisterMail;
use Session;
use Auth;
use Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    protected $user;
    public function __construct(){
        $this->user= new User();
    }
    public function index(){
        $response['users']=$this->user->all();
        return view("auth.register")->with($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $this->user->create($request->all());
    //     return redirect()->back();
    // }
    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if (User::where('email', $validatedData['email'])->exists()) {
            return redirect()->back()->withErrors(['email' => 'Email address already exists']);
        }

        // Create a new user instance and store it in the database
        // $this->user->create([
        //     'name' => $validatedData['name'],
        //     'email' => $validatedData['email'],
        //     'password' => bcrypt($validatedData['password']),

        // ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->verification_code = "1";
          $user->save();
        //   $user->remember_token=str()::random(40);

            // Mail::to($user->email)->send(new RegisterMail($user));
            if($user != null){

                MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
                return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created. Please check email for verification link.'));
            }

            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));

//   if($user->save){
//     return redirect(route("register.store"))
//     ->with("error","User not created successfully....!!");
//   }

//         return redirect(route("login.post"))->with('success', 'User  created successfully');

}

    public function verifyUser(Request $request){
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = User::where(['verification_code' => $verification_code])->first();
        if($user != null){
            $user->is_verified = 1;
            $user->save();
            return redirect()->route('login')->with(session()->flash('alert-success', 'Your account is verified. Please login!'));
        }

        return redirect()->route('login')->with(session()->flash('alert-danger', 'Invalid verification code!'));
    }
    public function logout(Request $request){
        $request->session()->flush();
        $request->Auth::logout();
        return redirect("login");
    }

    function listUsers(){
        $users =User::get();
        return view("welcome",compact('users'));
    }

    function insertProducts(){
        return view('welcome');
    }

   


    }
