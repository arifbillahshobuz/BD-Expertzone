<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FriendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        FriendRequest::create([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'status' => 'pending',
        ]);
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
}
