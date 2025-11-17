<h1>Array Asosiatif</h1>
<?php
$kartu_pelajar = [
    "nama" => "Dimas",
    "nis" => "09090",
    "jurusan" => "RPL",
    "kelas" => "XI"
];
?>
<ul>
    <li><?php echo "Nama siswa: " . $kartu_pelajar['nama']; ?></li>
    <li><?php echo "NIS: " . $kartu_pelajar['nis']; ?></li>
    <li><?php echo "Kelas: " . $kartu_pelajar['kelas']; ?></li>
    <li><?php echo "Jurusan: " . $kartu_pelajar['jurusan']; ?></li>
</ul>

<?php
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Key</th><th>Value</th></tr>";
foreach ($kartu_pelajar as $key => $value) {
    echo "<tr><td>$key</td><td>$value</td></tr>";
}
echo "</table>";
?>

<h1>Array Multidimensi</h1>
<?php
$data_sekolah = [
    "XI RPL 1" => [
        "wali_kelas" => "Pak Zuan",
        "jumlah_siswa" => 35,
        "siswa" => [
            [
                "nama" => "Fuajar",
                "nis" => "989898",
                "alamat" => [
                    "desa" => "Mancilan",
                    "kecamatan" => "Mojoagung",
                ]
            ],
            [
                "nama" => "Jaki",
                "nis" => "090909",
                "alamat" => [
                    "desa" => "Talun",
                    "kecamatan" => "Mbito",
                ]
            ]
        ]
    ],
    "XI RPL 2" => [
        "wali_kelas" => "Pak Idris",
        "jumlah_siswa" => 34,
        "siswa" => [
            [
                "nama" => "Abid Hafiez",
                "nis" => "979797",
                "alamat" => [
                    "desa" => "Kauman",
                    "kecamatan" => "Mojoagung",
                ]
            ],
            [
                "nama" => "Ariep",
                "nis" => "090909",
                "alamat" => [
                    "desa" => "Troloyo",
                    "kecamatan" => "Trowulan",
                ]
            ]
        ]
    ]
];
?>

<ul>
    <li><?php echo "Nama Wali Kelas XI RPL 1: " . $data_sekolah['XI RPL 1']['wali_kelas']; ?></li>
    <li><?php echo "Nama Wali Kelas XI RPL 2: " . $data_sekolah['XI RPL 2']['wali_kelas']; ?></li>
</ul>

<?php
echo "<h3>Data Lengkap Sekolah</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Kelas</th><th>Wali Kelas</th><th>Jumlah Siswa</th><th>Daftar Siswa</th></tr>";

foreach ($data_sekolah as $kelas => $info) {
    echo "<tr>";
    echo "<td>$kelas</td>";
    echo "<td>" . $info['wali_kelas'] . "</td>";
    echo "<td>" . $info['jumlah_siswa'] . "</td>";
    echo "<td>";
    
    foreach ($info['siswa'] as $siswa) {
        echo "<b>" . $siswa['nama'] . "</b> (" . $siswa['nis'] . ")<br>";
        echo "Alamat: " . $siswa['alamat']['desa'] . ", " . $siswa['alamat']['kecamatan'] . "<br><br>";
    }

    echo "</td>";
    echo "</tr>";
}

echo "</table>";



?>
<h2>fungsi di array</h2>

<?php


// Kita punya keranjang berisi nama-nama buah
$buah = ["apel", "jeruk", "mangga", "lemon", "manggis"];

// Kita mau menampilkan semua buah, dipisahkan pakai koma dan spasi
echo implode("| ", $buah);


?>
<h2>Perulangan Array</h2>
<?php
$buah = ["apel", "jeruk", "mangga", "lemon", "manggis"];

foreach ($buah as $namaBuah) {
    echo $namaBuah . "<br>";
}
?>
<h3>for biasa</h3>
<?php
for ($i = 0; $i < count ($buah); $i++) {
    echo $buah[$i] . "<br>";
}
?>
<h2>contoh array asosiatif</h2>
<?php
$buah = [
  "nis" => "089899778787",
  "nama" => "dimz tzy",
  "alamat" => "miagan"
];

foreach ($buah as $key => $dataSiswa) {
  echo $dataSiswa. "<br>";
}
?>
