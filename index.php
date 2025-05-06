<?php
// tambahkan koneksi ke database
include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Makanan</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; max-width: 800px; margin: auto; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; vertical-align: middle;}
        th { background-color: #007bff; color: white; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .pdf-icon {
            width: 20px;
            height: 20px;
            display: inline-block;
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg');
            background-size: cover;
            vertical-align: middle;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <h2>Daftar Makanan</h2>
    <p><a href="input.php">Tambah Data Makanan Baru</a></p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Makanan</th>
                <th>Asal Negara</th>
                <th>File PDF (Gambar Makanan)</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // masukkan kode kalian disini
        $sql = "SELECT * FROM makanan";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $fileUrl = "uploads/" . $row["gambarMakanan"]; 
                echo "<td>" . $row["idMakanan"] . "</td>";
                echo "<td>" . $row["namaMakanan"] . "</td>";
                echo "<td>" . $row["asalMakanan"] . "</td>";
                echo "<td>";
                
                //ini bantuan tapi ga wajib di pake kok (tapi dipakai untuk tampilan di soal)
                 echo "<a href='" . $fileUrl . "' target='_blank' title='Buka PDF'>";
                 echo "<embed src='" . $fileUrl . "' type='application/pdf' width='200px' height='250px' />";
                 echo "</a>";
                
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Belum ada data makanan.</td></tr>"; 
        }

        ?>
      
        </tbody>
    </table>
</body>
</html>