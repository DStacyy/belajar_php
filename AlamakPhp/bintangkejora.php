<?php
echo "<h2>⭐ GENERATOR POLA BINTANG</h2>";
echo "<div style='display: flex; flex-wrap: wrap; gap: 20px; justify-content:
center;'>";
// Pola 1: Segitiga siku-siku kiri
echo "<div style='border: 2px solid #e74c3c; padding: 15px; border-radius:
10px;'>";
echo "<h3>Segitiga Siku-siku Kiri</h3>";
for ($i = 1; $i <= 5; $i++) {
for ($j = 1; $j <= $i; $j++) {
echo "⭐";
}
echo "<br>";
}
echo "</div>";
// Pola 2: Segitiga siku-siku kanan
echo "<div style='border: 2px solid #3498db; padding: 15px; border-radius:
10px;'>";
echo "<h3>Segitiga Siku-siku Kanan</h3>";
for ($i = 1; $i <= 5; $i++) {
// Spasi sebelum bintang
for ($j = 5; $j > $i; $j--) {
echo "&nbsp;&nbsp;";
}
// Bintang
for ($k = 1; $k <= $i; $k++) {
echo "⭐";
}
echo "<br>";
}
echo "</div>";
// Pola 3: Piramida
echo "<div style='border: 2px solid #2ecc71; padding: 15px; border-radius:
10px;'>";
echo "<h3>Piramida</h3>";
for ($i = 1; $i <= 5; $i++) {

// Spasi
for ($j = 5; $j > $i; $j--) {
echo "&nbsp;&nbsp;";
}
// Bintang
for ($k = 1; $k <= (2 * $i - 1); $k++) {
echo "⭐";
}
echo "<br>";
}
echo "</div>";
// Pola 4: Diamond (Berlian)
echo "<div style='border: 2px solid #9b59b6; padding: 15px; border-radius:
10px;'>";
echo "<h3>Diamond</h3>";
$tinggi = 5;
// Bagian atas
for ($i = 1; $i <= $tinggi; $i++) {
for ($j = $tinggi; $j > $i; $j--) {
echo "&nbsp;&nbsp;";
}
for ($k = 1; $k <= (2 * $i - 1); $k++) {
echo "⭐";
}
echo "<br>";
}
// Bagian bawah
for ($i = $tinggi - 1; $i >= 1; $i--) {
for ($j = $tinggi; $j > $i; $j--) {
echo "&nbsp;&nbsp;";
}
for ($k = 1; $k <= (2 * $i - 1); $k++) {
echo "⭐";
}
echo "<br>";
}
echo "</div>";
echo "</div>";
?>