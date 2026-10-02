<?php
require __DIR__ . '/includes/koneksi.php';

$jsonFile = __DIR__ . '/data/buku.json';

if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);
    $data = json_decode($jsonData, true);
    
    // Ambil array buku dari dalam key "buku"
    $bukuLama = $data['buku'] ?? [];

    if (!empty($bukuLaman)) { // atau !empty($bukuLama)
    }

    if (!empty($bukuLama)) {
        $stmt = $pdo->prepare(
            "INSERT INTO buku (judul, pengarang, tahun, isbn, stok, kategori) 
             VALUES (:judul, :pengarang, :tahun, :isbn, :stok, :kategori)"
        );

        foreach ($bukuLama as $buku) {
            $stmt->execute([
                'judul' => $buku['judul'] ?? '',
                'pengarang' => $buku['pengarang'] ?? '',
                'tahun' => (int) ($buku['tahun'] ?? 2026),
                'isbn' => $buku['isbn'] ?? '',
                'stok' => (int) ($buku['stok'] ?? 0),
                'kategori' => $buku['kategori'] ?? '',
            ]);
        }
        echo "Migrasi data buku berhasil dilakukan!";
    } else {
        echo "File JSON kosong atau format data tidak ditemukan.";
    }
} else {
    echo "File data/buku.json tidak ditemukan.";
}