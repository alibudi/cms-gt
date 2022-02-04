<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;
class TopikController extends Controller
{
    public function index()
    {
        $topik = Topic::all();
        return view('topik.index',compact('topik'));
    }

    public function create()
    {
        return view('topik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:topik_khusus',
            'description' => 'required',
            'image' => 'required',
        ]);
        
         $uploadThumbnail = $request->file('image');
        if (!empty($uploadThumbnail)) {
            $thumbnail = date('Ymd') . time() . '.' . $uploadThumbnail->getClientOriginalExtension();
            $destinationPath = public_path('img/article/thumbnail');
            $img = Image::make($uploadThumbnail->path());
            $img->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $thumbnail, 50);
        }

          $data = [
            'name'     => $request->name,
            'image'     => $thumbnail,
            'description' => $request->description,
        ];

        $topik = Topic::create($data);
        if ($topik) {
            Alert::success('Sukses!', 'Berhasil Menambahkan data.');
            return redirect()->route('topic.index');
        }

        Alert::success('Error!', 'Gagal menambahkan data');
        return redirect()->back();
    }

    public function edit($id)
    {
        $topik = Topic::findOrFail($id);
        return view('topik.edit',compact('topik'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        
         $uploadThumbnail = $request->file('image');
        if (!empty($uploadThumbnail)) {
            $thumbnail = date('Ymd') . time() . '.' . $uploadThumbnail->getClientOriginalExtension();
            $destinationPath = public_path('img/article/thumbnail');
            $img = Image::make($uploadThumbnail->path());
            $img->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $thumbnail, 50);
        }
          $data = [
            'name'     => $request->name,
            'description' => $request->description,
            'image'     => $thumbnail,
        ];

        $topik = Topic::findOrFail($id);
        $topik->update($data);
        if ($topik) {
            Alert::success('Sukses!', 'Berhasil Mengubah data.');
            return redirect()->route('topic.index');
        }

        Alert::success('Error!', 'Gagal Mengubah data');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $topik = Topic::findOrFail($id);
        $topik->delete();
        if ($topik) {
            Alert::success('Sukses!', 'Berhasil Menghapus data.');
            return redirect()->route('topic.index');
        }

        Alert::success('Error!', 'Gagal Menghapus data');
        return redirect()->back();
    }
}
