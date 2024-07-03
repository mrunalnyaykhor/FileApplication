<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    protected $admin;

    public function __construct()
    {
        $this->admin = new Admin();
    }
       public function index()
    {
        return view('auth.admin');
    }
    public function loginadminindex()
    {

        return view('auth.adminlogin');
    }

    public function store(Request $request)
    {
      $validatedData = $request->validate(
        [
        'firstName' =>'required|string',
        'lastName' => 'required|string',
        'email' => 'required|email',
        'password' => 'required','string','min:8','regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/','regex:/[@$!%*#?&]/',
        'mobile'=> 'required|max:15',
        'address'=>'required|string|max:200',
        'username'=>'required|string'
        ]
      );

    // $admin = new Admin();
           $this->admin->firstName = $validatedData['firstName'];
           $this->admin->lastName =$validatedData['lastName'];
           $this->admin->email = $validatedData['email'];
           $this->admin->mobile = $validatedData['mobile'];
           $this->admin->address = $validatedData['address'];
           $this->admin->username = $validatedData['username'];
           $this->admin->password = Hash::make($validatedData['password']);

       $this->admin->save();
        if($this->admin->save()){
            return redirect('/admin/login')->with('alert-success','Admin Registered successfully');
            // $gallery = Gallery::paginate(5);
            // return view('gallery.admin', ['gallery' => $gallery,'admin' => $admin])->with('alert-success', ' successful...!');

        }
else{
    return 'something wrong';
}

    }

    public function login(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {

           // Auth::login($admin);
            $gallery = Gallery::paginate(10);
            return view('gallery.admin', ['gallery' => $gallery, 'admin' => $admin])->with('alert-success', 'Login successful...!');

        } else {
            return redirect()->back()->with('alert-danger', 'Login failed, please check your email and password.');
        }
    }

    }


