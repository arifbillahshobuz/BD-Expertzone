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
use App\Models\Post;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;

class UserProfileController extends Controller
{
    /**
     * show user profile .
     *
     * @param User|null $user Optional user to view profile for
     * @return View
     */
    public function userProfile(User $user = null): View
    {

        // If no user is provided, show the authenticated user's profile
        if (!$user) {
            $user = Auth::user();
        }

        // Load user with relationships
        $user->load([
            'profile',
            'friends',
            'followers',
            'following',
            'designation'
        ]);

        // Get user's posts
        $posts = Post::with(['user', 'reactions.user', 'comments.user', 'comments.replies.user'])
            ->where('user_id', $user->id)
            ->published()
            ->latest()
            ->paginate(10);

        // Get statistics
        $stats = [
            'posts_count' => $user->posts()->published()->count(),
            'friends_count' => $user->friends()->count(),
            'followers_count' => $user->followers()->count(),
            'following_count' => $user->following()->count(),
            'total_views' => 0, // You can implement view counting later
        ];

        // Get recent friends (for friends tab)
        $recentFriends = $user->friends()->latest('friends.created_at')->take(20)->get();

        // Get close friends (if you have a pivot column for this)
        $closeFriends = $user->friends()->take(10)->get(); // Modify based on your logic

        // Check if the current authenticated user is viewing their own profile
        $isOwnProfile = Auth::check() && Auth::id() === $user->id;

        // Check friendship status if viewing another user's profile
        $friendshipStatus = null;
        if (!$isOwnProfile && Auth::check()) {
            $friendshipStatus = $this->getFriendshipStatus(Auth::user(), $user);
        }

        return view('user-interface.pages.user.profile', compact(
            'user',
            'posts',
            'stats',
            'recentFriends',
            'closeFriends',
            'isOwnProfile',
            'friendshipStatus'
        ));
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

            // Handle avatar upload
            if ($request->hasFile('avatar')) {
                $avatarFile = $request->file('avatar');

                // Delete old avatar if exists
                if ($user->profile && $user->profile->avatar) {
                    $oldAvatarPath = public_path($user->profile->avatar);
                    if (file_exists($oldAvatarPath)) {
                        unlink($oldAvatarPath);
                    }
                }

                // Generate unique filename
                $avatarExtension = $avatarFile->getClientOriginalExtension();
                $avatarFilename = 'avatar_' . $user->id . '_' . time() . '.' . $avatarExtension;

                // Ensure directory exists
                $avatarUploadPath = public_path('uploads/avatars');
                if (!file_exists($avatarUploadPath)) {
                    mkdir($avatarUploadPath, 0755, true);
                }

                // Move file to public directory
                $avatarFile->move($avatarUploadPath, $avatarFilename);
                $validatedData['avatar'] = 'uploads/avatars/' . $avatarFilename;
            }

            // Handle CV upload
            if ($request->hasFile('cv')) {
                $cvFile = $request->file('cv');

                // Delete old CV if exists
                if ($user->profile && $user->profile->cv) {
                    $oldCvPath = public_path($user->profile->cv);
                    if (file_exists($oldCvPath)) {
                        unlink($oldCvPath);
                    }
                }

                // Generate unique filename
                $cvExtension = $cvFile->getClientOriginalExtension();
                $cvFilename = 'cv_' . $user->id . '_' . time() . '.' . $cvExtension;

                // Ensure directory exists
                $cvUploadPath = public_path('uploads/cvs');
                if (!file_exists($cvUploadPath)) {
                    mkdir($cvUploadPath, 0755, true);
                }

                // Move file to public directory
                $cvFile->move($cvUploadPath, $cvFilename);
                $validatedData['cv'] = 'uploads/cvs/' . $cvFilename;
            }

            // Update user's basic info (name, username)
            $user->update([
                'name' => $validatedData['name'] ?? $user->name,
                'username' => $validatedData['username'] ?? $user->username,
            ]);

            // Remove user table fields from profile data
            unset($validatedData['name'], $validatedData['username']);

            // Update or create profile
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
                $finalName = 'avatar_' . time() . '.' . $avatar->getClientOriginalExtension();
                $path = 'uploads/avatars/' . $finalName;

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
            ToastMagic::error('Something went wrong: ' . $exception->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Get friendship status between two users
     *
     * @param User $currentUser
     * @param User $targetUser
     * @return string|null
     */
    private function getFriendshipStatus(User $currentUser, User $targetUser): ?string
    {
        // Check if they are already friends
        if ($currentUser->friends()->where('friend_id', $targetUser->id)->exists()) {
            return 'friends';
        }

        // Check if current user has sent a friend request to target user
        if ($currentUser->sentFriendRequests()->where('receiver_id', $targetUser->id)->where('status', 'pending')->exists()) {
            return 'request_sent';
        }

        // Check if target user has sent a friend request to current user
        if ($currentUser->receivedFriendRequests()->where('sender_id', $targetUser->id)->where('status', 'pending')->exists()) {
            return 'request_received';
        }

        // No relationship exists
        return 'none';
    }

    /**
     * Show user profile by identifier (username or id).
     *
     * @param string $identifier
     * @return View|\Illuminate\Http\RedirectResponse
     */
    public function showByIdentifier(string $identifier)
    {
        // Try username first, then id
        $user = User::where('username', $identifier)->first();
        if (!$user && ctype_digit($identifier)) {
            $user = User::findOrFail((int) $identifier);
            // Optional: redirect to canonical username URL if different
            if ($user->username !== $identifier) {
                return redirect()->route('user.profile.show', $user->username);
            }
        }
        if (!$user) {
            abort(404);
        }
        return $this->userProfile($user);
    }

    /**
     * Download user's CV file
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse|\Illuminate\Http\RedirectResponse
     */
    public function downloadCV(Request $request)
    {
        try {
            $user = Auth::user();

            if (!$user->profile || !$user->profile->cv) {
                abort(404, 'CV not found');
            }

            $cvPath = public_path($user->profile->cv);

            if (!file_exists($cvPath)) {
                abort(404, 'CV file not found');
            }

            $fileName = 'CV_' . $user->name . '_' . date('Y-m-d') . '.pdf';

            return response()->download($cvPath, $fileName);

        } catch (\Throwable $exception) {
            ToastMagic::error('Unable to download CV: ' . $exception->getMessage());
            return redirect()->back();
        }
    }
}
