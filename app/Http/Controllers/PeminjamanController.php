<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
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
        $bukus = Buku::all();
        $dateNow = date('Y-m-d');
        return view ('dashboard.dashboard', ['pageName' => $pageName, 'navbarType' => $navbarType, 'menu'=>$menu, 'anggotas'=>$anggotas, 'dateNow'=>$dateNow, 'bukus'=>$bukus]);


    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required',
            'tgl_peminjaman' => 'date|required',
            'tgl_kembali' => 'date|required'
        ]);

        if($request->id_buku == null){
            return redirect('/pinjam')->with('errorNoBook', 'Data Buku Pinjaman Tidak Boleh Kosong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
