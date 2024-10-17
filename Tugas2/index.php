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
