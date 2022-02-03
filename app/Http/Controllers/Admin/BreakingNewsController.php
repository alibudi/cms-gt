<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BreakingNews;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BreakingNewsController extends Controller
{
    public function index()
    {
        $news = BreakingNews::all();
        return view('breaking-news.index',compact('news'));
    }

    public function create()
    {
        return view('breaking-news.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "title"    => "required",
            "url"     => "required",
        ]);

        $data = [
            'title' => $request->title,
            'url' => $request->url,
        ];

        $news = BreakingNews::create($data);
        if ($news) {
            Alert::success('Sukses Tambah', 'Sukses Tambah Data');
            return redirect()->route('news.index');
        }

        Alert::success('Gagal Tambah', 'Gagal Tambah Data');
        return redirect()->route('news.create');
    }

    public function edit($id)
    {
        $news = BreakingNews::find($id);
        return view('breaking-news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "title"    => "required",
            "url"     => "required",
        ]);

        $news = BreakingNews::find($id);
        $news->title = $request->title;
        $news->url = $request->url;
        $news->save();

        Alert::success('Sukses Edit', 'Sukses Edit Data');
        return redirect()->route('news.index');
    }
}
