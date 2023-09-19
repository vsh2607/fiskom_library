
function getDeletedId(anggotaId) {
    myForm = document.getElementById('anggota-form-delete');
    myForm.action = "/hapus-anggota/" + anggotaId;

}


