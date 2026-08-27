<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOTP;
use App\Models\Designation;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use League\Config\Exception\ValidationException;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $designations = Designation::all();
        return view('auth.register', compact('designations'));
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'lowercase', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
                'phone' => ['required', 'string', 'max:20', 'min:11'],
                'designation_id' => ['required', 'exists:designations,id'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $name = $request->input('name');
            $email = $request->input('email');
            $otp = rand(100000, 999999);

            $user = User::updateOrCreate(
                [
                    'email' => $email,
                ],
                [
                    'name' => $name,
                    'username' => $request->input('username'),
                    'phone' => $request->input('phone'),
                    'designation_id' => $request->input('designation_id'),
                    'password' => Hash::make($request->input('password')),
                    'role' => 'user',
                    'otp' => $otp,
                    'email_verified_at' => null,
                ]
            );
            // Store email in session
            $request->session()->put('registration_email', $email);
            // send opp
            Mail::to($email)->send(new SendOTP($otp, $name));
            // Assign Spatie 'user' role automatically
            $role = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);
            $user->assignRole($role);
            // Consistency with AuthenticatedSessionController
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            Auth::login($user);

            return redirect()->route('verification.notice');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
