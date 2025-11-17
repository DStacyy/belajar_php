<?php
// Data nilai seluruh kelas
$nilai_kelas = [
"Rusdi Barbershop" => [
"matematika" => 85,
"bahasa_inggris" => 78,
"pemrograman" => 92,
"desain_web" => 88
],
"Narji Kuliner" => [
"matematika" => 90,
"bahasa_inggris" => 85,
"pemrograman" => 88,
"desain_web" => 82
],
"Fajar Basikal" => [
"matematika" => 75,
"bahasa_inggris" => 80,
"pemrograman" => 85,
"desain_web" => 90
],
"Arief Esek Esek Troloyo" => [
"matematika" => 65,
"bahasa_inggris" => 70,
"pemrograman" => 78,
"desain_web" => 72
]
];
// Fungsi menghitung rata-rata
function hitung_rata_rata($nilai_siswa) {
$total = array_sum($nilai_siswa);
$jumlah_mapel = count($nilai_siswa);
return round($total / $jumlah_mapel, 2);
}
// Fungsi menentukan status
function tentukan_status($rata_rata) {
if ($rata_rata >= 90) return ["🎉 Excellent", "#27ae60"];
if ($rata_rata >= 80) return ["👍 Good", "#2ecc71"];
if ($rata_rata >= 70) return ["👌Average", "#f39c12"];
return ["💪 Need Improvement", "#e74c3c"];

}
?>
<!DOCTYPE html>
<html>
<head>
<title>📊 Sistem Manajemen Nilai</title>
<style>
.container { max-width: 1000px; margin: 20px auto; padding: 20px; }
.student-card {
border: 2px solid #3498db;
margin: 15px 0;
padding: 15px;
border-radius: 10px;
background-color: #f8f9fa;
}
.subject { display: flex; justify-content: space-between; margin: 5px 0; }
.grade-A { color: #27ae60; font-weight: bold; }
.grade-B { color: #2ecc71; font-weight: bold; }
.grade-C { color: #f39c12; font-weight: bold; }
.grade-D { color: #e74c3c; font-weight: bold; }
</style>
</head>
<body>
<div class="container">
<h1>🎓 Sistem Manajemen Nilai Kelas</h1>
<?php foreach ($nilai_kelas as $nama_siswa => $nilai_siswa): ?>
<?php
$rata_rata = hitung_rata_rata($nilai_siswa);
list($status, $warna) = tentukan_status($rata_rata);
?>
<div class="student-card" style="border-color: <?php echo $warna; ?>">
<h2>👨‍🎓 <?php echo $nama_siswa; ?></h2>
<div class="subjects">
<?php foreach ($nilai_siswa as $mata_pelajaran => $nilai): ?>
<?php
$kelas_grade = "grade-";
if ($nilai >= 90) $kelas_grade .= "A";
elseif ($nilai >= 80) $kelas_grade .= "B";
elseif ($nilai >= 70) $kelas_grade .= "C";
else $kelas_grade .= "D";
?>
<div class="subject">
<span>📚 <?php echo ucfirst(str_replace("_", " ",

$mata_pelajaran)); ?>:</span>

<span class="<?php echo $kelas_grade; ?>"><?php echo $nilai;

?></span>

</div>

<?php endforeach; ?>
</div>
<div style="margin-top: 15px; padding: 10px; background-color: white;
border-radius: 5px;">

<strong>Rata-rata: <?php echo $rata_rata; ?></strong> |
<strong style="color: <?php echo $warna; ?>"><?php echo $status; ?>

></strong>
</div>
</div>
<?php endforeach; ?>
<!-- Statistik Kelas -->
<div style="border: 2px solid #9b59b6; padding: 20px; border-radius: 10px;
margin-top: 30px;">
<h2>📈 Statistik Kelas</h2>
<?php
// Hitung statistik
$semua_nilai = [];
foreach ($nilai_kelas as $nilai_siswa) {
$semua_nilai = array_merge($semua_nilai, array_values($nilai_siswa));
}
$rata_rata_kelas = round(array_sum($semua_nilai) / count($semua_nilai),
2);
$nilai_tertinggi = max($semua_nilai);
$nilai_terendah = min($semua_nilai);
$jumlah_siswa = count($nilai_kelas);
?>
<p>👥 Jumlah Siswa: <strong><?php echo $jumlah_siswa; ?></strong>
</p>
<p>📊 Rata-rata Kelas: <strong><?php echo $rata_rata_kelas; ?>
</strong></p>
<p>🚀 Nilai Tertinggi: <strong><?php echo $nilai_tertinggi; ?></strong>
</p>
<p>📉 Nilai Terendah: <strong><?php echo $nilai_terendah; ?></strong>
</p>
</div>
</div>
</body>
</html>