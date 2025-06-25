<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Reaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReactionController extends Controller
{
    public function reactPost(Request $request, Post $post)
    {
        return $this->handleReaction($request, $post);
    }

    public function reactComment(Request $request, Comment $comment)
    {
        return $this->handleReaction($request, $comment);
    }

    private function handleReaction(Request $request, $reactable)
    {
        $user = $request->user();

        // If DELETE method, remove the reaction
        if ($request->isMethod('DELETE')) {
            $existingReaction = $reactable->reactions()
                ->where('user_id', $user->id)
                ->first();

            if ($existingReaction) {
                $existingReaction->delete();
                return back()->with('success', 'Reaction removed');
            }

            return back()->with('error', 'No reaction to remove');
        }

        // Validate the request for POST (adding reaction)
        $validated = $request->validate([
            'reaction_id' => 'required|integer|exists:reactions,id'
        ]);

        $reactionId = $validated['reaction_id'];

        // Check for existing reaction
        $existingReaction = $reactable->reactions()
            ->where('user_id', $user->id)
            ->first();

        if ($existingReaction) {
            // User already reacted - toggle or update
            if ($existingReaction->reaction_id == $reactionId) {
                // Same reaction - remove it
                $existingReaction->delete();
                $action = 'removed';
            } else {
                // Different reaction - update
                $existingReaction->update(['reaction_id' => $reactionId]);
                $action = 'updated';
            }
        } else {
            // Create new reaction
            $reactable->reactions()->create([
                'user_id' => $user->id,
                'reaction_id' => $reactionId
            ]);
            $action = 'added';
        }

        return back()->with('success', 'Reaction ' . $action);
    }
}
