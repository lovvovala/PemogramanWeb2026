<?php
$page_title = "Daftar Anggota";
require __DIR__ . '/../includes/koneksi.php';
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

// ---> JAWABAN LATIHAN 3 
// 1. Tangkap kata kunci pencarian dari URL (GET)
$keyword = trim($_GET['keyword'] ?? '');

if ($keyword !== '') {
    // Jika ada pencarian, jalankan query ILIKE
    $stmt = $pdo->prepare("SELECT * FROM anggota WHERE nama ILIKE :keyword ORDER BY id DESC");
    $stmt->execute(['keyword' => '%' . $keyword . '%']);
    $daftarAnggota = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Jika tidak ada pencarian, tampilkan semua data normal
    $stmt = $pdo->query("SELECT * FROM anggota ORDER BY id DESC");
    $daftarAnggota = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<section>
    <h2>Daftar Anggota</h2>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
    <?php endif; ?>

    <div class="search-box" style="margin-bottom: 15px;">
        <!-- 2. Tambahkan tag form dengan method GET agar data terkirim ke server -->
        <form method="GET" action="list.php">
            <label for="search-input">Cari Nama Anggota</label><br>
            <input type="text" id="search-input" name="keyword" 
                   value="<?php echo htmlspecialchars($keyword); ?>" 
                   placeholder="Ketik nama anggota..." 
                   style="padding: 8px; width: 100%; max-width: 300px; border: 1px solid #ccc; border-radius: 4px;">
            <button type="submit" style="padding: 8px 12px; margin-left: 5px;">Cari</button>
        </form>
    </div>

    <p style="font-weight: bold; margin-bottom: 10px;">
        Menampilkan <?php echo count($daftarAnggota); ?> anggota
    </p>

    <div class="table-responsive">
        <table id="tabel-anggota">
            <thead>
                <tr>
                    <th>No Anggota</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($daftarAnggota)): ?>
                    <tr>
                        <td colspan="6">
                            <?php echo ($keyword !== '') ? 'Data anggota tidak ditemukan.' : 'Belum ada data anggota di database. Silakan tambah lewat menu "Tambah Anggota".'; ?>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($daftarAnggota as $anggota): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($anggota['no_anggota'] ?? '-'); ?></td>
                            <td class="col-judul"><?php echo htmlspecialchars($anggota['nama'] ?? '-'); ?></td>
                            <td><?php echo htmlspecialchars($anggota['email'] ?? '-'); ?></td>
                            <td><?php echo htmlspecialchars($anggota['alamat'] ?? '-'); ?></td>
                            <td><?php echo htmlspecialchars($anggota['no_hp'] ?? '-'); ?></td>
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