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

        // Handle unauthenticated user or missing id
        if (!$user || !method_exists($user, 'getAuthIdentifier') || !$user->getAuthIdentifier()) {
            if ($request->ajax()) {
                return response()->json([
                    'message' => 'You must be logged in to react.'
                ], 401);
            }
            return redirect()->route('login');
        }

        $userId = $user->getAuthIdentifier();

        // If DELETE method, remove the reaction
        if ($request->isMethod('DELETE')) {
            $existingReaction = $reactable->reactions()
                ->where('user_id', $userId)
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
            try {
                $validated = $request->validate([
                    'reaction_id' => 'required|integer|exists:reactions,id'
                ]);
            } catch (\Illuminate\Validation\ValidationException $e) {
                if ($request->ajax()) {
                    return response()->json([
                        'errors' => $e->errors(),
                        'message' => $e->getMessage(),
                    ], 422);
                }
                throw $e;
            }

            $reactionId = $validated['reaction_id'];

            // Check for existing reaction
            $existingReaction = $reactable->reactions()
                ->where('user_id', $userId)
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
                    'user_id' => $userId,
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
        if ($request->ajax()) {
            return response()->json(['message' => 'Unsupported request method.'], 405);
        }
        return back()->with('error', 'Unsupported request method.');
    }
}
