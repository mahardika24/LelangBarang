function deleteConfirmation(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteData(id);
        }
    });
}

function deleteData(id) {
    $.ajax({
        type: "POST",
        url: "./crud/hapusBarang.php",
        data: {
            id_barang: id
        },
        success: function(response) {
            location.reload();
        }
    });
}