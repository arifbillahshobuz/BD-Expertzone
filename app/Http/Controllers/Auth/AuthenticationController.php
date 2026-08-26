<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOTP;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthenticationController extends Controller
{
    public function userSendOTP(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email'
            ]);
            $otp = rand(100000, 999999);
            $email = $request->input('email');
            $user = User::where('email', '=',  $email )->first();
            if ($user) {
                // send opp
                Mail::to($email)->send(new SendOTP($otp));
                //set Database otp
                 $user->update(['otp' => $otp]);
                return redirect()->route('verification.send');
            } else {
                return ApiResponse::error(message: 'Email not found', error_data: 'No account exists with this email address');
            }
        } catch (Exception $e) {
            return ApiResponse::error(error_data: $e->getMessage());
        }
    }
    // verify otp
    public function userVerifyOTP(Request $request)
    {
        try {            
            $request->validate([
                'otp' => 'required|string|max:10|min:6'
            ]);
           $email = $request->header('email');
            $otp = $request->input('otp');
            $user = User::where('email', '=', $email)->where('otp', '=', $otp)->first();              
            if ($user !== null) {
                // Update Database otp
                User::where('email', '=', $email)->where('otp', '=', $otp)->update(['otp' => 0]);
                //issu password reset token
                $resetToken = JWTToken::CreateTokenForResetPassword($email, $user->id);
                return ApiResponse::success(message: 'Otp Verify successfully', data: $resetToken)->cookie('token', $resetToken, 60 * 60);
            } else {
                return ApiResponse::error(message: 'Invalid OTP', error_data: 'The OTP code you entered is incorrect or has expired');
            }
        } catch (Exception $e) {
            return ApiResponse::error(message: 'unauthorized', error_data: $e->getMessage(),status_code:401);
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
            return ApiResponse::success(message:"Password Set Successfully", data: $user )->withoutCookie('token');
        } catch (Exception $e) {
            return ApiResponse::error(message: 'unauthorized', error_data: $e->getMessage(), );
        }
    }
}
