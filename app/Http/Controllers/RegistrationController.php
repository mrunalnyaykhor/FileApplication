<?php

namespace App\Http\Controllers;
use App\Mail\PasswordResetNotification;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class RegistrationController extends Controller
{
     public function __construct(){
    $this->user= new User();
    }
    protected $user;
    public function index(){
        $response['users']=$this->user->all();
        return view("auth.register")->with($response);
    }

    public function store(Request $request)
    {
        $messages = [
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.regex' => 'The password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character (@$!%*#?&).,like=Password@123',
        ];
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => ['required','string','min:8','regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/','regex:/[@$!%*#?&]/'
        ],
        ],$messages);
        if (User::where('email', $validatedData['email'])->exists()) {
            return redirect()->back()->withErrors(['email' => 'Email address already exists']);
        }
        try {
            $user = new User();
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->password = Hash::make($validatedData['password']);
            $user->verification_code = "pending";
            $user->email_verified_at = "pending";

            $user->save();
            Log::info("User ID $user->email created successfully.");

            if ($user->save()) {
                // Ensure MailController::sendSignupEmail returns a boolean or handle errors within it.
                MailController::sendSignupEmail($user->name, $user->email, $user->verification_code, $user->email_verified_at);
                return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created. Please check email for verification link.'));
            }

            // This condition should realistically not be met, as $user->save() should throw an exception if it fails.
            Log::error('User creation failed for unknown reasons.');
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));

        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('User creation failed: ' . $e->getMessage());
            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));
        }

        }
        public function updateName(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|regex:/^[\pL\s\-]+$/u', // Example regex for string validation
            ], [
                'name.required' => 'The name field is required.',
                'name.regex' => 'Invalid string.',
            ]);
            $user = User::find($id);
            if (!$user) {
                return redirect()->back()->withErrors(['error' => 'User not found']);
            }
            $user->name = $request['name'];
            $user->save();
            return redirect()->back()->with(session()->flash('alert-success', 'Your name has been updated successfully.'));
        }

        public function editProfile()
        {
            $user = auth()->user();

            return view('auth.edit', compact('user'));
        }


    public function verifyUser(Request $request){

        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = User::where(['verification_code' => $verification_code])->first();
        if($user != null){
            $user->is_verified = "true";
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



    public function forgetPasswordLoad(){
        return view('forget-password');
    }
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
                    'created_at'=> $datetime,
                    'updated_at'=> $datetime
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
        $messages = [
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.regex' => 'The password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character (@$!%*#?&).,like=Password@123',
        ];

      $request ->validate([

       // 'password'=>'required|string|min:4|confirmed',
       'password' => [
        'required', 'string','min:8','regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/','regex:/[@$!%*#?&]/'
    ],
      ],$messages);
       $user = User::find($request->id);
       $newPassword = $request->password;
       $user->password =Hash::make($request->password);
       $user->save();
       Mail::to($user->email)->send(new PasswordResetNotification($newPassword));
      // PasswordReset::where('email',$user->email)->delete();

       if($user != null){

        return redirect()->route('login')->with(session()->flash('alert-success', 'your password has reset successfully.'));
    }

    return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));


    }


    }
