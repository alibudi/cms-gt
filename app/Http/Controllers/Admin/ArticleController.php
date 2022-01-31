<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('article.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags       = Tag::all();
        return view('article.create',compact('categories','tags'));
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
            "title"    => "required",
            "content"     => "required",
            "description"      => "required",
            "id_channel"  => "required",
            "tags"      => "array|required",  
            "id_editor"  => "required",
            "status" => "required",
        ]);

        // $uploadThumbnail = $request->file('cover');
        // if (!empty($uploadThumbnail)) {
        //     $thumbnail = time() . Str::random(22) . '.' . $uploadThumbnail->getClientOriginalExtension();
        //     $destinationPath = public_path('img/artikel/thumbnail');
        //     $img = Image::make($uploadThumbnail->path());
        //     $img->resize(700, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //     })->save($destinationPath . '/' . $thumbnail, 50);
        // }

        $data = [
            'title'     => $request->title,
            // 'cover'     => $thumbnail,
            'content' => $request->content,
            'id_editor' => Auth::user()->id,
            'id_channel' => $request->id_channel,
            'description' => $request->description,
            'status' => $request->status,
            // 'meta_desc' => $request->meta_desc,
        ];

        $article = Article::create($data);
        $article->tags()->attach($request->tags);
        if ($article) {
            Alert::success('Sukses!', 'Berhasil Menambahkan data.');
            return redirect()->route('article.index');
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
