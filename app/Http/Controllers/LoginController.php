<?php
namespace App\Http\Controllers;
use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    protected $user;
    public function __construct(){
        $this->user= new User();
    }
    public function index(){

        return view('auth.login');
    }
    function login(Request $request) {

        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);
        $credentials = $request->only("email", "password");
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {

            if ($remember) {
                setcookie('email', $request->email, time() + (86400 * 30), "/"); // 30 days
                setcookie('password', $request->password, time() + (86400 * 30), "/"); // 30 days
            } else {
                if (isset($_COOKIE['email'])) {
                    setcookie('email', '', time() - 3600, "/");
                }
                if (isset($_COOKIE['password'])) {
                    setcookie('password', '', time() - 3600, "/");
                }
            }

             return redirect('gallery')->with('alert-success', 'Login successful...!');
        }
        return redirect()->route("login.post")->with("error", "Login failed");
    }
    public function gallery()
    {
        $user = Auth::user();
        $galleries = Gallery::where('owner', $user->name)->get();

        return view('gallery', ['galaries' => $galleries]);
    }




}
