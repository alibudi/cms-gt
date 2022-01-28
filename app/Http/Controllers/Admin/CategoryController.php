<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'name'   => 'required'
        ]);
        $data = [
            'name'   => $request->name,
            'slug'   => Str::slug($request->name),

        ];

        $categories = Category::create($data);
        // dd($category);
        if ($categories) {
            Alert::success('Sukses Tambah', 'Sukses Tambah Data');
            return redirect()->route('categori.index');
        }

        Alert::success('Gagal Tambah', 'Gagal Tambah Data');
        return redirect()->route('categori.create'); 
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
        $categoris = Category::findOrFail($id);
        return view('category.edit',compact('categories'));
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
            'name'   => 'required',
            'slug' => 'required'
        ]);

        $categories = Category::find($id);
        $categories->name = $request->name;
         $categories->name = Str::slug($request->slug);

        if ($categories->update()) {
            Alert::success('Sukses Update', 'Sukses Update Data');
            return redirect()->route('categori.index');
        }

        Alert::success('Gagal Update', 'Gagal Update Data');
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
          $categories = Category::findOrFail($id);
        if ($categories->delete()) {
            Alert::success('Hapus Sukses', 'Sukses Hapus Data');
            return redirect()->route('categori.index');
        }

        Alert::success('Gagal Hapus', 'Gagal Hapus Data');
        return redirect()->route('categori.index');
    }
}
