<?php
$page_title = "Daftar Buku";
require __DIR__ . '/../includes/koneksi.php';
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
// Latihan 3
// 1. Tangkap kata kunci pencarian dari URL (GET)
$keyword = trim($_GET['keyword'] ?? '');

// 2. Query dengan ILIKE untuk pencarian judul buku di sisi server
if ($keyword !== '') {
    $stmt = $pdo->prepare("SELECT * FROM buku WHERE judul ILIKE :keyword ORDER BY id DESC");
    $stmt->execute(['keyword' => '%' . $keyword . '%']);
    $daftarBuku = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $stmt = $pdo->query("SELECT * FROM buku ORDER BY id DESC");
    $daftarBuku = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<section>
    <h2>Daftar Buku</h2>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
    <?php endif; ?>

    <div class="search-box" style="margin-bottom: 15px;">
        <!-- Form GET untuk mengirim keyword pencarian ke server -->
        <form method="GET" action="list.php">
            <label for="search-input">Cari Judul Buku</label><br>
            <input type="text" id="search-input" name="keyword" 
                   value="<?php echo htmlspecialchars($keyword); ?>" 
                   placeholder="Ketik judul buku..." 
                   style="padding: 8px; width: 100%; max-width: 300px; border: 1px solid #ccc; border-radius: 4px;">
            <button type="submit" style="padding: 8px 12px; margin-left: 5px;">Cari</button>
        </form>
    </div>

    <p style="font-weight: bold; margin-bottom: 10px;">
        Menampilkan <?php echo count($daftarBuku); ?> buku
    </p>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Tanggal Ditambahkan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($daftarBuku)): ?>
                    <tr>
                        <td colspan="8">
                            <?php echo ($keyword !== '') ? 'Data buku tidak ditemukan.' : 'Belum ada data buku di database. Silakan tambah lewat menu "Tambah Buku".'; ?>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($daftarBuku as $buku): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($buku['isbn'] ?? '-'); ?></td>
                            <td><?php echo htmlspecialchars($buku['judul']); ?></td>
                            <td><?php echo htmlspecialchars($buku['pengarang']); ?></td>
                            <td><?php echo $buku['tahun']; ?></td>
                            <td><?php echo htmlspecialchars($buku['kategori'] ?? '-'); ?></td>
                            <td><?php echo $buku['stok']; ?></td>
                            <td><?php echo htmlspecialchars($buku['tanggal_ditambahkan'] ?? '-'); ?></td>
                            <td>
                                <button type="button">Edit</button>
                                <button type="button" class="btn-hapus">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>