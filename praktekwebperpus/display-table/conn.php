<?php
$koneksi = mysqli_connect ("localhost","root","","perpustakaan_db");

if (!$koneksi) {
    echo "Koneksi Gagal: " . mysqli_connect_error();
} else {
    echo "Koneksi Berhasil!";
}