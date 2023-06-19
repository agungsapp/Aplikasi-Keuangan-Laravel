<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'data' => UserModel::all(),
            'routestore' => 'admin.user.store',
            'routeupdate' => 'admin.user.update',
        ];

        // return bcrypt(123);
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'name' => 'required',
                'username' => 'required|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
            ],
            [
                'name.required' => 'nama tidak boleh kosong !',
                'username.required' => 'username tidak boleh kosong !',
                'email.required' => 'email tidak boleh kosong !',
                'password.required' => 'password tidak boleh kosong !',
                'username.unique' => 'username tidak tersedia !',
                'email.unique' => 'email ini sudah pernah digunakan !',
                'password.min' => 'password minimal 6 karakter !',
                'password.confirmed' => 'password tidak cocok !',
            ]
        );
        $user = $request->username;

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->roles,
            'password' => bcrypt($request->password),
        ]);
        // return "username : " . $user;
        return redirect()->route('admin.user.index')->with('success', 'Berhasil menambah data user baru !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function show(UserModel $userModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function edit(UserModel $userModel)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserModel $userModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::where('id', $id)->delete();
        return redirect()->route('admin.user.index')->with('success', 'Berhasil delete data user !');
    }
}
