# UnivGO

UnivGO adalah aplikasi direktori kampus yang dirancang untuk memudahkan kamu dalam menemukan informasi seputar kampus di Indonesia. UnivGO memudahkan kamu menemukan kampus terdekat, top 10 PTN, politeknik, dan swasta terbaik, serta berita kampus dan fitur pencarian program studi. 

## Tentang UnivGO Laravel

Backend service dan admin page untuk **UnivGO**, mendukung aplikasi **UnivGO-Flutter**. Proyek ini menggunakan **Laravel** dan **Filament** sebagai framework utama untuk pengembangan backend.

## Fitur

* **Direktori Kampus**: Menampilkan informasi kampus di Indonesia.
* **Pencarian Kampus dan Program Studi**: Fitur pencarian kampus dan program studi dengan sorting dan filter yang beragam sesuai dengan kebutuhan.
* **Rekomendasi Kampus Terdekat**: Daftar Kampus Terdekat sesuai dengan lokasi.
* **Top Kampus**: Menyediakan daftar kampus terbaik di berbagai kategori (PTN, Politeknik, Swasta).
* **Rating dan Ulasan Kampus**: 
Menampilkan rating dan ulasan dari mahasiswa dan alumni untuk setiap kampus, membantu calon mahasiswa dalam memilih kampus yang tepat.
* **Berita Kampus**: Menyediakan berita terkini terkait kampus.

## Instalasi dan Penggunaan

### Requirement

* **PHP** >= 8.2
* **Composer**
* **Database**
* **Git**

### Instalasi

1. **Clone Repository**

   ```bash
   git clone https://github.com/fzlaziz/univgo-laravel.git
   cd univgo-laravel
   ```

2. **Install Dependensi**

   Install dependensi PHP:
   ```bash
   composer install
   ```

3. **Konfigurasi Environment**

   Salin file `.env.example` dan beri nama `.env`:
   ```bash
   cp .env.example .env
   ```

   Ubah konfigurasi database di file `.env` sesuai dengan konfigurasi lokal seperti database, mailer, dan filesystem.

4. **Generate Application Key**

   Jalankan perintah ini untuk membuat application key:
   ```bash
   php artisan key:generate
   ```

5. **Migrasi dan Seed Database**

   Jalankan migrasi dan seed untuk mengatur database:
   ```bash
   php artisan migrate --seed
   ```

6. **Serve App**

   Jalankan server development Laravel:
   ```bash
   php artisan serve
   ```

   Akses aplikasi di `http://localhost:8000`. dan panel admin di `/admin`
