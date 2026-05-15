# 🛒 Inventaris Toko Pak Cokomi & Mas Wowo

Aplikasi web inventaris sederhana berbasis Laravel untuk membantu pengelolaan produk di toko Pak Cokomi dan Mas Wowo.

---

## 📌 Fitur Utama

- 🔐 Autentikasi (Login & Register) menggunakan Laravel Breeze
- 📦 CRUD Produk (Create, Read, Update, Delete)
- 📊 Dashboard (statistik produk, stok, dan nilai barang)
- 🧾 Data table produk
- 📝 Form tambah & edit produk
- ⚠️ Modal konfirmasi hapus (bukan alert default)
- 🌱 Database Seeder & Factory (data otomatis)

---

## 🧑‍💻 Teknologi yang Digunakan

- Laravel 13
- Laravel Breeze (Authentication)
- Tailwind CSS
- Alpine.js (Modal interaktif)
- MySQL / Laragon

---

## ⚙️ Instalasi Project

1. Buat laravel di laragon
Buat dengan composer di laragon

2. Masuk ke folder project
cd inventaris-toko

3. Install dependency
composer install
npm install

4. Copy file environment
cp .env.example .env

5. Generate key
php artisan key:generate

6. Setup database di .env
DB_DATABASE=inventaris_toko
DB_USERNAME=root
DB_PASSWORD=

7. Jalankan migration & seeder
php artisan migrate --seed

8. Jalankan server
php artisan serve
npm run dev

🔑 Akun Login (Default)

Jika menggunakan seeder:

Email    : test@example.com
Password : password

(Atau bisa register akun baru)

📂 Struktur Fitur
Dashboard → Ringkasan data produk
Products → Kelola data produk (CRUD)
Login/Register → Autentikasi user

🖼️ Tampilan Aplikasi
Dashboard statistik
Table produk
Form input produk
Modal konfirmasi delete

📈 Nilai Tambah
UI modern (Tailwind)
Modal interaktif (Alpine.js)
Data dummy otomatis (Seeder & Factory)
Dashboard informatif

👨‍🎓 Tujuan
Project ini dibuat untuk memenuhi tugas praktikum Laravel dengan implementasi:
CRUD lengkap
Autentikasi
Database
UI modern

🙌 Penutup
Dengan aplikasi ini, Pak Cokomi dapat mengelola inventaris toko milik Mas Wowo dengan lebih mudah dan efisien.