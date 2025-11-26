<?php
$koneksi = mysqli_connect("localhost","root","","perpustakaan_db");
if (!$koneksi) {
    echo  "koneksi gagal" . mysqli_connect_error();
} else {
    echo "berhasil";
}
?>