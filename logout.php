<?php
session_start();

session_unset();
session_destroy(); 

echo "<script>alert('Anda telah berhasil keluar dari sistem admin.'); window.location='index.php';</script>";
exit;
?>