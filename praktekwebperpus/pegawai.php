<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan_db";

$conn= mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die ("konek gagal ".mysqli_connect_error());
}
$sql = "SELECT * FROM pegawai";
$result = mysqli_query ($conn, $sql);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
        table { border-collapse: collapse; width: 70%; background: white; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover {
                background-color: #d0f0c0; /* warna hijau muda pas di-hover */
                transition: 0.1s; /* biar halus */
        }
    </style>
<body>
    <h2>daftar pegawai</h2>
    <table>
        <tr>
            <th>NIP</th>
            <th>Password</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
        </tr>

        <?php
        if (mysqli_num_rows($result)>0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<tr>";                
                echo "<td>".$row['nip_peg']."</td>";
                echo "<td>".$row['password']."</td>";
                echo "<td>".$row['nama_peg']."</td>";
                echo "<td>".($row['jk']==1? 'Laki-laki' : 'Perempuan')."</td>";
                echo "<td>".$row['alamat_peg']."</td>";
                echo "</tr>";
                }
            }else{
                echo "<tr><td colspan='5'> tidak ada data pegawai.</td></tr>";
            }
        

        mysqli_close($conn);
        ?>
    </table>
</body>
</html>