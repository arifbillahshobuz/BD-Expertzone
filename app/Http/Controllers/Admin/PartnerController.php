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
    public function index():View|RedirectResponse
    {
        try {
            return view('content.pathName.pathNameList');
        } catch (Exception $exception) {
            return redirect()->back()->with('error',$exception->getMessage());
        }
    }
    public function list(): JsonResponse
    {
        try {
            $data = Partner::all();
            return response()->json([
                'status'=> 'success',
                'data'=>$data,
                'message'=> 'data fetch successfully!'
            ],200);
        } catch (Exception $exception) {
            return response()->json([
                'status'=> 'fail',
                'message'=> 'something went wrong!',
                'error'=> $exception->getMessage()
            ],200);
        }
    }

    public function create():View|RedirectResponse
    {
        try {
            return view("content.pathName.pathNameAdd");
        } catch (Exception $exception) {
            return redirect()->back()->with('error',$exception);
        }
    }

    public function edit($id):View|RedirectResponse
    {
        try {
            $data = Partner::findOrFail($id);
            return view("content.pathName.pathNameEdit", compact('data'));
        } catch (Exception $exception) {
            return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
        }
    }

    public function destroy(Request $request):JsonResponse
    {
        try {
            $data = Partner::findOrFail($request->input('id'));
            $data->delete();
            return response()->json(['success' => true]);
        } catch (Exception $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'key' => 'required|string'
            ]);
            $fileName = null;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName() . '.' . date('Ymdhis').'.'.$file->getClientOriginalExtension();
                $file->move("demo/", $fileName);
            }
            Partner::create([
                'database' => $request->input('from'),
                'image' => $fileName
            ]);
            return redirect()->route('routeName')->with(['success'=>"Partner Create Successfully"],200);
        } catch (ValidationException $validationException) {
            return redirect()->back()->with('error', $validationException->getMessage())->withInput();
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }

    public function update(Request $request, $id): RedirectResponse
    {
        try {
            $data = Partner::findOrFail($id);
            $request->validate([
                'from' => 'required'
            ]);
            $fileName = $data->image;
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required'
                ]);
                if (file_exists(public_path('demo/' . $fileName))) {
                    unlink(public_path('demo/' . $fileName));
                }
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName() . '.' . date('Ymdhis').'.'.$file->getClientOriginalExtension();
                $file->move("demo/", $fileName);
            }
            $data->update([
                'database' => $request->input('from'),
                'image' => $fileName
            ]);
            return redirect()->route('routeName')->with(['success'=>"Partner Update Successfully"],200);
        } catch (ValidationException $validationException) {
            return redirect()->back()->with('error', $validationException->getMessage())->withInput();
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }
}
