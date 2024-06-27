<?php
namespace App\Http\Controllers;
use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    protected $user;
    public function index(){

        return view('auth.login');
    }
    public function paginate()
    {
      $user = Auth::user();
        $gallery = Gallery::where('email', $user->email)->paginate(5);
        return view('gallery.index', ['gallery' => $gallery])->with('alert-success', ' successful...!');
    }
    public function login(Request $request) {

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

            $user = Auth::user();
            $gallery = Gallery::where('email', $user->email)->paginate(5);

            return view('gallery.index', ['gallery' => $gallery])->with('alert-success', 'Login successful...!');
        }

        return redirect()->route("login.post")->with("error", "The provided credentials do not match our records.");
    }

}
