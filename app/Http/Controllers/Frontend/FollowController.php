<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    // Follow a user
    public function follow($userId)
    {
        $user = Auth::user();
        if ($user->getKey() == $userId) {
            return response()->json(['success' => false, 'message' => 'You cannot follow yourself.'], 400);
        }
        $user->following()->syncWithoutDetaching([$userId]);
        // Send notification to the followed user
        $followed = User::find($userId);
        if ($followed) {
            $followed->notify(new \App\Notifications\NewFollowerNotification($user));
        }
        return response()->json(['success' => true, 'message' => 'Followed user.']);
    }

    // Unfollow a user
    public function unfollow($userId)
    {
        $user = Auth::user();
        if ($user->getKey() == $userId) {
            return response()->json(['success' => false, 'message' => 'You cannot unfollow yourself.'], 400);
        }
        $user->following()->detach($userId);
        return response()->json(['success' => true, 'message' => 'Unfollowed user.']);
    }

    // Toggle notification preference for a followed user
    public function toggleNotification($userId)
    {
        $user = Auth::user();
        if ($user->getKey() == $userId) {
            return response()->json(['success' => false, 'message' => 'Invalid action.'], 400);
        }
        $exists = $user->following()->where('followed_id', $userId)->exists();
        if (!$exists) {
            return response()->json(['success' => false, 'message' => 'You must follow the user first.'], 400);
        }
        $current = DB::table('followers')
            ->where('follower_id', $user->getKey())
            ->where('followed_id', $userId)
            ->value('notify');
        $new = !$current;
        DB::table('followers')
            ->where('follower_id', $user->getKey())
            ->where('followed_id', $userId)
            ->update(['notify' => $new]);
        return response()->json(['success' => true, 'notify' => $new]);
    }
}
