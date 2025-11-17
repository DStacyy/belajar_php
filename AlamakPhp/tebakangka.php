   <?php
session_start();

// Inisialisasi game
if (!isset($_SESSION['angka_rahasia'])) {
    $_SESSION['angka_rahasia'] = rand(1, 100);
    $_SESSION['percobaan'] = 0;
    $_SESSION['riwayat'] = [];  
}

$pesan = "";
$tebakan = "";

// Proses tebakan
if (isset($_POST['tebak'])) {
    $tebakan = (int) $_POST['tebakan'];
    $_SESSION['percobaan']++;

    if ($tebakan < 1 || $tebakan > 100) {
        $pesan = "Masukkan angka antara 1-100!";
    } else {
        $_SESSION['riwayat'][] = $tebakan;

        if ($tebakan < $_SESSION['angka_rahasia']) {
            $pesan = "Terlalu RENDAH! Coba angka lebih tinggi.";
        } elseif ($tebakan > $_SESSION['angka_rahasia']) {
            $pesan = "Terlalu TINGGI! Coba angka lebih rendah.";
        } else {
            $pesan = "SELAMAT! Anda menebak angka " . $_SESSION['angka_rahasia'] . " dalam " . $_SESSION['percobaan'] . " percobaan!";
            // Reset game
            unset($_SESSION['angka_rahasia']);
        }
    }
}

// Reset game
if (isset($_POST['reset'])) {
    unset($_SESSION['angka_rahasia']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Game Tebak Angka</title>   
</head>
    <style>
        body{
            background-color:skyblue;
        }
    </style>
<body>
    <div class="game-container">
        <h1>GAME TEBAK ANGKA</h1>
        <p>Saya telah memilih angka antara <strong>1-100</strong>. Coba tebak!</p>

        <?php if ($pesan): ?>
            <div style="padding: 15px; margin: 15px 0; background-color: white; border-radius: 8px; font-size: 18px;">
                <?php echo $pesan; ?>
            </div>
        <?php endif; ?>

        <?php if (!isset($_SESSION['angka_rahasia'])): ?>
            <form method="POST">
                <button type="submit" name="reset" class="btn btn-reset">Main Lagi</button>
            </form>
        <?php else: ?>
            <form method="POST">
                <input type="number" name="tebakan" class="input-tebakan" min="1" max="100" required
                    value="<?php echo $tebakan; ?>" autofocus>
                <br>
                <button type="submit" name="tebak" class="btn btn-tebak">Tebak!</button>
                <button type="submit" name="reset" class="btn btn-reset">Reset</button>
            </form>

            <div class="riwayat">
                <strong>Percobaan ke-<?php echo $_SESSION['percobaan']; ?></strong>
                <?php if (!empty($_SESSION['riwayat'])): ?>
                    <br>Riwayat tebakan:
                    <?php
                    $riwayat_terbaru = array_slice($_SESSION['riwayat'], -5); // 5 tebakan terakhir
                    echo implode(", ", $riwayat_terbaru);
                    ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
