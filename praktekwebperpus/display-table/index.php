<?php
include 'conn.php'; // koneksi ke database

// Ambil daftar tabel
$tabel_result = mysqli_query($koneksi, "SHOW TABLES");

// Tabel yang dipilih
$table = isset($_GET['table_name']) ? $_GET['table_name'] : 'pegawai';

// Ambil kolom tabel yang dipilih
$columns_result = mysqli_query($koneksi, "SHOW COLUMNS FROM $table");
$columns = [];
while ($col = mysqli_fetch_assoc($columns_result)) {
    $columns[] = $col['Field'];
}

// Ambil data tabel
$data_result = mysqli_query($koneksi, "SELECT * FROM $table");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>📋 Display Tabel Perpustakaan</title>
    <style>
        body { font-family: Arial; background: #f0f2f5; padding: 30px; }
        h1 { text-align: center; color: #333; }
        table { width: 90%; margin: 20px auto; border-collapse: collapse; background: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #ddd; padding: 10px 15px; text-align: center; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #eaf2ff; }
        form { text-align: center; margin-bottom: 20px; }
        select { padding: 5px 10px; }
        a.button { text-decoration: none; background: #28a745; color: white; padding: 5px 10px; border-radius: 4px; }
    </style>
</head>
<body>

<h1>📋 Display Tabel Perpustakaan</h1>

<form method="GET" action="">
    <label>Pilih Tabel:</label>
    <select name="table_name" onchange="this.form.submit()">
        <?php while ($row = mysqli_fetch_array($tabel_result)) {
            $selected = ($table == $row[0]) ? "selected" : "";
            echo "<option value='{$row[0]}' $selected>{$row[0]}</option>";
        } ?>
    </select>
</form>

<div style="text-align:center;">
    <a class="button" href="add.php?table=<?php echo $table; ?>">➕ Tambah Data</a>
</div>

<table>
    <tr>
        <th>No</th>
        <?php foreach ($columns as $col) echo "<th>$col</th>"; ?>
    </tr>

    <?php
    if($data_result && mysqli_num_rows($data_result) > 0) {
        $no = 1;
        while($row = mysqli_fetch_assoc($data_result)) {
            echo "<tr>";
            echo "<td>{$no}</td>";
            foreach($columns as $col) echo "<td>{$row[$col]}</td>";
            echo "</tr>";
            $no++;
        }
    } else {
        echo "<tr><td colspan='".(count($columns)+1)."'>Tidak ada data</td></tr>";
    }
    ?>
</table>

</body>
</html>
