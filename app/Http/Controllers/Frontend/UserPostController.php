<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Validation\ValidationException;


class UserPostController extends Controller
{

    /**
     * Show a single post with comments.
     *
     * @param Post $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        // Load post with relationships
        $post->load([
            'user',
            'reactions.user',
            'comments.user',
            'comments.replies.user'
        ]);

        $user = auth()->user();
        $partners = \App\Models\Partner::all();
        $friends = collect();
        $friendRequests = collect();
        $jobPosts = collect();
        $feedAdminPosts = collect();

        // Admin posts for top of feed
        $feedAdminPosts = Post::with([
            'user:id,name,username,avatar,email,phone,password,role,designation_id',
            'reactions',
            'comments',
            'comments.user'
        ])->where('post_type', 'admin')->latest()->published()->take(7)->get();

        if ($user) {
            $friends = $user->friends()->take(10)->get();
            $friendRequests = \App\Models\FriendRequest::where('receiver_id', $user->id)
                ->where('status', 'pending')
                ->with('sender')->latest()->take(5)->get();

            $jobPosts = Post::with('user')
                ->where(function ($query) use ($user) {
                    if ($user->designation_id) {
                        $query->whereHas('user', function ($q) use ($user) {
                            $q->where('designation_id', $user->designation_id)
                                ->where('id', '!=', $user->id);
                        })->where('post_type', 'user');
                    }
                    $query->orWhere('post_type', 'admin');
                })->latest()->published()->take(10)->get();
        }

        return view('user-interface.pages.post.single', compact(
            'post',
            'partners',
            'friends',
            'friendRequests',
            'jobPosts',
            'feedAdminPosts'
        ));
    }

    /**
     * Store a new user post.
     *
     * @param Request $request
     * @return RedirectResponse
     */



    public function store(Request $request): JsonResponse
    {
        try {
            if (Auth::user() && !Auth::user()->hasVerifiedEmail()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please verify your email address before posting.',
                    'require_verification' => true
                ], 403);
            }

            $user = Auth::user();
            $mediaPaths = [];

            if ($request->hasFile('media')) {
                foreach ($request->file('media') as $file) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $uploadPath = public_path('uploads/post');

                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0775, true);
                    }

                    $file->move($uploadPath, $filename);
                    $mediaPaths[] = 'uploads/post/' . $filename;
                }
            }

            $post = Post::create([
                'content' => $request->input('content'),
                'media' => !empty($mediaPaths) ? $mediaPaths : null,
                'slug' => Str::slug(Str::limit($request->input('content'), 50)) . '-' . time(),
                'is_published' => true,
                'type' => Post::TYPE_USER,
                'post_type' => 'user',
                'user_id' => $user->getKey(),
                'post_category_id' => null,
                'published_at' => now(),
                'is_featured' => false,
            ]);

            // Notify followers
            $followersToNotify = $user->followers()->wherePivot('notify', 1)->get();
            foreach ($followersToNotify as $follower) {
                $follower->notify(new \App\Notifications\NewPostNotification($post));
            }

            // Notify friends
            foreach ($user->friends()->get() as $friend) {
                if (!$followersToNotify->contains($friend)) {
                    $friend->notify(new \App\Notifications\NewPostNotification($post));
                }
            }
            ToastMagic::success('Post created successfully!');
            return response()->json(['success' => true]);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => collect($e->errors())->flatten()->first()
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * Update user post.
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        // Only allow the owner to update
        if (Auth::id() !== $post->user_id) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
            }
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'content' => 'nullable|string|max:5000',
            'media.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi|max:20480',
        ]);

        // Update content
        $post->content = $request->input('content');

        // Handle new media uploads
        if ($request->hasFile('media')) {
            // Delete old media files from disk if replacing
            if ($post->media && is_array($post->media)) {
                foreach ($post->media as $oldFile) {
                    $oldPath = public_path($oldFile);
                    if (file_exists($oldPath) && is_file($oldPath)) {
                        unlink($oldPath);
                    }
                }
            }

            $mediaPaths = [];
            foreach ($request->file('media') as $file) {
                if ($file->isValid()) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $uploadPath = public_path('uploads/post');
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0775, true);
                    }
                    $file->move($uploadPath, $filename);
                    $mediaPaths[] = 'uploads/post/' . $filename;
                }
            }
            $post->media = $mediaPaths;
        }

        $post->save();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Post updated successfully!',
                'media' => $post->media,
                'content' => $post->content
            ]);
        }

        ToastMagic::success('Post updated successfully!');
        return redirect()->back();
    }

    /**
     * Delete user post.
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post)
    {
        // Only allow the owner to delete
        if (Auth::id() !== $post->user_id) {
            abort(403, 'Unauthorized');
        }

        // Delete associated media files from disk
        if ($post->media && is_array($post->media)) {
            foreach ($post->media as $file) {
                $filePath = public_path($file);
                if (file_exists($filePath) && is_file($filePath)) {
                    unlink($filePath);
                }
            }
        }

        $post->delete();
        ToastMagic::success('Post deleted successfully!');
        return redirect()->back();
    }
}
