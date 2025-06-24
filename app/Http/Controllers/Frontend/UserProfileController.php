<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Designation;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\UserProfileUpdateRequest;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;

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
            return redirect()->back()->with('tab', 'personal-information');

        } catch (ValidationException $exception) {
            Log::error('Validation error while updating profile: ' . $exception->getMessage());
            ToastMagic::error('Validation error: ' . $exception->getMessage());
            return redirect()->back()->withErrors($exception->validator)->withInput();
        } catch (\Throwable $exception) {
            ToastMagic::error('Something went wrong: ' . $exception->getMessage());
            return redirect()->back()->with('tab', 'personal-information');
        }
    }

    /**
     * Show the form for changing the user password.
     *
     * @return
     */
    public function changePassword(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'current_password' => 'required|string|min:8',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = Auth::user();

            if (!Hash::check($request->input('current_password'), $user->password)) {
                throw ValidationException::withMessages([
                    'current_password' => ['The provided password does not match your current password.'],
                ]);
            }

            $user->password = Hash::make($request->input('password')); // Use input() directly
            $user->save();

            ToastMagic::success('Password changed successfully!');

            return Redirect::back()
                ->with('tab', 'chang-pwd');

        } catch (ValidationException $exception) {
            return Redirect::back()
                ->with('tab', 'chang-pwd') // Keep password tab active
                ->withErrors($exception->validator)
                ->withInput(); // Keep old input values
        } catch (\Throwable $exception) {
            return Redirect::back()
                ->with('tab', 'chang-pwd') // Keep password tab active
                ->withErrors(['error' => 'Something went wrong while changing the password. Please try again.']);
        }
    }

    /**
     * Update the user's cover photo.
     *
     * @param Request $request
     * @return RedirectResponse
     */

    public function updateCoverPhoto(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $user = Auth::user();
            if ($request->hasFile('cover_photo')) {
                $coverPhoto = $request->file('cover_photo');
                $finalName = time() . '.' . $coverPhoto->getClientOriginalExtension();
                // Store the file and get the path
                $path = 'uploads/cover-photos/' . $finalName;
                $coverPhoto->move(public_path('uploads/cover-photos'), $finalName);
                // Get old photo path before updating
                $oldPhoto = $user->profile->cover_photo ?? null;
                // Update the profile with the new path
                $user->profile()->updateOrCreate(
                    ['user_id' => $user->id],
                    ['cover_photo' => $path]
                );
                // Delete old photo after successful update
                if ($oldPhoto && file_exists(public_path($oldPhoto))) {
                    unlink(public_path($oldPhoto));
                }
                ToastMagic::success('Cover photo updated successfully!');
                return redirect()->back();
            }
            ToastMagic::error('No cover photo uploaded');
            return redirect()->back();

        } catch (ValidationException $exception) {
            return redirect()->back()
                ->withErrors($exception->validator)
                ->withInput();
        } catch (\Throwable $exception) {
            ToastMagic::error('Something went wrong: ' . $exception->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Update the user's avatar.
     *
     */
    public function updateProfilePhoto(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $user = Auth::user();
            if ($request->hasFile('avatar')) {
                $uploadPath = public_path('uploads/avatars');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                $avatar = $request->file('avatar');
                $finalName = 'avatar_'.time().'.'.$avatar->getClientOriginalExtension();
                $path = 'uploads/avatars/'.$finalName;

                $avatar->move($uploadPath, $finalName);

                $oldAvatar = $user->avatar !== 'default-avatar.jpg' ? $user->avatar : null;
                $user->avatar = $path;
                $user->save();

                // Delete old avatar after successful update
                if ($oldAvatar && file_exists(public_path($oldAvatar))) {
                    unlink(public_path($oldAvatar));
                }
                ToastMagic::success('Avatar updated successfully!');
                return redirect()->back();
            }
            ToastMagic::error('No avatar uploaded');
            return redirect()->back();

        } catch (ValidationException $exception) {
            return redirect()->back()
                ->withErrors($exception->validator)
                ->withInput();
        } catch (\Throwable $exception) {
            ToastMagic::error('Something went wrong: '.$exception->getMessage());
            return redirect()->back();
        }
    }
}
