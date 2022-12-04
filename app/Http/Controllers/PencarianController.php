<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Pemeriksaan;

class PencarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = array('page' => "pencarian");

        $pasien = array();
        if($_GET) {
            if($_GET["search"]) {
                $whereLike = "%".$_GET["search"]."%";
                $pasien = pasien::where('nama', 'like', $whereLike)->get();
            }
        }

        return view('pencarian', compact('pasien', 'page'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $page = array('page' => "pencarian");
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

        return view('pencarianShow', compact('pemeriksaan', 'pasien', 'filter', 'page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
