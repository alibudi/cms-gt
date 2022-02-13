<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeadlineController extends Controller
{
    public function index()
    {
        return view('headline-wp.index');
    }

    public function create()
    {
        return view('headline-wp.create');
    }
}
