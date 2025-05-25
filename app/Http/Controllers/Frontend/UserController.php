<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display the user dashboard view.
     */
    public function index() :View
    {
        return view('frontend.app');
    }
}
