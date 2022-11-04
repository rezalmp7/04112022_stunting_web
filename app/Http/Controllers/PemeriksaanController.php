<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = pasien::all();

        return view('admin/pemeriksaan/index', compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pasien = pasien::find($id);

        return view('admin/pemeriksaan/create', compact('pasien'));
    }

    public function createPasien() {
        return view('admin/pasien/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'namaDokter' => 'required|string',
            'description' => 'required|string'
        ]);

        $dataStore = array(
            'pasien_id' => $id,
            'namaDokter' => $request->namaDokter,
            'description' => $request->description,
            'created_by' => Auth()->user()->name
        );

        pemeriksaan::insert($dataStore);

        return redirect(url('admin/pasien/'.$id.'/show'))->with('msgSuccess', 'Pemeriksaan Berhasil diTambahkan');
    }
    public function storePasien(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'umur' => 'required|integer',
            'alamat' => 'required|string',
            'tmpLahir' => 'required|string',
            'tglLahir' => 'required|date',
            'orangTua' => 'required|string'
        ]);

        $dataStore = array(
            'nama' => $request->nama,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'tmpLahir' => $request->tmpLahir,
            'tglLahir' => $request->tglLahir,
            'orangTua' => $request->orangTua 
        );

        pasien::insert($dataStore);

        return redirect(url('admin/pemeriksaan'))->with('msgSuccess', 'Pasien Berhasil diTambahkan');
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
    public function showPasien(Request $request, $id) {
        $filter = $request->filter;
        
        $pasien = pasien::find($id);
        if($filter != null) {
            $filter_array = explode(' to ', $filter);
            if(count($filter_array) == 1) {
                $pemeriksaan = pemeriksaan::where('pasien_id', $id)->whereBetween('created_at', [$filter.' 00:00:00', $filter.' 23:59:59'])->orderBy('created_at', 'DESC')->get();
            } else {
                $pemeriksaan = pemeriksaan::where('pasien_id', $id)->whereBetween('created_at', [$filter_array[0].' 00:00:00', $filter_array[1].' 23:59:59'])->orderBy('created_at', 'DESC')->get();
            }
        } else {
            $pemeriksaan = pemeriksaan::where('pasien_id', $id)->orderBy('created_at', 'DESC')->get();
        }

        return view('admin/pasien/show', compact('pasien', 'pemeriksaan', 'filter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemeriksaan = pemeriksaan::find($id);
        $pasien = pasien::find($pemeriksaan->pasien_id);
        return view('admin/pemeriksaan/edit', compact('pemeriksaan', 'pasien'));
    }
    public function editPasien($id)
    {
        $pasien = pasien::find($id);

        return view('admin/pasien/edit', compact('pasien'));
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
        $pemeriksaan = pemeriksaan::find($id);
        $pasien = pasien::find($pemeriksaan->pasien_id);

        $request->validate([
            'namaDokter' => 'required|string',
            'description' => 'required|string'
        ]);

        $dataUpdate = array(
            'namaDokter' => $request->namaDokter,
            'description' => $request->description,
            'created_by' => Auth()->user()->name 
        );

        pemeriksaan::find($id)->update($dataUpdate);

        return redirect(url('admin/pasien/'.$pasien->id.'/show'))->with('msgSuccess', 'Pemeriksaan Berhasil terupdate');
    }
    public function updatePasien(Request $request, $id)
    {
        $pasien = pasien::find($id);

        $request->validate([
            'nama' => 'required|string',
            'umur' => 'required|integer',
            'alamat' => 'required|string',
            'tmpLahir' => 'required|string',
            'tglLahir' => 'required|date',
            'orangTua' => 'required|string'
        ]);

        $dataUpdate = array(
            'nama' => $request->nama,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'tmpLahir' => $request->tmpLahir,
            'tglLahir' => $request->tglLahir,
            'orangTua' => $request->orangTua 
        );

        pasien::find($id)->update($dataUpdate);

        return redirect(url('admin/pemeriksaan'))->with('msgSuccess', 'Pasien Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemeriksaan = pemeriksaan::find($id);
        $pasien = pasien::find($pemeriksaan->pasien_id);

        pemeriksaan::find($id)->delete();

        return redirect(url('admin/pasien/'.$pasien->id.'/show'))->with('msgSuccess', 'Pemeriksaan berhasil di hapus');
    }

    public function destroyPasien($id) {
        $pasien = pasien::find($id);

        pasien::find($id)->delete();
        pemeriksaan::where('pasien_id', $id)->delete();

        return redirect(url('admin/pemeriksaan'))->with('msgSuccess', 'Pasien Berhasil di hapus');
    }
}
