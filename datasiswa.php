<?php
include 'controller.php';
include 'koneksi.php';
// Deklarasi variabel untuk digunakan dalam form
$id = '';
$nama = '';
$nis = '';
$alamat = '';
$showForm = false;
$message = '';

// Handle tambah data
if (isset($_POST['add'])) {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $alamat = $_POST['alamat'];

    if (tambahSiswa($nama, $nis, $alamat)) {
        $message = "Berhasil menambahkan data siswa.";
    } else {
        $message = "Gagal menambahkan data siswa.";
    }
    $showForm = false;
}

// Handle edit data
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $alamat = $_POST['alamat'];

    if (editSiswa($id, $nama, $nis, $alamat)) {
        $message = "Berhasil mengedit data siswa.";
    } else {
        $message = "Gagal mengedit data siswa.";
    }
}

// Handle hapus data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    if (hapusSiswa($id)) {
        $message = "Berhasil menghapus data siswa.";
    } else {
        $message = "Gagal menghapus data siswa.";
    }
}

// Jika tombol tambah diklik, tampilkan form
if (isset($_GET['action']) && $_GET['action'] === 'tambah') {
    $showForm = true;
}

// Jika dalam mode edit, ambil data siswa yang akan diedit
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $siswaData = getSiswaById($id);
    if ($siswaData) {
        $nama = $siswaData['nama'];
        $nis = $siswaData['nis'];
        $alamat = $siswaData['alamat'];
        $showForm = true;
    }
}

// Ambil semua data siswa untuk ditampilkan dalam tabel
$siswa = getSiswa();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .form-control label {
            display: block;
            font-weight: bold;
        }

        .form-control input,
        .form-control textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        .form-control input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        .form-control input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .action-buttons a {
            text-decoration: none;
            padding: 5px 10px;
            color: white;
            border-radius: 3px;
            margin-right: 5px;
        }

        .action-buttons .edit {
            background-color: #28a745;
        }

        .action-buttons .delete {
            background-color: #dc3545;
        }

        .action-buttons .add {
            background-color: #007bff;
            margin-bottom: 20px;
            display: inline-block;
        }

        .action-buttons .add:hover, 
        .action-buttons .edit:hover, 
        .action-buttons .delete:hover {
            opacity: 0.9;
        }

        .message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            display: <?php echo $message ? 'block' : 'none'; ?>;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Siswa</h1>

        <!-- Pesan Sukses -->
        <div class="message">
            <?php echo $message; ?>
        </div>

        <!-- Button Tambah Data -->
        <div class="action-buttons">
            <a href="datasiswa.php?action=tambah" class="add">Tambah Siswa</a>
        </div>

        <!-- Form Tambah/Edit -->
        <?php if ($showForm): ?>
        <div class="form-control">
            <form method="POST" action="datasiswa.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                
                <label for="nis">NIS:</label>
                <input type="text" id="nis" name="nis" value="<?php echo $nis; ?>" required>
                
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" required><?php echo $alamat; ?></textarea>

                <input type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'add'; ?>" value="<?php echo isset($_GET['edit']) ? 'Update Siswa' : 'Tambah Siswa'; ?>">
            </form>
        </div>
        <?php endif; ?>

        <!-- Tabel Data Siswa -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($siswa as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['nis']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td class="action-buttons">
                        <a href="datasiswa.php?edit=<?php echo $row['id']; ?>" class="edit">Edit</a>
                        <a href="datasiswa.php?delete=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Button Tambah Data dan Home -->
<div class="action-buttons">
    <a href="index.php" class="home">Home</a>
    <a href="index.php?action=kembali ke awal" class="add">Home</a>
</div>

</body>


</html>
