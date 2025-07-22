<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Validation\ValidationException;


class UserPostController extends Controller
{


    /**
     * Store a new user post.
     *
     * @param Request $request
     * @return RedirectResponse
     */

    public function store(Request $request)
    {
        try {
            $request->validate([
                'content' => 'nullable|string|max:5000',
                'media.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi|max:20480', // 20MB max
            ]);

            $user = auth()->user();

            // Media upload (if file exists)
            $mediaPaths = [];

            if ($request->hasFile('media')) {
                foreach ($request->file('media') as $file) {
                    if ($file->isValid()) {
                        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $uploadPath = public_path('uploads/post');

                        if (!file_exists($uploadPath)) {
                            mkdir($uploadPath, 0775, true);
                        }

                        $file->move($uploadPath, $filename);
                        $mediaPaths[] = 'uploads/post/' . $filename;
                    } else {
                        throw ValidationException::withMessages([
                            'media' => 'One or more media files failed to upload correctly.'
                        ]);
                    }
                }
            }

            Post::create([
                'content' => $request->input('content'),
                'media' => !empty($mediaPaths) ? $mediaPaths : null,
                'slug' => Str::slug(Str::limit($request->input('content'), 50)) . '-' . time(),
                'is_published' => true,
                'type' => Post::TYPE_USER,
                'user_id' => $user->id,
                'post_category_id' => null,
                'published_at' => now(),
                'is_featured' => false,
            ]);

            ToastMagic::success('Post created successfully!');
            return redirect()->back();

        } catch (ValidationException $e) {
            ToastMagic::error('Validation failed: ' . $e->getMessage());
            throw $e;
        } catch (\Exception $e) {
            ToastMagic::error('Failed to create post: ' . $e->getMessage());
            throw ValidationException::withMessages(['error' => 'Failed to create post.']);
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
        $ownerId = $post->user_id ?? ($post->user->id ?? null);
        if (auth()->id() !== $ownerId) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'content' => 'nullable|string|max:5000',
            'media.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi|max:20480',
        ]);

        // Update content
        $post->content = $request->input('content');

        // Handle new media uploads
        $mediaPaths = [];
        if (is_array($post->media)) {
            $mediaPaths = $post->media;
        } elseif (is_string($post->media)) {
            $mediaPaths = json_decode($post->media, true) ?: [];
        }
        if ($request->hasFile('media')) {
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
        }

        // Remove media if requested (expects array of paths in remove_media[])
        if ($request->has('remove_media')) {
            $mediaPaths = array_diff($mediaPaths, $request->input('remove_media', []));
        }

        $post->media = $mediaPaths;
        $post->save();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'content' => $post->content,
                'media' => $post->media,
                'post_id' => $post->id,
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
        $ownerId = $post->user_id ?? ($post->user->id ?? null);
        if (auth()->id() !== $ownerId) {
            abort(403, 'Unauthorized');
        }
        $post->delete();
        ToastMagic::success('Post deleted successfully!');
        return redirect()->back();
    }
}

