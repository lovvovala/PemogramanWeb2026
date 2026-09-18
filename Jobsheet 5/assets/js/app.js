// ==========================================
// 1. INISIALISASI MODUL UTAMA
// ==========================================

// Hamburger Menu (Slide 10)
function initNavToggle() {
  const toggleBtn = document.getElementById("nav-toggle-btn");
  const nav = document.querySelector("header nav");
  if (!toggleBtn || !nav) return;

  toggleBtn.addEventListener("click", function () {
    nav.classList.toggle("nav-open");
  });
}

// Event Delegation untuk Tombol Hapus Dinamis (Slide 21)
function initHapusConfirm() {
  document.addEventListener("click", function (e) {
    const btn = e.target.closest(".btn-hapus");
    if (!btn) return;

    const row = btn.closest("tr");
    const nama = row ? row.querySelector("td")?.textContent : "data ini";
    const yakin = confirm(`Apakah Anda yakin ingin menghapus "${nama}"?`);
    if (yakin && row) {
      row.remove();
    }
  });
}

// Validasi Form + TUGAS MANDIRI 1 (Validasi ISBN) (Slide 13, 14, 23)
function initValidasiForm() {
  const form = document.getElementById("form-tambah");
  if (!form) return;

  form.addEventListener("submit", function (e) {
    let valid = true;

    // Hapus pesan error lama
    form.querySelectorAll(".error").forEach((el) => el.remove());

    const judul = form.querySelector("[name='judul'], [name='nama']");
    if (judul && judul.value.trim() === "") {
      tampilkanError(judul, "Field ini wajib diisi.");
      valid = false;
    }

    // Panggil Validasi ISBN jika input ISBN ada
    const isbn = form.querySelector("[name='isbn']");
    if (isbn && !validasiISBN(isbn)) {
      valid = false;
    }

    if (!valid) e.preventDefault();
  });
}

function tampilkanError(input, pesan) {
  const span = document.createElement("span");
  span.className = "error";
  span.textContent = pesan;
  input.insertAdjacentElement("afterend", span);
}


// ==========================================
// 2. TUGAS MANDIRI (1, 2, 3, 4, 5)
// ==========================================

// Tugas 1: Validasi Field ISBN (Hanya Angka & Tanda Hubung) (Slide 23)
function validasiISBN(input) {
  const isbnRegex = /^[0-9-]+$/;
  if (input && input.value.trim() !== "" && !isbnRegex.test(input.value)) {
    tampilkanError(input, "ISBN hanya boleh berisi angka dan tanda hubung (-).");
    return false;
  }
  return true;
}

// Tugas 4: Fungsi Generik Berparameter (Buku & Anggota) (Slide 18, 19, 23)
// Tugas 5: Parameter delay untuk simulasi loading (3000ms / 3 detik) (Slide 23)
async function muatDataTabel(urlJson, dataKey, tableId, counterId, delay = 3000) {
  const table = document.getElementById(tableId);
  if (!table) return;

  const tbody = table.querySelector("tbody");
  const loading = document.getElementById("loading-indicator");
  const counterEl = document.getElementById(counterId);

  try {
    // 1. Tampilkan loading & bersihkan tabel
    if (loading) loading.style.display = "block";
    tbody.innerHTML = "";

    // Simulasi delay jaringan (Tugas 5)
    await new Promise((resolve) => setTimeout(resolve, delay));

    // 2. Fetch Data (Slide 18)
    const res = await fetch(urlJson);
    if (!res.ok) throw new Error(`Gagal mengambil data (Status: ${res.status})`);

    const result = await res.json();
    const listData = result[dataKey] || [];

    // 3. Render Baris Tabel
    listData.forEach((item) => {
      const tr = document.createElement("tr");

      if (dataKey === "buku") {
        tr.innerHTML = `
          <td>${item.isbn || '-'}</td>
          <td class="col-judul">${item.judul || '-'}</td>
          <td>${item.pengarang || '-'}</td>
          <td>${item.tahun || '-'}</td>
          <td>${item.stok ?? '-'}</td>
          <td><button type="button" class="btn-hapus">Hapus</button></td>
        `;
      } else if (dataKey === "anggota") {
        tr.innerHTML = `
          <td>${item.no_anggota || '-'}</td>
          <td class="col-judul">${item.nama || '-'}</td>
          <td>${item.email || '-'}</td>
          <td>${item.status || '-'}</td>
          <td><button type="button" class="btn-hapus">Hapus</button></td>
        `;
      }
      tbody.appendChild(tr);
    });

    // Tugas 3: Tampilkan penghitung "Menampilkan X dari Y" (Slide 23)
    if (counterEl) {
      counterEl.textContent = `Menampilkan ${listData.length} dari ${listData.length} ${dataKey}`;
    }

    // Tugas 2: Pasang Filter Pencarian Khusus Kolom Judul/Nama (Slide 23)
    initFilterJudulKhusus(tableId, counterEl, dataKey);
  } catch (err) {
    // Penanganan error dan pencatatan di console untuk debugging (Slide 19)
    console.error("Fetch Error:", err);
    tbody.innerHTML = `<tr><td colspan="6" style="color:red; text-align:center;">Gagal memuat data: ${err.message}. Pastikan server lokal (php -S / Live Server) aktif.</td></tr>`;
  } finally {
    // Sembunyikan indikator loading di blok finally (Slide 19, 20)
    if (loading) loading.style.display = "none";
  }
}

// Tugas 2: Filter Pencarian Khusus Kolom Judul/Nama (.col-judul) (Slide 23)
function initFilterJudulKhusus(tableId, counterEl, labelData) {
  const input = document.getElementById("search-input");
  const table = document.getElementById(tableId);
  if (!input || !table) return;

  input.onkeyup = function () {
    const keyword = input.value.toLowerCase();
    const rows = table.querySelectorAll("tbody tr");
    let visibleCount = 0;

    rows.forEach((row) => {
      const judulCell = row.querySelector(".col-judul")?.textContent.toLowerCase() || "";
      if (judulCell.includes(keyword)) {
        row.style.display = "";
        visibleCount++;
      } else {
        row.style.display = "none";
      }
    });

    // Tugas 3: Update counter secara dinamis (Slide 23)
    if (counterEl) {
      counterEl.textContent = `Menampilkan ${visibleCount} dari ${rows.length} ${labelData}`;
    }
  };
}


// ==========================================
// 3. JALANKAN SAAT DOM READY (OTOMATIS AJAIB)
// ==========================================
document.addEventListener("DOMContentLoaded", function () {
  initNavToggle();
  initHapusConfirm();
  initValidasiForm();

  // 1. Kait untuk tombol hamburger
    const btnHamburger = document.getElementById('nav-toggle-btn');
    const navMenu = document.getElementById('nav-menu');

    // Jika tombol diklik, tambah/hapus class 'menu-aktif' pada <nav>
    if (btnHamburger && navMenu) {
        btnHamburger.addEventListener('click', () => {
            navMenu.classList.toggle('menu-aktif');
        });
    }
  // Deteksi otomatis apakah file HTML ada di dalam subfolder (misal /buku/ atau /anggota/)
  const isSubfolder = window.location.pathname.includes("/buku/") || window.location.pathname.includes("/anggota/");
  const jsonPath = isSubfolder ? "../data/buku.json" : "data/buku.json";

  // Panggil fungsi generik untuk Tabel Buku
  if (document.getElementById("tabel-buku")) {
    muatDataTabel(jsonPath, "buku", "tabel-buku", "counter-buku", 3000);
  }

  // Panggil fungsi generik untuk Tabel Anggota
  if (document.getElementById("tabel-anggota")) {
    muatDataTabel(jsonPath, "anggota", "tabel-anggota", "counter-anggota", 3000);
  }
});