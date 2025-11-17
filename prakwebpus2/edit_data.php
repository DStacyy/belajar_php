<?php
include 'koneksi.php';
$tabel = $_GET['tabel'] ?? '';

if (!$tabel) {
    die("Tabel tidak ditentukan!");
}

// ambil semua data
$data = mysqli_query($koneksi, "SELECT * FROM $tabel");
$kolom = mysqli_fetch_fields($data);
$kolomNama = array_map(fn($k) => $k->name, $kolom);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Data - <?php echo htmlspecialchars($tabel); ?></title>
<style>
body { font-family: Arial; margin: 20px; background: #f4f6f9; }
table { border-collapse: collapse; width: 100%; background: white; }
th, td { border: 1px solid #ccc; padding: 6px; }
th { background: #e0e0e0; }
input[type=text] { width: 100%; border: none; background: #fafafa; padding: 4px; }
button {
  padding: 8px 16px;
  background: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
button:hover { background: #0056b3; }
</style>
</head>
<body>
<h2>✏️ Edit Data: <?php echo htmlspecialchars($tabel); ?></h2>

<form method="POST">
<table>
<tr>
<?php foreach ($kolomNama as $k) echo "<th>$k</th>"; ?>
<th>Pilih</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($data)): ?>
<tr>
<?php foreach ($kolomNama as $k): ?>
    <td><input type="text" name="<?php echo $k; ?>[<?php echo $row[$kolomNama[0]]; ?>]" value="<?php echo htmlspecialchars($row[$k]); ?>"></td>
<?php endforeach; ?>
<td style="text-align:center;">
    <input type="checkbox" name="update_row[]" value="<?php echo htmlspecialchars($row[$kolomNama[0]]); ?>">
</td>
</tr>
<?php endwhile; ?>
</table>

<br>
<button type="submit" name="simpan">Simpan Perubahan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    if (!empty($_POST['update_row'])) {
        foreach ($_POST['update_row'] as $primaryKeyValue) {
            $set = [];
            foreach ($kolomNama as $field) {
                if ($field == $kolomNama[0]) continue; // skip kolom pertama (primary key)
                $val = mysqli_real_escape_string($koneksi, $_POST[$field][$primaryKeyValue]);
                $set[] = "$field='$val'";
            }
            $whereField = $kolomNama[0];
            $sql = "UPDATE $tabel SET " . implode(", ", $set) . " WHERE $whereField='$primaryKeyValue'";
            $ok = mysqli_query($koneksi, $sql);

            if (!$ok) {
                echo "<p style='color:red;'>❌ Gagal update: " . mysqli_error($koneksi) . "</p>";
            }
        }
        echo "<p>✅ Data berhasil diperbarui! <a href='dashboard.php?tabel=$tabel&preview=1'>Kembali</a></p>";
    } else {
        echo "<p>⚠️ Tidak ada baris yang dipilih untuk diperbarui.</p>";
    }
}
?>
</body>
</html>
