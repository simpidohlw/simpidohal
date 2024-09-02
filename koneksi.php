<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'tkj';

// Membuat koneksi ke database
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Cek koneksi
if (!$conn) {
    die('Koneksi gagal: ' . mysqli_connect_error());
}
?>
