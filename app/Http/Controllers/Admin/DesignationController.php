<?php

namespace App\Http\Controllers\Admin;

use App\Models\Designation;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class DesignationController extends Controller
{
    public function index(): View
    {
        $designations = Designation::all();
        return view('admin.pages.designation.list', compact('designations'));
    }
    public function store(Request $request) :RedirectResponse|JsonResponse
    {
        try {
           $request->validate([
                'title' => 'required|string|unique:designations,title|max:255',
            ]);
            Designation::create([
                'title' => $request->input('title'),
            ]);
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Designation created successfully.',
                    'redirect' => route('admin.designation.index')
                ]);
            }
            return redirect()->route('admin.designation.index')->with('success', 'Designation created successfully.');
        } catch (ValidationException $e) {
            if ($request->ajax()) {
                return response()->json(['errors' => $e->errors()], 422);
            }
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['message' => 'Failed to create designation.'], 500);
            }
            return redirect()->back()->with('error', 'Failed to create designation.');
        }
    }
    public function update(Request $request, Designation $designation) :RedirectResponse|JsonResponse
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255|unique:designations,title,' . $designation->id,
            ]);
            $designation->update([
                'title' => $request->input('title'),
            ]);
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Designation updated successfully.',
                    'redirect' => route('admin.designation.index')
                ]);
            }
            return redirect()->route('admin.designation.index')->with('success', 'Designation updated successfully.');
        } catch (ValidationException $e) {
            if ($request->ajax()) {
                return response()->json(['errors' => $e->errors()], 422);
            }
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['message' => 'Failed to update designation.'], 500);
            }
            return redirect()->back()->with('error', 'Failed to update designation.');
        }
    }
    public function destroy(Designation $designation) :RedirectResponse
    {
        try {
            $designation->delete();
            return redirect()->route('admin.designation.index')->with('success', 'Designation deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete designation.');
        }
    }
}
