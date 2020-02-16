# Requirement
- Apache, Php, mysql (XAMPP lebih mudahnya)
- Composer

# Cara installasi
- Clone atau download repo ini
- Jika di download ekstrak isinya
- Buka commandprompt pada directory repo yang sudah di clone atau yang di ekstrak tadi
- Jalankan command 'composer install'
- Jika sudah selesai, berikutnya edit file .env (jika file .env tidak ada buat baru)
- Ubah DB_DATABASE, DB_USERNAME, DB_PASSWORD sesuai dengan komputer
- Setelah itu kembali ke commandprompt tadi jalankan command 'php artisan migrate'
- Jika sudah jalankan web dengan command 'php artisan serve'

## Keterangan
- Password user di enkripsi menggunakan algoritma md5, jadi jika ingin tambah user dari database, pastikan password di enkripsi terlebih dahulu