<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $publish = Article::where('status',1)->count();
        $draft = Article::where('status',0)->count();;
        return view('dashboard.index', compact('publish','draft'));
    }
}
