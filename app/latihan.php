<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class latihan extends Model
{
    protected $fillable = ['judul', 'pengarang', 'kategori', 'tahunTerbit', 'penerbit'];
}
