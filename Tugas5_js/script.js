// Data produk
const produk = [
  {
    nama: "Kopi Arabika",
    deskripsi: "Kopi pilihan dari dataran tinggi, aroma khas dan rasa lembut.",
    harga: 75000,
    gambar:
      "https://empocoffee.id/wp-content/uploads/2025/02/manfaat-kopi-arabika-600x600.jpg",
    kategori: "Minuman",
  },
  {
    nama: "Notebook Kulit",
    deskripsi: "Buku catatan elegan dengan sampul kulit asli.",
    harga: 120000,
    gambar:
      "https://down-id.img.susercontent.com/file/fad4718741ef868f64c8192105b4aa82",
    kategori: "Alat Tulis",
  },
  {
    nama: "Headphone Wireless",
    deskripsi: "Suara jernih tanpa kabel, nyaman digunakan lama.",
    harga: 450000,
    gambar:
      "https://down-id.img.susercontent.com/file/id-11134207-7rasl-m1f1pmj4q9g68f_tn.webp",
    kategori: "Elektronik",
  },
  {
    nama: "Pulpen Eksklusif",
    deskripsi: "Pulpen dengan tinta halus dan desain premium.",
    harga: 25000,
    gambar: "https://sc04.alicdn.com/kf/Hf0006a597af8435e851dc00cec740821y.jpg",
    kategori: "Alat Tulis",
  },
  {
    nama: "Tea Set",
    deskripsi: "Paket teh dan cangkir premium untuk momen spesial.",
    harga: 180000,
    gambar: "https://ae01.alicdn.com/kf/S26a011b2dd8d4a739fd15fefa04aa62fu.jpg",
    kategori: "Minuman",
  },
  {
    nama: "Powerbank 10000mAh",
    deskripsi: "Cadangan daya kecil tapi kuat untuk bepergian.",
    harga: 90000,
    gambar:
      "https://down-id.img.susercontent.com/file/id-11134207-7rasb-m35tfje64q6896",
    kategori: "Elektronik",
  },
  {
    nama: "Tas Kanvas",
    deskripsi: "Tas ramah lingkungan, tahan lama untuk aktivitas sehari-hari.",
    harga: 80000,
    gambar:
      "https://images.tokopedia.net/img/cache/500-square/VqbcmM/2022/8/8/e242a20d-6fe5-4990-a774-4a6062c77d28.jpg",
    kategori: "Aksesori",
  },
  {
    nama: "Kacamata Hitam",
    deskripsi: "Pelindung mata dari sinar UV dengan gaya modern.",
    harga: 150000,
    gambar:
      "https://down-id.img.susercontent.com/file/sg-11134201-7rbk0-lksc191x84zc75",
    kategori: "Aksesori",
  },
];

// Inisialisasi filter kategori
function isiFilterKategori() {
  const select = document.getElementById("filterKategori");
  const kategoriUnik = Array.from(
    new Set(produk.map((p) => p.kategori))
  ).sort();
  kategoriUnik.forEach((k) => {
    const opt = document.createElement("option");
    opt.value = k;
    opt.textContent = k;
    select.appendChild(opt);
  });
}

// Format harga ke rupiah
function formatRupiah(n) {
  return "Rp " + n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Render kartu produk sesuai filter / sort / search
function renderProduk() {
  const container = document.getElementById("gridProduk");
  const kategori = document.getElementById("filterKategori").value;
  const sort = document.getElementById("sortHarga").value;
  const keyword = document
    .getElementById("cariNama")
    .value.toLowerCase()
    .trim();

  let daftar = produk.slice(); // salinan

  // Filter kategori
  if (kategori !== "all") {
    daftar = daftar.filter((p) => p.kategori === kategori);
  }
  // Search nama
  if (keyword !== "") {
    daftar = daftar.filter((p) => p.nama.toLowerCase().includes(keyword));
  }
  // Sort harga
  if (sort === "asc") {
    daftar.sort((a, b) => a.harga - b.harga);
  } else if (sort === "desc") {
    daftar.sort((a, b) => b.harga - a.harga);
  }

  // Kosongkan
  container.innerHTML = "";

  if (daftar.length === 0) {
    container.innerHTML =
      '<div class="col"><div class="alert alert-warning">Tidak ada produk sesuai kriteria.</div></div>';
    return;
  }

  daftar.forEach((p) => {
    const col = document.createElement("div");
    col.className = "col";
    col.innerHTML = `
          <div class="card h-100">
            <img src="${p.gambar}" class="card-img-top" alt="${p.nama}">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">${p.nama}</h5>
              <p class="card-text flex-grow-1">${p.deskripsi}</p>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <span class="fw-bold">${formatRupiah(p.harga)}</span>
                <span class="badge bg-secondary">${p.kategori}</span>
              </div>
            </div>
          </div>
        `;
    container.appendChild(col);
  });
}

// Event listeners
document
  .getElementById("filterKategori")
  .addEventListener("change", renderProduk);
document.getElementById("sortHarga").addEventListener("change", renderProduk);
document.getElementById("cariNama").addEventListener("input", renderProduk);

// Inisialisasi
isiFilterKategori();
renderProduk();
