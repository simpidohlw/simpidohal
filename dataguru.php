<?php
include 'controller.php';
include 'koneksi.php';

$id = '';
$nama = '';
$nip = '';
$alamat = '';
$showForm = false;
$message = '';

// Handle tambah data
if (isset($_POST['add'])) {
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $alamat = $_POST['alamat'];

    if (tambahGuru($nama, $nip, $alamat)) {
        $message = "Berhasil menambahkan data guru.";
    } else {
        $message = "Gagal menambahkan data guru.";
    }
    $showForm = false;
}

// Handle edit data
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $alamat = $_POST['alamat'];

    if (editGuru($id, $nama, $nip, $alamat)) {
        $message = "Berhasil mengedit data guru.";
    } else {
        $message = "Gagal mengedit data guru.";
    }
}

// Handle hapus data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    if (hapusGuru($id)) {
        $message = "Berhasil menghapus data guru.";
    } else {
        $message = "Gagal menghapus data guru.";
    }
}

// Jika tombol tambah diklik, tampilkan form
if (isset($_GET['action']) && $_GET['action'] === 'tambah') {
    $showForm = true;
}

// Jika dalam mode edit, ambil data guru yang akan diedit
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $guruData = getGuruById($id);
    if ($guruData) {
        $nama = $guruData['nama'];
        $nip = $guruData['nip'];
        $alamat = $guruData['alamat'];
        $showForm = true;
    }
}

// Ambil semua data guru untuk ditampilkan dalam tabel
$guru = getGuru();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>
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

        .home-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
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
        <h1>Data Guru</h1>

        <!-- Pesan Sukses -->
        <div class="message">
            <?php echo $message; ?>
        </div>

        <!-- Button Tambah Data -->
        <div class="action-buttons">
            <a href="dataguru.php?action=tambah" class="add">Tambah Guru</a>
        </div>

        <!-- Form Tambah/Edit -->
        <?php if ($showForm): ?>
        <div class="form-control">
            <form method="POST" action="dataguru.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                
                <label for="nip">NIP:</label>
                <input type="text" id="nip" name="nip" value="<?php echo $nip; ?>" required>
                
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" required><?php echo $alamat; ?></textarea>

                <input type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'add'; ?>" value="<?php echo isset($_GET['edit']) ? 'Update Guru' : 'Tambah Guru'; ?>">
            </form>
        </div>
        <?php endif; ?>

        <!-- Tabel Data Guru -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($guru as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['nip']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td class="action-buttons">
                        <a href="dataguru.php?edit=<?php echo $row['id']; ?>" class="edit">Edit</a>
                        <a href="dataguru.php?delete=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Button Home -->
        <a href="index.php" class="home-button">Home</a>
    </div>
</body>
</html>
