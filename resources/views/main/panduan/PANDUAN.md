# Panduan Penggunaan Sistem SPK Wisata Sumba Barat

Sistem ini dirancang untuk memberikan rekomendasi destinasi wisata terbaik di Sumba Barat menggunakan metode **Simple Additive Weighting (SAW)**. Terdapat dua jenis akses utama: **Admin** dan **User**.

---

## 🔑 Level Akses: Admin (Pengelola)

Admin memiliki kontrol penuh atas data pendukung sistem. Berikut adalah alur kerjanya:

### 1. Manajemen User
- Kelola data pengguna yang dapat mengakses sistem.
- Reset password user jika diperlukan.
- Admin tidak dapat menghapus akunnya sendiri demi keamanan.

### 2. Konfigurasi Kriteria & Sub-Kriteria
- **Kriteria**: Menentukan variabel penilaian (Contoh: Harga, Jarak, Fasilitas).
    - **Sifat Cost**: Menggunakan input **Numeric** manual (Contoh: Harga 15.000, Jarak 10km).
    - **Sifat Benefit**: Menggunakan pilihan **Sub-Kriteria** (Contoh: Fasilitas -> Sangat Lengkap).
- **Sub-Kriteria**: Menentukan label dan bobot nilai untuk kriteria bertipe 'Sub'.

### 3. Manajemen Wisata
- Menambah, mengubah, atau menonaktifkan destinasi wisata yang akan dihitung oleh sistem.

### 4. Monitoring Histori
- Admin dapat melihat seluruh histori perhitungan yang dilakukan oleh semua user di sistem.

---

## 👤 Level Akses: User (Petugas/Pengunjung)

User berfokus pada proses pengambilan keputusan (perhitungan).

### 1. Dashboard Pribadi
- Melihat statistik perhitungan yang telah dilakukan secara pribadi.
- Melihat daftar wisata dan kriteria yang aktif.

### 2. Input Nilai Alternatif
- Memilih destinasi wisata yang ingin dibandingkan.
- Memasukkan nilai berdasarkan kriteria yang ada:
    - Input angka manual untuk kriteria **Cost**.
    - Memilih opsi kategori untuk kriteria **Benefit**.

### 3. Perhitungan SAW
- Setelah input selesai, sistem akan memproses data menggunakan rumus normalisasi SAW.
- Hasil akhir berupa skor preferensi akan diurutkan dari yang tertinggi sebagai rekomendasi utama.

### 4. Keamanan Mandiri
- Setiap user dapat mengganti password mereka sendiri melalui menu **Ganti Password**.

---

## 📊 Cara Kerja Metode SAW di Sistem Ini

1. **Input Data**: User memasukkan nilai untuk tiap alternatif wisata.
2. **Normalisasi**: 
    - Untuk **Benefit**: Nilai dibagi dengan nilai maksimal.
    - Untuk **Cost**: Nilai minimal dibagi dengan nilai input.
3. **Peringkat**: Hasil normalisasi dikalikan dengan bobot kriteria masing-masing, lalu dijumlahkan untuk mendapatkan skor akhir.
