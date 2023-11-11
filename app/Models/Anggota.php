<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'nim', 'name', 'dob', 'prodi', 'no_wa', 'email', 'alamat', 'photo_path'];

    
}
