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

    @php
        setlocale(LC_TIME, 'id_ID.utf8');
    @endphp
    <table id="peminjaman_data" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <th>No</th>
            <th>Kode Peminjaman</th>
            <th>Nama Peminjam</th>
            <th>Jumlah Buku Pinjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($pinjamans as $key => $pinjaman)
                <tr>

                    <td>{{ ++$key }}</td>
                    <td>{{ $pinjaman->peminjaman_autocode }}</td>
                    <td>{{ $pinjaman->peminjam == null ? '' : $pinjaman->peminjam->name }}</td>
                    <td>{{ count($pinjaman->detailPeminjamans) . ' ' }} Buku</td>
                    <td>{{ strftime('%e %B %Y', strtotime($pinjaman->peminjaman_tgl_pengembalian)) }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm" id="btn_detail_peminjaman" data-toggle = "modal" data-target="#detail-pinjam-modal">Detail Pinjaman</button>
                        <button class="btn btn-warning btn-sm" id="btn_return_peminjaman" data-toggle = "modal" data-target="#return-buku-modal" onclick="getReturnedId({{ $pinjaman->id }})">Kembalikan Buku</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



<div class="modal fade" id="return-buku-modal" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Pengembalian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Semua Buku Telah Dikembalikan?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Belum</button>
                <form method="POST" id="book-form-return" style="display: inline;">
                    @csrf
                    <input type="hidden" id="returnBookId" name="returnBookId" value="">
                    <button type="submit" class="btn btn-warning">Sudah</button>
                </form>
            </div>
        </div>
    </div>
</div>