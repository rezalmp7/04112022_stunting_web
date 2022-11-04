<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user::all();

        return view('admin/admin/index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/admin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check username
        $cekUsername = user::where('username', $request->username)->count();
        if($cekUsername == 0) {
            $dataInput = array(
                'name' => $request->nama,
                'username' => $request->username,
                'password' =>  Hash::make($request->password),
            );
            user::insert($dataInput);

            return redirect(url('/admin/admin'))->with('msgSuccess', 'Admin Berhasil Ditambahkan');
        } else {
            return redirect(url('/admin/admin/create'))->with('msgFailed', 'Username Sudah Terpakai');
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
        $user = user::find($id);

        return view('admin/admin/edit', compact('user'));
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
        if($request->password != null) {
            $password = Hash::make($request->password);
        } else {
            $password = $request->passwordLama;
        }

        $user = user::find($id);

        $cekUsername = user::where('username', $request->username)->count();

        if($cekUsername == 0 || $request->username == $user->username) {
            $dataUpdate = array(
                'name' => $request->nama,
                'username' => $request->username,
                'password' => $password 
            );

            user::where('id', $id)->update($dataUpdate);

            return redirect(url('/admin/admin'))->with('msgSuccess', 'Admin Berhasil Ditambahkan');
        }
        else {
            return redirect(url('/admin/admin/'.$id.'/edit'))->with('msgFailed', 'Username sudah terpakai');
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
        user::find($id)->delete();

        return redirect(url('/admin/admin'))->with('msgSuccess', 'Admin Berhasil Ditambahkan');
    }
}
