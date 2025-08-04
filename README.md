KasirApp - Aplikasi Kasir Sederhana
Aplikasi Point of Sale (POS) berbasis web yang modernodern,g untuk me transaksi, produk, dan laporan penjualan secara efisien.

📋 Daftar Isi
Tentang Proyek

Fitur Utama

Tangkapan Layar

Teknologi yang Digunakan

Panduan Instalasi

Berkontribusi

Lisensi

📖 Tentang Proyek
KasirApp adalah solusi POS yang dibangun menggunakan framework Laravel. Tujuannya adalah untuk menyediakan sistem kasir yang andal, cepat, dan mudah digunakan bagi usaha kecil hingga menengah, dengan antarmuka yang bersih dan responsif.Penjualan: Lihat ri📦 wayat tra Produk:an laporan pendapatan harian atau bulanan.

Manajemen Pengguna: Siste🛒 m otentik Penjualan:asir dan admin.

a Responsif: Dapat diakses dengan baik di berbagai 🧾 peran Struk:ermasuk tablet dan desktop.

🛠️ Teknologi yang Digunakan
B📊 ackend: Penjualan: Pantaul 10

Frontend: Bladind CSS, Alpine.js (atau Vue.js/Reac👤 t)

Dat Pengguna: Sistem otentikasi untuk kasir dan admin.

📱 Desain Responsif: Tampilan optimalut untuk menjalankan proyek ini di lingkungan lokal Anda📸 Tangkapan Layar

Tampilan Halaman Login

Tampilan Dasbor Transaksi

.
1. Clone Repositori

git
Kategori

Teknologi

Backend

PHP 8.1+, Laravel 10

Frontend

Blade, Tailwind CSS, Alpine.js

Database

MySQL / MariaDB

Server

Apache / Nginx

pkan Environment File
Salin berkas .env.example menjadi .env.

cp .env.example .env

4. Konfigurasi Database
Buka berkas .env dan sesuaikan konfigurasi database Anda.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=

Penting: Pastikan Anda sudah membuat database dengan nama yang sesuai.

5. Generate Application Key

php artisan key:generate

6. Migrasi dan Seeding Database
Jalankan migrasi untuk membuat tabel dan seeder untuk mengisi data awal (jika ada).

php artisan migrate --seed

7. Instal Dependensi Node.js (jika ada)
Jika proyek Anda menggunakan Node.js untuk kompilasi aset (CSS/JS).

npm install
npm run dev

8. Jalankan Server Lokal

php artisan serve

Aplikasi Anda sekarang akan berjalan di http://127.0.0.1:8000.

📝 Cara Penggunaan
Setelah instalasi berhasil, Anda bisa masuk menggunakan akun default yang telah dibuat oleh seeder:

Email: admin@example.com

Password: password

🤝 Berkontribusi
Kontribusi dari Anda sangat kami harapkan! Jika Anda ingin berkontribusi, silakan lakukan fork pada repositori ini, buat branch baru, dan kirimkan Pull Request.

Fork repositori ini.

Buat branch fitur baru (git checkout -b fitur/FiturBaru).

Commit perubahan Anda (git commit -m 'Menambahkan FiturBaru').

Push ke branch (git push origin fitur/FiturBaru).

Buka sebuah Pull Request.

📄 Lisensi
Proyek ini dilisensikan di bawah Lisensi MIT.
