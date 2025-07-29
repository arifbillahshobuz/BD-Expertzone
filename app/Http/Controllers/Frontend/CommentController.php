<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Store a new comment on a post
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = $post->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
        ]);

        if ($request->ajax()) {
            $comment->load('user'); // Eager load the user relationship
            $data = [
                'id' => $comment->id,
                'content' => $comment->content,
                'user' => [
                    'id' => $comment->user->id,
                    'name' => $comment->user->name,
                    'avatar' => $comment->user->avatar,
                ],
                'created_at' => $comment->created_at->toIso8601String(),
                'post_id' => $comment->post_id,
                'parent_id' => null, // It's a main comment
            ];
            event(new \App\Events\CommentCreated($data));
            return response()->json(['success' => true, 'comment' => $data]);
        }

        return redirect()->back()->with('success', 'Comment posted successfully!');
    }

    // Reply to a comment (nested comment)
    public function reply(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $reply = Comment::create([
            'post_id' => $comment->post_id,
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
            'parent_id' => $comment->id,
        ]);

        // Notify parent comment's user if not replying to self
        if ($comment['user_id'] && $comment['user_id'] !== Auth::id()) {
            $comment->user->notify(new \App\Notifications\CommentReplyNotification($reply));
        }

        if ($request->ajax()) {
            $reply->load('user');
            // Prepare data for real-time event (do NOT include HTML to avoid Pusher size limit)
            $data = [
                'id' => $reply['id'],
                'content' => $reply['content'],
                'user' => [
                    'id' => $reply->user['id'],
                    'name' => $reply->user['name'],
                    'avatar' => $reply->user['avatar'],
                ],
                'created_at' => $reply['created_at']->toIso8601String(),
                'post_id' => $reply['post_id'],
                'parent_id' => $reply['parent_id'],
            ];
            // Fire the same event as for main comments (no HTML)
            event(new \App\Events\CommentCreated($data));
            // Only return HTML in AJAX response (not in event)
            $commentHtml = view('user-interface.pages.post.partials.single_comment', ['comment' => $reply])->render();
            $data['html'] = $commentHtml;
            return response()->json(['success' => true, 'comment' => $data]);
        }

        return redirect()->back()->with('success', 'Reply posted successfully!');
    }

    // Delete a comment (and its replies via cascade)
    public function destroy(Comment $comment)
    {
        // Allow AJAX hard delete for both comment and reply
        if (!Auth::check() || Auth::id() !== $comment->getAttribute('user_id')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }
        $comment->delete();
        // Broadcast real-time event for deletion
        if (request()->ajax()) {
            event(new \App\Events\CommentDeleted([
                'id' => $comment['id'],
                'parent_id' => $comment['parent_id'],
                'post_id' => $comment['post_id'],
            ]));
            return response()->json(['success' => true]);
        }
        // For non-AJAX (redirect) requests, show SweetAlert success
        // Do NOT delete on non-AJAX, just return error (to prevent reload)
        return abort(400, 'AJAX only');
    }

    // Hide a comment (AJAX, hard hide, returns JSON)
    public function hide(Request $request, Comment $comment)
    {
        // Allow AJAX hard hide for both comment and reply
        if (!Auth::check() || Auth::id() !== $comment->getAttribute('user_id')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }
        $comment->delete();
        return response()->json(['success' => true]);
    }
}