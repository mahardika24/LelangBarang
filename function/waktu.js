function updateTime() {
    let waktu = new Date();

    let harian = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    let bulanan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'October', 'November', 'Desember'];

    let hari = harian[waktu.getDay()];
    let tanggal = waktu.getDate();
    let bulan = bulanan[waktu.getMonth()];
    let tahun = waktu.getFullYear();

    document.getElementById('clock').innerHTML = `${hari}, ${tanggal} ${bulan} ${tahun}`;

    setTimeout(updateTime, 1000);
}

updateTime();