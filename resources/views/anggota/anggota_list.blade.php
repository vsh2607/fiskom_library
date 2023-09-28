<div class="text-center mt-5">
    <p style="font-size:45px; font-weight:bold">Data Anggota</p>
</div>



<div class="container mt-5">
    @if (session()->has('deletedSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('deletedSuccess') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table id="anggota_data" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($anggotas as $key=> $anggota)

                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $anggota->name }}</td>
                    <td>
                        <a href="/edit-anggota/{{ $anggota->id }}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete"
                            id="delete_anggota" onclick="getDeletedId({{ $anggota->id }})">Hapus</button>
                        <a class="btn btn-success" href="/detail-anggota/{{ $anggota->id }}">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apa Kamu Yakin ingin menghapus data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form method="POST" id="anggota-form-delete" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="deleteItemId" name="item_id" value="">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
