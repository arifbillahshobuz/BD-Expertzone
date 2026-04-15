<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Designation;
use App\Models\PostCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\View\View;


class PostCategoryController extends Controller
{
    public function index(): View
    {
        if (!auth()->user()->hasPermissionTo('post-category-list')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        $postCategories = PostCategory::all();
//        dd($postCategories);
        return view('admin.pages.postCategory.list', compact('postCategories'));
    }
    public function store(Request $request) :RedirectResponse|JsonResponse
    {
        if (!auth()->user()->hasPermissionTo('post-category-create')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        try {
            $request->validate([
                'title' => 'required|string|unique:post_categories,title|max:255',
            ]);
            PostCategory::create([
                'title' => $request->input('title'),
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Post Category created successfully.',
                    'redirect' => route('admin.post.category.index')
                ]);
            }

            return redirect()->route('admin.post.category.index')->with('success', 'Post Category created successfully.');
        } catch (ValidationException $e) {
            if ($request->ajax()) {
                return response()->json(['errors' => $e->errors()], 422);
            }
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['message' => $e->getMessage()], 500);
            }
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function update(Request $request, PostCategory $postcategory) :RedirectResponse|JsonResponse
    {
        if (!auth()->user()->hasPermissionTo('post-category-edit')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        try {
            $request->validate([
                'title' => 'required|string|max:255|unique:post_categories,title,' . $postcategory->id,
            ]);
            $postcategory->update([
                'title' => $request->input('title'),
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Post Category updated successfully.',
                    'redirect' => route('admin.post.category.index')
                ]);
            }

            return redirect()->route('admin.post.category.index')->with('success', 'Post Category updated successfully.');
        } catch (ValidationException $e) {
            if ($request->ajax()) {
                return response()->json(['errors' => $e->errors()], 422);
            }
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['message' => $e->getMessage()], 500);
            }
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function destroy(PostCategory $postcategory) :RedirectResponse
    {
        if (!auth()->user()->hasPermissionTo('post-category-delete')) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        try {
            $postcategory->delete();
            return redirect()->route('admin.post.category.index')->with('success', 'Post Category deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Post Category.');
        }
    }
}
