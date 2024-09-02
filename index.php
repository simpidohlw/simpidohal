<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama</title>
    <!-- Menambahkan link ke Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://source.unsplash.com/random/1600x900/?school');
            background-size: cover;
            background-position: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
            padding: 40px;
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        h1 {
            color: #ff6347;
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin: 20px 0;
        }

        ul li a {
            text-decoration: none;
            color: #ffffff;
            background-color: #ff69b4;
            padding: 15px 25px;
            border-radius: 50px;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        ul li a:hover {
            background-color: #ff1493;
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        ul li a i {
            margin-right: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Menu Utama!</h1>
        <ul>
            <li><a href="datasiswa.php"><i class="fas fa-user-graduate"></i> Data Siswa</a></li>
            <li><a href="dataguru.php"><i class="fas fa-chalkboard-teacher"></i> Data Guru</a></li>
            <li><a href="datamapel.php"><i class="fas fa-book"></i> Data Mapel</a></li>
            <li><a href="datakelas.php"><i class="fas fa-school"></i> Data Kelas</a></li>
        </ul>
    </div>
</body>
</html>
