<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public static function sendSignupEmail($name, $email, $verification_code){
        // echo"bbb".$name."".$email."".$verification_code;
        // die();
        $data = [
            'name' => $name,
            'verification_code' => $verification_code
        ];
        Mail::to($email)->send(new RegisterMail($data));
    }
}
