<?php
include "koneksi.php";
$id = $_GET['id'];

$data = mysqli_query($konek, "SELECT *FROM siswa WHERE id=$id");
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="p-4">
    <div class="container">
        <h2>Edit Data Siswa</h2>
        <form action="" method="post">
            <div>
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama"id="nama" class="form-control"> 
            </div>
            <div>
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" name="kelas"id="kelas" class="form-control"> 
            </div>
            <div>
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control"></textarea>
            </div>
            <input type="submit" value="submit" class="btn btn-primary">       
        </form>
    </div>
</body>
</html>