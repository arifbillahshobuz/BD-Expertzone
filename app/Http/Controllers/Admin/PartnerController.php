<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\Partner;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PartnerController extends Controller
{
    public function index(): View|RedirectResponse
    {
        try {
            $designations = Designation::all();
            $partners = Partner::with('designation:id,title')->get();
            return view('admin.pages.partner.list', compact(['partners','designations']));
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
    public function destroy( Partner $partner) : \Illuminate\Http\RedirectResponse
    {
        try {
            $partner->delete();
            if (file_exists(public_path('upload/partner/' . $partner->image))) {
                unlink(public_path('upload/partner/' . $partner->image));
            }
            return redirect()->route('admin.partner.index')->with('success', 'partner deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Post Category.');
        }
    }
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        try {
//            dd($request->all());
            $request->validate([
                'first_name' => 'required|string|max:50',
                'last_name' => 'nullable|string|max:50',
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:partners,email'],
                'phone' => 'required|string',
                'image' => 'required',
                'address' => 'nullable|string|max:100',
                'company' => 'nullable|string|max:50',
                'designation_id' => 'required',
            ]);
            $fileName = null;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName() . '.' . date('Ymdhis').'.'.$file->getClientOriginalExtension();
                $file->move("uploads/partner", $fileName);
            }
            Partner::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'company' => $request->input('company'),
                'designation_id' => $request->input('designation_id'),
                'image' => $fileName
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Partner created successfully',
                    'redirect' => route('admin.partner.index')
                ]);
            }

            return redirect()->route('admin.partner.index')
                ->with('success', 'Partner created successfully');
        } catch (ValidationException $e) {
            if ($request->ajax()) {
                return response()->json(['errors' => $e->errors()], 422);
            }
            throw $e;
        } catch (Exception $exception) {
            if ($request->ajax()) {
                return response()->json(['message' => $exception->getMessage()], 500);
            }
            return redirect()->back()
                ->with('error', 'Something went wrong: ' . $exception->getMessage())
                ->withInput();
        }
    }

    public function update(Request $request, Partner $partner): RedirectResponse|JsonResponse
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

            if ($request->ajax()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Partner updated successfully',
                    'redirect' => route('admin.partner.index')
                ]);
            }

            return redirect()->route('admin.partner.index')
                ->with('success', 'Partner updated successfully');
        } catch (ValidationException $e) {
            if ($request->ajax()) {
                return response()->json(['errors' => $e->errors()], 422);
            }
            throw $e;
        } catch (Exception $exception) {
            if ($request->ajax()) {
                return response()->json(['message' => $exception->getMessage()], 500);
            }
            return redirect()->back()
                ->with('error', 'Failed to update partner')
                ->withInput();
        }
    }
}
