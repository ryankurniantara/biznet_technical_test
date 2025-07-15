•  Kondisi SEO dari website  https://biznetnetworks.com/. :

Secara umum dilihat dari tampilan website , website nya rapi dan user friendly

![alt text](https://github.com/ryankurniantara/biznet_technical_test/blob/main/images/1.jpg?raw=true) 

Mobile-friendly – Website responsif dan bisa digunakan dengan baik di perangkat mobile.

![alt text](https://github.com/ryankurniantara/biznet_technical_test/blob/main/images/2.jpg?raw=true)
 
SSL (HTTPS) – Sudah aman dan terenkripsi, penting untuk SEO dan user trust.

![alt text](https://github.com/ryankurniantara/biznet_technical_test/blob/main/images/3.jpg?raw=true)
 
Judul dan deskripsi meta tersedia – Halaman memiliki title tag dan meta description.

![alt text](https://github.com/ryankurniantara/biznet_technical_test/blob/main/images/4.jpg?raw=true)
 
Kalau dilihat dari tampilan mobile, website biznetnetworks.com masih punya nilai performa yang cukup rendah, yaitu 40. Ini nunjukin kalau waktu loading halamannya masih tergolong lambat dan butuh beberapa perbaikan, misalnya dengan ngecilin ukuran gambar, ngurangin script yang berat, dan pakai teknik lazy loading biar elemen-elemen gak langsung dimuat semua sekaligus.Dari sisi aksesibilitas, skornya ada di angka 80, artinya udah lumayan ramah buat pengguna, tapi tetap ada beberapa bagian yang masih bisa dibenahi supaya makin nyaman dipakai semua orang.Untuk bagian best practices, skornya tinggi banget, yaitu 96, yang berarti website ini udah dibangun dengan standar yang baik dan aman.Sementara dari sisi SEO, performanya udah sangat bagus dengan skor 92, jadi website ini udah cukup optimal buat muncul di hasil pencarian.
Kalau dilihat dari tampilan Website Biznet Networks punya performa yang cukup oke secara keseluruhan. Dari hasil pengecekan, nilai performanya ada di angka 81, yang artinya udah cukup cepat tapi masih bisa ditingkatkan lagi.Waktu loading awal (First Contentful Paint) sekitar 1,2 detik, dan elemen terbesar muncul di 1,9 detik, jadi secara kecepatan udah lumayan responsif. Hal positif lainnya, waktu block-nya sangat kecil (30ms) dan tata letak halaman juga stabil banget (gak ada elemen yang loncat-loncat pas loading).Untuk bagian lain, kayak aksesibilitas, praktik terbaik, dan SEO, skornya tinggi semua jadi dari sisi teknis, struktur halaman dan aturan-aturan webnya udah bagus.

Pada Tampilan Mobile : 

![alt text](https://github.com/ryankurniantara/biznet_technical_test/blob/main/images/5.jpg?raw=true)

Pada Tampilan website :

![alt text](https://github.com/ryankurniantara/biznet_technical_test/blob/main/images/6.jpg?raw=true)

Halaman juga sudah berisi info info artikel mengenai teknologi, hal ini juga dapat meningkatkan seo pada website biznet, jadi semakin bermaanfaat dan interaktif artikel maka pengguna akan makin sering mencari artikel dari website biznet dan menambah seo website.

![alt text](https://github.com/ryankurniantara/biznet_technical_test/blob/main/images/7.jpg?raw=true)
 	
• Apakah hal-hal yang bisa anda improve dari website tersebut agar dapat memaksimalkan SEO nya?      

	Untuk memaksimalkan SEO di website Biznet, ada beberapa hal yang bisa ditingkatkan : 
	Di bagian konten, saya melihat ada  gambar-gambar belum diberi deskripsi (alt text) yang sesuai, mengisi semua alt text di setiap gambar
	Menggunakan  schema markup (structured data)agar informasi bisa tampil sebagai rich snippets di Google.
	Konten blog juga sebaiknya terus diperbarui secara rutin dengan topik-topik yang relevan. Selain itu, penting juga untuk menghubungkan antar halaman dengan baik, saya lihat konten blog terakhir update 2024, memperbarui konten blog

	Membangun backlink berkualitas dari situs relevan (media teknologi, direktori bisnis, dsb).
	Mengaktifkan listing di Google Business Profile.


• Apakah yang bisa anda lakukan untuk mempercepat load dari halaman website tersebut?

Optimalisasi Front-End:
	Kompresi gambar menggunakan format modern (WebP, AVIF).
	Gunakan lazy loading untuk gambar dan iframe.
	Minify CSS, JavaScript, dan HTML untuk mengurangi ukuran file.
	Gunakan browser caching untuk elemen-elemen statis.

Server-Side & Infrastruktur:
	Gunakan Content Delivery Network (CDN) untuk distribusi konten lebih cepat.
	Optimalkan server response time dengan mempercepat TTFB (Time To First Byte).
	Terapkan HTTP/2 atau HTTP/3 untuk peningkatan kecepatan dan efisiensi.
	Aktifkan gzip atau Brotli compression di server.


•  Anggaplah anda sedang menangani sebuah aplikasi, kemudian terjadi sebuah masalah dimana ketika ada 100 request sekaligus ke aplikasi anda yang menyebabkan aplikasi anda crash / hang. Jelaskan bagaimana anda mengatasi situasi ini?

Hal pertama yang saya lakukan adalah cari tahu titik lemah sistemnya di mana. Saya cek dulu apakah yang bikin berat itu proses databasenya, atau mungkin ada request yang terlalu kompleks.Lalu, supaya beban aplikasi nggak ditangani langsung secara bersamaan, saya coba pisahkan proses-proses yang berat ke jalur belakang (background). Misalnya, kalau ada proses kirim email atau simpan data besar, itu saya dorong ke sistem antrian. Jadi user tetap dapat respon cepat, sementara proses di belakang jalan sendiri.Selain itu, saya juga mulai menerapkan pembatasan request biar satu user nggak bisa spam terlalu banyak dalam waktu bersamaan. Ini bantu banget meringankan beban server.Dan yang nggak kalah penting, saya coba gunakan cache buat data yang sering dipakai. Jadi sistem nggak perlu hit database terus-terusan untuk data yang sama.Kalau kasusnya memang udah berat banget, saya akan pikirkan untuk bagi beban ke beberapa server (load balancing), supaya nggak semua beban numpuk di satu tempat aja.Intinya: saya usahakan sistem tetap responsif dengan cara memecah pekerjaan, membatasi beban, dan menyederhanakan hal-hal yang bisa di-cache. Bukan soal langsung ganti server besar, tapi lebih ke cara kita ngatur alur kerja aplikasi itu sendiri.

•	Bagaimanakah cara anda mengatasi Race Condition pada aplikasi anda? Jelaskan beserta contohnya. 

   Race condition itu terjadi ketika dua atau lebih proses berjalan bersamaan dan mencoba mengakses atau mengubah data yang sama, sehingga bisa menyebabkan hasil yang tidak sesuai atau data menjadi tidak konsisten. Walaupun saya belum pernah mengalami langsung, saya tahu cara menghindarinya bisa dilakukan dengan beberapa pendekatan umum, misalnya:

   	Menjalankan proses secara berurutan, bukan bersamaan. Dalam beberapa bahasa, ini bisa dilakukan dengan konsep seperti async/await, yang membuat proses menunggu giliran sampai proses sebelumnya selesai, jadi tidak saling tabrakan.
   Contoh : async/await di JavaScript
   async function prosesSatu() {
     console.log("Proses 1 mulai");
     await new Promise(resolve => setTimeout(resolve, 1000));
     console.log("Proses 1 selesai");
   }
   async function prosesDua() {
     console.log("Proses 2 mulai");
   }
   async function jalankan() {
     await prosesSatu();  // Tunggu proses 1 selesai dulu
     await prosesDua();   // Baru proses 2 dijalankan
   }
    Mengunci akses ke data, supaya hanya satu proses yang bisa mengaksesnya dalam satu waktu. Ini disebut dengan locking, bisa manual atau otomatis tergantung tools yang dipakai.
   Locking dan kondisi update mencegah data bentrok saat proses berjalan bersamaan, dengan mengatur siapa yang boleh akses dan kapan.
   Contoh Locking (Python):
   counter += 1  # Hanya satu proses yang bisa ubah data ini saat terkunci
   -- Hanya kurangi stok jika masih tersedia
   	Menggunakan kondisi pengecekan saat update data, seperti “kalau data masih tersedia, baru lanjut”, biar nggak sembarangan nulis ulang.
   Jadi, meskipun tekniknya bisa beda-beda tergantung bahasa atau tools yang digunakan, intinya adalah mengatur alur proses agar tidak berebut data di saat yang sama.
   Contoh Conditional Update (SQL):
   UPDATE barang SET stok = stok - 1 WHERE id = 1 AND stok > 0;






   

