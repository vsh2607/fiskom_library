$(document).ready(function(){
    new DataTable('#anggota_data');
    new DataTable('#buku_data');
});


function getDeletedId(anggotaId) {
    myForm = document.getElementById('anggota-form-delete');
    myForm.action = "/hapus-anggota/" + anggotaId;

}


