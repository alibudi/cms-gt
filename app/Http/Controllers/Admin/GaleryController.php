<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
            $thumbnail = date('Ymd') . time() . '.' . $uploadThumbnail->getClientOriginalExtension();
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
            return redirect()->route('photo');
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
          $images = Gallery::findOrFail($id);
        return view('',compact('images'));
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
        $request->validate([
             "alt"     => "required",
            "cover"     => "required",
        ]);

        $post = Gallery::find($id);
        $post->alt        = $request->alt;

        $uploadThumbnail = $request->file('path');
        if (!empty($uploadThumbnail)) {
            $thumbnail = time() . Str::random(22) . '.' . $uploadThumbnail->getClientOriginalExtension();
            $destinationPath = public_path('img/article/thumbnail');
            $img = Image::make($uploadThumbnail->path());
            $img->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $thumbnail, 50);

            //hapus file
            File::delete(public_path('img/artikel/thumbnail') . '/' . $post->path);
            $post->path = $thumbnail;
        }

        if ($post->save()) {
            Alert::success('Sukses!', 'Berhasil perbarui data.');
            return redirect()->route('photo');
        }

        Alert::success('Error!', 'Gagal perbarui data.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $images = Gallery::findOrFail($id);
           File::delete(public_path('img/artikel/thumbnail') . '/' . $images->path);
        if ($images->delete()) {
           
            Alert::success('Hapus Sukses', 'Sukses Hapus Data');
            return redirect()->route('photo');
        }

        Alert::success('Gagal Hapus', 'Gagal Hapus Data');
        return redirect()->route('photo');
        // $del = Gallery::find($id);
        // if(File::exists(public_path('img/article/thumbnail/'.$del->gambar))){
        //     File::delete(public_path('img/article/thumbnail/'.$del->gambar));
        // }
        // $del->delete();      
        // // return redirect('photo');
        // dd($del);
    }

    public function photo()
    {
        $photo = Gallery::paginate(10);
        return view('image.photo',compact('photo'));
    }

    public function photoFrame()
    {
        $photo = Gallery::paginate(10);
        return view('image.show',compact('photo'));
    }
    
}
