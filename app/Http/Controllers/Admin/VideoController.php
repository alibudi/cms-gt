<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Videos;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Videos::all();
        return view('video.index', compact('videos'));
    }

    public function create()
    {
        return view('video.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'image' => 'required',
            'url' => 'required',
            // 'alt' => 'required',
        ]);

        $video = new Videos();
        // $video->image = $request->image;
        $video->url = $request->url;
        // $video->alt = $request->alt;
        $video->save();

        return redirect()->route('videos.index')->with('success', 'Video added successfully');
    }

    public function edit($id)
    {
        $video = Videos::find($id);
        return view('admin.video.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // 'image' => 'required',
            'url' => 'required',
            // 'alt' => 'required',
        ]);

        $video = Videos::find($id);
        // $video->image = $request->image;
        $video->url = $request->url;
        // $video->alt = $request->alt;
        $video->save();

        return redirect()->route('videos.index')->with('success', 'Video updated successfully');
    }

    public function destroy($id)
    {
        $video = Videos::find($id);
        $video->delete();
        return redirect()->route('admin.video.index')->with('success', 'Video deleted successfully');
    }
}
