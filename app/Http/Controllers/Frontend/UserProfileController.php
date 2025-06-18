<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\View\View;
use App\Models\Designation;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\UserProfileUpdateRequest;

class UserProfileController extends Controller
{
    /**
     * show user profile .
     *
     * @return View
     */
    public function userProfile(): View
    {
        return view('user-interface.pages.user.profile');
    }


    /**
     * Show the form for editing the user profile.
     *
     * @return View
     */
    public function editProfile(): View
    {
        $designations = Designation::all();
        return view('user-interface.pages.user.profile-edit', compact('designations'));
    }

    /**
     * Update the user profile.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */



    public function updateProfile(UserProfileUpdateRequest $request): RedirectResponse
    {

        try {
            $user = Auth::user();

            $validatedData = $request->validated();

            if ($request->hasfile('avatar')) {
                $avatarFile = $request->file('avatar');
                $path = $avatarFile->move('uploads/avatars', 'public');
                $validatedData['avatar'] = $path;
            }

            // Handle CV upload
            if ($request->hasFile('cv')) {
                $cvFile = $request->file('cv');
                $path = $cvFile->move('uploads/cvs', 'public');
                $validatedData['cv'] = $path;
            }

            $user->profile()->updateOrCreate(
                ['user_id' => $user->id],
                $validatedData
            );

            ToastMagic::success('Profile updated successfully!');
            return redirect()->back();

        } catch (ValidationException $exception) {
            Log::error('Validation error while updating profile: ' . $exception->getMessage());
            ToastMagic::error('Validation error: ' . $exception->getMessage());
            return redirect()->back()->withErrors($exception->validator)->withInput();
        } catch (\Throwable $exception) {
            ToastMagic::error('Something went wrong: ' . $exception->getMessage());
            return redirect()->back();
        }
    }

}
