<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pemeriksaan;
use App\Models\Pasien;
use App\Models\Artikel;

class HomeController extends Controller
{
    public function index() {
        $today = date('Y-m-d');
        $page = array('page' => "home");
        $artikel = artikel::limit(5)->get();

        $pemeriksaan_tanggal = array();
        $pemeriksaan_all_array = array();
        $pemeriksaan_kurang_gizi_array = array();
        for ($i=0; $i < 12; $i++) { 
            $day = date('Y-m-d', strtotime('-'.$i.' day', strtotime($today)));
            
            $pemeriksaan_all_eloquent = pemeriksaan::select('pasien_id')->whereBetween('created_at', [$day.' 00:00:00', $day.' 23:59:59'])->get();
            $pemeriksaan_all = $pemeriksaan_all_eloquent->groupBy('pasien_id')->count();

            $pemeriksaan_kurang_gizi_eloquent = pemeriksaan::select('pasien_id')->whereBetween('created_at', [$day.' 00:00:00', $day.' 23:59:59'])->where('kategori', 'kurang gizi')->get();
            $pemeriksaan_kurang_gizi = $pemeriksaan_kurang_gizi_eloquent->groupBy('pasien_id')->count();

            array_push($pemeriksaan_all_array, $pemeriksaan_all);
            array_push($pemeriksaan_kurang_gizi_array, $pemeriksaan_kurang_gizi);
            array_push($pemeriksaan_tanggal, date('d M', strtotime($day)));
        }

        return view('home', compact(
            'artikel',
            'page',
            'pemeriksaan_all_array',
            'pemeriksaan_kurang_gizi_array',
            'pemeriksaan_tanggal'
        ));
    }
}
