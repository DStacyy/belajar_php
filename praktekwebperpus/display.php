<?php
// === KONEKSI DATABASE ===
$host = "localhost";
$user = "root";
$pass = "";
$db   = "perpustakaan_db";

$koneksi = mysqli_connect($host, $user, $pass, $db);

// Uji koneksi
if (!$koneksi) {
    die("<p style='color:red; text-align:center;'>❌ Koneksi gagal: " . mysqli_connect_error() . "</p>");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            padding: 30px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 6px;
            overflow: hidden;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px 15px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #eaf2ff;
        }
    </style>
</head>
<body>
    <h1>📋 Data Pegawai</h1>

    <table>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Password</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
        </tr>

        <?php
        // === AMBIL DATA DARI TABEL PEGAWAI ===
        $query = "SELECT * FROM pegawai";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            echo "<tr><td colspan='6' style='color:red;'>Query gagal: " . mysqli_error($koneksi) . "</td></tr>";
        } elseif (mysqli_num_rows($result) > 0) {
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nip_peg']}</td>
                        <td>{$row['password']}</td>
                        <td>{$row['nama_peg']}</td>
                        <td>{$row['jk']}</td>
                        <td>{$row['alamat_peg']}</td>
                      </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data pegawai</td></tr>";
        }

        // Tutup koneksi
        mysqli_close($koneksi);
        ?>
    </table>
</body>
</html>
