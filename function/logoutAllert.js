document.addEventListener("DOMContentLoaded", function() {
    var logoutButton = document.getElementById("logoutButton");

    logoutButton.addEventListener("click", function() {
        Swal.fire({
            title: "Yakin ingin logout?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#5923b8ff",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "./multi-user/logout.php";
            }
        });
    });
});

// logout mobile
document.addEventListener("DOMContentLoaded", function() {
    var logoutButton2 = document.getElementById("logoutButton2");

    logoutButton2.addEventListener("click", function() {
        Swal.fire({
            title: "Yakin ingin logout?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#5923b8ff",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "./multi-user/logout.php";
            }
        });
    });
});
