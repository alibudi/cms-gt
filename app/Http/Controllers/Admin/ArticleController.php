<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $article = DB::table('article')->join('channel','channel.id','=','article.id_channel')
        ->join('users','users.id','=','article.id_editor')->select('article.*','users.name','channel.name as category')->latest()->paginate(5);
        // $article = Article::join('channel','channel.id','=','article.id_channel')
        // ->join('users','users.id','=','article.id_editor')
        // ->select('article.*','users.name','channel.name as category')
        // ->latest()->paginate(5);
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
