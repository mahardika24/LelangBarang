<?php
require_once "./function/koneksi.php";

$query = "SELECT * FROM tb_barang";
$result = mysqli_query($koneksi, $query);
?>

<head>
    <link rel="stylesheet" href="./output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="./assets/iconTittle.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">   
</head>

<main style="font-family: 'Montserrat', sans-serif; box-shadow: 0px 0px 32.6px 0px rgba(0, 0, 0, 0.15);" class="bg-[#EEEEEE] w-full relative top-2 ml-3 rounded-lg p-4 ">
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php
        while ($row = $result->fetch_assoc()) {
            ?>
           <div class="bg-white p-4 shadow-xl rounded-lg">
    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['gambar']); ?>" alt="<?php echo $row['nama_barang']; ?>" class="w-full h-52 object-cover mb-4">
    <span class="flex items-center justify-between">
        <h2 class="text-sm truncate text-[#5D5959]  font-bold "><?php echo $row['nama_barang']; ?></h2>
        <p style="font-size: 10px;" class="text-[#878282] font-medium">Tanggal: <?php echo $row['tanggal']; ?></p>
    </span>
    <p class="text-[#5D5959] text-sm font-semibold mt-1">
    Harga awal: <?php echo number_format($row['harga_awal'], 0, ',', '.'); ?>
    </p>
    <p class="text-[#5D5959] font-semibold truncate text-xs mt-1">Deskripsi: <?php echo $row['deskripsi']; ?></p>
    <button class="bg-[#8E50FC] text-white font-semibold hover:bg-[#7237DA] flex mt-1 w-full justify-center items-center py-2 rounded-lg mx-auto">TAWAR</button>
</div>

        <?php
        }
        ?>
    </div>
</main>
