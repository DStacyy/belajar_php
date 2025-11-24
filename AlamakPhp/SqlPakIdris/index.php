<?php include 'koneksi.php'?>
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
        <h2 class="mb-4">Siswa</h2>
        <a href="add.php" class="btn btn-success mb-3">Tambah Data</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                    </tr>
            </thead>
            <tbody>
                <?php
                    $query  = "SELECT * FROM siswa";
                    $result = mysqli_query($konek, $query);
                    while($row = mysqli_fetch_assoc ($result)){

                    
                ?>
                    <tr>
                        <td><?=$row ['id']?></td>
                        <td><?=$row ['nama']?></td>
                        <td><?=$row ['kelas']?></td>
                        <td><?=$row ['alamat']?></td>
                    </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>