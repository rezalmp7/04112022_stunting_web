<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    public $timestamp = true;

    protected $fillable = [
        'pasien_id',
        'namaDokter',
        'tinggi_badan',
        'berat_badan',
        'lingkar_kepala',
        'lingkar_badan',
        'kategori',
        'catatan',
        'created_by'
    ];

    public function pasien() {
        return $this->belongsTo('App\Models\Pasien');
    }
}
