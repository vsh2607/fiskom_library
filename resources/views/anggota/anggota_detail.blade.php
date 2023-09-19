@php
    $prodi = [
    "fisika" => "Fisika",
    "informatika" => "Informatika"
];
@endphp
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-3 text-center mt-5">
            <img src="{{$anggota->photo_path !== null ?  asset($anggota->photo_path) : asset("images/anggota/no_photo.png") }}" width="400" height="400" class="rounded-circle">
        </div>
        <div class="col"></div>
        <div class="col-7 mt-5">
            <div class="card">
                <div class="card-header text-center bg-danger text-white" >DETAIL ANGGOTA</div>
                <div class="card-body">
                  <table class="table table-borderless">
                    <tbody>
                        <tr><td>NIM</td><td>:</td><td>{{ $anggota->nim }}</td></tr>
                        <tr><td>NAMA</td><td>:</td><td>{{ $anggota->name }}</td></tr>
                        <tr><td>PROGRAM STUDI</td><td>:</td><td>{{ $prodi[$anggota->prodi] }}</td></tr>
                        <tr><td>TANGGAL LAHIR</td><td>:</td><td>{{ $anggota->dob }}</td></tr>
                        <tr><td>NO. WA</td><td>:</td><td>{{ $anggota->no_wa }}</td></tr>
                        <tr><td>EMAIL</td><td>:</td><td>{{ $anggota->email }}</td></tr>
                        <tr><td>ALAMAT</td><td>:</td><td>{{ $anggota->alamat }}</td></tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
