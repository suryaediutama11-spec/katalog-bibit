<?php
session_start();
include 'koneksi.php';

// Jika admin terdeteksi sudah login, langsung alihkan ke halaman tambah data
if (isset($_SESSION['admin_logged']) && $_SESSION['admin_logged'] === true) {
    header("Location: tambah.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Mencari akun admin yang cocok di database
    $query  = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $data_admin = mysqli_fetch_assoc($result);
        
        // Membuat session (tiket masuk digital)
        $_SESSION['admin_logged'] = true;
        $_SESSION['username']     = $data_admin['username'];
        $_SESSION['nama_admin']   = $data_admin['nama_lengkap'];
        
        echo "<script>alert('Login Berhasil! Selamat Datang " . $data_admin['nama_lengkap'] . "'); window.location='tambah.php';</script>";
    } else {
        echo "<script>alert('Username atau Password Salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - TaniUnggul</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans flex items-center justify-center min-h-screen p-4">

    <div class="max-w-sm w-full bg-white rounded-3xl p-6 shadow-xl border border-gray-100">
        <div class="text-center mb-6">
            <div class="inline-flex bg-green-100 text-green-600 p-3 rounded-2xl mb-2">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </div>
            <h2 class="text-xl font-bold text-gray-800">Login Admin</h2>
            <p class="text-xs text-gray-400 mt-1">Sistem Manajemen Informasi Bibit</p>
        </div>

        <form action="login.php" method="POST" class="space-y-4">
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Username</label>
                <input type="text" name="username" required placeholder="Masukkan username" class="w-full border border-gray-300 rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:border-green-600 bg-gray-50">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Password</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full border border-gray-300 rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:border-green-600 bg-gray-50">
            </div>

            <div class="pt-2">
                <button type="submit" name="login" class="w-full bg-green-600 text-white font-semibold py-3 rounded-xl text-sm hover:bg-green-700 transition shadow-md shadow-green-100">
                    Masuk ke Sistem
                </button>
                <a href="index.php" class="block w-full text-center text-gray-400 font-medium py-2 mt-1 text-xs hover:underline">
                    Kembali ke Katalog
                </a>
            </div>
        </form>
    </div>

</body>
</html>