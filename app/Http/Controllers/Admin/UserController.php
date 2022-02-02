<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed',
        ];
 
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $user = User::create([
            'name'              => ucwords(strtolower($request->name)),
            'email'             => strtolower($request->email),
            'password'          => bcrypt($request->password),
            'remember_token'    => Str::random(50),
 
        ]);
        $user->role()->sync($request['group_id']);
        // dd($user);
        if($user){
            Alert::success('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('users.index');
        } else {
            Alert::success('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('users.create');
        }
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
        // $users = DB::table('users_groups')->join('role','role.id','=','users_groups.group_id')
        // ->join('users','users.id','=','users_groups.user_id')
        // ->where('users.id','=',$id)
        // ->select('users.name','users.email','role.name as role','users_groups.user_id as id')->get();
        // dd($users);
        $roles = Role::all();
          $users = User::findOrFail($id);
        return view('user.edit',compact('users','roles'));
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
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;

        $users->save();
        return redirect()->route('users.index');
    }
    public function changePassword(Request $request, $id){

        $rules = [
            'old_password'          => 'required',
            'password'              => 'required|confirmed'
        ];
 
        $messages = [
            'old_password.required' => 'Password Lama wajib diisi',
            'password.required'     => 'Password Baru wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

         $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $users = User::find($id);
        $old_password = $users->password;
       

        if(Hash::check($request->input('old_password'), $old_password)){
            $users = User::find($id);

            $users->password = Hash::make($request->input('password'));

            if($users->save()){
                Alert::success('success', 'Change Password berhasil!');
                return redirect()->route('users.index');
            }
        }else{
            Alert::success('error', 'Change Password gagal!');
            return redirect()->route('users.index');
        }
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $users = User::findOrFail($id);
        if ($users->delete()) {
            Alert::success('Sukses!', 'Berhasil hapus data.');
            return redirect()->route('users.index');
        }

        Alert::success('Error!', 'Gagal hapus data.');
        return redirect()->route('users.index');
    }
}
