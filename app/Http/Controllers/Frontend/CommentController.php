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

        if ($request->ajax()) {
            $reply->load('user');
            $commentHtml = view('user-interface.pages.post.partials.single_comment', ['comment' => $reply])->render();
            return response()->json(['success' => true, 'comment_html' => $commentHtml]);
        }

        return redirect()->back()->with('success', 'Reply posted successfully!');
    }

    // Delete a comment (and its replies via cascade)
    public function destroy(Comment $comment)
    {
        // Optional: Add authorization check here
        if (auth()->id() !== $comment->user_id) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        $comment->delete();

        return response()->json(['success' => true]);
    }
}