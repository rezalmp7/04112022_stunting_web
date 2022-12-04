<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Artikel;

class HomeController extends Controller
{
    public function index() {
        $page = array('page' => "home");
        $artikel = artikel::limit(5)->get();

        return view('home', compact(
            'artikel',
            'page'
        ));
    }
}
