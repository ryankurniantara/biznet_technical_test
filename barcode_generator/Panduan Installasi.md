===========================================
BARCODE & QR CODE GENERATOR (PHP NATIVE)
===========================================

Aplikasi sederhana untuk membuat Barcode dan QR Code
menggunakan PHP native tanpa framework seperti Laravel.

-------------------------------------------
Fitur:
-------------------------------------------
- Form input teks dan pilihan tipe barcode
- Mendukung Barcode biasa dan QR Code
- Gambar langsung ditampilkan (PNG)
- Tidak menyimpan file ke server
- Menggunakan library open source (Composer)

-------------------------------------------
Kebutuhan Sistem:
-------------------------------------------
- PHP versi 7.4 atau lebih baru
- Composer sudah terpasang
- Ekstensi GD di PHP harus aktif

-------------------------------------------
Langkah Instalasi:
-------------------------------------------
1. Ekstrak atau pindahkan folder project ke direktori server lokal (htdocs/www)

2. Buka terminal/command prompt di dalam folder project ini.

3. Jalankan perintah:
   composer install

   Jika belum ada file composer.json, jalankan ini:
   composer require picqer/php-barcode-generator
   composer require endroid/qr-code

4. Aktifkan ekstensi GD di PHP:
   - Buka file php.ini
   - Cari baris:
     ;extension=gd
   - Hapus tanda titik koma (;) menjadi:
     extension=gd
   - Simpan dan restart Apache/Nginx/Laragon

-------------------------------------------
Cara Menjalankan Aplikasi:
-------------------------------------------

1. Jika menggunakan XAMPP, Laragon, dll:
   - Letakkan folder ini di htdocs atau www
   - Buka browser dan akses:
     http://localhost/nama-folder/index.php

2. Jika menggunakan PHP built-in server:
   - Buka terminal dan jalankan:
     php -S localhost:8000
   - Lalu buka browser:
     http://localhost:8000

-------------------------------------------
Struktur Folder:
-------------------------------------------

barcode-generator/
├── index.php         --> Form input dan preview
├── composer.json     --> File composer

-------------------------------------------
Catatan:
-------------------------------------------
Jika QR Code tidak tampil dan muncul pesan
"Unable to generate image. Please check if the GD Extension is enabled",
pastikan ekstensi GD diaktifkan seperti langkah nomor 4 di atas.

