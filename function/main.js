//  ==== SIDEBAR ====
const sidebarToggle = document.querySelector('.sidebar-toggle')
const sidebarOverlay = document.querySelector('.sidebar-overlay')
const sidebarMenu = document.querySelector('.sidebar-menu')
const main = document.querySelector('.main')
sidebarToggle.addEventListener('click', function (e) {
    e.preventDefault()
    main.classList.toggle('active')
    sidebarOverlay.classList.toggle('hidden')
    sidebarMenu.classList.toggle('-translate-x-full')
})
sidebarOverlay.addEventListener('click', function (e) {
    e.preventDefault()
    main.classList.add('active')
    sidebarOverlay.classList.add('hidden')
    sidebarMenu.classList.add('-translate-x-full')
})
document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (item) {
    item.addEventListener('click', function (e) {
        e.preventDefault()
        const parent = item.closest('.group')
        if (parent.classList.contains('selected')) {
            parent.classList.remove('selected')
        } else {
            document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (i) {
                i.closest('.group').classList.remove('selected')
            })
            parent.classList.add('selected')
        }
    })
})
// ==== END ====


// ==== ACTIVE MENU ====
    const menuItems = document.querySelectorAll('.sidebar-menu span');

    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            menuItems.forEach(menuItem => {
                menuItem.classList.remove('active');
            });
            this.classList.add('active');
        });
    });

// ==== END ====

// ==== FUNGSI MUNCUL TAMBAH DATA ====
function toggleForm() {
    var form = document.getElementById("addForm");
    form.classList.toggle("hidden");
}

document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("addForm");
    form.classList.add("hidden");
});

document.addEventListener("keydown", function(event) {
    if (event.key === "Escape") {
        var form = document.getElementById("addForm");
        form.classList.add("hidden");
    }
});

// ke 2
function toggleForm2() {
    var form = document.getElementById("addForm2");
    form.classList.toggle("hidden");
}

document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("addForm2");
    form.classList.add("hidden");
});

document.addEventListener("keydown", function(event) {
    if (event.key === "Escape") {
        var form = document.getElementById("addForm2");
        form.classList.add("hidden");
    }
});

// ke 3
function toggleForm3() {
    var form = document.getElementById("addForm3");
    form.classList.toggle("hidden");
}

document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("addForm3");
    form.classList.add("hidden");
});

document.addEventListener("keydown", function(event) {
    if (event.key === "Escape") {
        var form = document.getElementById("addForm3");
        form.classList.add("hidden");
    }
});
// ==== END ====

