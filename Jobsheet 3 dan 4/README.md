Tugas mandiri (Materi 3)
1. Ubah breakpoint tablet 768px jadi 900px.
    Jawab :
    Perubahan dilakukan pada file style.css dengan memodifikasi parameter kondisi dari @media (max-width: 768px) menjadi @media (max-width: 900px). 
    Hasil Pengamatan: Saat ukuran jendela browser diperkecil secara bertahap menggunakan DevTools, perubahan tata letak (seperti grid kartu statistik yang berubah dari 3 kolom menjadi 2 kolom) kini terjadi lebih awal, tepat ketika lebar layar menyentuh angka 900px.  
    Kesimpulan: Eksperimen ini membuktikan bahwa nilai breakpoint pada Responsive Web Design tidak terikat secara kaku pada ukuran perangkat tertentu (seperti 768px untuk tablet umum), melainkan dapat disesuaikan secara bebas kapan pun antarmuka membutuhkan penyesuaian tata letak.

2. Pindahkan .nav
-toggle
-label ke setelah <nav>,
    Jawab :
    Ketika elemen <label class="nav-toggle-label"> dipindahkan posisinya di dalam HTML menjadi tepat setelah tag penutup </nav>, menu hamburger tetap berfungsi normal saat diklik.
    Hal ini membuktikan bahwa atribut for="nav-toggle" pada <label> memiliki keterikatan mutlak dengan atribut id="nav-toggle" pada <input type="checkbox"> tanpa memedulikan urutan atau letak elemen <label> tersebut di dalam kerangka HTML.

    Namun, dari segi tata letak visual (layout), memindahkan label ke bawah <nav> dapat memengaruhi posisinya di dalam layar karena elemen-elemen di dalam <header> diatur menggunakan CSS Flexbox.

3. Gambar wireframe ASCII halaman "Registrasi
Anggota Baru".
    Jawab :
    Berdasarkan prinsip perancangan UI sebelum melakukan tahap coding, berikut adalah wireframe sketsa kasar dalam format ASCII untuk halaman "Registrasi Anggota Baru":
    +-------------------------------------------------+
    | SIMPUS-Mini                 [ Beranda ] [ Login]|
    +-------------------------------------------------+
    |                                                 |
    |  [ Registrasi Anggota Baru ]                    |
    |                                                 |
    |  No. Anggota   : [_________________________]    |
    |  Nama Lengkap  : [_________________________]    |
    |  Alamat        : [_________________________]    |
    |  No. HP        : [_________________________]    |
    |  Email         : [_________________________]    |
    |                                                 |
    |                 [ Simpan Data ]                 |
    |                                                 |
    +-------------------------------------------------+

4. Buat user flow: mencari anggota yang lewat
jatuh tempo.
    Jawab :
    User flow atau alur pengguna merupakan urutan langkah logis yang harus dilalui pengguna untuk menyelesaikan sebuah tugas. Berikut adalah rancangan user flow untuk Petugas saat mencari anggota yang terlambat mengembalikan buku:  
     1. Petugas melakukan Login ke dalam sistem.
     2. Petugas masuk ke halaman Dashboard Petugas.  
     3. Petugas mengklik menu "Peminjaman" atau "Data Transaksi".  
     4.Petugas menggunakan fitur filter/pencarian dan memilih status "Lewat Jatuh Tempo" (atau mencari tanggal yang melewati hari ini).
     5. Sistem menampilkan tabel daftar anggota dan buku yang berstatus terlambat.
     6. Petugas mengeklik tombol "Detail" pada baris data anggota terkait untuk mendapatkan nomor HP/kontak yang bisa dihubungi.

