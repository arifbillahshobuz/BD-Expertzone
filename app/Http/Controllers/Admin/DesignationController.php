<?php

namespace App\Http\Controllers\Admin;

use App\Models\Designation;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class DesignationController extends Controller
{
    public function index(): View
    {
        $designations = Designation::all();
        return view('admin.pages.designation.list', compact('designations'));
    }
    /**
     * Show the form for creating a new designation.
     */
    public function create(): View
    {
        return view('admin.pages.designation.create');
    }

    /**
     * Show the form for editing the specified designation.
     */
    public function store(Request $request) :RedirectResponse
    {
        try {
           $request->validate([
                'title' => 'required|string|unique:designations,title|max:255',
            ]);
            Designation::create([
                'title' => $request->input('title'),
            ]);
            return redirect()->route('admin.designation.index')->with('success', 'Designation created successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create designation.');
        }
    }

    /**
     * Show the form for editing the specified designation.
     */
    public function edit(Designation $designation) :View
    {
        return view('admin.pages.designation.edit', compact('designation'));
    }

    /**
     * Update the specified designation in storage.
     */
    public function update(Request $request, Designation $designation) :RedirectResponse
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255|unique:designations,title,' . $designation->id . '|',
            ]);
            $designation->update([
                'title' => $request->input('title'),
            ]);
            return redirect()->route('admin.designation.index')->with('success', 'Designation updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update designation.');
        }
    }

    /**
     * Remove the specified designation from storage.
     */
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
