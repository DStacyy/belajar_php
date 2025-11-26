<?php
include 'conn.php';

if(!isset($_GET['table'])) {
    die("Tabel belum dipilih!");
}

$table = $_GET['table'];

// Ambil kolom tabel
$columns_result = mysqli_query($koneksi, "SHOW COLUMNS FROM $table");
$columns = [];
$auto_inc = [];
while($col = mysqli_fetch_assoc($columns_result)) {
    if($col['Extra'] != 'auto_increment') {
        $columns[] = $col['Field'];
    } else {
        $auto_inc[] = $col['Field'];
    }
}

// Proses submit form
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $values = [];
    foreach($columns as $col) {
        $values[] = "'" . mysqli_real_escape_string($koneksi, $_POST[$col]) . "'";
    }
    $sql = "INSERT INTO $table (" . implode(",", $columns) . ") VALUES (" . implode(",", $values) . ")";
    if(mysqli_query($koneksi, $sql)) {
        header("Location: index.php?table_name=$table");
        exit;
    } else {
        $error = mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>➕ Tambah Data - <?php echo $table; ?></title>
    <style>
        body { font-family: Arial; background: #f0f2f5; padding: 30px; }
        h1 { text-align: center; color: #333; }
        form { width: 400px; margin: 20px auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 6px; }
        label { display: block; margin-top: 10px; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 15px; padding: 8px 12px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .error { color: red; text-align:center; margin-bottom:10px; }
    </style>
</head>
<body>

<h1>➕ Tambah Data - <?php echo $table; ?></h1>

<?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>

<form method="POST">
    <?php foreach($columns as $col): ?>
        <label><?php echo $col; ?>:</label>
        <?php
        // Jika nama kolom mengandung tanggal
        if(strpos(strtolower($col), 'tgl') !== false) {
            echo "<input type='date' name='$col' required>";
        } else {
            echo "<input type='text' name='$col' required>";
        }
        ?>
    <?php endforeach; ?>
    <button type="submit">Tambah Data</button>
</form>

</body>
</html>
