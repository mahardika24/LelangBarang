<?php
// memanggil fungsi koneksi untuk menyambungkan ke database
require_once "../function/koneksi.php";
// variable di bawah berfungsi untuk menyimpan atau menampung data nilai pesan ketika register berhasil
$registrationMessage = ''; 

// kondisi di bawah ini mengecek apakah request yang diterima oleh server merupakan POST request. 
// $_SERVER["REQUEST_METHOD"] adalah variabel global dalam PHP yang berisi metode HTTP yang digunakan 
// untuk mengirim request ke halaman tersebut jika metodenya adalah POST maka blok kode di dalam kurung kurawal akan dieksekusi.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // code di bawah ialah membuat variable unikID yang memanggil fungsi bawaan dari php yang bernama uniqid
    // yang di mana berfungsi untuk generate id secara uniq
    $unikID = uniqid();

    // code di bawah ini untuk mengisi baris baru ke dalam table tb_petugas dengan values ? yang digunakan 
    // untuk menandai posisi di mana nilai yang sebenarnya akan dimasukkan nantinya
    $query = "INSERT INTO tb_petugas (id_petugas, nama_petugas, username, password, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
  

    mysqli_stmt_bind_param($stmt, "sssss", $unikID, $nama_petugas, $username, $password, $role);
// menyimpan nilai statement di variable yg bernama result
    $result = mysqli_stmt_execute($stmt);

    // jika result bernilai true maka variable registrationMessage menampilkan register berhasil dan dapat 
    // menyimpan data ke dalam db
    if ($result) {
        $registrationMessage = "Registrasi berhasil";
    
        // sebaliknya jika bernilai false maka menampilkan registergagal
    } else {
        $registrationMessage = "Registrasi gagal. Silakan coba lagi.";
    }

    // menutup fungsi statement
    mysqli_stmt_close($stmt);
}
// menutup fungsi koneksi dari database
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <link rel="stylesheet" href="../input.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="../assets/iconTittle.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Registrasi Petugas</title>
</head>
<body style="font-family: 'Montserrat', sans-serif;" class="bg-[#E8E6F2]">

<div class="transition-shape flex justify-center items-center" id="transitionShape">
    <img class="h-24" src="../assets/logoPutih.png" alt="">
</div>

<section>
    <div class="flex flex-col items-center h-screen mx-12 justify-center">
    <div class="flex w-full h-[30rem]">
            <div style="box-shadow: 0px 0px 100px 0px rgba(0, 0, 0, 0.15); background: linear-gradient(150deg, #5923B8 0%, #7237DA 98.95%);" class="w-1/2 rounded-l-2xl  p-6" >
            <div class="p-6 space-y-2 relative top-10 sm:p-8">
            
            <img src="../assets/icon-register.png" class="h-60  mx-auto">
                
                <span class="flex item-center gap-3 justify-center font-custom font-medium">
                   <p class="text-white">Sudah punya akun?</p>
                   <a href="#" onclick="return animateShape('login.php')" class="transition-colors duration-300 text-[#E7A92F] hover:underline">Login</a>
               </span>
            </div>
            </div>


            <div  style="box-shadow: 0px 0px 100px 0px rgba(0, 0, 0, 0.15); "  class="w-1/2 bg-white rounded-r-2xl  p-6">
                    
                   <form class="space-y-4 md:space-y-6 "  method="post">
                <img class=" h-10 mr-2" src="../assets/logo.png">

            <div class="bottom-1 relative">
                <span class="flex ml-16 flex-col justify-center mx-auto items-start">
                <h1 class="flex items-start font-bold text-[#656565] text-3xl">Register.</h1>
                <p class="text-[#656565]">Lengkapi form di bawah ini untuk membuat akun baru</p>
                </span>
                
                <div class="flex flex-col gap-3 ml-16 mr-20 mt-5">

                <div class="flex flex-row gap-5">
                <span class="flex-col flex justify-center  gap-1">
                <label for="nama_petugas" class="font-semibold text-[#656565]">Nama petugas</label>
                <input type="text" name="nama_petugas" class=" border-2 w-full py-1 border-gray-500 px-3 rounded-lg" required>
                </span>

                <span class="flex-col flex justify-center  gap-1">
                <label for="username" class="font-semibold text-[#656565]">Username</label>
                <input type="text" name="username" class=" border-2 w-full  py-1 border-gray-500 px-3 rounded-lg" required>
                </span>
                </div>
               

                <span class="flex-col flex justify-center  gap-1">
                <label for="password" class="font-semibold text-[#656565]">Password</label>
                <input type="password" name="password" class=" border-2 w-full  py-1 border-gray-500 px-3 rounded-lg" required>
                </span>
                
                <span class="flex-col flex justify-center  gap-1">
                <label for="role" class="font-semibold text-[#656565]">Role</label>
                    <select class=" border-2 w-full  py-1 border-gray-500 px-3 rounded-lg" name="role" required>
                    <option value="administrator">Administrator</option>
                    <option value="petugas" >Petugas</option>
                    </select>
                </span>

               
               
                <input type="submit" value="Register" class=" border-2 w-full text-white font-semibold py-2 mt-2 border-gray-500 px-3 rounded-lg bg-[#8E50FC] hover:bg-[#7237DA] transition-opacity">
                
                <div class="text-green-500">
                <?php echo $registrationMessage; ?> 
               </div>
                </div>
               
            
            </div>
          
        </form>
            </div>
        </div>
    </div>
</section>

</body>
<script src="../function/animationPage.js"></script>
</html>
