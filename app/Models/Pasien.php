<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    public $timestamp = true;

    protected $fillable = [
        'nama',
        'umur',
        'alamat',
        'orangTua',
        'tglLahir',
        'tmpLahir'
    ];
    
    public function pemeriksaans() {
        return $this->hasMany('App\Models\Pemeriksaan');
    }
}
