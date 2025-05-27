<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
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
            return view('user-interface.pages.path.list');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed to load path page');
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

    public function create(): View|RedirectResponse
    {
        try {
            return view("content.pathName.pathNameAdd");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Failed to load create form')->withInput();
        }
    }

    public function edit(Partner $partner): View|RedirectResponse
    {
        try {
            return view("content.pathName.pathNameEdit", compact('partner'));
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Partner not found');
        }
    }

    public function destroy(Partner $partner): JsonResponse
    {
        try {
            $partner->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Partner deleted successfully'
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete partner'
            ], 500);
        }
    }

    public function store(PartnerStoreRequest $request): RedirectResponse
    {
        try {
            $fileName = $this->handleFileUpload($request->file('image'));

            Partner::create([
                'database' => $request->input('from'),
                'image' => $fileName
            ]);

            return redirect()->route('routeName')
                ->with('success', 'Partner created successfully');
        } catch (Exception $exception) {
            return redirect()->back()
                ->with('error', 'Failed to create partner')
                ->withInput();
        }
    }

    public function update(PartnerUpdateRequest $request, Partner $partner): RedirectResponse
    {
        try {
            $fileName = $partner->image;

            if ($request->hasFile('image')) {
                $fileName = $this->handleFileUpload($request->file('image'), $partner->image);
            }

            $partner->update([
                'database' => $request->input('from'),
                'image' => $fileName
            ]);

            return redirect()->route('routeName')
                ->with('success', 'Partner updated successfully');
        } catch (Exception $exception) {
            return redirect()->back()
                ->with('error', 'Failed to update partner')
                ->withInput();
        }
    }

    protected function handleFileUpload(?UploadedFile $file, string $existingFile = null): ?string
    {
        if (!$file) {
            return $existingFile;
        }

        // Delete old file if exists
        if ($existingFile && file_exists(public_path('demo/'.$existingFile))) {
            unlink(public_path('demo/'.$existingFile));
        }

        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
            . '.' . date('Ymdhis')
            . '.' . $file->getClientOriginalExtension();

        $file->move("demo/", $fileName);

        return $fileName;
    }
}
