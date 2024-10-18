# Tugas-2
Berikut merupakan tugas 2 praktikum web 2 
# Sistem Surat Tugas dan Permohonan Izin

## Deskripsi

Tugas-2 adalah sebuah sistem persuratan yang ditulis dalam bahasa PHP, yang digunakan untuk mengelola dan menampilkan data surat tugas dan permohonan izin dosen. Sistem ini terhubung dengan database MySQL dan menggunakan Bootstrap untuk tampilan antarmuka yang responsif dan menarik.

## Penjelasan 
1. OOP (Object-Oriented Programming)
   OOP adalah paradigma pemrograman yang berfokus pada penggunaan objek. Dalam OOP, program dibangun menggunakan objek-objek yang berinteraksi satu sama lain untuk menyelesaikan masalah. Setiap objek memiliki atribut (data) dan metode (fungsi) yang merepresentasikan perilaku dan karakteristik objek tersebut.

2.Class (Kelas)
  Kelas adalah template atau blueprint yang digunakan untuk membuat objek. Kelas mendefinisikan atribut (variabel) dan metode (fungsi) yang dimiliki oleh objek. Dengan kata lain, kelas adalah cetak biru dari objek-objek yang akan dibuat. 

3. Construct
__construct adalah metode khusus di dalam sebuah kelas yang secara otomatis dipanggil ketika objek dari kelas tersebut dibuat. Biasanya digunakan untuk menginisialisasi nilai-nilai awal atau melakukan tugas tertentu saat objek pertama kali dibuat.

Contoh Penggunaan OOP, CLass, Construct :
```php
class SuratTugasController {
    private $db;

    // Constructor
    public function __construct($databaseConnection) {
        $this->db = $databaseConnection;  // Inisialisasi database connection
    }

    public function buatSuratTugas($dosen, $nip, $jabatan, $alasanIzin, $lamaIzin) {
        // Logika untuk membuat surat tugas
    }
}
```

Kita sudah punya kelas SuratTugasController dari kode sebelumnya, di mana terdapat class dan construct. Kelas ini menggunakan OOP untuk mengelola surat tugas, dan ada penggunaan constructor untuk inisialisasi.
- Class: SuratTugasController adalah template atau cetak biru yang mendefinisikan bagaimana surat tugas dikelola.
- Construct: Metode __construct() digunakan untuk menginisialisasi koneksi database saat objek dibuat.

4. Enkapsulasi (Encapsulation)

Enkapsulasi adalah prinsip dalam OOP di mana atribut atau data dari sebuah objek disembunyikan atau diisolasi dari luar, dan hanya bisa diakses melalui metode yang sudah ditentukan. Ini membantu melindungi data agar tidak diakses atau diubah secara sembarangan.

Untuk mengimplementasikan enkapsulasi, biasanya atribut diberi akses private atau protected, dan akses dilakukan melalui getter dan setter.

Contoh Penggunaan Enkapsulasi :
```php
class SuratTugasController {
    private $db;

    public function __construct($databaseConnection) {
        $this->db = $databaseConnection;
    }

    // Getter untuk mendapatkan database
    public function getDatabase() {
        return $this->db;
    }
    
    // Setter untuk mengganti database (hanya jika diperlukan)
    public function setDatabase($databaseConnection) {
        $this->db = $databaseConnection;
    }
}
```
Atribut $db pada contoh diatas disembunyikan dengan menggunakan akses private. Data ini tidak bisa diakses langsung dari luar kelas, melainkan hanya melalui metode di dalam kelas. Serta, hanya bisa diakses melalui metode getDatabase() dan setDatabase(), sehingga data tetap aman dan terlindungi dari modifikasi langsung.

  Inheritance adalah kemampuan untuk membuat kelas baru berdasarkan kelas yang sudah ada. Kelas yang mewariskan disebut parent class (kelas induk), dan kelas yang mewarisi disebut child class (kelas turunan). Dengan inheritance, child class dapat menggunakan atau menambahkan properti dan metode dari parent class.

  Contoh Penggunaan Inheritance :

  ```php
class SuratIzinController extends SuratTugasController {
    public function buatSuratIzin($dosen, $nip, $jabatan, $alasanIzin, $lamaIzin) {
        // Logika khusus untuk membuat surat izin
    }
}

```
Kelas SuratIzinController mewarisi semua properti dan metode dari SuratTugasController. Jika diperlukan, kita bisa menambahkan atau menimpa metode di dalamnya.

5. Polimorfisme (Polymorphism)

Polimorfisme adalah konsep di mana satu metode atau fungsi bisa memiliki bentuk yang berbeda di kelas yang berbeda. Dalam OOP, polimorfisme biasanya dicapai dengan cara overriding (menimpa metode dari parent class) dan overloading (memiliki beberapa metode dengan nama yang sama tapi parameter yang berbeda).

Dengan konsep polimorfisme, kita bisa menimpa (override) metode di kelas anak (SuratIzinController) untuk memberikan perilaku yang berbeda, meskipun nama metodenya sama.
Misalnya, kita akan menimpa metode buatSuratTugas dari SuratTugasController di kelas SuratIzinController agar menghasilkan output yang berbeda.

Contoh Penggunaan Polimorfisme :
```php
class SuratIzinController extends SuratTugasController {
    // Overriding buatSuratTugas
    public function buatSuratTugas($dosen, $nip, $jabatan, $alasanIzin, $lamaIzin) {
        echo "Membuat surat tugas khusus untuk surat izin.";
        // Mungkin logika untuk surat izin berbeda
    }

    // Metode khusus surat izin
    public function buatSuratIzin($dosen, $nip, $jabatan, $alasanIzin, $lamaIzin) {
        // Logika khusus untuk surat izin
    }
}
```

## Fitur

 ### 1. Kelola Surat Tugas

    - Menampilkan semua surat tugas.
    - Memfilter surat tugas berdasarkan:
        - Luar Kota
        - Luar Negeri
        - Internal

### 2. Kelola Permohonan Izin
    Menampilkan semua permohonan izin yang diajukan oleh dosen.

### 3. Tampilan Tabel Responsif
    Data surat tugas dan permohonan izin ditampilkan dalam tabel yang responsif, sehingga nyaman diakses dari berbagai ukuran layar.

## STruktur Kelas

1. Database: Kelas yang menangani koneksi ke database MySQL.
2. PermohonanIzin: Kelas yang menangani operasi CRUD untuk tabel permohonan_izin.
3. SuratTugas: Kelas yang menangani operasi CRUD untuk tabel surat_tugas, termasuk filter berdasarkan keperluan.
4. ViewPermohonanIzin: Kelas yang digunakan untuk menampilkan data permohonan izin dalam bentuk tabel.
5. ViewSuratTugas: Kelas yang digunakan untuk menampilkan data surat tugas dalam bentuk tabel, termasuk filter berdasarkan jenis keperluan.

## Struktur Database

### 1. Tabel permohonan_izin:
    1. izin_id: Primary key
    2. dosen: Nama dosen
    3. nip: NIP dosen
    4. jabatan: Jabatan dosen
    5. alasan_izin: Alasan izin
    6. lama_izin: Lama izin

### Tabel surat_tugas:
    1. surat_tugas_id: Primary key
    2. nomor: Nomor surat
    3. tgl_surat_tugas: Tanggal surat tugas
    4. tujuan: Tujuan surat tugas
    5. transportasi: Jenis transportasi
    6. keperluan: Keperluan surat tugas
    7. dosen: Nama dosen yang bersangkutan

  ## Langkah-langkah
 ### 0. Buatlah database yang sesuai dengan ERD yang telah diberikan
    Berikut merupakan ERD yang telah diberikan
   ![image](https://github.com/user-attachments/assets/e092ba36-eed0-4c60-8bf9-f6f7a946a9ec)

    dan berikut merupakan Database yang telah dibuat
   ![image](https://github.com/user-attachments/assets/fe5c9707-6633-4574-b46c-7b79bfbcd754)


###  1. Membuat View berbasis OOP, dengan mengambil data dari database MySQL
     Kelas Database, PermohonanIzin, SuratTugas, ViewSuratTugas, dan ViewPermohonanIzin sudah menerapkan OOP dengan cara yang benar. Data diambil dari database MySQL menggunakan kelas Database untuk koneksi, dan model-model seperti PermohonanIzin dan SuratTugas bertanggung jawab atas pengambilan data.

  Kelas ViewSuratTugas merupakan view yang dibuat untuk menampilkan data surat tugas.
Fungsi displaySuratTugas() mengambil data dari metode getAllSuratTugas() yang berasal dari kelas SuratTugas.
Hasil data ditampilkan dalam tabel HTML menggunakan foreach untuk setiap baris yang diambil dari database.
     
   ```php
  // View untuk menampilkan Surat Tugas
class ViewSuratTugas extends SuratTugas {
    public function displaySuratTugas() {
        $data = $this->getAllSuratTugas(); // Mengambil semua data surat tugas
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered">';
        echo '<thead><tr><th>ID</th><th>Nomor</th><th>Tanggal</th><th>Tujuan</th><th>Transportasi</th><th>Keperluan</th><th>Dosen</th></tr></thead>';
        echo '<tbody>';
        foreach ($data as $index => $row) {
            $rowClass = $index % 2 == 0 ? 'even-row' : 'odd-row'; // Mengatur kelas baris untuk styling
            echo '<tr class="' . $rowClass . '">';
            echo '<td>' . $row['surat_tugas_id'] . '</td>'; 
            echo '<td>' . $row['nomor'] . '</td>'; 
            echo '<td>' . $row['tgl_surat_tugas'] . '</td>'; 
            echo '<td>' . $row['tujuan'] . '</td>'; 
            echo '<td>' . $row['transportasi'] . '</td>'; 
            echo '<td>' . $row['keperluan'] . '</td>'; 
            echo '<td>' . $row['dosen'] . '</td>'; 
            echo '</tr>';
        }
        echo '</tbody></table></div>';
    }
}

```
  #### Penjelasannya :
    1. Kelas ViewSuratTugas merupakan view yang dibuat untuk menampilkan data surat tugas.
    2. Fungsi displaySuratTugas() mengambil data dari metode getAllSuratTugas() yang berasal dari kelas SuratTugas.
    3. Hasil data ditampilkan dalam tabel HTML menggunakan foreach untuk setiap baris yang diambil dari database.

 ### 2. Gunakan _construct sebagai link ke database
     Kelas Database memiliki constructor (__construct) yang digunakan untuk menginisialisasi koneksi ke database MySQL.
    
    ```php
       public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }
    ```
    
  
  ### 3.Terapkan enkapsulasi sesuai logika studi kasus
    Enkapsulasi diterapkan dengan menyembunyikan detail koneksi dan tabel dari luar kelas. Koneksi ke database dan nama tabel dijaga di dalam properti private:
  
     ```php
    private $host = "localhost";
    private $db_name = "persuratan_dosen";
    private $username = "root";
    private $password = "";
    private $table = "permohonan_izin"; // dalam kelas PermohonanIzin
     
     ```
     
### 4. Membuat kelas turunan menggunakan konsep pewarisan
      Konsep pewarisan diterapkan ketika PermohonanIzin dan SuratTugas mewarisi kelas Database. Keduanya dapat menggunakan koneksi yang telah diinisialisasi di kelas Database tanpa harus mengulangi kode.
      
  ```php
  class PermohonanIzin extends Database {
    // Kode untuk kelas PermohonanIzin
}

  class SuratTugas extends Database {
    // Kode untuk kelas SuratTugas
}

  class ViewSuratTugas extends SuratTugas {
    // Kode untuk kelas ViewSuratTugas
}

  class ViewPermohonanIzin extends PermohonanIzin {
    // Kode untuk kelas ViewPermohonanIzin
}

```

### 5. Terapkan polimorfisme untuk minimal 2 peran sesuai studi kasus.
Polimorfisme diterapkan melalui konsep overriding fungsi yang ada di kelas turunan ViewSuratTugas. Kelas ini mewarisi dari SuratTugas dan memiliki metode yang berbeda seperti displaySuratTugas(), displaySuratTugasLuarKota(), displaySuratTugasLuarNegeri(), dan displaySuratTugasInternal(). Semua metode ini melakukan hal yang sama (menampilkan data surat tugas) tetapi dengan filter atau logika yang berbeda berdasarkan keperluan.

```php
public function displaySuratTugasLuarKota() {
    $data = $this->getSuratTugasLuarKota();
    // ...
}
public function displaySuratTugasLuarNegeri() {
    $data = $this->getSuratTugasLuarNegeri();
    // ...
}
```

## Kode Sumber
   ### 1. Index.php

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Menentukan karakter encoding -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsif terhadap ukuran layar -->

    <title>Sistem Surat Tugas</title> <!-- Judul halaman -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Link ke Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet"> <!-- Link ke font Playfair Display -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> <!-- Link ke font Pacifico -->
    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang halaman */
            font-family: 'Playfair Display', serif; /* Font untuk teks */
        }
        .navbar {
            background-color: #ffb3d9; /* Warna latar belakang navbar */
        }
        .navbar-brand, .nav-link {
            color: #4a4a4a !important; /* Warna teks di navbar */
            font-weight: 600; /* Ketebalan font */
            letter-spacing: 1px; /* Jarak antar huruf */
        }
        .table {
            background-color: #ffffff; /* Warna latar belakang tabel */
            border-radius: 8px; /* Sudut melengkung untuk tabel */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Bayangan untuk tabel */
            margin-top: 20px; /* Jarak atas tabel */
        }
        th {
            background-color: #ffccff; /* Warna latar belakang header tabel */
            color: #4a4a4a; /* Warna teks header tabel */
        }
        .even-row {
            background-color: #ffe6f2; /* Warna untuk baris genap */
        }
        .odd-row {
            background-color: #ffffff; /* Warna untuk baris ganjil */
        }
        h1, h2 {
            font-family: 'Playfair Display', serif; /* Font untuk judul */
            color: #ff4d94; /* Warna teks judul */
            text-align: center; /* Pusatkan teks */
            margin-top: 30px; /* Jarak atas judul */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="?page=home">Sistem Persuratan</a> <!-- Nama brand di navbar -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> <!-- Ikon toggle untuk navbar -->
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="?page=seluruh_surat">Seluruh Persuratan</a> <!-- Link ke seluruh persuratan -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=surat_tugas">Surat Permohonan Izin</a> <!-- Link ke surat permohonan izin -->
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownSuratTugas" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Surat Tugas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownSuratTugas">
                        <a class="dropdown-item" href="?page=surat_luar_kota">Surat Tugas Luar Kota</a> <!-- Link ke surat tugas luar kota -->
                        <a class="dropdown-item" href="?page=surat_luar_negeri">Surat Tugas Luar Negeri</a> <!-- Link ke surat tugas luar negeri -->
                        <a class="dropdown-item" href="?page=surat_internal">Surat Tugas Internal</a> <!-- Link ke surat tugas internal -->
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container">
        <?php
        include "class.php"; // Mengimpor file kelas
        $viewSuratTugas = new ViewSuratTugas(); // Membuat objek untuk surat tugas
        $viewPermohonanIzin = new ViewPermohonanIzin(); // Membuat objek untuk permohonan izin
        $page = isset($_GET['page']) ? $_GET['page'] : 'home'; // Menentukan halaman yang ditampilkan

        if ($page == 'seluruh_surat') {   
            echo "<h1>Daftar Surat Tugas</h1>"; // Judul untuk daftar surat tugas
            $viewSuratTugas->displaySuratTugas(); // Menampilkan daftar surat tugas
            echo "<h1>Daftar Permohonan Izin</h1>"; // Judul untuk daftar permohonan izin
            $viewPermohonanIzin->displayPermohonanIzin(); // Menampilkan daftar permohonan izin
        } elseif ($page == 'surat_luar_kota') {
            echo "<h1>Surat Tugas Luar Kota</h1>"; // Judul untuk surat tugas luar kota
            $viewSuratTugas->displaySuratTugasLuarKota(); // Tampilkan daftar Surat Tugas Luar Kota
        } elseif ($page == 'surat_luar_negeri') {
            echo "<h1>Surat Tugas Luar Negeri</h1>"; // Judul untuk surat tugas luar negeri
            $viewSuratTugas->displaySuratTugasLuarNegeri(); // Tampilkan daftar Surat Tugas Luar Negeri
        } elseif ($page == 'surat_internal') {
            echo "<h1>Surat Tugas Internal</h1>"; // Judul untuk surat tugas internal
            $viewSuratTugas->displaySuratTugasInternal(); // Tampilkan daftar Surat Tugas Internal
        } elseif ($page == 'surat_tugas') {
            echo "<h1>Permohonan Surat Izin</h1>"; // Judul untuk permohonan surat izin
            $viewPermohonanIzin->displayPermohonanIzin(); // Menampilkan daftar permohonan izin
        } else {
            // Pesan selamat datang jika halaman tidak ditemukan
            echo '<h1 class="text-center text-light" style="background-color: #ffb3d9; padding: 20px; border-radius: 8px;">SELAMAT DATANG KE DALAM SISTEM PERSURATAN</h1>';
            echo '<h3 class="text-center text-dark" style="color: #d81b60;">Anda adalah admin, anda dapat mengakses seluruh data persuratan. Mohon jaga kearsipannya</h3>';
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> <!-- Link ke jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> <!-- Link ke Popper.js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Link ke Bootstrap JS -->
</body>
</html>

```

   ### Class.php
```php
<?php
// Koneksi ke Database
class Database {
    private $host = "localhost"; // Host database
    private $db_name = "persuratan_dosen"; // Nama database
    private $username = "root"; // Username untuk koneksi
    private $password = ""; // Password untuk koneksi
    public $conn; // Variabel untuk menyimpan koneksi

    public function __construct() {
        // Membuat koneksi ke database
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        // Mengecek apakah koneksi berhasil
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error); // Menampilkan pesan jika koneksi gagal
        }
    }
}

// Model untuk Permohonan Izin
class PermohonanIzin extends Database {
    private $table = "permohonan_izin"; // Tabel yang digunakan

    // Fungsi untuk mendapatkan semua data dari permohonan_izin
    public function getAllPermohonanIzin() {
        $sql = "SELECT * FROM $this->table"; // Query untuk mengambil semua data
        $result = $this->conn->query($sql); // Eksekusi query
        return $result->fetch_all(MYSQLI_ASSOC); // Mengembalikan hasil dalam bentuk array asosiatif
    }
}

// Model untuk Surat Tugas
class SuratTugas extends Database {
    private $table = "surat_tugas"; // Tabel yang digunakan

    // Fungsi untuk mendapatkan semua data dari surat_tugas
    public function getAllSuratTugas() {
        $sql = "SELECT * FROM $this->table"; // Query untuk mengambil semua data
        $result = $this->conn->query($sql); // Eksekusi query
        return $result->fetch_all(MYSQLI_ASSOC); // Mengembalikan hasil dalam bentuk array asosiatif
    }

    // Fungsi untuk mendapatkan Surat Tugas Luar Kota
    public function getSuratTugasLuarKota() {
        $sql = "SELECT * FROM $this->table WHERE keperluan LIKE '%Luar Kota%'"; // Query untuk mengambil data Luar Kota
        $result = $this->conn->query($sql); // Eksekusi query
        return $result->fetch_all(MYSQLI_ASSOC); // Mengembalikan hasil dalam bentuk array asosiatif
    }

    // Fungsi untuk mendapatkan Surat Tugas Luar Negeri
    public function getSuratTugasLuarNegeri() {
        $sql = "SELECT * FROM $this->table WHERE keperluan LIKE '%Luar Negeri%'"; // Query untuk mengambil data Luar Negeri
        $result = $this->conn->query($sql); // Eksekusi query
        return $result->fetch_all(MYSQLI_ASSOC); // Mengembalikan hasil dalam bentuk array asosiatif
    }

    // Fungsi untuk mendapatkan Surat Tugas Internal
    public function getSuratTugasInternal() {
        $sql = "SELECT * FROM $this->table WHERE keperluan LIKE '%Internal%'"; // Query untuk mengambil data Internal
        $result = $this->conn->query($sql); // Eksekusi query
        return $result->fetch_all(MYSQLI_ASSOC); // Mengembalikan hasil dalam bentuk array asosiatif
    }
}

// View untuk menampilkan Surat Tugas
class ViewSuratTugas extends SuratTugas {
    public function displaySuratTugas() {
        $data = $this->getAllSuratTugas(); // Mengambil semua data surat tugas
        echo '<div class="table-responsive">'; // Membuat div responsif untuk tabel
        echo '<table class="table table-bordered">'; // Membuat tabel
        echo '<thead><tr><th>ID</th><th>Nomor</th><th>Tanggal</th><th>Tujuan</th><th>Transportasi</th><th>Keperluan</th><th>Dosen</th></tr></thead>';
        echo '<tbody>';
        // Mengulangi setiap data untuk ditampilkan dalam tabel
        foreach ($data as $index => $row) {
            $rowClass = $index % 2 == 0 ? 'even-row' : 'odd-row'; // Mengatur kelas baris untuk styling
            echo '<tr class="' . $rowClass . '">'; // Menampilkan baris
            echo '<td>' . $row['surat_tugas_id'] . '</td>'; // Menampilkan ID
            echo '<td>' . $row['nomor'] . '</td>'; // Menampilkan Nomor
            echo '<td>' . $row['tgl_surat_tugas'] . '</td>'; // Menampilkan Tanggal
            echo '<td>' . $row['tujuan'] . '</td>'; // Menampilkan Tujuan
            echo '<td>' . $row['transportasi'] . '</td>'; // Menampilkan Transportasi
            echo '<td>' . $row['keperluan'] . '</td>'; // Menampilkan Keperluan
            echo '<td>' . $row['dosen'] . '</td>'; // Menampilkan Dosen
            echo '</tr>';
        }
        echo '</tbody></table></div>'; // Menutup tabel
    }

    // Fungsi untuk menampilkan Surat Tugas Luar Kota
    public function displaySuratTugasLuarKota() {
        $data = $this->getSuratTugasLuarKota(); // Mengambil data surat tugas luar kota
        echo '<div class="table-responsive">'; // Membuat div responsif untuk tabel
        echo '<table class="table table-bordered">'; // Membuat tabel
        echo '<thead><tr><th>ID</th><th>Nomor</th><th>Tanggal</th><th>Tujuan</th><th>Transportasi</th><th>Keperluan</th><th>Dosen</th></tr></thead>';
        echo '<tbody>';
        // Mengulangi setiap data untuk ditampilkan dalam tabel
        foreach ($data as $index => $row) {
            $rowClass = $index % 2 == 0 ? 'even-row' : 'odd-row'; // Mengatur kelas baris untuk styling
            echo '<tr class="' . $rowClass . '">'; // Menampilkan baris
            echo '<td>' . $row['surat_tugas_id'] . '</td>'; // Menampilkan ID
            echo '<td>' . $row['nomor'] . '</td>'; // Menampilkan Nomor
            echo '<td>' . $row['tgl_surat_tugas'] . '</td>'; // Menampilkan Tanggal
            echo '<td>' . $row['tujuan'] . '</td>'; // Menampilkan Tujuan
            echo '<td>' . $row['transportasi'] . '</td>'; // Menampilkan Transportasi
            echo '<td>' . $row['keperluan'] . '</td>'; // Menampilkan Keperluan
            echo '<td>' . $row['dosen'] . '</td>'; // Menampilkan Dosen
            echo '</tr>';
        }
        echo '</tbody></table></div>'; // Menutup tabel
    }

    // Fungsi untuk menampilkan Surat Tugas Luar Negeri
    public function displaySuratTugasLuarNegeri() {
        $data = $this->getSuratTugasLuarNegeri(); // Mengambil data surat tugas luar negeri
        echo '<div class="table-responsive">'; // Membuat div responsif untuk tabel
        echo '<table class="table table-bordered">'; // Membuat tabel
        echo '<thead><tr><th>ID</th><th>Nomor</th><th>Tanggal</th><th>Tujuan</th><th>Transportasi</th><th>Keperluan</th><th>Dosen</th></tr></thead>';
        echo '<tbody>';
        // Mengulangi setiap data untuk ditampilkan dalam tabel
        foreach ($data as $index => $row) {
            $rowClass = $index % 2 == 0 ? 'even-row' : 'odd-row'; // Mengatur kelas baris untuk styling
            echo '<tr class="' . $rowClass . '">'; // Menampilkan baris
            echo '<td>' . $row['surat_tugas_id'] . '</td>'; // Menampilkan ID
            echo '<td>' . $row['nomor'] . '</td>'; // Menampilkan Nomor
            echo '<td>' . $row['tgl_surat_tugas'] . '</td>'; // Menampilkan Tanggal
            echo '<td>' . $row['tujuan'] . '</td>'; // Menampilkan Tujuan
            echo '<td>' . $row['transportasi'] . '</td>'; // Menampilkan Transportasi
            echo '<td>' . $row['keperluan'] . '</td>'; // Menampilkan Keperluan
            echo '<td>' . $row['dosen'] . '</td>'; // Menampilkan Dosen
            echo '</tr>';
        }
        echo '</tbody></table></div>'; // Menutup tabel
    }

    // Fungsi untuk menampilkan Surat Tugas Internal
    public function displaySuratTugasInternal() {
        $data = $this->getSuratTugasInternal(); // Mengambil data surat tugas internal
        echo '<div class="table-responsive">'; // Membuat div responsif untuk tabel
        echo '<table class="table table-bordered">'; // Membuat tabel
        echo '<thead><tr><th>ID</th><th>Nomor</th><th>Tanggal</th><th>Tujuan</th><th>Transportasi</th><th>Keperluan</th><th>Dosen</th></tr></thead>';
        echo '<tbody>';
        // Mengulangi setiap data untuk ditampilkan dalam tabel
        foreach ($data as $index => $row) {
            $rowClass = $index % 2 == 0 ? 'even-row' : 'odd-row'; // Mengatur kelas baris untuk styling
            echo '<tr class="' . $rowClass . '">'; // Menampilkan baris
            echo '<td>' . $row['surat_tugas_id'] . '</td>'; // Menampilkan ID
            echo '<td>' . $row['nomor'] . '</td>'; // Menampilkan Nomor
            echo '<td>' . $row['tgl_surat_tugas'] . '</td>'; // Menampilkan Tanggal
            echo '<td>' . $row['tujuan'] . '</td>'; // Menampilkan Tujuan
            echo '<td>' . $row['transportasi'] . '</td>'; // Menampilkan Transportasi
            echo '<td>' . $row['keperluan'] . '</td>'; // Menampilkan Keperluan
            echo '<td>' . $row['dosen'] . '</td>'; // Menampilkan Dosen
            echo '</tr>';
        }
        echo '</tbody></table></div>'; // Menutup tabel
    }
}

// View untuk menampilkan Permohonan Izin
class ViewPermohonanIzin extends PermohonanIzin {
    public function displayPermohonanIzin() {
        $data = $this->getAllPermohonanIzin(); // Mengambil semua data permohonan izin
        echo '<div class="table-responsive">'; // Membuat div responsif untuk tabel
        echo '<table class="table table-bordered">'; // Membuat tabel
        echo '<thead><tr><th>ID</th><th>Dosen</th><th>NIP</th><th>Jabatan</th><th>Alasan Izin</th><th>Lama Izin</th></tr></thead>';
        echo '<tbody>';
        // Mengulangi setiap data untuk ditampilkan dalam tabel
        foreach ($data as $index => $row) {
            echo '<tr>'; // Menampilkan baris
            echo '<td>' . $row['izin_id'] . '</td>'; // Menampilkan ID
            echo '<td>' . $row['dosen'] . '</td>'; // Menampilkan Dosen
            echo '<td>' . $row['nip'] . '</td>'; // Menampilkan NIP
            echo '<td>' . $row['jabatan'] . '</td>'; // Menampilkan Jabatan
            echo '<td>' . $row['alasan_izin'] . '</td>'; // Menampilkan Alasan Izin
            echo '<td>' . $row['lama_izin'] . '</td>'; // Menampilkan Lama Izin
            echo '</tr>';
        }
        echo '</tbody></table></div>'; // Menutup tabel
    }
}

?>

```
   
## Output yang telah dibuat :

### 1. Output dari Index.php
   Memperlihatkan tampilan home ketika pertama kali dibuka
   ![image](https://github.com/user-attachments/assets/c6bc95dc-aa22-4c13-8030-4e23b21366fc)

### 2. Ouput tabel dari kedua Superclass
   Ketika navbar "Seluruh Persuratan" diklik maka akan keluar output tabel dari kedua Superclass
   ![image](https://github.com/user-attachments/assets/03ddf400-ceb5-4686-992a-f0c567d30e83)

   ![image](https://github.com/user-attachments/assets/227c7c90-6f7e-4b19-a5f7-ca5032728aa6)

### 3. Output dari Superclass yang tidak memiliki Subclass
   Ketika navbar "Surat Permohonan Izin" diklik maka akan keluar tampilan seperti ini :
   ![image](https://github.com/user-attachments/assets/63af39c5-818d-4d82-9226-7be2a2da39ea)

### 4. Output dari Navbar "Surat Tugas"
   Ketika navbar "Surat Tugas diklik maka akan keluar output seperti ini dan dapat memilah sesuai dengan tugas yang dipilih
   ![image](https://github.com/user-attachments/assets/f4737463-23ec-4f05-807f-329d7b8ab639)

   #### - Surat Tugas Luar Kota
   ![image](https://github.com/user-attachments/assets/76c33aad-786a-42e6-8db8-0425413f6b9b)

   #### - Surat Tugas Luar Negeri
   ![image](https://github.com/user-attachments/assets/dec5d710-eeca-4132-a635-2c3293e3f8d2)

   #### - Surat Tugas Internal
   ![image](https://github.com/user-attachments/assets/1a680fc1-2ed5-47a3-8fe8-02473aa2c9d2)

   Demikian Readme dari code yang telah diberikan.
