6.	Penjelasan anggota/tambah.html (Form Tambah Anggota)
    6.5	Latihan Reflektif 
    Sebagai latihan mandiri, coba bandingkan sendiri form ini dengan form buku dan jawab pertanyaan berikut untuk menguji pemahaman: 
        1.	Kenapa field "Alamat" dan "No. HP" tidak diberi required, sedangkan "Nama" dan "No. Anggota" diberi? 
        Jawab :
        Field "Nama" dan "No. Anggota" diberi atribut required karena keduanya merupakan data pokok yang mutlak diperlukan sistem untuk mengidentifikasi seorang anggota perpustakaan. Sebaliknya, field "Alamat" dan "No. HP" tidak diberi required karena dianggap sebagai data opsional; pendaftaran anggota tetap dapat diproses meskipun informasi sekunder tersebut belum tersedia saat itu.
        2.	Apa yang akan terjadi (di browser) kalau kamu klik tombol "Simpan" tanpa mengisi field "Nama"? Coba buka filenya di browser dan praktikkan. 
        Jawab :
        Browser akan membatalkan proses pengiriman (submit) form dan menampilkan pesan peringatan validasi otomatis bawaan HTML5. Sebuah pop-up kecil dengan teks seperti "Please fill out this field." atau "Isi bidang ini." akan muncul tepat di atas kotak isian "Nama" untuk memberi tahu pengguna bahwa bagian tersebut wajib diisi. 

        3.	Form ini juga belum punya action pada tag <form>-nya — apa dampaknya saat tombol "Simpan" ditekan? 
        Jawab :
        Tanpa adanya atribut action pada tag <form>, aplikasi belum terhubung ke server atau skrip pemrosesan data. Dampaknya, saat tombol "Simpan" ditekan, browser hanya akan memuat ulang (reload) halaman yang sama dan data tidak akan benar-benar tersimpan
 


7.	Rangkuman & Latihan Lanjutan
    7.4	Latihan
        1.	Lengkapi konsistensi menu — tambahkan tautan "Daftar Anggota" dan "Tambah Anggota" ke menu <nav> di index.html, buku/list.html, dan buku/tambah.html (lihat catatan di dokumentasi anggota/list.html §5.4).
        Jawab :
        Pada poin 5.4 dijelaskan mengenai permasalahan menu navigasi yang belum konsisten. berdasarkan permasalahan tersebut, pada latihan nomor 1 saya melakukan perbaikan pada kode <nav> agar menu navigasi menjadi lebih konsisten dan sesuai dengan tampilan yang diharapkan. dengan demikian, hasil perbaikan kode navigasi pada latihan nomor 1 merupakan penyelesaian dari permasalahan yang dibahas pada poin 5.4. Guna memastikan konsistensi dan keberhasilan navigasi dari halaman beranda ke halaman lainnya, penentuan rute tautan divalidasi dengan mengambil rute pasti menggunakan fitur Copy Path. Berikut adalah struktur kode menu navigasi yang telah diperbaiki:
        <nav>
        <ul>
        <li><a href="C:\Users\ThinkPad T14s Gen 2\OneDrive\Dokumen\Semester 3\PemograWeb\PemogramanWebMandiri\Jobsheet 1\index.html">Beranda</a></li>
        <li><a href="C:\Users\ThinkPad T14s Gen 2\OneDrive\Dokumen\Semester 3\PemograWeb\PemogramanWebMandiri\Jobsheet 1\buku\list.html">Daftar Buku</a></li>
        <li><a href="C:\Users\ThinkPad T14s Gen 2\OneDrive\Dokumen\Semester 3\PemograWeb\PemogramanWebMandiri\Jobsheet 1\buku\tambah.html">Tambah Buku</a></li>
        <li><a href="C:\Users\ThinkPad T14s Gen 2\OneDrive\Dokumen\Semester 3\PemograWeb\PemogramanWebMandiri\Jobsheet 1\anggota\list.html">Daftar Anggota</a></li>
        <li><a href="C:\Users\ThinkPad T14s Gen 2\OneDrive\Dokumen\Semester 3\PemograWeb\PemogramanWebMandiri\Jobsheet 1\anggota\tambah.html">Tambah Anggota</a></li>
        </ul>
        </nav>

        2.	Tambah 3 baris data buku baru di buku/list.html dengan meng-copy satu blok <tr>...</tr> lalu mengganti isinya.
        Jawab :
        Untuk menambahkan data buku baru pada halaman Daftar Buku, modifikasi dilakukan pada file buku/list.html. Penambahan data ini dilakukan secara statis dengan menduplikasi elemen baris tabel (<tr>) beserta sel datanya (<td>) yang berada di dalam tag <tbody>, kemudian memperbarui isi data teksnya. Tombol aksi (Edit dan Hapus) tetap dipertahankan pada setiap baris baru agar struktur tabel tetap konsisten.
         <!-- Data Tambahan 2 -->
                    <tr>
                        <td>Time Raiders</td>
                        <td>Xu Lei</td>
                        <td>2006</td>
                        <td>3</td>
                        <td>
                            <button type="button">Edit</button>
                            <button type="button">Hapus</button>
                        </td>
                    </tr>

                    <!-- Data Tambahan 3 -->
                    <tr>
                        <td> Sahabat</td>
                        <td>Agam Wispi</td>
                        <td>1959</td>
                        <td>1</td>
                        <td>
                            <button type="button">Edit</button>
                            <button type="button">Hapus</button>
                        </td>
                    </tr>
        
        3.	Tambah kolom baru di tabel anggota, misalnya "Jenis Kelamin", lengkap dengan <th> dan <td>nya di setiap baris.
        Jawab :
        Penambahan kolom "Jenis Kelamin" pada file anggota/list.html dilakukan dengan memodifikasi struktur tabel HTML. Pertama, tag <th>Jenis Kelamin</th> ditambahkan pada baris header di dalam tag <thead> untuk membuat judul kolom. Selanjutnya, agar struktur sel data sejajar dengan kolom tabel yang baru, tag <td> yang berisi keterangan jenis kelamin ditambahkan secara konsisten pada setiap elemen baris <tr> di dalam tag <tbody>. Posisi kolom baru diletakkan sebelum kolom "Aksi".
         <tbody>
                <tr>
                    <td>A001</td>
                    <td>Siti Aminah</td>
                    <td>Malang</td>
                    <td>0812xxxx</td>
                    <td>Perempuan</td> <!-- Penambahan Data Baris 1 -->
                    <td>siti.aminah@email.com</td>
                    <td>
                        <button type="button">Edit</button>
                        <button type="button">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>A002</td>
                    <td>Budi Santoso</td>
                    <td>Batu</td>
                    <td>0813xxxx</td>
                    <td>Laki-laki</td> <!-- Penambahan Data Baris 2 -->
                    <td>budi.santoso@email.com</td>
                    <td>
                        <button type="button">Edit</button>
                        <button type="button">Hapus</button>
                    </td>
                </tr>
        </tbody>

        4.	Tambah field baru di form tambah anggota, misalnya "Email" memakai <input type="email"> (type="email" otomatis memvalidasi format alamat email tanpa perlu JavaScript tambahan).
        Jawab :
        Penambahan kolom input untuk Email dilakukan pada file anggota/tambah.html. Field baru ini ditambahkan dengan membuat tag paragraf <p> baru yang membungkus elemen <label> dan <input>. Penggunaan atribut type="email" pada tag <input> dimanfaatkan agar browser dapat melakukan validasi format email secara otomatis (HTML5 validation) sebelum form dikirimkan, sehingga meminimalisir kesalahan input data tanpa memerlukan tambahan script validasi di sisi client.
         <!-- Penambahan Field Email -->
            <p>
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" required>
        </p>

        LINK GITHUB : 



