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

  - Menampilkan daftar surat tugas:
  - Surat Tugas Luar Kota
  - Surat Tugas Luar Negeri
  - Surat Tugas Internal
  - Menampilkan daftar permohonan izin dari dosen.
  - Antarmuka yang responsif dengan Bootstrap.

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
