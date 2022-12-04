<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelHomeController extends Controller
{
    public function index() {
        $page = array('page' => "artikel");
        $artikel = Artikel::all();

        return view('artikel', compact('artikel', 'page'));
    }
    public function show($id) {
        $page = array('page' => "artikel");
        $artikel = Artikel::find($id);

        return view('artikelShow', compact('artikel', 'page'));
    }
}
