<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Perpustakaan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        select, button { margin: 5px; padding: 5px 10px; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background: #f2f2f2; }
    </style>
</head>

<body>
<h2>📚 Dashboard Perpustakaan</h2>

<form method="GET">
    <label>Pilih Tabel: </label>
    <select name="tabel" required>
        <option value="">-- pilih tabel --</option>
        <?php
        $hasil = mysqli_query($koneksi, "SHOW TABLES");
        while ($row = mysqli_fetch_row($hasil)) {
            $selected = (isset($_GET['tabel']) && $_GET['tabel'] == $row[0]) ? "selected" : "";
            echo "<option value='{$row[0]}' $selected>{$row[0]}</option>";
        }
        ?>
    </select>

    <label>Ukuran Kertas: </label>
    <select name="ukuran">
        <option value="A4" selected>A4</option>
        <option value="F4">F4 (Legal)</option>
    </select>

    <button type="submit" name="preview">Preview</button>
    <?php if(isset($_GET['tabel'])): ?>
        <a href="edit_data.php?tabel=<?php echo $_GET['tabel']; ?>"><button type="button">Edit Data</button></a>
       <?php if (isset($_GET['tabel']) && isset($_GET['ukuran'])): ?>
    <a href="export_pdf.php?tabel=<?php echo $_GET['tabel']; ?>&ukuran=<?php echo $_GET['ukuran']; ?>">
        <button type="button">Download PDF</button>
    </a>
<?php endif; ?>

    <?php endif; ?>
</form>

<?php
if (isset($_GET['preview']) && $_GET['tabel'] != "") {
    $tabel = mysqli_real_escape_string($koneksi, $_GET['tabel']);
    $data = mysqli_query($koneksi, "SELECT * FROM $tabel");
    $kolom = mysqli_fetch_fields($data);

    echo "<h3>Preview: $tabel</h3>";
    echo "<table><tr>";
    foreach ($kolom as $kol) {
        echo "<th>{$kol->name}</th>";
    }
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($data)) {
        echo "<tr>";
        foreach ($row as $isi) {
            echo "<td>{$isi}</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>
</body>
</html>
