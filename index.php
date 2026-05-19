<?php 
include 'koneksi.php'; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>petanibaru - Katalog Bibit Tanaman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans max-w-md mx-auto min-h-screen shadow-2xl flex flex-col justify-between relative">

    <div class="bg-white min-h-screen pb-24">
        <header class="px-5 pt-5 pb-4 bg-white sticky top-0 z-50 shadow-sm">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center space-x-2 text-green-600 font-bold text-xl tracking-wide">
                    <svg class="w-7 h-7 text-green-600 fill-current" viewBox="0 0 24 24">
                        <path d="M17 8C14.24 8 12.01 9.93 11.23 12.5C11.53 12.18 11.89 11.91 12.3 11.72C13.29 11.26 14.43 11.45 15.22 12.24C16.19 13.21 16.19 14.79 15.22 15.76C14.43 16.55 13.29 16.74 12.3 16.28C11.66 15.98 11.16 15.46 10.87 14.83C9.35 15.33 8.16 16.59 7.7 18.23C8.6 19.33 9.96 20 11.5 20C15.09 20 18 17.09 18 13.5V9C18 8.45 17.55 8 17 8ZM6 3C4.34 3 3 4.34 3 6V11.5C3 15.09 5.91 18 9.5 18C11.04 18 12.4 17.33 13.3 16.23C12.84 14.59 11.65 13.33 10.13 12.83C9.84 13.46 9.34 13.98 8.7 14.28C7.71 14.74 6.57 14.55 5.78 13.76C4.81 12.79 4.81 11.21 5.78 10.24C6.57 9.45 7.71 9.26 8.7 9.72C9.11 9.91 9.47 10.18 9.77 10.5C9.01 7.93 6.76 6 4 6H3V3H6Z"/>
                    </svg>
                    <span class="text-gray-800">Petani<span class="text-green-600">Baru</span></span>
                </div>
                <a href="login.php" class="text-gray-600 hover:text-green-600 transition p-1.5 rounded-xl hover:bg-gray-100" title="Login Admin">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </a>
            </div>

            <div class="relative mt-2">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input type="text" placeholder="Cari bibit tanaman unggul..." class="w-full py-3 pl-11 pr-4 rounded-full bg-gray-100 text-sm focus:outline-none focus:ring-2 focus:ring-green-600/20 focus:bg-white transition border border-transparent">
            </div>
        </header>

        <section class="px-5 py-2">
            <div class="flex items-center overflow-x-auto py-2 gap-3 whitespace-nowrap scrollbar-hide">
                <a href="index.php" class="flex flex-col items-center space-y-1 group">
                    <div class="<?php echo !isset($_GET['kategori']) ? 'bg-green-100 text-green-600 border-green-200' : 'bg-gray-50 text-gray-500 border-gray-100'; ?> w-12 h-12 rounded-2xl flex items-center justify-center border transition shadow-sm group-hover:bg-green-50">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                    </div>
                    <span class="text-[11px] font-semibold text-gray-600">Semua</span>
                </a>

                <?php

                $query_kat = "SELECT * FROM kategori";
                $result_kat = mysqli_query($koneksi, $query_kat);
                
                $icons = [
                    4 => '🍎', // Buah-buahan
                    1 => '🥦', // Sayuran
                    2 => '🌻', // Hias
                    3 => '🌴'  // Perkebunan
                ];

                while($row_kat = mysqli_fetch_assoc($result_kat)) {
                    $id_k_tampil = $row_kat['id_kategori'];
                    $is_active = (isset($_GET['kategori']) && $_GET['kategori'] == $id_k_tampil);
                    $icon_tampil = isset($icons[$id_k_tampil]) ? $icons[$id_k_tampil] : '🌿';
                ?>
                    <a href="index.php?kategori=<?php echo $id_k_tampil; ?>" class="flex flex-col items-center space-y-1 group">
                        <div class="<?php echo $is_active ? 'bg-green-100 text-green-600 border-green-300' : 'bg-gray-50 text-gray-500 border-gray-100'; ?> w-12 h-12 rounded-2xl flex items-center justify-center border transition shadow-sm group-hover:bg-green-50 text-xl">
                            <?php echo $icon_tampil; ?>
                        </div>
                        <span class="text-[11px] font-semibold text-gray-600"><?php echo $row_kat['nama_kategori']; ?></span>
                    </a>
                <?php } ?>
            </div>
        </section>

        <main class="px-5 mt-4">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Katalog Bibit</h2>
            
            <div class="grid grid-cols-2 gap-4">
                <?php
        
                if(isset($_GET['kategori'])) {
                    $id_kat_filter = mysqli_real_escape_string($koneksi, $_GET['kategori']);
                    $query  = "SELECT * FROM tanaman WHERE id_kategori = '$id_kat_filter' ORDER BY id_tanaman DESC";
                } else {
                    $query  = "SELECT * FROM tanaman ORDER BY id_tanaman DESC";
                }
                
                $result = mysqli_query($koneksi, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id_tanaman   = $row['id_tanaman'];
                        $nama_tanaman = $row['nama_tanaman'];
                        $masa_panen   = $row['masa_panen'];
                        $gambar_file  = $row['gambar'];
                        
                        $foto_tampil = (!empty($gambar_file)) ? $gambar_file : "https://via.placeholder.com/200?text=No+Image";
                ?>
                        <div class="bg-white rounded-2xl p-3 border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition">
                            <div>
                                <div class="w-full h-32 bg-gray-100 rounded-xl overflow-hidden mb-3.5 relative">
                                    <img src="<?php echo $foto_tampil; ?>" alt="<?php echo $nama_tanaman; ?>" class="w-full h-full object-cover">
                                </div>
                                
                                <span class="bg-green-50 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded-md tracking-wide">
                                    Tersedia
                                </span>
                                
                                <h3 class="font-bold text-gray-800 mt-2 text-sm leading-tight h-10 line-clamp-2"><?php echo $nama_tanaman; ?></h3>
                                
                                <div class="text-[11px] text-gray-500 mt-2 space-y-1 border-t border-gray-50 pt-2">
                                    <p class="flex items-center">
                                        <span class="mr-1.5 text-gray-400">📅</span> Waktu Panen/Berbuah
                                    </p>
                                    <p class="font-semibold text-gray-700 pl-4"><?php echo (!empty($masa_panen)) ? $masa_panen : '3-4 Tahun'; ?></p>
                                </div>

                                <div class="text-[11px] text-gray-500 mt-1 pb-1">
                                    <p class="flex items-center">
                                        <span class="mr-1.5 text-gray-400">☀️</span> Kebutuhan Matahari
                                    </p>
                                    <p class="font-semibold text-gray-700 pl-4">Full Sun</p>
                                </div>
                            </div>
                            
                            <a href="detail.php?id=<?php echo $id_tanaman; ?>" class="w-full text-center bg-green-600 text-white py-2 rounded-xl text-xs font-bold mt-3 hover:bg-green-700 block transition shadow-sm shadow-green-100">
                                Lihat Detail
                            </a>
                        </div>
                <?php
                    }
                } else {
                    echo "<p class='col-span-2 text-center text-gray-400 text-xs py-12 bg-gray-50 rounded-2xl border border-dashed'>Belum ada data bibit tanaman di kategori ini.</p>";
                }
                ?>
            </div>

            <div class="flex justify-center items-center space-x-2 mt-8">
                <span class="w-7 h-7 bg-green-600 text-white rounded-lg text-xs font-bold flex items-center justify-center shadow-md shadow-green-100">1</span>
                <span class="w-7 h-7 bg-white text-gray-600 border border-gray-200 rounded-lg text-xs font-semibold flex items-center justify-center hover:bg-gray-50 cursor-pointer">2</span>
                <span class="w-7 h-7 bg-white text-gray-600 border border-gray-200 rounded-lg text-xs font-semibold flex items-center justify-center hover:bg-gray-50 cursor-pointer">3</span>
                <span class="text-gray-400 text-xs px-1">...</span>
            </div>
        </main>
    </div>

    <nav class="fixed bottom-0 left-0 right-0 max-w-md mx-auto bg-white/95 backdrop-blur-md border-t border-gray-100 py-2.5 px-6 flex justify-between items-center shadow-[0_-4px_12px_rgba(0,0,0,0.03)] z-50">
        <a href="index.php" class="flex flex-col items-center text-green-600">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
            <span class="text-[10px] font-bold mt-1">Beranda</span>
        </a>
        <a href="index.php" class="flex flex-col items-center text-gray-400 hover:text-green-600 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            <span class="text-[10px] font-semibold mt-1">Katalog</span>
        </a>
        <button class="flex flex-col items-center text-gray-400 hover:text-green-600 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="text-[10px] font-semibold mt-1">Tentang Kami</span>
        </button>
        <a href="https://wa.me/625142599163?text=Halo%20Admin%20TaniUnggul" target="_blank" class="flex flex-col items-center text-gray-400 hover:text-green-600 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
            <span class="text-[10px] font-semibold mt-1">Hubungi Kami</span>
        </a>
    </nav>

</body>
</html>