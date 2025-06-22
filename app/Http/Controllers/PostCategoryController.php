<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\PostCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PostCategoryController extends Controller
{
    public function index(): View
    {
        $postCategories = PostCategory::all();
//        dd($postCategories);
        return view('admin.pages.postCategory.list', compact('postCategories'));
    }
    public function store(Request $request) :RedirectResponse
    {
        try {
            $request->validate([
                'title' => 'required|string|unique:designations,title|max:255',
            ]);
            PostCategory::create([
                'title' => $request->input('title'),
            ]);
            return redirect()->route('admin.post.category.index')->with('success', 'Post Category created successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function update(Request $request, PostCategory $postcategory) :RedirectResponse
    {
        try {
            $request->validate([
                'title' => 'required|string|max:50' . $postcategory->id . '|',
            ]);
            $postcategory->update([
                'title' => $request->input('title'),
            ]);
            return redirect()->route('admin.post.category.index')->with('success', 'Post Category updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function destroy( PostCategory $postcategory) :RedirectResponse
    {
        try {
            $postcategory->delete();
            return redirect()->route('admin.post.category.index')->with('success', 'Post Category deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Post Category.');
        }
    }
}
