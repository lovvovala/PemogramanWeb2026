<?php
require __DIR__ . '/includes/koneksi.php';

$jsonFile = __DIR__ . '/data/anggota.json'; // Pastikan file json-nya ada di folder data/

if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);
    $data = json_decode($jsonData, true);
    
    // Ambil array anggota dari dalam key "anggota"
    $anggotaLama = $data['anggota'] ?? [];

    if (!empty($anggotaLama)) {
        $stmt = $pdo->prepare(
            "INSERT INTO anggota (no_anggota, nama, email, alamat, no_hp, jenis_kelamin) 
             VALUES (:no_anggota, :nama, :email, :alamat, :no_hp, :jenis_kelamin)"
        );

        foreach ($anggotaLama as $anggota) {
            $stmt->execute([
                'no_anggota' => $anggota['no_anggota'] ?? '',
                'nama'       => $anggota['nama'] ?? '',
                'email'      => $anggota['email'] ?? '',
                'alamat'     => '-', // Nilai default karena di JSON tidak ada
                'no_hp'      => '-', // Nilai default karena di JSON tidak ada
                'jenis_kelamin' => 'laki-laki', // Nilai default
            ]);
        }
        echo "Migrasi data anggota berhasil dilakukan!";
    } else {
        echo "File JSON kosong atau format data anggota tidak ditemukan.";
    }
} else {
    echo "File data/anggota.json tidak ditemukan.";
}