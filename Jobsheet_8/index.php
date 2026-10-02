<?php
$page_title = "Beranda";
require __DIR__ . '/includes/koneksi.php';
include __DIR__ . '/includes/header.php';

// Menghitung total data langsung dari database secara efisien
$totalBuku = $pdo->query("SELECT COUNT(*) FROM buku")->fetchColumn();
$totalAnggota = $pdo->query("SELECT COUNT(*) FROM anggota")->fetchColumn();
?>

<section>
    <h2>Selamat Datang di SIMPUS-Mini</h2>
    <p>Sistem Informasi Perpustakaan Mini berbasis PHP dan PostgreSQL.</p>

    <div class="stats-container" style="display: flex; gap: 20px; margin-top: 20px;">
        <div class="card" style="border: 1px solid #ccc; padding: 20px; border-radius: 8px; flex: 1;">
            <h3>Total Buku</h3>
            <p style="font-size: 24px; font-weight: bold;"><?php echo $totalBuku; ?></p>
        </div>
        <div class="card" style="border: 1px solid #ccc; padding: 20px; border-radius: 8px; flex: 1;">
            <h3>Total Anggota</h3>
            <p style="font-size: 24px; font-weight: bold;"><?php echo $totalAnggota; ?></p>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

