<?php
require "koneksi.php";
session_start();

if (!isset($_SESSION['id_users'])) {
    header("Location: login.php");
    exit();
}

$nama_lengkap = $_SESSION['nama_lengkap'];
$no_rekening = isset($_COOKIE['no_rekening']) ? $_COOKIE['no_rekening'] : 'Nomor Rekening Tidak Tersedia';
setcookie('no_rekening',$no_rekening,time()+60,"/");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
    <title>Dashboard Keuangan</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: #fff;
            max-width: 900px;
            margin: 0 auto;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }
        h2, h3 {
            color: #333;
        }
        p {
            font-size: 16px;
            color: #555;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .logout-btn {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #e74c3c;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }
        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
</head>
<body>
    <div class="container">
        <h2>Selamat Datang, <?php echo $nama_lengkap; ?>!</h2>
        <p>No. Rekening: <strong><?php echo $no_rekening; ?></strong></p>
        <h3>Riwayat Transaksi</h3>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Pemasukan</th>
                    <th>Pengeluaran</th>
                    <th>Saldo</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // kerjakan di sini utk menampilkan data
                // tips pakai (<data_dari_db>, 2, ',', '.') untuk format ke Rupiah
                $id_users = $_SESSION['id_users'];
                $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_users = $id_users");
                while ($data = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>" . $data['item'] . "</td>";
                    echo "<td>" . number_format($data['pemasukan'], 2, ',', '.') . "</td>";
                    echo "<td>" . number_format($data['pengeluaran'], 2, ',', '.') . "</td>";
                    echo "<td>" . number_format($data['saldo'], 2, ',', '.') . "</td>";
                    echo "<td>" . $data['tanggal'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <center><a href="logout.php" class="logout-btn">Logout</a></center>
    </div>
</body>
</html>