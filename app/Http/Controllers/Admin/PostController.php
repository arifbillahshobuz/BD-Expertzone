<?php

namespace App\Http\Controllers\Admin;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
class PostController extends Controller
{
    public function index(): View|RedirectResponse
    {
        try {
            $posts = Post::where("type", "=","1")->with('category')->get();
            $postCategories = PostCategory::select('id','title')->get();
            return view('admin.pages.post.list', compact(['posts','postCategories']));
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed to load partner page');
        }
    }
    public function list(): JsonResponse
    {
        try {
            $partners = Partner::all();
            return response()->json([
                'status' => 'success',
                'data' => $partners,
                'message' => 'Partners fetched successfully'
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch partners',
                'error' => config('app.debug') ? $exception->getMessage() : null
            ], 500);
        }
    }
    public function destroy( Post $post) : \Illuminate\Http\RedirectResponse
    {
        try {
            $post->delete();
            if (file_exists(public_path('uploads/post/' . $post->media))) {
                unlink(public_path('uploads/post/' . $post->media));
            }
            return redirect()->route('admin.post.index')->with('success', 'Post deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Post Category.');
        }
    }
    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'content' => 'required',
                'media' => 'required',
                'post_category_id' => 'required',
            ]);
            $fileName = null;
            if ($request->hasFile('media')) {
                $file = $request->file('media');
                $fileName = $file->getClientOriginalName() . '.' . date('Ymdhis').'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/post'), $fileName);
            }
            Post::create([
                'content' => $request->input('content'),
                'media' => $fileName,
                'slug' => Str::slug(Str::words(strip_tags($request->input('content')), 10, ''), '-'),
                'is_published' => true,
                'type' => 1,
                'user_id' => Auth::id(),
                'post_category_id' => $request->input('post_category_id'),
                'is_featured' => true,
                'published_at' => now(),
            ]);

            return redirect()->route('admin.post.index')
                ->with('success', 'Post created successfully');
        } catch (Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage())
                ->withInput();
        }
    }

    public function update(Request $request, Partner $partner): RedirectResponse
    {
        try {
            $request->validate([
                'first_name' => 'required|string|max:50',
                'last_name' => 'nullable|string|max:50',
                'email' => ['required'],
                'phone' => 'required|string',
                'address' => 'nullable|string|max:100',
                'company' => 'nullable|string|max:50',
                'designation_id' => 'required',
            ]);
            $fileName = $partner->image;

            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required'
                ]);
                if (file_exists(public_path('uploads/partner/' . $fileName))) {
                    unlink(public_path('uploads/partner/' . $fileName));
                }
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName() . '.' . date('Ymdhis').'.'.$file->getClientOriginalExtension();
                $file->move("uploads/partner/", $fileName);
            }

            $partner->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'company' => $request->input('company'),
                'designation_id' => $request->input('designation_id'),
                'image' => $fileName
            ]);

            return redirect()->route('admin.partner.index')
                ->with('success', 'Partner updated successfully');
        } catch (Exception $exception) {
            return redirect()->back()
                ->with('error', 'Failed to update partner')
                ->withInput();
        }
    }
}
