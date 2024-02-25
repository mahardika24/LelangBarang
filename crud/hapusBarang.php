<?php
require_once "../function/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_barang'])) {
    $id_barang

    = $_POST['id_barang'];

    $query = "DELETE FROM tb_barang WHERE id_barang = ?";
    
    $stmt = mysqli_prepare($koneksi, $query);
    
    mysqli_stmt_bind_param($stmt, "i", $id_barang);
    
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(array("status" => "success", "message" => "Data berhasil dihapus."));
    } else {
        echo json_encode(array("status" => "error", "message" => "Gagal menghapus data."));
    }
    
    mysqli_stmt_close($stmt);
    
    mysqli_close($koneksi);
} else {
    echo json_encode(array("status" => "error", "message" => "Tidak ada data yang dihapus."));
}