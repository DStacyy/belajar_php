<?php
// Data buku di perpustakaan
$inventory_buku = [
    "T001" => [
        "judul" => "Pemrograman PHP untuk Pemula",
        "pengarang" => "Budi Santoso",
        "kategori" => "Teknologi",
        "tahun" => 2023,
        "stok" => 5,
        "dipinjam" => 2
    ],
    "T002" => [
        "judul" => "Database MySQL Mastery",
        "pengarang" => "Ani Wijaya",
        "kategori" => "Teknologi",
        "tahun" => 2022,
        "stok" => 3,
        "dipinjam" => 1
    ],
    "S001" => [
        "judul" => "Sejarah Indonesia Modern",
        "pengarang" => "Cici Amelia",
        "kategori" => "Sejarah",
        "tahun" => 2021,
        "stok" => 7,
        "dipinjam" => 0
    ],
    "S002" => [
        "judul" => "Revolusi Industri 4.0",
        "pengarang" => "David Pratama",
        "kategori" => "Sejarah",
        "tahun" => 2023,
        "stok" => 4,
        "dipinjam" => 3
    ],
    "M001" => [
        "judul" => "Matematika Diskrit",
        "pengarang" => "Eva Nurhaliza",
        "kategori" => "Matematika",
        "tahun" => 2020,
        "stok" => 2,
        "dipinjam" => 1
    ]
];

// Fungsi helper
function get_status_stok($stok, $dipinjam)
{
    $tersedia = $stok - $dipinjam;

    if ($tersedia <= 0) return ["❌ Habis", "#e74c3c"];       // Kondisi habis
    if ($tersedia <= 2) return ["⚠️ Sedikit", "#f39c12"];     // Kondisi hampir habis
    return ["✅ Tersedia", "#27ae60"];                         // Kondisi aman
}

// Kelompokkan buku berdasarkan kategori
$buku_per_kategori = [];
foreach ($inventory_buku as $kode => $buku) {
    $kategori = $buku['kategori'];
    if (!isset($buku_per_kategori[$kategori])) {
        $buku_per_kategori[$kategori] = [];
    }
    $buku_per_kategori[$kategori][$kode] = $buku;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>📚 Sistem Inventory Perpustakaan</title>
    <style>
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }
        .category-section {
            margin: 30px 0;
        }
        .book-card {
            border: 1px solid #ddd;
            margin: 10px;
            padding: 15px;
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .book-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .stock-info {
            padding: 5px 10px;
            border-radius: 15px;
            font-weight: bold;
        }
        .nav-tabs {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 2px solid #3498db;
        }
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            background-color: #ecf0f1;
            margin-right: 5px;
            border-radius: 5px 5px 0 0;
        }
        .tab.active {
            background-color: #3498db;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>📚 Inventory Perpustakaan Sekolah</h1>

    <!-- Navigation Tabs -->
    <div class="nav-tabs" id="categoryTabs">
        <div class="tab active" onclick="showCategory('all')">📖 Semua Buku</div>
        <?php foreach ($buku_per_kategori as $kategori => $buku): ?>
            <div class="tab" onclick="showCategory('<?php echo $kategori; ?>')">
                <?php
                $icons = [
                    "Teknologi" => "💻",
                    "Sejarah" => "📜",
                    "Matematika" => "🧮"
                ];
                echo ($icons[$kategori] ?? "📚") . " " . $kategori;
                ?>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Semua Buku -->
    <div id="all" class="category-section">
        <h2>📚 Semua Koleksi Buku (<?php echo count($inventory_buku); ?> buku)</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 15px;">
            <?php foreach ($inventory_buku as $kode => $buku): ?>
                <?php
                list($status_stok, $warna_stok) = get_status_stok($buku['stok'], $buku['dipinjam']);
                $tersedia = $buku['stok'] - $buku['dipinjam'];
                ?>
                <div class="book-card">
                    <div class="book-header">
                        <h3 style="margin: 0;"><?php echo $buku['judul']; ?></h3>
                        <span class="stock-info" style="background-color: <?php echo $warna_stok; ?>; color: white;">
                            <?php echo $status_stok; ?>
                        </span>
                    </div>
                    <p><strong>Kode:</strong> <?php echo $kode; ?></p>
                    <p><strong>✍️ Pengarang:</strong> <?php echo $buku['pengarang']; ?></p>
                    <p><strong>📂 Kategori:</strong> <?php echo $buku['kategori']; ?></p>
                    <p><strong>📅 Tahun:</strong> <?php echo $buku['tahun']; ?></p>
                    <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                        <span>📦 Stok: <?php echo $buku['stok']; ?></span>
                        <span>📥 Dipinjam: <?php echo $buku['dipinjam']; ?></span>
                        <span><strong>✅ Tersedia: <?php echo $tersedia; ?></strong></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Per Kategori -->
    <?php foreach ($buku_per_kategori as $kategori => $buku_kategori): ?>
        <div id="<?php echo $kategori; ?>" class="category-section" style="display: none;">
            <h2>
                <?php
                $icons = [
                    "Teknologi" => "💻",
                    "Sejarah" => "📜",
                    "Matematika" => "🧮"
                ];
                echo ($icons[$kategori] ?? "📚") . " Kategori $kategori (" . count($buku_kategori) . " buku)";
                ?>
            </h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 15px;">
                <?php foreach ($buku_kategori as $kode => $buku): ?>
                    <?php
                    list($status_stok, $warna_stok) = get_status_stok($buku['stok'], $buku['dipinjam']);
                    $tersedia = $buku['stok'] - $buku['dipinjam'];
                    ?>
                    <div class="book-card">
                        <div class="book-header">
                            <h3 style="margin: 0;"><?php echo $buku['judul']; ?></h3>
                            <span class="stock-info" style="background-color: <?php echo $warna_stok; ?>; color: white;">
                                <?php echo $status_stok; ?>
                            </span>
                        </div>
                        <p><strong>Kode:</strong> <?php echo $kode; ?></p>
                        <p><strong>✍️ Pengarang:</strong> <?php echo $buku['pengarang']; ?></p>
                        <p><strong>📅 Tahun:</strong> <?php echo $buku['tahun']; ?></p>
                        <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                            <span>📦 Stok: <?php echo $buku['stok']; ?></span>
                            <span>📥 Dipinjam: <?php echo $buku['dipinjam']; ?></span>
                            <span><strong>✅ Tersedia: <?php echo $tersedia; ?></strong></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Statistik -->
    <div style="border: 2px solid #2ecc71; padding: 20px; border-radius: 10px; margin-top: 30px;">
        <h2>📊 Statistik Perpustakaan</h2>
        <?php
        $total_buku = count($inventory_buku);
        $total_stok = 0;
        $total_dipinjam = 0;
        $kategori_count = [];

        foreach ($inventory_buku as $buku) {
            $total_stok += $buku['stok'];
            $total_dipinjam += $buku['dipinjam'];
            $kategori = $buku['kategori'];

            if (!isset($kategori_count[$kategori])) {
                $kategori_count[$kategori] = 0;
            }
            $kategori_count[$kategori]++;
        }

        $total_tersedia = $total_stok - $total_dipinjam;
        ?>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
            <div style="text-align: center; padding: 15px; background-color: #3498db; color: white; border-radius: 8px;">
                <h3>📚</h3>
                <p>Total Judul Buku</p>
                <h2><?php echo $total_buku; ?></h2>
            </div>
            <div style="text-align: center; padding: 15px; background-color: #2ecc71; color: white; border-radius: 8px;">
                <h3>📦</h3>
                <p>Total Stok Buku</p>
                <h2><?php echo $total_stok; ?></h2>
            </div>
            <div style="text-align: center; padding: 15px; background-color: #e74c3c; color: white; border-radius: 8px;">
                <h3>📥</h3>
                <p>Sedang Dipinjam</p>
                <h2><?php echo $total_dipinjam; ?></h2>
            </div>
            <div style="text-align: center; padding: 15px; background-color: #f39c12; color: white; border-radius: 8px;">
                <h3>✅</h3>
                <p>Tersedia</p>
                <h2><?php echo $total_tersedia; ?></h2>
            </div>
        </div>

        <h3 style="margin-top: 20px;">📈 Distribusi Kategori:</h3>
        <?php foreach ($kategori_count as $kategori => $jumlah): ?>
            <p><?php echo $kategori; ?>: <?php echo $jumlah; ?> buku (<?php echo round(($jumlah / $total_buku) * 100, 1); ?>%)</p>
        <?php endforeach; ?>
    </div>
</div>

<script>
function showCategory(category) {
    // Sembunyikan semua section
    document.querySelectorAll('.category-section').forEach(section => {
        section.style.display = 'none';
    });

    // Tampilkan section yang dipilih
    document.getElementById(category).style.display = 'block';

    // Update tab aktif
    document.querySelectorAll('.tab').forEach(tab => {
        tab.classList.remove('active');
    });

    event.target.classList.add('active');
}
</script>
</body>
</html>
