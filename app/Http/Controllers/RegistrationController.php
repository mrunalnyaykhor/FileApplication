<?php

namespace App\Http\Controllers;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordReset;
use App\Mail\RegisterMail;
use Session;
//use Auth;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use Spatie\FlareClient\Http\Response;

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


            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->verification_code = "1";
          $user->save();
            if($user != null){

                MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
                return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created. Please check email for verification link.'));
            }

            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));


        }
        public function updateName(Request $request, $id)
        {
            // Validate the incoming data
            $validatedData = $request->validate([
                'name' => 'required|string',
            ]);

            // Find the user by ID
            $user = User::find($id);

            // Check if user exists
            if (!$user) {
                return redirect()->back()->withErrors(['user' => 'User not found']);
            }

            // Update the user's name
            $user->name = $validatedData['name'];
            $user->save();

            // Return a success message
            return redirect()->back()->with(session()->flash('alert-success', 'Your name has been updated successfully.'));
        }

        public function editProfile()
        {
            // Assuming the authenticated user is the one being edited
            $user = auth()->user();

            return view('auth.edit', compact('user'));
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

    public function forgetPasswordLoad(){
        return view('forget-password');
    }
//forget password Api method
    public function forgetPassword(Request $request){
        try{
            $user=User::where('email', $request->email)->get();
            if(count($user)>0){
                $token= Str::random(40);
                $domain = URL::to('/');
                $url = $domain.'/reset-password?token='.$token;

                $data['url'] = $url;
                $data['email']= $request->email;
                $data['title']="password Reset";

                $data['body'] = "please click on below link to Reset Your password.";

                Mail::send('forgetPasswordMail', ['data'=>$data], function($message) use($data){
                    $message->to($data['email'])->subject($data['title']);
                });


                $datetime = Carbon::now()->format('Y-m-d H:i:s');
                PasswordReset::updateOrCreate(
                    ['email'=> $request->email],
                    [
                    'email'=> $request->email,
                    'token'=> $token,
                    'created_at'=> $datetime
                ],
            );
            return response()->json([ 'success'=>true,'msg'=>"Please check your mail to reset your password"]);
            }else{
                return response()->json(['success'=>false,'msg'=>'user not found']);
            }
        }
        catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }
    public function resetPasswordLoad(Request $request){
        $resetData = PasswordReset::where('token',$request->token)->get();
        if(isset($request->token) && count($resetData)>0)
        {
            $user = User::where('email',$resetData[0]['email'])->get();
            return view('resetPassword',compact('user'));
        }
        else{
            return view('404');
        }
    }

    //reset password functionality

    public function resetPassword(Request $request){

      $request ->validate([

        'password'=>'required|string|min:4|confirmed',

      ]);
       $user = User::find($request->id);
       $user->password =Hash::make($request->password);
       $user->save();
       PasswordReset::where('email',$user->email)->delete();
       return redirect()->route('login')->with(session()->flash('alert-success', 'your password has reset successfully.'));

    }


    }
