<?php
// Menghubungkan dengan file koneksi
include 'koneksi.php';

// Fungsi untuk mengambil data siswa dari database
function getSiswa() {
    global $conn;
    $query = "SELECT * FROM siswa";
    $result = mysqli_query($conn, $query);
    $data_siswa = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data_siswa[] = $row;
    }
    return $data_siswa;
}

// Fungsi untuk menambahkan data siswa ke database
function tambahSiswa($nama, $nis, $alamat) {
    global $conn;
    $query = "INSERT INTO siswa (nama, nis, alamat) VALUES ('$nama', '$nis', '$alamat')";
    return mysqli_query($conn, $query);
}

// Fungsi untuk mengedit data siswa di database
function editSiswa($id, $nama, $nis, $alamat) {
    global $conn;
    $query = "UPDATE siswa SET nama = '$nama', nis = '$nis', alamat = '$alamat' WHERE id = $id";
    return mysqli_query($conn, $query);
}

// Fungsi untuk menghapus data siswa dari database
function hapusSiswa($id) {
    global $conn;
    $query = "DELETE FROM siswa WHERE id = $id";
    return mysqli_query($conn, $query);
}

// Fungsi untuk mengambil data siswa berdasarkan ID
function getSiswaById($id) {
    global $conn;
    $query = "SELECT * FROM siswa WHERE id = $id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

// Fungsi untuk mengambil data guru dari database
function getGuru() {
    global $conn;
    $query = "SELECT * FROM guru";
    $result = mysqli_query($conn, $query);
    $data_guru = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data_guru[] = $row;
    }
    return $data_guru;
}

// Fungsi untuk menambahkan data guru ke database
function tambahGuru($nama, $nip, $alamat) {
    global $conn;
    $query = "INSERT INTO guru (nama, nip, alamat) VALUES ('$nama', '$nip', '$alamat')";
    return mysqli_query($conn, $query);
}

// Fungsi untuk mengedit data guru di database
function editGuru($id, $nama, $nip, $alamat) {
    global $conn;
    $query = "UPDATE guru SET nama = '$nama', nip = '$nip', alamat = '$alamat' WHERE id = $id";
    return mysqli_query($conn, $query);
}

// Fungsi untuk menghapus data guru dari database
function hapusGuru($id) {
    global $conn;
    $query = "DELETE FROM guru WHERE id = $id";
    return mysqli_query($conn, $query);
}

// Fungsi untuk mengambil data guru berdasarkan ID
function getGuruById($id) {
    global $conn;
    $query = "SELECT * FROM guru WHERE id = $id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

// Fungsi untuk mengambil data mapel dari database
function getMapel() {
    global $conn;
    $query = "SELECT * FROM mapel";
    $result = mysqli_query($conn, $query);
    $data_mapel = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data_mapel[] = $row;
    }
    return $data_mapel;
}

// Fungsi untuk menambahkan data mapel ke database
function tambahMapel($nama, $kode_mapel) {
    global $conn;
    $query = "INSERT INTO mapel (nama, kode_mapel) VALUES ('$nama', '$kode_mapel')";
    return mysqli_query($conn, $query);
}

// Fungsi untuk mengedit data mapel di database
function editMapel($id, $nama, $kode_mapel) {
    global $conn;
    $query = "UPDATE mapel SET nama = '$nama', kode_mapel = '$kode_mapel' WHERE id = $id";
    return mysqli_query($conn, $query);
}

// Fungsi untuk menghapus data mapel dari database
function hapusMapel($id) {
    global $conn;
    $query = "DELETE FROM mapel WHERE id = $id";
    return mysqli_query($conn, $query);
}

// Fungsi untuk mengambil data mapel berdasarkan ID
function getMapelById($id) {
    global $conn;
    $query = "SELECT * FROM mapel WHERE id = $id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

// Fungsi untuk mengambil data kelas dari database
function getKelas() {
    global $conn;
    $query = "SELECT * FROM kelas";
    $result = mysqli_query($conn, $query);
    $data_kelas = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data_kelas[] = $row;
    }
    return $data_kelas;
}

// Fungsi untuk menambahkan data kelas ke database
function tambahKelas($nama_kelas, $wali_kelas, $kapasitas) {
    global $conn;
    $query = "INSERT INTO kelas (nama_kelas, wali_kelas, kapasitas) VALUES ('$nama_kelas', '$wali_kelas', '$kapasitas')";
    return mysqli_query($conn, $query);
}

// Fungsi untuk mengedit data kelas di database
function editKelas($id, $nama_kelas, $wali_kelas, $kapasitas) {
    global $conn;
    $query = "UPDATE kelas SET nama_kelas = '$nama_kelas', wali_kelas = '$wali_kelas', kapasitas = '$kapasitas' WHERE id = $id";
    return mysqli_query($conn, $query);
}

// Fungsi untuk menghapus data kelas dari database
function hapusKelas($id) {
    global $conn;
    $query = "DELETE FROM kelas WHERE id = $id";
    return mysqli_query($conn, $query);
}

// Fungsi untuk mengambil data kelas berdasarkan ID
function getKelasById($id) {
    global $conn;
    $query = "SELECT * FROM kelas WHERE id = $id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}
?>
