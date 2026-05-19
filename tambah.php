<?php
session_start();

if (!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] !== true) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id_kategori  = mysqli_real_escape_string($koneksi, $_POST['id_kategori']);
    $nama_tanaman = mysqli_real_escape_string($koneksi, $_POST['nama_tanaman']);
    $deskripsi    = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $cara_tanam   = mysqli_real_escape_string($koneksi, $_POST['cara_tanam']);
    $masa_panen   = mysqli_real_escape_string($koneksi, $_POST['masa_panen']);
    $keunggulan   = mysqli_real_escape_string($koneksi, $_POST['keunggulan']);
    $gambar       = mysqli_real_escape_string($koneksi, $_POST['gambar']);

    $query = "INSERT INTO tanaman (id_kategori, nama_tanaman, deskripsi, cara_tanam, masa_panen, keunggulan, gambar) 
              VALUES ('$id_kategori', '$nama_tanaman', '$deskripsi', '$cara_tanam', '$masa_panen', '$keunggulan', '$gambar')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data bibit tanaman berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Tambah Bibit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans p-4">

    <div class="max-w-md mx-auto bg-white rounded-3xl p-6 shadow-xl border border-gray-100">
        
        <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
            <div>
                <h2 class="text-lg font-bold text-gray-800">Tambah Bibit Baru</h2>
                <p class="text-xs text-green-600 font-medium mt-0.5">
                    ● Admin: <?php echo $_SESSION['nama_admin']; ?>
                </p>
            </div>
            <a href="logout.php" class="bg-red-50 text-red-600 hover:bg-red-100 text-xs font-bold px-3 py-2 rounded-xl transition">
                Log Out
            </a>
        </div>
        
        <form action="tambah.php" method="POST" class="space-y-4">
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Nama Tanaman</label>
                <input type="text" name="nama_tanaman" required placeholder="Contoh: Kelengkeng New Kristal" class="w-full border border-gray-300 rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:border-green-600 bg-gray-50">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Kategori</label>
                <select name="id_kategori" required class="w-full border border-gray-300 rounded-xl px-3 py-2.5 text-sm bg-gray-50 focus:outline-none focus:border-green-600">
                    <option value="">-- Pilih Kategori --</option>
                    <?php
                    $kategori_query = mysqli_query($koneksi, "SELECT * FROM kategori");
                    while($kat = mysqli_fetch_assoc($kategori_query)) {
                        echo "<option value='".$kat['id_kategori']."'>".$kat['nama_kategori']."</option>";
                    }
                    ?>
                </select>
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Masa Panen / Berbuah</label>
                <input type="text" name="masa_panen" placeholder="Contoh: 2-3 Tahun" class="w-full border border-gray-300 rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:border-green-600 bg-gray-50">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Link URL Gambar</label>
                <input type="url" name="gambar" required placeholder="Contoh: https://domain.com/foto.jpg" class="w-full border border-gray-300 rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:border-green-600 bg-gray-50">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Deskripsi</label>
                <textarea name="deskripsi" rows="3" placeholder="Tulis deskripsi bibit..." class="w-full border border-gray-300 rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:border-green-600 bg-gray-50"></textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Keunggulan</label>
                <textarea name="keunggulan" rows="2" placeholder="Keunggulan..." class="w-full border border-gray-300 rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:border-green-600 bg-gray-50"></textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Cara Tanam</label>
                <textarea name="cara_tanam" rows="3" placeholder="Cara penanaman singkat..." class="w-full border border-gray-300 rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:border-green-600 bg-gray-50"></textarea>
            </div>

            <div class="pt-2">
                <button type="submit" name="submit" class="w-full bg-green-600 text-white font-bold py-3 rounded-xl text-sm hover:bg-green-700 transition">
                    Simpan Tanaman
                </button>
                <a href="index.php" class="block w-full text-center text-gray-400 font-semibold py-2 mt-2 text-xs hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>

</body>
</html>