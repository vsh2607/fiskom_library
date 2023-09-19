<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AnggotaController extends Controller
{

    //Menampilkan Halaman Tambah Anggota
    public function index()
    {
        $pageName = "FISKOM Library System - Tambah Anggota";
        $navbarType = "navbar_filled";
        $menu = "anggota.anggota_tambah";
        return view ('dashboard.dashboard', ['pageName' => $pageName, 'navbarType' => $navbarType, 'menu'=>$menu]);

    }


    public function create()
    {

    }
    //Menyimpan Data Anggota
    public function store(Request $request)
    {




        $request->validate([
            'name' => 'required|string',
            'nim' => [
                'required',
                Rule::unique('anggotas', 'nim')->whereNull('deleted_at'),
            ],
            'email' => [
                'required',
                Rule::unique('anggotas', 'email')->whereNull('deleted_at'),
            ],
            'prodi' => 'required|string|min:1',
            'no_wa'=> 'required',
            'alamat' => 'required',
            'dob' => 'date|required',
            'photo_path' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = "";


        if($request->photo_path != null){
            $image = $request->file('photo_path');
            $file_name = time().'_'.$request->nim . '.'. $image->getClientOriginalExtension();
            $path = $image->move('images/anggota', $file_name);
        }

        $data  = [
            'nim' => $request->nim,
            'name' => $request->name,
            'dob' => $request->dob,
            'prodi' => $request->prodi,
            'no_wa' => $request->no_wa,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'photo_path' => $path == null ? null : $path

        ];

        Anggota::create($data);
        return redirect('/tambah-anggota')->with('success', 'Anggota Berhasil Ditambahkan');

    }

    //Menampilkan List Anggota

    public function showListAnggota(){
        $pageName = "FISKOM Library System - List Anggota";
        $navbarType = "navbar_filled";
        $menu = "anggota.anggota_list";
        $anggotas = Anggota::orderBy('nim', 'asc')->get();
        return view('dashboard.dashboard', ['pageName' => $pageName, 'navbarType' => $navbarType, 'menu'=>$menu, 'anggotas' => $anggotas]);
    }

    public function show(string $id)
    {

    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        $anggota = Anggota::find($id);
        $agt_name = $anggota->name;
        Anggota::destroy($id);
        return redirect()->back()->with('deletedSuccess', "Anggota $agt_name berhasil dihapus");
    }
}
