<?php
$konek = mysqli_connect ("localhost","root","","siswa_db");

if (!$konek) {
    echo "Koneksi Gagal: " . mysqli_connect_error();
} else {
    echo "Koneksi Berhasil!";
}