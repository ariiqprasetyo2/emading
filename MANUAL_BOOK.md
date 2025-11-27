# MANUAL BOOK
# E-MADING SEKOLAH

---

**VERSI 1.0**

**TAHUN 2025**

---

## DAFTAR ISI

**BAB I PENDAHULUAN**
1.1 Latar Belakang
1.2 Tujuan
1.3 Ruang Lingkup
1.4 Definisi dan Istilah

**BAB II GAMBARAN UMUM SISTEM**
2.1 Deskripsi Sistem
2.2 Fitur Utama
2.3 Pengguna Sistem
2.4 Kebutuhan Sistem

**BAB III PETUNJUK PENGGUNAAN**
3.1 Akses Sistem
3.2 Login dan Logout
3.3 Dashboard
3.4 Navigasi Sistem

**BAB IV PANDUAN PENGGUNA SISWA**
4.1 Dashboard Siswa
4.2 Membuat Artikel
4.3 Mengelola Artikel
4.4 Membaca Artikel
4.5 Interaksi Artikel

**BAB V PANDUAN PENGGUNA GURU**
5.1 Dashboard Guru
5.2 Mengelola Artikel Siswa
5.3 Persetujuan Artikel
5.4 Artikel Pribadi
5.5 Moderasi Komentar

**BAB VI PANDUAN ADMINISTRATOR**
6.1 Dashboard Administrator
6.2 Manajemen Pengguna
6.3 Manajemen Kategori
6.4 Manajemen Artikel
6.5 Laporan Sistem

**BAB VII FITUR TAMBAHAN**
7.1 Sistem Notifikasi
7.2 Export PDF
7.3 Komentar dan Like
7.4 Pencarian Artikel

**BAB VIII TROUBLESHOOTING**
8.1 Masalah Umum
8.2 Solusi Permasalahan
8.3 FAQ

**BAB IX PENUTUP**
9.1 Kesimpulan
9.2 Kontak Dukungan

---

## BAB I
## PENDAHULUAN

### 1.1 Latar Belakang

Sistem Artikel Sekolah merupakan platform digital yang dikembangkan untuk memfasilitasi proses penulisan, pengelolaan, dan publikasi artikel dalam lingkungan pendidikan. Sistem ini dirancang untuk mendukung kegiatan literasi dan pembelajaran berbasis teknologi informasi.

### 1.2 Tujuan

Tujuan pengembangan sistem ini adalah:
a. Meningkatkan kemampuan literasi siswa melalui penulisan artikel
b. Memfasilitasi proses review dan persetujuan artikel oleh guru
c. Menyediakan platform publikasi artikel yang terstruktur
d. Mendukung interaksi edukatif antara siswa dan guru

### 1.3 Ruang Lingkup

Sistem ini mencakup:
a. Manajemen pengguna (Admin, Guru, Siswa)
b. Pengelolaan artikel dan kategori
c. Sistem persetujuan bertingkat
d. Fitur interaksi (komentar, like)
e. Sistem notifikasi
f. Export dokumen PDF

### 1.4 Definisi dan Istilah

**Admin**: Administrator sistem dengan akses penuh
**Guru**: Pengguna dengan hak moderasi artikel siswa
**Siswa**: Pengguna yang dapat membuat dan mengelola artikel
**Draft**: Status artikel yang belum dipublikasi
**Published**: Status artikel yang telah disetujui dan dipublikasi
**Moderasi**: Proses review dan persetujuan artikel

---

## BAB II
## GAMBARAN UMUM SISTEM

### 2.1 Deskripsi Sistem

Sistem Artikel Sekolah adalah aplikasi web berbasis Laravel yang memungkinkan pengelolaan artikel dengan sistem role-based access control. Sistem ini menerapkan workflow persetujuan artikel dari siswa ke guru/admin sebelum dipublikasi.

### 2.2 Fitur Utama

a. **Manajemen Artikel**
   - Pembuatan artikel dengan editor teks
   - Upload gambar pendukung
   - Kategorisasi artikel
   - Status tracking (draft/published)

b. **Sistem Persetujuan**
   - Review artikel oleh guru/admin
   - Persetujuan atau penolakan dengan alasan
   - Notifikasi status artikel

c. **Interaksi Pengguna**
   - Komentar pada artikel
   - Like/unlike artikel
   - Notifikasi real-time

d. **Manajemen Konten**
   - Kategorisasi artikel
   - Pencarian artikel
   - Export artikel ke PDF

### 2.3 Pengguna Sistem

**Administrator**
- Mengelola seluruh sistem
- Manajemen pengguna dan kategori
- Moderasi artikel
- Akses laporan sistem

**Guru**
- Review dan persetujuan artikel siswa
- Membuat artikel pribadi
- Moderasi komentar
- Akses dashboard guru

**Siswa**
- Membuat dan mengelola artikel
- Membaca artikel yang dipublikasi
- Berinteraksi melalui komentar dan like
- Menerima notifikasi

### 2.4 Kebutuhan Sistem

**Perangkat Keras**
- Server dengan spesifikasi minimal:
  - RAM: 2GB
  - Storage: 10GB
  - Processor: Dual Core

**Perangkat Lunak**
- Web Server (Apache/Nginx)
- PHP 8.1 atau lebih tinggi
- MySQL/MariaDB
- Composer

**Browser**
- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

---

## BAB III
## PETUNJUK PENGGUNAAN

### 3.1 Akses Sistem

1. Buka web browser
2. Ketikkan alamat URL sistem
3. Sistem akan menampilkan halaman utama
4. Jika belum login, akan diarahkan ke halaman login

### 3.2 Login dan Logout

**Proses Login:**
1. Masukkan username pada kolom "Username"
2. Masukkan password pada kolom "Password"
3. Klik tombol "Login"
4. Sistem akan memvalidasi kredensial
5. Jika berhasil, diarahkan ke dashboard sesuai role

**Proses Logout:**
1. Klik menu profil di pojok kanan atas
2. Pilih "Logout"
3. Sistem akan mengakhiri sesi
4. Diarahkan kembali ke halaman login

### 3.3 Dashboard

Setiap role memiliki dashboard yang berbeda:

**Dashboard Siswa:**
- Statistik artikel pribadi
- Artikel terbaru
- Notifikasi
- Menu navigasi

**Dashboard Guru:**
- Artikel menunggu persetujuan
- Statistik artikel siswa
- Aktivitas terbaru
- Menu moderasi

**Dashboard Admin:**
- Statistik sistem keseluruhan
- Grafik aktivitas
- Laporan sistem
- Menu manajemen

### 3.4 Navigasi Sistem

Sistem menggunakan menu navigasi yang konsisten:
- **Header**: Logo, menu utama, notifikasi, profil
- **Sidebar**: Menu navigasi sesuai role
- **Content Area**: Konten utama halaman
- **Footer**: Informasi sistem dan copyright

---

## BAB IV
## PANDUAN PENGGUNA SISWA

### 4.1 Dashboard Siswa

Setelah login sebagai siswa, Anda akan melihat:

**Panel Statistik:**
- Total artikel yang dibuat
- Artikel yang dipublikasi
- Artikel dalam draft
- Total like yang diterima

**Artikel Terbaru:**
- Daftar artikel terbaru yang dipublikasi
- Akses cepat untuk membaca artikel

**Notifikasi:**
- Pemberitahuan status artikel
- Notifikasi komentar baru
- Update sistem

### 4.2 Membuat Artikel

**Langkah-langkah:**

1. **Akses Form Artikel**
   - Klik menu "Buat Artikel"
   - Sistem menampilkan form pembuatan artikel

2. **Mengisi Form**
   - **Judul**: Masukkan judul artikel yang menarik dan deskriptif
   - **Kategori**: Pilih kategori yang sesuai dari dropdown
   - **Isi Artikel**: Tulis konten artikel menggunakan editor teks
   - **Foto**: Upload gambar pendukung (opsional)

3. **Validasi Input**
   - Judul: maksimal 255 karakter
   - Isi artikel: wajib diisi
   - Kategori: harus dipilih
   - Foto: format JPG/PNG, maksimal 2MB

4. **Menyimpan Artikel**
   - Klik tombol "Simpan"
   - Artikel tersimpan dengan status "Draft"
   - Sistem menampilkan pesan konfirmasi

### 4.3 Mengelola Artikel

**Mengakses Artikel Saya:**
1. Klik menu "Artikel Saya"
2. Sistem menampilkan daftar artikel yang pernah dibuat

**Status Artikel:**
- **Draft**: Artikel belum disetujui, dapat diedit
- **Published**: Artikel sudah disetujui dan dipublikasi

**Aksi yang Tersedia:**

**Edit Artikel (hanya untuk status Draft):**
1. Klik tombol "Edit" pada artikel
2. Ubah konten sesuai kebutuhan
3. Klik "Simpan" untuk menyimpan perubahan

**Hapus Artikel:**
1. Klik tombol "Hapus" pada artikel
2. Konfirmasi penghapusan
3. Artikel akan dihapus permanen

**Lihat Detail:**
1. Klik tombol "Lihat" atau judul artikel
2. Sistem menampilkan artikel lengkap

### 4.4 Membaca Artikel

**Mengakses Artikel:**
1. Klik menu "Baca Artikel"
2. Sistem menampilkan artikel yang sudah dipublikasi

**Fitur Pencarian:**
1. Gunakan kolom pencarian di atas daftar artikel
2. Masukkan kata kunci
3. Sistem akan memfilter artikel sesuai kata kunci

**Filter Kategori:**
1. Pilih kategori dari dropdown filter
2. Sistem menampilkan artikel sesuai kategori

### 4.5 Interaksi Artikel

**Memberikan Like:**
1. Buka artikel yang ingin di-like
2. Klik tombol "Like" di bawah artikel
3. Tombol akan berubah warna menandakan sudah di-like
4. Klik lagi untuk membatalkan like

**Menambahkan Komentar:**
1. Scroll ke bagian bawah artikel
2. Tulis komentar di kolom yang tersedia
3. Klik tombol "Kirim Komentar"
4. Komentar akan muncul di bawah artikel

**Export PDF:**
1. Buka artikel yang ingin diexport
2. Klik tombol "Export PDF"
3. File PDF akan otomatis terunduh

---

## BAB V
## PANDUAN PENGGUNA GURU

### 5.1 Dashboard Guru

**Panel Moderasi:**
- Jumlah artikel menunggu persetujuan
- Artikel yang sudah disetujui hari ini
- Total artikel siswa

**Aktivitas Terbaru:**
- Artikel baru dari siswa
- Komentar terbaru
- Aktivitas sistem

### 5.2 Mengelola Artikel Siswa

**Mengakses Artikel Siswa:**
1. Klik menu "Artikel Siswa"
2. Sistem menampilkan daftar artikel dari siswa

**Filter Artikel:**
- **Semua**: Menampilkan semua artikel
- **Menunggu**: Artikel dengan status draft
- **Disetujui**: Artikel yang sudah dipublikasi

### 5.3 Persetujuan Artikel

**Menyetujui Artikel:**
1. Buka artikel yang akan direview
2. Baca konten artikel secara menyeluruh
3. Klik tombol "Setujui"
4. Artikel berubah status menjadi "Published"
5. Siswa menerima notifikasi persetujuan

**Menolak Artikel:**
1. Buka artikel yang akan ditolak
2. Klik tombol "Tolak"
3. Masukkan alasan penolakan
4. Klik "Konfirmasi Penolakan"
5. Siswa menerima notifikasi dengan alasan penolakan

**Kriteria Penilaian:**
- Kesesuaian dengan kategori
- Kualitas konten
- Tata bahasa dan ejaan
- Originalitas
- Kelengkapan informasi

### 5.4 Artikel Pribadi

**Membuat Artikel Guru:**
1. Klik menu "Buat Artikel"
2. Isi form artikel seperti siswa
3. Artikel guru langsung berstatus "Published"

**Mengelola Artikel Pribadi:**
1. Klik menu "Artikel Saya"
2. Kelola artikel pribadi
3. Edit atau hapus sesuai kebutuhan

### 5.5 Moderasi Komentar

**Mengakses Komentar:**
1. Klik menu "Kelola Komentar"
2. Sistem menampilkan semua komentar

**Moderasi Komentar:**
1. Review komentar yang dilaporkan
2. Hapus komentar yang tidak pantas
3. Berikan peringatan kepada pengguna

---

## BAB VI
## PANDUAN ADMINISTRATOR

### 6.1 Dashboard Administrator

**Statistik Sistem:**
- Total pengguna (Admin, Guru, Siswa)
- Total artikel (Draft, Published)
- Total kategori
- Aktivitas harian

**Grafik Aktivitas:**
- Grafik artikel per bulan
- Grafik pengguna aktif
- Statistik interaksi

### 6.2 Manajemen Pengguna

**Mengakses Manajemen Pengguna:**
1. Klik menu "Kelola Pengguna"
2. Sistem menampilkan daftar semua pengguna

**Menambah Pengguna Baru:**
1. Klik tombol "Tambah Pengguna"
2. Isi form registrasi:
   - Nama lengkap
   - Username (unik)
   - Password
   - Role (Admin/Guru/Siswa)
3. Klik "Simpan"

**Mengedit Pengguna:**
1. Klik tombol "Edit" pada pengguna
2. Ubah informasi yang diperlukan
3. Klik "Simpan Perubahan"

**Menghapus Pengguna:**
1. Klik tombol "Hapus" pada pengguna
2. Konfirmasi penghapusan
3. Pengguna dan semua datanya akan dihapus

**Reset Password:**
1. Klik tombol "Reset Password"
2. Masukkan password baru
3. Informasikan password baru kepada pengguna

### 6.3 Manajemen Kategori

**Mengakses Kategori:**
1. Klik menu "Kelola Kategori"
2. Sistem menampilkan daftar kategori

**Menambah Kategori:**
1. Klik tombol "Tambah Kategori"
2. Masukkan nama kategori
3. Klik "Simpan"

**Mengedit Kategori:**
1. Klik tombol "Edit" pada kategori
2. Ubah nama kategori
3. Klik "Simpan"

**Menghapus Kategori:**
1. Klik tombol "Hapus" pada kategori
2. Konfirmasi penghapusan
3. Artikel dalam kategori akan menjadi tanpa kategori

### 6.4 Manajemen Artikel

**Mengakses Semua Artikel:**
1. Klik menu "Kelola Artikel"
2. Sistem menampilkan artikel dari semua pengguna

**Filter Artikel:**
- Berdasarkan status (Draft/Published)
- Berdasarkan penulis
- Berdasarkan kategori
- Berdasarkan tanggal

**Moderasi Artikel:**
1. Review artikel yang dilaporkan
2. Setujui atau tolak artikel
3. Hapus artikel yang melanggar aturan

### 6.5 Laporan Sistem

**Mengakses Laporan:**
1. Klik menu "Laporan"
2. Pilih jenis laporan yang diinginkan

**Jenis Laporan:**
- Laporan aktivitas pengguna
- Laporan artikel per periode
- Laporan interaksi (like, komentar)
- Laporan sistem keseluruhan

**Export Laporan:**
1. Pilih periode laporan
2. Klik tombol "Export PDF" atau "Export Excel"
3. File laporan akan terunduh

---

## BAB VII
## FITUR TAMBAHAN

### 7.1 Sistem Notifikasi

**Jenis Notifikasi:**

**Untuk Siswa:**
- Artikel disetujui oleh guru/admin
- Artikel ditolak dengan alasan
- Komentar baru pada artikel
- Like baru pada artikel

**Untuk Guru:**
- Artikel baru dari siswa menunggu persetujuan
- Komentar baru yang perlu dimoderasi

**Untuk Admin:**
- Pengguna baru mendaftar
- Laporan masalah sistem
- Update aktivitas sistem

**Mengelola Notifikasi:**
1. Klik ikon notifikasi di header
2. Lihat daftar notifikasi terbaru
3. Klik notifikasi untuk membaca detail
4. Gunakan "Tandai Semua Dibaca" untuk menandai semua notifikasi

### 7.2 Export PDF

**Fitur Export:**
- Export artikel individual ke PDF
- Export laporan sistem ke PDF
- Format PDF yang rapi dan profesional

**Cara Export Artikel:**
1. Buka artikel yang ingin diexport
2. Klik tombol "Export PDF"
3. Sistem akan generate PDF
4. File PDF otomatis terunduh

**Konten PDF:**
- Header dengan logo sekolah
- Judul artikel
- Informasi penulis dan tanggal
- Isi artikel lengkap
- Gambar (jika ada)
- Footer dengan informasi sistem

### 7.3 Komentar dan Like

**Sistem Komentar:**
- Komentar real-time
- Notifikasi komentar baru
- Moderasi komentar oleh guru/admin
- Hapus komentar yang tidak pantas

**Sistem Like:**
- Like/unlike artikel
- Hitung total like
- Notifikasi like baru
- Statistik artikel terpopuler

### 7.4 Pencarian Artikel

**Fitur Pencarian:**
- Pencarian berdasarkan judul
- Pencarian berdasarkan isi artikel
- Filter berdasarkan kategori
- Filter berdasarkan penulis
- Sorting berdasarkan tanggal/popularitas

**Cara Menggunakan Pencarian:**
1. Masukkan kata kunci di kolom pencarian
2. Pilih filter kategori (opsional)
3. Klik tombol "Cari"
4. Sistem menampilkan hasil pencarian

---

## BAB VIII
## TROUBLESHOOTING

### 8.1 Masalah Umum

**Masalah Login:**

*Gejala:* Tidak bisa login ke sistem
*Penyebab:*
- Username atau password salah
- Akun belum aktif
- Masalah koneksi internet

*Solusi:*
1. Pastikan username dan password benar
2. Periksa caps lock
3. Hubungi admin untuk reset password
4. Periksa koneksi internet

**Masalah Upload Gambar:**

*Gejala:* Gagal upload gambar artikel
*Penyebab:*
- Ukuran file terlalu besar
- Format file tidak didukung
- Masalah koneksi

*Solusi:*
1. Kompres gambar hingga < 2MB
2. Gunakan format JPG/PNG
3. Periksa koneksi internet
4. Coba upload ulang

**Masalah Artikel Tidak Muncul:**

*Gejala:* Artikel tidak tampil di daftar
*Penyebab:*
- Artikel masih berstatus draft
- Artikel belum disetujui
- Filter pencarian aktif

*Solusi:*
1. Periksa status artikel
2. Tunggu persetujuan guru/admin
3. Reset filter pencarian
4. Refresh halaman

### 8.2 Solusi Permasalahan

**Masalah Performa:**

*Gejala:* Sistem lambat atau tidak responsif
*Solusi:*
1. Clear cache browser
2. Tutup tab browser yang tidak perlu
3. Periksa koneksi internet
4. Gunakan browser yang didukung
5. Hubungi admin jika masalah berlanjut

**Masalah Notifikasi:**

*Gejala:* Notifikasi tidak muncul
*Solusi:*
1. Refresh halaman
2. Periksa pengaturan browser
3. Pastikan JavaScript aktif
4. Clear cache browser

**Masalah Export PDF:**

*Gejala:* Tidak bisa export ke PDF
*Solusi:*
1. Pastikan popup blocker tidak aktif
2. Periksa pengaturan download browser
3. Coba dengan browser lain
4. Hubungi admin jika masalah berlanjut

### 8.3 FAQ (Frequently Asked Questions)

**Q: Berapa lama artikel akan disetujui?**
A: Maksimal 2x24 jam kerja setelah submit artikel.

**Q: Bisakah mengubah artikel yang sudah dipublish?**
A: Tidak, artikel yang sudah dipublish tidak dapat diubah. Hubungi admin jika ada kesalahan mendesak.

**Q: Apakah ada batasan jumlah artikel yang bisa dibuat?**
A: Tidak ada batasan jumlah, namun pastikan kualitas artikel tetap baik.

**Q: Bagaimana jika lupa password?**
A: Hubungi administrator untuk reset password.

**Q: Bisakah mengganti username?**
A: Username tidak dapat diubah setelah akun dibuat. Hubungi admin jika perlu perubahan.

**Q: Format gambar apa saja yang didukung?**
A: JPG, PNG, dan GIF dengan ukuran maksimal 2MB.

**Q: Bisakah menghapus komentar sendiri?**
A: Ya, Anda dapat menghapus komentar yang Anda buat.

**Q: Bagaimana cara melaporkan konten yang tidak pantas?**
A: Hubungi guru atau admin melalui sistem atau kontak langsung.

---

## BAB IX
## PENUTUP

### 9.1 Kesimpulan

Sistem Artikel Sekolah telah dirancang untuk mendukung kegiatan literasi dan pembelajaran di lingkungan sekolah. Dengan fitur-fitur yang lengkap dan antarmuka yang user-friendly, sistem ini diharapkan dapat:

1. Meningkatkan minat siswa dalam menulis artikel
2. Memfasilitasi proses review dan moderasi oleh guru
3. Menyediakan platform publikasi yang aman dan terkontrol
4. Mendukung interaksi edukatif antar pengguna
5. Memberikan laporan dan statistik yang berguna

Keberhasilan implementasi sistem ini sangat bergantung pada partisipasi aktif dari semua pengguna dan dukungan manajemen sekolah.

### 9.2 Kontak Dukungan

**Tim Dukungan Teknis:**
- Email: support@sekolah.com
- Telepon: (021) 1234-5678
- WhatsApp: 0812-3456-7890

**Jam Operasional:**
- Senin - Jumat: 08:00 - 16:00 WIB
- Sabtu: 08:00 - 12:00 WIB
- Minggu: Libur

**Alamat:**
Sekolah XYZ
Jl. Pendidikan No. 123
Jakarta 12345

**Website:**
www.sekolah.com

**Media Sosial:**
- Facebook: /SekolahXYZ
- Instagram: @sekolahxyz
- Twitter: @sekolahxyz

---

**MANUAL BOOK SISTEM ARTIKEL SEKOLAH**
**Versi 1.0 - Tahun 2025**

**© 2025 Sekolah XYZ. Semua hak cipta dilindungi.**

*Dokumen ini merupakan panduan resmi penggunaan Sistem Artikel Sekolah. Dilarang memperbanyak atau mendistribusikan tanpa izin.*