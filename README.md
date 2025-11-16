# Aplikasi Manajemen Tugas (CRUD) – Project Akhir Sistem Basis Data

Repositori ini berisi **aplikasi manajemen tugas** yang dikembangkan sebagai proyek akhir mata kuliah *Sistem Basis Data*.  
Aplikasi ini menerapkan operasi **CRUD (Create, Read, Update, Delete)** untuk mengelola daftar tugas, status, dan tenggat waktu secara terstruktur di atas basis data relasional.

---

## 🎯 Tujuan Proyek

- Menerapkan konsep **perancangan basis data** ke dalam sebuah aplikasi sederhana berbasis CRUD.
- Mengelola data tugas (judul, deskripsi, prioritas, status, tenggat, dll.) dalam satu sistem terpusat.
- Menunjukkan keterkaitan antara desain tabel, relasi, dan operasi pada level aplikasi.

---

## 📊 Desain Basis Data (Ringkas)

Struktur inti basis data (contoh):

**Tabel: `tugas`**

- `id_tugas` (PRIMARY KEY)
- `judul_tugas`
- `deskripsi`
- `prioritas` (mis. rendah / sedang / tinggi)
- `status` (mis. belum dikerjakan / proses / selesai)
- `tanggal_dibuat`
- `tenggat` (deadline)

Struktur lengkap dapat dilihat pada file:

- `db.sql` (skrip pembuatan tabel dan *seed* awal data)

Silakan sesuaikan nama kolom/tabel dengan implementasi yang sebenarnya.

---

## 🧩 Fitur Utama

- **Tambah tugas baru**  
  Form untuk memasukkan judul tugas, deskripsi, prioritas, status awal, dan tenggat.

- **Lihat daftar tugas**  
  Menampilkan semua tugas dalam bentuk tabel/list, termasuk status dan tenggat waktu.

- **Edit tugas**  
  Mengubah informasi tugas (judul, deskripsi, prioritas, status, dan tenggat).

- **Hapus tugas**  
  Menghapus tugas yang sudah tidak diperlukan.

- *(Opsional, jika ada)* **Filter / pencarian**  
  Menyaring tugas berdasarkan status, prioritas, atau kata kunci pada judul.
