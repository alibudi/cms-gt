<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('image.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->validate([
            "alt"    => "required",
            "path"     => "required",
           
        ]);

        $uploadThumbnail = $request->file('path');
        if (!empty($uploadThumbnail)) {
            $thumbnail = time() . Str::random(22) . '.' . $uploadThumbnail->getClientOriginalExtension();
            $destinationPath = public_path('img/article/thumbnail');
            $img = Image::make($uploadThumbnail->path());
            $img->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $thumbnail, 50);
        }

        $data = [
            'alt'     => $request->alt,
            'path'     => $thumbnail,
        ];

        $post = Gallery::create($data);
        // $post->tags()->attach($request->tags);
        if ($post) {
            Alert::success('Sukses!', 'Berhasil Menambahkan data.');
            return redirect()->route('galeri.index');
        }

        Alert::success('Error!', 'Gagal menambahkan data');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
