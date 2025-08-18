<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\FriendRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\FriendRequestNotification;
use App\Notifications\FriendRequestAcceptedNotification;

class FriendController extends Controller
{
    // Send a friend request
    public function sendRequest(Request $request, $receiverId)
    {
        $senderId = Auth::id();
        if ($senderId == $receiverId) {
            return response()->json(['error' => 'Cannot send request to yourself'], 400);
        }
        $exists = FriendRequest::where('sender_id', $senderId)
            ->where('receiver_id', $receiverId)
            ->where('status', 'pending')
            ->exists();
        if ($exists) {
            return response()->json(['error' => 'Request already sent'], 400);
        }

        $friendRequest = FriendRequest::create([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'status' => 'pending',
        ]);

        // Send notification to the receiver
        $receiver = User::find($receiverId);
        $sender = Auth::user();

        if ($receiver) {
            $receiver->notify(new FriendRequestNotification($sender, $friendRequest));
        }

        return response()->json(['success' => 'Friend request sent']);
    }

    // Accept a friend request
    public function acceptRequest(Request $request, $requestId)
    {
        $friendRequest = FriendRequest::findOrFail($requestId);
        if ($friendRequest->receiver_id != Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        DB::transaction(function () use ($friendRequest) {
            $friendRequest->update(['status' => 'accepted']);
            // Add both users to friends table
            DB::table('friends')->insert([
                ['user_id' => $friendRequest->sender_id, 'friend_id' => $friendRequest->receiver_id, 'created_at' => now(), 'updated_at' => now()],
                ['user_id' => $friendRequest->receiver_id, 'friend_id' => $friendRequest->sender_id, 'created_at' => now(), 'updated_at' => now()],
            ]);
        });

        // Send notification to the sender that their request was accepted
        $sender = User::find($friendRequest->sender_id);
        $accepter = Auth::user();

        if ($sender) {
            $sender->notify(new FriendRequestAcceptedNotification($accepter));
        }

        return response()->json(['success' => 'Friend request accepted']);
    }

    // Decline a friend request
    public function declineRequest(Request $request, $requestId)
    {
        $friendRequest = FriendRequest::findOrFail($requestId);
        if ($friendRequest->receiver_id != Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        $friendRequest->update(['status' => 'declined']);
        return response()->json(['success' => 'Friend request declined']);
    }

    // Get pending friend requests for the current user
    public function getPendingRequests()
    {
        $friendRequests = FriendRequest::where('receiver_id', Auth::id())
            ->where('status', 'pending')
            ->with('sender')
            ->latest()
            ->get();

        return view('user-interface.pages.friend-requests', compact('friendRequests'));
    }

    // Get friends list for the current user
    public function getFriends()
    {
        $friends = Auth::user()->friends()->get();
        return view('user-interface.pages.friends', compact('friends'));
    }

    // Remove a friend
    public function removeFriend(Request $request, $friendId)
    {
        $userId = Auth::id();

        DB::transaction(function () use ($userId, $friendId) {
            // Remove both directions of the friendship
            DB::table('friends')
                ->where([
                    ['user_id', $userId],
                    ['friend_id', $friendId]
                ])
                ->orWhere([
                    ['user_id', $friendId],
                    ['friend_id', $userId]
                ])
                ->delete();
        });

        return response()->json(['success' => 'Friend removed successfully']);
    }
}
