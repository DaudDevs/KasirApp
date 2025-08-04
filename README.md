# KasirApp - Aplikasi Kasir Sederhana

KasirApp adalah aplikasi Point of Sale (POS) berbasis web menggunakan Laravel. Cocok untuk UMKM yang butuh sistem kasir cepat, sederhana, dan responsif.

---

FITUR:
- Login untuk kasir & admin
- CRUD Produk
- Transaksi & cetak struk
- Laporan harian & bulanan
- Responsive (HP, tablet, desktop)

---

TEKNOLOGI:
- PHP 8.1+, Laravel 10
- Blade, Tailwind CSS, Alpine.js
- MySQL / MariaDB
- Apache / Nginx

---

CARA INSTAL:
1. Clone repo:
   `git clone https://github.com/username/KasirApp.git && cd KasirApp`

2. Salin file `.env`:
   `cp .env.example .env`

3. Atur database di `.env`:
DB_DATABASE=kasir
DB_USERNAME=root
DB_PASSWORD=

4. Jalankan:
composer install
php artisan key:generate
php artisan migrate --seed
npm install && npm run dev
php artisan serve

5. Buka di browser: `http://127.0.0.1:8000`

---

AKUN LOGIN:
- Email: admin@example.com
- Password: password

---

CARA KONTRIBUSI:
1. Fork repo
2. Buat branch baru:
`git checkout -b fitur/NamaFitur`
3. Commit:
`git commit -m "fitur baru"`
4. Push:
`git push origin fitur/NamaFitur`
5. Buka Pull Request

---

LISENSI:
MIT © 2025 KasirApp
