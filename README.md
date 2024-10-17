# Tugas-2
Berikut merupakan tugas 2 praktikum web 2 
# Sistem Surat Tugas dan Permohonan Izin

## Deskripsi

Tugas-2 adalah sebuah sistem persuratan yang ditulis dalam bahasa PHP, yang digunakan untuk mengelola dan menampilkan data surat tugas dan permohonan izin dosen. Sistem ini terhubung dengan database MySQL dan menggunakan Bootstrap untuk tampilan antarmuka yang responsif dan menarik.

## Fitur

- Menampilkan daftar surat tugas:
  - Surat Tugas Luar Kota
  - Surat Tugas Luar Negeri
  - Surat Tugas Internal
- Menampilkan daftar permohonan izin dari dosen.
- Antarmuka yang responsif dengan Bootstrap.

  ## Langkah-langkah
  1. Buatlah database yang sesuai dengan ERD yang telah diberikan
    Berikut merupakan ERD yang telah diberikan
    ![image](https://github.com/user-attachments/assets/ab225503-5e88-49ac-83b1-ca0fa3d9213d)
    
  2. Membuat View berbasis OOP, dengan mengambil data dari database MySQL
   ```php
   // View for displaying Surat Tugas
class ViewSuratTugas extends SuratTugas {
    public function displaySuratTugas() {
        $data = $this->getAllSuratTugas(); // Mengambil data dari model SuratTugas
        // Menampilkan data dalam format tabel
    }
}
```  
   
    1. View SuratTugas

  ```php

   class ViewSuratTugas extends SuratTugas {
    public function displaySuratTugas() {
        $data = $this->getAllSuratTugas();
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered">';
        // ... Kode untuk menampilkan tabel
        echo '</table></div>';
    }

    // Tambahkan metode untuk menampilkan jenis surat tugas lain (Luar Kota, Luar Negeri, Internal)
}

    ```
3. Gunakan _construct sebagai link ke database
    
    ```php
       public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }
    ```
    2. View PermohonanIzin 
    
    ```php
    
    class ViewPermohonanIzin extends PermohonanIzin {
    public function displayPermohonanIzin() {
        $data = $this->getAllPermohonanIzin();
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered">';
        echo '<thead><tr><th>ID</th><th>Dosen</th><th>NIP</th><th>Jabatan</th><th>Alasan Izin</th><th>Lama Izin</th></tr></thead>';
        echo '<tbody>';
        foreach ($data as $index => $row) {
            echo '<tr>';
            echo '<td>' . $row['izin_id'] . '</td>';
            echo '<td>' . $row['dosen'] . '</td>';
            echo '<td>' . $row['nip'] . '</td>';
            echo '<td>' . $row['jabatan'] . '</td>';
            echo '<td>' . $row['alasan_izin'] . '</td>';
            echo '<td>' . $row['lama_izin'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody></table></div>';
    }
}
?>
```
    
  
  4.Terapkan enkapsulasi sesuai logika studi kasus
     ```php

     class Database {
     private $host = "localhost";
     private $db_name = "persuratan_dosen";
     private $username = "root";
     private $password = "";
     public $conn;
     }
     
     ```
  6. Membuat kelas turunan menggunakan konsep pewarisan

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
  7. Terapkan polimorfisme untuk minimal 2 peran sesuai studi kasus.

```php
public function displaySuratTugas() {
    // Menampilkan data surat tugas
}

public function displayPermohonanIzin() {
    // Menampilkan data permohonan izin
}
```
