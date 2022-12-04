<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = array('page' => "artikel");
        $artikel = artikel::all();
        
        return view('admin/artikel/index', compact('artikel', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/artikel/create');
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
            'judul' => 'required|string',
            'gambar' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'isi' => 'required|string',
        ]);

        $imageName = time().'.'.$request->gambar->extension();

        // Public Folder
        $upload = $request->gambar->move(public_path('images/artikel'), $imageName);

        $dataStore = array(
            'judul' => $request->judul,
            'gambar' => $imageName,
            'description' => $request->isi,
            'create_by' => Auth()->user()->name
        );

        artikel::insert($dataStore);

        return redirect(url('/admin/artikel'))->with('msgSuccess', 'Artikel Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = artikel::find($id);

        return view('admin/artikel/show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = artikel::find($id);

        return view('admin/artikel/edit', compact('artikel'));
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
            'judul' => 'required|string',
            'gambar' => 'image|mimes:png,jpg,jpeg|max:2048',
            'isi' => 'required|string',
        ]);

        $artikel = artikel::find($id);

        if (! $request->hasFile('gambar')) {
            $gambar = $artikel->gambar;
        } else {
            $imageName = time().'.'.$request->gambar->extension();

            if (file_exists(public_path('images/artikel'.$artikel->gambar))){
                unlink(public_path('images/artikel'.$artikel->gambar));
            }

            // Public Folder
            $uploadImage = $request->gambar->move(public_path('images/artikel'), $imageName);

            $gambar = $imageName;
        }

        $dataUpdate = array(
            'judul' => $request->judul,
            'gambar' => $gambar,
            'description' => $request->isi,
            'create_by' => Auth()->user()->name
        );

        artikel::find($id)->update($dataUpdate);

        return redirect(url('admin/artikel'))->with('msgSuccess', 'Artikel Berhasil terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        artikel::find($id)->delete();

        return redirect(url('admin/artikel'))->with('msgSuccess', 'Artikel Berhasil dihapus');
    }
}
