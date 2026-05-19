<?php
// 1. Konfigurasi Database
$host     = "localhost";     // Server database (default XAMPP: localhost)
$user     = "root";          // Username default XAMPP
$password = "";              // Password default XAMPP (kosong)
$database = "data_bibittanaman_unggul";   // Sesuaikan dengan nama database yang kamu buat

// 2. Membuat Koneksi ke MySQL/MariaDB
$koneksi = mysqli_connect($host, $user, $password, $database);

// 3. Validasi Koneksi (Mengecek apakah koneksi berhasil atau gagal)
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Jika berhasil, kode di bawah ini bisa diaktifkan untuk uji coba (opsional)
echo "Koneksi database berhasil!";
?>