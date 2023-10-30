<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    public function detailPeminjamans(){
        return $this->hasMany(DetailPeminjaman::class, "id_peminjaman", "id");
    }

    public function peminjam(){
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id');
    }
}
