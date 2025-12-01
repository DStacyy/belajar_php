<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query ($konek, "DELETE FROM siswa WHERE id=$id");

header('location: index.php');
?>