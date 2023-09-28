<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'judul_buku', 'penyusun_buku', 'penerbit', 'kode_buku', 'tahun_terbit', 'jumlah'];
}
