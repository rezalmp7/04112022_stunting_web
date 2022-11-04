<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    public $timestamp = true;

    protected $fillable = [
        'judul',
        'gambar',
        'description',
        'create_by',
        'create_at',
    ];
}
