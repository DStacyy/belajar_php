<?php
require_once('koneksi.php');

// tes lihat tabel
$ql = "SELECT nama_anggota FROM anggota";
$result = mysqli_query($conn, $ql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['nama_anggota'] . "<br>";
    }
} else {
    echo "Query error: " . mysqli_error($conn);
}
?>
