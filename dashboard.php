<?php
session_start();

if (!isset($_SESSION["id_petugas"])) {
    header("Location: ../multi-user/login.php");
    exit();
}

require_once "./function/koneksi.php";

$id_petugas = $_SESSION["id_petugas"];
$role = $_SESSION["role"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="./assets/iconTittle.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Dashboard</title>
</head>
<body style="font-family: 'Montserrat', sans-serif;">

    <!-- === BAGIAN ADMIN === -->
    <?php if ($role == 'administrator') : ?>

        <aside class="bg-[#5923B8] flex flex-col z-40 items-center p-5 h-screen fixed left-0 top-0 w-64  sidebar-menu transition-transform">

            <span class="flex justify-center">
                <img class="h-7" src="./assets/logoPutih.png">
            </span>
            <hr class="border-white border mt-5 rounded-full w-full z-10"> 
            <h1 class="text-xs mt-5 mb-5 font-bold relative right-16 text-[#FFFFFFA8]">MENU</h1>

            <div class="flex flex-col gap-5">
            <span class="flex gap-1 items-center text-white  hover:text-[#FFCD6C] font-semibold  cursor-pointer" >
            <i class='bx bxs-dashboard text-xl'></i>
            <a onclick="showContent('dashboard-content')" >Dashboard</a>

            </span>
            <span class="flex gap-1 items-center text-white hover:text-[#FFCD6C] font-semibold cursor-pointer"  >
            <i class='bx bxs-data text-xl' ></i>
            <a  onclick="showContent('data-barang-content')">Data barang</a>
            </span>

            <span class="flex gap-1 items-center text-white hover:fill-[#FFCD6C] hover:text-[#FFCD6C] font-semibold cursor-pointer">
            <i class='bx bx-sitemap'></i>
            <a onclick="showContent('data-lelang-content')">Data lelang</a>
            </span>

            <span class="flex gap-1 items-center text-white hover:text-[#FFCD6C] font-semibold cursor-pointer">
            <i class='bx bx-history text-xl'></i>
            <a onclick="showContent('history-content')">History</a>
        </span>
            </div>
        <hr class="border-white border mt-4 block sm:hidden rounded-full w-full z-10"> 

             <span class="flex sm:hidden mt-3 items-center cursor-pointer">
                <a id="logoutButton2" class="flex gap-1 mr-10 items-center">
                    <i class='bx bx-log-out text-white font-semibold text-2xl'></i>
                    <span class="text-white font-semibold">Logout</span>
                </a>
            </span>

            </aside>
            <div class="fixed top-0 left-0 w-full h-full bg-black/0 z-40 md:hidden sidebar-overlay"></div>

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-[#E8E6F2] min-h-screen transition-all main">
        <nav style="box-shadow: 0px 4px 31.5px 0px rgba(0, 0, 0, 0.07);" class="h-[70px] px-6 bg-white flex items-center z-40 sticky top-0 left-0">
           
        <button type="button" class="text-lg text-gray-600 sidebar-toggle block md:hidden">
                <i class="ri-menu-line"></i>
            </button>
              
            <div class="flex relative  items-center ml-5 gap-1 text-[#505050]">
                <i class='bx bx-calendar text-lg'></i>
                <p id="clock" class="font-semibold text-base"></p>
                <h1 class="font-medium text-[#505050] sm:block hidden text-1xl">|</h1>
                <p class="text-#505050 sm:block hidden font-semibold text-base"><?php echo $role == 'administrator' ? 'Administrator' : 'Petugas'; ?></p>
            </div>

            <span class="sm:flex hidden flex-row absolute right-0 mr-5  cursor-pointer">
                <a id="logoutButton" class="flex items-center">
                    <i class='bx bx-log-out text-[#323232] font-bold text-2xl'></i>
                    <span class="text-[#323232] font-semibold">Logout</span>
                </a>
            </span>
            
        </nav>

            <!-- bagian dashboard content -->
        <section id="dashboard-content" class="flex justify-center">
                <?php include_once "./menuContent/dashboard_content.php"; ?>
            </section>
            <!-- end -->

            <!-- bagian data barang content -->
            <section id="data-barang-content" class="flex justify-center" style="display: none;">
                <?php include_once "./menuContent/data_barang_content.php"; ?>
            </section>
            <!-- end -->

            <!-- bagian data lelang content -->
            <section id="data-lelang-content" class="flex justify-center" style="display: none;">
                <?php include_once "./menuContent/data_lelang_content.php"; ?>
            </section>
            <!-- end -->

            <!-- bagian history content -->
            <section id="history-content" class="flex justify-center" style="display: none;">
                <?php include_once "./menuContent/history_content.php"; ?>
            </section>
            <!-- end -->

        </main>   

      

    <!--=== BAGIAN PETUGAS ===-->
        <?php elseif ($role == 'petugas') : ?>
           

    <?php endif; ?>
    <!-- end -->

    <br>
</body>
<script src="sweetalert.min.js"></script>
<script src="./function/waktu.js"></script>
<script src="./function/gantiMenu.js"></script>
<script src="./function/logoutAllert.js"></script>
<script src="./function/main.js"></script>

</html>
