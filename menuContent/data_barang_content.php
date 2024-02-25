<?php
require_once "./function/koneksi.php";

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

$query = "SELECT id_barang, nama_barang, tanggal, harga_awal, deskripsi, gambar FROM tb_barang";
$result = mysqli_query($koneksi, $query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Databarang</title>
    <link rel="stylesheet" href="./output.css">
    <link rel="stylesheet" href="./input.css">
</head>

<main style="font-family: 'Montserrat', sans-serif; box-shadow: 0px 0px 32.6px 0px rgba(0, 0, 0, 0.15);" class="bg-white w-full relative top-2 ml-3 rounded-lg p-4">
    <p class="text-[#7237DA] font-bold text-lg">DATA BARANG</p>

        <!-- ==== tambah data ==== -->
        <div id="addForm" class="fixed z-20 inset-0 overflow-y-auto  bg-gray-800 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg mt-20 z-50 shadow-xl max-w-md w-full p-5 max-h-[80vh] overflow-y-auto">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold text-gray-600">Tambah Barang</h2>
                    <button onclick="toggleForm()" class="text-gray-600 hover:text-gray-800 text-xl focus:outline-none">
                    <i class='bx bx-x'></i>
                    </button>
                </div>
                <form action="#"  method="POST" enctype="multipart/form-data" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-2">
                            <label for="nama_barang" class="font-medium text-gray-500">Nama</label>
                            <input type="text" name="nama_barang" required class="focus:border-gray-500 focus:outline-none border-2 text-gray-600 font-medium border-gray-300 rounded-md w-full p-2">

                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="tanggal" class="font-medium text-gray-500">Tanggal</label>
                            <input type="date" name="tanggal" required
                                class="focus:border-gray-500 focus:outline-none border-2 text-gray-600 border-gray-300 rounded-md w-full p-2">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-2">
                            <label for="harga_awal" class="font-medium text-gray-500">Harga</label>
                            <input type="number" name="harga_awal" required
                                class="focus:border-gray-500 focus:outline-none border-2 text-gray-600 border-gray-300 rounded-md w-full p-2">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="Gambar" class="font-medium text-gray-500">Gambar</label>
                            <div class="relative">
                                <input type="file" name="Gambar" id="GambarInput"  required
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                <input type="text" id="Gambar" readonly
                                    class="focus:border-gray-500 focus:outline-none border-2 text-gray-600 border-gray-300 rounded-md w-full p-2">
                                <div class="absolute inset-y-0 left-0 flex items-center pr-2">
                                    <label for="GambarInput"
                                        class="border-2 text-gray-500 border-gray-300 font-semibold py-2 px-4 rounded-md rounded-e-none cursor-pointer"><i
                                            class='bx bxs-file-image'></i></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="Deskripsi" class="font-medium text-gray-500">Deskripsi</label>
                        <textarea name="Deskripsi" required
                            class="focus:border-gray-500 focus:outline-none border-2 text-gray-600  border-gray-300 rounded-md w-full p-2"></textarea>
                    </div>

                    <button type="submit" onclick="tambahData()" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded-md">Simpan</button>
                </form>
            </div>
        </div>
        <!-- ==== end ==== -->

    <div class="container mx-auto p-6">
    <div class="overflow-x-scroll rounded-lg">

    <button onclick="toggleForm()" class="bg-gray-100 border  border-gray-400  z-10 hover:bg-gray-200 relative flex items-center  text-gray-400 focus:outline-none font-medium py-2 px-4 rounded my-4"><i class='bx bx-plus font-semibold'></i>Add</button>

            <table id="barangTable" class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-[#CBC6FF] text-[#595959] font-semibold text-sm">
                        <th class="px-4 border border-[#8E8E8E] rounded-tl-md py-2">No</th>
                        <th class="px-4 border border-[#8E8E8E] py-2 text-left">Nama</th>
                        <th class="px-4 border border-[#8E8E8E] py-2">Tanggal</th>
                        <th class="px-1 border border-[#8E8E8E] py-2">Harga Awal</th>
                        <th class="px-4 border border-[#8E8E8E] py-2 text-left">Deskripsi</th>
                        <th class="px-4 border border-[#8E8E8E] py-2">Gambar</th>
                        <th class="px-4 border border-[#8E8E8E] rounded-tr-md py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr class='" . ($no % 2 === 0 ? 'even:bg-[#DEDDF2]' : 'odd:bg-white') . "'>";
                            echo "<td class='border border-[#8E8E8E] border-b-0 font-semibold text-[#616161] text-sm px-4 text-center py-2'>" . $no . "</td>";
                            echo "<td class='border border-[#8E8E8E] border-b-0 font-semibold text-[#616161] text-sm px-4 text-left  py-2'>" . $row['nama_barang'] . "</td>";
                            echo "<td class='border border-[#8E8E8E] border-b-0 font-semibold text-[#616161] text-sm px-4 py-2 text-center'>" . $row['tanggal'] . "</td>";
                            echo "<td class='border border-[#8E8E8E] border-b-0 font-semibold text-[#616161] text-sm px-4 py-2 text-center'>Rp. " . number_format($row['harga_awal'], 0, ',', '.') . "</td>";
                            echo "<td class='border border-[#8E8E8E] border-b-0 font-semibold text-[#616161] text-sm px-4  py-2'>" . $row['deskripsi'] . "</td>";
                            echo "<td class='border border-[#8E8E8E] border-b-0 font-semibold text-[#616161] text-sm px-4 object-cover py-2'><img class='h-16 flex justify-center  mx-auto' src='data:image/jpeg;base64," . base64_encode($row['gambar']) . "'/></td>";
                            echo "<td class='border border-[#8E8E8E] border-b-0 font-semibold text-[#616161] text-lg text-center px-4 py-2'>
                            <a onclick='deleteConfirmation(" . $row['id_barang'] . ")'> 
                            <i class='bx bx-trash bg-red-500/40 p-1 rounded-sm cursor-pointer hover:bg-red-500/50 text-red-500'></i> 
                            </a>

                            <a href='update.php?id=" . $row['id_barang'] . "'><i class='bx bx-edit-alt bg-purple-500/40 hover:bg-purple-500/50 p-1 rounded-sm text-purple-500'></i></a></td>";
                            echo "</tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center py-4'>Tidak ada data yang ditemukan.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="./function/hapusAllert.js"></script>
<script src="./function/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<script>


    $(document).ready(function() {
        $('#barangTable').DataTable({
            info: false,
            lengthChange: false,
            ordering: false,
            pageLength: 5,
            searching: true,
            language: {
                zeroRecords: "Data yang anda cari tidak ada!"
            }
        });
    });
</script>

</html>
