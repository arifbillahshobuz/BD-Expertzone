<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view.
     */
    public function index(Request $request)
    {
        return view('admin.dashboard.index');
    }

}
