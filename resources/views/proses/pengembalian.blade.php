<div class="text-center mt-5">
    <p style="font-size:45px; font-weight:bold">Data Pinjaman Buku</p>
</div>

<div class="container mt-5">
    @if (session()->has(''))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('deletedSuccess') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table id="peminjaman_data" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <th>No</th>
            <th>Kode Peminjaman</th>
            <th>Nama Peminjam</th>
            <th>Action</th>
        </thead>
        <tbody>
           
        </tbody>
    </table>
</div>
