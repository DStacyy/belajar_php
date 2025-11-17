<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// 🔢 FUNGSI MATEMATIKA PHP

$angka = 25.7;

echo "sqrt(): " . sqrt($angka) . "<br>";           // akar kuadrat → 5.069...
echo "round(): " . round($angka) . "<br>";         // pembulatan terdekat → 26
echo "floor(): " . floor($angka) . "<br>";         // pembulatan ke bawah → 25
echo "ceil(): " . ceil($angka) . "<br>";           // pembulatan ke atas → 26
echo "rand(): " . rand(1, 100) . "<br>";           // angka acak antara 1–100
echo "abs(): " . abs(-10) . "<br>";                // nilai mutlak → 10

echo "<hr>";

// 🔡 FUNGSI STRING PHP

$teks = "Belajar PHP di SMK";

echo "strlen(): " . strlen($teks) . "<br>";              // panjang string → 19
echo "strtoupper(): " . strtoupper($teks) . "<br>";      // ubah jadi huruf besar semua
echo "strtolower(): " . strtolower($teks) . "<br>";      // ubah jadi huruf kecil semua
echo "ucwords(): " . ucwords($teks) . "<br>";            // kapital setiap kata
echo "strpos(): " . strpos($teks, "PHP") . "<br>";       // posisi teks "PHP" → 8
echo "str_replace(): " . str_replace("SMK", "Sekolah", $teks) . "<br>";  // ganti kata
?>

</body>
</html>