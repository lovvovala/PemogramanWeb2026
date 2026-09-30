// Validasi ISBN: Jika diisi, pastikan hanya mengandung angka dan tanda hubung
    if ($isbn !== '' && !preg_match('/^[0-9-]+$/', $isbn)) {
        $errors[] = "ISBN hanya boleh berisi angka dan tanda hubung (-).";
    }


### C. Validasi Tambahan Form Anggota (`anggota/proses_tambah.php`)
Melengkapi validasi pada entitas anggota untuk memastikan integritas data email, nomor telepon, dan pilihan jenis kelamin[cite: 1].

**Implementasi Kode Latihan 2:**
```php
// Validasi format email yang benar
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Format email tidak valid.";
}

// Validasi nomor HP (hanya angka)
if ($no_hp !== '' && !preg_match('/^[0-9]+$/', $no_hp)) {
    $errors[] = "Nomor HP hanya boleh berisi angka.";
}

// Validasi ketat pilihan jenis kelamin
if ($jenis_kelamin !== 'laki-laki' && $jenis_kelamin !== 'perempuan') {
    $errors[] = "Pilihan jenis kelamin tidak valid.";
}


---

## 3. Hasil Uji Coba dan Bukti *Screenshot*

Berikut adalah dokumentasi tangkapan layar (*screenshot*) dari hasil pengujian program yang telah dilakukan:

### A. Uji Coba Validasi ISBN (Error Merah)
* **Keterangan:** Pengujian dilakukan dengan memasukkan karakter huruf (`123-456-ABC`) pada kolom ISBN. Sistem *server-side* menolak inputan tersebut dan memunculkan pesan peringatan berwarna merah.
* **Letak Screenshot di Laporan:**
  > *[ Sisipkan gambar screenshot pesan error merah validasi ISBN di sini ]*
  > *Gambar 7.1: Validasi gagal saat ISBN mengandung huruf.*

### B. Uji Coba Validasi Form Anggota (Error Merah)
* **Keterangan:** Pengujian dilakukan dengan mengisi format email atau nomor HP yang tidak valid. Sistem berhasil mencegat dan menampilkan pesan *flash error*.
* **Letak Screenshot di Laporan:**
  > *[ Sisipkan gambar screenshot pesan error merah validasi anggota di sini ]*
  > *Gambar 7.2: Validasi sisi server pada form tambah anggota.*

### C. Uji Coba Penyimpanan Data Sukses (Flash Message Hijau)
* **Keterangan:** Ketika seluruh data formulir diisi dengan benar dan valid, server memproses data ke dalam `$_SESSION`, mengalihkan halaman ke tabel, serta merender notifikasi hijau "Buku berhasil ditambahkan."
* **Letak Screenshot di Laporan:**
  > *[ Sisipkan gambar screenshot tabel dengan flash message hijau di sini ]*
  > *Gambar 7.3: Data berhasil tersimpan dan dirender oleh PHP ke dalam tabel.*

### D. Uji Coba Sifat Sementara Data Session
* **Keterangan:** Membuktikan bahwa data yang disimpan di dalam `$_SESSION` bersifat sementara. Ketika *browser* ditutup sepenuhnya dan dibuka kembali, tabel data otomatis kosong kembali.
* **Letak Screenshot di Laporan:**
  > *[ Sisipkan gambar screenshot tabel kosong setelah browser ditutup ulang di sini ]*
  > *Gambar 7.4: Tabel kembali kosong setelah sesi peramban berakhir.*

---

## 4. Kesimpulan
Pada Jobsheet 7 ini, aplikasi SIMPUS-Mini berhasil ditransisi dari sistem berbasis statis (*client-side*) menuju arsitektur *server-side* menggunakan PHP. Penggunaan `include` mempermudah pemeliharaan tata letak, sementara validasi *server-side* dipadukan dengan `$_SESSION` dan *flash message* membuat alur tambah data menjadi lebih aman serta interaktif.