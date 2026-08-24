<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        if (!auth()->user()->hasPermissionTo('post-create')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        $postCategories = PostCategory::all();
        return view('admin.posts.create', compact('postCategories'));
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->user()->hasPermissionTo('post-create')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        $request->validate([
            'content' => 'required',
            'post_category_id' => 'required|exists:post_categories,id',
            'media.*' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov,webm|max:20480',
        ]);

        $mediaPaths = [];
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $filename = time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/posts'), $filename);
                $mediaPaths[] = 'uploads/posts/' . $filename;
            }
        }
        Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'post_category_id' => $request->post_category_id,
            'media' => $mediaPaths,
            'slug' => Str::slug(Str::limit(strip_tags($request->content), 50)),
            'type' => Post::TYPE_ADMIN, // Marker for admin post
            'post_type' => 'admin',
            'is_published' => true,
            'published_at' => now(),
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Admin post created successfully.');
    }

    /**
     * Display a listing of posts for admin management.
     */
    public function index()
    {
        if (!auth()->user()->hasPermissionTo('post-list')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        // Load all posts with user and counts (admin + user posts as requested)
        $posts = Post::with(['user', 'category'])->withCount(['comments', 'reactions'])->latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Display the specified post history/details.
     */
    public function show(Post $post)
    {
        if (!auth()->user()->hasPermissionTo('post-list')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        $post->load(['user', 'category', 'comments.user', 'reactions.user']);
        $post->loadCount(['comments', 'reactions']);
        
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit(Post $post)
    {
        if (!auth()->user()->hasPermissionTo('post-edit')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        $postCategories = PostCategory::all();
        return view('admin.posts.edit', compact('post', 'postCategories'));
    }

    /**
     * Update the specified post in storage (Admin Overwrite).
     */
    public function update(Request $request, Post $post)
    {
        if (!auth()->user()->hasPermissionTo('post-edit')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        $request->validate([
            'content' => 'required',
            'post_category_id' => 'nullable|exists:post_categories,id',
            'is_published' => 'required|boolean',
            'is_featured' => 'required|boolean',
        ]);

        $data = $request->only(['content', 'post_category_id', 'is_published', 'is_featured']);
        
        // Handle media if uploaded
        if ($request->hasFile('media')) {
            $mediaPaths = [];
            foreach ($request->file('media') as $file) {
                $filename = time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/posts'), $filename);
                $mediaPaths[] = 'uploads/posts/' . $filename;
            }
            // Append or replace? For admin edit, usually replace is safer or merge
            $data['media'] = array_merge($post->media ?? [], $mediaPaths);
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(Post $post)
    {
        if (!auth()->user()->hasPermissionTo('post-delete')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        $post->delete(); // Soft delete as per model
        return redirect()->route('admin.posts.index')->with('success', 'Post moved to trash.');
    }
}
