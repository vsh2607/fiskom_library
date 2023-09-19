<div class="text-center mt-5">
    <p style="font-weight: bold; font-size: 40px">Tambah Anggota</p>
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


            <form action="/tambah-anggota" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="nim">Nomor Induk Mahasiswa</label>
                <input type="text" class="form-control" name="nim" id="nim" required value="{{ old('nim') }}">

                <label for="name">Nama</label>
                <input type="text" class="form-control" name="name" id="name" required value="{{ old('name') }}">

                <label for="dob">Tanggal Lahir</label>
                <input type="date" class="form-control" name="dob" id="dob" required value="{{ old('dob') }}">

                <label for="prodi">Program Studi</label>
                <select name="prodi" id="prodi" class="form-control">
                    <option value="" disabled selected>Pilih Program Studi</option>
                    <option value="fisika">Fisika</option>
                    <option value="informatika">Informatika</option>
                </select>
        </div>

        <div class="col-6">
            <label for="no_wa">Nomor WhatsApp</label>
            <input type="text" class="form-control" name="no_wa" id="no_wa" required value="{{ old("no_wa") }}">

            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" required value="{{ old("email") }}">

            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat" required value="{{ old("alamat") }}">

            <label for="photo_path">Upload Foto</label>
            <input type="file" value="" class="form-control" name="photo_path" id="photo_path">

        </div>

    </div>
    <button type="submit" class="btn btn-danger mt-5 btn-xl float-right">Tambah Anggota</button>
    </form>
</div>
