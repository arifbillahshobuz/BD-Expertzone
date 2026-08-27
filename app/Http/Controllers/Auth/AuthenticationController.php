<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOTP;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthenticationController extends Controller
{
    // verify otp
    public function userVerifyOTP(Request $request)
    {
        try {
            $request->validate([
                'otp' => 'required|string|max:6|min:1'
            ]);
            $email = $request->session()->get('registration_email');
            if (!$email) {
                return redirect()->back()->with('error', 'Verification session expired. Please register again.');
            }
            $otp = $request->input('otp');
            $user = User::where('email', $email)->where('otp', $otp)->first();
            if (!$user) {
                return redirect()->back()->with('error', 'Invalid OTP. Please enter the correct OTP.');
            }
            // Update user after successful verification
            $user->update([
                'otp' => 0,
                'email_verified_at' => now(),
            ]);
            // Remove registration email from session
            $request->session()->forget('registration_email');
            return redirect()->route('home');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    // verify otp
    public function resendOtp(Request $request)
    {
        try {
            $email = $request->session()->get('registration_email');
            if (!$email) {
                return redirect()->back()->with('error', 'Verification session expired. Please register again.');
            }
            $otp = rand(100000, 999999);
            $user = User::where('email', $email)->select('id', 'otp')
                ->first();
            if (!$user) {
                return redirect()->back()->with('error', 'Invalid Session gmail');
            }
            Mail::to($email)->send(new SendOTP($otp));
            // Update user after successful verification
            $user->update([
                'otp' =>  $otp,
            ]);
            return redirect()->back()->with('success', 'Otp send Successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    //reset password
    public function userResetPassword(Request $request)
    {
        try {
            $request->validate([
                'password' => 'required|string|max:50|min:8'
            ]);
            $email = $request->header('email');
            $user = User::where('email', '=', $email)->update(["password" => Hash::make($request->input('password'))]);
            $token = $request->bearerToken()
                ?? $request->cookie("token")
                ?? $request->header("token");
            return ApiResponse::success(message: "Password Set Successfully", data: $user)->withoutCookie('token');
        } catch (Exception $e) {
            return ApiResponse::error(message: 'unauthorized', error_data: $e->getMessage(),);
        }
    }
}
