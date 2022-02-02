<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(String $status)
    {
        $article = Article::join('channel','channel.id','=','article.id_channel')
        ->join('users','users.id','=','article.id_editor')
        ->select('article.*','users.*','channel.*')
        ->where('article.status','=',$status)
        ->get();
        // dd($article);
        return view('article.index',compact('article'));
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
        $author = User::all();
        return view('article.create',compact('categories','tags','author'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     "title"    => "required",
        //     "content"     => "required",
        //     "description"      => "required",
        //     "id_channel"  => "required", 
        //     "id_editor"  => "required",
        //     "status" => "required",
        // ]);
        // $data = [
        //     'title'     => $request->title,
        //     // 'cover'     => $thumbnail,
        //     'content' => $request->content,
        //     'id_editor' => Auth::user()->id,
        //     'id_channel' => $request->id_channel,
        //     'description' => $request->description,
        //     'status' => $request->status,
        //     // 'meta_desc' => $request->meta_desc,
        // ];

        // $article = Article::create($data);
        // $article->tags()->attach($request->tags);
        // if ($article) {
        //     Alert::success('Sukses!', 'Berhasil Menambahkan data.');
        //     return redirect()->route('article.index');
        // }
        // dd($article);
        // Alert::success('Error!', 'Gagal menambahkan data');
        // return redirect()->back();
          $validator = Validator::make($request->all(), [
            "title"     => "required|unique:article,title",
            "description"     => "required",
            "content"      => "required",
            "id_channel"  => "required",
            "tags"      => "array|required",  
            "id_editor"  => "required",
            "status" => "required",
        ]);
        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->content = $request->content;
        $article->id_channel = $request->id_channel;
        $article->id_editor = Auth::user()->id;
        $article->status  = $request->status;
        $article->save();
        $article->tags()->attach($request->tags);
        $article->author()->attach($request->author);
        if ($article) {
            Alert::success('Sukses!', 'Berhasil Menambahkan data.');
            return redirect()->route('article.index');
        }
        Alert::success('Error!', 'Gagal menambahkan data');
        return redirect()->back();
        // dd($article);
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
