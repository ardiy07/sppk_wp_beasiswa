# Sistem Penunjang Pengambilan Keputusan - Metode Weighted Product

Aplikasi ini adalah sistem penunjang pengambilan keputusan berbasis website yang menggunakan metode Weighted Product untuk membantu dalam proses pengambilan keputusan. Dibangun dengan menggunakan PHP native, aplikasi ini dirancang untuk memudahkan perhitungan dan evaluasi keputusan berdasarkan beberapa kriteria.

## Daftar Isi

- [Instalasi](#instalasi)
- [Penggunaan](#penggunaan)
- [Fitur](#fitur)

## Instalasi

### Prasyarat

- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)

### Setup

1. Clone repository:

    ```bash
    git clone https://github.com/username/decision-support-system.git
    cd decision-support-system
    ```

2. Buat database MySQL dan konfigurasi koneksi database di file `config.php`:

    ```php
    <?php
    $host = 'localhost';
    $user = 'root';
    $password = 'password';
    $dbname = 'decision_support';
    
    $conn = new mysqli($host, $user, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
    ```

3. Import struktur tabel dan data awal dari file `database.sql` ke database MySQL Anda:

    ```bash
    mysql -u root -p decision_support < database.sql
    ```

4. Jalankan server PHP built-in:

    ```bash
    php -S localhost:8000
    ```

## Penggunaan

- Buka browser Anda dan navigasikan ke `http://localhost:8000` untuk mengakses aplikasi sistem penunjang pengambilan keputusan.

## Fitur

- **Input Data Kriteria dan Alternatif:** Menambah, mengedit, dan menghapus data kriteria dan alternatif.
- **Pengaturan Bobot Kriteria:** Menetapkan bobot untuk setiap kriteria berdasarkan kepentingannya.
- **Perhitungan Weighted Product:** Menghitung skor untuk setiap alternatif menggunakan metode Weighted Product.
- **Laporan Keputusan:** Menampilkan hasil perhitungan dan keputusan akhir berdasarkan data yang dimasukkan.
