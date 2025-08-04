Aplikasi Kasir Sederhana (KasirApp)
KasirApp adalah aplikasi Point of Sale (POS) berbasis web yang sederhana dan modern, dirancang untuk membantu mengelola transaksi penjualan, produk, dan laporan dengan efisien. Aplikasi ini dibangun menggunakan framework Laravel dengan antarmuka yang bersih dan mudah digunakan.

✨ Fitur Utama
Manajemen Produk: Tambah, lihat, ubah, dan hapus data produk beserta harga dan stok.

Transaksi Penjualan: Proses transaksi penjualan dengan cepat dan catat setiap item yang terjual.

Cetak Struk: Hasilkan struk atau nota pembayaran untuk setiap transaksi.

Laporan Penjualan: Lihat riwayat transaksi dan laporan pendapatan harian atau bulanan.

Manajemen Pengguna: Sistem otentikasi untuk kasir dan admin.

Antarmuka Responsif: Dapat diakses dengan baik di berbagai perangkat, termasuk tablet dan desktop.

🛠️ Teknologi yang Digunakan
Backend: PHP 8.1+, Laravel 10

Frontend: Blade, Tailwind CSS, Alpine.js (atau Vue.js/React)

Database: MySQL / MariaDB

Server: Apache / Nginx

🚀 Panduan Instalasi
Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda.

1. Clone Repositori

git clone https://github.com/DaudDevs/KasirApp.git
cd KasirApp

2. Instal Dependensi PHP
Pastikan Anda sudah menginstal Composer.

composer install

3. Siapkan Environment File
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
