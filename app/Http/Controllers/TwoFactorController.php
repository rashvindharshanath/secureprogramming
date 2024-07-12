<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwoFactorController extends Controller
{
    public function enableTwoFactorAuth(Request $request)
    {
        $user = Auth::user();

        $code = random_int(100000, 999999); // Generate 6-digit random code
        $expiresAt = now()->addMinutes(10); // Code expires in 10 minutes

        $user->twoFactor()->create([
            'code' => $code,
            'expires_at' => $expiresAt,
        ]);

        // Send code to user's email
        Mail::to($user->email)->send(new TwoFactorVerification($code));

        return redirect()->back()->with('message', 'Two-factor authentication enabled. Check your email for verification code.');
    }

    public function verifyTwoFactorAuth(Request $request)
    {
        $user = Auth::user();
        $verificationCode = $request->input('code');

        $twoFactor = $user->twoFactor;

        if (!$twoFactor || $twoFactor->code !== $verificationCode || $twoFactor->expires_at->lt(now())) {
            return redirect()->back()->with('error', 'Invalid verification code.');
        }

        // Mark two-factor authentication as verified
        $twoFactor->update(['verified_at' => now()]);

        return redirect()->route('home')->with('message', 'Two-factor authentication enabled successfully.');
    }

    public function showVerifyForm()
    {
        return view('auth.verify-2fa');
    }

    public function verify(Request $request)
    {
        $request->validate([
            '2fa_code' => 'required|string|min:6|max:6',
        ]);

        $user = Auth::user();

        if ($user->twoFactorCodeMatches($request->input('2fa_code'))) {
            Auth::login($user);
            return redirect()->intended('/dashboard'); // Redirect to dashboard or intended page
        }

        return back()->withErrors(['2fa_code' => 'Invalid 2FA code']);
    }


}
