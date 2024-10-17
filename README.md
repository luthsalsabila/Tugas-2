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
 ### 0. Buatlah database yang sesuai dengan ERD yang telah diberikan
    Berikut merupakan ERD yang telah diberikan
    ![image](https://github.com/user-attachments/assets/ab225503-5e88-49ac-83b1-ca0fa3d9213d)

    dan berikut merupakan Database yang telah dibuat
    ![image](https://github.com/user-attachments/assets/8e7edb83-590b-4c0e-bcbb-a874b9d476e4)

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
Polimorfisme diterapkan melalui konsep overriding fungsi yang ada di kelas turunan ViewSuratTugas. Kelas ini mewarisi dari SuratTugas dan memiliki metode yang berbeda seperti displaySuratTugas(), displaySuratTugasLuarKota(), displaySuratTugasLuarNegeri(), dan displaySuratTugasInternal(). Semua metode ini melakukan hal yang sama (menampilkan data surat tugas) tetapi dengan filter atau logika yang berbeda berdasarkan keperluan:

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
