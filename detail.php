<?php
include 'koneksi.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id_tanaman = mysqli_real_escape_string($koneksi, $_GET['id']);

$query  = "SELECT tanaman.*, kategori.nama_kategori 
           FROM tanaman 
           LEFT JOIN kategori ON tanaman.id_kategori = kategori.id_kategori 
           WHERE tanaman.id_tanaman = '$id_tanaman'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) === 0) {
    echo "<script>alert('Data tanaman tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}

// 4. Pecah data menjadi array bervariabel
$row = mysqli_fetch_assoc($result);

$nama_tanaman  = $row['nama_tanaman'];
$id_kategori   = $row['id_kategori'];
$nama_kategori = !empty($row['nama_kategori']) ? $row['nama_kategori'] : 'Umum';
$deskripsi     = !empty($row['deskripsi']) ? $row['deskripsi'] : 'Deskripsi belum ditambahkan.';
$cara_tanam    = !empty($row['cara_tanam']) ? $row['cara_tanam'] : 'Panduan cara tanam belum ditambahkan.';
$masa_panen    = !empty($row['masa_panen']) ? $row['masa_panen'] : 'Tidak terdata';
$keunggulan    = !empty($row['keunggulan']) ? $row['keunggulan'] : 'Informasi keunggulan belum ditambahkan.';
$gambar_file   = $row['gambar'];

// Validasi gambar URL fallback
$foto_tampil = (!empty($gambar_file)) ? $gambar_file : "https://via.placeholder.com/400x300?text=No+Image";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Bibit - <?php echo $nama_tanaman; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans max-w-md mx-auto min-h-screen shadow-xl flex flex-col justify-between">

    <div>
        <div class="sticky top-0 bg-white/80 backdrop-blur-md z-50 px-4 py-3 flex items-center border-b border-gray-100">
            <a href="index.php" class="text-gray-700 hover:text-green-600 transition p-1 rounded-xl bg-gray-100 mr-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h1 class="font-bold text-gray-800 text-base">Detail Bibit Tanaman</h1>
        </div>

        <div class="relative w-full h-64 bg-gray-200 overflow-hidden">
            <img src="<?php echo $foto_tampil; ?>" alt="<?php echo $nama_tanaman; ?>" class="w-full h-full object-cover">
            <span class="absolute bottom-4 left-4 bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">
                <?php echo $nama_kategori; ?>
            </span>
        </div>

        <div class="p-4 bg-white rounded-t-3xl -mt-6 relative z-10 shadow-sm">
            <div class="flex justify-between items-start mb-2">
                <h2 class="text-xl font-bold text-gray-800"><?php echo $nama_tanaman; ?></h2>
            </div>
            
            <div class="flex flex-wrap gap-2 mt-3 mb-4">
                <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1.5 rounded-xl flex items-center">
                    ⏱ <span class="ml-1 font-medium">Panen: <?php echo $masa_panen; ?></span>
                </span>
                <span class="bg-green-50 text-green-700 text-xs px-3 py-1.5 rounded-xl flex items-center font-semibold">
                    ⭐ Kualitas Unggul
                </span>
            </div>

            <hr class="border-gray-100 my-4">

            <div class="space-y-6">
                <div>
                    <h3 class="text-sm font-bold text-gray-800 mb-1.5 flex items-center">
                        <span class="w-1.5 h-4 bg-green-600 rounded-full mr-2 block"></span>
                        Deskripsi Bibit
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed text-justify">
                        <?php echo nl2br($deskripsi); ?>
                    </p>
                </div>

                <div>
                    <h3 class="text-sm font-bold text-gray-800 mb-1.5 flex items-center">
                        <span class="w-1.5 h-4 bg-green-600 rounded-full mr-2 block"></span>
                        Keunggulan Varietas
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed text-justify">
                        <?php echo nl2br($keunggulan); ?>
                    </p>
                </div>

                <div class="pb-12">
                    <h3 class="text-sm font-bold text-gray-800 mb-1.5 flex items-center">
                        <span class="w-1.5 h-4 bg-green-600 rounded-full mr-2 block"></span>
                        Panduan Penanaman
                    </h3>
                    <div class="bg-green-50/50 rounded-2xl p-4 border border-green-100/50 text-sm text-gray-600 leading-relaxed text-justify">
                        <?php echo nl2br($cara_tanam); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed bottom-0 left-0 right-0 max-w-md mx-auto bg-white border-t border-gray-100 p-4 shadow-lg z-50 flex gap-3">
        <a href="index.php" class="w-1/3 text-center border border-gray-300 text-gray-600 py-3 rounded-2xl text-xs font-semibold hover:bg-gray-50 transition">
            Kembali
        </a>
        <a href="https://wa.me/6285142599163?text=Halo,%20saya%20tertarik%20dengan%20bibit%20<?php echo urlencode($nama_tanaman); ?>" target="_blank" class="w-2/3 text-center bg-green-600 hover:bg-green-700 text-white py-3 rounded-2xl text-xs font-bold shadow-md shadow-green-100 flex items-center justify-center gap-1 transition">
            Tanya Seputar Bibit
        </a>
    </div>

</body>
</html>