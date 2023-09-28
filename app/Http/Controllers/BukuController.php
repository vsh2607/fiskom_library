<?php

namespace App\Http\Controllers;

use App\Imports\BukusImport;
use App\Models\Buku;
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
        Buku::truncate();
        Excel::import(new BukusImport, $file);
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
