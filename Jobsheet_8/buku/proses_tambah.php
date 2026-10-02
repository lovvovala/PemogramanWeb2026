<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';

// Mengambil data dari form dan menghapus spasi berlebih
$isbn = trim($_POST['isbn'] ?? '');
$judul = trim($_POST['judul'] ?? '');
$pengarang = trim($_POST['pengarang'] ?? '');
$tahun = $_POST['tahun'] ?? '';
$stok = $_POST['stok'] ?? '';
$kategori = trim($_POST['kategori'] ?? '');

$errors = [];

// Validasi Server-Side
if ($judul === '') {
    $errors[] = "Judul wajib diisi.";
}
if ($pengarang === '') {
    $errors[] = "Pengarang wajib diisi.";
}
// Validasi ISBN: Jika diisi, pastikan hanya mengandung angka dan tanda hubung
if ($isbn !== '' && !preg_match('/^[0-9-]+$/', $isbn)) {
    $errors[] = "ISBN hanya boleh berisi angka dan tanda hubung (-).";
}
if (!is_numeric($tahun) || $tahun < 1900 || $tahun > 2026) {
    $errors[] = "Tahun harus angka di antara 1900-2026.";
}
if (!is_numeric($stok) || $stok < 0) {
    $errors[] = "Stok harus angka dan tidak boleh negatif.";
}

// Jika ada error, kembalikan ke form tambah beserta pesan flash
if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => implode(' ', $errors)];
    header('Location: tambah.php');
    exit;
}

// Menyiapkan dan mengeksekusi query database dengan Prepared Statement
try {
    $stmt = $pdo->prepare(
        "INSERT INTO buku (judul, pengarang, tahun, isbn, stok, kategori) 
         VALUES (:judul, :pengarang, :tahun, :isbn, :stok, :kategori) 
         RETURNING id"
    );

    $stmt->execute([
        'judul' => $judul,
        'pengarang' => $pengarang,
        'tahun' => (int) $tahun,
        'isbn' => $isbn,
        'stok' => (int) $stok,
        'kategori' => $kategori,
    ]);

    // Beri notifikasi sukses dan arahkan ke daftar buku
    $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Buku berhasil ditambahkan ke database.'];
    header('Location: list.php');
    exit;

} catch (PDOException $e) {
    // Tangkap error jika terjadi kegagalan sistem database
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Gagal menyimpan data: ' . $e->getMessage()];
    header('Location: tambah.php');
    exit;
}