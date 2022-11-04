<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelHomeController extends Controller
{
    public function index() {
        $artikel = Artikel::all();

        return view('artikel', compact('artikel'));
    }
    public function show($id) {
        $artikel = Artikel::find($id);

        return view('artikelShow', compact('artikel'));
    }
}
