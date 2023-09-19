<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
                Rule::unique('anggotas', 'nim')->whereNull('deleted_at'),'numeric'
            ],
            'email' => [
                'required',
                Rule::unique('anggotas', 'email')->whereNull('deleted_at'),
            ],
            'prodi' => 'required|string|min:1',
            'no_wa'=> 'required|numeric',
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
        $pageName = "FISKOM Library System - Detail Anggota";
        $navbarType = "navbar_filled";
        $menu = "anggota.anggota_detail";
        $anggota = Anggota::find($id);
        return view('dashboard.dashboard', ['pageName' => $pageName, 'navbarType' => $navbarType, 'menu'=>$menu, 'anggota'=>$anggota]);

    }


    public function edit(string $id)
    {
        $pageName = "FISKOM Library System - Edit Anggota";
        $navbarType = "navbar_filled";
        $menu = "anggota.anggota_edit";
        $anggota = Anggota::find($id);
        return view('dashboard.dashboard', ['pageName' => $pageName, 'navbarType' => $navbarType, 'menu'=>$menu, 'anggota'=>$anggota]);
    }


    public function update(Request $request, string $id)
    {

        $anggota = Anggota::find($id);
        $request->validate([
            'name' => 'required|string',
            'nim' => [
                'required',
            ],
            'email' => [
                'required',
            ],
            'prodi' => 'required|string|min:1',
            'no_wa'=> 'required|numeric',
            'alamat' => 'required',
            'dob' => 'date|required',
            'photo_path' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);


        $path = "";

        if($request->photo_path != null){
            $image = $request->file('photo_path');
            File::delete(public_path($anggota->photo_path));
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
            'photo_path' => $path == null ? $anggota->photo_path : $path

        ];
        $anggota = Anggota::find($id);
        $anggota->update($data);
        $route = "/edit-anggota/$anggota->id";
        return redirect($route)->with('success', 'Anggota Berhasil Diubah');

    }


    public function destroy(string $id)
    {
        $anggota = Anggota::find($id);
        $agt_name = $anggota->name;
        File::delete(public_path($anggota->photo_path));
        Anggota::destroy($id);
        return redirect()->back()->with('deletedSuccess', "Anggota $agt_name berhasil dihapus");
    }
}
