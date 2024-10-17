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
