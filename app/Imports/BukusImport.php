<?php

namespace App\Imports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BukusImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Buku([
            'judul_buku' => $row['judul_buku'],
            'penyusun_buku' => $row['penyusun_buku'],
            'penerbit' => $row['penerbit'],
            'kode_buku' => $row['kode_buku'],
            'tahun_terbit' => $row['tahun_terbit'],
            'jumlah' => $row['jumlah']
        ]);
    }
}
