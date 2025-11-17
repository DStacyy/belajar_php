<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Fungsi</title>
</head>
<body>
    <h2>Belajar Fungsi</h2>
    <?php
    // 1️⃣ Fungsi dengan parameter dan return (sudah kamu buat)
    function itungJir($sisi){
        $luas = $sisi * $sisi;
        return $luas;
    }

    // 2️⃣ Fungsi dengan parameter tapi tanpa return
    function cetakKeliling($sisi){
        $keliling = $sisi * 4;
        echo "Keliling Persegi = $keliling <br>";

    }

    // 3️⃣ Fungsi tanpa parameter dan tanpa return
    function salamPagi(){
        echo "Selamat pagi, dunia PHP! 🌞 <br>";
    }

    // --- Pemanggilan fungsi ---
    $hasil = itungJir(5);
    echo "Luas persegi: $hasil <br>";

    cetakKeliling(5);
    salamPagi();
    ?>
    <?php
    function buatSandwich($roti, $isi){
        
    }
    ?>
</body>
</html>
