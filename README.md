# 🕌 Website Sistem Informasi & Dakwah  
## Muhammadiyah Ranting Sribit

Website ini merupakan sistem informasi terintegrasi untuk mendukung kegiatan dakwah, administrasi, dan layanan sosial Muhammadiyah Ranting Sribit. Dibangun dengan Laravel dan Bootstrap, website ini menyajikan berbagai fitur yang mudah diakses oleh masyarakat dan pengurus.

---

## 🌐 Fitur Utama

- 👥 **Struktur Kepengurusan**  
  Menampilkan daftar dan jabatan anggota pengurus Muhammadiyah Ranting Sribit.

- 📅 **Aktifitas Kegiatan**  
  Dokumentasi dan informasi kegiatan dakwah, sosial, dan keagamaan.

- 🚐 **Layanan Peminjaman Mobil Layanan**  
  Fitur pemesanan/peminjaman mobil layanan untuk keperluan dakwah, sosial, dan kesehatan.

- 📰 **Artikel**  
  Menyediakan artikel dakwah, informasi keislaman, dan kegiatan organisasi.

- 🖼️ **Galeri**  
  Menampilkan dokumentasi foto-foto kegiatan dan program Muhammadiyah Ranting Sribit.

- 💰 **Laporan Keuangan, Zakat, & Qurban**  
  Transparansi dana, laporan penerimaan dan pengeluaran, serta distribusi zakat dan qurban.

- 📤 **Ekspor Laporan PDF**  
  Semua laporan keuangan, zakat, qurban, dan mobil layanan dapat diekspor menjadi PDF menggunakan **Laravel DomPDF**.

---

## 🛠️ Teknologi yang Digunakan

- [Laravel Framework](https://laravel.com/)
- [Bootstrap CSS](https://getbootstrap.com/)
- [Barryvdh Laravel DomPDF](https://github.com/barryvdh/laravel-dompdf)

---

## ⚙️ Instalasi

1. Clone repositori:

```bash
git clone [https://github.com/daffahammam/website-SribitMu.git]
cd nama-repo

2. Install dependency Laravel:
composer install
npm install && npm run dev

3. Buat file .env dan atur konfigurasi:
cp .env.example .env
php artisan key:generate

4. Jalankan migrasi database:
php artisan migrate

5. Jalankan server lokal:
php artisan serve
