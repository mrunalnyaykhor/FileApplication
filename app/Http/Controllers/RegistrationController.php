<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Auth;
use Illuminate\Support\Facades\Hash;

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
        $this->user->create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),]);

            $user = new User();
            $user->name = $request->fullname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

  if($user->save){
    return redirect(route("register.store"))
    ->with("success","User created successfully....!!");
  }
//  return redirect(route("register.store"))
//  ->with("error","Failed to create acount");

        // Redirect or perform any other action

        // $this->user->create($request->all());
        return redirect(route("login.store"))->with('success', 'User created successfully');
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

    // function insertProductsPost(Request $request){
    //   $request -> validate([
    //    "p_name"=> "required",
    //    "P_slug"=>"required",
    //    "p_price"=>"required",
    //    "p_date"=>"required",
    //   ]);
    //   $product= new $Products();
    //   $product->product_name =$request->p_name;
    //   $product->product_slug=$request->p_slug;
    //   $product->product_price=$request->p_price;
    //   $product->product_date=$request->p_date;

    //   if($product->save()){
    //     return "value inserted successfully";
    //   }
    //   return "Error occured";
    // }
    // function upadateProductsPost(Request $request){
    //     $request -> validate([
    //      "p_name"=> "required",
    //      "P_slug"=>"required",
    //      "p_price"=>"required",
    //      "p_date"=>"required",
    //     ]);
    //     $product= new Products::where("slug",$request->p_slug)->first();
    //     $product->product_name =$request->p_name;
    //     $product->product_slug=$request->p_slug;
    //     $product->product_price=$request->p_price;
    //     $product->product_date=$request->p_date;

    //     if($product->save()){
    //       return "value updated successfully";
    //     }
    //     return "Error occured";
    //   }


}

