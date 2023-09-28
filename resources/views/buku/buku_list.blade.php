<div class="text-center mt-5">
    <p style="font-weight: bold; font-size: 40px">Data Buku</p>
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



    <div class="card">
        <div class="card-body">
            <form action="/upload-file" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="file" class="form-control" name="file_upload">
                    </div>
                    <div class="col">
                        <button class="btn btn-success" type="submit">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-body">
            <table id="buku_data" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Penyusun Buku</th>
                        <th>Penerbit</th>
                        <th>Kode Buku</th>
                        <th>Tahun Terbit</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bukus as $key => $buku)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $buku->judul_buku }}</td>
                            <td>{{ $buku->penyusun_buku }}</td>
                            <td>{{ $buku->penerbit }}</td>
                            <td>{{ $buku->kode_buku }}</td>
                            <td>{{ $buku->tahun_terbit }}</td>
                            <td>{{ $buku->jumlah }}</td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>


</div>
