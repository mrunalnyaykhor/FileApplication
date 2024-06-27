<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public static function sendSignupEmail($name, $email, $verification_code,$email_verified_at){

        $data = [
            'name' => $name,
            'verification_code' => $verification_code,
            'email_verified_at' =>$email_verified_at
        ];
        Mail::to($email)->send(new RegisterMail($data));
    }
}
