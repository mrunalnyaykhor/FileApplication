<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

class HomeController extends Controller
{


    public function sendTestEmail()
    {
       // echo "Hare KRishna";
        Mail::to('mrunalnyaykhor@gmail.com')->send(new TestEmail('someusertoken', 'Your Subject', 'The body of your message'));
        return 'Test email sent!';
    }
}
