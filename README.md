# Website Resmi SMPN 41 Samarinda

[![Laravel Version](https://img.shields.io/badge/Laravel-v12.0-red.svg)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-v8.2+-blue.svg)](https://www.php.net)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

Website profil sekolah SMPN 41 Samarinda yang dibangun menggunakan framework Laravel 12. Sistem ini mencakup profil sekolah, manajemen berita, prestasi, guru, galeri, dan dokumen sekolah.

## ✨ Fitur Utama

### 🌐 Frontend (Publik)
- **Beranda**: Informasi umum, berita terbaru, dan sekilas profil sekolah.
- **Profil Sekolah**: Sejarah, visi & misi, dan struktur organisasi.
- **Direktori Guru**: Daftar tenaga pendidik beserta detailnya.
- **Berita & Pengumuman**: Informasi terbaru seputar kegiatan sekolah.
- **Galeri**: Dokumentasi foto kegiatan sekolah.
- **Prestasi**: Daftar pencapaian siswa dan sekolah.
- **Download Dokumen**: Akses dokumen publik (PDF/Docs) yang dapat diunduh.
- **Kontak**: Informasi kontak dan lokasi sekolah.

### 🔐 Backend (Admin Panel)
- **Dashboard**: Ringkasan data sistem.
- **Manajemen Berita**: CRUD berita dengan dukungan kategori dan gambar.
- **Manajemen Guru**: Pengelolaan data tenaga pendidik.
- **Manajemen Galeri**: Upload dan kelola album foto kegiatan.
- **Manajemen Prestasi**: Dokumentasi pencapaian sekolah.
- **Manajemen Dokumen**: Upload file untuk kebutuhan publik.
- **Manajemen Ekstrakurikuler**: Informasi kegiatan non-akademik.

## 🛠️ Tech Stack
- **Framework**: Laravel 12
- **Frontend**: Tailwind CSS, Vite
- **Database**: MySQL / MariaDB
- **PHP Version**: ^8.2

---

## 🚀 Panduan Instalasi

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek ini di lingkungan lokal Anda.

### 📋 Prasyarat
Pastikan Anda sudah menginstal:
- [PHP >= 8.2](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/download/)
- [Node.js & NPM](https://nodejs.org/en/download/)
- [MySQL](https://www.mysql.com/downloads/) atau aplikasi server lokal seperti XAMPP/Laragon.

### 1. Clone Repository
Buka terminal dan jalankan perintah berikut:
```bash
git clone https://github.com/username/smpn41-samarinda.git
cd smpn41-samarinda
```

### 2. Instal Dependensi PHP
```bash
composer install
```

### 3. Instal Dependensi Frontend (NPM)
```bash
npm install
```

### 4. Konfigurasi Environment
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
Kemudian buka file `.env` dan sesuaikan konfigurasi database Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generate Application Key
```bash
php artisan key:generate
```

### 6. Migrasi Database & Seeding
Jalankan migrasi untuk membuat tabel dan masukkan data awal (seperti akun admin dan data guru):
```bash
php artisan migrate --seed
```

### 7. Link Storage
Buat symbolic link agar file yang diupload di folder storage dapat diakses secara publik:
```bash
php artisan storage:link
```

### 8. Jalankan Server
Buka dua terminal berbeda untuk menjalankan server Laravel dan Vite (untuk CSS/JS):

**Terminal 1 (Laravel Server):**
```bash
php artisan serve
```

**Terminal 2 (Vite Compiler):**
```bash
npm run dev
```

Website sekarang dapat diakses melalui browser di: `http://127.0.0.1:8000`

---

## 🔑 Akun Default Admin
Setelah melakukan `php artisan migrate --seed`, Anda dapat login ke halaman admin:
- **URL Login**: `http://127.0.0.1:8000/login`
- **Email**: `admin@smpn41samarinda.sch.id` (Sesuaikan dengan isi DatabaseSeeder)
- **Password**: `password`

## 📁 Struktur Folder Utama
- `app/Http/Controllers/Admin`: Logic untuk panel admin.
- `app/Models`: Definisi skema database.
- `resources/views/pages`: Halaman tampilan frontend.
- `resources/views/admin`: Halaman tampilan panel admin.
- `routes/web.php`: Definisi semua route/URL.

---

## 📄 Lisensi
Proyek ini bersifat open-source di bawah lisensi [MIT](LICENSE).
