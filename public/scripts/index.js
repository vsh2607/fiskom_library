$(document).ready(function () {
    new DataTable('#anggota_data');
    new DataTable('#buku_data');
    new DataTable('#peminjaman_data');
    $('.select2').select2({
    });
});


function addBukuPinjaman() {
    var selectElement = document.getElementById("buku_pinjaman");
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var value = selectedOption.value;
    var judul_buku = selectedOption.text;
    var kode_buku = selectedOption.getAttribute('kode_buku');

    if (value != "") {
        var rows = "";
        rows +=
            "<tr>" +
            "<td>" + "<input name='id_buku[]' type='hidden' value=" + value + ">" + value + "</td>" +
            "<td>" + "<input name='kode_buku[]' type='hidden' value=" + kode_buku + ">" + kode_buku + "</td>" +
            "<td>" + "<input name='judul_buku[]' type='hidden' value=" + judul_buku + ">" + judul_buku + "</td>" +
            "<td>" +
            "<button class='btn btn-sm btn-danger' onclick = deleteRow(this)>Hapus</button>"
        "</td>" +
            "</tr>";

        $(rows).appendTo("#list_buku_pinjaman tbody");

    }

}

function deleteRow(el) {
    $(el).closest('tr').remove();
}


function getDeletedId(anggotaId) {
    myForm = document.getElementById('anggota-form-delete');
    myForm.action = "/hapus-anggota/" + anggotaId;
}

function getReturnedId(peminjamanId) {
    myForm = document.getElementById('book-form-return');
    myForm.action = "/kembali/" + peminjamanId;
}

function getReturnedDetail(peminjamanId) {
    $.ajax({
        url: `/fetchDetail/${peminjamanId}`,
        method: `GET`,
        success: function (data) {
            var modalTableBody = $('#return-buku-detail-table tbody');
            modalTableBody.empty();
            data.forEach(function (book, index) {
                var row = '<tr>' +
                    '<td>' + (index + 1) + '</td>' +
                    '<td>' + book.book_name + '</td>' +
                    '</tr>';
                modalTableBody.append(row);
            });
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}
