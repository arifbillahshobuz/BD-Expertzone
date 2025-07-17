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
                $action = 'removed';
            } else {
                $action = 'none';
            }

            if ($request->ajax()) {
                $view = view('components.reaction-button', [
                    'reactable' => $reactable,
                    'user' => $user
                ])->render();

                return response()->json([
                    'html' => $view,
                    'action' => $action,
                    'message' => $action === 'removed' ? 'Reaction removed' : 'No reaction to remove'
                ]);
            }

            return $action === 'removed'
                ? back()->with('success', 'Reaction removed')
                : back()->with('error', 'No reaction to remove');
        }

        // Only validate for POST (not DELETE)
        if ($request->isMethod('POST')) {
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

            if ($request->ajax()) {
                $view = view('components.reaction-button', [
                    'reactable' => $reactable,
                    'user' => $user
                ])->render();

                return response()->json([
                    'html' => $view,
                    'action' => $action,
                    'message' => 'Reaction ' . $action
                ]);
            }

            return back()->with('success', 'Reaction ' . $action);
        }

        // Fallback for unsupported methods
        return response()->json(['message' => 'Unsupported request method.'], 405);
    }
}
