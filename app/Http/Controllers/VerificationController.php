<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verifyEmail(Request $request)
    {
        $verificationCode = $request->query('code');

        // Find the user by verification code
        $user = User::where('verification_code', $verificationCode)->first();

        if ($user) {
            // Mark the user as verified
            $user->email_verified_at = now();
            $user->verification_code = null; // Clear the verification code
            $user->save();

            // Redirect or return a response
            return redirect('/login')->with('success', 'Email verified successfully!');
        }

        // If the user is not found or the code is invalid
        return redirect('/register')->with('error', 'Invalid verification code.');
    }
}
