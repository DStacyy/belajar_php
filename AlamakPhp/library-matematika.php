<?php
// 📚 LIBRARY FUNGSI MATEMATIKA UNTUK SISWA SMK

/**
 * Menghitung luas persegi
 */
function hitungLuasPersegi($sisi)
{
    return $sisi * $sisi;
}

/**
 * Menghitung keliling persegi
 */
function hitungKelilingPersegi($sisi)
{
    return 4 * $sisi;
}

/**
 * Menghitung luas persegi panjang
 */
function hitungLuasPersegiPanjang($panjang, $lebar)
{
    return $panjang * $lebar;
}

/**
 * Menghitung keliling persegi panjang  
 */
function hitungKelilingPersegiPanjang($panjang, $lebar)
{
    return 2 * ($panjang + $lebar);
}

/**
 * Menghitung luas segitiga
 */
function hitungLuasSegitiga($alas, $tinggi)
{
    return 0.5 * $alas * $tinggi;
}

/**
 * Menghitung luas lingkaran
 */
function hitungLuasLingkaran($jariJari)
{
    return 3.14159 * $jariJari * $jariJari;
}

/**
 * Menghitung keliling lingkaran
 */
function hitungKelilingLingkaran($jariJari)
{
    return 2 * 3.14159 * $jariJari;
}

/**
 * Menghitung volume kubus
 */
function hitungVolumeKubus($sisi)
{
    return $sisi * $sisi * $sisi;
}

/**
 * Konversi suhu Celcius ke Fahrenheit
 */
function celciusToFahrenheit($celcius)
{
    return ($celcius * 9 / 5) + 32;
}

/**
 * Konversi suhu Fahrenheit ke Celcius
 */
function fahrenheitToCelcius($fahrenheit)
{
    return ($fahrenheit - 32) * 5 / 9;
}

/**
 * Menghitung BMI (Body Mass Index)
 */
function hitungBMI($berat, $tinggi)
{
    $tinggiMeter = $tinggi / 100;
    return $berat / ($tinggiMeter * $tinggiMeter);
}

/**
 * Mendapatkan kategori BMI
 */
function kategoriBMI($bmi)
{
    if ($bmi < 18.5) {
        return ["Underweight", "#3498db", "💪"];
    } elseif ($bmi < 25) {
        return ["Normal", "#2ecc71", "👍"];
    } elseif ($bmi < 30) {
        return ["Overweight", "#f39c12", "⚠️"];
    } else {
        return ["Obesitas", "#e74c3c", "🚨"];
    }
}
?>

<!-- // 🎯 TEST DAN DEMONSTRASI FUNGSI -->
<!DOCTYPE html>
<html>

<head>
    <title>📐 Library Matematika SMK</title>
    <link rel="stylesheet" href="library-matematika.css">
</head>

<body>
    <div class='container'>
        <h1>📐 Library Fungsi Matematika SMK</h1>

        <!-- // Demo Baxangun Datar -->
        <div class='card'>
            <h2>📏 Bangun Datar</h2>
            <div class='grid'>
                <div class='result'>
                    <strong>Persegi (sisi=5)</strong><br>
                    Luas: <?php echo hitungLuasPersegi(5); ?> <br>
                    Keliling: <?php echo  hitungKelilingPersegi(5); ?>
                </div>
                <div class='result'>
                    <strong>Persegi Panjang (4×6)</strong><br>
                    Luas: <?php echo hitungLuasPersegiPanjang(4, 6); ?><br>
                    Keliling: <?php echo hitungKelilingPersegiPanjang(4, 6); ?>
                </div>
                <div class='result'>
                    <strong>Segitiga (alas=8, tinggi=5)</strong><br>
                    Luas: <?php echo hitungLuasSegitiga(8, 5); ?>
                </div>
                <div class='result'>
                    <strong>Lingkaran (r=7)</strong><br>
                    Luas: <?php echo round(hitungLuasLingkaran(7), 2); ?><br>
                    Keliling: <?php echo round(hitungKelilingLingkaran(7), 2); ?>
                </div>
            </div>
        </div>

        <!-- // Demo Bangun Ruang -->
        <div class='card'>
            <h2>🧊 Bangun Ruang</h2>
            <div class='result'>
                <strong>Kubus (sisi=3)</strong><br>
                Volume: <?php echo hitungVolumeKubus(3); ?>
            </div>
        </div>

        <!-- // Demo Konversi Suhu -->
        <div class='card'>
            <h2>🌡️ Konversi Suhu</h2>
            <div class='grid'>
                <div class='result'>
                    <strong>25°C → Fahrenheit</strong><br>
                    <?php echo round(celciusToFahrenheit(25), 2) ?>°F
                </div>
                <div class='result'>
                    <strong>77°F → Celcius</strong><br>
                    <?php echo round(fahrenheitToCelcius(77), 2) ?>°C
                </div>
            </div>
        </div>

        <!-- // Demo BMI Calculator -->
        <div class='card'>
            <h2>💪 Kalkulator BMI</h2>
            <?php
            $berat = 65; // kg
            $tinggi = 170; // cm
            $bmi = hitungBMI($berat, $tinggi);
            list($kategori, $warna, $icon) = kategoriBMI($bmi);
            ?>

            <div class='result'>
                <strong>Data: <?php echo $berat; ?> kg, <?php echo $tinggi; ?> cm</strong><br>
                BMI: <?php echo round($bmi, 2); ?><br>
                <strong style='color: <?php echo $warna; ?>'><?php echo $icon;
                                                                echo $kategori; ?></strong>
            </div>
        </div>

    </div>
</body>

</html>
