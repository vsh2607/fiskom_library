<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{

    public function index()
    {
        $pageName = "FISKOM Library System - Peminjaman Buku";
        $navbarType = "navbar_filled";
        $menu = "proses.peminjaman";
        $anggotas = Anggota::all();
        $bukus = Buku::where('jumlah', '>', 0)->get();
        $dateNow = date('Y-m-d');
        return view ('dashboard.dashboard', ['pageName' => $pageName, 'navbarType' => $navbarType, 'menu'=>$menu, 'anggotas'=>$anggotas, 'dateNow'=>$dateNow, 'bukus'=>$bukus]);


    }

    public function bookReturnPage(){
        $pageName = "FISKOM Library System - Pengembalian Buku";
        $navbarType = "navbar_filled";
        $pinjamans = Peminjaman::with(["detailPeminjamans", "peminjam"])->where('status', 1)->get();
        $menu = "proses.pengembalian";
        return view ('dashboard.dashboard', ['pageName' => $pageName, 'navbarType' => $navbarType, 'menu'=>$menu, 'pinjamans' => $pinjamans]);

    }

    public function bookReturn(String $id){
        $peminjaman = Peminjaman::with(['detailPeminjamans'])->where('id', $id)->first();
        $peminjaman->update(["status"=>0]);
        foreach($peminjaman->detailPeminjamans as $detail){
            Buku::where('id', $detail->id_buku)->increment('jumlah', 1);
        }

        return redirect('/kembali');
    }

    public function fetchBookReturnData(String $id){
        $peminjaman = Peminjaman::with(['detailPeminjamans'])->where('id', $id)->first();
        $detailPeminjaman = $peminjaman->detailPeminjamans;
        $bookData =  [];
        foreach($detailPeminjaman as $detail){
            $book = Buku::where('id', $detail->id_buku)->first();
            $bookData[] = [
                'book_name' => $book->judul_buku
            ];
        }

        return response()->json($bookData);
        
    }

  
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_anggota' => 'required',
            'tgl_peminjaman' => 'date|required|after_or_equal:today',
            'tgl_kembali' => 'date|required|after_or_equal:today'
        ]);

        if($request->id_buku == null){
            return redirect('/pinjam')->with('errorNoBook', 'Data Buku Pinjaman Tidak Boleh Kosong');
        }

        $autoGeneratedCode = "P-".$this->generateRandomString();
        $peminjamanData = Peminjaman::create([
            'id_anggota' => $data['id_anggota'],
            'peminjaman_autocode' => $autoGeneratedCode,
            'peminjaman_tgl_peminjaman' => $data['tgl_peminjaman'],
            'peminjaman_tgl_pengembalian' => $data['tgl_kembali'],
            'status' => 1,
        ]);

        $books = $request->id_buku;
        foreach($books as $book){
            Buku::where('id', $book)->decrement('jumlah', 1);
            DetailPeminjaman::create([
                'id_peminjaman' => $peminjamanData->id,
                'id_buku' => $book
            ]);
        }


        return redirect('/pinjam')->with('success', 'Peminjaman Buku berhasil ditambahkan');
        


    }


}
