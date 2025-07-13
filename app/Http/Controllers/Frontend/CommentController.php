<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    // Store a new comment on a post
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
        ]);

        return redirect()->back()->with('success', 'Comment posted successfully!');
    }

    // Reply to a comment (nested comment)
    public function reply(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // The post_id comes from the original comment's post_id
        Comment::create([
            'post_id' => $comment->post_id,
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
            'parent_id' => $comment->id,
        ]);

        return redirect()->back()->with('success', 'Reply posted successfully!');
    }

    // Delete a comment (and its replies via cascade)
    public function destroy(Comment $comment)
    {
        // Optional: Add authorization check here
        if (auth()->id() !== $comment->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
