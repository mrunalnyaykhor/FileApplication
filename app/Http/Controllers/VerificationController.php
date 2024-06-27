<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verifyEmail(Request $request)
    {
        $verificationCode = $request->query('code');
        $user = User::where('verification_code', $verificationCode)->first();

        if ($user) {
            // Mark the user as verified
            $user->email_verified_at = "true";
            $user->verification_code = "true"; // Clear the verification code
            $user->save();
            return redirect('/login')->with('success', 'Email verified successfully!');
        }
        return redirect('/register')->with('error', 'Invalid verification code.');
    }
}
