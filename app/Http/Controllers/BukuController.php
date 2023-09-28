<?php

namespace App\Http\Controllers;

use App\Imports\BukusImport;
use App\Models\Buku;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BukuController extends Controller
{

    public function index()
    {
        $pageName = "FISKOM Library System - Data Buku";
        $navbarType = "navbar_filled";
        $menu = "buku.buku_list";
        $bukus = Buku::all();
        return view ('dashboard.dashboard', ['pageName' => $pageName, 'navbarType' => $navbarType, 'menu'=>$menu, 'bukus'=>$bukus]);
    }

    public function create()
    {

    }


    public function store(Request $request)
    {
        $request->validate([
            'file_upload' => 'required|mimes:xlsx,xls|file'
        ]);

        $file = $request->file('file_upload');
        $buku = Buku::all();
        try{
            Buku::truncate();
            Excel::import(new BukusImport, $file);
        }catch(Exception $e){
            foreach($buku as $item){
                $otherBuku = new Buku();

                $otherBuku->id = $item->id;
                $otherBuku->created_at = $item->created_at;
                $otherBuku->updated_at = $item->updated_at;
                $otherBuku->judul_buku = $item->judul_buku;
                $otherBuku->penyusun_buku = $item->penyusun_buku;
                $otherBuku->penerbit = $item->penerbit;
                $otherBuku->kode_buku = $item->kode_buku;
                $otherBuku->tahun_terbit = $item->tahun_terbit;
                $otherBuku->jumlah = $item->jumlah;
                $otherBuku->save();
            }
            return redirect('/list-buku')->with('errorBuku', "Pastikan Data Buku Yang Dimasukkan Sudah Benar!");
        }
        return redirect('/list-buku')->with('success', 'Data Buku Berhasil Ditambahkan');
    }


    public function show(Buku $buku)
    {

    }


    public function edit(Buku $buku)
    {
        //
    }


    public function update(Request $request, Buku $buku)
    {
        //
    }


    public function destroy(Buku $buku)
    {
        //
    }
}
