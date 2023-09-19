<div class="text-center mt-5">
    <p style="font-weight: bold; font-size: 40px">Ubah Data Anggota</p>
</div>
<div class="container mt-5">


    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <div class="row">
        <div class="col-6">


            <form action="/edit-anggota/{{ $anggota->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="nim">Nomor Induk Mahasiswa <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" name="nim" id="nim" required value="{{ $anggota->nim }}" readonly>
                <br>
                <label for="name">Nama <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" name="name" id="name" required
                    value="{{ $anggota->name }}">
                <br>
                <label for="dob">Tanggal Lahir <sup class="text-danger">*</sup></label>
                <input type="date" class="form-control" name="dob" id="dob" required
                    value="{{ $anggota->dob}}">
                <br>
                <label for="prodi">Program Studi <sup class="text-danger">*</sup></label>
                <select name="prodi" id="prodi" class="form-control">
                    <option value="" disabled selected>Pilih Program Studi</option>
                    <option value="fisika" {{ $anggota->prodi == "fisika" ? 'selected' : '' }}>Fisika</option>
                    <option value="informatika" {{ $anggota->prodi == "informatika" ? 'selected' : '' }}>Informatika</option>
                </select>
        </div>

        <div class="col-6">
            <label for="no_wa">Nomor WhatsApp <sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" name="no_wa" id="no_wa" required
                value="{{ $anggota->no_wa }}">
            <br>

            <label for="email">Email <sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" name="email" id="email" required
                value="{{ $anggota->email }}">
            <br>
            <label for="alamat">Alamat <sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" name="alamat" id="alamat" required
                value="{{ $anggota->alamat }}">
            <br>
            <label for="photo_path">Upload Foto</label>
            <input type="file" value="" class="form-control" name="photo_path" id="photo_path">

        </div>

    </div>
    <button type="submit" class="btn btn-danger mt-5 btn-xl float-right">Simpan</button>
    </form>
</div>
